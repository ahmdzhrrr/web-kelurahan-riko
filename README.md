# Website Kelurahan Riko

Struktur project ini dirapikan dari file `webkel.php` / `webkel.html` asli
menjadi project PHP dengan pemisahan data, layout, dan tampilan supaya
lebih mudah dikembangkan.

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
   ``'
