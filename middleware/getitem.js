const getitem = (tableno, itemid, itemname, itemcost, itemquan, itemdate, itemimage, name, phno) => {
  var str = "Item Availability : " + itemquan + " On ( " + itemdate + " ) " + "\n" ;
  Swal.fire({
    title: itemname,
    text: str,
    imageUrl: "../assets/images/" + itemimage,
    imageWidth: 400,
    imageHeight: 200,
    imageAlt: 'Custom image',
    showCancelButton: true,
    confirmButtonText: 'Add to Cart',
    cancelButtonText: 'No, cancel',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      (async () => {

        const { value: fruit } = await Swal.fire({
          title: 'Select Qauntity',
          input: 'select',
          inputOptions: {
            1: '1',
            2: '2',
            3: '3',
            4: '4',
            5: '5',
            6: '6',
            7: '7'
          },
          inputPlaceholder: 'Select a Quantity',
          inputValidator: (value) => {
            return new Promise((resolve) => {
              if (!value) {
                resolve('You need to select Quantity to Add to Cart')
              }
              else{
                resolve()
              }
            })
          }
        })
        
        if (fruit) {
          $.ajax({
            url: '../backend/cart.php',
            method: "post",
            async: false,
            data: {
              "itemid": itemid,
              "name": name,
              "phno": phno,
              "tableno": tableno,
              "quan":fruit,
              "icost":itemcost
            },
            success: function (data) {
              console.log(data)
              if(data==="Success")
              {
                Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Item Added to Cart Successfully',
                  showConfirmButton: false,
                  timer: 1500
                })
              }
            }
    
          });
        }
        
        })()
    } 
  })
}
const getitemdes = (itemdes, itemnames) => {
  Swal.fire(
    itemnames,
    itemdes,
    'info'
  )
}