- Aplikasi Manajemen Data Guru dan Siswa -

Tujuan Utama Aplikasi:
Menyediakan sistem sederhana namun efisien untuk mengelola data siswa dan guru di lingkungan sekolah dengan fitur login admin, CRUD data, pencarian, dan ekspor data.

Rencana Pengembangan
🌀 Menggunakan Model RAD (Rapid Application Development)
RAD dibagi menjadi 3 fase utama untuk aplikasi ini, masing-masing dengan deliverable dan sesi feedback sebelum lanjut ke fase berikutnya.

🔁 Iterasi 1: Autentikasi & Manajemen Data Siswa
✅ Fitur:
Login admin (username/password default, validasi sederhana)

CRUD Data Siswa: Tambah, edit, hapus, dan tampilkan data siswa (NIS, nama, kelas, tanggal lahir, alamat, dll)

⚙️ Teknologi:
HTML, CSS, Bootstrap untuk UI

MySQL untuk database

🔁 Iterasi 2: Manajemen Data Guru + Fitur Pencarian

✅ Fitur Tambahan:
CRUD Data Guru (NIP, nama, mata pelajaran, kontak)

Fitur pencarian siswa/guru berdasarkan nama atau ID (NIS/NIP)

Filter berdasarkan kelas atau mata pelajaran (opsional)

🔁 Iterasi 3: Ekspor Data & Dashboard Ringan
✅ Fitur Tambahan:
Export data siswa/guru ke Excel (PHPSpreadsheet) dan PDF (domPDF)

Dashboard mini: Tampilkan total siswa, total guru, grafik mini (misal: chart batang jumlah per kelas/guru)
