<?php

namespace App\Http\Controllers;

use App\Models\Ghe;
use App\Models\Phong;
use Illuminate\Http\Request;

class PhongController extends Controller
{
    public function index()
    {
        return view('AdminLTE.Page.Phong.index');
    }

    // thêm mới
    public function store(Request $request) {
        // 1. Thêm mới phòng
        $newPhong = Phong::create([
            'ten_phong'     => $request->ten_phong,
            'tinh_trang'    => $request->tinh_trang,
            'hang_ngang'    => $request->hang_ngang,
            'hang_doc'      => $request->hang_doc,
        ]);

        for($dong = 1; $dong < $request->hang_ngang; $dong++) {
            $chu = chr($dong + 64);
            for($cot = 1; $cot < $request->hang_doc; $cot++) {
                $ten_ghe = $chu . $cot;
                Ghe::create([
                    'ten_ghe'       => $ten_ghe,
                    'tinh_trang'    => 1,
                    'id_phong'      => $newPhong->id,
                ]);
            }
        }
    }

    // lấy dữ liệu
    public function getData() {
        $data = Phong::get(); // lấy ra tất cả dữ liệu

        return response()->json([
            'list' => $data
        ]);
    }

    // thay đổi trạng thái
    public function changeStatus($id) {
        $phong = Phong::where('id', $id)->first(); // lấy ra id

        if($phong) {
            $phong->tinh_trang = !$phong->tinh_trang; // thay đổi trạng thái hoạt động -> tạm tắt và ngược lại
            $phong->save();
        }


    }

    // xoá
    public function destroy($id) {
        $phong = Phong::where('id', $id)->first();

        if($phong) {
            Ghe::where('id_phong', $id)->delete(); // xoá ghế dựa vào id phòng
            $phong->delete();
        }
    }

    // cập nhật
    public function edit($id) {
        $phong = Phong::where('id', $id)->first(); // lấy ra id cần cập nhật

        return response()->json([
            'data' => $phong
        ]);
    }

    public function update(Request $request) {
        $phong = Phong::where('id', $request->id)->first();

        if($phong) {
            $phong->ten_phong = $request->ten_phong;
            $phong->tinh_trang = $request->tinh_trang;
            $phong->hang_doc = $request->hang_doc;
            $phong->hang_ngang = $request->hang_ngang;
            $phong->save();

            // xoá sạch ghế trong phòng
            Ghe::where('id_phong', $request->id)->delete();
            //tạo mới số ghế $request->hang_doc * $request->hang_ngang
            for($dong = 1; $dong < $request->hang_ngang; $dong++) {
                $chu = chr($dong + 64);
                for($cot = 1; $cot < $request->hang_doc; $cot++) {
                    $ten_ghe = $chu . $cot;
                    Ghe::create([
                        'ten_ghe'       => $ten_ghe,
                        'tinh_trang'    => 1,
                        'id_phong'      => $request->id,
                    ]);
                }
            }
        }
    }

    public function getDataGhe($id_phong) {
        // lấy ra tất cả các ghế trong phòng
        $data = Ghe::where('id_phong', $id_phong)->get();

        return response()->json([
            'danh_sach_ghe' => $data
        ]);
    }
}
