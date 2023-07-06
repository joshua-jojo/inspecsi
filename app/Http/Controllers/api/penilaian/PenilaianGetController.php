<?php

namespace App\Http\Controllers\api\penilaian;

use App\Http\Controllers\Controller;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianGetController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $assessment_job = Penilaian::where('assessment_job_id',$request->id)->latest()->first();
        return response()->json([
            'success' => true,
            'data' => $assessment_job
        ]);
    }
}
