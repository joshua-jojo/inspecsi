<?php

namespace App\Http\Controllers\api\profil;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UbahFotoProfilController extends Controller
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
            'id' => 'required',
            'foto' => 'required|mimes:jpeg,png,jpg',
        ])->getMessageBag()->getMessages();

        if ($error) {
            return response()->json([
                'success' => false,
                'msg' => 'data tidak sesuai.',
                'errors' => $error
            ]);
        }
        $file = $request->file('foto');
        $date = date('y-m-d-H-i-s');
        $name = "{$date}-{$file->getClientOriginalName()}";
        $path = "images";
        $file->move(public_path($path), $name);
        $url = "{$path}/{$name}";

        $user = User::find($request->id);
        $user->foto = $url;
        $user->save();

        return response()->json([
            'success' => true,
        ]);
    }
}
