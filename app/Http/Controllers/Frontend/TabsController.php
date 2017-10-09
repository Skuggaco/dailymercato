<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class TabsController extends BaseController
{
    public function hottestTab(){
        return view('public.page-tabs.hottest');
    }

    public function officialRankTab(){
        return view('public.page-tabs.officialRank');
    }
}
