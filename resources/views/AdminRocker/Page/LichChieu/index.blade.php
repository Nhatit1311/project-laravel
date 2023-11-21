@extends('AdminRocker.Share.master')
@section('noi_dung')
    <div class="row" id="app">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Thêm Mới Lịch Chiếu</div>
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
                            <label class="form-label">Thời Lượng Chiếu Chính</label>
                            <input v-model="create_lich.thoi_gian_chieu_chinh" min="0" class="form-control" type="number">
                        </div>
                        <div class="col-md-3">
                            <label>Thời Lượng Quảng Cáo</label>
                            <input v-model="create_lich.thoi_gian_quang_cao" min="0" type="number" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label>Ngày Bắt Đầu</label>
                            <input v-model="create_lich.ngay_bat_dau" type="date" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Ngày Kết Thúc</label>
                            <input v-model="create_lich.ngay_ket_thuc" type="date" class="form-control">

                        </div>
                        <div class="col-md-3">
                            <label>Giờ Bắt Đầu</label>
                            <input v-model="create_lich.gio_bat_dau" type="time" class="form-control">

                        </div>
                        <div class="col-md-3">
                            <label>Giờ Kết Thúc</label>
                            <input v-model="create_lich.gio_ket_thuc" type="time" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label>Chọn Thứ</label><br>
                            <div class="form-check form-check-inline">
                                <input v-model="create_lich.thu_2" type="checkbox" class="form-check-input" value="option1" id="inlineCheckbox1">
                                <label class="form-check-label" for="inlineCheckbox1">Thứ 2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input v-model="create_lich.thu_3" type="checkbox" class="form-check-input" value="option2" id="inlineCheckbox2">
                                <label class="form-check-label" for="inlineCheckbox2">Thứ 3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input v-model="create_lich.thu_4" type="checkbox" class="form-check-input" value="option3" id="inlineCheckbox3">
                                <label class="form-check-label" for="inlineCheckbox3">Thứ 4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input v-model="create_lich.thu_5" type="checkbox" class="form-check-input" value="option4" id="inlineCheckbox4">
                                <label class="form-check-label" for="inlineCheckbox4">Thứ 5</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input v-model="create_lich.thu_6" type="checkbox" class="form-check-input" value="option5" id="inlineCheckbox5">
                                <label class="form-check-label" for="inlineCheckbox5">Thứ 6</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input v-model="create_lich.thu_7" type="checkbox" class="form-check-input" value="option6" id="inlineCheckbox6">
                                <label class="form-check-label" for="inlineCheckbox6">Thứ 7</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input v-model="create_lich.thu_8" type="checkbox" class="form-check-input" value="option7" id="inlineCheckbox7">
                                <label class="form-check-label" for="inlineCheckbox2">Chủ Nhật</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Chọn Phòng Chiếu</label>
                            <select v-model="create_lich.id_phong" class="form-control">
                                <template v-for="(value, key) in list_phong" v-if="value.tinh_trang == 1">
                                    <option v-bind:value="value.id">@{{ value.ten_phong }}</option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button v-on:click="createLichChieu()" class="btn btn-primary">Thêm Mới Lịch Chiếu</button>
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
            list_phim: [],
            list_phong: [],
        },
        created() {
            this.loadDataPhim();
            this.loadDataPhong();
        },
        methods: {
            createLichChieu() {
                axios
                .post('/admin/lich-chieu/create', this.create_lich)
                .then((res) => {

                })
                .catch((res) => {
                    $.each(res.response.data.errors, function(k, v) {
                        toastr.error(v[0]);
                    });
                });
            },
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
