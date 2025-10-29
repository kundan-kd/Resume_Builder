//  function loadCategories() {
//         $.ajax({
//             url: "../../controller/master/qualification.php",
//             type: "POST",
//             data:{ action: 'loadData'},
//             success: function (response) {
//                 $("#qualification_table tbody").html(response);
//             }
//         });
//     }
    function loadQualification() {
        $.ajax({
            url: "../../controller/master/Qualification.php",
            type: "POST",
            data: { action: 'loadData' },
            success: function (response) {
                let table = $('#qualification_table').DataTable();
                table.destroy(); // destroy old instance
                $("#qualification_table tbody").html(response); // inject new rows
                $('#qualification_table').DataTable(); // reinitialize
            }
        });
    }
    loadQualification();

    $('.qualificationAdd').on('click',function(e){
        $('#qualificationID').val('');
        $('.qualificationTitle').html('Add Qualification');
        $('.qualificationUpdate').addClass('d-none');
        $('.qualificationSubmit').removeClass('d-none');
    });
    //  add data
    $('#qualificationForm').on('submit', function (e) {
        e.preventDefault();
        let name = $('#qualificationName').val().trim();
        if (name === '') {
            $('.needs-validation').addClass('was-validated');
            return;
        }
        $.ajax({
            url: "../../controller/master/Qualification.php",
            type: "POST",
            data: { action:'add',qualification_name: name },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Hide modal & reset form
                    $('.needs-validation').removeClass('was-validated');
                    $('#qualificationModal').modal('hide');
                    $('#qualificationForm')[0].reset();
                    loadQualification();
                    toastSuccessAlert(response.success);
                } else if(response.error_success) {
                   toastErrorAlert(response.error_success);
                }else{
                    toastErrorAlert('something went wrong!');
                }
            },
            error: function () {
                alert('Server error.');
            }
        });
    });
    $(document).on('click','.edit-qualification-btn',function(e){
        let id = $(this).data('id');
         $.ajax({
            url: "../../controller/master/Qualification.php",
            type: "POST",
            data: { action:'getData', id:id},
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    $('#qualificationID').val(id);
                    $('#qualificationName').val(response.data.name);
                    $('.qualificationTitle').html('Update Qualification');
                    $('.qualificationSubmit').addClass('d-none');
                    $('.qualificationUpdate').removeClass('d-none');
                    $('#qualificationModal').modal('show');
                } else {
                    alert('Error fetching qualification.');
                }
            },
            error: function () {
                alert('Server error.');
            }
        });
        
    });

   function qualificationUpdate(id){
     let name = $('#qualificationName').val().trim();
        if (name === '') {
            $('.needs-validation').addClass('was-validated');
            return;
        }
        $.ajax({
            url: "../../controller/master/Qualification.php",
            type: "POST",
            data: { action:'update', qualification_name: name, id:id},
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Hide modal & reset form
                    $('.needs-validation').removeClass('was-validated');
                    $('#qualificationModal').modal('hide');
                    $('#qualificationForm')[0].reset();
                    loadQualification();
                    toastSuccessAlert(response.success);
                } else if(response.error_success){
                    toastErrorAlert(response.error_success);
                }else{
                    toastErrorAlert('something went wrong!');
                }
            },
            error: function () {
                alert('Server error.');
            }
        });
    }

    $(document).on('click','.delete-qualification-btn',function(e){
        let id = $(this).data('id');
        $.confirm({
            title: 'Are you sure?',
            content: "You won't be able to revert this!",
            type: 'red',
            buttons: {
                confirm: {
                    text: 'Yes, delete it!',
                    btnClass: 'btn-red',
                    action: function () {
                        
                        $.ajax({
                            url: "../../controller/master/Qualification.php",
                            type: "POST",
                            data: { action:'delete',id: id },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $.alert({title: 'Deleted!', content: response.success,type: 'green'});
                                    $('.needs-validation').removeClass('was-validated');
                                    $('#qualificationModal').modal('hide');
                                    $('#qualificationForm')[0].reset();
                                    loadQualification();
                                } else {
                                    $.alert({title: 'Error!', content: 'Qualification not deleted.', type: 'red'});
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                $.alert({
                                    title: 'Error!',
                                    content: 'An error occurred: ' + error,
                                    type: 'red'
                                });
                            }
                        });
                    }
                },
                cancel: function () {
                    // Optional: do nothing or show a message
                }
            }
        });
    });