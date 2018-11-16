<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;
use Guzzle\Plugin\Oauth\OauthPlugin;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;


class ClusteringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {


// $command = escapeshellcmd('/usr/custom/test.py');
// $output = shell_exec($command);
// echo $output;
      return view('before-earthquake.index');
    }

    public function postKmeans() 
    {

    $client = new \GuzzleHttp\Client();
    $response = $client->request('POST', 'http://0.0.0.0:5000/kmeans', [
        'form_params' => [
            'name' => 'test',
        ]
    ]);
    $response = $response->getBody()->getContents();
    // echo '<pre>';
    // print_r($response);
    	return("Response from server:   " . $response);
    }
}
