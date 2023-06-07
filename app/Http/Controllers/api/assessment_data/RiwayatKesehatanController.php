<?php

namespace App\Http\Controllers\api\assessment_data;

use App\Http\Controllers\Controller;
use App\Models\RiwayatKesehatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RiwayatKesehatanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $error = Validator::make($request->all(), [
            'identitas_pasien_id' => 'required',
        ])->getMessageBag()->getMessages();

        if ($error) {
            return response()->json([
                'success' => false,
                'msg' => 'data tidak sesuai.',
                'error' => $error
            ]);
        }

        $riwayat_kesehatan = new RiwayatKesehatan();
        $riwayat_kesehatan->identitas_pasien_id = $request->identitas_pasien_id;
        $riwayat_kesehatan->keluhan_utama = $request->keluhan_utama ?? '-';
        $riwayat_kesehatan->riwayat_kesehatan_sekarang = $request->riwayat_kesehatan_sekarang ?? '-';
        $riwayat_kesehatan->riwayat_kesehatan_keluarga = $request->riwayat_kesehatan_keluarga ?? '-';

        if ($request->riwayat_kesehatan_dulu["penyakit_genetik"]["status"] == "true") {
            $riwayat_kesehatan->penyakit_genetik = true;
            $riwayat_kesehatan->penyakit_genetik_keterangan = $request->riwayat_kesehatan_dulu["penyakit_genetik"]["keterangan"];
            $riwayat_kesehatan->penyakit_genetik_sejak_kapan = $request->riwayat_kesehatan_dulu["penyakit_genetik"]["sejak_kapan"];
        }

        if ($request->riwayat_kesehatan_dulu["lainnya"]["status"] == "true") {
            $riwayat_kesehatan->lainnya = true;
            $riwayat_kesehatan->lainnya_penyakit = $request->riwayat_kesehatan_dulu["lainnya"]["penyakit"]["keterangan"];
            $riwayat_kesehatan->lainnya_kapan = $request->riwayat_kesehatan_dulu["lainnya"]["penyakit"]["sejak_kapan"];
        }

        if($request->auto_anamnesa["status"] == "false"){
            $riwayat_kesehatan->auto_anamnesa = false;
            $riwayat_kesehatan->pemberi_informasi = $request->auto_anamnesa["pemberi_informasi"];
        }else {
            $riwayat_kesehatan->auto_anamnesa = true;
        }

        $riwayat_kesehatan->save();
        return response()->json([
            'success' => true,
            // 'msg' => $request->all()
        ]);
    }
}
