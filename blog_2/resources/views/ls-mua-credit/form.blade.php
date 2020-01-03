@extends('layout')
@section('main-content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">@if(isset($lsMuaCredit)) Cập nhật @else Thêm @endif Lịch Sử Mua Credit</h4>
                @if(isset($lsMuaCredit))
                <form action="{{ route('ls-mua-credit.xu-ly-cap-nhat', ['id' => $lsMuaCredit->id]) }}" method="POST">
                    @else
                    <form action="{{ route('ls-mua-credit.xu-ly-them-moi') }}" method="POST">
                        @endif
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <label for="nguoi_choi_id">Người chơi ID</label>
                            <input type="text" class="form-control" id="nguoi_choi_id" name="nguoi_choi_id" @if(isset($lsMuaCredit)) value="{{ $lsMuaCredit->nguoi_choi_id}}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="goi_credit_id">Gói Credit ID</label>
                            <input type="text" class="form-control" id="goi_credit_id" name="goi_credit_id" @if(isset($lsMuaCredit)) value="{{ $lsMuaCredit->goi_credit_id}}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="credit">Credit</label>
                            <input type="text" class="form-control" id="credit" name="credit" @if(isset($lsMuaCredit)) value="{{ $lsMuaCredit->credit}}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="so_tien">Số tiền</label>
                            <input type="text" class="form-control" id="so_tien" name="so_tien" @if(isset($lsMuaCredit)) value="{{ $lsMuaCredit->so_tien}}" @endif>
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">@if(isset($lsMuaCredit)) Cập nhật @else Thêm @endif</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <!-- end col -->

    </div>
    <!-- end row -->
    @endsection