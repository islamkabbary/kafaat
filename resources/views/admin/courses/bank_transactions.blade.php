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
                            @if(session()->has('success'))
                                <div class="container-fluid alert alert-success" style="    float: right;">
                                    <span style="    float: right;">{{session()->get('success')}}</span>

                                </div>

                            @endif
                                @if(session()->has('failed'))
                                    <div class="container-fluid alert alert-danger">
                                        <span >{{session()->get('failed')}}</span>

                                    </div>

                                @endif
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">  الحوالات البنكيه</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered border-top mb-0" >
                                            <thead>
                                            <tr>
                                                <th >تاريخ  رفع الحواله</th>
                                                <th >إسم الطالب</th>
                                                <th >رقم جوال الطالب</th>
                                                <th >بريد الطالب الإلكترونى</th>
                                                <th >رقم الحواله</th>
{{--                                                <th >الدوره المدفوع لها</th>--}}
{{--                                                <th >كود الدوره المدفوع لها</th>--}}
                                                <th > فاتورة الحوالة البنكية </th>
                                                <th >التحكم </th>
                                            </tr>
                                            </thead>
                                            <tbody >
                                            @foreach($bankTransactions as $bankTransaction)
                                                @if($bankTransaction->user)
                                                <tr >
                                                    <td style="color:#000;">{{date("Y-m-d" , strtotime($bankTransaction->created_at))}}</td>
                                                    <td style="color:#000;">{{$bankTransaction->user->username}}</td>
                                                    <td style="color:#000;">{{$bankTransaction->user->phone}}</td>
                                                    <td style="color:#000;">{{$bankTransaction->user->email}}</td>
                                                    <td style="color:#000;">{{$bankTransaction->id}}</td>
{{--                                                    <td style="color:#000;">{{json_encode($bankTransaction->course_title)}}</td>--}}
{{--                                                    <td style="color:#000;">{{json_encode($bankTransaction->course_code)}}</td>--}}
                                                    <td style="color:#000;">
                                                        <a href="{{url('/admin/bank_transaction/receipt/'.$bankTransaction->id)}}" class="btn btn-info" >عرض الفاتورة</a>

                                                    </td>

                                                    <td style="color:#000;">
                                                        @if($bankTransaction->paid == 0)
                                                        <a href="{{url('/admin/bank_transaction/confirm/'.$bankTransaction->id)}}" class="btn btn-success"d>إضافه الطالب للدوره</a>
                                                        @else
                                                         <span style="color: green">تم إضافه الطالب</span>
                                                        @endif
                                                    </td>


                                                </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal" id="confirmDelete" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-body" style="padding: 40px">
                                    <h5 class="modal-title text-danger text-center" style="font-family: 'ab';">هل تريد  حذف هذة الدورة نهائيا ؟!</h5>
                                    <input type="hidden" id="course_id">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" onclick="deleteCourse()" class="btn btn-danger"> <span id="text_delete"> حذف</span>  <span class="loader_area"></span></button>
                                    <button type="button" class="btn btn-info" data-dismiss="modal">لا أريد</button>
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
            $('#text_delete').html(' جارى حذف الدورة ');
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
