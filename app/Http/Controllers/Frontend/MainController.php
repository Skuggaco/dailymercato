<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class MainController extends BaseController
{
    public function index(){
        return view('public.main.index');
    }
}
