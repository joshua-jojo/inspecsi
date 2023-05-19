<?php

namespace App\Http\Controllers\api\assessment;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\AssessmentJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MeAssessmentController extends Controller
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
            'date' => 'required',
        ])->getMessageBag()->getMessages();

        if ($error) {
            return response()->json([
                'success' => false,
                'msg' => 'data tidak sesuai.',
                'error' => $error
            ]);
        }

        $assessment =  AssessmentJob::with('assessment.user')->where('user_id', auth()->user()->id)->whereHas("assessment", function ($q) use ($request) {
            if($request->date != "all"){
                $q->whereDate('waktu_buat', '=',$request->date);
            }
        })->latest()->get();

        $assessment = $assessment->map(function ($q) {
            $data =  $q->assessment;
            return $data;
        });
        return response()->json([
            'success' => true,
            'data' => $assessment
        ]);
    }
}
