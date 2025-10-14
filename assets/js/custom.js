function submitContactForm() {
    let name = document.getElementById('customer_name').value;
    let email = document.getElementById('customer_email').value;
    let message = document.getElementById('customer_message').value;
    let uid = document.getElementById('user_id').value;
    let phone_no = document.getElementById('customer_no').value;
    $.ajax({
        url: 'customer_query.php',
        type: "POST",
        dataType: 'json',
        data: {
            'id': uid,
            'name': name,
            'email': email,
            'message': message,
            'number': phone_no,
        },
        success: function (response) {
            if (response.success) {
                alert("Message sent");
            }
            else if (response.existsAlready) {
                alert("Message sent already");
            }
            else {
                alert("Failed to sent: " + response.failed);
            }
        },
       error: function (xhr, status, error) {
            console.log("AJAX failed:", status, error);
            console.log("Response text:", xhr.responseText);
            alert("AJAX failed: " + error);
        }
    }); 
}

