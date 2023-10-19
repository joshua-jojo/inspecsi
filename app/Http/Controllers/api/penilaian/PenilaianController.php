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
        $id_assessment_job = intval($request->assessment_job);

        $penilaian_job = Penilaian::where('assessment_job_id',$id_assessment_job)->first();
        if(empty($penilaian_job)){
            $penilaian = new Penilaian();
            $penilaian->assessment_job_id = $id_assessment_job;
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
        else {
            $penilaian_job->saran = $request->saran;
            $penilaian_job->tanggapan = $request->tanggapan;
            for ($i=1; $i <= 27; $i++) { 
                $penilaian_job["pertanyaan_$i"] = $request["pertanyaan_$i"];
                $penilaian_job->save();
            }
            return response()->json([
                'success' => false,
                'msg' => $penilaian_job
            ]);
        }
    }
}
