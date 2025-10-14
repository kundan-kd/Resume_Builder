//
//                       _oo0oo_
//                      o8888888o
//                      88" . "88
//                      (| -_- |)
//                      0\  =  /0
//                    ___/`---'\___
//                  .' \\|     |// '.
//                 / \\|||  :  |||// \
//                / _||||| -:- |||||- \
//               |   | \\\  -  /// |   |
//               | \_|  ''\---/''  |_/ |
//               \  .-\__  '-'  ___/-. /
//             ___'. .'  /--.--\  `. .'___
//          ."" '<  `.___\_<|>_/___.' >' "".
//         | | :  `- \`.;`\ _ /`;.`/ - ` : | |
//         \  \ `_.   \_ __\ /__ _/   .-` /  /
//     =====`-.____`.___ \_____/___.-`___.-'=====
//                       `=---='
//
//
//     ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//      Buddha Protect  from bugs
//               
//


/* Stand AlOne */
//var selectedCategory = document.getElementById('project-category'); //  category dropdown (this might 9defineityl will cause) errors)
//var customCategory = document.getElementById('custom-category'); //text-box to insert category

// function insertCustomCategory() {
//     if (selectedCategory.value == 'Other') {
//         customCategory.style.display = 'inline-block';             // will break alignment
//         customCategory.required = true;
//     }
// }
//selectedCategory.addEventListener('change', insertCustomCategory); // Attach the function to the dropdown
/* Extremely dangerous code */


$(document).on('submit', '#categoryForm', function (e) {
    e.preventDefault();
    let name = $('#categoryName').val();

    if (name !== "") {
        $.ajax({
            url: "crud/master/category_types.php",
            type: "POST",
            dataType: "json",
            data: { name: name },
            success: function (response) {
                if (response.status === "success") {
                    alert("Category added!");
                    location.reload();
                    // $('#categoryModal').modal('hide'); 
                    // $('#categoryModal')[0].reset();
                }
                else {
                    alert("Error: " + response.error);
                }
            }
        });
    }
});


$(document).on('submit', '#designationForm', function (e) {
    e.preventDefault();

    let name = $('#designationName').val();

    if (name !== "") {
        $.ajax({
            url: "crud/master/designation_types.php",
            type: "POST",
            dataType: "json",
            data: { name: name },
            success: function (response) {
                if (response.status === "success") {
                    alert("Designation added!");
                    location.reload();
                    // $('#categoryModal').modal('hide'); 
                    // $('#categoryModal')[0].reset();
                }
                else {
                    alert("Error: " + response.error);
                }
            }
        });
    }
});

$(document).on('submit', '#planForm', function (e) {
    e.preventDefault();

    let name = $('#planName').val();

    if (name !== "") {
        $.ajax({
            url: "crud/master/plan_types.php",
            type: "POST",
            dataType: "json",
            data: { name: name },
            success: function (response) {
                if (response.status === "success") {
                    alert("Plan added!");
                    location.reload();
                    // $('#categoryModal').modal('hide'); 
                    // $('#categoryModal')[0].reset();
                }
                else {
                    alert("Error: " + response.error);
                }
            }
        });
    }
});

$(document).on('submit', '#programmingSkillsForm', function (e) {
    e.preventDefault();

    let name = $('#programmingSkillName').val();

    if (name !== "") {
        $.ajax({
            url: "crud/master/programming_skill_types.php",
            type: "POST",
            dataType: "json",
            data: { name: name },
            success: function (response) {
                if (response.status === "success") {
                    alert("Programming Skill added!");
                    location.reload();
                    // $('#categoryModal').modal('hide'); 
                    // $('#categoryModal')[0].reset();
                }
                else {
                    alert("Error: " + response.error);
                }
            }
        });
    }
});

$(document).on('submit', '#languageForm', function (e) {
    e.preventDefault();
    let name = $('#languageName').val();

    if (name !== "") {
        $.ajax({
            url: "crud/master/language_types.php",
            type: "POST",
            dataType: "json",
            data: { name: name },
            success: function (response) {
                if (response.status === "success") {
                    alert("Language added!");
                    location.reload();
                    // $('#categoryModal').modal('hide'); 
                    // $('#categoryModal')[0].reset();
                }
                else {
                    alert("Error: " + response.error);
                }
            }
        });
    }
});


$(document).on('submit', '#addonForm', function (e) {
    e.preventDefault();
    let name = $('#addonName').val();

    if (name !== "") {
        $.ajax({
            url: "crud/master/extra_skill_types.php",
            type: "POST",
            dataType: "json",
            data: { name: name },
            success: function (response) {
                if (response.status === "success") {
                    alert("Extra Skill added!");
                    //  toastr.success('Operation completed successfully!', 'Success');
                    location.reload();
                    // $('#categoryModal').modal('hide'); 
                    // $('#categoryModal')[0].reset();
                }
                else {
                    alert("Error: " + response.error);
                }
            }
        });
    }
});


// $(document).on('submit', '#qualificationForm', function (e) {
//     e.preventDefault();

//     let name = $('#qualificationName').val();

//     if (name !== "") {
//         $.ajax({
//             url: "crud/master/qualifications.php",
//             type: "POST",
//             dataType: "json",
//             data: { name: name },
//             success: function (response) {
//                 if (response.status === "success") {
//                     alert("Qualification added!");
//                     location.reload();
//                     // $('#categoryModal').modal('hide'); 
//                     // $('#categoryModal')[0].reset();
//                 }
//                 else {
//                     alert("Error: " + response.error);
//                 }
//             }
//         });
//     }
// });

$(document).on('submit', '#serviceForm', function (e) {
    e.preventDefault();
    let name = $('#serviceName').val();

    if (name !== "") {
        $.ajax({
            url: "crud/master/skill_list_types.php",
            type: "POST",
            dataType: "json",
            data: { name: name },
            success: function (response) {
                if (response.status === "success") {
                    alert("Skill List added!");
                    location.reload();
                    // $('#categoryModal').modal('hide'); 
                    // $('#categoryModal')[0].reset();
                }
                else {
                    alert("Error: " + response.error);
                }
            }
        });
    }
});

function mysubmit() {
    console.log("hello");
    let user_email = $('#user-email').val()
    let user_password = $('#user-password').val()
    console.log(user_email);
    console.log(user_password);
    if (user_email !== "" && user_password !== "") {
        $.ajax({
            url: "crud/auth/login.php",
            type: "POST",
            dataType: "json",
            data: {
                email: user_email,
                password: user_password
            },
            success: function (response) {
                if (response.status) {
                    //alert("Login successful!");
                    window.location.href = "dashboard.php";
                } else {
                    alert("Login failed: " + response.error);
                }
            },
            // error: function (xhr, status, errorThrown) {
            //     console.error(error);
            //     alert("Something went wrong");
            // }
        });
    } else {
        alert("Please enter both email and password.");
    }

}

function myLogout() {
    $.ajax({
        url: "logout.php",
        type: "POST",
        dataType: "json",
        // data: {
        //     email: user_email,
        //     password: password
        // },
        success: function (response) {
            if (response.status) {
                window.location.href = "index.php";
            }
            else {
                alert("Request failed");
            }
        },
        error: function () {
            alert("Logout failed, please try again");
        }

    });
}

$(document).ready(function () {
    console.log("check");
    if ($('#datatable').DataTable()) console.log("checkagain");

    // $('datatable1').DataTable();
    // $('#contact-table1').DataTable();
    // $('#index-page-form').on('submit',function(e){
    //     e.preventDefault();
    //     console.log("hello");
    //     let user_email = $('#user-email').val()
    //     let user_password = $('#user-password').val()

    //     // if (user_email !== "" && user_password !== "") {
    //     //     $.ajax({
    //     //         url: "crud/auth/login.php",
    //     //         type: "POST",
    //     //         dataType: "json",
    //     //         data: {
    //     //             email: user_email,
    //     //             password: user_password
    //     //         },
    //     //         success: function (response) {
    //     //             if (response.status) {
    //     //                 alert("Login successful!");
    //     //                 window.location.href = "dashboard.php";
    //     //             } else {
    //     //                 alert("Login failed: " + response.error);
    //     //             }
    //     //         },
    //     //         error: function (xhr, status, error) {
    //     //             console.error(error);
    //     //             alert("Something went wrong");
    //     //         }
    //     //     });
    //     // } else {
    //     //     alert("Please enter both email and password.");
    //     // }
    // });
    //     $(document).on('submit', '#index-page-form', function (e) {
    //         e.preventDefault();
    // console.log("hello");
    //         let user_email = $('#user-email').val()
    //         let user_password = $('#user-password').val()

    //         if (user_email !== "" && user_password !== "") {
    //             $.ajax({
    //                 url: "crud/auth/login.php",
    //                 type: "POST",
    //                 dataType: "json",
    //                 data: {
    //                     email: user_email,
    //                     password: user_password
    //                 },
    //                 success: function (response) {
    //                     if (response.status) {
    //                         alert("Login successful!");
    //                         window.location.href = "dashboard.php";
    //                     } else {
    //                         alert("Login failed: " + response.error);
    //                     }
    //                 },
    //                 error: function (xhr, status, error) {
    //                     console.error(error);
    //                     alert("Something went wrong");
    //                 }
    //             });
    //         } else {
    //             alert("Please enter both email and password.");
    //         }
    //     });





    // registration 

});

$(document).on('submit', '#user-registration', function (e) {
    e.preventDefault();

    let first_name = $('#firstname').val();
    let last_name = $('#lastname').val();
    let email = $('#email').val();
    let password = $('#password').val();
    let confirmation = $('#confirm-password').val();

    if (password.length < 8 || password.length > 32) {
        alert("Password must be between 8 and 32 characters.");
    }

    else if (first_name === "" || last_name === "" || email === "" || password === "" || confirmation === "") {
        alert("Please Fill in all the fields");
    }

    else if (password != confirmation) {
        alert("Passwords do not match");
    }

    else {
        $.ajax({
            type: 'POST',
            url: 'crud/auth/registration.php',
            dataType: "json",
            data: {
                first_name: first_name,
                last_name: last_name,
                email: email,
                password: password
            },
            success: function (response) {
                console.log(response);
                if (response.status == 'success') {
                    alert("Registration successful");
                    document.getElementById('user-registration').reset();
                }
                else {
                    alert("Error: " + response.error);
                }
            },

        });
    }
});


$(document).on('submit', '#qualificationForm', function (e) {
    e.preventDefault();

    let name = $('#qualificationName').val();

    if (name !== "") {
        $.ajax({
            url: "crud/master/qualification_types.php",
            type: "POST",
            dataType: "json",
            data: { name: name },
            success: function (response) {
                if (response.status === "success") {
                    alert("Qualification added!");
                    location.reload();
                    // $('#categoryModal').modal('hide'); 
                    // $('#categoryModal')[0].reset();
                }
                else {
                    alert("Error: " + response.error);
                }
            }
        });
    }
});

$(document).on('submit', '#editqualificationModal', function (e) {
    e.preventDefault();
    let name = $('#editQualificationName')

    if (name !== "") {
        $.ajax({
            url: "crud/master/qualification_types.php",
            type: "POST",
            dataType: "json",
            data: { name: name },
            success: function (response) {
                if (response.status === "success") {
                    //alert("Qualification edited!");
                    //  <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    //                     A simple primary alert—check it out!
                    //                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">  
                    //                     </button>
                    //                 </div>
                    location.reload();
                }
                else {
                    alert("Error: " + response.error);
                }
            }
        })
    }
});

// function deleteButton() {
//     Swal.fire({
//         title: "Are you sure?",
//         text: "You won't be able to revert this!",
//         icon: "warning",
//         showCancelButton: true,
//         confirmButtonColor: "#3085d6",
//         cancelButtonColor: "#d33",
//         confirmButtonText: "Yes, delete it!"
//     }).then((result) => {
//         if (result.isConfirmed) {
//             Swal.fire({
//                 title: "Deleted!",
//                 text: "This record has been deleted",
//                 icon: "success"
//             });
//         }
//     });
// }

function deleteButton(id, table, name) {
    let type = table.split('_')[0];
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this " + type + "! : " + name,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "crud/master/delete.php",   // 👈 PHP script for delete
                type: "POST",
                data: { id: id, table: table },
                dataType: "json",
                success: function (response) {
                    if (response.status === "success") {
                        Swal.fire("Deleted!", "This record has been deleted", "success");
                        // reload table or remove row
                        // $("#row" + id).remove();
                        location.reload();
                    } else {
                        Swal.fire("Error!", response.error, "error");
                    }
                },
                error: function () {
                    Swal.fire("Error!", "Something went wrong.", "error");
                }
            });
        }
    });
}

$(document).on('click', '.edit-category-btn', function () {
    let categoryId = $(this).data('category-id');
    $("#editCategoryId").val(categoryId);
    let categoryName = $(this).closest('tr').children().eq(1).text();
    $("#editCategoryName").val(categoryName);
    $('#editCategoryModal').modal('show');
});

$(document).on('submit', '#editCategoryForm', function (e) {
    e.preventDefault();
    let name = $('#editCategoryName').val();
    let id = $('#editCategoryId').val();
    $.ajax({
        url: "crud/master/category_types.php",
        type: "POST",
        dataType: "json",
        data: {
            id: id,
            name: name
        },
        success: function (response) {
            if (response.status === "success") {
                alert("Category Edited!");
                location.reload();
                // $('#categoryModal').modal('hide'); 
                // $('#categoryModal')[0].reset();
            }
            else {
                alert("Error: " + response.error);
            }
        }
    });

});


$(document).on('click', '.edit-extraskill-btn', function () {
    let extraSkillId = $(this).data('extra-skill-id');
    $("#editExtraSkillId").val(extraSkillId);
    let extraSkillname = $(this).closest('tr').children().eq(1).text();
    $("#editExtraSkillName").val(extraSkillname);
    $('#editExtraSkillModal').modal('show');
});

$(document).on('submit', '#editExtraSkillForm', function (e) {
    e.preventDefault();
    let name = $('#editExtraSkillName').val();
    let id = $('#editExtraSkillId').val();
    $.ajax({
        url: "crud/master/extra_skill_types.php",
        type: "POST",
        dataType: "json",
        data: {
            id: id,
            name: name
        },
        success: function (response) {
            if (response.status === "success") {
                alert("Extra Skill Edited!");
                location.reload();
                // $('#categoryModal').modal('hide'); 
                // $('#categoryModal')[0].reset();
            }
            else {
                alert("Error: " + response.error);
            }
        }
    });
});


$(document).on('click', '.edit-plan-btn', function () {
    let planId = $(this).data('plan-id');
    $("#editPlanId").val(planId);
    let planName = $(this).closest('tr').children().eq(1).text();
    $("#editPlanName").val(planName);
    $('#editPlanModal').modal('show');
});

$(document).on('submit', '#editPlanForm', function (e) {
    e.preventDefault();
    let name = $('#editPlanName').val();
    let id = $('#editPlanId').val();
    $.ajax({
        url: "crud/master/plan_types.php",
        type: "POST",
        dataType: "json",
        data: {
            id: id,
            name: name
        },
        success: function (response) {
            if (response.status === "success") {
                alert("Plan Edited!");
                location.reload();
                // $('#categoryModal').modal('hide'); 
                // $('#categoryModal')[0].reset();
            }
            else {
                alert("Error: " + response.error);
            }
        }
    });
});


$(document).on('click', '.edit-lang-btn', function () {
    let langId = $(this).data('lang-id');
    $("#editLangId").val(langId);
    let langName = $(this).closest('tr').children().eq(1).text();
    $("#editLangName").val(langName);
    $('#editLangModal').modal('show');
});

$(document).on('submit', '#editLangForm', function (e) {
    e.preventDefault();
    let name = $('#editLangName').val();
    let id = $('#editLangId').val();
    $.ajax({
        url: "crud/master/language_types.php",
        type: "POST",
        dataType: "json",
        data: {
            id: id,
            name: name
        },
        success: function (response) {
            if (response.status === "success") {
                alert("Language Edited!");
                location.reload();
                // $('#categoryModal').modal('hide'); 
                // $('#categoryModal')[0].reset();
            }
            else {
                alert("Error: " + response.error);
            }
        }
    });
});

$(document).on('click', '.edit-qualification-btn', function () {
    let qualificationId = $(this).data('qualification-id'); // Changed from lang-id
    $("#editQualificationId").val(qualificationId);
    let qualificationName = $(this).closest('tr').children().eq(1).text();
    $("#editQualificationName").val(qualificationName);
    $('#editQualificationModal').modal('show');
});

$(document).on('submit', '#editQualificationForm', function (e) {
    e.preventDefault();
    let name = $('#editQualificationName').val();
    let id = $('#editQualificationId').val();
    $.ajax({
        url: "crud/master/qualification_types.php",
        type: "POST",
        dataType: "json",
        data: {
            id: id,
            name: name,
        },
        success: function (response) {
            if (response.status === "success") {
                alert("Qualification Edited!");
                location.reload();
            } else {
                alert("Error: " + response.error);
            }
        }
    });
});


$(document).on('click', '.skill-list-btn', function () {
    let skillListId = $(this).data('skilllist-id'); // Changed from lang-id
    $("#editSkillListId").val(skillListId);
    let skillListName = $(this).closest('tr').children().eq(1).text();
    $("#editSkillListName").val(skillListName);
    $('#editSkillListModal').modal('show');
});

$(document).on('submit', '#editSkillListForm', function (e) {
    e.preventDefault();
    let name = $('#editSkillListName').val();
    let id = $('#editSkillListId').val();
    $.ajax({
        url: "crud/master/skill_list_types.php",
        type: "POST",
        dataType: "json",
        data: {
            id: id,
            name: name,

        },
        success: function (response) {
            if (response.status === "success") {
                alert("Skilllist Edited!");
                location.reload();
            } else {
                alert("Error: " + response.error);
            }
        }
    });
});

$(document).on('click', '.programming-skill-btn', function () {
    let programmingSkillId = $(this).data('programmingskill-id'); // Changed from lang-id
    $("#editProgrammingSkillId").val(programmingSkillId);
    let programmingSkillName = $(this).closest('tr').children().eq(1).text();
    $("#editProgrammingSkillName").val(programmingSkillName);
    $('#editProgrammingSkillListModal').modal('show');
});

$(document).on('submit', '#editProgrammingSkillForm', function (e) {
    e.preventDefault();
    let name = $('#editProgrammingSkillName').val();
    let id = $('#editProgrammingSkillId').val();
    $.ajax({
        url: "crud/master/programming_skill_types.php",
        type: "POST",
        dataType: "json",
        data: {
            id: id,
            name: name,

        },
        success: function (response) {
            if (response.status === "success") {
                alert("Programming Skill Edited!");
                location.reload();
            } else {
                alert("Error: " + response.error);
            }
        }
    });
});

$(document).on('click', '.edit-designation-btn', function () {
    let designationId = $(this).data('designation-id'); // Changed from lang-id
    $("#editDesignationId").val(designationId);
    let designationName = $(this).closest('tr').children().eq(1).text();
    $("#editDesignationName").val(designationName);
    $('#editDesignationModal').modal('show');
});

$(document).on('submit', '#editDesignationForm', function (e) {
    e.preventDefault();
    let name = $('#editDesignationName').val();
    let id = $('#editDesignationId').val();
    $.ajax({
        url: "crud/master/designation_types.php",
        type: "POST",
        dataType: "json",
        data: {
            id: id,
            name: name,

        },
        success: function (response) {
            if (response.status === "success") {
                alert("Designation Edited!");
                location.reload();
            } else {
                alert("Error: " + response.error);
            }
        }
    });
});

// profiles form
$(document).on('submit', '#profile-reg', function (e) {
    e.preventDefault();
    let form = $(this)[0];
    let formData = new FormData(form);
    if (!$(form).find('input, select, textarea').filter((_, el) => $(el).val()).length) return alert("At least one field should be updated.");  //भगवान जानता है 
    $.ajax({
        url: 'crud/profile/registration.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (response) {
            console.log(response);
            if (response.status === 'success') {
                alert("Updation successful!");
                form.reset();
            } else {
                alert("Error: " + response.error);
            }
        },

    });
});

function addRowProgrammingSkill() {
    let skillNameSelect = document.getElementById('programming-skill-name');
    let selectedOption = skillNameSelect.options[skillNameSelect.selectedIndex];
    let skillName = selectedOption.text;
    let optionId = selectedOption.value; // better than using .id
    let skillMeasure = document.getElementById('programming-skill-measure').value;

    if (!optionId || !skillMeasure) {
        alert("Please select a Programming Skill and enter efficiency.");
        return;
    }
    $.ajax({
        url: 'crud/profile/programming_skills.php',
        type: 'POST',
        dataType: 'json',
        success: function (response) {

            if (response.status == 'success') {
                let table = document.getElementById('profile-prog-tab');
                let tableBody = document.querySelector('#profile-prog-tab tbody');

                if (!table.querySelector('thead')) { // inserts table headers only once at first insertion
                    let thead = table.createTHead();
                    thead.innerHTML = `
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Skill Name</th>
                            <th scope="col">Skill Measure</th>
                        </tr>
                    `;
                }

                let rowCount = tableBody.rows.length + 1;
                let tr = tableBody.insertRow();
                tr.innerHTML = `
                    <td scope="row">${rowCount}</td>
                    <td>
                        ${skillName}
                        <input type="hidden" name="ps-ids[]" value="${optionId}">
                    </td>
                    <td>
                        <input type="number" name="ps-measures[]" value="${skillMeasure}" class="form-control">
                    </td>
                `;
                skillNameSelect.value = '';
                document.getElementById('programming-skill-measure').value = '';
            }

            else if (response.status == 'already exists') {
                alert('Programming skill already exists');
            }
            else {
                alert("Error: " + response.message);
            }

        },
        error: function (xhr, status, error) {
            console.log("AJAX failed:", status, error);
            console.log("Response text:", xhr.responseText);
            alert("AJAX failed: " + error);
        }
    });



    // let table = document.getElementById('profile-prog-tab');
    // let tableBody = document.querySelector('#profile-prog-tab tbody');

    // if (!table.querySelector('thead')) { // inserts table headers only once at first insertion
    //     let thead = table.createTHead();
    //     thead.innerHTML = `
    //         <tr>
    //             <th scope="col">#</th>
    //             <th scope="col">Skill Name</th>
    //             <th scope="col">Skill Measure</th>
    //         </tr>
    //     `;
    // }

    // let rowCount = tableBody.rows.length + 1;
    // let tr = tableBody.insertRow();
    // tr.innerHTML = `
    //     <td scope="row">${rowCount}</td>
    //     <td>
    //         ${skillName}
    //         <input type="hidden" name="ps-ids[]" value="${optionId}">
    //     </td>
    //     <td>
    //         <input type="number" name="ps-measures[]" value="${skillMeasure}" class="form-control">
    //     </td>
    // `;
    // skillNameSelect.value = '';
    // document.getElementById('programming-skill-measure').value = '';
}


$(document).on('submit', '#profile-prog', function (e) {
    e.preventDefault();

    let skillIds = [];
    $('input[name="ps-ids[]"]').each(function () {
        skillIds.push(this.value);
    });

    let skillMeasures = [];
    $('input[name="ps-measures[]"]').each(function () {
        skillMeasures.push(this.value);
    });

    if (skillIds.length === 0 || skillMeasures.length === 0) {
        alert("Add at least one field is empty");
        return;
    }

    $.ajax({
        url: 'crud/profile/programming_skills.php',
        type: 'POST',
        dataType: 'json',
        data: { ids: skillIds, measures: skillMeasures },
        success: function (response) {
            if (response.status === 'success') {
                alert('Skill submitted successfully!');
            } else {
                alert('Error: ' + response.message);
            }
        },
        error: function (xhr, status, error) {
            console.log("AJAX failed:", status, error);
            console.log("Response text:", xhr.responseText);
            alert("AJAX failed: " + error);
        }
    });
});


function addRowLanguage() {
    let skillNameSelect = document.getElementById('language-name');
    let selectedOption = skillNameSelect.options[skillNameSelect.selectedIndex];
    let skillName = selectedOption.text;
    let optionId = selectedOption.value;
    let skillMeasure = document.getElementById('language-measure').value;

    if (!optionId || !skillMeasure) {
        alert("Please select a language and enter efficiency.");
        return;
    }

    $.ajax({
        url: 'crud/profile/languages.php',
        type: 'POST',
        dataType: 'json',
        data: { 'id': optionId },
        success: function (response) {
            console.log('rar');
            if (response.status == 'success') {

                let table = document.getElementById('lang-table');
                let tableBody = document.querySelector('#profile-lang tbody');
                let rowCount = tableBody.rows.length + 1;
                let tr = tableBody.insertRow();
                if (!table.querySelector('thead')) {
                    let thead = table.createTHead();
                    thead.innerHTML = `
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Language Name</th>
                            <th scope="col">Efficiency</th>
                        </tr>
                    `;
                }
                tr.innerHTML = `
                    <td scope="row">${rowCount}</td>
                    <td>
                        ${skillName}
                        <input type="hidden" name="lang-ids[]" value="${optionId}">
                    </td>
                    <td>
                        <input type="number" name="lang-measures[]" value="${skillMeasure}" class="form-control" style="width:80px;">
                    </td>
                `;

                skillNameSelect.value = '';
                document.getElementById('language-measure').value = '';
            }
            else if (response.status == 'already exists') {
                console.log('rar');
                alert("Language already exists");
            }
            else {
                console.log('rar');
                alert("Error: " + response.message);
            }
        },
        error: function (xhr, status, error) {
            console.log("AJAX failed:", status, error);
            console.log("Response text:", xhr.responseText);
            alert("AJAX failed: " + error);
        }

    });

    // let table = document.getElementById('lang-table');
    // let tableBody = document.querySelector('#profile-lang tbody');
    // let rowCount = tableBody.rows.length + 1;
    // let tr = tableBody.insertRow();
    // if (!table.querySelector('thead')) { 
    //     let thead = table.createTHead();
    //     thead.innerHTML = `
    //         <tr>
    //             <th scope="col">#</th>
    //             <th scope="col">Language Name</th>
    //             <th scope="col">Efficiency</th>
    //         </tr>
    //     `;
    // }

    // tr.innerHTML = `
    //     <td scope="row">${rowCount}</td>
    //     <td>
    //         ${skillName}
    //         <input type="hidden" name="lang-ids[]" value="${optionId}">
    //     </td>
    //     <td>
    //         <input type="number" name="lang-measures[]" value="${skillMeasure}" class="form-control" style="width:80px;">
    //     </td>
    // `;

    // skillNameSelect.value = '';
    // document.getElementById('language-measure').value = '';
}

$(document).on('submit', '#profile-lang', function (e) {
    e.preventDefault();

    let skillIds = [];
    $('input[name="lang-ids[]"]').each(function () {
        skillIds.push(this.value);
    });
    let skillMeasures = [];
    $('input[name="lang-measures[]"]').each(function () {
        skillMeasures.push(this.value);
    });

    $.ajax({
        url: 'crud/profile/languages.php',
        type: 'POST',
        dataType: 'json',
        data: { ids: skillIds, measures: skillMeasures },
        success: function (response) {
            if (response.status == "success") {
                alert('Language submitted successfully!');
            }
            else {
                alert('Error: ' + response.message);
            }
        },
        error: function (xhr, status, error) {
            console.log("AJAX failed:", status, error);
            console.log("Response text:", xhr.responseText);
            alert("AJAX failed: " + error);
        }
    });
});
// function addRowIcon() {
//     let icon = document.getElementById('file_icon').files[0].name;
//     let tableBody = document.querySelector('#profile-icon tbody');
//     let rowCount = tableBody.rows.length + 1;
//     let tr = tableBody.insertRow();
//     tr.innerHTML = `
//         <td scope="row">${rowCount}</td>
//         <td>
//             ${icon}
//             <input type="hidden" name="file-names[]" value="${icon}">
//         </td>
//     `;
//     document.getElementById('file_icon').value = '';
// }

function addRowIcon() {
    let formData = new FormData(document.getElementById('profile-icon'));
    $.ajax({
        url: "crud/profile/icons.php",
        type: "POST",
        dataType: 'json',
        processData: false,
        contentType: false,
        data: formData,
        success: function (response) {
            if (response.status == 'success') {
                alert("Icon updated successfully");
                let table = document.getElementById('icons-table');
                if (!table.querySelector('thead')) {
                    let thead = table.createTHead();
                    thead.innerHTML = `
                        <tr> 
                            <th scope="col">#</th>
                            <th scope="col">File Name</th>           
                        </tr>
                    `;
                }


                let icon = document.getElementById('file_icon').files[0].name;
                // let table = document.getElementById('profile-icon');
                let tableBody = document.querySelector('#icons-table tbody');
                let rowCount = tableBody.rows.length + 1;
                let tr = tableBody.insertRow();
                tr.innerHTML = `
                    <td scope="row">${rowCount}</td>
                    <td>
                        ${icon}
                        <input type="hidden" name="file-names[]" value="${icon}">
                    </td>
                `;
                document.getElementById('file_icon').value = '';
            }
            else if (response.message = 'already exists') {
                alert("Icon already exists");
            }
            else {
                alert("Error: " + response.message);
            }
        },
        error: function (xhr, status, error) {
            console.log("AJAX failed:", status, error);
            console.log("Response text:", xhr.responseText);
            alert("AJAX failed: " + error);
        }
    });
}

// $(document).on('submit', '#profile-icon', function (e) {
//     console.log('button');
//     e.preventDefault(); // prevent default form submission
//     let formData = new FormData(this); // automatically grabs all input fields, including files

//     $.ajax({
//         url: 'profile/icons.php', // replace with your PHP script
//         type: 'POST',
//         data: formData,
//         contentType: false, // important for file upload
//         processData: false, // important for file upload
//         dataType: 'json',
//         success: function (response) {
//             // handle success
//             if (response.status) {
//                 alert('Icon updated successfully!');
//             }
//             else {
//                 alert(response.error);
//             }
//         },
//         error: function (xhr, status, error) {
//             // handle error
//             alert('Upload failed.');
//         }
//     });
// });

// function submitIcon() {
//     let
// }

function addRowPlan() {
    let planTypeSelect = document.getElementById('plan-type');
    let selectedPlan = planTypeSelect.options[planTypeSelect.selectedIndex];
    let planName = selectedPlan.text;
    let planId = selectedPlan.value;

    let price = document.getElementById('plan-price').value;
    let skillTypeSelect = document.getElementById('skill-types');
    let selectedSkill = skillTypeSelect.options[skillTypeSelect.selectedIndex];
    let skillName = selectedSkill.text;
    let skillID = selectedSkill.value;

    let PopularityTypeSelect = document.getElementById('popularity-type');
    let selectedPopularity = PopularityTypeSelect.options[PopularityTypeSelect.selectedIndex];
    let popularityValue = selectedPopularity.text;

    if (!planId || !price || !skillID || !popularityValue) {
        alert("Please fill in all fields before adding the plan.");
        return; // stop execution
    }

    $.ajax({
        url: 'crud/profile/plans.php',
        type: 'POST',
        dataType: 'json',
        data: {
            'pid': planId,
            'sid': skillID,
        },
        success: function (response) {
            if (response.status == 'success') {
                let table = document.getElementById('plan-table');
                let tableBody = document.querySelector('#plan-table tbody'); // do not touch

                if (!table.querySelector('thead')) { // inserts table headers only once at first insertion
                    let thead = table.createTHead();
                    thead.innerHTML = `
                        <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Plan Type</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Skill Types</th>
                                                    <th scope="col">Popularity</th>
                                                </tr>
                    `;
                }

                let rowCount = tableBody.rows.length + 1;
                let tr = tableBody.insertRow();
                tr.innerHTML = `
                                <td scope="row">${rowCount}</td>
                                <td>
                                    ${planName}
                                    <input type="hidden" name="plan-ids[]" value="${planId}">
                                </td>
                                <td>
                                    ${price}
                                    <input type="hidden" name="prices[]" value="${price}">
                                </td>
                                <td>
                                    ${skillName}
                                    <input type="hidden" name="skill-ids[]" value="${skillID}">    
                                </td>
                                <td>   
                                    ${popularityValue} 
                                    <input type="hidden" name="pops[]" value="${popularityValue}">
                                </td>
                            `;
                planTypeSelect.value = '';
                document.getElementById('plan-price').value = '';
                skillTypeSelect.value = '';
                PopularityTypeSelect.value = '';
            }
            else if (response.status == 'already exists') {
                alert(response.message);
            }
            else {
                alert("Error: " + response.message);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX error:", xhr.responseText);
            alert("AJAX failed: " + error);
        },
    });

    // let tableBody = document.querySelector('#plan-table tbody'); // do not touch
    // let rowCount = tableBody.rows.length + 1;
    // let tr = tableBody.insertRow();
    // tr.innerHTML = `
    //             <td scope="row">${rowCount}</td>
    //             <td>
    //                 ${planName}
    //                 <input type="hidden" name="plan-ids[]" value="${planId}">
    //             </td>
    //             <td>
    //                 ${price}
    //                 <input type="hidden" name="prices[]" value="${price}">
    //             </td>
    //             <td>
    //                 ${skillName}
    //                 <input type="hidden" name="skill-ids[]" value="${skillID}">    
    //             </td>
    //             <td>   
    //                 ${popularityValue} 
    //                 <input type="hidden" name="pops[]" value="${popularityValue}">
    //             </td>
    //         `;
    // planTypeSelect.value = '';
    // document.getElementById('plan-price').value = '';
    // skillTypeSelect.value = '';
    // PopularityTypeSelect.value = '';
}

function submitPlan() {
    let planIds = [];
    $('input[name="plan-ids[]"]').each(function () {
        planIds.push(this.value);
    });

    let prices = [];
    $('input[name="prices[]"]').each(function () {
        prices.push(this.value);
    });

    let skillIds = [];
    $('input[name="skill-ids[]"]').each(function () {
        skillIds.push(this.value);
    });

    let pops = [];
    $('input[name="pops[]"]').each(function () {
        pops.push(this.value);
    });

    $.ajax({
        url: 'crud/profile/plans.php',
        type: 'POST',
        dataType: 'json',
        data: {
            plan_ids: planIds,
            prices: prices,
            skill_ids: skillIds,
            pops: pops
        },
        success: function (response) {
            if (response.status == 'success') {
                alert('Plan Submitted Successfully');
                return;
            }
            else {

                alert("Error: " + response.message);
            }
        },

        error: function (xhr, status, error) {
            console.log("AJAX failed:", status, error);
            console.log("Response text:", xhr.responseText);
            alert("AJAX failed: " + error);
        }
    });
}


function addTableProject() {
    let projectTypeSelect = document.getElementById('project-category')
    let selectedProject = projectTypeSelect.options[projectTypeSelect.selectedIndex];
    let projectName = selectedProject.text;
    let projectId = selectedProject.value;

    let projectTitle = document.getElementById('project-title');
    let projectDescription = document.getElementById('project-desc');
    let fileName = document.getElementById('file_name').files[0].name;
    document.getElementById('project-id').value = projectId;
    let table = document.getElementById("project-table");
    if (!table.querySelector('thead')) { // inserts table headers only once at first insertion
        let thead = table.createTHead();
        thead.innerHTML = `
            <tr>
                <th scope="col">#</th>
                <th scope="col">Skill List ID</th>
            </tr>
        `;
    }
    let tableBody = document.querySelector('#profile-proj tbody');
    let rowCount = tableBody.rows.length + 1;
    let tr = tableBody.insertRow();
    tr.innerHTML = `
        <td scope="row">${rowCount}</td>
        <td>
            ${projectName}
        </td>
        <td>
            <input type="text" name="proj-titles[]" value="${projectTitle.value}" class="form-control">
        </td>
        <td>
            <input type="text" name="proj-descriptions[]" value="${projectDescription.value}" class="form-control">
        </td>

            <td>${fileName}
                <input type="hidden" name="proj-ids[]" value="${projectId}">
                <input type="hidden" name="file-names[]" value="${fileName}">
            </td>   
    `;
    projectTypeSelect.value = '';
    projectTitle.value = '';
    projectDescription.value = '';
    //fileName.value = '';
}


function addRowProject() {
    let formData = new FormData(document.getElementById('profile-proj'));
    $.ajax({
        url: "crud/profile/projects.php",
        type: "POST",
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status == 'success') {
                alert("Project Updated successfully ");
                addTableProject();
            }
            else {
                alert("Error: " + response.message);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX error:", xhr.responseText);
            alert("AJAX failed: " + error);
        },
    });
}

function addRowExtraSkill() {
    let extraSkillTypeSelect = document.getElementById('extra-skill')
    let selectedExtraSkill = extraSkillTypeSelect.options[extraSkillTypeSelect.selectedIndex];
    let extraSkillName = selectedExtraSkill.text;
    let extraSkillId = selectedExtraSkill.value;

    $.ajax({
        url: "crud/profile/extra_skills.php",
        type: "POST",
        dataType: 'json',
        data: { 'id': extraSkillId },
        success: function (response) {
            if (response.status == 'success') {
                let tableBody = document.querySelector('#profile-extra-skill tbody');
                let rowCount = tableBody.rows.length + 1;
                let tr = tableBody.insertRow();
                tr.innerHTML = `
                    <td scope="row">${rowCount}</td>
                    <td>${extraSkillName}    
                        <input type="hidden" name="extra-skill-ids[]" value="${extraSkillId}">
                    </td>
                 
                `;
                extraSkillTypeSelect.value = ''
            }

            else if (response.status == 'already exists') {
                alert("Extra Skill already exists");
            }
            else {
                alert("Error: " + response.message);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX error:", xhr.responseText);
            alert("AJAX failed: " + error);
        },
    });

    // let tableBody = document.querySelector('#profile-extra-skill tbody');
    // let rowCount = tableBody.rows.length + 1;
    // let tr = tableBody.insertRow();
    // tr.innerHTML = `
    //     <td scope="row">${rowCount}</td>
    //     <td>${extraSkillName}</td>
    //     <input type="hidden" name="extra-skill-ids[]" value="${extraSkillId}">
    // `;
    // extraSkillTypeSelect.value = ''
}

function addExtraSkill() {
    let extraSkillIds = [];
    document.querySelectorAll('#profile-extra-skill input[type="hidden"]').forEach(input => {
        extraSkillIds.push(input.value);
    });

    $.ajax({
        url: "crud/profile/extra_skills.php",
        type: "POST",
        contentType: "application/json",
        dataType: "json",
        data: JSON.stringify({ ids: extraSkillIds }),
        success: function (response) {
            if (response.success === 'success') {
                alert("Extra Skills submitted");
            }
            else {
                alert("Errors: " + response.error);
            }
        },
    });
}

function addRowQualification() {
    let qualificationTypeSelect = document.getElementById('qualification');
    let selectedQualification = qualificationTypeSelect.options[qualificationTypeSelect.selectedIndex];
    let qualificationName = selectedQualification.text;
    let qualificationId = selectedQualification.value;
    let startDate = document.getElementById('start-date').value;
    let endDate = document.getElementById('end-date').value;
    let description = document.getElementById('description').value;
    let certification = document.getElementById('cert').value;
    let fileName = document.getElementById('file-name').files[0].name;

    let tableBody = document.querySelector('#profile-qual tbody');
    let rowCount = tableBody.rows.length + 1;
    let tr = tableBody.insertRow();
    tr.innerHTML = `
        <td scope="row">${rowCount}</td>
        <td>${qualificationName}
            <input type="hidden" name="qualification-ids[]" value="${qualificationId}">
        </td>
        <td>${startDate}

            <input type="hidden" name="start-dates[]" value="${startDate}">
        </td>
        <td>
            ${endDate}
            <input type="hidden" name="end-dates[]" value="${endDate}">
        </td>
        <td>${description}
            <input type="hidden" name="description[]" value="${description}">
        </td>
        <td>${certification}
            <input type="hidden" name="certifications[]" value="${certification}">
        </td>
        <td>${fileName}
            <input type="hidden" name="files[]" value="${fileName}">
        </td>
    `;
    qualificationTypeSelect.value = '';
    document.getElementById('start-date').value = '';
    document.getElementById('end-date').value = '';
    document.getElementById('qualification-description').value = '';
    document.getElementById('certification').value = '';
    document.getElementById('file-name').value = '';
}

function submitQualification() {
    let form = document.getElementById('profile-qual');
    let formData = new FormData(form);
    if (fileInput.files[0]) {
        formData.append('file', fileInput.files[0]);
    }

    $.ajax({
        url: 'crud/profile/qualifications.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            // console.log(response);
        },
        error: function (xhr, status, error) {
            console.log("AJAX failed:", status, error);
            console.log("Response text:", xhr.responseText);
            alert("AJAX failed: " + error);
        }
    });

}

function addRowSkillList() {
    let skillListSelect = document.getElementById('skill-list');
    let selectedSkillList = skillListSelect.options[skillListSelect.selectedIndex];
    let skillListName = selectedSkillList.text;
    let skillListId = selectedSkillList.value;
    // Dangerous Code
    if (!selectedSkillList || selectedSkillList.value === "" || selectedSkillList.disabled) {
        alert("Please select a Skill List before adding.");
        return;
    }

    $.ajax({
        url: 'crud/profile/skillLists.php',
        type: 'POST',
        dataType: 'json',
        data: { id: skillListId },
        success: function (response) {
            if (response.status == 'success') {
                let table = document.getElementById('skill-list-table'); // define table
                let tableBody = document.querySelector('#skill-list-table tbody');
                let rowCount = tableBody.rows.length + 1;
                let tr = tableBody.insertRow();

                if (!table.querySelector('thead')) { // inserts table headers only once at first insertion
                    let thead = table.createTHead();
                    thead.innerHTML = `
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Skill List ID</th>
                        </tr>
                    `;
                }

                tr.innerHTML = `
                    <td scope="row">${rowCount}</td>
                    <td>            
                        ${skillListName}
                        <input type="hidden" name="skill-list-ids[]" value="${skillListId}"> 
                    </td>
                 `;
                skillListSelect.value = '';
            }
            else if (response.status == 'already exists') {
                alert('The skill list already exists');
            }
            else {
                alert('Error: ' + response.message);
            }
        }
    });

}

function submitSkillList() {
    let skillListIds = [];
    $('input[name="skill-list-ids[]"]').each(function () {
        skillListIds.push(this.value);
    });

    $.ajax({
        url: 'crud/profile/skillLists.php',
        type: 'POST',
        data: { "skill-list-ids": skillListIds },
        dataType: 'json',
        success: function (response) {
            if (response.status == 'success') {
                alert('Skill List added Successfully');
            }
            else {
                alert('Error ' + response.message);
            }
        }
    });
}