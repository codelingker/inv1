$(function() {    
    nav_dropdown();
    navmenu();
    logOut();
    popup();
    show_pass();
    datatable();
    with_select();
});

function nav_dropdown() {
    $('.navmenu .dropdown').on('click', function(e) {
        e.preventDefault();
        
    })
}

function navmenu() {
    $('.left-menu-icon').on('click', function() {
        $('body').toggleClass('show-navmenu');
    })
}

function logOut() {
    $('.logOut').on('click', function(e) {
        e.preventDefault();

        const href = $(this).attr('href');

        Swal.fire({
            icon: 'question',
            title: 'Apakah anda yakin?',
            text: 'Anda akan keluar dari akun ini.',
            showCancelButton: true,
            confirmButtonText: 'Keluar',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#ff0062',
            allowEscapeKey: false,
            allowOutsideClick: false
        }).then(function(result) {
            if(result.value) {
                window.location.href = href;
            }
        }) 
    })
}

function popup() {
    $('.getPopup').on('click', function(e) {
        e.preventDefault();

        $('body').addClass('show-popup');
    })
    $('.popup .close').on('click', function(e) {
        e.preventDefault();

        $('body').addClass('close-popup');
        
        setTimeout(function(){
            $('body').removeClass('close-popup');
            $('body').removeClass('show-popup');

        }, 200)
    })
}

function show_pass() {
    $('#showhide_pass').on('click', function() {
        if($(this).is(':checked')) {
            $('#password').attr('type', 'text');
            $('#showhide_pass_lab').attr('class', 'fa fa-eye');
        } else {
            $('#showhide_pass_lab').attr('class', 'fa fa-eye-slash');
            $('#password').attr('type', 'password');

        }
    })
}

function datatable() {
    $('#dataTable').dataTable({
        ordering: false
    });
}

function with_select() {
    $('.with_src').select2();
}

$(window).on('load', function() {
    $('.loading').fadeOut();
});

