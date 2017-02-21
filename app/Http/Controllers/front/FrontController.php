<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.layouts.base');
    }

    public function nosotros()
    {
        return view('front.nosotros');
    }
}
