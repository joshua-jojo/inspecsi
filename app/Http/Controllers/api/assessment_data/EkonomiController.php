<?php

namespace App\Http\Controllers\api\assessment_data;

use App\Http\Controllers\Controller;
use App\Models\Ekonomi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EkonomiController extends Controller
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

        $form = new Ekonomi();
        $form->identitas_pasien_id = $request->identitas_pasien_id;
        $form->pembiayaan_kesehatan = $request->pembiayaan_kesehatan ?? '-';
        $form->penanggung_jawab_pasien = $request->penanggung_jawab_pasien ?? '-';
        $form->status_pekerjaaan = $request->status_pekerjaaan ?? '-';
        $form->save();
        
        return response()->json([
            'success' => true,
        ]);
    }
}
