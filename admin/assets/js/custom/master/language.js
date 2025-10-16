 function loadCategories() {
        $.ajax({
            url: "../../controller/master/Language.php",
            type: "POST",
            data:{ action: 'loadData'},
            success: function (response) {
                $("#language_table tbody").html(response);
            }
        });
    }
    loadCategories();

    $('.languageAdd').on('click',function(e){
        $('#languageID').val('');
        $('.languageTitle').html('Add Language');
        $('.languageUpdate').addClass('d-none');
        $('.languageSubmit').removeClass('d-none');
    });
    //  add data
    $('#languageForm').on('submit', function (e) {
        e.preventDefault();
        let name = $('#languageName').val().trim();
        if (name === '') {
            $('.needs-validation').addClass('was-validated');
            return;
        }
        $.ajax({
            url: "../../controller/master/Language.php",
            type: "POST",
            data: { action:'add',language_name: name },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Hide modal & reset form
                    $('.needs-validation').removeClass('was-validated');
                    $('#languageModal').modal('hide');
                    $('#languageForm')[0].reset();
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
    $(document).on('click','.edit-language-btn',function(e){
        let id = $(this).data('id');
         $.ajax({
            url: "../../controller/master/Language.php",
            type: "POST",
            data: { action:'getData', id:id},
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    $('#languageID').val(id);
                    $('#languageName').val(response.data.name);
                    $('.languageTitle').html('Update Language');
                    $('.languageSubmit').addClass('d-none');
                    $('.languageUpdate').removeClass('d-none');
                    $('#languageModal').modal('show');
                } else {
                    alert('Error fetching language.');
                }
            },
            error: function () {
                alert('Server error.');
            }
        });
        
    });

   function languageUpdate(id){
     let name = $('#languageName').val().trim();
        if (name === '') {
            $('.needs-validation').addClass('was-validated');
            return;
        }
        $.ajax({
            url: "../../controller/master/Language.php",
            type: "POST",
            data: { action:'update', language_name: name, id:id},
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Hide modal & reset form
                    $('.needs-validation').removeClass('was-validated');
                    $('#languageModal').modal('hide');
                    $('#languageForm')[0].reset();
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

    $(document).on('click','.delete-language-btn',function(e){
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
                            url: "../../controller/master/Language.php",
                            type: "POST",
                            data: { action:'delete',id: id },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $.alert({title: 'Deleted!', content: response.success,type: 'green'});
                                    $('.needs-validation').removeClass('was-validated');
                                    $('#languageModal').modal('hide');
                                    $('#languageForm')[0].reset();
                                    loadCategories();
                                } else {
                                    $.alert({title: 'Error!', content: 'language not deleted.', type: 'red'});
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