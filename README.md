# Website Kelurahan Riko

Struktur project ini dirapikan dari file `webkel.php` / `webkel.html` asli
menjadi project PHP dengan pemisahan data, layout, dan tampilan supaya
lebih mudah dikembangkan.

## Struktur folder

```
webkel_riko/
├── includes/
│   ├── config.php     -> semua data situs (nama, alamat, daftar anggota, berita, dll)
│   ├── functions.php  -> helper kecil (escaping output)
│   ├── header.php     -> <head>, header banner, navigasi
│   └── footer.php     -> footer + penutup halaman
├── partials/
│   ├── profil.php
│   ├── visi-misi.php
│   ├── berita.php
│   ├── fasilitas.php
│   ├── anggota.php
│   └── kontak.php
├── public/                 <- ini "document root" yang dijalankan server
│   ├── index.php            (entry point, merangkai semua partial di atas)
│   └── assets/images/
│       ├── logo/
│       ├── fasilitas/
│       └── staf/
└── README.md
```

`includes/` sengaja diletakkan **di luar** `public/` supaya file data/config
tidak bisa diakses langsung lewat browser — hanya `public/index.php` yang
jadi pintu masuk.

## Cara menjalankan di local server

Butuh PHP terinstall (cek dengan `php -v` di terminal). Kalau belum ada,
install dulu (Windows: https://windows.php.net/download/, lalu tambahkan ke PATH).

1. Buka terminal/Command Prompt, masuk ke folder project ini:
   ```
   cd path/ke/webkel_riko
   ```
2. Jalankan built-in server PHP, arahkan document root ke folder `public`:
   ```
   php -S localhost:8000 -t public
   ```
3. Buka browser ke:
   ```
   http://localhost:8000
   ```

## Kalau mau ubah konten

- Ganti nama, alamat, kontak, atau daftar berita/anggota → edit `includes/config.php` saja, tidak perlu sentuh file tampilan.
- Ganti urutan atau tambah section baru → edit `public/index.php` dan tambah file baru di `partials/`.
- Tambah/ganti foto → taruh di `public/assets/images/...` lalu update path-nya di `config.php`.

## Catatan

- Beberapa anggota (Lurah, Kasi Tapem, Sopir Ambulance) belum ada foto yang
  cocok di file zip yang dikirim, jadi ditampilkan pakai avatar placeholder
  daripada memakai foto orang lain yang salah (ini terjadi di draft HTML lama).
- File Windows seperti `desktop.ini` dan `*.lnk` dari zip asli tidak disertakan karena bukan bagian dari website.
