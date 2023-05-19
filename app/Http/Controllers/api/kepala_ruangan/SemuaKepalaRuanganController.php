<?php

namespace App\Http\Controllers\api\kepala_ruangan;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SemuaKepalaRuanganController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $kepala_ruangan = User::where('role_id',3)->get();
        return response()->json([
            'success' => true,
            'data' => $kepala_ruangan
        ]);
    }
}
