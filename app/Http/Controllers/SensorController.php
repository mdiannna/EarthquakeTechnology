<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestServerRequest;
use Illuminate\Support\Facades\Log;


class SensorController extends Controller
{
    public function view($id, Request $request) {
    	$data = json_encode($request->all());
		
		Log::info("New GET request from sensor " .$id . "   Date:" . now());
		Log::info($data);
        // return  response()->json(['state' => 'success']);
        
        return view('sensors.view', ['id' => $id]);
    }
}
