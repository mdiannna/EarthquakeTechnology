<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Light;

class LightController extends Controller
{
    
    public function getIntensity() {
    	// return 1;
    	$light = Light::find(1);

        return  response()->json($light->intensity);
    }

    public function setLight($intensity, Request $request) {
    	$light = Light::find(1);
    	$light->intensity = $intensity;
    	$light->save();
        return  response()->json(["success" => "true"]);
    }
}
