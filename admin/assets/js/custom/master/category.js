 function loadCategories() {
        $.ajax({
            url: "../../controller/master/Category.php",
            type: "POST",
            data:{ action: 'loadData'},
            success: function (response) {
                $("#datatable11 tbody").html(response);
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
                if (response.status === 'Success') {
                    // Hide modal & reset form
                    $('.needs-validation').removeClass('was-validated');
                    $('#categoryModal').modal('hide');
                    $('#categoryForm')[0].reset();
                    loadCategories();
                } else {
                    alert('Error adding category.');
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
                if (response.status === 'Success') {
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
                if (response.status === 'Success') {
                    // Hide modal & reset form
                    $('.needs-validation').removeClass('was-validated');
                    $('#categoryModal').modal('hide');
                    $('#categoryForm')[0].reset();
                    loadCategories();
                } else {
                    alert('Error adding category.');
                }
            },
            error: function () {
                alert('Server error.');
            }
        });
    }

    $(document).on('click','.delete-category-btn',function(e){
        let id = $(this).data('id');
        $.ajax({
            url: "../../controller/master/Category.php",
            type: "POST",
            data: { action:'delete',id: id },
            dataType: 'json',
            success: function (response) {
                console.log(response);
                if (response.status === 'Success') {
                    $('.needs-validation').removeClass('was-validated');
                    $('#categoryModal').modal('hide');
                    $('#categoryForm')[0].reset();
                    loadCategories();
                } else {
                    alert('Error adding category.');
                }
            },
            error: function () {
                alert('Server error.');
            }
        });
    });