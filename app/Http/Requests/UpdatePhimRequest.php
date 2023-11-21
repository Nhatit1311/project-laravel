<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePhimRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'                => 'required|exists:phims,id',
            'ten_phim'          => 'required',
            'slug_ten_phim'     => 'required|unique:phims, slug_ten_phim',
            'dao_dien'          => 'required',
            'dien_vien'         => 'required',
            'the_loai'          => 'required',
            'thoi_luong'        => 'required|numeric|min:5',
            'ngay_khoi_chieu'   => 'required|date',
            'avatar'            => 'required',
            'mo_ta'             => 'required|min:20|max:200',
            'trailer'           => 'required',
            'tinh_trang'        => 'required|numberic|min:0|max:2',
        ];
    }

    public function messages()
    {
        return [
            'id.*'                       => 'Phim phải tồn tại trong hệ thống',
            'ten_phim.*'                 => 'Tên phim không được để trống',
            'slug_ten_phim.required'     => 'Slug không được để trống',
            'slug_ten_phim.unique'       => 'Slug đã tồn tại',
            'dao_dien.*'          => 'Đạo diễn không được để trống',
            'dien_vien.*'         => 'Diễn viên không được để trống',
            'the_loai.*'          => 'Thể loại không được để trống',
            'thoi_luong.*'        => 'Thời lượng phải từ 5p trở lên',
            'ngay_khoi_chieu.*'   => 'Ngày khởi chiếu phải định dạng',
            'avatar.*'            => 'Avatar không được để trống',
            'mo_ta.*'             => 'Mô tả phải từ 20 đến 200 ký tự',
            'trailer.*'           => 'Trailer không được để trống',
            'tinh_trang.*'        => 'Tình trạng phải theo yêu cầu',
        ];
    }
}
