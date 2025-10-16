 function loadCategories() {
        $.ajax({
            url: "../../controller/master/ProgrammingSkill.php",
            type: "POST",
            data:{ action: 'loadData'},
            success: function (response) {
                $("#programmingSkill_table tbody").html(response);
            }
        });
    }
    loadCategories();

    $('.programmingSkillAdd').on('click',function(e){
        $('#programmingSkillID').val('');
        $('.programmingSkillTitle').html('Add Programming Skill');
        $('.programmingSkillUpdate').addClass('d-none');
        $('.programmingSkillSubmit').removeClass('d-none');
    });
    //  add data
    $('#programmingSkillForm').on('submit', function (e) {
        e.preventDefault();
        let name = $('#programmingSkillName').val().trim();
        if (name === '') {
            $('.needs-validation').addClass('was-validated');
            return;
        }
        $.ajax({
            url: "../../controller/master/ProgrammingSkill.php",
            type: "POST",
            data: { action:'add',programmingSkill_name: name },
            dataType: 'json',
            success: function (response) {
                console.log(response);
                if (response.success) {
                    // Hide modal & reset form
                    $('.needs-validation').removeClass('was-validated');
                    $('#programmingSkillModal').modal('hide');
                    $('#programmingSkillForm')[0].reset();
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
    $(document).on('click','.edit-programmingSkill-btn',function(e){
        let id = $(this).data('id');
         $.ajax({
            url: "../../controller/master/ProgrammingSkill.php",
            type: "POST",
            data: { action:'getData', id:id},
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    $('#programmingSkillID').val(id);
                    $('#programmingSkillName').val(response.data.name);
                    $('.programmingSkillTitle').html('Update Programming Skill');
                    $('.programmingSkillSubmit').addClass('d-none');
                    $('.programmingSkillUpdate').removeClass('d-none');
                    $('#programmingSkillModal').modal('show');
                } else {
                    alert('Error fetching programmingSkill.');
                }
            },
            error: function () {
                alert('Server error.');
            }
        });
        
    });

   function programmingSkillUpdate(id){
     let name = $('#programmingSkillName').val().trim();
        if (name === '') {
            $('.needs-validation').addClass('was-validated');
            return;
        }
        $.ajax({
            url: "../../controller/master/ProgrammingSkill.php",
            type: "POST",
            data: { action:'update', programmingSkill_name: name, id:id},
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Hide modal & reset form
                    $('.needs-validation').removeClass('was-validated');
                    $('#programmingSkillModal').modal('hide');
                    $('#programmingSkillForm')[0].reset();
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

    $(document).on('click','.delete-programmingSkill-btn',function(e){
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
                            url: "../../controller/master/ProgrammingSkill.php",
                            type: "POST",
                            data: { action:'delete',id: id },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $.alert({title: 'Deleted!', content: response.success,type: 'green'});
                                    $('.needs-validation').removeClass('was-validated');
                                    $('#programmingSkillModal').modal('hide');
                                    $('#programmingSkillForm')[0].reset();
                                    loadCategories();
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