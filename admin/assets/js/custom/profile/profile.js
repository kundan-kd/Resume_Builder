$('#profile_details').on('submit',function(e){
    e.preventDefault();
    let first_name = $('#first_name').val();
    let last_name = $('#last_name').val();
    let email = $('#email').val();
    let mobile = $('#mobile').val();
    let dob = $('#dob').val();
    let address = $('#address').val();
    let city = $('#city').val();
    let state = $('#state').val();
    let pincode = $('#pincode').val();
    let country = $('#country').val();
    let linkedin = $('#linkedin').val();
    let experience = $('#experience').val();
    let project = $('#project').val();
    if(first_name == '' || last_name == '' || email =='' || mobile =='' || dob =='' || address =='' || city =='' || state =='' || pincode =='' || country =='' || experience ==''){
        $('.needs-validation').addClass('was-validated');
    }else{
        // console.log('ok');
        $.ajax({
            url:"../../controller/profile/Profile.php",
            type:"POST",
            data:{first_name:first_name,last_name:last_name,email:email,mobile:mobile,dob:dob,address:address,city:city,state:state,pincode:pincode,country:country,linkedin:linkedin,experience:experience,project:project},
            success:function(response){
                alert('success');
            }    

        });
    }
});

function programmingSkillAdd() {
    $.ajax({
        url: "../../controller/profile/Profile.php",
        type: "POST",
        data: { GetProgrammingSkill: true },
        success: function(response) {
            // console.log('Response:', response);
            let data = JSON.parse(response).data;

            $('#profile-prog-tab tbody').empty(); // Optional: clear old rows

            data.forEach((element, index) => {
                $('#profile-prog-tab tbody').append(`
                    <tr>
                        <td scope="row">${index + 1}</td>
                        <td>${element.name}</td>
                        <td>${element.user_efficiency}</td>
                    </tr>
                `);
            });
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
        }
    });
}
programmingSkillAdd();
$('#profile_programmingSkill').on('submit',function(e){
    e.preventDefault();
    let skillName = $('#programming-skill-name').val();
    let skillEfficiency = $('#programming-skill-measure').val();
    // console.log(skillName,skillEfficiency);
    if(skillName == '' || skillEfficiency == ''){
        $('.needs-validation').addClass('was-validated');
    }else{
        $.ajax({
            url:"../../controller/profile/Profile.php",
            type:"POST",
            data:{skillName:skillName,skillEfficiency:skillEfficiency},
            success:function(response){
                $('.needs-validation').removeClass('was-validated');
                $('#programming-skill-name').val('');
                $('#programming-skill-measure').val('');
                // alert("success");
                programmingSkillAdd();
            }
        });
    }

});





function languageAdd() {
    $.ajax({
        url: "../../controller/profile/Profile.php",
        type: "POST",
        data: { getLanguage: true },
        success: function(response) {
            let data = JSON.parse(response).data;
            console.log('Response:', data);

            $('#profie-lang-table tbody').empty(); // Optional: clear old rows

            data.forEach((element, index) => {
                $('#profie-lang-table tbody').append(`
                    <tr>
                        <td scope="row">${index + 1}</td>
                        <td>${element.name}</td>
                        <td>${element.user_efficiency}</td>
                    </tr>
                `);
            });
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
        }
    });
}
languageAdd();
 $('#profile-language').on('submit',function(e){
    e.preventDefault();
    let languageName = $('#language-name').val();
    let languageEfficiency = $('#language-measure').val();
    if(languageName == '' || languageEfficiency == ''){
         $('.needs-validation').addClass('was-validated');
    }else{
        $.ajax({
            url:"../../controller/profile/Profile.php",
            type:"POST",
            data:{languageName:languageName,languageEfficiency:languageEfficiency},
            success:function(response){
                let parseResponse = JSON.parse(response); // convert response into json
                if(parseResponse.success){
                    $('.needs-validation').removeClass('was-validated');
                    $('#language-name').val('');
                    $('#language-measure').val('');
                    toastSuccessAlert(parseResponse.success);
                    languageAdd();
                }else if(parseResponse.error_success){
                      toastErrorAlert(parseResponse.error_success);
                }else{
                    toastErrorAlert('something went wrong!');
                }
            }
        });
    }
 });

//  $('#profile-extra-skill').on('submit',function(e){
//     e.preventDefault();
//     let extraSkill = $('#extra-skill').val();
//     if(extraSkill == ''){
//         $('.needs-validation').addClass('was-validated');
//     }else{
//         $('#extra-skill-table tbody').append(``);
//     }
//  });







function extraSkillVIew() {
    $.ajax({
        url: "../../controller/profile/Profile.php",
        type: "POST",
        data: { getExtraSkill: true },
        success: function(response) {
            let data = JSON.parse(response).data;
            // console.log('Response:', data);

            $('#extra-skill-table tbody').empty(); // Optional: clear old rows

            data.forEach((element, index) => {
                $('#extra-skill-table tbody').append(`
                    <tr>
                        <td scope="row">${index + 1}</td>
                        <td>${element.name}</td>
                    </tr>
                `);
            });
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
        }
    });
}
extraSkillVIew();
// let skillCount = 1;
//  $('#extra-skill-table').DataTable();
$('#profile-extra-skill').on('submit', function(e) {
    e.preventDefault();
    let extraSkillId = $('#extra-skill').val();
    let extraSkillName = $('#extra-skill option:selected').text();
    // console.log(extraSkillId);

    if (extraSkillId == '' || extraSkillId == null) {
        $('.needs-validation').addClass('was-validated');
        return;
    } else {
        // Append row to table
        $('#extra-skill-table tbody').append(`
            <tr>
                <th>#</th>
                <td>${extraSkillName}</td>
                <input type="hidden" name="extra_skills[]" value="${extraSkillId}">
            </tr>
        `);
        // skillCount++;

        // Optionally reset the select
        $('#extra-skill').val('');
    }
});

function updateExtraSkill(){
    let extraSkill = $('input[name="extra_skills[]"]').map(function(){return $(this).val();}).get();
    // console.log(extraSkill);
    if(extraSkill == ''){
        toastErrorAlert('Select atleast 1 skill to procees');
        return;
    }
     $.ajax({
            url:"../../controller/profile/Profile.php",
            type:"POST",
            data:{extraSkill:extraSkill},
            success:function(response){
                // console.log(response);
                let parseResponse = JSON.parse(response); // convert response into json
                console.log(parseResponse);
                if(parseResponse.success){
                     extraSkillVIew();
                    $('.needs-validation').removeClass('was-validated');
                    $('#extra-skill').val('');
                    toastSuccessAlert(parseResponse.success);
                   
                }else if(parseResponse.error_success){
                      toastErrorAlert(parseResponse.error_success);
                }else{
                    toastErrorAlert('something went wrong!');
                }
            }
        });
}

function planView(){
    $.ajax({
        url: "../../controller/profile/ProfileTwo.php",
        type: "POST",
        data: { getPlanType: true },
        success: function(response) {
            let data = JSON.parse(response).data;
            //  console.log('Response:', data);

            $('#profile-plan-table tbody').empty(); // Optional: clear old rows

            data.forEach((element, index) => {
                $('#profile-plan-table tbody').append(`
                    <tr>
                        <td scope="row">${index + 1}</td>
                        <td>${element.plan_type_name}</td>
                        <td>${element.price}</td>
                        <td>${element.skill_type_name}</td>
                        <td>${element.popularity_type}</td>
                    </tr>
                `);
            });
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
        }
    });
}
planView();
$('#profile-plan').on('submit', function(e) {
    e.preventDefault();

    let plan_type_id = $('#plan-type').val();
    let plan_type_name = $('#plan-type option:selected').text();
    let plan_price = $('#plan-price').val();
    let skill_type_id = $('#skill-types').val();
    let skill_type_name = $('#skill-types option:selected').text();
    let popularity = $('#popularity-type').val();

    if (!plan_type_id || !plan_price || !skill_type_id || !popularity) {
        $('.needs-validation').addClass('was-validated');
    } else {
        $('#profile-plan-table tbody').append(`
            <tr>
                <td>#</td>
                <td>${plan_type_name}<input type="hidden" name="plan_type_name[]" value="${plan_type_id}"></td>
                <td>${plan_price}<input type="hidden" name="plan_price[]" value="${plan_price}"></td>
                <td>${skill_type_name}<input type="hidden" name="skill_type_name[]" value="${skill_type_id}"></td>
                <td>${popularity}<input type="hidden" name="popularity[]" value="${popularity}"></td>
            </tr>
        `);
    }
});

function updateProfilePlan(){
    let plan_type = $('input[name="plan_type_name[]"]').map(function(){return $(this).val();}).get();
    let plan_price = $('input[name="plan_price[]"]').map(function(){return $(this).val();}).get();
    let skill_type = $('input[name="skill_type_name[]"]').map(function(){return $(this).val();}).get();
    let popularity = $('input[name="popularity[]"]').map(function(){return $(this).val();}).get();
    if (plan_type =='' || plan_price =='' || skill_type =='' || popularity =='') {
        $('.needs-validation').addClass('was-validated');
        toastErrorAlert('Please fill all required fields');
        return;
    } else {
            $.ajax({
            url:"../../controller/profile/ProfileTwo.php",
            type:"POST",
            data:{plan_type:plan_type,plan_price:plan_price,skill_type:skill_type,popularity:popularity},
            success:function(response){
                //  console.log(response);
                 let parseResponse = JSON.parse(response); // convert response into json
                //  console.log(parseResponse);
                if(parseResponse.success){
                    //  extraSkillVIew();
                    // $('.needs-validation').removeClass('was-validated');
                    // $('#extra-skill').val('');
                    toastSuccessAlert(parseResponse.success);
                    planView();
                   
                }else if(parseResponse.error_success){
                      toastErrorAlert(parseResponse.error_success);
                }else{
                    toastErrorAlert('something went wrong!');
                }
            }
        });
    }
}

