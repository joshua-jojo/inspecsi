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
        $cari = !empty($request->cari) ? $request->cari : "";
        $assessment = Assessment::with("user", 'assessment_job.user', 'assessment_job.identitas_pasien');
        $role_id = $request->user()->role_id;
        $user_id = $request->user()->id;
        if ($role_id != 1) {
            $assessment = $assessment->where("user_id", $user_id);
        }
        $assessment = $assessment->where(function ($q) use ($cari) {
            $q->where("judul", "like", "%{$cari}%");
            $q->orWhereHas("assessment_job.user", function ($user) use ($cari) {
                $user->where("name", "like", "%{$cari}%");
            });
        });
        $assessment = $assessment->latest()->get();

        return response()->json([
            'success' => true,
            'data' => $assessment
        ]);
    }
}
