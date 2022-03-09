function call(k) {
    $(document).ready(function () {
        setInterval(timestamp, 1000);
    });
        function timestamp()
        {
        $.ajax({
            url: '../backend/updatetime.php',
            method: "post",
            async: false,
            data: {
                "fetch": 1,
                "cand": k
            },
            success: function (data) {
                $("#" + k).text(data);
                if(data === "----Time Up")
                {
                    document.getElementById(k).style.color="red";
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                      }).then((result) => {
                        if (result.isConfirmed) {
                          Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                          )
                        }
                      })
                }
            }
        });
    }
}
for (i = 0; i < ti.length; i++) {
    var k = ti[i];
    call(k)
}