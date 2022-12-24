function login(){
	
	var firstName = document.getElementById('first-name').value;
	var lastName = document.getElementById('last-name').value;
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	var age = document.getElementById('age').value;
	
    var firstNameRegex = /^[A-Z][A-Za-z]{4,14}$/;
    var lastNameRegex = /^[A-Z][A-Za-z]{4,14}$/;
	var emailRegex = /^\w+([.-]?\w+)@\w+([.-]?\w+)(\.\w{2,3})+$/;
	var passwordRegex = /^[A-Za-z0-9!@#$%^&()_+=-]{7,}[0-9!@#$%^&()_+=-]$/;

	var currentYear = new Date().getFullYear();
  	var userAge = currentYear - parseInt(age);

	if (!firstNameRegex.test(firstName)) {
		alert('Write your first name,it cannot contain numbers or special characters!');
	}
	else if (!lastNameRegex.test(lastName)) {
		alert('Write your last name,it cannot contain numbers or special characters!');
	}
	else if(!emailRegex.test(email)) {
	  	alert('Write your email,such as example. username@domain.com');
	}
	else if (!passwordRegex.test(password)) {
        alert("Password must be at least 7 characters long, with at least one uppercase letter, one number, and one special character.");
    }
	else{
		
		if (userAge < 18) {
			alert("You must be 18 or older to create an individual account");	
		}else {
			alert("Account successfully registered.");
		}
	
	}
	validationLOGIN.addEventListener("click", function() {

	});
}
