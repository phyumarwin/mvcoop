<?php require_once APPROOT . '/views/inc/header.php'; ?>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo URLROOT; ?>/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form"  name="contactForm" method="POST" action="<?php echo URLROOT; ?>/auth/register">

					<?php require APPROOT . '/views/components/auth_message.php'; ?>
					<span class="login100-form-title">
						Register Form
					</span>

					<p class="text-danger ml-4">
						<?php
							if(isset($data['name-err']))
							echo $data['name-err'];
						?>
					</p>

					<div class="wrap-input100 validate-input"  data-validate = "Valid Name is required:">
						<input class="input100" type="text" id="name" onfocus="this.value=''" name="name" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<p class="text-danger ml-4">
						<?php
							if(isset($data['email-err']))
							echo $data['email-err'];
						?>
					</p>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" id="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					
					<p class="text-danger ml-4">
						<?php
							if(isset($data['password-err']))
							echo $data['password-err'];
						?>
					</p>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password"  name="password" placeholder="Password" id="myInput">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<input type="checkbox" onclick="myFunction()">Show Password
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Register
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="<?php echo URLROOT; ?>/pages/login/">
							Have an account? Login Now!
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php require_once APPROOT . '/views/inc/footer.php'; ?>

<script>
	// Show Password
	function myFunction() {
		var x = document.getElementById("myInput");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}

    $(function () {

		var str=$('name').val();
		if(/^[a-zA-Z- ]*$/.test(str) == false) {
				alert('Your search string contains illegal characters.');
			}
        $("form[name='contactForm']").validate({
            // Define validation rules
            rules: {
                name: "required",
                email: "required",
                password: "required",
                
                name: {
                    required: true,// to show configuration error message
					minlength: 6,// limit input value, 	Input value must have greater than or equal to minLength character length
                    maxlength: 20,//limit input value, 	Input value must have less than or equal to maxLength character length

                },
                email: {
                    required: true,
					minlength: 6,
                    maxlength: 50,
                    email: true
                },
                password: {
					minlength: 8,
					maxlength: 30,
					required: true,
					//pwcheck: true,
					// checklower: true,
					// checkupper: true,
					// checkdigit: true
                },
                
            },
            // Specify validation error messages
			//  config error message
            messages: {
				name: {
				required: "Please enter your name",
				minlength: "Name must be min 6 characters long",

				},
                email: {
                    required: "Please enter your email",
                    minlength: "Please enter a valid email address",
                },
                password: {
                    required: "Please enter your password",
                    minlength: "Password length must be min 8 characters long",
                    maxlength: "Password length must not be more than 30 characters long"
                },
                
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });

	// Email Validation
	$(document).ready(function() {

		// form autocomplete off
		// call input tag, set attribute [attr(attribute,value)]	
		$(":input").attr('autocomplete', 'off');

		// remove box shadow from all text input
		// call input tag
		$(":input").css('box-shadow', 'none');
	// remove focus from the text field, remove cursor
		$("#name").blur(function() {
		
		var name  		= 		$('#name').val();//to get the values of form elements(input field)
		
		
		// if name is empty then return
		if(name == "") {
			return;
		}
		// call formRegister method from controllers>auth>formRegister()
		var form_url = '<?php echo URLROOT; ?>/auth/formRegister';

		// send ajax request if name is not empty
		$.ajax({
				url:form_url,
				type: 'post',
				data: {
					'name':name,

			},
		
			success:function(response) {	
			
				// clear span before error message
				$("#name_error").remove();
			
				// adding span after name textbox with error message
				$("#name").after("<span id='name_error' class='text-danger'>"+response+"</span>");
			},
		
			error:function(e) {
				$("#result").html("Something went wrong");
			}
		
		});
	});


		// ------------------- [ Email blur function ] -----------------

		$("#email").blur(function() {
		
			var email = $('#email').val();
			// if email is empty then return
			if(email == "") {
				return;
			}
			var form_url = '<?php echo URLROOT; ?>/auth/formRegister';
		
			// send ajax request if email is not empty
			$.ajax({
					url:form_url,
					type: 'post',
					data: {
						'email':email,
						'email_check':1,
				},
			
				success:function(response) {	
				
					// clear span before error message
					$("#email_error").remove();
				
					// adding span after email textbox with error message
					$("#email").after("<span id='email_error' class='text-danger'>"+response+"</span>");
				},
			
				error:function(e) {
					$("#result").html("Something went wrong");
				}
			
			});
		});
		$("#passsword").blur(function() {
		
		var password = $('#password').val();
		
		
		// if password is empty then return
		if(password == "") {
			return;
		}
		var form_url = '<?php echo URLROOT; ?>/auth/formRegister';

		// send ajax request if password is not empty
		$.ajax({
				url:form_url,
				type: 'post',
				data: {
					'password':password,

			},
		
			success:function(response) {	
			
				// clear span before error message
				$("#password_error").remove();
			
				// adding span after password textbox with error message
				$("#password").after("<span id='password_error' class='text-danger'>"+response+"</span>");
			},
		
			error:function(e) {
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
</script>