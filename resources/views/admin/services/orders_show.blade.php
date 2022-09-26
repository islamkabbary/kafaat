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
        <div class="side-app container">


            <div class="row container">
                <div class="col-md-12 col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">تفاصيل طلب الخدمه</h3>
                        </div>
                        <div class="card-body">
                            <form class="" action="{{route('services.orders.update' , $order->id)}}" method="POST">
                                @csrf
                                {{method_field('PUT')}}
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">البريد الإلكترونى لصاحب الطلب</label>
                                            <input type="email" id="email" name="email" placeholder="الإيميل " class="form-control" value="{{$order->email}}" style="font-family: 'ar'" autocomplete="off" required disabled>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">إسم صاحب الطلب</label>
                                            <input type="text" id="full_name" name="full_name" placeholder="الأسم كامل" class="form-control" autocomplete="off" value="{{$order->full_name}}" style="font-family: 'ar'" required disabled>

                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputEmail1">رقم الجوال</label>
                                            <input type="text" id="phone" name="phone" placeholder="الجوال" class="form-control"  autocomplete="off" value="{{$order->phone}}" style="font-family: 'ar'" required disabled>

                                        </div>

                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <label class="form-label" for="exampleFormControlTextarea1">تفاصيل الطلب</label><textarea   class="form-control" name="content" id="content" rows="3" placeholder="وصف طلب الخدمه" style="  box-shadow: 0px -1px 3px 0px rgba(0,0,0,0.2);height: 200px" required readonly>
{{$order->content}}
                            </textarea>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>


            <div class="modal" id="orderDetails" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document" >
                    <div class="modal-content" style="width: 600px;">
                        <div class="modal-header" style="padding: 40px">
                            <h3 class="modal-title text-info text-center" style="font-family: 'ab';"></h3>
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


    </div>
    </div>
    </div>


@endsection
