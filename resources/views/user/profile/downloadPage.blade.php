@component('components.app')
<x-header />

<style>
    .table-hover tbody tr:hover{
        color:#E64448;
    }
    @media screen and (min-width:1025px) and (max-width:1299px) {
        .imgRightMessages2{
            width:900px;
            height:700px;
        }
    }
</style>
    <br class="spaceHeader">
    <br class="spaceHeader">
    <br class="spaceHeader">
    <br>
    <br>
    <br>

    <section>
        <div class="container">
            <div class="section-title center-block text-center">
                <h2 style="color:#808080;font-family:ar">مبروك عليك الشهادة</h2>
                <img src="{{asset('/assets/images/sub.png')}}" style="width: 150px;height: 20px">
                <br>
                <br>
                <br>
                <br>
                <div id="dataGetsHere">
                    
                </div>
                <input type="hidden" id="certificateID" value="{{$certificateDownloaded->id}}" />
                <input type="hidden" id="pdfOfFile" value="{{$certificateDownloaded->pdf}}" />
                <input type="hidden" id="linkOfFile" value="{{$certificateDownloaded->link}}" />
                <br>
                <br>
                <br>
                <br>
                <div id="buttonForDownload">
                    
                </div>
            </div>

        </div>
    </section>

    <br>
    <br>
    <br>
    <br>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            // var isLinkFromServer = $('#isLink').val();
            var idOfCertificate = $('#certificateID').val();
            var pdfOfCertificate = $('#pdfOfFile').val();
            var linkOfCertificate = $('#linkOfFile').val();
             $(window).on('load' , function(){
                $.ajax({
                    url:'/checkIfFilePdfOrLink/'+idOfCertificate,
                    method:'GET',
                    success:function(response){
                      if(response == 1){
                          $('#dataGetsHere').empty();
                          $('#buttonForDownload').empty();
                          $('#dataGetsHere').append(`
                            <embed class="imgRightMessages2" src="{{asset('/uploads/certificates/images/`+pdfOfCertificate+`')}}" /> 
                          `);
                          $('#buttonForDownload').append(`
                            <a href="{{asset('/uploads/certificates/images/`+pdfOfCertificate+`')}}" class="btn text-center" style="font-family:ar;background-color:#E64448;color:#fff;" download>تحميل الشهادة</a>
                          `);
                      }else if(response == 2){
                          $('#dataGetsHere').empty();
                          $('#buttonForDownload').empty();
                          $('#dataGetsHere').append(`
                            <a style="font-family:ar" href="`+linkOfCertificate+`" ><h3>سوف يتم تحويلك تلقائيا إلي صفحة تحميل الشهادة</h3><span style="font-family:ar;color:red">أضغط هنا</span></a>
                          `);
                              setTimeout(function(){
                                window.location.href = linkOfCertificate;
                            } , 5000);
                      }else{
                          console.log('something wrong');
                      }
                    },
                }); 
             });
        });
    </script>
@endcomponent
