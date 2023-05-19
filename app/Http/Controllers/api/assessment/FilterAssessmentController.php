<?php

namespace App\Http\Controllers\api\assessment;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilterAssessmentController extends Controller
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
                    'date' => 'required|date',
                ])->getMessageBag()->getMessages();
        
        if($error){
            return response()->json([
                'success' => false,
                'msg' => 'data tidak sesuai.',
                'error' => $error
            ]);
        }

        $assessment = Assessment::with("user")->whereDate('waktu_buat',$request->date)->latest()->get();
        return response()->json([
            'success' => true,
            'data' => $assessment
        ]);
    }
}
