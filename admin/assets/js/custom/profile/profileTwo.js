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
            console.log(response);
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
            // console.log(response);
            let data = JSON.parse(response).data;
              console.log('Response:', data);

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