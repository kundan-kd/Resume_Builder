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
        console.log('ok');
        $.ajax({
            url:"../../controller/profile/Profile.php",
            type:"POST",
            data:{first_name:first_name,last_name:last_name,email:email,mobile:mobile,dob:dob,address:address,city:city,state:state,pincode:pincode,country:country,linkedin:linkedin,experience:experience,project:project},
            success:function(response){
                console.log(response);
            }    

        });
    }
});