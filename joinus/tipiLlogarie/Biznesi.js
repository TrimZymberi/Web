function login() {

	var companyName = document.getElementById('company-name').value;
	var hqName = document.getElementById('hq-name').value;
	var nib = document.getElementById('NIB').value;
	var nfb = document.getElementById('NFB').value;
	var email = document.getElementById('emaili').value;
	var password = document.getElementById('passwordi').value;
  	
	if (companyName === '') {
	  alert('Please enter a valid company name.');
	  return false;
	}
	if (hqName === '') {
	  alert('Please enter a valid headquarters name.');
	  return false;
	}
	if (nib === '') {
	  alert('Please enter a valid NIB.');
	  return false;
	}
	if (nfb === '') {
	  alert('Please enter a valid NFB.');
	  return false;
	}
	if (email === '') {
	  alert('Please enter a valid email address.');
	  return false;
	}
	if (password === '' || password.length < 8) {
	  alert('Please enter a valid password with at least 8 characters.');
	  return false;
	}
  

	return true;
  }
  