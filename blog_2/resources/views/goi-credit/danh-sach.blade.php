@extends('layout')
@section('css')
<!-- third party css -->
<link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<!-- third party css end -->
@endsection
@section('main-content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Danh sách gói credit @if(isset($listGoiCreditRestore)) đã xóa @endif</h4>
                <!-- @if(!isset($listLinhVucRestore)) -->
                <div style="display:flex;justify-content: center;align-items:center;">
                    <a style="margin-bottom:10px" href="{{ route('goi-credit.them-moi') }}" class="btn btn-info btn-rounded waves-effect waves-light">
                        <span class="btn-label">
                            <i class=" fas fa-plus">
                            </i>
                        </span>Thêm mới<i>
                        </i>
                    </a>
                    <a style="margin-bottom:10px;margin-left:10px" href="{{ route('goi-credit.restore') }}" class="btn btn-success btn-rounded waves-effect waves-light">
                        <span class="btn-label">
                            <i class="mdi mdi-restore">
                            </i>
                        </span>Phục hồi<i>
                        </i>
                    </a>

                </div>
                @else
                <a style="margin-bottom:10px" href="{{ route('quan-tri-vien.danh-sach') }}" class="btn btn-primary btn-rounded waves-effect waves-light">Trở về danh sách</a>
                @endif
                <table id="linh-vuc-table" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên gói</th>
                            <th>Credit</th>
                            <th>Số tiền</th>
                            <th></th>
                            
                        </tr>
                    </thead>         
                    <tbody>
                        @if(isset($listGoiCreditRestore))
                        <!-- Restore -->
                        @foreach($listGoiCreditRestore as $goiCredit)
                        <tr>
                           <td>{{ $goiCredit->id }}</td>
                           <td>{{ $goiCredit->ten_goi }}</td>
                           <td>{{ $goiCredit->credit }}</td>
                           <td>{{ $goiCredit->so_tien }}</td>
                           <td>
                            <a href="{{ route('goi-credit.xu-ly-restore',['id'=> $goiCredit->id]) }}"  class="btn btn-success waves-effect waves-light "><i class="mdi mdi-restore"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    @foreach($listGoiCredit as $goiCredit)
                    <tr>
                     <td>{{ $goiCredit->id }}</td>
                     <td>{{ $goiCredit->ten_goi }}</td>
                     <td>{{ $goiCredit->credit }}</td>
                     <td>{{ $goiCredit->so_tien }}</td>
                     <td> 
                        <a href="{{ route('goi-credit.cap-nhat', ['id' => $goiCredit->id]) }}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-pencil-minus"></i></a>
                        <a href="{{ route('goi-credit.xoa', ['id' => $goiCredit->id]) }}" class="btn btn-danger waves-effect waves-light"><i class=" mdi mdi-delete"></i></a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>

    </div> <!-- end card body-->
</div> <!-- end card -->
</div><!-- end col-->
</div>
<!-- end row-->
@endsection
@section('css')
<!-- third party css -->
<link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<!-- third party css end -->
@endsection

@section('js')
<!-- third party js -->
<script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>
<!-- third party js ends -->

<script type="text/javascript">
    $(document).ready(function(){
        $("#linh-vuc-table").DataTable({
            language:{paginate:{
                previous:"<i class='mdi mdi-chevron-left'>",
                next:"<i class='mdi mdi-chevron-right'>"
            }
        },
        drawCallback:function(){
            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
        }
    });
    });
</script>

@endsection