<?php

namespace App\Http\Controllers\api\ketua_tim;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SemuaKetuaTimController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $ketua_tim = User::where('role_id',4)->get();

        return response()->json([
            'success' => true,
            'data' => $ketua_tim
        ]);
    }
}
