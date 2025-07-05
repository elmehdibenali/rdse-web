<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;


class HomeController extends Controller
{
    public function index() {
        $services = Service::all();
        $user = Auth::user();
        return view('homepage' , compact('user','services'));
    }
}
