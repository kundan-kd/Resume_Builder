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
    let profile_image  = $('#profile_image')[0].files[0];

    // simple client-side validation for required fields
    if (
        first_name === '' ||
        last_name === '' ||
        email === '' ||
        mobile === '' ||
        dob === '' ||
        address === '' ||
        city === '' ||
        state === '' ||
        pincode === '' ||
        country === '' ||
        experience === ''
    ) {
        $('#profile_details .needs-validation').addClass('was-validated');
        return;
    }

    // Prepare FormData object
    let formData = new FormData();
    formData.append('first_name', first_name);
    formData.append('last_name', last_name);
    formData.append('email', email);
    formData.append('mobile', mobile);
    formData.append('dob', dob);
    formData.append('address', address);
    formData.append('city', city);
    formData.append('state', state);
    formData.append('pincode', pincode);
    formData.append('country', country);
    formData.append('linkedin', linkedin);
    formData.append('experience', experience);
    formData.append('project', project);
    formData.append('designation', designation);
    formData.append('personal_no', personal_no);
    formData.append('support_no', support_no);
    formData.append('office_no', office_no);
    formData.append('telegram', telegram_id);
    formData.append('skype', skype_id);
    formData.append('punchline', punchline);
    formData.append('customer_count', customer_count);
    formData.append('award_count', award_count);
    if (profile_image) {
        formData.append('profile_image', profile_image);
    }

    // make AJAX request
    $.ajax({
        url: "../../controller/profile/Profile.php",
        type: "POST",
        data: formData,
        contentType: false, // Important for file upload
        processData: false, // Important for file upload
        dataType: "json",
        success: function(response) {
            if (response.success) {
                toastSuccessAlert(response.success);
                setTimeout(() => {
                    window.location.reload(true);
                }, 1000);
            } else if (response.error_success) {
                toastSuccessAlert(response.error_success);
            } else {
                toastSuccessAlert("Something went wrong!");
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
                        <td>
                         <button class='btn btn-outline-primary btn-sm me-2 edit-category-btn' onclick="editService(${element.id})">
                            <i class='ri-pencil-line'></i>
                        </button>
                        <button class='btn btn-outline-danger btn-sm delete-category-btn' onclick="deleteService(${element.id})">
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
viewServices();
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
            <td><button class="btn btn-danger btn-sm delete-row">Delete</button></td>
        </tr>
    `);
    form.reset();
    $(form).removeClass('was-validated');
    $('.insertServicesBtn').removeClass('d-none');
});
$('#profile-services-tab').on('click', '.delete-row', function() {
    $(this).closest('tr').remove();
});
function updateservices(){
    let name = $('input[name="serviceCategoryName[]"]').map(function() {return $(this).val();}).get();
    let desc = $('input[name="serviceDesc[]"]').map(function() {return $(this).val();}).get();
    if (name == '' || desc == '') {
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
                    $('.insertServicesBtn').addClass('d-none');
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
function editService(id){
    $('.servicesAddbtn').addClass('d-none');
    $('.servicesUpdatebtn').removeClass('d-none');
    $.ajax({
        url:"../../controller/profile/Profile.php",
        type:"POST",
        data:{GetServiceData:true, id:id},
        dataType:'json',
        success:function(response){
             console.log(response);
            let data = response.data[0];
            $('#myServicesId').val(id);
            $('#services_category').val(data.name);
            $('#services_desc').val(data.description);
        }
    });
}
function updateServiceData(id){
    let name =  $('#services_category').val();
    let desc = $('#services_desc').val();
    if(name == '' || desc == ''){
       $('form#profile_services.needs-validation').addClass('was-validated'); // to target specific form class
        return;
    }else{
       $('form#profile_services.needs-validation').removeClass('was-validated'); // to target specific form class
    }
    $.ajax({
        url:"../../controller/profile/Profile.php",
        type:"POST",
        data:{updateServices:true,id:id,name:name,desc:desc},
        dataType:'json',
        success:function(response){
            if (response.success) {
                $('form#profile_services.needs-validation').removeClass('was-validated');
                $('#myServicesId').val('');
                $('#services_category').val('');
                $('#services_desc').val('');
                viewServices();
                toastSuccessAlert(response.success);
            } else if (parseResponse.error_success) {
                toastErrorAlert(parseResponse.error_success);
            } else {
                toastErrorAlert('Something went wrong!');
            }
            $('.servicesUpdatebtn').addClass('d-none');
            $('.servicesAddbtn').removeClass('d-none');
        }        
    });
}
function deleteService(id){
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
                        url: "../../controller/profile/Profile.php",
                        type: "POST",
                        data: { deleteServices:true,id: id },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $.alert({title: 'Deleted!', content: response.success,type: 'green'});
                                viewServices();
                            } else {
                                $.alert({title: 'Error!', content: 'Category not deleted.', type: 'red'});
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
            let data = JSON.parse(response).data;
            $('#profile-prog-tab tbody').empty(); // Optional: clear old rows
            data.forEach((element, index) => {
                $('#profile-prog-tab tbody').append(`
                    <tr>
                        <td scope="row">${index + 1}</td>
                        <td>${element.name}</td>
                        <td>${element.user_efficiency}</td>
                        <td>
                         <button class='btn btn-outline-primary btn-sm me-2 edit-category-btn' onclick="editSkills(${element.id})">
                            <i class='ri-pencil-line'></i>
                        </button>
                        <button class='btn btn-outline-danger btn-sm delete-category-btn' onclick="deleteSkills(${element.id})">
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
             <td><button class="btn btn-danger btn-sm delete-row">Delete</button></td>
        </tr>
    `);

    // Reset form
    form.reset();
    $(form).removeClass('was-validated');
    $('#programming-skill-new').removeClass('is-invalid');
    $('.insertProgrammingSkillBtn').removeClass('d-none');
});
$('#profile-prog-tab').on('click', '.delete-row', function() {
    $(this).closest('tr').remove();
});


function updateProgrammingSkill() {
    let name_id = $('input[name="skillNameID[]"]').map(function() {return $(this).val();}).get();
    let name = $('input[name="skillName[]"]').map(function() {return $(this).val();}).get();
    let efficiency = $('input[name="skillEfficiency[]"]').map(function() {return $(this).val();}).get();
    if (name_id.length === 0 || efficiency.length === 0) {
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
                    $('.insertProgrammingSkillBtn').addClass('d-none');
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
function editSkills(id){
    $('.programmingSkillAddBtn').addClass('d-none');
    $('.programmingSkillUpdateBtn').removeClass('d-none');
    $.ajax({
        url:"../../controller/profile/Profile.php",
        type:"POST",
        data:{GetProgrammingSkillData:true, id:id},
        dataType:'json',
        success:function(response){
            // console.log(response);
            let data = response.data[0];
            $('#programmingSkillId').val(id);
            $('#programming-skill-name').val(data.programming_language_id);
            $('#programming-skill-measure').val(data.user_efficiency);
        }
    });
}
function updateProgrammingSkillData(id){
    let name =  $('#programming-skill-name').val();
    let value = $('#programming-skill-measure').val();
    if(name == '' || value == ''){
       $('form#profile_programmingSkill.needs-validation').addClass('was-validated'); // to target specific form class
        return;
    }else{
       $('form#profile_programmingSkill.needs-validation').removeClass('was-validated'); // to target specific form class
    }
    $.ajax({
        url:"../../controller/profile/Profile.php",
        type:"POST",
        data:{updateProgrammingSkill:true,id:id,name:name,value:value},
        dataType:'json',
        success:function(response){
            if (response.success) {
                $('form#profile_programmingSkill.needs-validation').removeClass('was-validated');
                $('#programmingSkillId').val('');
                $('#programming-skill-name').val('');
                $('#programming-skill-measure').val('');
                programmingSkillAdd();
                toastSuccessAlert(response.success);
            } else if (parseResponse.error_success) {
                toastErrorAlert(parseResponse.error_success);
            } else {
                toastErrorAlert('Something went wrong!');
            }
            $('.programmingSkillUpdateBtn').addClass('d-none');
            $('.programmingSkillAddBtn').removeClass('d-none');
        }        
    });
}
function deleteSkills(id){
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
                        url: "../../controller/profile/Profile.php",
                        type: "POST",
                        data: { deleteProgrammingSkills:true,id: id },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $.alert({title: 'Deleted!', content: response.success,type: 'green'});
                                programmingSkillAdd();
                            } else {
                                $.alert({title: 'Error!', content: 'Category not deleted.', type: 'red'});
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
            $('#profile-lang-table tbody').empty(); // Optional: clear old rows
            data.forEach((element, index) => {
                $('#profile-lang-table tbody').append(`
                    <tr>
                        <td scope="row">${index + 1}</td>
                        <td>${element.name}</td>
                        <td>${element.user_efficiency}</td>
                        <td>
                            <button class='btn btn-outline-primary btn-sm me-2' onclick="editLanguage(${element.id})">
                                <i class='ri-pencil-line'></i>
                            </button>
                            <button class='btn btn-outline-danger btn-sm' onclick="deleteLanguage(${element.id})">
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
             <td><button class="btn btn-danger btn-sm delete-row">Delete</button></td>
        </tr>
    `);

    // Reset form
    form.reset();
    $(form).removeClass('was-validated');
    $('#language-name-new').removeClass('is-invalid');
});
$('#profile-lang-table').on('click', '.delete-row', function() {
    $(this).closest('tr').remove();
});

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
function editLanguage(id){
    $('.languageAddBtn').addClass('d-none');
    $('.languageUpdateBtn').removeClass('d-none');
    $.ajax({
        url:"../../controller/profile/Profile.php",
        type:"POST",
        data:{GetLanguageData:true, id:id},
        dataType:'json',
        success:function(response){
            let data = response.data[0];
            $('#languageId').val(id);
            $('#language-name').val(data.language_id);
            $('#language-measure').val(data.user_efficiency);
        }
    });
}
function updateLanguageData(id){
    let name =  $('#language-name').val();
    let value = $('#language-measure').val();
    if(name == '' || value == ''){
       $('form#profile-language.needs-validation').addClass('was-validated'); // to target specific form class
        return;
    }else{
       $('form#profile-language.needs-validation').removeClass('was-validated'); // to target specific form class
    }
    $.ajax({
        url:"../../controller/profile/Profile.php",
        type:"POST",
        data:{updateLanguage:true,id:id,name:name,value:value},
        dataType:'json',
        success:function(response){
            if (response.success) {
                $('form#profile-language.needs-validation').removeClass('was-validated');
                $('#languageId').val('');
                $('#language-name').val('');
                $('#language-measure').val('');
                languageAdd();
                toastSuccessAlert(response.success);
            } else if (parseResponse.error_success) {
                toastErrorAlert(parseResponse.error_success);
            } else {
                toastErrorAlert('Something went wrong!');
            }
            $('.servicesUpdatebtn').addClass('d-none');
            $('.servicesAddbtn').removeClass('d-none');
        }        
    });
}
function deleteLanguage(id){
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
                        url: "../../controller/profile/Profile.php",
                        type: "POST",
                        data: { deleteLanguage:true,id: id },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $.alert({title: 'Deleted!', content: response.success,type: 'green'});
                                languageAdd();
                            } else {
                                $.alert({title: 'Error!', content: 'Category not deleted.', type: 'red'});
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





function extraSkillVIew() {
    $.ajax({
        url: "../../controller/profile/Profile.php",
        type: "POST",
        data: { getExtraSkill: true },
        success: function(response) {
            let data = JSON.parse(response).data;
            $('#extra-skill-table tbody').empty(); // Optional: clear old rows

            data.forEach((element, index) => {
                $('#extra-skill-table tbody').append(`
                    <tr>
                        <td scope="row">${index + 1}</td>
                        <td>${element.name}</td>
                        <td>
                            <button class='btn btn-outline-primary btn-sm me-2' onclick="editExtraSkill(${element.id})">
                                <i class='ri-pencil-line'></i>
                            </button>
                            <button class='btn btn-outline-danger btn-sm' onclick="deleteExtraSkill(${element.id})">
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
            <td><button class="btn btn-danger btn-sm delete-row">Delete</button></td>
        </tr>
    `);

    form.reset();
    $(form).removeClass('was-validated');
});
$('#extra-skill-table').on('click', '.delete-row', function() {
    $(this).closest('tr').remove();
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
                // console.log(parseResponse);
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

function editExtraSkill(id){
    $('.extraSkillAddBtn').addClass('d-none');
    $('.extraSkillUpdateBtn').removeClass('d-none');
    $.ajax({
        url:"../../controller/profile/Profile.php",
        type:"POST",
        data:{GetExtraSkillData:true, id:id},
        dataType:'json',
        success:function(response){
            let data = response.data[0];
            $('#extraSkillId').val(id);
            $('#extra-skill').val(data.skill_list_id);
        }
    });
}
function updateExtraSkillData(id){
    let name =  $('#extra-skill').val();
    if(name == ''){
       $('form#profile-extra-skill.needs-validation').addClass('was-validated'); // to target specific form class
        return;
    }else{
       $('form#profile-extra-skill.needs-validation').removeClass('was-validated'); // to target specific form class
    }
    $.ajax({
        url:"../../controller/profile/Profile.php",
        type:"POST",
        data:{updateExtraSkill:true,id:id,name:name},
        dataType:'json',
        success:function(response){
            if (response.success) {
                $('form#profile-extra-skill.needs-validation').removeClass('was-validated');
                $('#extraSkillId').val('');
                $('#extra-skill').val('');
                extraSkillVIew();
                toastSuccessAlert(response.success);
            } else if (parseResponse.error_success) {
                toastErrorAlert(parseResponse.error_success);
            } else {
                toastErrorAlert('Something went wrong!');
            }
            $('.extraSkillUpdateBtn').addClass('d-none');
            $('.extraSkillAddBtn').removeClass('d-none');
        }        
    });
}
function deleteExtraSkill(id){
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
                        url: "../../controller/profile/Profile.php",
                        type: "POST",
                        data: { deleteExtraSKills:true,id: id },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $.alert({title: 'Deleted!', content: response.success,type: 'green'});
                                extraSkillVIew();
                            } else {
                                $.alert({title: 'Error!', content: 'Category not deleted.', type: 'red'});
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
                        <td>
                            <button class='btn btn-outline-primary btn-sm me-2' onclick="editPlan(${element.id})">
                                <i class='ri-pencil-line'></i>
                            </button>
                            <button class='btn btn-outline-danger btn-sm' onclick="deletePlan(${element.id})">
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
            <td><button class="btn btn-danger btn-sm delete-row">Delete</button></td>
        </tr>
    `);

    form.reset();
    $(form).removeClass('was-validated');
});
$('#profile-plan-table').on('click', '.delete-row', function() {
    $(this).closest('tr').remove();
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

function editPlan(id){
    $('.planAddBtn').addClass('d-none');
    $('.planUpdateBtn').removeClass('d-none');
    $.ajax({
        url:"../../controller/profile/ProfileTwo.php",
        type:"POST",
        data:{GetPlanData:true, id:id},
        dataType:'json',
        success:function(response){
            let data = response.data[0];
            $('#planId').val(id);
            $('#plan-type').val(data.plan_type_id);
            $('#plan-price').val(data.price);
            $('#skill-types').val(data.skill_types);
            $('#popularity-type').val(data.popularity_type);
        }
    });
}
function updatePlanData(id){
    let name =  $('#plan-type').val();
    let price =  $('#plan-price').val();
    let skill =  $('#skill-types').val();
    let value = $('#popularity-type').val();
    if(name == '' || price == '' || skill =='' || value == ''){
       $('form#profile-plan.needs-validation').addClass('was-validated'); // to target specific form class
        return;
    }else{
       $('form#profile-plan.needs-validation').removeClass('was-validated'); // to target specific form class
    }
    $.ajax({
        url:"../../controller/profile/ProfileTwo.php",
        type:"POST",
        data:{updatePlan:true,id:id,name:name,price:price,skill:skill,value:value},
        dataType:'json',
        success:function(response){
            if (response.success) {
                $('form#profile-plan.needs-validation').removeClass('was-validated');
                $('#planId').val('');
                $('#plan-type').val('');
                $('#plan-price').val('');
                $('#skill-types').val('');
                $('#popularity-type').val('');
                planView();
                toastSuccessAlert(response.success);
            } else if (parseResponse.error_success) {
                toastErrorAlert(parseResponse.error_success);
            } else {
                toastErrorAlert('Something went wrong!');
            }
            $('.planUpdateBtn').addClass('d-none');
            $('.planAddBtn').removeClass('d-none');
        }        
    });
}
function deletePlan(id){
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
                        data: { deletePlan:true,id: id },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $.alert({title: 'Deleted!', content: response.success,type: 'green'});
                                planView();
                            } else {
                                $.alert({title: 'Error!', content: 'Category not deleted.', type: 'red'});
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
                    imageHTML = `<img src="../../uploads/projects/${element.file_name}" width="50" alt="Project Image">`;
                }

                $('#project-table tbody').append(`
                    <tr>
                        <td scope="row">${index + 1}</td>
                        <td>${element.name}</td>
                        <td>${element.title}</td>
                        <td>${element.description}</td>
                        <td>${imageHTML}</td>
                        <td>
                            <button class='btn btn-outline-primary btn-sm me-2' onclick="editProject(${element.id})">
                                <i class='ri-pencil-line'></i>
                            </button>
                            <button class='btn btn-outline-danger btn-sm' onclick="deleteProject(${element.id})">
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
projectView();
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

function editProject(id){
    $('.projectAddBtn').addClass('d-none');
    $('.projectUpdateBtn').removeClass('d-none');
    $.ajax({
        url:"../../controller/profile/Profile.php",
        type:"POST",
        data:{GetProjectData:true, id:id},
        dataType:'json',
        success:function(response){
            // console.log(response);
            let data = response.data[0];
            $('#projectId').val(id);
            $('#project-category').val(data.category_id);
            $('#project-title').val(data.title);
            $('#project-desc').val(data.description);
        }
    });
}
function updateLanguageData(id){
    let category =  $('#project-category').val();
    let title = $('#project-title').val();
    let desc = $('#project-desc').val();
    let image = $('#file_name')[0].files[0];
    if(category == '' || title == '' || desc == ''){
       $('form#profile-projects.needs-validation').addClass('was-validated'); // to target specific form class
        return;
    }else{
       $('form#profile-projects.needs-validation').removeClass('was-validated'); // to target specific form class
    }
    let formData = new FormData();
    formData.append('updateProject', true);
    formData.append('id', id);
    formData.append('category', category);
    formData.append('title', title);
    formData.append('desc', desc);
    if (image) {
        formData.append('image', image);
    }

$.ajax({
    url: "../../controller/profile/Profile.php",
    type: "POST",
    data: formData,
    contentType: false,       // ✅ Prevent jQuery from setting content type
    processData: false,       // ✅ Prevent jQuery from processing FormData
    dataType: 'json',
    success: function(response) {
        console.log(response);
        if (response.success) {
            $('form#profile-projects.needs-validation').removeClass('was-validated');
            $('#projectId').val('');
            $('#project-category').val('');
            $('#project-title').val('');
            $('#file_name').val('');
            projectView();
            toastSuccessAlert(response.success);
        } else if (response.error_success) {
            toastErrorAlert(response.error_success);
        } else {
            toastErrorAlert('Something went wrong!');
        }
        $('.projectUpdateBtn').addClass('d-none');
        $('.projectAddBtn').removeClass('d-none');
    }
});

}
function deleteProject(id){
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
                        url: "../../controller/profile/Profile.php",
                        type: "POST",
                        data: { deleteProject:true,id: id },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $.alert({title: 'Deleted!', content: response.success,type: 'green'});
                                projectView();
                            } else {
                                $.alert({title: 'Error!', content: 'Category not deleted.', type: 'red'});
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