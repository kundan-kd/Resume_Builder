// $('#profile_details').on('submit',function(e){
//     e.preventDefault();
//     let first_name = $('#first_name').val();
//     let last_name = $('#last_name').val();
//     let email = $('#email').val();
//     let mobile = $('#mobile').val();
//     let dob = $('#dob').val();
//     let address = $('#address').val();
//     let city = $('#city').val();
//     let state = $('#state').val();
//     let pincode = $('#pincode').val();
//     let country = $('#country').val();
//     let linkedin = $('#linkedin').val();
//     let experience = $('#experience').val();
//     let project = $('#project').val();
//     if(first_name == '' || last_name == '' || email =='' || mobile =='' || dob =='' || address =='' || city =='' || state =='' || pincode =='' || country =='' || experience ==''){
//         $('.needs-validation').addClass('was-validated');
//     }else{
//         // console.log('ok');
//         $.ajax({
//             url:"../../controller/profile/Profile.php",
//             type:"POST",
//             data:{first_name:first_name,last_name:last_name,email:email,mobile:mobile,dob:dob,address:address,city:city,state:state,pincode:pincode,country:country,linkedin:linkedin,experience:experience,project:project},
//             success:function(response){
//                 alert('success');
//             }    

//         });
//     }
// });
$('#profile_details').on('submit', function(e) {
    e.preventDefault();

    // collect values
    let first_name     = $('#first_name').val().trim();
    let last_name      = $('#last_name').val().trim();
    let email          = $('#email').val().trim();
    let mobile         = $('#mobile').val().trim();
    let dob            = $('#dob').val().trim();
    let address        = $('#address').val().trim();
    let city           = $('#city').val().trim();
    let state          = $('#state').val().trim();
    let pincode        = $('#pincode').val().trim();
    let country        = $('#country').val().trim();
    let linkedin       = $('#linkedin').val().trim();
    let experience     = $('#experience').val().trim();
    let project        = $('#project').val().trim();

    // new fields
    let designation    = $('#designation').val().trim();
    let personal_no    = $('#personal_no').val().trim();
    let support_no     = $('#support_no').val().trim();
    let office_no      = $('#office_no').val().trim();
    let telegram_id    = $('#telegram').val().trim();
    let skype_id       = $('#skype').val().trim();
    let punchline      = $('#punchline').val().trim();
    let customer_count = $('#customer_count').val().trim();
    let award_count    = $('#award_count').val().trim();

    // simple client-side validation for required fields
    if (
        first_name == '' ||
        last_name == '' ||
        email == '' ||
        mobile == '' ||
        dob == '' ||
        address == '' ||
        city == '' ||
        state == '' ||
        pincode == '' ||
        country == '' ||
        experience == ''
    ) {
        $('#profile_details .needs-validation').addClass('was-validated');
        return;
    }

    // Prepare data object to send
    let postData = {
        first_name: first_name,
        last_name: last_name,
        email: email,
        mobile: mobile,
        dob: dob,
        address: address,
        city: city,
        state: state,
        pincode: pincode,
        country: country,
        linkedin: linkedin,
        experience: experience,
        project: project,
        designation: designation,
        personal_no: personal_no,
        support_no: support_no,
        office_no: office_no,
        telegram: telegram_id,
        skype: skype_id,
        punchline: punchline,
        customer_count: customer_count,
        award_count: award_count,
    };

    // make AJAX request
    $.ajax({
        url: "../../controller/profile/Profile.php",
        type: "POST",
        data: postData,
        dataType: "json",  // expecting JSON response
        success: function(response) {
            if (response.success) {
                toastSuccessAlert(response.success);
                setTimeout(() => {
                    window.location.reload(true); // Deprecated but still works in some browsers                  
                }, 1000);
                // you might like to reload part of the page or redirect
            } else if (response.error_success) {
               toastSuccessAlert(response.error_success);
            } else {
                toastSuccessAlert("something went wrong!");
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error: ", status, error);
            alert("An error occurred while updating profile");
        }
    });

});

function viewServices(){
    $.ajax({
        url: "../../controller/profile/Profile.php",
        type: "POST",
        data: { GetServices: true },
        success: function(response) {
            //  console.log('Response:', response);
           let data = JSON.parse(response).data;
            // console.log(data);

            $('#profile-services-tab tbody').empty(); // Optional: clear old rows

            data.forEach((element, index) => {
                $('#profile-services-tab tbody').append(`
                    <tr>
                        <td scope="row">${index + 1}</td>
                        <td>${element.name}</td>
                        <td>${element.description}</td>
                    </tr>
                `);
            });
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
        }
    });
}
viewServices();
// $('#profile_services').on('submit', function(e) {
//     e.preventDefault();
//     let serviceCategory = $('#services_category').val().trim();
//     let serviceDesc = $('#services_desc').val().trim();

//     if (serviceCategory === '' || serviceDesc === '') {
//         $('#profile_services .needs-validation').addClass('was-validated');
//     } else {
//         $('#profile-services-tab tbody').append(`
//             <tr>
//                 <th>#</th>
//                 <td>${serviceCategory}<input type="hidden" name="serviceCategoryName[]" value="${serviceCategory}"></td>
//                 <td>${serviceDesc}<input type="hidden" name="serviceDesc[]" value="${serviceDesc}"></td>
//             </tr>
//         `);
//         $('#services_category').val('');
//         $('#services_desc').val('');
//         $('#profile_services .needs-validation').removeClass('was-validated');
//     }
// });
$('#profile_services').on('submit', function(e) {
    e.preventDefault();
    const form = this;

    if (!form.checkValidity()) {
        $(form).addClass('was-validated');
        return;
    }

    let serviceCategory = $('#services_category').val().trim();
    let serviceDesc = $('#services_desc').val().trim();

    $('#profile-services-tab tbody').append(`
        <tr>
            <th>#</th>
            <td>${serviceCategory}<input type="hidden" name="serviceCategoryName[]" value="${serviceCategory}"></td>
            <td>${serviceDesc}<input type="hidden" name="serviceDesc[]" value="${serviceDesc}"></td>
        </tr>
    `);

    form.reset();
    $(form).removeClass('was-validated');
});

function updateservices(){
    let name = $('input[name="serviceCategoryName[]"]').map(function() {return $(this).val();}).get();
    let desc = $('input[name="serviceDesc[]"]').map(function() {return $(this).val();}).get();
    if (name == '' || desc == '') {
        // $('.needs-validation').addClass('was-validated');
        return;
    } else {
        $.ajax({
            url: "../../controller/profile/Profile.php",
            type: "POST",
            data: {
                servicesName: name,
                servicesDesc: desc
            },
            success: function(response) {
                let parseResponse = JSON.parse(response);
                if (parseResponse.success) {
                    toastSuccessAlert(parseResponse.success);
                     viewServices();
                } else if (parseResponse.error_success) {
                    toastErrorAlert(parseResponse.error_success);
                } else {
                    toastErrorAlert('Something went wrong!');
                }
            }
        });
    }
}















$('#programming-skill-name').on('change',function(){
    const selectVal = $(this).val();
    if(selectVal == 0){
        $('.progSkillAdd').removeClass('d-none');
    }else{
        $('.progSkillAdd').addClass('d-none');
    }
});
function programmingSkillAdd() {
    $.ajax({
        url: "../../controller/profile/Profile.php",
        type: "POST",
        data: { GetProgrammingSkill: true },
        success: function(response) {
            //  console.log('Response:', response);
           let data = JSON.parse(response).data;
            // console.log(data);

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
$('#profile_programmingSkill').on('submit', function(e) {
    e.preventDefault();
    const form = this;
    const skillName_id = $('#programming-skill-name').val();
    const skillEfficiency = $('#programming-skill-measure').val().trim();
    let skillName = '';

    // Validate custom skill name if "Other" is selected
    if (skillName_id == '0') {
        skillName = $('#programming-skill-new').val().trim();
        if (skillName === '') {
            $('#programming-skill-new').addClass('is-invalid');
            $(form).addClass('was-validated');
            return;
        } else {
            $('#programming-skill-new').removeClass('is-invalid');
        }
    } else {
        skillName = $('#programming-skill-name option:selected').text();
    }

    // Validate dropdown and efficiency
    if (skillName_id === '' || skillEfficiency === '') {
        $(form).addClass('was-validated');
        return;
    }

    // Append to table
    $('#profile-prog-tab tbody').append(`
        <tr>
            <th>#</th>
            <td>${skillName}<input type="hidden" name="skillNameID[]" value="${skillName_id}">
            <input type="hidden" name="skillName[]" value="${skillName}"></td>
            <td>${skillEfficiency}<input type="hidden" name="skillEfficiency[]" value="${skillEfficiency}"></td>
        </tr>
    `);

    // Reset form
    form.reset();
    $(form).removeClass('was-validated');
    $('#programming-skill-new').removeClass('is-invalid');
});
// $('#profile_programmingSkill').on('submit',function(e){
//     e.preventDefault();
//     let skillName_id = $('#programming-skill-name').val();
//     let skillName = '';
//     if(skillName_id == 0){
//         skillName = $('#programming-skill-new').val();
//     }else{
//         skillName = $('#programming-skill-name option:selected').text();
//     }
//     let skillEfficiency = $('#programming-skill-measure').val();
//     if(skillName_id == '' || skillEfficiency == ''){
//         $('#profile_programmingSkill .needs-validation').addClass('was-validated');
//     }else{
//         $('#profile-prog-tab tbody').append(`
//             <tr>
//                 <th>#</th>
//                 <td>${skillName}<input type="hidden" name="skillNameID[]" value="${skillName_id}">
//                 <input type="hidden" name="skillName[]" value="${skillName}"></td>
//                 <td>${skillEfficiency}<input type="hidden" name="skillEfficiency[]" value="${skillEfficiency}"></td>
//             </tr>
//         `);
//     }
// });

// function updateProgrammingSkill(){
//     let name_id = $('input[name="skillNameID[]"]').map(function(){return $(this).val();}).get();
//     let name = $('input[name="skillName[]"]').map(function(){return $(this).val();}).get();
//     let efficiency = $('input[name="skillEfficiency[]"]').map(function(){return $(this).val();}).get();
//     if(name_id == '' || efficiency == ''){
//         $('needs-validation').addClass('was-validated');
//     }else{
//            $.ajax({
//             url:"../../controller/profile/Profile.php",
//             type:"POST",
//             data:{skillNameID:name_id,skillName:name,skillEfficiency:efficiency},
//             success:function(response){
//                 // console.log(response);
//                 let parseResponse = JSON.parse(response);
//                 if(parseResponse.success){
//                     $('.needs-validation').removeClass('was-validated');
//                     $('#programming-skill-name').val('');
//                     $('#programming-skill-measure').val('');
//                     toastSuccessAlert(parseResponse.success);
//                     programmingSkillAdd();
//                     if(name_id.includes(0)){
//                         window.location.reload();
//                     }
//                 }else if(parseResponse.error_success){
//                     toastErrorAlert(parseResponse.error_success);
//                 }else{
//                     toastErrorAlert('sonething went wrong!');
//                 }
              
//             }
//         });
//     }
// }

function updateProgrammingSkill() {
    let name_id = $('input[name="skillNameID[]"]').map(function() {return $(this).val();}).get();
    let name = $('input[name="skillName[]"]').map(function() {return $(this).val();}).get();
    let efficiency = $('input[name="skillEfficiency[]"]').map(function() {return $(this).val();}).get();
    if (name_id.length === 0 || efficiency.length === 0) {
        // $('.needs-validation').addClass('was-validated');
        return;
    } else {
        $.ajax({
            url: "../../controller/profile/Profile.php",
            type: "POST",
            data: {
                skillNameID: name_id,
                skillName: name,
                skillEfficiency: efficiency
            },
            success: function(response) {
                let parseResponse = JSON.parse(response);
                if (parseResponse.success) {
                    $('.needs-validation').removeClass('was-validated');
                    $('#programming-skill-name').val('');
                    $('#programming-skill-measure').val('');
                    toastSuccessAlert(parseResponse.success);
                    programmingSkillAdd();
                    if (name_id.includes("0") || name_id.includes(0)) {
                        window.location.reload();
                    }
                } else if (parseResponse.error_success) {
                    toastErrorAlert(parseResponse.error_success);
                } else {
                    toastErrorAlert('Something went wrong!');
                }
            }
        });
    }
}

$('#language-name').on('change',function(){
    const selectVal = $(this).val();
    if(selectVal == 0){
        $('.languageNewAdd').removeClass('d-none');
    }else{
        $('.languageNewAdd').addClass('d-none');
    }
});

function languageAdd() {
    $.ajax({
        url: "../../controller/profile/Profile.php",
        type: "POST",
        data: { getLanguage: true },
        success: function(response) {
            let data = JSON.parse(response).data;
            // console.log('Response:', data);

            $('#profile-lang-table tbody').empty(); // Optional: clear old rows

            data.forEach((element, index) => {
                $('#profile-lang-table tbody').append(`
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
$('#profile-language').on('submit', function(e) {
    e.preventDefault();
    const form = this;

    let languageName_id = $('#language-name').val();
    let languageName = '';
    let languageEfficiency = $('#language-measure').val().trim();

    // Handle custom language input
    if (languageName_id == '0') {
        languageName = $('#language-name-new').val().trim();
        if (languageName == '') {
            $('#language-name-new').addClass('is-invalid');
            $(form).addClass('was-validated');
            return;
        } else {
            $('#language-name-new').removeClass('is-invalid');
        }
    } else {
        languageName = $('#language-name option:selected').text().trim();
    }

    // Validate dropdown and efficiency
    if (languageName_id == '' || languageEfficiency == '') {
        $(form).addClass('was-validated');
        return;
    }

    // Append row to table
    $('#profile-lang-table tbody').append(`
        <tr>
            <th>#</th>
            <td>${languageName}
                <input type="hidden" name="languageNameID[]" value="${languageName_id}">
                <input type="hidden" name="languageName[]" value="${languageName}">
            </td>
            <td>${languageEfficiency}
                <input type="hidden" name="languageEfficiency[]" value="${languageEfficiency}">
            </td>
        </tr>
    `);

    // Reset form
    form.reset();
    $(form).removeClass('was-validated');
    $('#language-name-new').removeClass('is-invalid');
});
//  $('#profile-language').on('submit',function(e){
//     e.preventDefault();
//     let languageName_id = $('#language-name').val();
//     let languageName = '';
//     if(languageName_id == 0){
//         languageName = $('#language-name-new').val();
//     }else{
//         languageName = $('#language-name option:selected').text();
//     }
//     let languageEfficiency = $('#language-measure').val();
//     // console.log(languageName_id,languageName,languageEfficiency);
//     if(languageName == '' || languageEfficiency == ''){
//          $('#profile-language .needs-validation').addClass('was-validated');
//     }else{
// // console.log(languageName_id);
// // console.log(languageName);
// // console.log(languageEfficiency);
//  // Append row to table
//         $('#profie-lang-table tbody').append(`
//             <tr>
//                 <th>#</th>
//                 <td>${languageName}<input type="hidden" name="languageNameID[]" value="${languageName_id}"><input type="hidden" name="languageName[]" value="${languageName}"></td>
//                 <td>${languageEfficiency}<input type="hidden" name="languageEfficiency[]" value="${languageEfficiency}"></td>
//             </tr>
//         `);
//     }
//  });

 function updateLanguage(){
    let name_id = $('input[name="languageNameID[]"]').map(function(){return $(this).val()}).get();
    let name = $('input[name="languageName[]"]').map(function(){return $(this).val()}).get();
    let efficiency = $('input[name="languageEfficiency[]"]').map(function(){return $(this).val()}).get();
     $.ajax({
            url:"../../controller/profile/Profile.php",
            type:"POST",
            data:{languageNameID:name_id,languageName:name,languageEfficiency:efficiency},
            success:function(response){
                let parseResponse = JSON.parse(response); // convert response into json
                if(parseResponse.success){
                    $('.needs-validation').removeClass('was-validated');
                    $('#language-name').val('');
                    $('#language-measure').val('');
                    toastSuccessAlert(parseResponse.success);
                    languageAdd();
                     if (name_id.includes("0") || name_id.includes(0)) {
                        window.location.reload();
                    }
                }else if(parseResponse.error_success){
                      toastErrorAlert(parseResponse.error_success);
                }else{
                    toastErrorAlert('something went wrong!');
                }
            }
        });
 }

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
$('#profile-extra-skill').on('submit', function(e) {
    e.preventDefault();
    const form = this;

    let extraSkillId = $('#extra-skill').val();
    let extraSkillName = $('#extra-skill option:selected').text();

    if (!form.checkValidity() || extraSkillId === '' || extraSkillId === null) {
        $(form).addClass('was-validated');
        return;
    }

    $('#extra-skill-table tbody').append(`
        <tr>
            <th>#</th>
            <td>
                ${extraSkillName}
                <input type="hidden" name="extra_skills[]" value="${extraSkillId}">
            </td>
        </tr>
    `);

    form.reset();
    $(form).removeClass('was-validated');
});
// // let skillCount = 1;
// //  $('#extra-skill-table').DataTable();
// $('#profile-extra-skill').on('submit', function(e) {
//     e.preventDefault();
//     let extraSkillId = $('#extra-skill').val();
//     let extraSkillName = $('#extra-skill option:selected').text();
//     // console.log(extraSkillId);

//     if (extraSkillId == '' || extraSkillId == null) {
//         $('#profile-extra-skill .needs-validation').addClass('was-validated');
//         return;
//     } else {
//         // Append row to table
//         $('#extra-skill-table tbody').append(`
//             <tr>
//                 <th>#</th>
//                 <td>${extraSkillName}</td>
//                 <input type="hidden" name="extra_skills[]" value="${extraSkillId}">
//             </tr>
//         `);
//         // skillCount++;

//         // Optionally reset the select
//         $('#extra-skill').val('');
//     }
// });

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
    const form = this;

    let plan_type_id = $('#plan-type').val();
    let plan_type_name = $('#plan-type option:selected').text();
    let plan_price = $('#plan-price').val().trim();
    let skill_type_id = $('#skill-types').val();
    let skill_type_name = $('#skill-types option:selected').text();
    let popularity = $('#popularity-type').val();

    if (!form.checkValidity() || !plan_type_id || !plan_price || !skill_type_id || !popularity) {
        $(form).addClass('was-validated');
        return;
    }

    $('#profile-plan-table tbody').append(`
        <tr>
            <td>#</td>
            <td>${plan_type_name}<input type="hidden" name="plan_type_name[]" value="${plan_type_id}"></td>
            <td>${plan_price}<input type="hidden" name="plan_price[]" value="${plan_price}"></td>
            <td>${skill_type_name}<input type="hidden" name="skill_type_name[]" value="${skill_type_id}"></td>
            <td>${popularity}<input type="hidden" name="popularity[]" value="${popularity}"></td>
        </tr>
    `);

    form.reset();
    $(form).removeClass('was-validated');
});
// $('#profile-plan').on('submit', function(e) {
//     e.preventDefault();

//     let plan_type_id = $('#plan-type').val();
//     let plan_type_name = $('#plan-type option:selected').text();
//     let plan_price = $('#plan-price').val();
//     let skill_type_id = $('#skill-types').val();
//     let skill_type_name = $('#skill-types option:selected').text();
//     let popularity = $('#popularity-type').val();

//     if (!plan_type_id || !plan_price || !skill_type_id || !popularity) {
//         $('#profile-plan .needs-validation').addClass('was-validated');
//     } else {
//         $('#profile-plan-table tbody').append(`
//             <tr>
//                 <td>#</td>
//                 <td>${plan_type_name}<input type="hidden" name="plan_type_name[]" value="${plan_type_id}"></td>
//                 <td>${plan_price}<input type="hidden" name="plan_price[]" value="${plan_price}"></td>
//                 <td>${skill_type_name}<input type="hidden" name="skill_type_name[]" value="${skill_type_id}"></td>
//                 <td>${popularity}<input type="hidden" name="popularity[]" value="${popularity}"></td>
//             </tr>
//         `);
//     }
// });

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


function projectView() {
    $.ajax({
        url: "../../controller/profile/Profile.php",
        type: "POST",
        data: { getProjectData: true },
        success: function(response) {
            let data = JSON.parse(response).data;

            $('#project-table tbody').empty();

            data.forEach((element, index) => {
                let imageHTML = 'No image';
                if (element.file_name && element.file_name !== '') {
                    imageHTML = `<img src="${element.file_name}" width="50" alt="Project Image">`;
                }

                $('#project-table tbody').append(`
                    <tr>
                        <td scope="row">${index + 1}</td>
                        <td>${element.name}</td>
                        <td>${element.title}</td>
                        <td>${element.description}</td>
                        <td>${imageHTML}</td>
                    </tr>
                `);
            });
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
        }
    });
}
projectView();
//  $('#profile-projects').on('submit',function(e){
//     e.preventDefault();
//     let category_id = $('#project-category').val();
//     let categoryName = $('#project-category option:selected').text();
//     let title = $('#project-title').val();
//     let desc = $('#project-desc').val();
//      let imageInput = $('#file_name')[0];
//     let imageFile = imageInput.files[0];

//     if(category_id == '' || title == '' || desc == ''){
//         $('#profile-projects .needs-validation').addClass('was-validated');
//     }else{
//         $('#project-table tbody').append(`
//             <tr>
//                 <td>#</td>
//                 <td>${categoryName}<input type="hidden" name="category[]" value="${category_id}"></td>
//                 <td>${title}<input type="hidden" name="title[]" value="${title}"></td>
//                 <td>${desc}<input type="hidden" name="desc[]" value="${desc}"></td>
//                   <td>${imageFile}<input type="hidden" name="image_name[]" value="${imageFile}"></td>
//                 <td><button class="btn btn-danger btn-sm delete-row">Delete</button></td>
//             </tr>
//             `);

//             $('#project-category').val('');
//             $('#project-title').val('');
//             $('#project-desc').val('');
//             $('.needs-validation').removeClass('was-validated');

//     }
//  });

// let projectImages = [];
// $('#profile-projects').on('submit', function(e) {
//     e.preventDefault();

//     let category_id = $('#project-category').val();
//     let categoryName = $('#project-category option:selected').text();
//     let title = $('#project-title').val();
//     let desc = $('#project-desc').val();
//     let imageFile = $('#file_name')[0].files[0];

//     if (category_id == '' || title == '' || desc == '') {
//         $('#profile-projects .needs-validation').addClass('was-validated');
//     } else {
//         let imagePreview = 'No image';
//         let imageIndex = projectImages.length;

//         if (imageFile) {
//             imagePreview = `<img src="${URL.createObjectURL(imageFile)}" width="50" alt="Preview">`;
//             projectImages.push(imageFile); // Store the actual File object
//         } else {
//             projectImages.push(null); // Maintain index alignment
//         }

//         $('#project-table tbody').append(`
//             <tr data-index="${imageIndex}">
//                 <td>#</td>
//                 <td>${categoryName}<input type="hidden" name="category[]" value="${category_id}"></td>
//                 <td>${title}<input type="hidden" name="title[]" value="${title}"></td>
//                 <td>${desc}<input type="hidden" name="desc[]" value="${desc}"></td>
//                 <td>${imagePreview}</td>
//                 <td><button class="btn btn-danger btn-sm delete-row">Delete</button></td>
//             </tr>
//         `);

//         $('#project-category').val('');
//         $('#project-title').val('');
//         $('#project-desc').val('');
//         $('#file_name').val('');
//         $('.needs-validation').removeClass('was-validated');
//     }
// });
let projectImages = [];

$('#profile-projects').on('submit', function(e) {
    e.preventDefault();
    const form = this;

    let category_id = $('#project-category').val();
    let categoryName = $('#project-category option:selected').text();
    let title = $('#project-title').val().trim();
    let desc = $('#project-desc').val().trim();
    let imageFile = $('#file_name')[0].files[0];

    if (!form.checkValidity() || category_id === '' || title === '' || desc === '') {
        $(form).addClass('was-validated');
        return;
    }

    let imagePreview = 'No image';
    let imageIndex = projectImages.length;

    if (imageFile) {
        imagePreview = `<img src="${URL.createObjectURL(imageFile)}" width="50" alt="Preview">`;
        projectImages.push(imageFile);
    } else {
        projectImages.push(null);
    }

    $('#project-table tbody').append(`
        <tr data-index="${imageIndex}">
            <td>#</td>
            <td>${categoryName}<input type="hidden" name="category[]" value="${category_id}"></td>
            <td>${title}<input type="hidden" name="title[]" value="${title}"></td>
            <td>${desc}<input type="hidden" name="desc[]" value="${desc}"></td>
            <td>${imagePreview}</td>
            <td><button class="btn btn-danger btn-sm delete-row">Delete</button></td>
        </tr>
    `);

    form.reset();
    $(form).removeClass('was-validated');
});
$('#project-table').on('click', '.delete-row', function() {
    $(this).closest('tr').remove();
});

//  function updateProject(){
//     let category = $('input[name="category[]"]').map(function(){return $(this).val()}).get();
//     let title = $('input[name="title[]"]').map(function(){return $(this).val()}).get();
//     let desc = $('input[name="desc[]"]').map(function(){return $(this).val()}).get();
//     let image = $('input[name="image[]"]').map(function(){return $(this).val()}).get();
//     console.log(category);
//     console.log(title);
//     console.log(desc);
//     console.log(image);
//     $.ajax({
//         url:"../../controller/profile/Profile.php",
//         type:"POST",
//         data:{projectCategory:category,projectTitle:title,projectDesc:desc,image:image},
//         success:function(response){
//             let parseResponse = JSON.parse(response);
//             $('#profile-projects')[0].reset();
//             projectView();
//             if(parseResponse.success){
//                 toastSuccessAlert(parseResponse.success);
//             }else if(parseResponse.error_success){
//                 toastErrorAlert(parseResponse.error_success);
//             }else{
//                 toastErrorAlert("something went wrong!");
//             }
//         }
//     });
//  }

function updateProject() {
    let formData = new FormData();

    $('input[name="category[]"]').each(function(i) {
        formData.append(`projectCategory[${i}]`, $(this).val());
    });
    $('input[name="title[]"]').each(function(i) {
        formData.append(`projectTitle[${i}]`, $(this).val());
    });
    $('input[name="desc[]"]').each(function(i) {
        formData.append(`projectDesc[${i}]`, $(this).val());
    });

    // Append matching image files
    $('#project-table tbody tr').each(function(index) {
        let rowIndex = $(this).data('index');
        let file = projectImages[rowIndex];
        if (file) {
            formData.append('file_name[]', file);
        } else {
            formData.append(`file_name[${index}]`, '');
        }
    });

    $.ajax({
        url: "../../controller/profile/Profile.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            let parseResponse = JSON.parse(response);
            $('#profile-projects')[0].reset();
            projectImages = [];
            projectView();
            if (parseResponse.success) {
                toastSuccessAlert(parseResponse.success);
            } else if (parseResponse.error_success) {
                toastErrorAlert(parseResponse.error_success);
            } else {
                toastErrorAlert("Something went wrong!");
            }
        }
    });
}