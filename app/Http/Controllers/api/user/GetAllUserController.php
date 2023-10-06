<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class GetAllUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $all_user = User::latest()->get();

        $all_user->map(function ($q) {
            $q->foto = $q->foto ? url($q->foto) : null;
            return $q;
        });

        return response()->json([
            'success' => true,
            'data' => $all_user
        ]);
    }
}
