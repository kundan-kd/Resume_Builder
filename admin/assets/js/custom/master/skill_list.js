//  function loadCategories() {
//         $.ajax({
//             url: "../../controller/master/skillList.php",
//             type: "POST",
//             data:{ action: 'loadData'},
//             success: function (response) {
//                 $("#skillList_table tbody").html(response);
//             }
//         });
//     }
    function loadSkillList() {
        $.ajax({
            url: "../../controller/master/SkillList.php",
            type: "POST",
            data: { action: 'loadData' },
            success: function (response) {
                let table = $('#skillList_table').DataTable();
                table.destroy(); // destroy old instance
                $("#skillList_table tbody").html(response); // inject new rows
                $('#skillList_table').DataTable(); // reinitialize
            }
        });
    }
    loadSkillList();

    $('.skillListAdd').on('click',function(e){
        $('#skillListID').val('');
        $('.skillListTitle').html('Add Skill List');
        $('.skillListUpdate').addClass('d-none');
        $('.skillListSubmit').removeClass('d-none');
    });
    //  add data
    $('#skillListForm').on('submit', function (e) {
        e.preventDefault();
        let name = $('#skillListName').val().trim();
        if (name === '') {
            $('.needs-validation').addClass('was-validated');
            return;
        }
        $.ajax({
            url: "../../controller/master/SkillList.php",
            type: "POST",
            data: { action:'add',skillList_name: name },
            dataType: 'json',
            success: function (response) {
                console.log(response);
                if (response.success) {
                    // Hide modal & reset form
                    $('.needs-validation').removeClass('was-validated');
                    $('#skillListModal').modal('hide');
                    $('#skillListForm')[0].reset();
                    loadSkillList();
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
    $(document).on('click','.edit-skillList-btn',function(e){
        let id = $(this).data('id');
         $.ajax({
            url: "../../controller/master/SkillList.php",
            type: "POST",
            data: { action:'getData', id:id},
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    $('#skillListID').val(id);
                    $('#skillListName').val(response.data.name);
                    $('.skillListTitle').html('Update Skill List');
                    $('.skillListSubmit').addClass('d-none');
                    $('.skillListUpdate').removeClass('d-none');
                    $('#skillListModal').modal('show');
                } else {
                    alert('Error fetching skillList.');
                }
            },
            error: function () {
                alert('Server error.');
            }
        });
        
    });

   function skillListUpdate(id){
     let name = $('#skillListName').val().trim();
        if (name === '') {
            $('.needs-validation').addClass('was-validated');
            return;
        }
        $.ajax({
            url: "../../controller/master/skillList.php",
            type: "POST",
            data: { action:'update', skillList_name: name, id:id},
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Hide modal & reset form
                    $('.needs-validation').removeClass('was-validated');
                    $('#skillListModal').modal('hide');
                    $('#skillListForm')[0].reset();
                    loadSkillList();
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

    $(document).on('click','.delete-skillList-btn',function(e){
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
                            url: "../../controller/master/SkillList.php",
                            type: "POST",
                            data: { action:'delete',id: id },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $.alert({title: 'Deleted!', content: response.success,type: 'green'});
                                    $('.needs-validation').removeClass('was-validated');
                                    $('#skillListModal').modal('hide');
                                    $('#skillListForm')[0].reset();
                                    loadSkillList();
                                } else {
                                    $.alert({title: 'Error!', content: 'Programming Skill not deleted.', type: 'red'});
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