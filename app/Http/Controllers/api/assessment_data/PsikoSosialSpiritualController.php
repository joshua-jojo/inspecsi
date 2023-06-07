<?php

namespace App\Http\Controllers\api\assessment_data;

use App\Http\Controllers\Controller;
use App\Models\PsikoSosialSpiritual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PsikoSosialSpiritualController extends Controller
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

        $form = new PsikoSosialSpiritual();
        $form->identitas_pasien_id = $request->identitas_pasien_id;
        $form->psikologis_status = $request->psikologis["status"];
        
        switch ($form->psikologis_status) {
            case 'kecendrungan bunuh diri':
                $form->psikologis_dilaporkan = $request->psikologis["dilaporkan"];
                break;
            
            case 'lain-lain':
                $form->psikologis_sebutkan = $request->psikologis["sebutkan"];
                break;
            
            default:
                # code...
                break;
        }

        $form->sosial_status_perkawinan = $request->sosial["status_perkawinan"] ?? '-';
        $form->sosial_pola_interaksi = $request->sosial["pola_interaksi"];
        $form->sosial_support_system = $request->sosial["support_system"];
        $form->spiritual_agama = $request->spiritual['agama'] ?? '-';
        $form->spiritual_kebutuhan_kerohanian = $request->spiritual['kebutuhan_kerohanian'] ?? '-';
        $form->spiritual_kebutuhan_privasi_khusus = $request->spiritual['kebutuhan_privasi_khusus'] ?? '-';
        $form->spiritual_keyakinan_pelayanan_kesehatan = $request->spiritual['keyakinan_pelayanan_kesehatan'] ?? '-';

        $form->save();

        return response()->json([
            'success' => true,
        ]);
    }
}
