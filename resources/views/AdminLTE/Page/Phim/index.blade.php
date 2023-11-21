@extends('AdminLTE.Share.masterPage')
@section('title')
    Quản Lý Phim
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Thêm Mới Phim</div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên Phim</label>
                        <input type="text" class="form-control" placeholder="Nhập tên phim" id="ten_phim" >
                    </div>
                    <div class="form-group">
                        <label>Slug Tên Phim</label>
                        <input type="text" class="form-control" placeholder="Nhập slug tên phim" id="slug_ten_phim" >
                    </div>
                    <div class="form-group">
                        <label>Đạo Diễn</label>
                        <input type="text" class="form-control" placeholder="Nhập tên đạo diễn" id="dao_dien" >
                    </div>
                    <div class="form-group">
                        <label>Diễn Viên</label>
                        <input type="text" class="form-control" placeholder="Nhập tên diễn viên" id="dien_vien" >
                    </div>
                    <div class="form-group">
                        <label>Thể Loại</label>
                        <input type="text" class="form-control" placeholder="Nhập tên thể loại" id="the_loai" >
                    </div>
                    <div class="form-group">
                        <label>Thời Lượng</label>
                        <input type="number" class="form-control" placeholder="Nhập thời lượng" id="thoi_luong" >
                    </div>
                    <div class="form-group">
                        <label>Ngày Khởi Chiếu</label>
                        <input type="date" class="form-control" placeholder="Nhập ngày khởi chiếu" id="ngay_khoi_chieu" >
                    </div>
                    <div class="form-group">
                        <label>Avatar</label>
                        <input type="text" class="form-control" placeholder="Nhập link avatar" id="avatar" >
                    </div>
                    <div class="form-group">
                        <label>Mô Tả</label>
                        <textarea type="text" class="form-control" placeholder="Nhập mô tả" id="mo_ta" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Trailer</label>
                        <input type="text" class="form-control" placeholder="Nhập link trailer" id="trailer" >
                    </div>
                    <div class="form-group">
                        <label>Tình Trạng</label>
                        <select id="tinh_trang" class="form-control">
                            <option value="1">Đang Chiếu</option>
                            <option value="2">Sắp Chiếu</option>
                            <option value="0">Ngưng Chiếu</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary" id="them_moi_phim">Thêm Mới Phim</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Danh Sách Phim</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table_phim">
                            <thead>
                                <tr>
                                    <th class="text-center text-nowrap">#</th>
                                    <th class="text-center text-nowrap">Tên Phim</th>
                                    <th class="text-center text-nowrap">Slug Tên Phim</th>
                                    <th class="text-center text-nowrap">Đạo Diễn</th>
                                    <th class="text-center text-nowrap">Diễn Viên</th>
                                    <th class="text-center text-nowrap">Thể Loại</th>
                                    <th class="text-center text-nowrap">Thời Lượng</th>
                                    <th class="text-center text-nowrap">Ngày Khởi Chiếu</th>
                                    <th class="text-center text-nowrap">Avatar</th>
                                    <th class="text-center text-nowrap">Mô Tả</th>
                                    <th class="text-center text-nowrap">Trailer</th>
                                    <th class="text-center text-nowrap">Tình Trạng</th>
                                    <th class="text-center text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#them_moi_phim').click(function() {
                var payload = {
                    'ten_phim'      : $('#ten_phim').val(),
                    'slug_ten_phim' : $('#slug_ten_phim').val(),
                    'dao_dien'      : $('#dao_dien').val(),
                    'dien_vien'     : $('#dien_vien').val(),
                    'the_loai'      : $('#the_loai').val(),
                    'thoi_luong'    : $('#thoi_luong').val(),
                    'ngay_khoi_chieu': $('#ngay_khoi_chieu').val(),
                    'avatar'        : $('#avatar').val(),
                    'mo_ta'         : $('#mo_ta').val(),
                    'trailer'       : $('#trailer').val(),
                    'tinh_trang'    : $('#tinh_trang').val(),
                }

                axios
                    .post('/admin/phim/create', payload)
                    .then((res) => {
                        console.log(res.data.trang_thai_them_moi);
                        if(res.data.slug) {
                            toastr.error('Tên Phim đã tồn tại!');
                        } else {
                            if(res.data.trang_thai_them_moi) {
                                toastr.success('Thêm mới thành công!');
                            } else {
                                toastr.error('bạn đã rơi vào ô mất lượt');
                            }
                        }
                    })
            });

            loadTable();
            function loadTable() {
                axios
                    .get('/admin/phim/data')
                    .then((res) => {
                        var list = res.data.phim;
                        var noi_dung = '';
                        $.each(list, function(key, val) {
                            noi_dung += '<tr>';
                            noi_dung += '<th>' + (key + 1) + '</th>';
                            noi_dung += '<td class="text-center text-nowrap align-midlle">' + val.ten_phim + '</td>';
                            noi_dung += '<td class="text-center text-nowrap align-midlle">' + val.slug_ten_phim + '</td>';
                            noi_dung += '<td class="text-center text-nowrap align-midlle">' + val.dao_dien + '</td>';
                            noi_dung += '<td class="text-center text-nowrap align-midlle">' + val.dien_vien.substring(0, 50) + '..</td>';
                            noi_dung += '<td class="text-center text-nowrap align-midlle">' + val.the_loai + '</td>';
                            noi_dung += '<td class="text-center text-nowrap align-midlle">' + val.thoi_luong + '</td>';
                            noi_dung += '<td class="text-center text-nowrap align-midlle">' + val.ngay_khoi_chieu + '</td>';
                            noi_dung += '<td class="text-center text-nowrap align-midlle"><img src="' + val.avatar + '" alt=""></td>';
                            noi_dung += '<td class="text-center text-nowrap align-midlle">' + val.mo_ta.substring(0, 100) + '...</td>';
                            noi_dung += '<td class="text-center text-nowrap align-midlle"><a target="_blank" href="' + val.trailer + '">TRAILER</a></td>';
                            noi_dung += '<td class="text-center text-nowrap align-midlle">';
                            if(val.tinh_trang == 1) {
                                noi_dung += '<button class="btn btn-success">Đang Chiếu</button>';
                            }else if(val.tinh_trang == 2) {
                                noi_dung += '<button class="btn btn-warning">Sắp Chiếu</button>';
                            }else {
                                noi_dung += '<button class="btn btn-danger">Ngưng Chiếu</button>';
                            }
                            noi_dung += '</td>';
                            noi_dung += '<td class="text-center text-nowrap align-middle">';
                            noi_dung += '<button class="btn btn-info mr-1">Cập Nhật</button>';
                            noi_dung += '<button class="btn btn-danger">Xoá Bỏ</button>';
                            noi_dung += '</td>';
                            noi_dung += '</tr>';
                        });
                        $('#table_phim tbody').html(noi_dung);
                    })

            }
        });
    </script>
@endsection
