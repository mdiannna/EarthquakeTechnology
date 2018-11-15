<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestServerRequest;
use Illuminate\Support\Facades\Log;
use App\Models\Sensor;
use App\Models\SensorData;
use App\Models\Light;


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
        $intensity = Light::find(1)->intensity;

        return view('sensors.all', ['intensity' => $intensity]);
    }

    public function data($id) {
        return SensorData::where('sensor_id', $id)->orderByDesc('created_at')->limit(1)->get()->toJson();
    }

    public function values($id) {
        return SensorData::where('sensor_id', $id)->orderByDesc('created_at')->limit(10)->pluck('val1')->toJson();
    }

    public function allValues() {
        $data = [];
        $sensorIds = Sensor::all()->pluck('id');

        
        foreach($sensorIds as $sensorId) {
            $values = SensorData::where('sensor_id', $sensorId)->orderByDesc('created_at')->limit(10)->pluck('val1');

            array_push($data, $values);
        }

        return $data;
        // return SensorData::where('sensor_id', $id)->orderByDesc('created_at')->limit(10)->pluck('val1')->toJson();
    }

    public function alertMap() {
        return view('sensors.map');
    }
}
