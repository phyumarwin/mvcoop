$(document).ready(function() {

    // form autocomplete off		
    $(":input").attr('autocomplete', 'off');

    // remove box shadow from all text input
    $(":input").css('box-shadow', 'none');


    // save button click function
    $("#savebtn").click(function() {

        // calling validate function
        var response = validateForm();

        // if form validation fails			
        if (response == 0) {
            return;
        }


        // getting all form data
        var email = $("#email").val();
        var name = $("#name").val();
        var password = $("#password").val();

        var form_url = '<?php echo URLROOT; ?>/auth/register';
        // sending ajax request
        $.ajax({

            url: form_url,
            type: 'post',
            data: {
                'name': name,
                'email': email,
                'password': password,
                'save': 1
            },

            // before ajax request
            beforeSend: function() {
                $("#result").html("<p class='text-success'> Please wait.. </p>");
            },

            // on success response
            success: function(response) {
                $("#result").html(response);

                // reset form fields
                $("#regForm")[0].reset();
            },

            // error response
            error: function(e) {
                $("#result").html("Some error encountered.");
            }

        });
    });




    // ------------- form validation -----------------

    function validateForm() {

        // removing span text before message
        $("#error").remove();


        // validating input if empty
        if ($("#name").val() == "") {
            $("#name").after("<span id='error' class='text-danger'> Enter your name </span>");
            return 0;
        }

        if ($("#email").val() == "") {
            $("#email").after("<span id='error' class='text-danger'> Enter your email </span>");
            return 0;
        }

        if ($("#password").val() == "") {
            $("#password").after("<span id='error' class='text-danger'> Enter your password </span>");
            return 0;
        }


        return 1;

    }


    // ------------------- [ Email blur function ] -----------------

    $("#email").blur(function() {

        var email = $('#email').val();

        // if email is empty then return
        if (email == "") {
            return;
        }
        var form_url = '<?php echo URLROOT; ?>/auth/register';

        // send ajax request if email is not empty
        $.ajax({
            url: form_url,
            type: 'post',
            data: {
                'email': email,
                'email_check': 1,
            },

            success: function(response) {

                // clear span before error message
                $("#email_error").remove();

                // adding span after email textbox with error message
                $("#email").after("<span id='email_error' class='text-danger'>" + response + "</span>");
            },

            error: function(e) {
                $("#result").html("Something went wrong");
            }

        });
    });


    // -----------[ Clear span after clicking on inputs] -----------

    $("#name").keyup(function() {
        $("#error").remove();
    });


    $("#email").keyup(function() {
        $("#error").remove();
        $("span").remove();
    });

    $("#password").keyup(function() {
        $("#error").remove();
    });

    $("#c_password").keyup(function() {
        $("#error").remove();
    });

});