<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() {
        return view('vue01');
    }

    public function indexRocker() {
        return view('AdminRocker.Page.index');
    }
}
