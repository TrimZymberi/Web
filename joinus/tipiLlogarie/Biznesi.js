function login() {
        var emailv = document.getElementById("email-label").value;
		var pass = document.getElementById("password-label").value;
		var eFilter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(emailv =='') {
			alert("Shtypni emailin tuaj");
		}
		else if(pass =='') {
        	alert("Shtypni passwordin tuaj");
		}
		else if(!eFilter.test(emailv)) {
			alert("Keni shtypur emailin tuaj gabim ex. yourname@mail.com !");
		}
		else if(pass.length < 8 || pass.length > 12) {
			alert("Passwordi juaj duhet te jete me gjatesi 8 deri 12 karaktere !");
		}
		else {
            alert('Llogaria juaj u hap me sukses');
	    
		console.log("prsh");
		}
	}
	console.log("prsh");