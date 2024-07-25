<script src="{{asset('assets/backend/vendor/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('assets/backend/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('assets/backend/vendor/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('assets/backend/vendor/nprogress/nprogress.js')}}"></script>
<!-- Chart.js -->
<script src="{{asset('assets/backend/vendor/Chart.js/dist/Chart.min.js')}}"></script>
<!-- jQuery Sparklines -->
<script src="{{asset('assets/backend/vendor/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- Flot -->
<script src="{{asset('assets/backend/vendor/Flot/jquery.flot.js')}}"></script>
<script src="{{asset('assets/backend/vendor/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('assets/backend/vendor/Flot/jquery.flot.time.js')}}"></script>
<script src="{{asset('assets/backend/vendor/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{asset('assets/backend/vendor/Flot/jquery.flot.resize.js')}}"></script>
<!-- Flot plugins -->
<script src="{{asset('assets/backend/vendor/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{asset('assets/backend/vendor/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/flot.curvedlines/curvedLines.js')}}"></script>
<!-- DateJS -->
<script src="{{asset('assets/backend/vendor/DateJS/build/date.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{asset('assets/backend/vendor/moment/min/moment.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/backend/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- Custom Theme Scripts -->
<script src="{{asset('assets/frontend/js/toast.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/backend/vendor/validator/validator.js')}}"></script>
<script src="{{asset('assets/backend/js/summernote.js')}}"></script>
<script src="{{asset('assets/backend/vendor/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>
<script src="{{asset('assets/backend/js/custom.js')}}"></script>
@toastr_render
<script>
$(document).ready(function(){
    $('.summernote').summernote({
        height: 187,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['view', ['codeview']]
        ],
    });
    $('.summernote_map').summernote({
        height: 187,
        toolbar: [],
    });

});

$('.picture').on("change",function(){
        var id=$(this).attr('data-preview');
        preview(this,id);
});

function preview(input,id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
        $('#'+id).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

// $(".file").change(function() {
//   readURL(this);
// });
</script>
<script>
    $(document).ready(function(){
        setRecentHeight();

        $(window).resize(function(){
            setRecentHeight();
        });

        function setRecentHeight(){
            var recentHeight=0;
            $('.recent').each(function(){
                var height=$(this).innerHeight();
                if(height > recentHeight){
                    recentHeight = height;
                }
            });
            $('.recent').css('height',recentHeight+'px');
        }
    })
</script>
<script>
    function enableBtn(){
        jQuery('#enableBtn').removeAttr('disabled');
    }
</script>

