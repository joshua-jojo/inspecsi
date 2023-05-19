<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
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
                    'name' => 'required',
                    'email' => 'required|unique:users,email',
                    'password' => 'required|confirmed',
                    'role_id' => 'required',
                ])->getMessageBag()->getMessages();
        
        if($error){
            return response()->json([
                'success' => false,
                'msg' => 'data tidak sesuai.',
                'errors' => $error
            ]);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'success' => true,
            'msg' => 'pendaftaran berhasil'
        ]);
    }
}
