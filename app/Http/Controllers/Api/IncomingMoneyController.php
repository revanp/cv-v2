<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IncomingMoney;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;

class IncomingMoneyController extends Controller
{
    public function getCurrentMonth()
    {
        $user = Auth::guard('api')->user();

        $incomingMoney = IncomingMoney::select(DB::raw('IFNULL(SUM(amount), 0) as amount'))
            ->where(function($query){
                $query->where('created_at', '>=', date('Y-m-d', strtotime('first day of last month')));
                $query->where('created_at', '<=', date('Y-m-d'));
            })
            ->where('id_user', $user->id)
            ->first();

        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $incomingMoney,
        ]);
    }
}
