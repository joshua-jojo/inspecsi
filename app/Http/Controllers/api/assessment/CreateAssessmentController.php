<?php

namespace App\Http\Controllers\api\assessment;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\AssessmentJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateAssessmentController extends Controller
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
            'judul' => 'required',
            'waktu_buat' => 'required',
        ])->getMessageBag()->getMessages();

        if ($error) {
            return response()->json([
                'success' => false,
                'msg' => 'data tidak sesuai.',
                'error' => $error
            ]);
        }

        $user = $request->user();

        $assessment = new Assessment();
        $assessment->judul = $request->judul;
        $assessment->waktu_buat = $request->waktu_buat;
        $assessment->waktu_berakhir = date('Y-m-d', strtotime($assessment->waktu_buat . ' + 3 days'));;
        $assessment->user_id = $user->id;
        $assessment->save();

        foreach ($request->user as $key => $value) {
            $assessment_job = new AssessmentJob();
            $assessment_job->user_id = $value;
            $assessment_job->assessment_id = $assessment->id;
            $assessment_job->save();
        }

        return response()->json([
            'success' => true,
            'msg' => "Assessment berhasil di buat."
        ]);
    }
}
