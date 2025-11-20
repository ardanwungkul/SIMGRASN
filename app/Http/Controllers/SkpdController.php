<?php

namespace App\Http\Controllers;

use App\Models\RefSkpd;
use Illuminate\Http\Request;

class SkpdController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        $query = RefSkpd::where('tahun', session('tahun'));
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('kdskpd', 'like', '%' . $keyword . '%')
                    ->orWhere('uraian', 'like', '%' . $keyword . '%');
            });
        }
        $data = $query->paginate(40);
        return view('master.skpd.index', compact('data'));
    }
}
