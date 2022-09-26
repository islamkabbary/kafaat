@extends('admin.index')
@section('main')

<style>
    ::placeholder{
        font-family:ar;
    }
    .hi{
        font-family:ar;
    }
    #specificUsers{
        display:none;
    }
    .checkmark__circle {
        stroke-dasharray: 166;
        stroke-dashoffset: 166;
        stroke-width: 2;
        stroke-miterlimit: 10;
        stroke: #7ac142;
        fill: none;
        animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
    }
    
    .checkmark {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        display: block;
        stroke-width: 2;
        stroke: #fff;
        stroke-miterlimit: 10;
        margin: 10% auto;
        box-shadow: inset 0px 0px 0px #7ac142;
        animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
    }
    
    .checkmark__check {
        transform-origin: 50% 50%;
        stroke-dasharray: 48;
        stroke-dashoffset: 48;
        animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
    }
    
    @keyframes stroke {
        100% {
            stroke-dashoffset: 0;
        }
    }
    @keyframes scale {
        0%, 100% {
            transform: none;
        }
        50% {
            transform: scale3d(1.1, 1.1, 1);
        }
    }
    @keyframes fill {
        100% {
            box-shadow: inset 0px 0px 0px 30px #7ac142;
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
    .option-heading:hover {
        color: #15bdce;
    }.option-heading:before           { content: "\f063";
                 font-family: FontAwesome;
                 color: #15bdce;}
    .option-heading.is-active:before { content: "\f062";
        font-family: FontAwesome;}

    /* Helpers */
    .is-hidden { display: none; }
    .lds-hourglass {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
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
        color:red;
    }
    .lds-roller div:after {
        content: " ";
        display: block;
        position: absolute;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: red;
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
</style>

<div class="page">
    <div class="page-main h-100">

        <div class="app-content my-3 my-md-5">
            <div class="side-app">
                <div class="card m-b-20">
                    <div class="card-header">
                        <h3 class="card-title" style="font-family:ar">رسائل ترويجية</h3>
                    </div>
                    <div class="card-body">
                        <form id="registerMessages">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" style="font-family:ar">الرسالة</label>
                                <input type="text" id="message1" name="message" style="font-family:ar;padding:5px;" class="form-control" placeholder="الرسالة">
                            </div>
                            <div class="form-group">
                                <label class="form-label" style="font-family:ar">اختر نوع الرسالة</label>
                                <select name="allUsers" id="all" class="form-control">
                                    <option class="hi form-control" disabled selected value="">اختر</option>
                                    <option class="hi form-control" style="font-family:ar;" value="0">مخصص</option>
                                    <option class="hi form-control" style="font-family:ar;" value="1">كل المستخدمين</option>
                                </select>
                            </div>
                            <div class="form-group" id="specificUsers">
                                <select name="user_id" id="user_id" style="font-family:ar" class="form-control">
                                    <option class="hi form-control" disabled selected value="">اختر مستخدم</option>
                                    @foreach($users as $user)
                                        <option class="hi form-control" id="userPhoneSelected" style="font-family:ar" value="{{$user->id}}">{{$user->username}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="phone" id="phoneOfUserSelected" value="" />
                            </div>
                            <div class="form-group mb-0">
                                <div class="checkbox checkbox-secondary">
                                    <button type="submit" onclick="SendMessageAdUsers()" id="buttonOfUserChanged" style="font-family:ar;" disabled class="btn btn-success ">اختر مستخدم/ مستخدمين</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <div class="modal" id="uploadingModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body text-center" style="padding: 40px">
                    <h3 style="font-family:ar;color:#808080;">جاري إيصال الرسالة من فضلك انتظر قليلا</h3>
                    <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                </div>


            </div>
        </div>
    </div>
    
    <div class="modal" id="variableModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-sm modal-notify modal-success" role="document" style="max-width: 400px;background-color: wheat">

            <div class="modal-content text-center" style="background:white";>

                <div class="modal-header2 d-flex justify-content-center text-center ">

                </div>

                <div class="modal-body">
                    <h6 class="heading text-center" id="modal_message2"></h6>
                </div>

            </div>

        </div>
    </div>
    
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        var elem = document.getElementById('user_id');
          var selectedOption= elem[elem.selectedIndex];
          if(selectedOption.disabled == true){
           elem.style.fontFamily='ar';
        }
        
        var select = document.getElementById('user_id');
            select.onchange = function () {
                select.className = this.options[this.selectedIndex].className;
            }
            
            var elem = document.getElementById('all');
          var selectedOption= elem[elem.selectedIndex];
          if(selectedOption.disabled == true){
           elem.style.fontFamily='ar';
        }
        
        var select = document.getElementById('all');
            select.onchange = function () {
                select.className = this.options[this.selectedIndex].className;
            }
            
            $('#user_id').on('change' , function(e){
                var idOfUser = e.target.value;
                $.ajax({
                    url:'/admin/getPhoneOfUser/'+idOfUser,
                    method:'GET',
                    success:function(data){
                        console.log(data);
                        $('#phoneOfUserSelected').val(data);
                    },
                });
            });
            
            $('#all').on('change' , function(e){
                var idOfUsersChanged = e.target.value;
                if(idOfUsersChanged == 0){
                    $('#specificUsers').css('display' , 'block');
                    // $('#user_id').attr('required' , true);
                    // $('#all').attr('required' , false);
                    $('#buttonOfUserChanged').attr('disabled' , false);
                    $('#buttonOfUserChanged').text('تأكيد');
                }else{
                    $('#specificUsers').css('display' , 'none');
                    // $('#user_id').attr('required' , false);
                    // $('#all').attr('required' , true);
                    $('#buttonOfUserChanged').attr('disabled' , false);
                    $('#buttonOfUserChanged').text('تأكيد');
                }
            });
            
    });
    
    function SendMessageAdUsers(){
        $('#registerMessages').on('submit' , function(e){
            e.preventDefault();
        });
        var message = $('#message1').val();
        var allUsers = $('#all').val();
        var user_id = $('#user_id').val();
        
            if(message == ""){
                $('#modal_message2').text('من فضلك أدخل الرسالة').css('font-family', 'ar');
                $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                $('#variableModal2').fadeIn().show();
                setTimeout(function (){
                    $('#variableModal2').fadeOut("slow").hide();
                },4000);
            }else{
                $.ajax({
                 url: '/admin/ads-messages',
                 type: 'POST',
                 data: {_token: "{{ csrf_token() }}", message: message, user_id:user_id, allUsers:allUsers},
                 success: function (returnedMessage) {
                    if(returnedMessage == 1){
                        $('#uploadingModal').fadeIn(450).show();
                        setTimeout(function (){
                            $('#uploadingModal').fadeOut("slow").hide();
                            },4000);
                            
                            // $('#modal_message2').text('تم إيصال الرسالة بنجاح').css('font-family', 'ar');
                            // $('.modal-header2').empty().html('<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>')
                            // $('#variableModal2').fadeIn(5000).show();
                            // setTimeout(function (){
                            //     $('#variableModal2').fadeOut("slow").hide();
                            // },4000);
                            setTimeout(function(){
                                window.location.href="https://kafaat2.cmark.sa/admin/ads-messages";
                            },5000);
                            
                     }else if(returnedMessage == 2){
                        $('#uploadingModal').fadeIn(450).show();
                        setTimeout(function (){
                            $('#uploadingModal').fadeOut("slow").hide();
                            },4000);
                            
                            // $('#modal_message2').text('تم إيصال الرسالة بنجاح').css('font-family', 'ar');
                            // $('.modal-header2').empty().html('<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>')
                            // $('#variableModal2').fadeIn(5000).show();
                            // setTimeout(function (){
                            //     $('#variableModal2').fadeOut("slow").hide();
                            // },4000);
                            
                            setTimeout(function(){
                                window.location.href="https://kafaat2.cmark.sa/admin/ads-messages";
                            },5000);
                            
                     }else{
                        $('#modal_message2').text('من فضلك أدخل المستخدم لإيصال الرسالة').css('font-family', 'ar');
                        $('.modal-header2').empty().html('<i class="fa fa-times fa-4x text-danger" id="icon_fav" aria-hidden="true"></i>')
                        $('#variableModal2').fadeIn().show();
                        setTimeout(function (){
                            $('#variableModal2').fadeOut("slow").hide();
                        },4000);
                     }
                 },
                 error: function (error) {
                     console.log(error);
                 }
             });
        }
    }
</script>

@endsection