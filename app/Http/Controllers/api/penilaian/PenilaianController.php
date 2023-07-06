<?php

namespace App\Http\Controllers\api\penilaian;

use App\Http\Controllers\Controller;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $penilaian = new Penilaian();
        $penilaian->assessment_job_id = intval($request->assessment_job);
        $penilaian->saran = $request->saran;
        $penilaian->tanggapan = $request->tanggapan;
        
        for ($i=1; $i <= 27; $i++) { 
            $penilaian["pertanyaan_$i"] = $request["pertanyaan_$i"];
        }

        $penilaian->jumlah = intval($request->jumlah);
        $penilaian->save();
        return response()->json([
            'success' => true,
            'msg' => $penilaian
        ]);
    }
}
