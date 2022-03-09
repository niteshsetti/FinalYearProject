const remo = (itemid, skey, itemname) => {
    voi('Remove' + itemname + 'from Here')
    Swal.fire({
        title: 'Are you sure?',
        text: "Remove " + itemname + " from Here ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Remove'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '../backend/remov.php',
                method: "post",
                async: false,
                data: {
                    "itemids": itemid,
                    "skeys": skey
                },
                success: function (data) {
                    if (data === "Success") {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: itemname + ' removed Successfully',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(function () {
                            voi(itemname + ' removed Successfully')
                        }, 1200);
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    }
                }
            });
        }
    })
}