<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MasterProduk;
use App\Models\MasterSo;
use App\Models\DetailSo;

class ProdukController extends Controller
{
    public function index()
    {
        $barang = MasterProduk::all();

        return view('produk.index', compact('barang'));
    }
    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_item' => 'required|string',
            'nama_barang' => 'required|string',
            'qty' => 'required|numeric',
        ], [
            'qty.numeric' => 'Qty harus berupa angka.',
        ]);

        try {
            $saveProduk = MasterProduk::create([
                'kode_item' => $request->kode_item,
                'barcode' => $request->barcode,
                'nama_barang' => $request->nama_barang,
                'qty' => $request->qty,
            ]);
            if($saveProduk){
                $dataMasterSo = MasterSo::where('status', '0')->first();
                if($dataMasterSo){
                    $idMasterSo = $dataMasterSo->id_so;
                    //insert juga ke detail SO
                    $insertDetailSo = DetailSo::create([
                        'id_so' => $idMasterSo,
                        'barcode' => ( $request->barcode != '' ? $request->barcode : $request->kode_item ),
                        'com' => $request->qty,
                        'qty' => '0',
                    ]);
                }
            }
            return redirect()->route('produk.create')->with('success', 'Data barang berhasil disimpan.');
        } catch (\Exception $e) {
            $getmsg = $e->getmessage();
            return redirect()->route('produk.create')->with('error', 'Terjadi kesalahan. : '. $getmsg .' Silakan coba lagi.');
        }
    }
}
