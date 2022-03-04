const tabledetails = (rec) => {
    $(document).ready(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "For Confirming to Book a table in this Restuatrant ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Enter'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Enter Your Details',
                    html: `<input type="text" id="name" class="swal2-input" placeholder="Enter Your Name">
                    <input type="text" id="phno" class="swal2-input" placeholder="Enter Your Mobile">`,
                    confirmButtonText: 'Book Table',
                    focusConfirm: false,
                    preConfirm: () => {
                        const name = Swal.getPopup().querySelector('#name').value
                        const phno = Swal.getPopup().querySelector('#phno').value
                        if (!name) {
                            Swal.showValidationMessage(`Please Enter Name`)
                        }
                        else if (!phno) {
                            Swal.showValidationMessage(`Please Enter Mobileno`)
                        }
                        return { name: name, phno: phno }
                    }
                }).then((result) => {
                    var names = result.value.name;
                    var phonenos = result.value.phno;
                    var tablenumber = rec;
                    var regex = /^\d{10}$/g;
                    if (regex.test(phonenos) == true) {
                        $.ajax({
                            url: "../backend/tablebookingcode.php",
                            type: "post",
                            async: false,
                            data: {
                                "name": names,
                                "phone": phonenos,
                                "tablenumber": tablenumber
                            },
                            success: function (data) {
                                if (data === "Error") {

                                }
                                else {
                                    
                                    let timerInterval
                                    Swal.fire({
                                        title: 'Table Booked Successfully!',
                                        html: 'Redirect in <b></b> milliseconds.',
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
                                            window.location.assign("menu.php" + "?%20tableno=" + rec);
                                        }
                                    }).then((result) => {
                                        if (result.dismiss === Swal.DismissReason.timer) {
                                            console.log('I was closed by the timer')
                                        }
                                    })
                                }
                            }
                        });
                    }
                    else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Invalid Mobile Number!',
                            footer: 'Try Again By booking Table'
                        })
                    }
                })
            }
        })

    });
}
const tabledisable = (recno,Dates, Time) => {
    $(document).ready(function () {
        Swal.fire({
            title: 'Table  Reserved At ' + Time,
            text: "Table Booked On " + Dates,
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Take me to Table'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Enter Your Phonenumber',
                    html: `<input type="text" id="phnocheck" class="swal2-input" placeholder="Enter Your Mobile">`,
                    confirmButtonText: 'Enter',
                    focusConfirm: false,
                    preConfirm: () => {
                        const phnocheck = Swal.getPopup().querySelector('#phnocheck').value
                        if (!phnocheck) {
                            Swal.showValidationMessage(`Please Enter Mobileno`)
                        }
                        return {phnocheck: phnocheck}
                    }
                    }).then((result) => {
                        var phnocheck = result.value.phnocheck;
                        $.ajax({
                            url: "../backend/tablebookingcode.php",
                            type: "post",
                            async: false,
                            data: {
                                "pnos":phnocheck,
                                "recno":recno
                            },
                            success: function (data) {
                                if(data==="Success")
                                {
                                    let timerInterval
                                    Swal.fire({
                                        title: 'Taking to Your Table!',
                                        html: 'Redirect in <b></b> milliseconds.',
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
                                            window.location.assign("menu.php" + "?%20tableno=" + recno);
                                        }
                                    }).then((result) => {
                                        if (result.dismiss === Swal.DismissReason.timer) {
                                            console.log('I was closed by the timer')
                                        }
                                    })
                                }
                                else{
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'You are not Table member!'
                                      })
                                }
                            }
                        })
                    })
                }
        })
    });
}