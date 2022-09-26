@extends('admin.index')
@section('main')

    <!--Loader-->
    <div id="global-loader">
        <img src="{{url('../assets/images/loader.svg')}}" class="loader-img" alt="">
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
                            <h3 class="card-title"> طلبات الخدمات</h3>
                        </div>
                        <div class="card-body">
                            @if($orders->count() >0)
                            <div class="table-responsive">
                                <table class="table table-bordered border-top mb-0">
                                    <thead>
                                    <tr>
                                        <th>  # رقم الطلب </th>
                                        <th>إسم العميل</th>
                                        <th>رقم الجوال</th>
                                        <th>نوع الخدمه المطلوبه</th>
                                        <th>التحكم</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($orders as $order)
                                    <tr>
                                        <th>{{$order->id}}</th>
                                        <td>{{$order->full_name}}</td>
                                        <td>

                                            @if(Str::contains($order->phone,"+966"))
                                                {{$order->phone}}
                                                @else


                                                966{{$order->phone}}+
@endif
                                        </td>
                                        <td>{{$order->service->title}}</td>
                                        <td>
                                            <a onclick="popUpConfirmDelete({{$order->id}})" class="btn btn-danger btn-sm text-white">حذف </a>
                                            <a href="{{url('admin/services/orders/show/'.$order->id)}}" class="btn btn-info btn-sm text-white">عرض </a>
                                            <a href="{{route('services.orders.edit' , $order->id)}}" class="btn btn-success btn-sm text-white">تعديل </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            @else
                                <h3 class="text-center" style="color:#E64448;"> لا توجد طلبات </h3>

                            @endif
                        </div>
                        {!! $orders->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>

                </div>
            </div>
            <div class="modal" id="confirmDelete" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-body" style="padding: 40px">
                            <h5 class="modal-title text-danger text-center" style="font-family: 'ab';">هل تريد  حذف هذا الطلب  نهائيا ؟!</h5>
                            <input type="hidden" id="order_id">
                        </div>

                        <div class="modal-footer">
                            <button type="button" onclick="deleteOrder()" class="btn btn-danger"> <span id="text_delete"> حذف</span>  <span class="loader_area"></span></button>
                            <button type="button" class="btn btn-info" data-dismiss="modal">لا أريد</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal" id="orderDetails" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document" >
                    <div class="modal-content" style="width: 600px;">
                        <div class="modal-header" style="padding: 40px">
                            <h3 class="modal-title text-info text-center" style="font-family: 'ab';">تفاصيل طلب الخدمه</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="padding: 40px">
                            <form class="" action="" method="POST">
                                @csrf
                                <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">البريد الإلكترونى لصاحب الطلب</label>
                                    <input type="email" id="email" name="email" placeholder="الإيميل " class="form-control" style="font-family: 'ar'" autocomplete="off" required disabled>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">إسم صاحب الطلب</label>
                                    <input type="text" id="full_name" name="full_name" placeholder="الأسم كامل" class="form-control" autocomplete="off" style="font-family: 'ar'" required disabled>

                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="exampleInputEmail1">رقم الجوال</label>
                                    <input type="text" id="phone" name="phone" placeholder="الجوال" class="form-control"  autocomplete="off" style="font-family: 'ar'" required disabled>

                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">

                                    <label class="form-label" for="exampleFormControlTextarea1">تفاصيل الطلب</label><textarea   class="form-control" name="content" id="content" rows="3" placeholder="وصف طلب الخدمه" style="  box-shadow: 0px -1px 3px 0px rgba(0,0,0,0.2);height: 200px" required readonly>

                            </textarea>

                                </div>
                            </div>
                        </div>
                            </form>
                        </div>


                </div>
            </div>
        </div>

            <div class="modal" id="orderUPDATE" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document" >
                    <div class="modal-content" style="width: 600px;">
                        <form class="update_form" action="{{route('services.orders.update' , 2)}}" method="POST">
                            @csrf
                            {{method_field('PUT')}}
                        <div class="modal-header" style="padding: 40px">
                            <h3 class="modal-title text-info text-center" style="font-family: 'ab';">تعديل طلب الخدمه</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="padding: 40px">

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">البريد الإلكترونى لصاحب الطلب</label>
                                            <input type="email" id="email2" name="email" placeholder="الإيميل " class="form-control" style="font-family: 'ar'" autocomplete="off" required >
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">إسم صاحب الطلب</label>
                                            <input type="text" id="full_name2" name="full_name" placeholder="الأسم كامل" class="form-control" autocomplete="off" style="font-family: 'ar'" required >

                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">رقم الجوال</label>
                                            <input type="text" id="phone2" name="phone" placeholder="الجوال" class="form-control"  autocomplete="off" style="font-family: 'ar'" required >

                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <label class="form-label" for="exampleFormControlTextarea1">تفاصيل الطلب</label><textarea   class="form-control" name="content" id="content2" rows="3" placeholder="وصف طلب الخدمه" style="  box-shadow: 0px -1px 3px 0px rgba(0,0,0,0.2);height: 200px" required >

                            </textarea>

                                        </div>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <input type="submit"  class="btn btn-danger btn-block" value="تعديل الطلب" />

                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </div>

    <script>

        function popUpConfirmDelete(id){
            $('#order_id').val(id);
            $('#confirmDelete').fadeIn(450).modal({'show' : true});
        }
        function deleteOrder(){
            var order_id = $('#order_id').val();
            $('.loader_area').html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>');
            $('#text_delete').html(' جارى حذف الطلب ');
            $.ajax({
                url : "{{url('/admin/services/orders/delete/')}}"+"/"+order_id,
                type : 'GET',
                success:function (){
                    location.reload();

                }

            })
        }

        // function popUpDetails(orderObject){
        //      $('#email').val(orderObject['email']);
        //      $('#full_name').val(orderObject['full_name']);
        //      $('#phone').val("966"+orderObject['phone']+"+");
        //      $('#content').val(orderObject['content']);
        //     $('#orderDetails').fadeIn(450).modal({'show' : true});
        // }
        //
        // function popUpUpdate(orderObject){
        //     $('#email2').val(orderObject['email']);
        //     $('#full_name2').val(orderObject['full_name']);
        //     $('#phone2').val("966"+orderObject['phone']+"+");
        //     $('#content2').val(orderObject['content']);
        //     $('#orderUPDATE').fadeIn(450).modal({'show' : true});
        // }
    </script>
@endsection
