<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\MasterDataExport;
use App\Exports\SelisihDataExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\MasterSo;

class ExportController extends Controller
{
    public function index()
    {
        $masterSo = MasterSo::where('status', '1')->get();
        return view('export', compact('masterSo'));
    }

    public function exportFinal(Request $request)
    {
        try {
            $idSo = $request->idSo;
            $filename = 'export_data_final_'.$idSo.'.xls';
            return Excel::download(new MasterDataExport($idSo), $filename);
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function exportSelisih(Request $request)
    {
        try {
            $idSo = $request->idSo;
            $filename = 'export_data_selisih_'.$idSo.'.xls';
            return Excel::download(new SelisihDataExport($idSo), $filename);
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

}