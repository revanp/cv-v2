<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormContactUs;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validated = $request->validate([
            'name' => ['required'],
            'message' => ['required'],
        ]);

        FormContactUs::create([
            'name' => $data['name'] ?? null,
            'email' => $data['email'] ?? null,
            'phone_number' => $data['phone_number'] ?? null,
            'subject' => $data['subject'] ?? null,
            'message' => $data['message'] ?? null,
        ]);

        return redirect(url(''));
    }
}
