$(document).ready(function () {
    $('.confirm').click(function (e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append('total', $('#subtotal').val());
        $.ajax({
            url: APP_URL + "/api/transaction",
            type: "post",
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            async: false,
        }).done(function (data) {
            if (data.status == 'success') {
                Swal.fire({
                    title: 'Success!',
                    text: 'Berhasil Melakukan transaksi',
                    icon: 'success'
                }).then(() => {
                    location.href = APP_URL + "/report";
                });
            } else {
                Swal.fire({
                    title: 'Gagal!',
                    text: data.message,
                    icon: 'error'
                });
            }
        }).fail(function (xhr, status, error) {
            var errormessage = xhr.status + ': ' + xhr.statusText;
            Swal.fire({
                title: 'Error!',
                text: errormessage,
                icon: 'error'
            });
        });
    });
});