

$('#profile-qualification').on('submit', function(e){
    e.preventDefault();
    // alert();
    let qualification = $('#qualification').val();
    let qualification_name = $('#qualification option:selected').text();
    let start_date = $('#qualification-start-date').val();
    let end_date = $('#qualification-end-date').val();
    let certification = $('#certification').val();
    let image = $('#qualification-upload').val() || '';
    let desc = $('#description').val();
    if(!qualification || !start_date || !end_date || !certification || !image || !desc){
        $('#profile-qualification .needs-validation').addClass('was-validated');
        return;
    }else{
        $('#qualification-table tbody').append(`
                <tr>
                    <td>#</td>
                    <td>${qualification_name}<input type="hidden" name="qualification[]" value="${qualification}"></td>
                    <td>${start_date}<input type="hidden" name="qualification[]" value="${start_date}"></td>
                    <td>${end_date}<input type="hidden" name="qualification[]" value="${end_date}"></td>
                    <td>${certification}<input type="hidden" name="qualification[]" value="${certification}"></td>
                    <td>${image}<input type="hidden" name="qualification[]" value="${image}"></td>
                    <td>${desc}<input type="hidden" name="qualification[]" value="${desc}"></td>
                </tr>
            `);
    }
});

function updateQualifications(event) {
    if (event) event.preventDefault(); // prevent default submit behavior

    const form = document.getElementById('profile-qualification');
    const formData = new FormData(form);

    // Optional: Basic client-side validation
    const qualification = formData.getAll('qualification[]');
    const startDates = formData.getAll('start_date[]');
    const endDates = formData.getAll('end_date[]');
    const certifications = formData.getAll('certification[]');
    const descriptions = formData.getAll('description[]');

    if (
        qualification.includes('') ||
        startDates.includes('') ||
        endDates.includes('') ||
        certifications.includes('') ||
        descriptions.includes('')
    ) {
        toastErrorAlert('Please fill all required fields');
        return;
    }

    $.ajax({
        url: "../../controller/profile/ProfileTwo.php",
        type: "POST",
        data: formData,
        processData: false,  // required for FormData
        contentType: false,  // required for FormData
        success: function (response) {
            console.log("Server response:", response);
            try {
                const parseResponse = JSON.parse(response);
                if (parseResponse.success) {
                    toastSuccessAlert(parseResponse.success);
                    form.reset();
                    qualificationView();
                } else if (parseResponse.error_success) {
                    toastErrorAlert(parseResponse.error_success);
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
                        <td>${element.qualification_name}</td>
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