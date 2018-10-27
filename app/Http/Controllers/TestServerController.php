<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestServerRequest;

class TestServerController extends Controller
{
    public function testGet(TestServerRequest $request) {
    	$data = json_encode($request->all());
    	return view('get', compact('data'));
    }

    public function testPost(TestServerRequest $request) {
    	$data = json_encode($request->all());
    	$request->session()->put('data', $data);
    	$request->session()->put('data', 'hello');

    	return "success!!!!!!!1";
    	// dd();
    }

    public function viewPost(TestServerRequest $request) {
    	$data = json_encode($request->session('data'));

    	return view('post', compact('data'));
    }

    public function viewRawPost() {
    	$data = json_encode($request->session('data'));

    	return $data;
    	// return view('post', $data);
    }

    public function testGetSuccessMessage() {
        return "Bravo Nastea!";
    }
}
