<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EStoreController extends Controller
{
    function index(){
        return view('e-store.index');
    }


}
