<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportMasterBarangStock;
use App\Models\MasterSo;
use App\Models\MasterProduk;

class ImportController extends Controller
{
    public function showForm()
    {
        return view('import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);

        try {
            $cekSoAktif = MasterSo::where('status', '0')->get();
            if($cekSoAktif->count() > 0){
                return redirect()->route('import.form')->with('error', 'masih ada ' . $cekSoAktif->count() . ' id Stock Opname yang masih aktif, Proses Upload tidak bisa dilakukan ditengah proses stock opname!');
            }else{
                MasterProduk::truncate(); //sterilkan master produk terlebih dahulu
                $file = $request->file('file');
                Excel::import(new ImportMasterBarangStock(), $file);

                return redirect()->route('import.form')->with('success', 'File CSV berhasil diimport.');
            }
        } catch (\Exception $e) {
            return redirect()->route('import.form')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
