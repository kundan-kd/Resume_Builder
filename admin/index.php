<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="author" content="Zoyothemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- App css -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <!-- Icons -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" /> -->
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/head.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
    <!-- DataTables Bootstrap 5 CSS -->
    <link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Sweet Alert Notification-->
    <!-- Toastr JS -->
</head>
<?php ?>

<body>
    <!-- Begin page -->
    <div class="account-page">
        <div class="container-fluid p-0">
            <div class="row g-0 px-3 py-3 vh-100">
                <div class="col-xl-5">
                    <div class="row">                   
                        <div class="col-md-8 mx-auto">
                            <div class="card mt-5">
                                <div class="card-body">
                                    <div class="mb-0 p-0 p-lg-3">
                                        <div class="mb-0 border-0 p-md-4 p-lg-0">
                                            <div class="mb-4 p-0 text-lg-start text-center">
                                                <div class="auth-brand">
                                                    <a href="index.php" class="logo logo-light">
                                                        <span class="logo-lg">
                                                            <img src="assets/images/logo-light-3.png" alt=""
                                                                height="24">
                                                        </span>
                                                    </a>
                                                    <a href="index.html" class="logo logo-dark">
                                                        <span class="logo-lg">
                                                            <img src="assets/images/logo-dark-3.png" alt="" height="24">
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="pt-0">
                                                <form id="user_login" class=" needs-validation my-4" method="POST" novalidate>
                                                    <div class="form-group mb-3">
                                                        <label for="user-email" class="form-label">Email</label>
                                                        <input class="form-control" type="text" id="user-email"
                                                            name="user-email" style="background-image: none;" required
                                                            placeholder="Enter your username">
                                                            <div class="invalid-feedback">
                                                                Enter valid Email ID                
                                                            </div>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input class="form-control" type="password"
                                                            id="user-password" name="user-password"
                                                            placeholder="Enter your password" style="background-image: none;" required>
                                                             <div class="invalid-feedback">
                                                                Enter valid Password                
                                                            </div>
                                                            <div class="credentialError mt-1 d-none"></div>
                                                    </div>

                                                    <div class="form-group d-flex mb-3">
                                                        <div class="col-sm-6">
                                                            <!-- <div class="form-check">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="checkbox-signin" checked>
                                                                <label class="form-check-label"
                                                                    for="checkbox-signin">Remember me</label>
                                                            </div> -->
                                                        </div>
                                                        <div class="col-sm-6 text-end">
                                                            <a class='text-muted fs-14'
                                                                href='auth-recoverpw.html'>Forgot password?</a>
                                                        </div>
                                                    </div>

                                                    <div class="form-group mb-0 row">
                                                        <div class="col-12">
                                                            <div class="d-grid">
                                                                <button class="btn btn-primary fw-semibold loginSubmit"
                                                                    type="submit"> Log In 
                                                                </button>
                                                                <button class="btn btn-primary loginSpinn d-none" type="button" disabled>
                                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Please Wait...
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <div class="text-center text-muted">
                                                    <p class="mb-0">Don't have an account ?<a
                                                            class='text-primary ms-2 fw-medium'
                                                            href='user_registration.php'>Sign up</a></p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-7 d-none d-xl-inline-block">
                    <div class="account-page-bg rounded-4">
                        <div class="auth-user-review text-center">
                            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                <div class="carousel-inner">

                                    <div class="carousel-item active">
                                        <p class="prelead mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 24 24">
                                                <path fill="#ffffff"
                                                    d="M4.583 17.321C3.553 16.227 3 15 3 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621c.537-.278 1.24-.375 1.929-.311c1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5a3.87 3.87 0 0 1-2.748-1.179m10 0C13.553 16.227 13 15 13 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621c.537-.278 1.24-.375 1.929-.311c1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5a3.87 3.87 0 0 1-2.748-1.179" />
                                            </svg>
                                            Ensures that your resume looks professional and upto modern standards
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 24 24">
                                                <path fill="#ffffff"
                                                    d="M19.417 6.679C20.447 7.773 21 9 21 10.989c0 3.5-2.456 6.637-6.03 8.188l-.893-1.378c3.335-1.804 3.987-4.145 4.248-5.621c-.537.278-1.24.375-1.93.311c-1.804-.167-3.226-1.648-3.226-3.489a3.5 3.5 0 0 1 3.5-3.5c1.073 0 2.1.49 2.748 1.179m-10 0C10.447 7.773 11 9 11 10.989c0 3.5-2.456 6.637-6.03 8.188l-.893-1.378c3.335-1.804 3.987-4.145 4.247-5.621c-.537.278-1.24.375-1.929.311C4.591 12.323 3.17 10.842 3.17 9a3.5 3.5 0 0 1 3.5-3.5c1.073 0 2.1.49 2.748 1.179" />
                                            </svg>
                                        </p>
                                        <h4 class="mb-1">Arter Carter</h4>
                                        <p class="mb-0">Web Developer</p>
                                    </div>

                                    <div class="carousel-item">
                                        <p class="prelead mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 24 24">
                                                <path fill="#ffffff"
                                                    d="M4.583 17.321C3.553 16.227 3 15 3 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621c.537-.278 1.24-.375 1.929-.311c1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5a3.87 3.87 0 0 1-2.748-1.179m10 0C13.553 16.227 13 15 13 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621c.537-.278 1.24-.375 1.929-.311c1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5a3.87 3.87 0 0 1-2.748-1.179" />
                                            </svg>
                                            Ready to send resume
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 24 24">
                                                <path fill="#ffffff"
                                                    d="M19.417 6.679C20.447 7.773 21 9 21 10.989c0 3.5-2.456 6.637-6.03 8.188l-.893-1.378c3.335-1.804 3.987-4.145 4.248-5.621c-.537.278-1.24.375-1.93.311c-1.804-.167-3.226-1.648-3.226-3.489a3.5 3.5 0 0 1 3.5-3.5c1.073 0 2.1.49 2.748 1.179m-10 0C10.447 7.773 11 9 11 10.989c0 3.5-2.456 6.637-6.03 8.188l-.893-1.378c3.335-1.804 3.987-4.145 4.247-5.621c-.537.278-1.24.375-1.929.311C4.591 12.323 3.17 10.842 3.17 9a3.5 3.5 0 0 1 3.5-3.5c1.073 0 2.1.49 2.748 1.179" />
                                            </svg>
                                        </p>
                                        <h4 class="mb-1">Palak Awoo</h4>
                                        <p class="mb-0">Lead Designer</p>
                                    </div>

                                    <div class="carousel-item">
                                        <p class="prelead mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 24 24">
                                                <path fill="#ffffff"
                                                    d="M4.583 17.321C3.553 16.227 3 15 3 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621c.537-.278 1.24-.375 1.929-.311c1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5a3.87 3.87 0 0 1-2.748-1.179m10 0C13.553 16.227 13 15 13 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621c.537-.278 1.24-.375 1.929-.311c1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5a3.87 3.87 0 0 1-2.748-1.179" />
                                            </svg>
                                            A very professional resume builder <svg xmlns="http://www.w3.org/2000/svg"
                                                width="25" height="25" viewBox="0 0 24 24">
                                                <path fill="#ffffff"
                                                    d="M19.417 6.679C20.447 7.773 21 9 21 10.989c0 3.5-2.456 6.637-6.03 8.188l-.893-1.378c3.335-1.804 3.987-4.145 4.248-5.621c-.537.278-1.24.375-1.93.311c-1.804-.167-3.226-1.648-3.226-3.489a3.5 3.5 0 0 1 3.5-3.5c1.073 0 2.1.49 2.748 1.179m-10 0C10.447 7.773 11 9 11 10.989c0 3.5-2.456 6.637-6.03 8.188l-.893-1.378c3.335-1.804 3.987-4.145 4.247-5.621c-.537.278-1.24.375-1.929.311C4.591 12.323 3.17 10.842 3.17 9a3.5 3.5 0 0 1 3.5-3.5c1.073 0 2.1.49 2.748 1.179" />
                                            </svg>
                                        </p>
                                        <h4 class="mb-1">Laurent Smith</h4>
                                        <p class="mb-0">Product designer</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- END wrapper -->

    <!-- Vendor -->
    <!-- <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script> -->

    <!-- App js-->
    <!-- <script src="assets/js/app.js"></script> -->
    <!-- <script src="assets/js/custom.js"></script>  -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
 <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()

$('#user_login').on('submit',function(e){
    e.preventDefault();
    let email = $('#user-email').val();
    let password = $('#user-password').val();
    if(email == '' || password == ''){
        $('.needs-validation').addClass('was-validated');
    }else{
        $('.loginSubmit').addClass('d-none');
        $('.loginSpinn').removeClass('d-none');
        $.ajax({
            url: "includes/authentication.php",
            type:"POST",
            data:{login_email:email,login_password:password},
            dataType: 'json',
           success: function(response) {
           if(response.success){
                window.location.href = 'modules/home/dashboard.php';
           }else if(response.error_password){
                $('.credentialError').html(response.error_password).css("color","#dc3545").removeClass('d-none');
                $('.loginSpinn').addClass('d-none');
                $('.loginSubmit').removeClass('d-none');
           }else if(response.error_email){
                $('.credentialError').html(response.error_email).css("color","#dc3545").removeClass('d-none');
                $('.loginSpinn').addClass('d-none');
                $('.loginSubmit').removeClass('d-none');
           }else{
                $('.credentialError').html('something went wrong!').css("color","#dc3545").removeClass('d-none');
                $('.loginSpinn').addClass('d-none');
                $('.loginSubmit').removeClass('d-none');
           }
        }

        });
    }
});
    </script>
</body>

</html>