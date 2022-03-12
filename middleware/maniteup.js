const update = (tableno, candid) => {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Change!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "../backend/manupdate.php",
                type: "post",
                async: false,
                data: {
                    "tableno": tableno,
                    "candid": candid
                },
                success: function (data) {
                    if (data === "Success") {
                        location.reload();
                    }
                }
            });
        }
    })
}