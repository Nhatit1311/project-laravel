@extends('AdminRocker.Share.master')
@section('noi_dung')
    <div class="row">
        <div class="col-md-4">
            <form action="/admin/cau-hinh/index" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">
                        Cấu Hình Hệ Thống
                    </div>
                    <div class="card-body">
                        <div class="form-group mt-3">
                            <div class="input-group">
                                <label for="">Ảnh Nền Trang Chủ </label>
                                <input id="hinh_anh" class="form-control" type="text" name="filepath">
                                <span class="input-group-prepend">
                                    <a id="lfm" data-input="hinh_anh" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                            </div>
                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Cập Nhật Cấu Hình</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
<script>
    var route_prefix = "/laravel-filemanager";
</script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $("#lfm").filemanager('image', {prefix : route_prefix});
</script>
@endsection
