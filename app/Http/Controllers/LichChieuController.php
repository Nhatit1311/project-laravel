<?php

namespace App\Http\Controllers;

use App\Models\LichChieu;
use Illuminate\Http\Request;

class LichChieuController extends Controller
{
    public function viewTaoMotBuoi() {
        return view('AdminRocker.Page.LichChieu.viêw_mot_buoi');
    }

    public function index()
    {
        return view('AdminRocker.Page.LichChieu.index');
    }

    public function store(Request $request) {
        $ngay_bat_dau = $request->ngay_bat_dau;
        $ngay_ket_thuc = $request->ngay_ket_thuc;
    }

}
