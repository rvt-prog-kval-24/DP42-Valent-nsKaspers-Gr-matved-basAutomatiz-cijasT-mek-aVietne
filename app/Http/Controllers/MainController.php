<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class MainController extends Controller{

    public function main(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('main');
    }

    public function about(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('about');
    }

    public function services(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('services');
    }



    public function Account_management(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('Account_management');
    }

    public function Managing_administrators(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('Managing_administrators');
    }

    public function Company_management(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('Company_management');
    }

}
