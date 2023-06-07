<?php

namespace App\Http\Controllers\api\assessment_data;

use App\Http\Controllers\Controller;
use App\Models\CatatanPerkembanganPasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GetCatatanPerkembanganPasienController extends Controller
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

        $catatan = CatatanPerkembanganPasien::where('identitas_pasien_id',$request->identitas_pasien_id)->get();

        return response()->json([
            'success' => true,
            'data' => $catatan
        ]);
    }
}
