@extends('layout')
@section('main-content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">@if(isset($goiCredit)) Cập nhật @else Thêm @endif Gói Credit</h4>
                @if(isset($goiCredit))
                <form action="{{ route('goi-credit.xu-ly-cap-nhat', ['id' => $goiCredit->id]) }}" method="POST">
                    @else
                    <form action="{{ route('goi-credit.xu-ly-them-moi') }}" method="POST">
                        @endif
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <!-- báo lỗi -->
                        <div class="form-group">
                            @if(count($errors)>0)
                            <div class="alert alert-danger" id="thong_bao_6s">
                                <ul >
                                    <li>{{$errors->first()}}</li>
                                </ul>
                            </div>
                            @endif
                            <label for="ten_goi">Tên gói </label>
                            <input type="text" class="form-control" id="ten_goi" name="ten_goi" @if(isset($goiCredit)) value="{{ $goiCredit->ten_goi}}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="credit">Credit</label>
                            <input type="text" class="form-control" id="credit" name="credit" @if(isset($goiCredit)) value="{{ $goiCredit->credit}}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="so_tien">Số tiền</label>
                            <input type="text" class="form-control" id="so_tien" name="so_tien" @if(isset($goiCredit)) value="{{ $goiCredit->so_tien}}" @endif>
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">@if(isset($goiCredit)) Cập nhật @else Thêm @endif</button>
                        <a href="{{route('goi-credit.danh-sach')}}" class="btn btn-warning waves-effect waves-light">
                            Hủy<span class="btn-label-right"><i class="mdi mdi-close-circle-outline"></i></span>
                        </a>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <!-- end col -->

    </div>
    <!-- end row -->
    @endsection