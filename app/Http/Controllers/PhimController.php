<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckIdPhimRequest;
use App\Http\Requests\CreatePhimRequest;
use App\Http\Requests\UpdatePhimRequest;
use App\Models\Phim;
use Illuminate\Http\Request;

class PhimController extends Controller
{
    public function index()
    {
        return view('AdminLTE.Page.Phim.index');
    }

    public function store(Request $request) {
        $phim = Phim::where('slug_ten_phim', $request->slug_ten_phim)->first();
        if($phim) {
            return response()->json([
                'slug' => true,
            ]);
        }else {
            $data   = $request->all();
            Phim::create($data);
            return response()->json([
                'trang_thai_them_moi' => true,
            ]);
        }
    }

    public function getData() {
        $data = Phim::orderByDESC('created_at')->get();
        return response()->json([
            'phim' => $data,
        ]);
    }

    // vue
    public function indexVue() {
        return view('AdminLTE.Page.Phim.index_vue');
    }

    // thêm mới phim
    public function storeVue(CreatePhimRequest $request) {
        $data = $request->all(); // lấy ra tất cả
        Phim::create($data); // thêm mới
    }

    // xoá phim
    public function destroy(CheckIdPhimRequest $request) {
        Phim::where('id', $request->id)->first()->delete();
        // Phim::find($request->id)->delete();

        return response()->json([
            'status' => true,
        ]);
    }

    public function update(UpdatePhimRequest $request) {
        $data = $request->all(); // lấy tất cả dữ liệu ra
        $phim = Phim::where('id', $request->id); // lấy cái id ra để cập nhật
        $phim->update($data); // update phim

        return response()->json([
            'status' => true,
        ]);
    }

}
