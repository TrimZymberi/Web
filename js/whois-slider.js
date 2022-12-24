var sliderImages = document.querySelectorAll("#first-container .whois-section");
var current = 0;

	
for (var i = 0; i < sliderImages.length; i++) {
    if (i !== current) {
      sliderImages[i].style.display = "none";
    }
}

document.querySelector("#previous").addEventListener("click", function() {
  sliderImages[current].style.display = "none";

  current = (current > 0) ? --current : sliderImages.length - 1;

  sliderImages[current].style.display = "block";
});

document.querySelector("#next").addEventListener("click", function() {
  sliderImages[current].style.display = "none";

  current = (current < sliderImages.length - 1) ? ++current : 0;

  sliderImages[current].style.display = "block";
});