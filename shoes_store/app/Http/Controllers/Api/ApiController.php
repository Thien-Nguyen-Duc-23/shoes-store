<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

abstract class ApiController extends Controller
{
    protected $compacts;

    protected function jsonRender($data = [])
    {
        $this->compacts['message'] = [
            'code' => 200,
            'status' => true,
        ];

        $compacts = array_merge($data, $this->compacts);

        return response()->json($compacts);
    }
}
