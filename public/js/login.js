$(document).ready(function(){
    $('#login_form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: APP_URL+"/api/login",
            type: "post",
            data: new FormData(this),
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            async: false,
        }).done(function(data) {
            if (data.status == 'success') {
                Swal.fire({
                    title: 'Success!',
                    text: 'Berhasil login',
                    icon: 'success'
                }).then(() => {
                    location.href = APP_URL+"/product_list";
                });
            } else {
                Swal.fire({
                    title: 'Gagal!',
                    text: data.message,
                    icon: 'error'
                });
            }
        }).fail(function(xhr, status, error) {
            var errormessage = xhr.status + ': ' + xhr.statusText;
            Swal.fire({
                title: 'Error!',
                text: errormessage,
                icon: 'error'
            });
        });
    });
});