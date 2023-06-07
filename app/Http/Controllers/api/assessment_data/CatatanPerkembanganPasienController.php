<?php

namespace App\Http\Controllers\api\assessment_data;

use App\Http\Controllers\Controller;
use App\Models\CatatanPerkembanganPasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CatatanPerkembanganPasienController extends Controller
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

        $form = new CatatanPerkembanganPasien();
        $form->identitas_pasien_id = $request->identitas_pasien_id;
        $form->tanggal = $request->tanggal;
        $form->implementasi = $request->implementasi;
        $form->soap_subjektif = $request->soap_subjektif;
        $form->soap_objek = $request->soap_objek;
        $form->soap_assessment = $request->soap_assessment;
        $form->soap_plan = $request->soap_plan;
        $form->save();

        return response()->json([
            'success' => true,
        ]);
    }
}
