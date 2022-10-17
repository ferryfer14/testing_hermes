$(document).ready(function () {
    $('.checkout').click(function (e) {
        e.preventDefault();
        location.href = APP_URL + "/checkout";
    });
    const productPopp = document.querySelectorAll('.buy');
    productPopp.forEach(function (button) {
        button.onclick = function (e) {
            e.preventDefault();
            var id = button.id;
            $.ajax({
                url: APP_URL + "/api/detail?id=" + id,
                type: "get",
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                async: false,
            }).done(function (data) {
                if (data.status == 'success') {
                    console.log(data.detail['product_name']);
                    $('#product_name').html(data.detail['product_name']);
                    if (data.detail['discount'] != '0') {
                        $('#harga_sebelum_discount').html(formatRupiah(data.detail['price'], 0));
                        $('#harga_product').html(formatRupiah(data.detail['price'] - (data.detail['price'] * data.detail['discount'] / 100), 0));
                    } else {
                        $('#harga_product').html(formatRupiah(data.detail['price'], 0));
                    }
                    $('#dimensi').html(data.detail['dimension']);
                    $('#unit').html(data.detail['unit']);
                    $('#detailModal').modal('show');
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
        }
    });
});