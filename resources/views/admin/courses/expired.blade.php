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
        * {
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
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0px;
                opacity: 1
            }
        }

        @keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0;
                opacity: 1
            }
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
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }


        @-webkit-keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0px;
                opacity: 1
            }
        }

        @keyframes animatebottom {
            from {
                bottom: -100px;
                opacity: 0
            }

            to {
                bottom: 0;
                opacity: 1
            }
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
                                    <h3 class="card-title">الدورات المنتهية</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered border-top mb-0">
                                            <thead>
                                                <tr>
                                                    <th>رقم الدوره</th>
                                                    <th>عنوان الدورة</th>
                                                    <th># كود الدورة</th>
                                                    {{-- <th >مدة الدورة</th> --}}
                                                    {{-- <th >سعر الدورة</th> --}}
                                                    {{-- <th >نوع الدورة</th> --}}
                                                    {{-- <th >صورة</th> --}}
                                                    <th>تحكم</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($courses as $course)
                                                    <tr>
                                                        <th>{{ $course->id }}</th>
                                                        <td>{{ $course->title }}</td>
                                                        <td>{{ $course->code }}</td>
                                                        <td>
                                                            <div class="btn-group mt-2 mb-2">
                                                                <button type="button"
                                                                    class="btn btn-outline-secondary dropdown-toggle"
                                                                    data-toggle="dropdown">
                                                                </button>
                                                                <ul class="dropdown-menu" role="menu">
                                                                    <li>
                                                                        <a href="{{ url('/admin/courses/copy/' . $course->id) }}"
                                                                            class="dropdown-item">نسخ وإعاده إنشاء</a>
                                                                    </li>
                                                                    @if ($course->is_show == 1)
                                                                        <li>
                                                                            <a href="#"
                                                                                onclick="popUpConfirmHide({{ $course->id }})"
                                                                                class="dropdown-item">اخفاء</a>
                                                                        </li>
                                                                    @else
                                                                        <li>
                                                                            <a href="{{ url('/admin/courses/show/' . $course->id) }}"
                                                                                class="dropdown-item">عرض</a>
                                                                        </li>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {!! $courses->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>
                    <div class="modal" id="confirmDelete" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body" style="padding: 40px">
                                    <h5 class="modal-title text-danger text-center" style="font-family: 'ab';">هل تريد حذف
                                        هذة الدورة نهائيا ؟!</h5>
                                    <input type="hidden" id="course_id">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="deleteCourse()" class="btn btn-danger"> <span
                                            id="text_delete"> حذف</span> <span class="loader_area"></span></button>
                                    <button type="button" class="btn btn-info" data-dismiss="modal">لا أريد</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal" id="confirmHide" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body" style="padding: 40px">
                                    <h5 class="modal-title text-danger text-center" style="font-family: 'ab';">هل تريد اخفاء
                                        هذة الدورة ؟!</h5>
                                    <input type="hidden" id="course_id">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="hideCourse()" class="btn btn-danger"> <span
                                            id="text_hide"> اخفاء </span> <span class="loader_area_hide"></span></button>
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
        function popUpConfirmDelete(id) {
            $('#course_id').val(id);
            $('#confirmDelete').fadeIn(450).modal({
                'show': true
            });
        }

        function deleteCourse() {
            var course_id = $('#course_id').val();
            $('.loader_area').html(
                '<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>');
            $('#text_delete').html(' جارى حذف الدورة ');
            $.ajax({
                url: "{{ url('/admin/courses/delete/') }}" + "/" + course_id,
                type: 'GET',
                success: function() {
                    location.reload();
                }
            })
        }

        function popUpConfirmHide(id) {
            $('#course_id').val(id);
            $('#confirmHide').fadeIn(450).modal({
                'show': true
            });
        }

        function hideCourse() {
            var course_id = $('#course_id').val();
            console.log(course_id);
            $('.loader_area_hide').html(
                '<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>');
            $('#text_hide').html(' جارى اخفاء الدورة ');
            $.ajax({
                url: "{{ url('/admin/courses/hide/') }}" + "/" + course_id,
                type: 'GET',
                success: function() {
                    location.reload();
                }
            })
        }
    </script>
@endsection
