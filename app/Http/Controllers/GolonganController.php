<?php

namespace App\Http\Controllers;

use App\Models\RefPangkat;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        $query = RefPangkat::query();
        if ($keyword) {
            $query->where('kdgol', 'like', '%' . $keyword . '%')
                ->orWhere('uraian', 'like', '%' . $keyword . '%');
        }
        $data = $query->paginate(20);
        return view('master.golongan.index', compact('data'));
    }
}
