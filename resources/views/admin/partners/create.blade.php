@extends('admin.index')
@section('main')
    <!-- Data table css -->
    <link href="../assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="../assets/plugins/datatable/jquery.dataTables.min.css" rel="stylesheet" />
    <!-- file Uploads -->
    <link href="{{url('/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css" />
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
        <div class="page-main h-100 container">

            <div class="app-content my-3 my-md-5">
                <div class="side-app">
                    {{--                    <div class="card">--}}
                    {{--                        <div class="card-header">--}}
                    {{--                            <h3 class="card-title">File Uploads</h3>--}}
                    {{--                        </div>--}}
                    {{--                        <div class=" card-body">--}}
                    {{--                            <div class="row">--}}
                    {{--                                <div class="col-lg-4 col-sm-12">--}}
                    {{--                                    <input type="file" class="dropify" data-height="180" />--}}
                    {{--                                </div>--}}
                    {{--                                <div class="col-lg-4 col-sm-12">--}}
                    {{--                                    <input type="file" class="dropify" data-default-file="../assets/images/media/media1.jpg" data-height="180"  />--}}
                    {{--                                </div>--}}
                    {{--                                <div class="col-lg-4 col-sm-12">--}}
                    {{--                                    <input type="file" class="dropify" disabled="disabled" data-height="180" />--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <br>--}}
                    {{--                            <div class="form-group">--}}
                    {{--                                <div class="custom-file">--}}
                    {{--                                    <input type="file" class="custom-file-input" name="example-file-input-custom">--}}
                    {{--                                    <label class="custom-file-label">Choose file</label>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <div class="card m-b-20" style="max-width: 1000px">
                        <div class="card-header">
                            <h3 class="card-title">?????????? ???????? ????????</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('partners.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">??????????</label>
                                    <input type="text" name="company_name" class="form-control" id="exampleInputname"  placeholder="?????? ????????????">
                                </div>

                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="logo">
                                        <label class="custom-file-label">????????????</label>
                                    </div>
                                </div>


                                <div class="form-group mb-0">
                                    <div class="checkbox checkbox-secondary">
                                        <button type="submit" class="btn btn-danger btn-block ">?????????? ????????</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- file uploads js -->
    <script src="{{url('/assets/plugins/fileuploads/js/fileupload.js')}}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var elements = document.getElementsByTagName("INPUT");
            for (var i = 0; i < elements.length; i++) {
                elements[i].oninvalid = function(e) {
                    e.target.setCustomValidity("");
                    if (!e.target.validity.valid) {
                        e.target.setCustomValidity("?????????? ?????????? ???????????? ?????? ??????????");
                    }
                };
                elements[i].oninput = function(e) {
                    e.target.setCustomValidity("");
                };
            }
        })
    </script>
@endsection
