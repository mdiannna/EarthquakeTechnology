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

    // documentation: https://appdividend.com/2018/04/17/laravel-guzzle-http-client-example/#Step_7_Guzzle_http_client_POST_request
    public function postKmeans() 
    {
    	$dataLngs = [44.43, 44.22, 44.34, 44.34, 44.31, 44.32, 45.34];
    	$dataLats = [23.43, 23.22, 23.34, 23.34, 23.37, 23.24, 23.35];

	    $client = new \GuzzleHttp\Client();
	    $response = $client->request('POST', 'http://0.0.0.0:5000/kmeans', [
	    // $response = $client->request('POST', 'http://dianarerise.pythonanywhere.com/kmeans', [
	        'form_params' => [
	            'name' => 'test',
	            'lats' => json_encode($dataLats),
	            'lngs' => json_encode($dataLngs),
	        ]
	    ]);


	    $response = $response->getBody()->getContents();
	    // echo '<pre>';
	    // print_r($response);
    	return("Response from server:   " . $response);
    }
}
