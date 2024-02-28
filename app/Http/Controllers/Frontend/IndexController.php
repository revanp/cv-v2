<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormContactUs;
use App\Models\Portofolio;
use App\Models\Skill;

class IndexController extends Controller
{
    public function index()
    {
        $portofolio = Portofolio::with([
            'image'
        ])
        ->where('is_active', 1)
        ->orderBy('sort')
        ->get();

        $skills = Skill::with([
            'image'
        ])
        ->where('is_active', 1)
        ->orderBy('sort')
        ->get();

        return view('frontend.index', compact('portofolio', 'skills'));
    }

    public function cv()
    {
        $cv = public_path('cv.pdf');

        return response()->file($cv);
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

    public function portofolioDetail($id)
    {
        $data = Portofolio::with([
            'image'
        ])
        ->find($id);

        return view('frontend.popup.portofolio', compact('data'))->render();
    }
}
