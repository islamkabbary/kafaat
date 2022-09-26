@extends('admin.index')
@section('main')
    <!-- Data table css -->
    <link href="../assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatable/jquery.dataTables.min.css" rel="stylesheet" />

    <!--Loader-->
    <div id="global-loader">
        <img src="../assets/images/loader.svg" class="loader-img" alt="">
    </div>
    <style>
        *{
            font-family: 'ar';
        }
    </style>

    <div class="page">
        <div class="page-main h-100">

            <div class="app-content my-3 my-md-5">
                <div class="side-app">


                    <div class="row">
                        <div class="col-md-12 col-lg-12">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">الشركاء</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered border-top mb-0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>إسم الشريك</th>
                                                <th>الصوره</th>

                                                <th>تحكم</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($partners as $partner)
                                                <tr>
                                                    <th>{{$partner->id}}</th>
                                                    <td>{{$partner->company_name}}</td>
                                                    <td><img src="{{$partner->logo}}" width="150px" height="50px"></td>
                                                    <td>
                                                        <a href="{{url('/admin/partners/delete/'.$partner->id)}}" class="btn btn-danger">حذف</a>
                                                        <a href="{{url('/admin/partners/edit/'.$partner->id)}}" class="btn btn-info">تعديل</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
{!! $partners->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
