<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\t_const;

class TConstController extends Controller
{
    public function index()
    {
        $tConsts = t_const::all();

        return view('tconst.index', compact('tConsts'));
    }

    public function updateStatus($rkey)
    {
        try {
            $tConst = t_const::where('rkey', $rkey)->firstOrFail();
            
            // Update status to the opposite value (toggle)
            $tConst->status = !$tConst->status;
            $tConst->save();

            return redirect()->route('tconst.index')->with('success', 'Status berhasil diupdate.');
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return redirect()->route('tconst.index')->with('error', 'Terjadi kesalahan. : ' . $errorMessage . ' Silakan coba lagi.');
        }
    }
}
