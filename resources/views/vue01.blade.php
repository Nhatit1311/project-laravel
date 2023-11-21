@extends('AdminLTE.Share.masterPage')
@section('title')
    DEMO VUEJS
@endsection
@section('content')
    <div id="app" class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Danh sách sinh viên
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Tên Phòng</th>
                                <th class="text-center">Tình Trạng</th>
                                <th class="text-center">Số Ghế Hàng Dọc</th>
                                <th class="text-center">Số Ghế Hàng Ngang</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in list_phong">
                                <th class="text-center align-middle">@{{ key + 1 }}</th>
                                <td class="text-center align-middle">@{{ value.ten_phong }}</td>
                                <td class="text-center align-middle">@{{ value.tinh_trang }}</td>
                                <td class="text-center align-middle">@{{ value.hang_doc }}</td>
                                <td class="text-center align-middle">@{{ value.hang_ngang }}</td>
                                <td class="text-center align-middle">
                                    <button v-on:click="edit_phong = value" class="btn btn-info" data-toggle="modal" data-target="#editModal">Cập Nhật</button>
                                    <button class="btn btn-danger">Xoá Bỏ</button>
                                </th>
                            </tr>
                        </tbody>
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLable" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLable">Cập Nhật</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" id="edit_id">
                                        <div class="form-group">
                                            <label>Nhập Tên Phòng</label>
                                            <input v-bind:value="edit_phong.ten_phong" type="text" class="form-control" placeholder="Nhập tên phòng" id="edit_ten_phong">
                                        </div>
                                        <div class="form-group">
                                            <label>Nhập Tình Trạng</label>
                                            <select v-bind:value="edit_phong.tinh_trang" class="form-control" id="edit_tinh_trang">
                                                <option value="1">Hoạt Động</option>
                                                <option value="0">Tạm Tắt</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nhập Số Ghế Hàng Dọc</label>
                                            <input v-bind:value="edit_phong.hang_doc" type="number" class="form-control" placeholder="Nhập hàng dọc" id="edit_hang_doc">
                                        </div>
                                        <div class="form-group">
                                            <label>Nhập Số Ghế Hàng Ngang</label>
                                            <input v-bind:value="edit_phong.hang_ngang" type="number" class="form-control" placeholder="Nhập hàng ngang" id="edit_hang_ngang">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button id="update_accept" type="button" class="btn btn-primary" data-dismiss="modal">Cập nhật</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        // khởi tạo đối tượng Vue sẽ quản lý element có id là app
        new Vue({
            el: '#app',
            data: {
                list_phong: [],
                edit_phong: {},
            },
            created() {
                this.loadData();
            },
            methods: {
                loadData() {
                    axios
                        .get('/admin/phong/data')
                        .then((res) => {
                            this.list_phong = res.data.list;
                        })
                }
            },
        });
    </script>
@endsection
