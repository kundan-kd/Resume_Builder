$('#profile-qualification').on('submit', function(e){
    e.preventDefault();
    // alert();
    let qualification = $('#qualification').val();
    let qualification_name = $('#qualification option:selected').text();
    let start_date = $('#qualification-start-date').val();
    let end_date = $('#qualification-end-date').val();
    let certification = $('#certification').val();
    let image = $('#qualification-upload').val();
    let desc = $('#description').val();
    // console.log(qualification);
    // console.log(qualification_name);
    // console.log(start_date);
    // console.log(end_date);
    // console.log(certification);
    // console.log(image);
    // console.log(desc);
    if(!qualification || !start_date || !end_date || !certification || !image || !desc){
        $('.needs-validation').addClass('was-validated');
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

function updateQualifications(){
    let qualification = $('select[name="qualification[]"]').map(function(){return $(this).val();}).get();
    let start_date = $('input[name="qualification-start-date[]"]').map(function(){return $(this).val();}).get();
    let end_date = $('input[name="qualification-end-date[]"]').map(function(){return $(this).val();}).get();
    let certification = $('input[name="certification[]"]').map(function(){return $(this).val();}).get();
    let image = $('input[name="qualification-upload[]"]').map(function(){return $(this).val();}).get();
    let desc = $('input[name="description[]"]').map(function(){return $(this).val();}).get();
    if (qualification.length == 0 || start_date.length == 0 || end_date.length == 0 || certification.length == 0 || desc.length == 0) {
        $('.needs-validation').addClass('was-validated');
        toastErrorAlert('Please fill all required fields');
        return;
    } else {
            $.ajax({
            url:"../../controller/profile/ProfileTwo.php",
            type:"POST",
            data:{qualification:qualification,start_date:start_date,end_date:end_date,certification:certification,image:image,desc:desc},
            success:function(response){
                console.log(response);
                 let parseResponse = JSON.parse(response); // convert response into json
                  console.log(parseResponse);
                // if(parseResponse.success){
                //     //  extraSkillVIew();
                //     // $('.needs-validation').removeClass('was-validated');
                //     // $('#extra-skill').val('');
                //     toastSuccessAlert(parseResponse.success);
                //     planView();
                   
                // }else if(parseResponse.error_success){
                //       toastErrorAlert(parseResponse.error_success);
                // }else{
                //     toastErrorAlert('something went wrong!');
                // }
            }
        });
    }
}