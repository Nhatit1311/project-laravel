<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePhimRequest;
use App\Http\Requests\CreateRegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    // login
    public function viewLogin() {
        return view('Client.login');
    }

    public function actionLogin(LoginRequest $request) {
        $password = bcrypt($request->password);
        $check = Customer::where('email', $request->email)
                        ->where('password', $password)
                        ->first();

        if($check) {
            if($check->loai_tai_khoan == -1) {
                toastr()->error("Tài khoản đã bị khoá");
            }else if($check->loai_tai_khoan == 0) {
                toastr()->warning("Tài khoản chưa được kích hoạt");
            }else {
                toastr()->success("Đã đăng nhập thành công");
            }
        }else {
            toastr()->error("Tài khoản hoặc Mật khẩu không đúng");
        }

        return redirect()->back();
    }

    // dang ky
    public function viewRegister() {
        return view('Client.register');
    }

    public function actionRegister(CreateRegisterRequest $request) {
        $data = $request->all(); // lấy ra tất cả
        $hash = Str::uuid(); // tạo ra một chuỗi string 36 kí tự không trùng nhau
        $data['hash_mail'] = $hash;
        $data['password'] = bcrypt($data['password']);


        Customer::create($data);

        toastr()->success("Đã tạo tài khoản thành công");
        return redirect('/login');
    }

    // kich hoat tai khoan
    public function actionActive($hash) {
        $account = Customer::where('hash_mail', $hash)->first();
        if($account && $account->loai_tai_khoan == 0) { // 0 là tài khoản mới tạo
            $account->loai_tai_khoan = 1;
            $account->hash_mail = '';
            $account->save();
            toastr()->success("Đã kích hoạt tài khoản");
        }else {
            toastr()->error("Thông tin không chính xác");
        }

        return redirect('/login');
    }

    // reset mật khẩu
    public function viewResetPassword() {
        return view('Client.quen_mat_khau');
    }

    public function actionResetPassword(ResetPasswordRequest $request) {
        // kiểm tra xem cái email hiện tại có bằng email trên server không nếu trùng thì sẽ lấy ra
        $customer = Customer::where('email', $request->email)->first();
        $hash = Str::uuid(); // tạo chuỗi kí tự không trùng cho hash_reset
        $customer->hash_reset = $hash;
        $customer->save();

        toastr()->success("Vui lòng kiểm tra email");
        return redirect()->back();
    }

    // update mật khẩu
    public function viewUpdatePassword($hash) {
        $customer = Customer::where('hash_reset', $hash)->first();

        if($customer) {
            return view('Client.update_password', compact('hash'));
        } else {
            toastr()->error('Liên kết không tồn tại!');
            return redirect('/');
        }
    }

    public function actionUpdatePassword(UpdatePasswordRequest $request) {
        $customer = Customer::where('hash_reset', $request->hash_reset)->first();

        $customer->hash_reset = '';
        $customer->password = bcrypt($request->password);
        $customer->save();

        toastr()->success('Đã cập nhật mật khẩu thành công!');

        return redirect('/login');
    }
}
