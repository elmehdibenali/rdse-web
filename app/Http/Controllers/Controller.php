<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function viewServices(){
        return view('admin.services');
    }
}
