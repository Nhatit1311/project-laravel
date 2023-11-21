@extends('AdminRocker.Share.master')
@section('noi_dung')
    <div class="row" class="app">
        <div class="col-md-12">
            <div class="card border-primary border-bottom border-3 border-0">
                <div class="card-header">
                    <strong>Thêm Mới Lịch Chiếu</strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Chọn Phim</label>
                            <select v-model="create_lich.id_phim" class="form-control">
                                <template v-for="(value, key) in list_phim" v-if="value.tinh_trang > 0">
                                    <option v-bind:value="value.id">@{{ value.ten_phim }}</option>
                                </template>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label v-model="create_lich.thoi_luong_chieu_chinh" class="form-label">Thời Lượng Chiếu Chính</label>
                            <input min="0" class="form-control" type="number">
                        </div>
                        <div class="col-md-3">
                            <label>Thời Lượng Quảng Cáo</label>
                            <input v-model="create_thoi_gian_quang_cao" min="0" type="time" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label>Ngày Chiếu Phim</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Giờ Bắt Đầu</label>
                            <input v-model="create_lich.thoi_gian_bat_dau" type="time" class="form-control">

                        </div>
                        <div class="col-md-3">
                            <label>Giờ Kết Thúc</label>
                            <input v-model="create_lich.thoi_gian_ket_thuc" type="time" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Phòng Chiếu Phim</label>
                            <select v-model="create_lich.id_phong" class="form-control">
                                <template v-for="(value, key) in list_phong" v-if="value.tinh_trang == 1">
                                    <option v-bind:value="value.id">@{{ value.ten_phong }}</option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary">Thêm Lịch Chiếu</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        new Vue({
            el: '#app',
            data: {
                create_lich: {},
                list_phong: [],
                list_phim: [],
            },
            created() {
                this.loadDataPhim();
                this.loadDataPhong();
            },
            methods: {
                loadDataPhim() {
                    axios
                        .get('/admin/phim/data')
                        .then((res) => {
                            this.list_phim = res.data.phim;
                        });
                },
                loadDataPhong() {
                    axios
                        .get('/admin/phong/data')
                        .then((res) => {
                            this.list_phong = res.data.list;
                        });
                }
            }
        });
    </script>
@endsection
