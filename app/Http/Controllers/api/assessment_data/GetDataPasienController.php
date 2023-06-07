<?php

namespace App\Http\Controllers\api\assessment_data;

use App\Http\Controllers\Controller;
use App\Models\IdentitasPasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GetDataPasienController extends Controller
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

        $data = [
            'riwayat_kesehatan',
            'status_fisik',
            'psiko_sosial_spiritual',
            'ekonomi',
            'alergi',
            'nyeri',
            'kebutuhan_edukasi',
            'perencanaan_pemulangan_pasien',
            'penggunaan_obat',
            'populasi_khusus',
            'hasil_pemeriksaan_penunjang',
            'analisis_data',
            'masalah_keperawatan',
        ];
        $pasien = IdentitasPasien::with($data)->find($request->identitas_pasien_id);

        return response()->json([
            'success' => true,
            'data' => $pasien
        ]);
    }
}
