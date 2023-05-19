<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Models\RoleAkses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
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
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ])->getMessageBag()->getMessages();

        if ($error) {
            return response()->json([
                'success' => false,
                'msg' => 'data tidak sesuai.',
                'errors' => $error
            ]);
        }

        $credentials = $request->only(['email', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'msg' => 'data email atau password tidak sesuai.',
            ]);
        }

        $user = auth('api')->user()->load('role');
        $user->only('name', 'email', 'foto', 'role');
        return response()->json([
            'success' => true,
            'msg' => 'login berhasil',
            'user' => $user,
            'token' => $token,
        ]);
    }
}
