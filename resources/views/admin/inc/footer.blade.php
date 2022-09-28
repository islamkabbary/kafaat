<footer class="footer">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-lg-12 col-sm-12 mt-3 mt-lg-0 text-center" style="font-family:ar;">
                    <h4 class="text-center mt-3">Developed By <a href="https://teraninja.com" target="_blank">TeraNinja</a></h4>
                </div>
            </div>
        </div>
    </footer>
    <!--/Footer-->
</div>

<!-- Back to top -->
<a href="#top" id="back-to-top" ><i class="fa fa-long-arrow-up"></i></a>

<!-- JQuery js-->
<script src="{{url('assets/js/jquery-3.2.1.min.js')}}"></script>

<!-- Bootstrap js -->
<script src="{{url('assets/plugins/bootstrap-4.3.1/js/popper.min.js')}}"></script>
<script src="{{url('assets/plugins/bootstrap-4.3.1/js/bootstrap.min.js')}}"></script>

<script src="{{url('assets/dist/js/dropify.js')}}"></script>

<!--JQuery Sparkline Js-->
<script src="{{url('assets/js/jquery.sparkline.min.js')}}"></script>

<!-- Circle Progress Js-->
<script src="{{url('assets/js/circle-progress.min.js')}}"></script>

<!-- Star Rating Js-->
<script src="{{url('assets/plugins/rating/jquery.rating-stars.js')}}"></script>

<!-- Fullside-menu Js-->
<script src="{{url('assets/plugins/sidemenu/sidemenu.js')}}"></script>

<!-- Custom scroll bar Js-->
<script src="{{url('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<!--Counters -->
<script src="{{url('assets/plugins/counters/counterup.min.js')}}"></script>
<script src="{{url('assets/plugins/counters/waypoints.min.js')}}"></script>

<!-- CHARTJS CHART -->
<script src="{{url('assets/plugins/chart/Chart.bundle.js')}}"></script>
<script src="{{url('assets/plugins/chart/utils.js')}}"></script>

<!-- ECharts Plugin -->
<script src="{{url('assets/plugins/echarts/echarts.js')}}"></script>
<script src="{{url('assets/js/index1.js')}}"></script>


<!-- Custom Js-->
<script src="{{url('assets/js/admin-custom.js')}}"></script>
<script>
$(document).ready(function(){
   $('.dropify').dropify(); 
});
   function myFunction() {
      setTimeout(showPage, 2000);
    }

    function showPage(){
        let styles = `
            -webkit-background-size: cover;
            -moz-background-size:cover;
            -o-background-size:cover;
            background-size:cover`
        
        document.querySelector('body').style = styles
        document.getElementById("loader").style.display = "none";
        document.getElementById("myDiv").style.display = "block";
    } 
</script>
@yield('footer')
<!--</body>-->
<!--</html>-->
