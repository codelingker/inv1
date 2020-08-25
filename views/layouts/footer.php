</main>

<script src="assets/vendors/jquery/jquery-3.5.1.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendors/select2/js/select2.min.js"></script>
<script src="assets/vendors/datatable/datatables.min.js"></script>
<script src="assets/vendors/chartjs/chart.bundle.min.js"></script>
<script src="assets/vendors/sweetAlert/sweetalert2.all.min.js"></script>
<script src="assets/vendors/datepicker/bootstrap-datepicker.min.js"></script>
<script src="assets/js/main.js"></script>
<script>
    $("#menu-left a.sembunyi,#menu-left  a.tampil").click(function(event) {
        event.preventDefault();
        if($(this).hasClass("tampil")){
            $(this).removeClass("tampil");
            $(this).parent().children("ul").stop(true,true).slideUp("normal");
        } else {
            $("#menu-left a.sembunyi.tampil").removeClass("tampil");
            $(this).addClass("tampil");
            $(".navmenu ul ul").filter(":visible").slideUp("normal");
            $(this).parent().children("ul").stop(true,true).slideDown("normal");
        }

    });

    $('.data-table').DataTable();
    $('.datepicker').datepicker(
        {
            todayBtn: 'linked',
            autoclose: true,
            todayHighlight: true,
            format: 'dd/mm/yyyy'
        }
    );

    $('.hps-data').on('click', function(e) {
        e.preventDefault();

        let href = $(this).attr('href');

        Swal.fire({
            icon: 'question',
            title: 'Apakah anda yakin?',
            text: 'Data yang dipilih akan dihapus permanen.',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#ff0062',
            allowEscapeKey: false,
            allowOutsideClick: false
        }).then(function(result) {
            if(result.value) {
                window.location.href = href;
            }
        }) 
    });
    
</script>
</body>
</html>