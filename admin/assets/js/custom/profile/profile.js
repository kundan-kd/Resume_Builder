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
                $('#programming-skill-name').val('');
                $('#programming-skill-measure').val('');
                // alert("success");
                programmingSkillAdd();
            }
        });
    }

});
