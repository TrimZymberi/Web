function login(){	
	var companyName = document.getElementById('company-name').value;
	var hqName = document.getElementById('hq-name').value;
	var nib = document.getElementById('NIB').value;
	var nfb = document.getElementById('NFB').value;
	var email = document.getElementById('emaili').value;
	var password = document.getElementById('passwordi').value;
	var eFilter = /^w+([.-]?w+)*@w+([.-]?w+)*(.w{2,3})+$/;
  	

	
	if (companyName == '') {
	  alert('Ju lutem shkruani emrin e kompanis tuaj.');
	  
	}
	else if (hqName == '') {
	  alert('Ju lutem shkruani emrin e lokacionit tuaj');
	  
	}
	else if (nib == '') {
	  alert('Ju lutem shkruani numrin e biznesit tuaj.');
	  
	}
	else if (nfb == '') {
	  alert('Ju lutem shkruani numrin fiskal te biznesit.');
	  
	}
	else if(email == '') {
		alert('Ju lutem shkruani emailin tuaj.');
	
	}
	else if (password == '' || password.length < 8) {
	  alert('Please enter a valid password with at least 8 characters.');
	
	}else{
		alert('LLogaria juaj u hap me sukses');
	}

	let mainNav= document.getElementById("nav");
	let navBarToggle = document.getElementById("hb-btn");

	navBarToggle.addEventListener("click", function() {

    mainNav.classList.toggle("active");

	});



	
  }
  