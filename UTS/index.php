<?php
session_start();

// P7: Memproses data formulir dan menyimpannya ke dalam session.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$nama = trim((string) ($_POST["nama"] ?? ""));
	$email = trim((string) ($_POST["email"] ?? ""));
	$semesterForm = trim((string) ($_POST["semester"] ?? ""));
	$tanggal = trim((string) ($_POST["tanggal"] ?? ""));
	$jenisPesan = trim((string) ($_POST["jenis_pesan"] ?? ""));
	$minat = $_POST["minat"] ?? [];
	$prodi = trim((string) ($_POST["prodi"] ?? ""));
	$pesan = trim((string) ($_POST["pesan"] ?? ""));

	// Checkbox dapat mengirimkan lebih dari satu nilai.
	if (!is_array($minat)) {
		$minat = [];
	}

	if (($_POST["form_type"] ?? "") === "seminar") {
		$namaPeserta = trim((string) ($_POST["nama_peserta"] ?? ""));
		$nimPeserta = trim((string) ($_POST["nim_peserta"] ?? ""));
		$prodiPeserta = trim((string) ($_POST["prodi_peserta"] ?? ""));
		$pilihanSeminar = trim((string) ($_POST["pilihan_seminar"] ?? ""));
		$alasanSeminar = trim((string) ($_POST["alasan_seminar"] ?? ""));

		$daftarSeminarValid = ["Artificial Intelligence", "Web Development", "Cyber Security", "Data Analytics"];
		$daftarProdiValid = ["SI", "TI"];
		$errorsSeminar = [];

		if (mb_strlen($namaPeserta) < 3) {
			$errorsSeminar[] = "Nama peserta wajib diisi minimal 3 karakter.";
		}
		if ($nimPeserta === "" || !ctype_digit($nimPeserta)) {
			$errorsSeminar[] = "NIM wajib diisi dan hanya boleh berisi angka.";
		}
		if (!in_array($prodiPeserta, $daftarProdiValid, true)) {
			$errorsSeminar[] = "Program studi tidak valid.";
		}
		if (!in_array($pilihanSeminar, $daftarSeminarValid, true)) {
			$errorsSeminar[] = "Pilihan seminar tidak valid.";
		}
		if (mb_strlen($alasanSeminar) < 10) {
			$errorsSeminar[] = "Alasan mengikuti seminar minimal 10 karakter.";
		}

		if (empty($errorsSeminar)) {
			$_SESSION["seminar_data"] = [
				"nama_peserta" => $namaPeserta,
				"nim_peserta" => $nimPeserta,
				"prodi_peserta" => $prodiPeserta,
				"pilihan_seminar" => $pilihanSeminar,
				"alasan_seminar" => $alasanSeminar,
			];
			unset($_SESSION["seminar_errors"]);
		} else {
			$_SESSION["seminar_errors"] = $errorsSeminar;
		}

		header("Location: index.php#seminar");
		exit;
	}

	// Menyimpan setiap nilai formulir ke dalam session secara terpisah.
	$_SESSION["nama"] = $nama;
	$_SESSION["email"] = $email;
	$_SESSION["semester"] = $semesterForm;
	$_SESSION["tanggal"] = $tanggal;
	$_SESSION["jenis_pesan"] = $jenisPesan;
	$_SESSION["minat"] = $minat;
	$_SESSION["prodi"] = $prodi;
	$_SESSION["pesan"] = $pesan;

	// PRG: mencegah pengiriman POST berulang ketika halaman dimuat ulang.
	header("Location: index.php#contact");
	exit;
}

// Mengamankan data sebelum ditampilkan kembali ke halaman HTML.
// P6: PHP dasar dan pemrograman sisi peladen
// Bagian 1: Variabel dan konstanta
$nim = "0344300002";
$namaMahasiswa = "Cantika Putih";
$programStudi = "SI";
$tahunAkademik = "2026/2027";
$semester = 4;
$ipk = 3.75;
$statusAktif = true;
$catatanTambahan = null;

const NAMA_MATA_KULIAH = "Pemrograman Web Dasar";
const PROFIL_GITHUB = "satpamal";

// Bagian 2: Operator
$batasSemester = 8;
$sisaSemester = $batasSemester - $semester;
$semesterValid = $semester >= 1 && $semester <= $batasSemester;
$statusSemester = ($semesterValid && $statusAktif) ? "Sesuai rentang" : "Perlu diperiksa";

// Bagian 3: Percabangan if-elseif-else
if ($semester < 3) {
	$keteranganSemester = "Semester awal";
} elseif ($semester <= 6) {
	$keteranganSemester = "Semester menengah";
} else {
	$keteranganSemester = "Semester akhir";
}

$namaProdi = ($programStudi == "SI") ? "Sistem Informasi" : (($programStudi == "TI") ? "Teknik Informatika" : "Lainnya");

// Bagian 4: Percabangan switch-case-default
switch ($programStudi) {
	case "SI":
		$fokusProgramStudi = "Sistem informasi dan proses bisnis";
		break;
	case "TI":
		$fokusProgramStudi = "Komputasi dan pengembangan perangkat lunak";
		break;
	default:
		$fokusProgramStudi = "Belum ditentukan";
}
?>
<!doctype html>
<html lang="id">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Profil Mahasiswa</title>
	<link rel="stylesheet" href="style.css" />
</head>

<body>
	<header>
		<div class="header-top">
			<h1>Profil Mahasiswa</h1>

			<button
				class="nav-toggle"
				id="navToggle"
				type="button"
				aria-label="Buka navigasi"
				aria-controls="navMenu"
				aria-expanded="false">
				&#9776;
			</button>
		</div>

		<nav>
			<ul id="navMenu">
				<li><a href="#home">Beranda</a></li>
				<li><a href="#about">Tentang</a></li>
				<li><a href="#contact">Kontak</a></li>
				<li><a href="#seminar">Pendaftaran Seminar</a></li>
			</ul>
		</nav>
	</header>

	<main>
		<section id="home">
			<h2>Selamat Datang</h2>
			<p>Halo, saya <strong><?php echo $namaMahasiswa; ?></strong>. Saya sedang mempelajari matakuliah <strong><?php print NAMA_MATA_KULIAH; ?></strong> pada tahun akademik <?php echo $tahunAkademik; ?>.</p>

			<img src="img/foto-profil.jpg" alt="Foto profil Nama Mahasiswa" />
		</section>

		<section id="about">
			<h2>Tentang Saya</h2>

			<article>
				<h3>Profil Singkat</h3>
				<p>Program Studi: <?php echo $namaProdi . " (" . $programStudi . ")"; ?></p>
				<p>Fokus program studi: <?php echo $fokusProgramStudi; ?></p>
				<p>Status mahasiswa: <?php echo $statusAktif ? "Aktif" : "Tidak aktif"; ?></p>
				<p>Semester: <?php echo $semester . " (" . $keteranganSemester . ")"; ?></p>
				<p>Sisa semester hingga batas: <?php echo $sisaSemester; ?></p>
				<p>Pemeriksaan rentang semester: <?php echo $statusSemester; ?></p>
				<p>IPK: <?php echo number_format($ipk, 2, ',', '.'); ?></p>
				<p>Catatan tambahan: <?php echo $catatanTambahan === null ? "Belum ada" : $catatanTambahan; ?></p>

				<h3>Target Belajar (Perulangan for)</h3>
				<ol>
					<?php
					// Perulangan for tanpa array; materi larik dibahas pada P9.
					for ($i = 1; $i <= 5; $i++) {
						echo "<li>Target belajar ke-" . $i . ": ";
						switch ($i) {
							case 1:
								echo "Memahami sintaks dasar PHP.";
								break;
							case 2:
								echo "Menggunakan variabel dan konstanta.";
								break;
							case 3:
								echo "Menerapkan operator dan percabangan.";
								break;
							case 4:
								echo "Menggunakan perulangan for dan while.";
								break;
							default:
								echo "Belum dipetakan";
								break;
						}
						echo "</li>";
					}
					?>
				</ol>

				<h3>Semester (Perulangan while):</h3>
				<ol>
					<?php
					$nomorSemester = 1;
					while ($nomorSemester <= 3) {
						echo "<li>Semester " . $nomorSemester . "</li>";
						$nomorSemester++; // operator penugasan
					}
					?>
				</ol>
			</article>
		</section>

		<section id="contact">
			<h2>Kontak</h2>

			<p>
				Kunjungi
				<a target="_blank" href="https://github.com/<?= PROFIL_GITHUB ?>">profil GitHub saya</a>.
			</p>

			<form id="contactForm" class="js-contact-form" data-validation="contact" action="index.php" method="post" novalidate>
				<input type="hidden" name="form_type" value="contact" />
				<div class="form-group">
					<label for="nama">Nama Lengkap</label><br />

					<input
						class="input-form"
						type="text"
						id="nama"
						name="nama"
						placeholder="Masukkan nama lengkap"
						minlength="3"
						maxlength="50"
						required />
				</div>

				<div class="form-group">
					<label for="email">Email</label><br />

					<input class="input-form" type="email" id="email" name="email" placeholder="nama@email.com" required />
				</div>

				<div class="form-group">
					<label for="semester">Semester</label><br />

					<input class="input-form" type="number" id="semester" name="semester" min="1" max="14" required />
				</div>

				<div class="form-group">
					<label for="tanggal">Tanggal Kunjungan</label><br />

					<input class="input-form" type="date" id="tanggal" name="tanggal" required />
				</div>

				<div class="form-group">
					<p>Jenis Pesan</p>

					<input type="radio" id="pertanyaan" name="jenis_pesan" value="pertanyaan" required />
					<label for="pertanyaan">Pertanyaan</label>

					<input type="radio" id="saran" name="jenis_pesan" value="saran" />
					<label for="saran">Saran</label>
				</div>

				<div class="form-group">
					<p>Topik yang Diminati</p>

					<input type="checkbox" id="minat-html" name="minat[]" value="HTML" />
					<label for="minat-html">HTML</label>

					<input type="checkbox" id="minat-css" name="minat[]" value="CSS" />
					<label for="minat-css">CSS</label>
				</div>

				<div class="form-group">
					<label for="prodi">Program Studi</label><br />

					<select class="input-form" id="prodi" name="prodi" required>
						<option value="">-- Pilih Program Studi --</option>
						<option value="SI">Sistem Informasi</option>
						<option value="TI">Teknik Informatika</option>
					</select>
				</div>

				<div class="form-group">
					<label for="pesan">Pesan</label><br />

					<textarea
						class="input-form"
						id="pesan"
						name="pesan"
						maxlength="300"
						placeholder="Tulis pesan Anda"
						required></textarea>
				</div>

				<button type="submit">Kirim</button>
				<button type="reset">Batal</button>
				<p class="form-feedback" data-form-feedback aria-live="polite"></p>
			</form>

			<?php if (isset($_SESSION["nama"])): ?>
				<article id="hasilKontak" class="submission-result" aria-live="polite">
					<h3>Data Formulir yang Dikirim</h3>
					<p><strong>Nama Lengkap:</strong> <?= htmlspecialchars($_SESSION["nama"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Email:</strong> <?= htmlspecialchars($_SESSION["email"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Semester:</strong> <?= htmlspecialchars($_SESSION["semester"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Tanggal Kunjungan:</strong> <?= htmlspecialchars($_SESSION["tanggal"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Jenis Pesan:</strong> <?= htmlspecialchars($_SESSION["jenis_pesan"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Topik yang Diminati:</strong>
						<?= htmlspecialchars(implode(", ", $_SESSION["minat"] ?? []), ENT_QUOTES, "UTF-8") ?>
					</p>
					<p><strong>Program Studi:</strong> <?= htmlspecialchars($_SESSION["prodi"] ?? "", ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Pesan:</strong> <?= nl2br(htmlspecialchars($_SESSION["pesan"] ?? "", ENT_QUOTES, "UTF-8")) ?></p>
				</article>
			<?php endif; ?>
		</section>

		<section id="seminar">
			<h2>Pendaftaran Seminar Teknologi</h2>

			<form id="seminarForm" class="js-seminar-form" action="index.php" method="post" novalidate>
				<input type="hidden" name="form_type" value="seminar" />

				<div class="form-group">
					<label for="nama_peserta">Nama Peserta</label><br />
					<input class="input-form" type="text" id="nama_peserta" name="nama_peserta" placeholder="Masukkan nama peserta" minlength="3" maxlength="50" required />
				</div>

				<div class="form-group">
					<label for="nim_peserta">NIM</label><br />
					<input class="input-form" type="text" id="nim_peserta" name="nim_peserta" placeholder="Masukkan NIM (contoh: 211510008)" pattern="[0-9]{8,12}" maxlength="12" required />
				</div>

				<div class="form-group">
					<label for="prodi_peserta">Program Studi</label><br />
					<select class="input-form" id="prodi_peserta" name="prodi_peserta" required>
						<option value="">-- Pilih Program Studi --</option>
						<option value="SI">Sistem Informasi</option>
						<option value="TI">Teknik Informatika</option>
					</select>
				</div>

				<div class="form-group">
					<label for="pilihan_seminar">Pilihan Seminar</label><br />
					<select class="input-form" id="pilihan_seminar" name="pilihan_seminar" required>
						<option value="">-- Pilih Topik Seminar --</option>
						<option value="Artificial Intelligence">Artificial Intelligence</option>
						<option value="Web Development">Web Development</option>
						<option value="Cyber Security">Cyber Security</option>
						<option value="Data Analytics">Data Analytics</option>
					</select>
				</div>

				<div class="form-group">
					<label for="alasan_seminar">Alasan Mengikuti Seminar</label><br />
					<textarea class="input-form" id="alasan_seminar" name="alasan_seminar" minlength="10" maxlength="300" placeholder="Tuliskan alasan Anda mengikuti seminar ini" required></textarea>
				</div>

				<button type="submit">Kirim</button>
				<button type="reset">Batal</button>
				<p id="seminarFeedback" class="form-feedback" aria-live="polite"></p>
			</form>

			<?php if (!empty($_SESSION["seminar_errors"])): ?>
				<article class="submission-result" aria-live="polite">
					<h3>Terjadi Kesalahan Input:</h3>
					<ul>
						<?php foreach ($_SESSION["seminar_errors"] as $err): ?>
							<li><?= htmlspecialchars($err, ENT_QUOTES, "UTF-8") ?></li>
						<?php endforeach; ?>
					</ul>
				</article>
				<?php unset($_SESSION["seminar_errors"]); ?>
			<?php endif; ?>

			<?php if (isset($_SESSION["seminar_data"])): ?>
				<?php $seminarData = $_SESSION["seminar_data"]; ?>
				<article id="hasilSeminar" class="submission-result" aria-live="polite">
					<h3>Data Pendaftaran Seminar Berhasil Dikirim</h3>
					<p><strong>Nama Peserta:</strong> <?= htmlspecialchars($seminarData["nama_peserta"], ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>NIM:</strong> <?= htmlspecialchars($seminarData["nim_peserta"], ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Program Studi:</strong> <?= htmlspecialchars($seminarData["prodi_peserta"], ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Pilihan Seminar:</strong> <?= htmlspecialchars($seminarData["pilihan_seminar"], ENT_QUOTES, "UTF-8") ?></p>
					<p><strong>Alasan Mengikuti Seminar:</strong> <?= nl2br(htmlspecialchars($seminarData["alasan_seminar"], ENT_QUOTES, "UTF-8")) ?></p>
				</article>
			<?php endif; ?>
		</section>
	</main>

	<footer>
		<p>&copy; <?= date("Y") ?> <?php echo $namaMahasiswa; ?> [<?= $nim ?>]</p>
	</footer>
	<script src="script.js"></script>
</body>

</html>