<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Portofolio;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class PortofolioController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $reqDatatable  = $this->requestDatatables($request->input());

            $data = Portofolio::with([
                'image'
            ]);

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
                ->addColumn('image', function($data){
                    return '<a href="'. $data->image->path .'" target="_BLANK"><img src="'.$data->image->path.'" style="width:200px;"></a>';
                })
                ->addColumn('sort', function($data){
                    return $data->sort;
                })
                ->addColumn('is_active', function($data){
                    $id = $data->id;
                    $isActive = $data->is_active;

                    return view('admin.layouts.active', compact('id', 'isActive'));
                })
                ->addColumn('action', function($data){
                    $html = '<div class="dropdown dropdown-inline mr-1"><a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown" aria-expanded="false"><i class="flaticon2-menu-1 icon-2x"></i></a><div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="nav nav-hoverable flex-column">';
                        //* EDIT
                        $html .= '<li class="nav-item"><a class="nav-link" href="'. url('admin-cms/portofolio/edit/'.$data->id) .'"><i class="flaticon2-edit nav-icon"></i><span class="nav-text">Edit</span></a></li>';

                        //* DELETE
                        $html .= '<li class="nav-item"><a class="nav-link btn-delete" href="'. url('admin-cms/portofolio/delete/'.$data->id) .'"><i class="flaticon2-delete nav-icon"></i><span class="nav-text">Delete</span></a></li>';
                    $html .= '</ul></div></div>';

                    return $html;
                })
                ->rawColumns(['image', 'action'])
                ->toJson(true);
        }

        return view('admin.pages.portofolio.index');
    }

    public function create()
    {
        $sort = Portofolio::select('sort')->orderBy('sort', 'desc')->first();

        if(!empty($sort)){
            $sort = $sort->sort;
        }

        return view('admin.pages.portofolio.create', compact('sort'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        unset($data['_token']);

        $rules = [
            'image' => ['required'],
            'name' => ['required'],
            'category' => ['required'],
            'url' => [],
            'description' => ['required'],
        ];

        $messages = [];

        $attributes = [
            'image' => 'Image',
            'name' => 'Name',
            'category' => 'Category',
            'url' => 'URL',
            'description' => 'Description',
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

            $portofolio = new Portofolio();

            $sort = empty($data['sort']) ? Portofolio::count() + 1 : $data['sort'];

            $portofolio->fill([
                'name' => $data['name'],
                'url' => $data['url'],
                'category' => $data['category'],
                'description' => $data['description'],
                'is_active' => !empty($data['is_active']) ? true : false,
                'sort' => $sort,
            ])->save();

            $idPortofolio = $portofolio->id;

            if ($request->hasFile('image')) {
                $this->storeFile(
                    $request->file('image'),
                    $portofolio,
                    'image',
                    "images/portofolio/{$idPortofolio}",
                    'image'
                );
            }

            $message = 'Portofolio created successfully';

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
                'redirect' => url('admin-cms/portofolio')
            ], 200)->withHeaders([
                'Content-Type' => 'application/json'
            ]);
        }
    }
}
