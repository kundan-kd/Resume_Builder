    // function loadDesignations() {
    //     $.ajax({
    //         url: "../../controller/master/Designation.php",
    //         type: "POST",
    //         data:{ action: 'loadData'},
    //         success: function (response) {
    //             $("#designation_table tbody").html(response);
    //         }
    //     });
    // }
    function loadDesignations() {
        $.ajax({
            url: "../../controller/master/Designation.php",
            type: "POST",
            data: { action: 'loadData' },
            success: function (response) {
                let table = $('#designation_table').DataTable();
                table.destroy(); // destroy old instance
                $("#designation_table tbody").html(response); // inject new rows
                $('#designation_table').DataTable(); // reinitialize
            }
        });
    }
    loadDesignations();

    $('.designationAdd').on('click',function(e){
        $('#designationID').val('');
        $('.designationTitle').html('Add Designation');
        $('.designationUpdate').addClass('d-none');
        $('.designationSubmit').removeClass('d-none');
    });
    //  add data
    $('#designationForm').on('submit', function (e) {
        e.preventDefault();
        let name = $('#designationName').val().trim();
        if (name === '') {
            $('.needs-validation').addClass('was-validated');
            return;
        }
        $.ajax({
            url: "../../controller/master/Designation.php",
            type: "POST",
            data: { action:'add',designation_name: name },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Hide modal & reset form
                    $('.needs-validation').removeClass('was-validated');
                    $('#designationModal').modal('hide');
                    $('#designationForm')[0].reset();
                    loadDesignations();
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
    $(document).on('click','.edit-designation-btn',function(e){
        let id = $(this).data('id');
         $.ajax({
            url: "../../controller/master/Designation.php",
            type: "POST",
            data: { action:'getData', id:id},
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    $('#designationID').val(id);
                    $('#designationName').val(response.data.name);
                    $('.designationTitle').html('Update designation');
                    $('.designationSubmit').addClass('d-none');
                    $('.designationUpdate').removeClass('d-none');
                    $('#designationModal').modal('show');
                } else {
                    alert('Error fetching designation.');
                }
            },
            error: function () {
                alert('Server error.');
            }
        });
        
    });

   function designationUpdate(id){
     let name = $('#designationName').val().trim();
        if (name === '') {
            $('.needs-validation').addClass('was-validated');
            return;
        }
        $.ajax({
            url: "../../controller/master/Designation.php",
            type: "POST",
            data: { action:'update', designation_name: name, id:id},
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Hide modal & reset form
                    $('.needs-validation').removeClass('was-validated');
                    $('#designationModal').modal('hide');
                    $('#designationForm')[0].reset();
                    loadDesignations();
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

    $(document).on('click','.delete-designation-btn',function(e){
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
                            url: "../../controller/master/designation.php",
                            type: "POST",
                            data: { action:'delete',id: id },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $.alert({title: 'Deleted!', content: response.success,type: 'green'});
                                    $('.needs-validation').removeClass('was-validated');
                                    $('#designationModal').modal('hide');
                                    $('#designationForm')[0].reset();
                                    loadDesignations();
                                } else {
                                    $.alert({title: 'Error!', content: 'designation not deleted.', type: 'red'});
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