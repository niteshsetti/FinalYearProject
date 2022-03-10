<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/manager.css">
</head>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="../assets/img/about-bg.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="../assets/img/download.jpg" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Food Delights Restaurant</p>
                            <form autocomplete="off" id="form">
                                <div class="form-group">
                                    <input type="text" id="mname" class="form-control" value="FD123DF567MLR" disabled>
                                </div>
                                <div class="form-group mb-4">
                                    <input type="password" id="mpass" class="form-control" placeholder="Enter Password">
                                </div>
                                <input name="login" id="submit" class="btn btn-block login-btn mb-4 btn btn-success" type="button" value="Open" style="background-color:#333;">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            $("#submit").click(function() {
                var passcheck = $("#mpass").val();
                if(passcheck!="")
                {
                if (passcheck == "12345") {
                    let timerInterval
                    Swal.fire({
                        title: 'Redirecting to Manager Panel!',
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
                            window.location.replace("usersdata.php");
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {
                            console.log('I was closed by the timer')
                        }
                    })
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: 'Wrong Password',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
            else{
                Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Enter Your Password',
                        showConfirmButton: false,
                        timer: 1500
                    })
            }
            });
        });
    </script>
</body>

</html>