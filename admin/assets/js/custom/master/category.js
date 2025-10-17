//  function loadCategories() {
//         $.ajax({
//             url: "../../controller/master/Category.php",
//             type: "POST",
//             data:{ action: 'loadData'},
//             success: function (response) {
//                 $("#category_table tbody").html(response);
//             }
//         });
//     }
    function loadCategories() {
        $.ajax({
            url: "../../controller/master/Category.php",
            type: "POST",
            data: { action: 'loadData' },
            success: function (response) {
                let table = $('#category_table').DataTable();
                table.destroy(); // destroy old instance
                $("#category_table tbody").html(response); // inject new rows
                $('#category_table').DataTable(); // reinitialize
            }
        });
    }
    loadCategories();

    $('.categoryAdd').on('click',function(e){
        $('#categoryID').val('');
        $('.categoryTitle').html('Add Category');
        $('.categoryUpdate').addClass('d-none');
        $('.categorySubmit').removeClass('d-none');
    });
    //  add data
    $('#categoryForm').on('submit', function (e) {
        e.preventDefault();
        let name = $('#categoryName').val().trim();
        if (name === '') {
            $('.needs-validation').addClass('was-validated');
            return;
        }
        $.ajax({
            url: "../../controller/master/Category.php",
            type: "POST",
            data: { action:'add',category_name: name },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Hide modal & reset form
                    $('.needs-validation').removeClass('was-validated');
                    $('#categoryModal').modal('hide');
                    $('#categoryForm')[0].reset();
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
    $(document).on('click','.edit-category-btn',function(e){
        let id = $(this).data('id');
         $.ajax({
            url: "../../controller/master/Category.php",
            type: "POST",
            data: { action:'getData', id:id},
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    $('#categoryID').val(id);
                    $('#categoryName').val(response.data.name);
                    $('.categoryTitle').html('Update Category');
                    $('.categorySubmit').addClass('d-none');
                    $('.categoryUpdate').removeClass('d-none');
                    $('#categoryModal').modal('show');
                } else {
                    alert('Error fetching category.');
                }
            },
            error: function () {
                alert('Server error.');
            }
        });
        
    });

   function categoryUpdate(id){
     let name = $('#categoryName').val().trim();
        if (name === '') {
            $('.needs-validation').addClass('was-validated');
            return;
        }
        $.ajax({
            url: "../../controller/master/Category.php",
            type: "POST",
            data: { action:'update', category_name: name, id:id},
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Hide modal & reset form
                    $('.needs-validation').removeClass('was-validated');
                    $('#categoryModal').modal('hide');
                    $('#categoryForm')[0].reset();
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

    $(document).on('click','.delete-category-btn',function(e){
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
                            url: "../../controller/master/Category.php",
                            type: "POST",
                            data: { action:'delete',id: id },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $.alert({title: 'Deleted!', content: response.success,type: 'green'});
                                    $('.needs-validation').removeClass('was-validated');
                                    $('#categoryModal').modal('hide');
                                    $('#categoryForm')[0].reset();
                                    loadCategories();
                                } else {
                                    $.alert({title: 'Error!', content: 'Category not deleted.', type: 'red'});
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

   