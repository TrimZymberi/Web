var sliderImages = document.querySelectorAll("#second-container .whois-section");
var current = 0;

	
for (var i = 0; i < sliderImages.length; i++) {
    if (i !== current) {
      sliderImages[i].style.display = "none";
    }
}

// Prev button
document.querySelector("#prevBtn").addEventListener("click", function() {
  // Remove the active class from the current image
  sliderImages[current].style.display = "none";

  // Decrement the current variable or set it to the last image if it's the first image
  current = (current > 0) ? --current : sliderImages.length - 1;

  // Add the active class to the new current image
  sliderImages[current].style.display = "block";
});

// Next button
document.querySelector("#nextBtn").addEventListener("click", function() {
  // Remove the active class from the current image
  sliderImages[current].style.display = "none";

  // Increment the current variable or set it to the first image if it's the last image
  current = (current < sliderImages.length - 1) ? ++current : 0;

  // Add the active class to the new current image
  sliderImages[current].style.display = "block";
});