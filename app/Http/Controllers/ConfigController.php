<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index()
    {
        $config = Config::orderByDESC('id')->first();
        return view('AdminRocker.Page.CauHinh.index', compact('config'));
    }

    public function store(Request $request) {
        $data = $request->all();

        Config::create($data);

        return redirect()->back();
    }

}
