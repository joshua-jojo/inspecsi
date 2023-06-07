<?php

namespace App\Http\Controllers\api\assessment_data;

use App\Http\Controllers\Controller;
use App\Models\IdentitasPasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IdentitasPasienController extends Controller
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
                    'assessment_id' => 'required|exists:assessment_jobs,id',
                    'nama' => 'required',
                    'no_rm' => 'required',
                    'tanggal_lahir' => 'required',
                    'diagnosa_medis' => 'required',
                    'ruang_rawat' => 'required',
                    'pendidikan' => 'required',
                    'tanggal_masuk' => 'required',
                    'tanggal_asesmen' => 'required',
                ])->getMessageBag()->getMessages();
        
        if($error){
            return response()->json([
                'success' => false,
                'msg' => 'data tidak sesuai.',
                'error' => $error
            ]);
        }

        $identitas = new IdentitasPasien();
        $identitas->assessment_job_id = $request->assessment_id;
        $identitas->nama = $request->nama;
        $identitas->no_rm = $request->no_rm;
        $identitas->tanggal_lahir = $request->tanggal_lahir;
        $identitas->diagnosa_medis = $request->diagnosa_medis;
        $identitas->ruang_rawat = $request->ruang_rawat;
        $identitas->pendidikan = $request->pendidikan;
        $identitas->tanggal_masuk = $request->tanggal_masuk;
        $identitas->tanggal_asesmen = $request->tanggal_asesmen;
        $identitas->user_id = $request->user()->id;
        $identitas->save();

        return response()->json([
            'success' => true,
            "pasien_id" => $identitas->id
        ]);
    }
}
