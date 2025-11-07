

 $('#qualification_type').on('change', function() {
        let value = $(this).val();
        if (value === 'Education') {
            $('.education-type').removeClass('d-none');
        } else {
            $('.education-type').addClass('d-none');
        }
    });


$('#profile-qualification').on('submit', function(e){
    e.preventDefault();
    // alert();
    let qualification_type = $('#qualification_type').val();
    let education_type = $('#education_type').val();
    let education_type_name = $('#education_type option:selected').text();
    let qualification_title = $('#qualification_title').val();
    let start_date = $('#qualification_start_date').val();
    let end_date = $('#qualification_end_date').val();
    let certification = $('#qualification_certification').val();
    let image = $('#qualification_upload').val() || '';
    let desc = $('#qualification_description').val();
    if(!qualification_type || !start_date || !end_date || !qualification_title || !desc){
        $('#profile-qualification .needs-validation').addClass('was-validated');
        return;
    }else{
        $('#qualification-table tbody').append(`
                <tr>
                    <td>#</td>
                    <td>${qualification_type}<input type="hidden" name="qualification_type[]" value="${qualification_type}"></td>
                    <td>${education_type_name}<input type="hidden" name="education_type[]" value="${education_type}"></td>
                    <td>${qualification_title}<input type="hidden" name="qualification_title[]" value="${qualification_title}"></td>
                    <td>${start_date}<input type="hidden" name="qualification_start_date[]" value="${start_date}"></td>
                    <td>${end_date}<input type="hidden" name="qualification_end_date[]" value="${end_date}"></td>
                    <td>${certification}<input type="hidden" name="qualification_certification[]" value="${certification}"></td>
                    <td>${image}<input type="hidden" name="qualification_upload[]" value="${image}"></td>
                    <td>${desc}<input type="hidden" name="qualification_description[]" value="${desc}"></td>
                </tr>
            `);
             $('#profile-qualification .needs-validation').removeClass('was-validated');
    }
});

function updateQualifications(event) {
    if (event) event.preventDefault();

    // Collect data manually from hidden inputs in the table
    let qualificationTypes = $("input[name='qualification_type[]']").map(function () {
        return $(this).val();
    }).get();
    let educationType = $("input[name='education_type[]']").map(function () {
        return $(this).val();
    }).get();

    let qualificationTitles = $("input[name='qualification_title[]']").map(function () {
        return $(this).val();
    }).get();

    let startDates = $("input[name='qualification_start_date[]']").map(function () {
        return $(this).val();
    }).get();

    let endDates = $("input[name='qualification_end_date[]']").map(function () {
        return $(this).val();
    }).get();

    let certifications = $("input[name='qualification_certification[]']").map(function () {
        return $(this).val();
    }).get();

    let images = $("input[name='qualification_upload[]']").map(function () {
        return $(this).val();
    }).get();

    let descriptions = $("input[name='qualification_description[]']").map(function () {
        return $(this).val();
    }).get();

    // Basic validation
    if (
        qualificationTypes.includes('') ||
        qualificationTitles.includes('') ||
        startDates.includes('') ||
        endDates.includes('') ||
        descriptions.includes('')
    ) {
        toastErrorAlert('Please fill all required fields');
        return;
    }

    // Construct plain object
    // const data = {
    //     qualification_type: qualificationTypes,
    //     qualification_title: qualificationTitles,
    //     start_date: startDates,
    //     end_date: endDates,
    //     certification: certifications,
    //     qualification_upload: images,
    //     desc: descriptions
    // };

    // Send via AJAX as JSON
    $.ajax({
        url: "../../controller/profile/ProfileTwo.php",
        type: "POST",
        data:{ qualification_type: qualificationTypes,
        qualification_title: qualificationTitles,
        education_type:educationType,
        start_date: startDates,
        end_date: endDates,
        certification: certifications,
        qualification_upload: images,
        desc: descriptions},
        dataType: "json",
        success: function (response) {
            // console.log("Server response:", response);
            try {
                // const parseResponse = JSON.parse(response);
                if (response.success) {
                    toastSuccessAlert(response.success);
                    $('#profile-qualification .needs-validation').removeClass('was-validated');
                    $('#profile-qualification')[0].reset();
                    qualificationView();
                } else if (response.error_success) {
                    toastErrorAlert(response.error_success);
                } else {
                    toastErrorAlert('Unexpected server response');
                }
            } catch (error) {
                console.error("JSON parse error:", error);
                toastErrorAlert('Error processing response');
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
            // console.log(response);
            let data = JSON.parse(response).data;
            // console.log('Response:', data);

            $('#qualification-table tbody').empty(); // Optional: clear old rows

            data.forEach((element, index) => {
                $('#qualification-table tbody').append(`
                    <tr>
                        <td scope="row">${index + 1}</td>
                        <td>${element.qualification_type}</td>
                        <td>${element.education_id}</td>
                        <td>${element.qualification_title}</td>
                        <td>${element.start_date}</td>
                        <td>${element.end_date}</td>
                        <td>${element.description}</td>
                        <td>${element.certification}</td>
                        <td>${element.file_name}</td>
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