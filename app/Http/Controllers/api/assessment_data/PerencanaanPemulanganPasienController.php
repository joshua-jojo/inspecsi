<?php

namespace App\Http\Controllers\api\assessment_data;

use App\Http\Controllers\Controller;
use App\Models\PerencanaanPemulanganPasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PerencanaanPemulanganPasienController extends Controller
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
        $opsi = $request->opsi;
        if ($opsi) {
            foreach ($opsi as $key => $value) {
                $form = new PerencanaanPemulanganPasien();
                $form->identitas_pasien_id = $request->identitas_pasien_id;
                $form->opsi = $value;
                $form->save();
            }
        }


        return response()->json([
            'success' => true,
        ]);
    }
}
