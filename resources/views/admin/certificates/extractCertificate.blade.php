@extends('admin.index')
@section('main')
<style>
    #link::placeholder{
        font-family:ar;
    }
    #certifKafa{
        display:none;
    }
    #certifWeb{
        display:none;
    }
    .hi{
        font-family:ar;
    }
</style>
<div class="page">
    <div class="page-main h-100">
        <div class="app-content my-3 my-md-5">
            <div class="side-app">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title" style="font-family:ar;">الشهادات</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/certificates/update/' . $certificate->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <select name="isLink" class="form-control" id="isLink">
                                <option class="hi form-control" selected disabled>اختر كيفية رفع الشهادة</option>
                                <option class="hi form-control" value="0">رفع الشهادة من خلال المعهد</option>
                                <option class="hi form-control" value="1">رفع الشهادة من خلال موقع آخر</option>
                            </select>
                            <br>
                            <div class="form-group" id="certifKafa" style="font-family:ar;">
                                <label class="form-label">رفع الشهادة من المعهد</label>
                                <input type="file" name="pdf" id="dropifyImage" accept="application/pdf" class="dropify" @if(@$certificate->pdf != '')
                            data-default-file="{{$certificate->pdf}}" @endif>
                            </div>
                            <div class="form-group" id="certifWeb" style="font-family:ar;">
                                <label class="form-label">رفع الشهادة من الموقع</label>
                                <input type="text" name="link" id="link" placeholder="أدخل رابط الموقع لاستخراج الشهادة" class="form-control" value="{{$certificate->link}}" />
                            </div>
                            <button type="submit" id="buttonForLiftCertificate" style="font-family:ar;" disabled class="btn btn-success">اختر كيفية رفع الشهادة</button>
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
        
        $('#isLink').on('change' , function(e){
            var ids = e.target.value;
            if(ids == 0){
                $('#certifKafa').css('display' , 'block');
                $('#certifWeb').css('display' , 'none');
                $('#dropifyImage').attr('required' , true);
                $('#link').attr('required' , false);
                $('#buttonForLiftCertificate').attr('disabled' , false);
                $('#buttonForLiftCertificate').text('رفع الشهادة');
            }else{
                $('#certifWeb').css('display' , 'block');
                $('#certifKafa').css('display' , 'none');
                $('#link').attr('required' , true);
                $('#dropifyImage').attr('required' , false);
                $('#buttonForLiftCertificate').attr('disabled' , false);
                $('#buttonForLiftCertificate').text('رفع الشهادة');
            }
        });
        
        var elem = document.getElementById('isLink');
          var selectedOption= elem[elem.selectedIndex];
          if(selectedOption.disabled == true){
           elem.style.fontFamily='ar';
        }
        
        var select = document.getElementById('isLink');
            select.onchange = function () {
                select.className = this.options[this.selectedIndex].className;
            }
            
            
            
    });
</script>

@endsection