const navToggle = document.getElementById("navToggle");

navToggle.addEventListener("click", () => {
  console.log("Tombol navigasi diklik.");
});

const navMenu = document.getElementById("navMenu");
const contactForm = document.getElementById("contactForm");

contactForm.addEventListener("submit", (event) => {
  console.log("Form dikirim.");
});

const formFeedback = document.getElementById("formFeedback");

contactForm.addEventListener("input", () => {
  formFeedback.textContent = "";
});