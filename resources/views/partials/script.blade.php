<!-- Mainly scripts -->
<script src="{{ asset('assets') }}/js/jquery-2.1.1.js"></script>
<script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('assets') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="{{ asset('assets') }}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('assets') }}/js/inspinia.js"></script>
<script src="{{ asset('assets') }}/js/plugins/pace/pace.min.js"></script>

<!-- Toastr -->
<script src="{{ asset('assets') }}/js/plugins/toastr/toastr.min.js"></script>

<script src="{{ asset('assets') }}/js/plugins/iCheck/icheck.min.js"></script>
@yield('custom-script')

<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
