// Tommbol hapus
$(".tombol-hapus").on("click", function (e) {
    // Mematikan href
    e.preventDefault();
    // const href = $(this).attr('href');
    // const action = $(this).attr('action');

    let id = $(this).data("id");

    Swal({
        title: "Apakah anda yakin ingin menghapus?",
        text: "data akan dihapus",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Hapus Data!",
    }).then((result) => {
        if (result.value) {
            // document.location.href = href;
            // document.location.action = action;
            // document.getElementById("#delete").setValue('Adakah');
            // console.log(result);
            $("#form-delete").submit();
        }
    });
});

// Tommbol hapus
$(".masuk-verifikasi").on("click", function (e) {
    // Mematikan href
    e.preventDefault();
    const href = $(this).attr("href");

    Swal({
        title: "Apakah anda ingin lanjut verifkasi?",
        text: "Pastikan semua berkas wajib telah diupload",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Lanjutkan",
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    });
});
