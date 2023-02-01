const sections = document.querySelectorAll(".whois-section");
const previous = document.querySelector("#previous");
const next = document.querySelector("#next");

let currentIndex = 0;

sections[currentIndex].classList.add("active");

previous.addEventListener("click", () => {
  sections[currentIndex].classList.remove("active");
  currentIndex--;
  if (currentIndex < 0) {
    currentIndex = sections.length - 1;
  }
  sections[currentIndex].classList.add("active");
});

next.addEventListener("click", () => {
  sections[currentIndex].classList.remove("active");
  currentIndex++;
  if (currentIndex >= sections.length) {
    currentIndex = 0;
  }
  sections[currentIndex].classList.add("active");
});
