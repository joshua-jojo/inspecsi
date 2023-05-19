<?php

namespace App\Http\Controllers\api\role;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class GetAllRoleController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $role = Role::all();
        return response()->json([
            'success' => true,
            'data' => $role
        ]);
    }
}
