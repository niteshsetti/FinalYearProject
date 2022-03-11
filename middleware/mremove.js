const execute=(tablenumber)=>{
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Vacate !'
      }).then((result) => {
        if (result.isConfirmed) {
           $.ajax({
                url:'../backend/mremov.php',
                type:"post",
                async:false,
                data:{
                    "tableno":tablenumber
                },
                success:function(data)
                {
                    if(data==="Success")
                    {
                        Swal.fire(
                            'Deleted!',
                            'Table Vacated Successfully !!! ',
                            'success'
                          )
                          window.location.replace("../frontend/usersdata.php");
                    }
                    else{
                        Swal.fire(
                            'Failure!',
                            'Table not Vacated',
                            'error'
                          )   
                    }
                }
           });
        }
      })
}