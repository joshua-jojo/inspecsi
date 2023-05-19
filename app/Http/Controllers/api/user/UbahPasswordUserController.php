<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UbahPasswordUserController extends Controller
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
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ])->getMessageBag()->getMessages();

        if ($error) {
            return response()->json([
                'success' => false,
                'msg' => 'data tidak sesuai.',
                'error' => $error
            ]);
        }

        $user  = User::find($request->user()->id);

        $check = Hash::check($request->old_password, $user->password);


        if ($check) {
            $user->password = bcrypt($request->password);
            $user->save();

            $credentials = [
                "email" => $user->email,
                "password" => $request->password,
            ];
            $token = auth()->attempt($credentials);
        }

        return response()->json([
            'success' => true,
            'token' => $token,
        ]);
    }
}
