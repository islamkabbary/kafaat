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

        @keyframes floating {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(10px);
            }
            100% {
                transform: translateY(0px);
            }
        }

        @-webkit-keyframes animatebottom {
            from { bottom:-100px; opacity:0 }
            to { bottom:0px; opacity:1 }
        }

        @keyframes animatebottom {
            from{ bottom:-100px; opacity:0 }
            to{ bottom:0; opacity:1 }
        }
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }

        #loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            width: 80px;
            height: 80px;
            margin: -75px 0 0 -75px;
            border: 16px solid #CECECD;
            border-radius: 50%;
            border-top: 16px solid #c82333;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }


        @-webkit-keyframes animatebottom {
            from { bottom:-100px; opacity:0 }
            to { bottom:0px; opacity:1 }
        }

        @keyframes animatebottom {
            from{ bottom:-100px; opacity:0 }
            to{ bottom:0; opacity:1 }
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
                                    <h3 class="card-title"> ?????????????? ????????????????</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered border-top mb-0">
                                            <thead>
                                            <tr>
                                                <th >?????? ????????????</th>
                                                <th >?????????? ????????????</th>
                                                <th ># ?????? ????????????</th>
                                                <th > ?????? ????????????</th>
                                                <th >???????? ?????? ????????????</th>
                                            </tr>
                                            </thead>
                                            <tbody style="color: black">
                                            @foreach($courses->unique('course_id') as $course)
                                                <tr>
                                                    <th>{{$course->course_id}}</th>
                                                    <td>{{$course->course->title}}</td>

                                                    <td>{{$course->course->code}}</td>
                                                    <td>{{$course->course->type}}</td>


                                                    <td>





                                                            <a href="{{url('/admin/courses/students/'.$course->course->id)}}" class="btn btn-info" >?????? ????????????</a>








                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
{{-- {!! $courses->withQueryString()->links('pagination::bootstrap-5') !!} --}}
                        </div>
                    </div>
                    <div class="modal" id="confirmDelete" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-body" style="padding: 40px">
                                    <h5 class="modal-title text-danger text-center" style="font-family: 'ab';">???? ????????  ?????? ?????? ???????????? ???????????? ??!</h5>
                                    <input type="hidden" id="course_id">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" onclick="deleteCourse()" class="btn btn-danger"> <span id="text_delete"> ??????</span>  <span class="loader_area"></span></button>
                                    <button type="button" class="btn btn-info" data-dismiss="modal">???? ????????</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        function popUpConfirmDelete(id){
            $('#course_id').val(id);
            $('#confirmDelete').fadeIn(450).modal({'show' : true});
        }
        function deleteCourse(){
            var course_id = $('#course_id').val();
            $('.loader_area').html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>');
            $('#text_delete').html(' ???????? ?????? ???????????? ');
            $.ajax({
                url : "{{url('/admin/courses/delete/')}}"+"/"+course_id,
                type : 'GET',
                success:function (){
                    location.reload();

                }

            })
        }
    </script>
@endsection
