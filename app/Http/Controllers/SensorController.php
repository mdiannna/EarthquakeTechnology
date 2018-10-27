<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestServerRequest;
use Illuminate\Support\Facades\Log;
use App\Models\SensorData;

class SensorController extends Controller
{
    public function view($id, Request $request) {
    	$data = json_encode($request->all());
		
		Log::info("New GET request from sensor " .$id . "   Date:" . now());
		Log::info($data);
        // return  response()->json(['state' => 'success']);
        
        return view('sensors.view', ['id' => $id]);
    }

    public function sendData($id, Request $request) {
    	$data = json_encode($request->all());
        $sensorData = new SensorData;
        $sensorData->val1 = $request->data;
        $sensorData->val2 = $request->data2;
        $sensorData->val3 = $request->data3;
        $sensorData->sensor_id = $id;
        $sensorData->other_data = $request->other_data;

        $sensorData->save();


		Log::info("New GET request from sensor " .$id . "   Date:" . now());
		Log::info($data);
        // return  response()->json(['state' => 'success']);
        
        // return view('sensors.view', ['id' => $id]);
        return  response()->json(['state' => 'success']);
    }

    public function allDevices() {
        return view('sensors.all');
    }
}
