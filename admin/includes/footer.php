        <?php
require_once 'main_header.php';
if (isset($_SESSION['user_email'])) {
    $email = mysqli_real_escape_string($conn, $_SESSION['user_email']);
    $select = "SELECT * FROM `user_registrations` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $select);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "No user found.";
    }
} else {
    echo "User email not set in session.";
}

?>
        <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col fs-13 text-muted text-center">
                                    &copy;
                                    <script>document.write(new Date().getFullYear())</script> - Made with <span
                                        class="mdi mdi-heart text-danger"></span> by <a target="_blank" href="https://techiesquad.com/"
                                        class="text-reset fw-semibold">Techie Squad</a>
                                </div>
                            </div>
                        </div>
                    </footer>
        <script src="../../assets/libs/jquery/jquery.min.js"></script>
        <script src="../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../assets/libs/simplebar/simplebar.min.js"></script>
        <script src="../../assets/libs/node-waves/waves.min.js"></script>
        <script src="../../assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="../../assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
        <script src="../../assets/libs/feather-icons/feather.min.js"></script>
        <!-- Apexcharts JS -->
        <!-- <script src="../../assets/libs/apexcharts/apexcharts.min.js"></script> -->
        <!-- Widgets Init Js -->
        <!-- <script src="../../assets/js/pages/crm-dashboard.init.js"></script> -->
        <!-- App js-->
        <script src="../../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <!-- dataTables.bootstrap5 -->
        <script src="../../assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
        <!-- <script src="../../assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script> -->
        <!-- buttons.colVis -->
        <!-- <script src="../../assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <script src="../../assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="../../assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="../../assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script> -->
        <!-- buttons.bootstrap5 -->
        <!-- <script src="../../assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script> -->
        <!-- dataTables.keyTable -->
        <!-- <script src="../../assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="../../assets/libs/datatables.net-keytable-bs5/js/keyTable.bootstrap5.min.js"></script> -->
        <!-- dataTable.responsive -->
        <script src="../../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../../assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
        <!-- dataTables.select -->
        <script src="../../assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
        <script src="../../assets/libs/datatables.net-select-bs5/js/select.bootstrap5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
            <!-- Bootstrap JS Bundle (includes Popper) -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
         <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->
        <!-- <script src="../../assets/js/custom.js"></script> -->
        <script src="../../assets/js/app.js"></script>
        <script src="../../assets/js/custom/common.js"></script>
        <style>
            .btn-light-green {
                background-color: #20493aff !important;
                color: #ffffffff !important;
                border: none !important;
            }
            .btn-light-green:hover {
                background-color: #439771ff !important;
                color: #ffffffff !important;
            }

            .btn-light-red {
                background-color: #571b20ff !important;
                color: #ffffffff !important;
                border: none !important;
            }
            .btn-light-red:hover {
                background-color: #943d46ff !important;
                color: #ffffffff !important;
            }
        </style>

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

        function logout() {
            $.ajax({
                url: '../../includes/logout.php',
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        window.location.href = '../../index.php';
                    }
                }
            });
        }

        function publishAlert() {
        $.confirm({
            title: 'Your site is live!',
            content: 'View your site at: <br><strong>http://localhost/resume_builder/index.php?token=<?php echo $row['token']; ?></strong>',
            theme: 'supervan',
            buttons: {
                confirm: {
                    text: 'View your site',
                    btnClass: 'btn-light-green',
                    action: function () {
                        window.open("http://localhost/resume_builder/index.php?token=<?php echo $row['token']; ?>", "_blank");
                    }
                },
                cancel: {
                    text: 'Back to Editor',
                    btnClass: 'btn-light-red',
                    action: function () {
                        console.log('Cancelled!');
                    }
                }
            }
        });
    }
        </script>
      