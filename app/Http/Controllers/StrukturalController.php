<?php

namespace App\Http\Controllers;

use App\Models\RefStruktural;
use Illuminate\Http\Request;

class StrukturalController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        $query = RefStruktural::where('tahun', session('tahun'));
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('kdstruk', 'like', '%' . $keyword . '%')
                    ->orWhere('uraian', 'like', '%' . $keyword . '%')
                    ->orWhere('rp_struk', 'like', '%' . $keyword . '%')
                ;
            });
        }
        $data = $query->paginate(20);
        return view('master.struktural.index', compact('data'));
    }
}
