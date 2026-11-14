const navToggle = document.getElementById("navToggle");
const navMenu = document.getElementById("navMenu");
navToggle.addEventListener("click", () => {
  const isOpen = navMenu.classList.toggle("nav-open");
  navToggle.setAttribute("aria-expanded", isOpen);

  if (isOpen) {
    navToggle.setAttribute("aria-label", "Tutup navigasi");
  } else {
    navToggle.setAttribute("aria-label", "Buka navigasi");
  }
});

const contactForm = document.getElementById("contactForm");
const namaInput = document.getElementById("nama");
const emailInput = document.getElementById("email");
const semesterInput = document.getElementById("semester");
const tanggalInput = document.getElementById("tanggal");
const prodiInput = document.getElementById("prodi");
const pesanInput = document.getElementById("pesan");

contactForm.addEventListener("submit", (event) => {
  event.preventDefault();

  const nama = namaInput.value.trim();
  const email = emailInput.value.trim();
  const semester = Number(semesterInput.value);
  const tanggal = tanggalInput.value;
  const jenisPesan = document.querySelector(
    'input[name="jenis_pesan"]:checked',
  );
  const topikDipilih = document.querySelectorAll('input[name="minat"]:checked');
  const prodi = prodiInput.value;
  const pesan = pesanInput.value.trim();

  if (!jenisPesan) {
    formFeedback.textContent = "Pilih jenis pesan.";
    return;
  }

  if (topikDipilih.length === 0) {
    formFeedback.textContent = "Pilih minimal satu topik yang diminati.";
    return;
  }
});

const formFeedback = document.getElementById("formFeedback");

contactForm.addEventListener("input", () => {
  formFeedback.textContent = "";
});

contactForm.addEventListener("reset", () => {
  formFeedback.textContent = "";
});
