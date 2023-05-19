<?php

namespace App\Http\Controllers\api\assessment;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use Illuminate\Http\Request;

class AllAssessmentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $assessment = Assessment::with("user")->latest()->get();

        return response()->json([
            'success' => true,
            'data' => $assessment
        ]);
    }
}
