$('#qualification_type').on('change', function() {
    let value = $(this).val();
    if (value == 'Education') {
        $('.education-type').removeClass('d-none');
    } else {
        $('.education-type').addClass('d-none');
    }
});

$('#profile-qualification').on('submit', function(e) {
    e.preventDefault();
    let qualification_type = $('#qualification_type').val();
    let education_type = $('#education_type').val();
    let education_type_name = $('#education_type option:selected').text();
    let qualification_title = $('#qualification_title').val().trim();
    let start_date = $('#qualification_start_date').val();
    let end_date = $('#qualification_end_date').val();
    let certification = $('#qualification_certification').val().trim();
    let desc = $('#qualification_description').val().trim();

    if (!qualification_type || !start_date || !end_date || !qualification_title || !desc) {
        $('#profile-qualification .needs-validation').addClass('was-validated');
        return;
    }

$('#qualification-table tbody').append(`
    <tr>
        <td>#</td>
        <td>${qualification_type}<input type="hidden" name="qualification_type[]" value="${qualification_type}"></td>
        <td>${qualification_type == 'Education' ? education_type_name : '0'}<input type="hidden" name="education_type[]" value="${qualification_type == 'Education' ? education_type : '0'}"></td>
        <td>${qualification_title}<input type="hidden" name="qualification_title[]" value="${qualification_title}"></td>
        <td>${start_date}<input type="hidden" name="qualification_start_date[]" value="${start_date}"></td>
        <td>${end_date}<input type="hidden" name="qualification_end_date[]" value="${end_date}"></td>
        <td>${desc}<input type="hidden" name="qualification_description[]" value="${desc}"></td>
        <td>${certification}<input type="hidden" name="qualification_certification[]" value="${certification}"></td>
        <td><button class="btn btn-danger btn-sm delete-row">Delete</button></td>
    </tr>
`);
    $('#profile-qualification')[0].reset();
    $('.needs-validation').removeClass('was-validated');
});
$('#qualification-table').on('click', '.delete-row', function() {
    $(this).closest('tr').remove();
});

function updateQualifications(event) {
    if (event) event.preventDefault();

    // Helper function to collect and clean input values
    function collectInputs(name) {
        return $("input[name='" + name + "']")
            .map(function () {
                return $(this).val().trim();
            })
            .get()
            .filter(function (val) {
                return val !== "";
            });
    }

    // Collect data from hidden inputs
    let qualificationTypes = collectInputs("qualification_type[]");
    let educationType = collectInputs("education_type[]");
    let qualificationTitles = collectInputs("qualification_title[]");
    let startDates = collectInputs("qualification_start_date[]");
    let endDates = collectInputs("qualification_end_date[]");
    let certifications = collectInputs("qualification_certification[]");
    let descriptions = collectInputs("qualification_description[]");

    // Send via AJAX to Core PHP
    $.ajax({
        url: "../../controller/profile/ProfileTwo.php",
        type: "POST",
        data: {
            qualification_type: qualificationTypes,
            education_type: educationType,
            qualification_title: qualificationTitles,
            start_date: startDates,
            end_date: endDates,
            certification: certifications,
            desc: descriptions
        },
        dataType: "json",
        success: function (response) {
            if (response.success) {
                toastSuccessAlert(response.success);
                qualificationView();
            } else if (response.error_success) {
                toastErrorAlert(response.error_success);
            } else {
                toastErrorAlert("Unexpected server response");
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX Error:", error);
            toastErrorAlert("Request failed. Check console for details.");
        }
    });
}
function qualificationView(){
    $.ajax({
        url: "../../controller/profile/ProfileTwo.php",
        type: "POST",
        data: { getQualification: true },
        success: function(response) {
            let data = JSON.parse(response).data;
            $('#qualification-table tbody').empty(); // Optional: clear old rows

            data.forEach((element, index) => {
                $('#qualification-table tbody').append(`
                    <tr>
                        <td scope="row">${index + 1}</td>
                        <td>${element.qualification_type}</td>
                        <td>${element.name || ''}</td>
                        <td>${element.qualification_title}</td>
                        <td>${element.start_date}</td>
                        <td>${element.end_date}</td>
                        <td>${element.description}</td>
                        <td>${element.certification}</td>
                        <td>
                            <button class='btn btn-outline-primary btn-sm me-2' onclick="editQualification(${element.id})">
                                <i class='ri-pencil-line'></i>
                            </button>
                            <button class='btn btn-outline-danger btn-sm' onclick="deleteQualification(${element.id})">
                                <i class='ri-delete-bin-6-line'></i>
                            </button>
                        </td>
                    </tr>
                `);
            });
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
        }
    });
}
qualificationView();

function editQualification(id){
    $('.qualificationAddBtn').addClass('d-none');
    $('.qualificationUpdateBtn').removeClass('d-none');
    $.ajax({
        url:"../../controller/profile/ProfileTwo.php",
        type:"POST",
        data:{GetQualificationData:true, id:id},
        dataType:'json',
        success:function(response){
            let data = response.data[0];
            $('#qualificationId').val(data.id);
            $('#qualification_type').val(data.qualification_type);
            $('#education_type').val(data.education_id);
            $('#qualification_title').val(data.qualification_title);
            $('#qualification_start_date').val(data.start_date);
            $('#qualification_end_date').val(data.end_date);
            $('#qualification_certification').val(data.certification);
            $('#qualification_description').val(data.description);
        }
    });
}
function updateQualificationData(id){
    let qualification =  $('#qualification_type').val();
    let education =  $('#education_type').val();
    let title =  $('#qualification_title').val();
    let start_date = $('#qualification_start_date').val();
    let end_date = $('#qualification_end_date').val();
    let certification = $('#qualification_certification').val();
    let desc = $('#qualification_description').val();
    if(qualification == '' || title == '' || start_date =='' || end_date == ''|| desc ==''){
       $('form#profile-qualification.needs-validation').addClass('was-validated'); // to target specific form class
        return;
    }else{
       $('form#profile-qualification.needs-validation').removeClass('was-validated'); // to target specific form class
    }
    $.ajax({
        url:"../../controller/profile/ProfileTwo.php",
        type:"POST",
        data:{updateQualification:true,id:id,qualification:qualification,education:education,title:title,start_date:start_date,end_date:end_date,certification:certification,desc:desc},
        dataType:'json',
        success:function(response){
            if (response.success) {
                $('form#profile-plan.needs-validation').removeClass('was-validated');
                $('#qualificationId').val('');
                $('#qualification_type').val('');
                $('#qualification_title').val('');
                $('#qualification_start_date').val('');
                $('#qualification_end_date').val('');
                $('#qualification_certification').val('');
                $('#qualification_description').val('');
                qualificationView();
                toastSuccessAlert(response.success);
            } else if (parseResponse.error_success) {
                toastErrorAlert(parseResponse.error_success);
            } else {
                toastErrorAlert('Something went wrong!');
            }
            $('.qualificationUpdateBtn').addClass('d-none');
            $('.qualificationAddBtn').removeClass('d-none');
        }        
    });
}
function deleteQualification(id){
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
                        url: "../../controller/profile/ProfileTwo.php",
                        type: "POST",
                        data: { deleteQualification:true,id: id },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $.alert({title: 'Deleted!', content: response.success,type: 'green'});
                                qualificationView();
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
}


function serviceSwitchClick(){
    let badge = $('.form-check-label .service-badge');
    badge.removeClass('bg-success bg-danger').addClass('bg-secondary').text('Updating...');
    $.ajax({
        url: "../../controller/profile/ProfileTwo.php",
        type: "POST",
        data: { myserviceStatus: true },
        dataType: 'json',
        success: function(response){
            console.log(response.data);
            if(response.success !== undefined){
                // Remove existing status classes
                badge.removeClass('bg-secondary bg-success bg-danger');
                if(response.data == 1){
                    badge.addClass('bg-success').text('Active');
                } else {
                    badge.addClass('bg-danger').text('InActive');
                }
                toastSuccessAlert(response.success);
            } else {
                toastErrorAlert(response.error_success || "Unknown error occurred.");
            }
        },
        error: function(){
            toastErrorAlert("Failed to update service status.");
        }
    });
}

function projectSwitchClick(){
    let badge1 = $('.form-check-label .project-badge');
    badge1.removeClass('bg-success bg-danger').addClass('bg-secondary').text('Updating...');

    $.ajax({
        url: "../../controller/profile/ProfileTwo.php",
        type: "POST",
        data: { projectStatus: true },
        dataType: 'json',
        success: function(response){
            if(response.success !== undefined){
                badge1.removeClass('bg-secondary bg-success bg-danger');

                if(response.data == 1){
                    badge1.addClass('bg-success').text('Active');
                } else {
                    badge1.addClass('bg-danger').text('InActive');
                }
                toastSuccessAlert(response.success);
            } else {
                toastErrorAlert(response.error_success || "Unknown error occurred.");
            }
        },
        error: function(){
            toastErrorAlert("Failed to update project status.");
        }
    });
}
function planSwitchClick(){
    let badge2 = $('.form-check-label .plan-badge');
    badge2.removeClass('bg-success bg-danger').addClass('bg-secondary').text('Updating...');

    $.ajax({
        url: "../../controller/profile/ProfileTwo.php",
        type: "POST",
        data: { planStatus: true },
        dataType: 'json',
        success: function(response){
            if(response.success !== undefined){
                badge2.removeClass('bg-secondary bg-success bg-danger');

                if(response.data == 1){
                    badge2.addClass('bg-success').text('Active');
                } else {
                    badge2.addClass('bg-danger').text('InActive');
                }
                toastSuccessAlert(response.success);
            } else {
                toastErrorAlert(response.error_success || "Unknown error occurred.");
            }
        },
        error: function(){
            toastErrorAlert("Failed to update plan status.");
        }
    });
}