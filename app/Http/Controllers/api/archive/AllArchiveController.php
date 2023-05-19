<?php

namespace App\Http\Controllers\api\archive;

use App\Http\Controllers\Controller;
use App\Models\Archive;
use Illuminate\Http\Request;

class AllArchiveController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $archive = Archive::latest()->get();

        return response()->json([
            'success' => true,
            'data' => $archive
        ]);
    }
}
