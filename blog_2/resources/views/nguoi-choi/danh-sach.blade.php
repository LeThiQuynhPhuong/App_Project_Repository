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
<div class="row" >
    <div class="col-12" >
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Danh sách người chơi @if(isset($listNguoiChoiRestore)) đã xóa @endif</h4>
                @if(!isset($listNguoiChoiRestore))
                <div style="display:flex;justify-content: center;align-items:center;">
                    <a style="margin-bottom:10px" href="{{ route('nguoi-choi.them-moi') }}" class="btn btn-info btn-rounded waves-effect waves-light">
                        <span class="btn-label">
                            <i class=" fas fa-plus">
                            </i>
                        </span>Thêm mới<i>
                        </i>
                    </a>
                    <a style="margin-bottom:10px;margin-left:10px" href="{{ route('nguoi-choi.restore') }}" class="btn btn-success btn-rounded waves-effect waves-light">
                        <span class="btn-label">
                            <i class="mdi mdi-restore">
                            </i>
                        </span>Phục hồi<i>
                        </i>
                    </a>
                </div>
                @else
                <a style="margin-bottom:10px" href="{{ route('nguoi-choi.danh-sach') }}" class="btn btn-primary btn-rounded waves-effect waves-light">Trở về danh sách</a>
                @endif
                <table id="nguoiChoi-datatable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Hình đại diện</th>
                            <th>Tên đăng nhập</th>
                            <!-- <th>Mật khẩu</th> -->
                            <th>Email</th>    
                            <th>Điểm cao nhất</th>
                            <th>Credit</th>
                            <th></th>
                        </tr>
                    </thead>
                    
                    
                    <tbody>
                        @if(isset($listNguoiChoiRestore))
                        <!-- restore -->
                        @foreach($listNguoiChoiRestore as $nguoiChoi)
                        <tr>
                            <td>{{ $nguoiChoi->id }}</td>
                            <td><img @if($nguoiChoi->hinh_dai_dien=="") src="{{ asset('assets/images/nguoi-choi/user-empty.png') }}" @else src="{{ asset('assets/images/nguoi-choi/'.$nguoiChoi->hinh_dai_dien)}}" @endif width="50px" class="rounded-circle"  alt=""></td>
                            <td>{{ $nguoiChoi->ten_dang_nhap }} </td>
                            <!-- <td>{{ $nguoiChoi->mat_khau}} </td> -->
                            <td>{{ $nguoiChoi->mail}} </td>
                            <td>{{ $nguoiChoi->diem_cao_nhat }} </td>
                            <td>{{ $nguoiChoi->credit }} </td>
                            <td >
                                <a href="{{ route('nguoi-choi.xu-ly-restore',['id'=> $nguoiChoi->id]) }}"  class="btn btn-success waves-effect waves-light "><i class="mdi mdi-restore"></i></a>
                                
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <!-- danh sách-->
                        @foreach($listNguoiChoi as $nguoiChoi)
                        <tr>
                            <td>{{ $nguoiChoi->id }}</td>
                            <td><img @if($nguoiChoi->hinh_dai_dien=="") src="{{ asset('assets/images/nguoi-choi/user-empty.png') }}" @else src="{{ asset('assets/images/nguoi-choi/'.$nguoiChoi->hinh_dai_dien)}}" @endif width="50px" class="rounded-circle"  alt=""></td>
                            <td>{{ $nguoiChoi->ten_dang_nhap }} </td>
                            <!-- <td>{{ $nguoiChoi->mat_khau}} </td> -->
                            <td>{{ $nguoiChoi->mail}} </td>
                            <td>{{ $nguoiChoi->diem_cao_nhat }} </td>
                            <td>{{ $nguoiChoi->credit }} </td>
                            <td >
                                <a href="{{ route('nguoi-choi.cap-nhat',['id'=> $nguoiChoi->id]) }}" class="btn btn-purple waves-effect waves-light"><i class=" mdi mdi-pencil-outline"></i></a>
                                <a href="{{ route('nguoi-choi.xoa',['id'=> $nguoiChoi->id]) }}" class="btn btn-danger waves-effect waves-light change-status"><i class="fe-trash-2"></i></button>
                                    
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

    <!-- Datatables init -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#nguoiChoi-datatable").DataTable({
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    }
                },
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                }
            });
        });
    </script>
    @endsection