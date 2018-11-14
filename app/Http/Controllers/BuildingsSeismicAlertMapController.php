<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pin;
use App\Models\Building;


class BuildingsSeismicAlertMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('buildings.seismic_alert_map');
    }
  
}
