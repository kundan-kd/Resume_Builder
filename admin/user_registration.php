<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Registration</title>
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
    <link href="custom/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css">
    <script src="assets/js/head.js"></script>
</head>
<body>
    <!-- Begin page -->
    <div class="account-page">
        <div class="container-fluid p-0">
            <!-- <div class="row align-items-center g-0 px-3 py-3 vh-100"> -->
            <div class="row g-0 px-3 py-3">
                <div class="col-xl-5">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="card user-signup mt-4">
                                <div class="card-body">
                                    <div class="mb-0 p-0 p-lg-3">
                                        <div class="mb-0 border-0 p-md-4 p-lg-0">
                                            <div class="mb-4 p-0 text-lg-start text-center">
                                                <div class="auth-brand">
                                                    <a href="index.html" class="logo logo-light">
                                                        <span class="logo-lg">
                                                            <img src="assets/images/logo-light-3.png" alt=""
                                                                height="24">
                                                        </span>
                                                    </a>
                                                  <!--<a href="index.html" class="logo logo-dark">-->
                                                    <!--    <span class="logo-lg">-->
                                                    <!--        <img src="assets/images/logo-dark-3.png" alt="" height="24">-->
                                                    <!--    </span>-->
                                                    <!--</a>-->
                                                    <h3 style="color:#838383;">Resume Builder</h3>
                                                </div>
                                            </div>
                                            <div class="pt-0">
                                                <form id="user_registration" class="needs-validation my-4" novalidate>
                                                    <div class="form-group mb-3">
                                                        <label for="firstname" class="form-label">First Name</label>
                                                        <input class="form-control" type="text" id="reg-firstname"
                                                            name="firstname" placeholder="Enter your first name"
                                                            required>
                                                            <div class="invalid-feedback">
                                                                Enter First Name                
                                                            </div>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="lastname" class="form-label">Last Name</label>
                                                        <input class="form-control" type="text" id="reg-lastname"
                                                            name="lastname" placeholder="Enter your first name"
                                                            required>
                                                            <div class="invalid-feedback">
                                                                Enter Last Name              
                                                            </div>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input class="form-control" type="email" id="reg-email" name="email"
                                                            placeholder="Enter your email" required>
                                                            <div class="invalid-feedback">
                                                                Enter valid Email ID                
                                                            </div>
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input class="form-control" type="password" id="reg-password"
                                                            name="password" placeholder="Enter your password"
                                                            maxlength="32" required>
                                                            <div class="invalid-feedback">
                                                                Enter Password                
                                                            </div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label for="confirm-password" class="form-label">Confirm
                                                            Password</label>
                                                        <input class="form-control" type="password"
                                                            id="reg-confirm-password" name="confirm-password"
                                                            placeholder="Enter your password" maxlength="32" required>
                                                            <div class="invalid-feedback">
                                                                Enter Confirm Password                
                                                            </div>
                                                    </div>
                                                    <div class="form-group mb-0 row">
                                                        <div class="col-12">
                                                            <div class="d-grid">
                                                                <button class="btn btn-primary fw-semibold"
                                                                    type="submit"> Sign Up</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <div class="text-center text-muted">
                                                    <p class="mb-0">Already Signed Up ?<a
                                                            class='text-primary ms-2 fw-medium'
                                                            href='index.php'>Login</a></p>
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
                                        <p class="mb-0"> Developer</p>
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
                                            A very professional resume builder
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 24 24">
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
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script>
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

$('#user_registration').on('submit',function(e){
    e.preventDefault();
    let firstname = $('#reg-firstname').val();
    let lastname = $('#reg-lastname').val();
    let email = $('#reg-email').val();
    let password = $('#reg-password').val();
    let cpassword = $('#reg-confirm-password').val();
    if(firstname == '' || lastname == '' || email == '' || password == '' || cpassword == ''){
        $('.needs-validation').addClass('was-validated');
    }else{
        $.ajax({
            url: "includes/authentication.php",
            type:"POST",
            data:{reg_firstname:firstname,reg_lastname:lastname,reg_email:email,reg_password:password},
            dataType: 'json',
            success:function(response){
                console.log(response);
                if (response.success) {
                    alert('User created successfully');
                    window.location.href = 'index.php';
                }else if(response.error_success){
                    alert(response.error_success);
                }else if(response.already_found){
                    alert(response.already_found);
                }else{
                    alert('something went wrong');
                }
            }
        });
    }
});
</script>
    </body>
        
        </html> 