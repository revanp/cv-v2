<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $reqDatatable  = $this->requestDatatables($request->input());

            $data = new User();

            if ($reqDatatable['orderable']) {
                foreach ($reqDatatable['orderable'] as $order) {
                    if($order['column'] == 'rownum') {
                        $data = $data->orderBy('id', $order['dir']);
                    } else {
                        if(!empty($val['column'])){
                            $data = $data->orderBy($order['column'], $order['dir']);
                        }else{
                            $data = $data->orderBy('id', 'desc');
                        }
                    }
                }
            } else {
                $data = $data->orderBy('id', 'desc');
            }

            $datatables = DataTables::of($data);

            if (isset($reqDatatable['orderable']['rownum'])) {
                if ($reqDatatable['orderable']['rownum']['dir'] == 'desc') {
                    $rownum      = abs($data->count() - ($reqDatatable['start'] * $reqDatatable['length']));
                    $is_increase = false;
                } else {
                    $rownum = ($reqDatatable['start'] * $reqDatatable['length']) + 1;
                    $is_increase = true;
                }
            } else {
                $rownum      = ($reqDatatable['start'] * $reqDatatable['length']) + 1;
                $is_increase = true;
            }

            return $datatables
                ->addColumn('rownum', function() use (&$rownum, $is_increase) {
                    if ($is_increase == true) {
                        return $rownum++;
                    } else {
                        return $rownum--;
                    }
                })
                // ->addColumn('is_active', function($data){
                //     $id = $data->id;
                //     $isActive = $data->is_active;

                //     if(Auth::user()->id == $id){
                //         return '';
                //     }
                //     return view('admin.layouts.active', compact('id', 'isActive'));
                // })
                ->addColumn('action', function($data){
                    $html = '<div class="dropdown dropdown-inline mr-1"><a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown" aria-expanded="false"><i class="flaticon2-menu-1 icon-2x"></i></a><div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="nav nav-hoverable flex-column">';
                        //* EDIT
                        $html .= '<li class="nav-item"><a class="nav-link" href="'. url('admin-cms/settings/users/edit/'.$data->id) .'"><i class="flaticon2-edit nav-icon"></i><span class="nav-text">Edit</span></a></li>';

                        if(Auth::user()->id != $data->id){
                            //* DELETE
                            $html .= '<li class="nav-item"><a class="nav-link btn-delete" href="'. url('admin-cms/settings/users/delete/'.$data->id) .'"><i class="flaticon2-delete nav-icon"></i><span class="nav-text">Delete</span></a></li>';
                        }
                    $html .= '</ul></div></div>';

                    return $html;
                })
                ->rawColumns(['image', 'action'])
                ->toJson(true);
        }

        return view('admin.pages.settings.users.index');
    }

    public function create()
    {
        return view('admin.pages.settings.users.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        unset($data['_token']);

        $rules = [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];

        $messages = [];

        $attributes = [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ];

        $validator = Validator::make($data, $rules, $messages, $attributes);

        if($validator->fails()){
            return response()->json([
                'code' => 422,
                'success' => false,
                'message' => 'Validation error!',
                'data' => $validator->errors()
            ], 422)
                ->withHeaders([
                    'Content-Type' => 'application/json'
                ]);
        }

        $isError = false;

        try{
            DB::beginTransaction();

            $user = new User();

            $user->fill([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ])->save();

            $idUser = $user->id;

            $message = 'User created successfully';

            DB::commit();
        }catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();

            $isError = true;

            $err     = $e->errorInfo;

            $message =  $err[2];
        }

        if ($isError == true) {
            return response()->json([
                'code' => 500,
                'success' => false,
                'message' => $message
            ], 500)
                ->withHeaders([
                    'Content-Type' => 'application/json'
                ]);
        }else{
            session()->flash('success', $message);

            return response()->json([
                'code' => 200,
                'success' => true,
                'message' => $message,
                'redirect' => url('admin-cms/settings/users')
            ], 200)->withHeaders([
                'Content-Type' => 'application/json'
            ]);
        }
    }

    public function edit($id)
    {
        $data = User::find($id);

        return view('admin.pages.settings.users.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $data = $request->all();

        unset($data['_token']);

        $rules = [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => [],
        ];

        $messages = [];

        $attributes = [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ];

        $validator = Validator::make($data, $rules, $messages, $attributes);

        if($validator->fails()){
            return response()->json([
                'code' => 422,
                'success' => false,
                'message' => 'Validation error!',
                'data' => $validator->errors()
            ], 422)
                ->withHeaders([
                    'Content-Type' => 'application/json'
                ]);
        }

        $isError = false;

        try{
            DB::beginTransaction();

            $user = User::find($id);

            if(!empty($data['password'])){
                $user->fill([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                ])->save();
            }else{
                $user->fill([
                    'name' => $data['name'],
                    'email' => $data['email'],
                ])->save();
            }

            $idUser = $user->id;

            $message = 'User updated successfully';

            DB::commit();
        }catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();

            $isError = true;

            $err     = $e->errorInfo;

            $message =  $err[2];
        }

        if ($isError == true) {
            return response()->json([
                'code' => 500,
                'success' => false,
                'message' => $message
            ], 500)
                ->withHeaders([
                    'Content-Type' => 'application/json'
                ]);
        }else{
            session()->flash('success', $message);

            return response()->json([
                'code' => 200,
                'success' => true,
                'message' => $message,
                'redirect' => url('admin-cms/settings/users')
            ], 200)->withHeaders([
                'Content-Type' => 'application/json'
            ]);
        }
    }

    public function delete($id)
    {
        try{
            DB::beginTransaction();

            $delete = User::where('id', $id)->delete();

            DB::commit();

            return response([
                'success' => true,
                'code' => 200,
                'message' => 'Data has been deleted',
                'redirect' => url('admin-cms/settings/users')
            ]);
        }catch(Exception $e){
            DB::rollBack();

            return response([
                'success' => true,
                'code' => 500,
                'message' => 'Data failed to deleted'
            ]);
        }
    }
}
