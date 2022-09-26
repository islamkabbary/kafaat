@extends('admin.index')
@section('main')

<div class="page">
    <div class="page-main h-100">

        <div class="app-content my-3 my-md-5">
            <div class="side-app">
                @if ($errors->any())
                    <div class="alert alert-info" id="messageErroriNCoupons">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session()->has('success'))
                    <div id="messageErrorEngineer122" style="font-family:ar;" class="alert alert-info">{{ Session::get('success') }}</div>
                @endif
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title" style="font-family:ar">إضافة كوبون</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('coupons.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label class="form-label" style="font-family:ar">الكود</label>
                                    <input type="text" name="code" class="form-control" required placeholder="الكود">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="form-label" style="font-family:ar">قيمة الخصم %</label>
                                    <input type="text" name="discount" class="form-control" required placeholder="قيمة الخصم" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                        <label class="form-label" style="font-family:ar"> تاريخ الخصم </label>
                                    <div class="input-daterange input-group" id="date-range">
                                        <input type="date" class="form-control" name="fromDate" />
                                        <span class="input-group-addon bg-info b-0 text-white text-center" style="font-family:ar;width:40px">الى</span>
                                        <input type="date" class="form-control" name="toDate" />
                                    </div>
                                </div><!-- col12 -->
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label class="form-label" style="font-family:ar">حالة الكوبون</label>
                                    <select name="type" required class="form-control" style="color:#808080;font-family:ar;box-shadow: 0px 0px 11px 0px rgba(0,0,0,0.2);">
                                      <option selected disabled>حالة الكوبون</option>
                                       <option value="0">معطل</option>
                                       <option value="1">نشط</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group mb-0">
                                <div class="checkbox checkbox-secondary">
                                    <button type="submit" style="font-family:ar;" class="btn btn-success ">تأكيد</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        
           setTimeout(function(){
           $('#messageErrorEngineer122').fadeOut(2000);// or fade, css display however you'd like.
        }, 2000); 
        
        setTimeout(function(){
           $('#messageErroriNCoupons').fadeOut(2000);// or fade, css display however you'd like.
        }, 2000); 
        
    });
</script>

@endsection