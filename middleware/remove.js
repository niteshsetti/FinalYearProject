const remo=(itemid,skey)=>{
    Swal.fire({
        title: 'Are you sure?',
        text: "Remove this Item from Cart ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Remove'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:'../backend/remov.php',
                method:"post",
                async:false,
                data:{
                 "itemid":itemid,
                 "skey":skey
                },
                success:function(data)
                {
                    if(data==="Success")
                    {
                    Swal.fire(
                        'Deleted!',
                        'Your Item  Deleted from Cart Successfully !!',
                        'success'
                    )
                    }
                }
            });
        }
      })
}