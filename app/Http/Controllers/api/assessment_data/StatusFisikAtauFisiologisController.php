<?php

namespace App\Http\Controllers\api\assessment_data;

use App\Http\Controllers\Controller;
use App\Models\StatusFisikAtauFisiologis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StatusFisikAtauFisiologisController extends Controller
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
        $status_fisik = new StatusFisikAtauFisiologis();
        $status_fisik->identitas_pasien_id = $request->identitas_pasien_id;
        $status_fisik->aktifitas_durasi = $request->aktifitas_dan_istirahat['durasi']?? '-';
        $status_fisik->aktifitas_pola_tidur = $request->aktifitas_dan_istirahat['pola_tidur'] ?? '-';

        if ($request->aktifitas_dan_istirahat['gangguan_tidur']["status"] == 'true') {
            $status_fisik->tidur_status = true;
            $status_fisik->tidur_gangguan = $request->aktifitas_dan_istirahat['gangguan_tidur']["gangguan"];
        }

        $status_fisik->bab_status = $request->eliminasi['bab']["status"];
        switch ($request->eliminasi['bab']["status"]) {

            case 'konsistensi dan warna':
                $status_fisik->bab_konsistensi = $request->eliminasi['bab']["konsistensi"];
                $status_fisik->bab_warna = $request->eliminasi['bab']["warna"];
                break;

            case 'frekuensi':
                $status_fisik->bab_frequensi_diare = $request->eliminasi['bab']["frekuensi_diare"];
                break;

            default:
                # code...
                break;
        }

        $status_fisik->kesadaran = $request->eliminasi['bak']["status"];
        $status_fisik->bb = $request->nutrisi_dan_cairan["bb"] ?? 0;
        $status_fisik->imt = $request->nutrisi_dan_cairan["imt"] ?? 0;
        $status_fisik->tb = $request->nutrisi_dan_cairan["tb"] ?? 0;
        $status_fisik->kebutuhan_nutrisi = $request->nutrisi_dan_cairan["kebutuhan_nutrisi"];
        $status_fisik->kesulitan_minum = $request->nutrisi_dan_cairan["kesulitan_minum"];
        $status_fisik->status_puasa = $request->nutrisi_dan_cairan["status_puasa"];
        $status_fisik->turgor_kulit = $request->nutrisi_dan_cairan["turgor_kulit"];
        
        if ($request->reproduksi_dan_seksualitas["status"] == 'ya') {
            $status_fisik->reproduksi_dan_seksualitas = $request->reproduksi_dan_seksualitas["status"];
            $status_fisik->reproduksi_dan_seksualitas_gangguan = $request->reproduksi_dan_seksualitas["gangguan"];
        }

        if ($request->respirasi['batuk']["status"] == 'true') {
            $status_fisik->batuk = true;
            $status_fisik->batuk_lama_sakit = $request->respirasi['batuk']["lama_sakit"];
        }

        $status_fisik->penggunaan_alat_bantu_nafas = $request->respirasi['batuk'] == 'true';

        if ($request->respirasi['sesak_nafas']["status"] == 'true') {
            $status_fisik->sesak_nafas = true;
            $status_fisik->sesak_nafas_keterangan = $request->respirasi['sesak_nafas']["keterangan"];
        }

        if ($request->respirasi['sputum']["status"] == 'true') {
            $status_fisik->sputum = true;
            $status_fisik->sputum_jenis_sputum = $request->respirasi['sputum']["jenis_sputum"];
        }
        
        $status_fisik->akral = $request->sirkulasi['akral'];
        $status_fisik->crt = $request->sirkulasi['crt'] ?? '-';
        $status_fisik->nadi = $request->sirkulasi['nadi'] ?? '-';
        $status_fisik->pernapasan = $request->sirkulasi['pernapasan'] ?? '-';
        $status_fisik->spo2 = $request->sirkulasi['spo2'] ?? '-';
        $status_fisik->suhu = $request->sirkulasi['suhu'] ?? '-';
        $status_fisik->tekanan_darah = $request->sirkulasi['tekanan_darah'] ?? '-';

        $status_fisik->save();

        return response()->json([
            'success' => true,
            'msg' => [$request->all(), $status_fisik]
        ]);
    }
}
