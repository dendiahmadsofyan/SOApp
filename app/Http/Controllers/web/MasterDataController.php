<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MasterDataImport;
use App\Models\MasterData;

class MasterDataController extends Controller
{
    public function show(Request $request){
        
        $masterData = MasterData::all();
        return view('master_data.index', compact('masterData'));
    }

    public function edit($id)
    {
        try {
            $masterData = MasterData::findOrFail($id);
            return view('master_data.edit', compact('masterData'));
        } catch (\Exception $e) {
            $getmsg = $e->getmessage();
            return redirect()->route('master_data.index')->with('error', $getmsg);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'kode_item' => 'required|string',
                'barcode' => 'required|string',
                'nama_item' => 'required|string',
                'jenis' => 'required|string',
                'satuan' => 'required|string',
                'merek' => 'required|string',
                'satuan_dasar' => 'required|string',
                'konversi_satuan_dasar' => 'required|integer',
                'harga_pokok' => 'required|numeric',
                'harga_jual' => 'required|numeric',
                'stok_minimum' => 'required|integer',
                'tipe_item' => 'required|integer',
                'menggunakan_serial' => 'required|string|max:1',
                'rak' => 'nullable|string|max:50',
                'kode_gudang_kantor' => 'required|string|max:25',
                'kode_supplier' => 'nullable|string|max:75',
                'keterangan' => 'nullable|string',
            ]);

            $masterData = MasterData::findOrFail($id);
            $masterData->update($request->all());

            return redirect()->route('master_data.index')->with('success', 'Data updated successfully.');
        } catch (\Exception $e) {
            $getmsg = $e->getmessage();
            return redirect()->route('master_data.edit', $id)->with('error', 'Terjadi kesalahan : '.$getmsg);
        }
    }

    public function index()
    {
        return view('master_data.import');
    }

    public function import(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|mimes:xls,xlsx',
            ]);

            $file = $request->file('file');

            DB::beginTransaction();
            Excel::import(new MasterDataImport, $file);
            DB::commit();

            return redirect()->route('master_data.import')->with('success', 'Data imported successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            $getmsg = $e->getmessage();
            return redirect()->route('master_data.import')->with('error', 'Terjadi kesalahan. : '. $getmsg .' Silakan coba lagi.');
        }
    }

    public function create()
    {
        return view('master_data.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'kode_item' => 'required|string',
                'barcode' => 'required|string',
                'nama_item' => 'required|string',
                'jenis' => 'required|string',
                'satuan' => 'required|string',
                'merek' => 'required|string',
                'satuan_dasar' => 'required|string',
                'konversi_satuan_dasar' => 'required|integer',
                'harga_pokok' => 'required|numeric',
                'harga_jual' => 'required|numeric',
                'stok_minimum' => 'required|integer',
                'tipe_item' => 'required|integer',
                'menggunakan_serial' => 'required|string|max:1',
                'rak' => 'nullable|string|max:50',
                'kode_gudang_kantor' => 'required|string|max:25',
                'kode_supplier' => 'nullable|string|max:75',
                'keterangan' => 'nullable|string',
            ]);
            MasterData::create($request->all());

            return redirect()->route('master_data.index')->with('success', 'Data created successfully.');
        } catch (\Exception $e) {
            $getmsg = $e->getmessage();
            return redirect()->route('master_data.create')->with('error', 'Terjadi error : '.$getmsg);
        }
    }
}
