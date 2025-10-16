 function loadCategories() {
        $.ajax({
            url: "../../controller/master/Plan.php",
            type: "POST",
            data:{ action: 'loadData'},
            success: function (response) {
                $("#plan_table tbody").html(response);
            }
        });
    }
    loadCategories();

    $('.planAdd').on('click',function(e){
        $('#planID').val('');
        $('.planTitle').html('Add Plan');
        $('.planUpdate').addClass('d-none');
        $('.planSubmit').removeClass('d-none');
    });
    //  add data
    $('#planForm').on('submit', function (e) {
        e.preventDefault();
        let name = $('#planName').val().trim();
        if (name === '') {
            $('.needs-validation').addClass('was-validated');
            return;
        }
        $.ajax({
            url: "../../controller/master/Plan.php",
            type: "POST",
            data: { action:'add',plan_name: name },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Hide modal & reset form
                    $('.needs-validation').removeClass('was-validated');
                    $('#planModal').modal('hide');
                    $('#planForm')[0].reset();
                    loadCategories();
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
    $(document).on('click','.edit-plan-btn',function(e){
        let id = $(this).data('id');
         $.ajax({
            url: "../../controller/master/Plan.php",
            type: "POST",
            data: { action:'getData', id:id},
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    $('#planID').val(id);
                    $('#planName').val(response.data.name);
                    $('.planTitle').html('Update Plan');
                    $('.planSubmit').addClass('d-none');
                    $('.planUpdate').removeClass('d-none');
                    $('#planModal').modal('show');
                } else {
                    alert('Error fetching plan.');
                }
            },
            error: function () {
                alert('Server error.');
            }
        });
        
    });

   function planUpdate(id){
     let name = $('#planName').val().trim();
        if (name === '') {
            $('.needs-validation').addClass('was-validated');
            return;
        }
        $.ajax({
            url: "../../controller/master/Plan.php",
            type: "POST",
            data: { action:'update', plan_name: name, id:id},
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Hide modal & reset form
                    $('.needs-validation').removeClass('was-validated');
                    $('#planModal').modal('hide');
                    $('#planForm')[0].reset();
                    loadCategories();
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

    $(document).on('click','.delete-plan-btn',function(e){
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
                            url: "../../controller/master/Plan.php",
                            type: "POST",
                            data: { action:'delete',id: id },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $.alert({title: 'Deleted!', content: response.success,type: 'green'});
                                    $('.needs-validation').removeClass('was-validated');
                                    $('#planModal').modal('hide');
                                    $('#planForm')[0].reset();
                                    loadCategories();
                                } else {
                                    $.alert({title: 'Error!', content: 'plan not deleted.', type: 'red'});
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