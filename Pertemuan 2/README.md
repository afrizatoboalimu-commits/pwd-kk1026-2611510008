# pwd-kk1026-2611510008

pada pertemuan ke-2, saya :

1. saya menyiapkan artefak pertemuan-01 sebagai baseline pertemuan-02, hasilnya pada peretmuan-02 halaman masih sama dengan pertemuan-01
2. menambah formulir pada section#contact, adapun formulir yang ditambahkan belum ada styling.
3. menambahkan style CSS dasar pada section#tentang saya dan kontak, yang di tambahkan adalah ukuran teks, color teks.
4. memisahkan style css dari file index dengan membuat file baru #style.css, lalu mengkonekkan dengan menambahkan tag <link rel="stylesheet" href="style.css" /> di dalam tag head
5. menerapkan model box dengan menabahkan tag berikut pada urutan pertama style css

- {
  box-sizing: border-box;
  }
  lalu di bawahnya menambahkan section #home

6. menambahkan style box, warna,ukuran tulisan, dan jenis tulisan pada bagian header, tag di tambahkan sebelum setction#home pada style css.
7. menambahkan style.css dengan meanambahkan tag pada section#home yang terdiri dari ukuran teks,warna,border
8. menyesuaikan margin pada bagian tentang saya dengan meanambahkan ketentuan berikut #about {
   margin: 0;
   }

#about h2 {
margin-top: 0;
}

#about p {
line-height: 1.5;
}
pada section#about

9. menyesuaikan margin sesuai dengan ketentuan serta menambahkan tag input di dalam section#contact style.css
10. menambahkan style box pada footer yang terdiri dari warna, ukuran teks dan margin
11. melakukan Perataan dengan justify-content dan align-items dengan menambhakan tag nav ul setelah section#header1 serta melakukan Penerapan Flexbox pada Navigasi
12. membuat tata letak dengan mekanisme grid dengan memambhakan tag display ; grid, pada tahap ini belu merubah apapun
13. membuat tata letak satu kolom dengan menambahkan tag grid-template-columns: 1fr; pada section#main
14. membuat tata letak 2 kolom terpisah dengan menambahkan tag "1fr" pada section grid-template-columns: 1fr; pada section#main
15. memgatur ukuran jarak dengan konsep gap dengan menambahkan tag gap: 16px; pada section#main
16. membuat kolom contact menajadi satu row kolom penuh dengan menambhakan tag rid-column: 1 / -1; pada section#contact
