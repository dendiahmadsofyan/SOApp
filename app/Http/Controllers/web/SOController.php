<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\MasterSo;
use App\Models\DetailSo;
use App\Models\MasterProduk;

class SOController extends Controller
{
    public function index()
    {
        $detailSo = DB::select('SELECT barcode, nama_barang, stock_awal, qty_scan, qty_scan - stock_awal AS qty_adjust, id_initial_so, nama_user, waktu_scan FROM (
                SELECT dtl.barcode, prod.nama_barang, prod.qty AS stock_awal, dtl.qty AS qty_scan, init.id_initial_so, usr.nama_user, IF(usr.nama_user IS NOT NULL, dtl.updtime, NULL) AS waktu_scan 
                FROM detail_so dtl 
                    LEFT JOIN master_so mstr USING(id_so) 
                    LEFT JOIN master_produks prod ON dtl.barcode = prod.barcode
                    LEFT JOIN initial_so init ON dtl.id_initial_so = init.id_initial_so
                    LEFT JOIN master_users usr ON init.id_user = usr.id_user 
						WHERE dtl.id_initial_so IS NOT NULL AND mstr.status = 0
                ) AS dtl_so;');
        $idSo = MasterSo::where('status', '0')->first();

        return view('so.index', compact('detailSo', 'idSo'));
    }

    public function updateSoStatus(Request $request)
    {
        try {
            $id = $request->id_so;
            $masterSo = MasterSo::find($id);

            if (!$masterSo) {
                return redirect()->route('detail-so.index')->with('error', 'data Master So dengan ID '.$id. 'tidak ditemukan!');
            }
			$masterSo->selesai = Carbon::now()->format('Y-m-d H:i:s');
            $masterSo->status = 1;
            $masterSo->save();

            return redirect()->route('detail-so.index')->with('success', 'Berhasil menyelesaikan Stock Opname');
        } catch (\Exception $e) {
           $getmsg = $e->getmessage();
            return redirect()->route('detail-so.index')->with('error', 'Terjadi kesalahan. : '. $getmsg .' Silakan coba lagi.');
        }
    }
}
