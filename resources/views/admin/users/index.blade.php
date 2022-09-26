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
        .lds-roller {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
        }
        .lds-roller div {
            animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            transform-origin: 40px 40px;
        }
        .lds-roller div:after {
            content: " ";
            display: block;
            position: absolute;
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #fff;
            margin: -4px 0 0 -4px;
        }
        .lds-roller div:nth-child(1) {
            animation-delay: -0.036s;
        }
        .lds-roller div:nth-child(1):after {
            top: 63px;
            left: 63px;
        }
        .lds-roller div:nth-child(2) {
            animation-delay: -0.072s;
        }
        .lds-roller div:nth-child(2):after {
            top: 68px;
            left: 56px;
        }
        .lds-roller div:nth-child(3) {
            animation-delay: -0.108s;
        }
        .lds-roller div:nth-child(3):after {
            top: 71px;
            left: 48px;
        }
        .lds-roller div:nth-child(4) {
            animation-delay: -0.144s;
        }
        .lds-roller div:nth-child(4):after {
            top: 72px;
            left: 40px;
        }
        .lds-roller div:nth-child(5) {
            animation-delay: -0.18s;
        }
        .lds-roller div:nth-child(5):after {
            top: 71px;
            left: 32px;
        }
        .lds-roller div:nth-child(6) {
            animation-delay: -0.216s;
        }
        .lds-roller div:nth-child(6):after {
            top: 68px;
            left: 24px;
        }
        .lds-roller div:nth-child(7) {
            animation-delay: -0.252s;
        }
        .lds-roller div:nth-child(7):after {
            top: 63px;
            left: 17px;
        }
        .lds-roller div:nth-child(8) {
            animation-delay: -0.288s;
        }
        .lds-roller div:nth-child(8):after {
            top: 56px;
            left: 12px;
        }
        @keyframes lds-roller {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
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
                                    <h3 class="card-title">المستخدمين</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered border-top mb-0">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>إسم</th>
                                                <th>بريد إلكترونى</th>
                                                <th>رقم جوال</th>
{{--                                                <th>الرقم القومى</th>--}}
{{--                                                <th>الجنسيه</th>--}}
{{--                                                <th>المدينه</th>--}}
{{--                                                <th>صوره</th>--}}
                                                <th>الحساب مفعل ؟</th>
                                                <th>تحكم</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <th>{{$user->id}}</th>
                                                    <td>{{$user->username}}</td>
                                                    <td >{{$user->email}}</td>
                                                    <td >{{$user->country_code.$user->phone }}+</td>

{{--                                                    <td>--}}
{{--                                                        @if($user->student && $user->student->national_id )--}}
{{--                                                            {{$user->student->national_id }}--}}
{{--                                                        @else--}}
{{--                                                           لا  يوجد رقم قومى--}}
{{--                                                        @endif--}}

{{--                                                    </td>--}}

{{--                                                    <td >--}}
{{--                                                        @if($user->student && $user->student->nationality )--}}
{{--                                                            {{$user->student->nationality }}--}}
{{--                                                        @else--}}
{{--                                                            لم تسجل بعد--}}
{{--                                                        @endif--}}

{{--                                                    </td>--}}

{{--                                                    <td >--}}
{{--                                                        @if($user->student && $user->student->city )--}}
{{--                                                            {{$user->student->city }}--}}
{{--                                                        @else--}}
{{--                                                            لم تسجل بعد--}}
{{--                                                        @endif--}}

{{--                                                    </td>--}}

{{--                                                    <td><img src="{{$user->photo}}" width="85px" height="85px"></td>--}}
                                                    <td >
                                                        @if($user->verified == 1)
                                                            مفعل
                                                        @else
                                                          غير مفعل
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a  href="#" onclick="popUpConfirmDelete({{$user->id}})" class="btn btn-sm btn-danger">حذف</a>
                                                        <a href="{{url('/admin/users/edit/'.$user->id)}}" class="btn btn-sm btn-info">تعديل</a>
                                                        <a  href="#" onclick="popUpDetails({{$user}},{{$user->student}})" class="btn btn-sm btn-success">عرض</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
                            </div>

                        </div>
                    </div>
                    <div class="modal" id="confirmDelete" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-body" style="padding: 40px">
                                    <h5 class="modal-title text-danger" style="font-family: 'ab';text-align: center">هل تريد  حذف هذا المستخدم من النظام !</h5>
                                    <input type="hidden" id="user_id">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" onclick="deleteUser()" class="btn btn-danger">

                                        <span id="text_delete"> حذف</span>  <span class="loader_area"></span>

                                    </button>
                                    <button type="button" class="btn btn-info" data-dismiss="modal">لا أريد</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal" id="userDetails" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document" >
                            <div class="modal-content" style="width: 650px;">
                                <div class="modal-header" style="padding: 40px">
                                    <h3 class="modal-title text-info text-center" style="font-family: 'ab';">بيانات المستخدم</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="padding: 40px">

                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">الإسم</label>
                                            <input type="text" name="username" id="username" class="form-control"  placeholder="إسم المستخدم" required readonly>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">البريد الإلكترونى</label>
                                            <input type="email" name="email" id="email" class="form-control"   placeholder="البريد الإلكترونى للمستخدم" required readonly>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label"  for="exampleInputEmail1">رقم الجوال</label>
                                            <!-- country codes (ISO 3166) and Dial codes. -->

                                                <input type="text"  name="phone" class="form-control " id="phone"  placeholder="رقم جوال المستخدم" required readonly>


                                        </div>


                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1"> الصوره</label>
                                          <img width="100%" height="200px"  id="photo">
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="national_id"> الرقم القومى</label>
                                            <input type="text" name="national_id" id="national_id" class="form-control" readonly/>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">الجنسيه</label>
                                            <input type="text" name="nationality" id="nationality" class="form-control"  readonly />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1"> المدينه</label>
                                            <input type="text" name="city" id="city" class="form-control" readonly/>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1"> العنوان</label>
                                            <input type="text" name="address" id="address" class="form-control" readonly />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">تفعيل الحساب </label>
                                            <select name="verified" class="form-control" required id="type" disabled>

                                                <option value="1">مفعل</option>
                                                <option value="0">غير مفعل</option>

                                            </select>
                                        </div>



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
            $('#user_id').val(id);
            $('#confirmDelete').fadeIn(450).modal({'show' : true});
        }
        function deleteUser(){
            var user_id = $('#user_id').val();
            $('.loader_area').html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>');
            $('#text_delete').html(' جارى حذف المستخدم ');
            $.ajax({
                url : "{{url('/admin/users/delete/')}}"+"/"+user_id,
                type : 'GET',
                success:function (){
                    location.reload();

                }

            })
        }
        function popUpDetails(userObject , userStudentObject){

            $('#username').val(userObject['username']);
            $('#email').val(userObject['email']);
            $('#phone').val(userObject['phone']);
            $('#photo').attr("src",userObject['photo']);
            $('#national_id').val(userStudentObject['national_id']);
            $('#nationality').val(userStudentObject['nationality']);
            $('#city').val(userStudentObject['city']);
            $('#address').val(userStudentObject['address']);
            $('#type').val(userObject['verified']);
            $('#userDetails').fadeIn(450).modal({'show' : true});
        }

    </script>
@endsection
