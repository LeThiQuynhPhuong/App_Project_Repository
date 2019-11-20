@extends('layout')
@section('main-content')
  <div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">@if(isset($luotChoi)) Cập nhật @else Thêm @endif Lượt Chơi</h4>
                @if(isset($luotChoi))
                <form action="{{ route('luot-choi.xu-ly-cap-nhat', ['id' => $luotChoi->id]) }}" method="POST">
                @else
                <form action="{{ route('luot-choi.xu-ly-them-moi') }}" method="POST">
                @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group">
                        <label for="nguoi_choi_id">Người chơi ID</label>
                        <input type="text" class="form-control" id="nguoi_choi_id" name="nguoi_choi_id" @if(isset($luotChoi)) value="{{ $luotChoi->nguoi_choi_id}}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="so_cau">Số Câu</label>
                        <input type="text" class="form-control" id="so_cau" name="so_cau" @if(isset($luotChoi)) value="{{ $luotChoi->so_cau}}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="diem">Điểm</label>
                        <input type="text" class="form-control" id="diem" name="diem" @if(isset($luotChoi)) value="{{ $luotChoi->diem}}" @endif>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">@if(isset($luotChoi)) Cập nhật @else Thêm @endif</button>
                </form>

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <!-- end col -->

  </div>
                <!-- end row -->
@endsection