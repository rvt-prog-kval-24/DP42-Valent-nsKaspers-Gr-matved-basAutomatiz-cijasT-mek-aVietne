<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Invoice;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class MainController extends Controller{

    public function main(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $posts = Post::orderBy('id', 'desc')->where('active', true)->with('user')->paginate(9);

        $companiesQuantity = Company::all()->count();
        $paymentsQuantity = Invoice::where('paid', true)->count();

        return view('main', compact('posts', 'companiesQuantity', 'paymentsQuantity'));
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
