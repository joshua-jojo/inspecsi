<?php

namespace App\Http\Controllers\api\assessment_data;

use App\Http\Controllers\Controller;
use App\Models\PenggunaanObat;
use App\Models\PopulasiKhusus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RiwayatPenggunaanObatController extends Controller
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


        $id_pasien = $request->identitas_pasien_id;

        $data_obat = $request->obat;
        if ($data_obat) {
            foreach ($data_obat as $key => $value) {
                $obat = new PenggunaanObat();
                $obat->identitas_pasien_id = $id_pasien;
                $obat->nama = $value['nama'];
                $obat->dosis = $value['dosis'];
                $obat->asal = $value['asal'];
                $obat->save();
            }
        }

        $populasi_khusus = $request->asesmen_populasi_khusus;
        if ($populasi_khusus) {
            foreach ($populasi_khusus['populasi'] as $key => $value) {
                $populasi = new PopulasiKhusus();
                $populasi->identitas_pasien_id = $id_pasien;
                if ($value == 'Lainnya') {
                    $populasi->populasi = $populasi_khusus['tambahan'];
                } else {
                    $populasi->populasi = $value;
                }
                $populasi->save();
            }
        }
        return response()->json([
            'success' => true,
        ]);
    }
}
