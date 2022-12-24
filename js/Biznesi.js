function login(){	
	var companyName = document.getElementById('company-name').value;
	var BUN = document.getElementById('BUN').value;
	var BFN = document.getElementById('BFN').value;
	var email = document.getElementById('emaili').value;
	var password = document.getElementById('passwordi').value;

	var emailFilter = /^\w+([.-]?\w+)@\w+([.-]?\w+)(\.\w{2,3})+$/;
	var companyNameFilter = /^[A-Z][a-z]( [A-Z][a-z])*$/;
	var BUNFilter = /^[0-9]{8}$/;
	var BFNFilter = /^[0-9]{9}$/;

	if (!companyNameFilter.test(companyName)) {
		alert('Write your Company name,such example Kartell Corp');
	}
	else if (!BUNFilter.test(BUN)) {
		alert('Ju lutem shkruani numrin unik te biznesit tuaj.');
	}
	else if (!BFNFilter.test(BFN)) {
		alert('Ju lutem shkruani numrin fiskal te biznesit.');
	}
	else if (!emailFilter.test(email)) {
		alert('Ju lutem shkruani emailin shembull filani@example.com');
	}
	else if (password == '' || password.length < 8) {
		alert('Please enter a valid password with at least 8 characters.');
	}else{
		alert('Account successfully opened');
	}

	validationLOGIN.addEventListener("click", function() {

	});
	
}