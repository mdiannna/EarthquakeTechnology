<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Light;

class EnergyController extends Controller
{
    
    public function getEnergy() {
	    $energyData = [];
	    for($i=0; $i<10; $i++) {
	    	$energyData[$i] = rand(10, 2000);
	    }
        return  $energyData;
    }

    public function setIntensity($intensity, Request $request) {
    	$light = Light::find(1);
    	$light->intensity = $intensity;
    	$light->save();
        return  response()->json(["success" => "true"]);
    }

}
