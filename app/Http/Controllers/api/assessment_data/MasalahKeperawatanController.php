<?php

namespace App\Http\Controllers\api\assessment_data;

use App\Http\Controllers\Controller;
use App\Models\AssessmentJob;
use App\Models\IdentitasPasien;
use App\Models\MasalahKeperawatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MasalahKeperawatanController extends Controller
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
            'identitas_pasien_id' => 'required',
        ])->getMessageBag()->getMessages();

        if ($error) {
            return response()->json([
                'success' => false,
                'msg' => 'data tidak sesuai.',
                'error' => $error
            ]);
        }

        $pasien = $request->identitas_pasien_id;
        $data = $request->data;
        if ($data) {
            foreach ($data as $key => $value) {
                $form = new MasalahKeperawatan();
                $form->identitas_pasien_id = $pasien;
                $form->kode = $value['kode'];
                $form->keterangan = $value['keterangan'];
                $form->save();
            }
        }

        $id_assessment = IdentitasPasien::find($pasien)->assessment_job_id;
        $assessment = AssessmentJob::find($id_assessment);
        $assessment->complete = 1;
        $assessment->save();

        return response()->json([
            'success' => true,
        ]);
    }
}
