<?php

namespace App\Http\Controllers\api\assessment_job;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FindAssessmentJobController extends Controller
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
                    'assessment_id' => 'required|exists:assessments,id',
                ])->getMessageBag()->getMessages();
        
        if($error){
            return response()->json([
                'success' => false,
                'msg' => 'data tidak sesuai.',
                'error' => $error
            ]);
        }

        $assessment = Assessment::with("assessment_job.user")->find($request->assessment_id);

        return response()->json([
            'success' => true,
            'data' => $assessment
        ]);
    }
}
