function signout() {
  Swal.fire({
    title: 'Are you sure?',
    text: "For Cancelling Your Table ? ",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Signout'
  }).then((result) => {
    if (result.isConfirmed) {
      let timerInterval
      Swal.fire({
        title: 'You are Redirecting !!! ',
        html: 'I will close in <b></b> milliseconds.',
        timer: 2000,
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading()
          const b = Swal.getHtmlContainer().querySelector('b')
          timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft()
          }, 100)
        },
        willClose: () => {
          clearInterval(timerInterval)
        }
      }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
          console.log('I was closed by the timer')
        }
      })
      var tablenumber = $("#tablenumber").val();
      $.ajax({
        url: "../backend/signoff.php",
        type: "post",
        async: false,
        data: {
          "tablenumber": tablenumber
        },
        success: function (data) {
          if (data === "Success") {
            window.location.href = "http://localhost/FinalYearProject/frontend/index.php";
          }
          else {
            alert("Failed");
          }
        }
      });
    }
  })
}