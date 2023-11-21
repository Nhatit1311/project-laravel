@extends('AdminRocker.Share.master')
@section('noi_dung')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Quản Lý Phòng</div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nhập Tên Phòng</label>
                        <input type="text" class="form-control" placeholder="Nhập tên phòng" id="ten_phong">
                    </div>
                    <div class="form-group">
                        <label>Nhập Tình Trạng</label>
                        <select class="form-control" id="tinh_trang">
                            <option value="1">Hoạt Động</option>
                            <option value="0">Tạm Tắt</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nhập Số Ghế Hàng Dọc</label>
                        <input type="number" class="form-control" placeholder="Nhập hàng dọc" id="hang_doc">
                    </div>
                    <div class="form-group">
                        <label>Nhập Số Ghế Hàng Ngang</label>
                        <input type="number" class="form-control" placeholder="Nhập hàng ngang" id="hang_ngang">
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button id="them_moi" class="btn btn-primary">Thêm mới phòng</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Danh Sách Các Phòng</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-nowrap">Tên Phòng</th>
                                    <th class="text-nowrap">Tình Trạng</th>
                                    <th class="text-nowrap">Số Ghế Hàng Dọc</th>
                                    <th class="text-nowrap">Số Ghế Hàng Ngang</th>
                                    <th class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            {{-- modal delete --}}
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLable" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLable">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <b>Xoá Phòng!</b>
                                            <input class="form-control" type="hidden" id="delete_id" placeholder="Nhập vào id cần xoá">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button id="delete_accept" type="button" class="btn btn-primary" data-dismiss="modal">Đồng ý xoá</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- update modal --}}
                            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLable" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLable">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" class="form-control" id="edit_id">
                                            <div class="form-group">
                                                <label>Nhập Tên Phòng</label>
                                                <input type="text" class="form-control" placeholder="Nhập tên phòng" id="edit_ten_phong">
                                            </div>
                                            <div class="form-group">
                                                <label>Nhập Tình Trạng</label>
                                                <select class="form-control" id="edit_tinh_trang">
                                                    <option value="1">Hoạt Động</option>
                                                    <option value="0">Tạm Tắt</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Nhập Số Ghế Hàng Dọc</label>
                                                <input type="number" class="form-control" placeholder="Nhập hàng dọc" id="edit_hang_doc">
                                            </div>
                                            <div class="form-group">
                                                <label>Nhập Số Ghế Hàng Ngang</label>
                                                <input type="number" class="form-control" placeholder="Nhập hàng ngang" id="edit_hang_ngang">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button id="update_accept" type="button" class="btn btn-primary" data-dismiss="modal">Cập nhật</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </table>
                        {{-- ghe modal --}}
                        <div class="modal fade" id="gheModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLable" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLable">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-primary text-center">
                                            Màn Hình
                                        </div>
                                        <table class="table table-bordered" id="table_ghe">
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            var id_phong = 0;
            var hang_ngang = 0;
            var hang_doc = 0;

            // thêm mới
            $("#them_moi").click(function() {
                var payload = {
                    'ten_phong':    $('#ten_phong').val(),
                    'tinh_trang':   $('#tinh_trang').val(),
                    'hang_doc':     $('#hang_doc').val(),
                    'hang_ngang':   $('#hang_ngang').val(),
                }

                axios
                    .post('/admin/phong/index', payload)
                    .then((res) => {
                        loadData();
                        toastr.success("Thêm mới thành công");
                        $('#ten_phong').val('');
                        $('#tinh_trang').val('');
                        $('#hang_doc').val('');
                        $('#hang_ngang').val('');
                    });
            });

            // hiển thị dữ liệu
            function showTable(list_phong) {
                var noi_dung = '';
                $.each(list_phong, function(key, value) {
                    noi_dung += '<tr>';
                    noi_dung += '<th>' + (key + 1) + '</th>';
                    noi_dung += '<td>' + value.ten_phong + '</td>';
                    noi_dung += '<td class="text-nowrap">';
                    if(value.tinh_trang) {
                        noi_dung += '<button data-id="' + value.id + '" class="xxx btn btn-primary">Hoạt Động</button>';
                    }else {
                        noi_dung += '<button data-id="' + value.id + '" class="xxx btn btn-warning">Tạm Dừng</button>';
                    }
                    noi_dung += '</td>';
                    noi_dung += '<td>' + value.hang_doc + '</td>';
                    noi_dung += '<td>' + value.hang_ngang +'</td>';
                    noi_dung += '<td class="text-nowrap">';
                    noi_dung += '<button class="ghe btn btn-primary mr-1" data-hangdoc="'+ value.hang_doc +'" data-hangngang="'+ value.hang_ngang +'" data-id="' + value.id + '" data-toggle="modal" data-target="#gheModal">Xem Ghế</button>';
                    noi_dung += '<button class="edit btn btn-info mr-1" data-id="' + value.id + '" data-toggle="modal" data-target="#editModal">Cập Nhật</button>';
                    noi_dung += '<button class="del btn btn-danger" data-id="' + value.id + '" data-toggle="modal" data-target="#deleteModal">Xoá Bỏ</button>';
                    noi_dung += '</td>';
                    noi_dung += '</tr>';
                });

                $('#table tbody').html(noi_dung);
            }

            // thay đổi status
            $('body').on('click', '.xxx', function() {
                var id = $(this).data('id');
                axios
                    .get('/admin/phong/change-status/' + id)
                    .then((res) => {
                        loadData();
                        toastr.success("Đã đổi trạng thái thành công");
                    })
            });

            // xoá
            $('body').on('click', '.del', function() {
                var id = $(this).data('id');
                $('#delete_id').val(id);
            });

            $('#delete_accept').click(function() {
                var id_can_xoa = $('#delete_id').val();
                axios
                    .get('/admin/phong/delete/' + id_can_xoa)
                    .then((res) => {
                        loadData();
                        toastr.success("Xoá phòng thành công");
                    })
            });

            // cập nhật
            $('body').on('click', '.edit', function() {
                var id = $(this).data('id');
                axios
                    .get('/admin/phong/edit/' + id)
                    .then((res) => {
                        var phong = res.data.data;
                        $('#edit_id').val(phong.id);
                        $('#edit_ten_phong').val(phong.ten_phong);
                        $('#edit_tinh_trang').val(phong.tinh_trang);
                        $('#edit_hang_doc').val(phong.hang_doc);
                        $('#edit_hang_ngang').val(phong.hang_ngang);
                    })
            });

            $('#update_accept').click(function() {
                var payload = {
                    'id': $('#edit_id').val(),
                    'ten_phong':    $('#edit_ten_phong').val(),
                    'tinh_trang':   $('#edit_tinh_trang').val(),
                    'hang_doc':     $('#edit_hang_doc').val(),
                    'hang_ngang':   $('#edit_hang_ngang').val(),
                }

                axios
                    .post('/admin/phong/update', payload)
                    .then((res) => {
                        loadData();
                        toastr.success("Cập nhật thành công");
                    });
            })

            // load data
            loadData();
            function loadData() {
                axios
                    .get('/admin/phong/data')
                    .then((res) => {
                        showTable(res.data.list);
                    });
            }

            function loadGhe(id_phong, hang_ngang, hang_doc) {
                axios
                    .get('/admin/phong/data-ghe/' + id_phong)
                    .then((res) => {
                        var list_ghe = res.data.danh_sach_ghe;
                        var noi_dung = '';
                        var x = 0;

                        for(j = 0; j < hang_ngang; j++) {
                            noi_dung += '<tr>';
                            for(i = 0; i < hang_doc; i++) {
                                x = j * hang_doc + i;
                                if(list_ghe[x].tinh_trang) {
                                    noi_dung += '<th data-id="'+ list_ghe[x].id +'" class="text-center align-middle" style="width: 70px; height: 70px; background-color: #def5ef">' + list_ghe[x].ten_ghe + '</th>';
                                }else {
                                    noi_dung += '<th data-id="'+ list_ghe[x].id +'" class="text-center align-middle" style="width: 70px; height: 70px; background-color: red">' + list_ghe[x].ten_ghe + '</th>';
                                }
                            }
                            noi_dung += '</tr>';
                        }
                        $('#table_ghe').html(noi_dung);
                    });
            }

            $('body').on('click', '.ghe', function() {
                id_phong = $(this).data('id');
                hang_ngang = $(this).data('hangngang');
                hang_doc = $(this).data('hangdoc');
                loadGhe(id_phong, hang_ngang, hang_doc);

            });
        });
    </script>
@endsection
