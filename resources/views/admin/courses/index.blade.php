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
        #loader2  {
            animation: rotate 1s infinite;  
            height: 50px;
            width: 50px;
        }
        #loader2:before,
        #loader2:after {   
            border-radius: 50%;
            content: '';
            display: block;
            height: 20px;  
            width: 20px;
        }
        #loader2:before {
            animation: ball1 1s infinite;  
            background-color: #cb2025;
            box-shadow: 30px 0 0 #f8b334;
            margin-bottom: 10px;
        }
        #loader2:after {
            animation: ball2 1s infinite; 
            background-color: #00a096;
            box-shadow: 30px 0 0 #97bf0d;
        }

        
@keyframes rotate {
  0% { 
    -webkit-transform: rotate(0deg) scale(0.8); 
    -moz-transform: rotate(0deg) scale(0.8);
  }
  50% { 
    -webkit-transform: rotate(360deg) scale(1.2); 
    -moz-transform: rotate(360deg) scale(1.2);
  }
  100% { 
    -webkit-transform: rotate(720deg) scale(0.8); 
    -moz-transform: rotate(720deg) scale(0.8);
  }
}

@keyframes ball1 {
  0% {
    box-shadow: 30px 0 0 #f8b334;
  }
  50% {
    box-shadow: 0 0 0 #f8b334;
    margin-bottom: 0;
    -webkit-transform: translate(15px,15px);
    -moz-transform: translate(15px, 15px);
  }
  100% {
    box-shadow: 30px 0 0 #f8b334;
    margin-bottom: 10px;
  }
}

@keyframes ball2 {
  0% {
    box-shadow: 30px 0 0 #97bf0d;
  }
  50% {
    box-shadow: 0 0 0 #97bf0d;
    margin-top: -20px;
    -webkit-transform: translate(15px,15px);
    -moz-transform: translate(15px, 15px);
  }
  100% {
    box-shadow: 30px 0 0 #97bf0d;
    margin-top: 0;
  }
}
.getCoursesLoader{
    display:none;
    background:#fff;
    z-index: 999;
    border-radius:2px;
    padding-top:90px;
}
    </style>

    <div class="page tblFilter">
        <div class="page-main h-100">
            <div class="app-content my-3 my-md-5">
                <div class="side-app">
                    <div class="row">
                        <div class="card-body p-1">
                            <label class="custom-control custom-checkbox mb-3">
                                <input style="display:none;" onclick="getCoursesByTypeId(1, this)" id="type_id_input-1" type="checkbox"
                                    class="custom-control-input" name="checkbox7" value="option3">
                                <span class="custom-control-label">
                                    <a onclick=" getCoursesByTypeId(1, this)" id="type_id_input-1"
                                        style="font-family: 'ab';color: #AAAAA9">حضورى</a>
                                </span>
                            </label>
                            <label class="custom-control custom-checkbox mb-3">
                                <input onclick=" getCoursesByTypeId(2, this)" id="type_id_input-2" type="checkbox"
                                    class="custom-control-input" name="checkbox7" value="option3">
                                <span class="custom-control-label">
                                    <a onclick=" getCoursesByTypeId(2, this)" id="type_id_input-2"
                                        style="font-family: 'ab';color: #AAAAA9">عن بعد</a>
                                </span>
                            </label>
                            <label class="custom-control custom-checkbox mb-3">
                                <input onclick=" getCoursesByTypeId(3, this)" id="type_id_input-3" type="checkbox"
                                    class="custom-control-input" name="checkbox7" value="option3">
                                <span class="custom-control-label">
                                    <a onclick=" getCoursesByTypeId(3, this)" id="type_id_input-3"
                                        style="font-family: 'ab'; color: #AAAAA9">مشاهده</a>
                                </span>
                            </label>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="row fetchDataHere" id="myDiv">
                                <div class="card position-relative">
                                    <div class="getCoursesLoader w-100 h-100 justify-content-center position-absolute">
                                        <div id="loader2"></div>
                                    </div>
                                    <div class="card-header">
                                        <h3 class="card-title">الدورات</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered border-top mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>عنوان الدورة</th>
                                                        <th>كود الدورة</th>
                                                        <th>مدة الدورة</th>
                                                        <th>سعر الدورة</th>
                                                        <th>نوع الدورة</th>
                                                        <th>صورة</th>
                                                        <th>تحكم</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="showCourses">
                                                    @foreach ($courses as $course)
                                                        <tr <?php if($course->is_show == 0){echo "style='background-color:#eee;'"; } ?> >
                                                            <th>{{ $course->id }}</th>
                                                            <td>{{ $course->title }}</td>
                                                            <td>{{ $course->code }}</td>
                                                            <td>{{ $course->duration }}</td>
                                                            <td>
                                                                @if ($course->offer)
                                                                    {{ $course->price_after_discount }}
                                                                @else
                                                                    {{ $course->price }}
                                                                @endif
                                                            </td>
                                                            <td>{{ $course->type }}</td>
                                                            <td><img src="{{ $course->image_cover }}"
                                                                    style="max-width: 150px;height: 150px"></td>
                                                            <td>
                                                                <div class="btn-group mt-2 mb-2">
                                                                    <button type="button"
                                                                        class="btn btn-outline-secondary dropdown-toggle"
                                                                        data-toggle="dropdown">
                                                                    </button>
                                                                    <ul class="dropdown-menu" role="menu">
                                                                        <li>
                                                                            <a href="{{ url('/admin/courses/edit/' . $course->id) }}"
                                                                                class="dropdown-item">تعديل</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="{{ url('/admin/courses/show/' . $course->id) }}"
                                                                                class="dropdown-item">عرض</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#"
                                                                                onclick="popUpConfirmDelete({{ $course->id }})"
                                                                                class="dropdown-item">حذف</a>
                                                                        </li>
                                                                        @if ($course->is_show == 1)
                                                                            <li>
                                                                                <a href="#"
                                                                                    onclick="popUpConfirmHide({{ $course->id }})"
                                                                                    class="dropdown-item">اخفاء</a>
                                                                            </li>
                                                                        @else
                                                                            <li>
                                                                                <a href="#"
                                                                                    onclick="popUpConfirmShow({{ $course->id }})"
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
                                        <!-- NAVIGATION BAR -->
                                        <nav aria-label="Page navigation example" class="mt-3">
                                            <ul class="pagination justify-content-end">
                                                <li class="page-item disabled">
                                                    <a class="page-link">السابق</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">التالي</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <!-- {!! $courses->withQueryString()->links('pagination::bootstrap-5') !!} -->
                            </div>
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
                                    <h5 class="modal-title text-danger text-center" style="font-family: 'ab';">هل تريد
                                        اخفاء
                                        هذة الدورة نهائيا ؟!</h5>
                                    <input type="hidden" id="course_id">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="hideCourse()" class="btn btn-danger"> <span
                                            id="text_delete"> اخفاء</span> <span class="loader_area"></span></button>
                                    <button type="button" class="btn btn-info" data-dismiss="modal">لا أريد</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal" id="confirmShow" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body" style="padding: 40px">
                                    <h5 class="modal-title text-danger text-center" style="font-family: 'ab';">
                                        هل تريد إظهار هذه الدورة ؟
                                    </h5>
                                    <input type="hidden" id="course_id">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="hideCourse()" class="btn btn-danger"> <span
                                            id="text_delete"> عرض</span> <span class="loader_area"></span></button>
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
        function popUpConfirmShow(id) {
            $('#course_id').val(id);
            $('#confirmShow').fadeIn(450).modal({
                'show': true
            });
        }

        function hideCourse() {
            var course_id = $('#course_id').val();
            $('.loader_area').html(
                '<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>');
            $('#text_delete').html(' جارى اخفاء الدورة ');
            $.ajax({
                url: "{{ url('/admin/courses/hide/') }}" + "/" + course_id,
                type: 'GET',
                success: function() {
                    location.reload();

                }

            })
        }

        function getCoursesByTypeId(id, elem) {
            $('.getCoursesLoader').css('display', 'flex');
            $(elem).parents('.custom-control').addClass('active');
            $(elem).parents('.custom-control').siblings().removeClass('active');
            console.log(id);
            if ($('#type_id_input-' + id).is(':checked')) {
                $.ajax({
                    url: '/type-id/courses/' + id,
                    type: 'GET',
                    success: function(courses) {
                        $('#showCourses').empty();
                        var url = window.location.origin;
                        if (courses != 0) {
                            for (var i = 0; i < courses.length; i++) {
                                var FavouriteIcon = '';
                                if (courses[i].isFavouritToAuthUser == 1) {
                                    FavouriteIcon =
                                        "<a style='cursor:pointer;' class='item-card2-icons-l favItem2'  data-toggle='tooltip' title='إزاله الدوره من المفضله'> <i onclick='removeFavourites(event)' data-id='" +
                                        courses[i].id + "' class='fa fa-heart favss2" + courses[i].id +
                                        " text-danger'></i></a>";
                                } else {
                                    FavouriteIcon =
                                        "<a style='cursor:pointer;' class='item-card2-icons-l favItem2' data-toggle='tooltip' title='إضافه الدوره للمفضله' > <i onclick='addFavourites(event)' data-id='" +
                                        courses[i].id + "' class='fa fa-heart favss" + courses[i].id +
                                        " text-white'></i></a>";
                                }
                                var course_offer = '';
                                if (courses[i].type === 1) {
                                    course_type = "Online";
                                } else if (courses[i].type === 2) {
                                    course_type = "Registered";
                                } else {
                                    course_type = "Headquarter";
                                }
                                if (courses[i].offer != null) {
                                    course_offer =
                                        '<div class="ribbon ribbon-top-right text-danger"><span class="bg-danger" style="font-family: \'ab\'">عرض</span></div>';
                                }
                                $('#showCourses').append(
                                    `
                                    <tr ${courses[i].is_show == 0 ? "style='background-color:#eee;'": ''} >
                                        <th>${courses[i].id}</th>
                                        <td>${courses[i].title}</td>
                                        <td>${courses[i].code}</td>
                                        <td>${courses[i].duration}</td>
                                        <td>
                                            ${courses[i].offer == null ? courses[i].price: courses[i].price_after_discount}
                                        </td>
                                        <td>${courses[i].type}</td>
                                        <td><img src="${courses[i].image_cover}"
                                                style="max-width: 150px;height: 150px"></td>
                                        <td>
                                            <div class="btn-group mt-2 mb-2">
                                                <button type="button"
                                                    class="btn btn-outline-secondary dropdown-toggle"
                                                    data-toggle="dropdown">
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="{{ url('/admin/courses/edit/' . '${courses[i].id}') }}"
                                                            class="dropdown-item">تعديل</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ url('/admin/courses/show/' . '${courses[i].id}') }}"
                                                            class="dropdown-item">عرض</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            onclick="popUpConfirmDelete(${courses[i].id})"
                                                            class="dropdown-item">حذف</a>
                                                    </li>
                                                    ${courses[i].is_show == 1 ?
                                                        `<li>
                                                            <a href="#"
                                                                onclick="popUpConfirmHide(${courses[i].id})"
                                                                class="dropdown-item">اخفاء</a>
                                                        </li>`
                                                    :
                                                        `<li>
                                                            <a href="#"
                                                                onclick="popUpConfirmShow(${courses[i].id})"
                                                                class="dropdown-item">عرض</a>
                                                        </li>`
                                                    }
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    `
                                );
                            }
                        } else {
                            $('#showCourses').html(`<div class="card overflow-hidden" style="box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);border-radius: 10px;">
                                                     <h3 class="text-danger text-center">لا توجد دورات</h3>
                                             </div>`)
                        }
                        $('.getCoursesLoader').css('display', 'none');
                    },
                    error: function(exception) {
                        alert('error');
                    }
                })
            } else {
                getCourses();
            }
        }
    </script>
@endsection
