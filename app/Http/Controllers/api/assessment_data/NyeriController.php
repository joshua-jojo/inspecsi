<?php

namespace App\Http\Controllers\api\assessment_data;

use App\Http\Controllers\Controller;
use App\Models\Nyeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NyeriController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $error = Validator::make($request->all(),[
                    'identitas_pasien_id' => 'required',
                ])->getMessageBag()->getMessages();
        
        if($error){
            return response()->json([
                'success' => false,
                'msg' => 'data tidak sesuai.',
                'error' => $error
            ]);
        }
        $form = new Nyeri();
        $form->status = $request->status == 'true';
        $form->identitas_pasien_id = $request->identitas_pasien_id;

        if($form->status){
            $form->durasi = $request->durasi;
            $form->faktor = $request->faktor;
            $form->kapan = $request->kapan;
            $form->karakteristik = $request->karakteristik;
            $form->lokasi = $request->lokasi;
            $form->skala = $request->skala;
        }
        $form->save();
        
        return response()->json([
            'success' => true,
        ]);
    }
}
