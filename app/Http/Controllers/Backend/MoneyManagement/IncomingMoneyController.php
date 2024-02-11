<?php

namespace App\Http\Controllers\Backend\MoneyManagement;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;

use App\Models\BankAccount;
use App\Models\IncomingMoney;
use App\Models\IncomingMoneyCategory;

class IncomingMoneyController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            $reqDatatable  = $this->requestDatatables($request->input());

            $data = IncomingMoney::select([
                    'incoming_money.amount',
                    'incoming_money.created_at',
                    'bank_account.name as bank',
                    'incoming_money_category.category',
                    'incoming_money.id',
                    'incoming_money.remarks',
                ])
                ->join('bank_account', 'bank_account.id', '=', 'incoming_money.id_bank_account')
                ->join('incoming_money_category', 'incoming_money_category.id', '=', 'incoming_money.id_incoming_money_category')
                ->where('incoming_money.id_user', Auth::user()->id);

            if ($reqDatatable['orderable']) {
                foreach ($reqDatatable['orderable'] as $order) {
                    if($order['column'] == 'rownum') {
                        $data = $data->orderBy('incoming_money.id', $order['dir']);
                    } else {
                        if(!empty($val['column'])){
                            $data = $data->orderBy($order['column'], $order['dir']);
                        }else{
                            $data = $data->orderBy('incoming_money.id', 'desc');
                        }
                    }
                }
            } else {
                $data = $data->orderBy('incoming_money.id', 'desc');
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
                ->editColumn('amount', function($data){
                    return 'Rp. ' . number_format($data->amount, 0, '.', ',');
                })
                ->editColumn('created_at', function($data){
                    return date('d M Y H:i', strtotime($data->created_at));
                })
                ->addColumn('action', function($data){
                    $html = '<div class="dropdown dropdown-inline mr-1"><a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown" aria-expanded="false"><i class="flaticon2-menu-1 icon-2x"></i></a><div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="nav nav-hoverable flex-column">';
                        //* EDIT
                        $html .= '<li class="nav-item"><a class="nav-link" href="'. url('admin-cms/money-management/incoming-money/edit/'.$data->id) .'"><i class="flaticon2-edit nav-icon"></i><span class="nav-text">Edit</span></a></li>';

                        //* DELETE
                        $html .= '<li class="nav-item"><a class="nav-link btn-delete" href="'. url('admin-cms/money-management/incoming-money/delete/'.$data->id) .'"><i class="flaticon2-delete nav-icon"></i><span class="nav-text">Delete</span></a></li>';
                    $html .= '</ul></div></div>';

                    return $html;
                })
                ->rawColumns(['image', 'action'])
                ->toJson(true);
        }

        return view('admin.pages.money-management.incoming-money.index');
    }

    public function create()
    {
        $bankAccount = BankAccount::where('id_user', Auth::user()->id)
            ->get();

        return view('admin.pages.money-management.incoming-money.create', compact('bankAccount'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        unset($data['_token']);

        $rules = [
            'id_bank_account' => ['required'],
            'category' => ['required'],
            'amount' => ['required'],
            'remarks' => [],
            'transaction_time' => ['required'],
            'transaction_time' => ['required'],
        ];

        $messages = [];

        $attributes = [
            'id_bank_account' => 'Bank Account',
            'category' => 'Category',
            'amount' => 'Amount',
            'remarks' => 'Remarks',
            'transaction_time' => 'Transaction Date',
            'transaction_time' => 'Transaction Time',
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

            $category = IncomingMoneyCategory::where('id_user', Auth::user()->id)->where('category', $data['category'])->first();
            if(empty($category)){
                $category = new IncomingMoneyCategory();

                $category->fill([
                    'id_user' => Auth::user()->id,
                    'category' => $data['category'],
                ])->save();
            }

            $incoming = new IncomingMoney();

            $incoming->fill([
                'id_user' => Auth::user()->id,
                'id_bank_account' => $data['id_bank_account'],
                'id_incoming_money_category' => $category->id,
                'amount' => str_replace(',', '', $data['amount']),
                'created_at' => date('Y-m-d H:i:s', strtotime($data['transaction_date'] . ' ' . $data['transaction_time'])),
            ])->save();

            // $idBank = $bank->id;

            $message = 'Incoming Money created successfully';

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
                'redirect' => url('admin-cms/money-management/incoming-money')
            ], 200)->withHeaders([
                'Content-Type' => 'application/json'
            ]);
        }
    }

    public function edit($id)
    {
        $data = IncomingMoney::select([
            'incoming_money.amount',
            'incoming_money.id_bank_account',
            'incoming_money.created_at',
            'incoming_money_category.category',
            'incoming_money.id',
            'incoming_money.remarks',
        ])
        ->join('incoming_money_category', 'incoming_money_category.id', '=', 'incoming_money.id_incoming_money_category')
        ->where('incoming_money.id_user', Auth::user()->id)
        ->find($id);

        $bankAccount = BankAccount::where('id_user', Auth::user()->id)
            ->get();

        return view('admin.pages.money-management.incoming-money.edit', compact('bankAccount', 'data'));
    }

    public function update($id, Request $request)
    {
        $data = $request->all();

        unset($data['_token']);

        $rules = [
            'id_bank_account' => ['required'],
            'category' => ['required'],
            'amount' => ['required'],
            'remarks' => [],
            'transaction_time' => ['required'],
            'transaction_time' => ['required'],
        ];

        $messages = [];

        $attributes = [
            'id_bank_account' => 'Bank Account',
            'category' => 'Category',
            'amount' => 'Amount',
            'remarks' => 'Remarks',
            'transaction_time' => 'Transaction Date',
            'transaction_time' => 'Transaction Time',
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

            $category = IncomingMoneyCategory::where('id_user', Auth::user()->id)->where('category', $data['category'])->first();
            if(empty($category)){
                $category = new IncomingMoneyCategory();

                $category->fill([
                    'id_user' => Auth::user()->id,
                    'category' => $data['category'],
                ])->save();
            }

            $incoming = IncomingMoney::find($id);

            $incoming->fill([
                'id_user' => Auth::user()->id,
                'id_bank_account' => $data['id_bank_account'],
                'id_incoming_money_category' => $category->id,
                'amount' => str_replace(',', '', $data['amount']),
                'created_at' => date('Y-m-d H:i:s', strtotime($data['transaction_date'] . ' ' . $data['transaction_time'])),
            ])->save();

            $message = 'Incoming Money updated successfully';

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
                'redirect' => url('admin-cms/money-management/incoming-money')
            ], 200)->withHeaders([
                'Content-Type' => 'application/json'
            ]);
        }
    }

    public function delete($id)
    {
        try{
            DB::beginTransaction();

            $delete = IncomingMoney::where('id', $id)->delete();

            DB::commit();

            return response([
                'success' => true,
                'code' => 200,
                'message' => 'Data has been deleted',
                'redirect' => url('admin-cms/money-management/incoming-money')
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

    public function getCategory(Request $request)
    {
        $cat = IncomingMoneyCategory::where('id_user', Auth::user()->id);

        if(!empty($request->term)){
            $cat = $cat->where('category', 'LIKE', "%".$request->term."%");
        }

        $cat = $cat->limit(10)
            ->get()
            ->pluck('category');

        $category = [];
        foreach($cat as $key => $val){
            array_push($category, $val);
        }

        return $category;
    }
}
