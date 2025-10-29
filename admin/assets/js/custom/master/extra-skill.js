    // function loadCategories() {
    //         $.ajax({
    //             url: "../../controller/master/extraSkill.php",
    //             type: "POST",
    //             data:{ action: 'loadData'},
    //             success: function (response) {
    //                 $("#extraSkill_table tbody").html(response);
    //             }
    //         });
    //     }
    function loadExtraSkills() {
        $.ajax({
            url: "../../controller/master/ExtraSkill.php",
            type: "POST",
            data: { action: 'loadData' },
            success: function (response) {
                let table = $('#extra_skill_table').DataTable();
                table.destroy(); // destroy old instance
                $("#extra_skill_table tbody").html(response); // inject new rows
                $('#extra_skill_table').DataTable(); // reinitialize
            }
        });
    }
    loadExtraSkills();

    $('.extraSkillAdd').on('click',function(e){
        $('#extraSkillID').val('');
        $('.extraSkillTitle').html('Add Extra Skill');
        $('.extraSkillUpdate').addClass('d-none');
        $('.extraSkillSubmit').removeClass('d-none');
    });
    //  add data
    $('#extraSkillForm').on('submit', function (e) {
        e.preventDefault();
        let name = $('#extraSkillName').val().trim();
        if (name === '') {
            $('.needs-validation').addClass('was-validated');
            return;
        }
        $.ajax({
            url: "../../controller/master/ExtraSkill.php",
            type: "POST",
            data: { action:'add',extraSkill_name: name },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Hide modal & reset form
                    $('.needs-validation').removeClass('was-validated');
                    $('#extraSkillModal').modal('hide');
                    $('#extraSkillForm')[0].reset();
                    loadExtraSkills();
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
    $(document).on('click','.edit-extraSkill-btn',function(e){
        let id = $(this).data('id');
         $.ajax({
            url: "../../controller/master/ExtraSkill.php",
            type: "POST",
            data: { action:'getData', id:id},
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    $('#extraSkillID').val(id);
                    $('#extraSkillName').val(response.data.name);
                    $('.extraSkillTitle').html('Update extraSkill');
                    $('.extraSkillSubmit').addClass('d-none');
                    $('.extraSkillUpdate').removeClass('d-none');
                    $('#extraSkillModal').modal('show');
                } else {
                    alert('Error fetching extraSkill.');
                }
            },
            error: function () {
                alert('Server error.');
            }
        });
        
    });

   function extraSkillUpdate(id){
     let name = $('#extraSkillName').val().trim();
        if (name === '') {
            $('.needs-validation').addClass('was-validated');
            return;
        }
        $.ajax({
            url: "../../controller/master/ExtraSkill.php",
            type: "POST",
            data: { action:'update', extraSkill_name: name, id:id},
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    // Hide modal & reset form
                    $('.needs-validation').removeClass('was-validated');
                    $('#extraSkillModal').modal('hide');
                    $('#extraSkillForm')[0].reset();
                    loadExtraSkills();
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

    $(document).on('click','.delete-extraSkill-btn',function(e){
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
                            url: "../../controller/master/ExtraSkill.php",
                            type: "POST",
                            data: { action:'delete',id: id },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $.alert({title: 'Deleted!', content: response.success,type: 'green'});
                                    $('.needs-validation').removeClass('was-validated');
                                    $('#extraSkillModal').modal('hide');
                                    $('#extraSkillForm')[0].reset();
                                    loadExtraSkills();
                                } else {
                                    $.alert({title: 'Error!', content: 'Extra Skill not deleted.', type: 'red'});
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