<?php

namespace App\Http\Controllers\api\assessment_data;

use App\Http\Controllers\Controller;
use App\Models\AnalisisData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnalisisDataController extends Controller
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

        $data = $request->data;
        $id_pasien = $request->identitas_pasien_id;
        if($data){
            foreach ($data as $key => $value) {
                $form = new AnalisisData();
                $form->identitas_pasien_id = $id_pasien;
                $form->subjektif = $value['subjektif'];
                $form->objektif = $value['objektif'];
                $form->penyebab = $value['penyebab'];
                $form->masalah = $value['masalah'];
                $form->save();
            }
        }

        return response()->json([
            'success' => true,
            'msg' => [
                $request->all()
            ]
        ]);
    }
}
