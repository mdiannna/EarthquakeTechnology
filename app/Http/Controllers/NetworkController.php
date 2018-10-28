<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Light;

class NetworkController extends Controller
{
    public function trainSensors() {
    	return view('nn.train');
    }
}
