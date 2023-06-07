<?php

namespace App\Http\Controllers\api\assessment_data;

use App\Http\Controllers\Controller;
use App\Models\Alergi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlergiController extends Controller
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

        $form  = new Alergi();
        $form->identitas_pasien_id = $request->identitas_pasien_id;
        $form->status = $request->status == "true";
        
        if($form->status){
            $form->reaksi_alergi = $request->reaksi_alergi;
            $form->alergi = $request->alergi;
        }

        $form->save();

        return response()->json([
            'success' => true,
        ]);
    }
}
