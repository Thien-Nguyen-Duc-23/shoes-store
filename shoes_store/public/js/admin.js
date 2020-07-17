$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {
            $("#overlay").show();
        },
        complete: function () {
            $("#overlay").hide();
        }
    });
    // $('.icheck').iCheck({
    //     checkboxClass: 'icheckbox_square-blue',
    // });
    //Initialize Select2 Elements
    // $('.select2').select2();
    // $('#reservation').daterangepicker()
    //Date range picker with time picker
    // $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date picker
    $('.datepicker').datepicker({
        autoclose: true,
        format: 'yyyy/mm/dd'
    });
    //url browser
    var active_url = window.location.href;
    $('.li-link').removeClass("active menu-open");
    $('.link').each(function() {
        var pathname = $(this).attr('href');
        if (pathname == active_url) {
            $(this).parent().addClass('active');
            $(this).parents('.treeview').addClass('active menu-open');
        }
    });
    deleteTable();
});

function deleteTable() {
    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        var form = $(this).parents('.form-delete');
        console.log('thien');
        swal({
            title: "Are you sure?",
            // text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            closeOnClickOutside: false,
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
}
