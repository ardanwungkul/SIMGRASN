<?php

namespace App\Http\Controllers;

use App\Models\RefFungsional;
use Illuminate\Http\Request;

class fungsionalController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        $query = RefFungsional::where('tahun', session('tahun'));
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('kdfung', 'like', '%' . $keyword . '%')
                    ->orWhere('kdgol', 'like', '%' . $keyword . '%')
                    ->orWhere('uraian', 'like', '%' . $keyword . '%')
                    ->orWhere('dasar', 'like', '%' . $keyword . '%')
                    ->orWhere('rp_fung', 'like', '%' . $keyword . '%')
                ;
            });
        }
        $data = $query->paginate(20);
        return view('master.fungsional.index', compact('data'));
    }
}
