USE webkel_riko;

INSERT INTO users
(
    nama,
    username,
    password,
    role,
    email,
    is_active,
    foto
)
VALUES
(
    'Administrator',
    'admin',
    '$2a$12$mO5/Q1gOSx6563N02lYFOucAOpuuDm9Rlw3AMYUtnBRKvGbcx9QBi',
    'superadmin',
    'admin@kelurahanriko.id',
    TRUE,
    NULL
);


INSERT INTO kontak
(
    alamat,
    email,
    telepon,
    whatsapp,
    maps,
    latitude,
    longitude,
    jam_operasional,
    instagram,
    facebook,
    youtube,
    tiktok,
    website
)
VALUES
(
    'Jl. Ahmad Yani Km.029 RT.02 Kelurahan Riko Kecamatan Penajam Kabupaten Penajam Paser Utara',

    'kelurahan.riko@gmail.com',

    '085247008536',

    '085247008536',

    'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1007.6481029752855!2d116.63125086956566!3d-1.1318050999285811!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df1338819fda001%3A0x74ed46c22c4b3cef!2sKantor%20Lurah%20Riko!5e1!3m2!1sen!2sid!4v1784516134864!5m2!1sen!2sid',

    -1.13180510,

    116.63125087,

    'Senin - Jumat : 08.00 - 16.00',

    'https://www.instagram.com/officialkelurahan.riko',

    NULL,

    NULL,

    NULL,

    NULL
);


INSERT INTO settings
(
    site_name,
    tagline,
    logo,
    favicon,
    hero_title,
    hero_subtitle,
    footer,
    copyright,
    meta_title,
    meta_description,
    meta_keywords,
    maintenance_mode
)
VALUES
(
    'Kelurahan Riko',

    'Melayani dengan Hati dan Integritas',

    'storage/uploads/logo/logo-kelurahan.jpg',

    'storage/uploads/logo/favicon.ico',

    'Selamat Datang di Website Kelurahan Riko',

    'Mari bergabung demi masyarakat cerdas, berkarakter, dan berdaya saing tinggi.',

    'Kelurahan Riko Kabupaten Penajam Paser Utara',

    '© 2026 Kelurahan Riko',

    'Website Resmi Kelurahan Riko',

    'Website resmi Kelurahan Riko Kabupaten Penajam Paser Utara.',

    'kelurahan,riko,ppu,pelayanan,pemerintah',

    FALSE
);


INSERT INTO banner
(
    judul,
    subjudul,
    desktop_image,
    mobile_image,
    button_text,
    button_link,
    urutan,
    status
)
VALUES
(
    'Selamat Datang',

    'Website Resmi Kelurahan Riko',

    'storage/uploads/banner/banner-desktop.jpg',

    'storage/uploads/banner/banner-mobile.jpg',

    'Lihat Pelayanan',

    '#pelayanan',

    1,

    'aktif'
);


INSERT INTO profil
(
    judul,
    isi,
    gambar
)
VALUES
(
    'Profil Kelurahan Riko',

    'Kelurahan Riko merupakan salah satu kelurahan di wilayah Kecamatan Penajam, Kabupaten Penajam Paser Utara, Kalimantan Timur. Kelurahan ini memiliki potensi sumber daya manusia dan alam yang cukup besar, serta berkomitmen dalam membangun pelayanan publik yang berkualitas. Dengan partisipasi aktif masyarakat, Kelurahan Riko terus mengembangkan potensi lokal menuju kelurahan yang mandiri, sejahtera, dan berdaya saing.',

    'storage/uploads/profil/kantor.jpeg'
);


INSERT INTO visi_misi
(
    jenis,
    isi,
    urutan
)
VALUES
(
    'visi',

    'Terwujudnya Kelurahan Riko yang Mandiri, Sejahtera, dan Berdaya Saing.',

    1
);


INSERT INTO visi_misi
(
    jenis,
    isi,
    urutan
)
VALUES

(
    'misi',

    'Meningkatkan kualitas pelayanan publik.',

    1
),

(
    'misi',

    'Mendorong pertumbuhan ekonomi melalui UMKM.',

    2
),

(
    'misi',

    'Memperkuat gotong royong dan budaya lokal.',

    3
),

(
    'misi',

    'Meningkatkan sarana dan prasarana lingkungan.',

    4
);


INSERT INTO kategori_berita
(
    nama,
    slug
)
VALUES
('Kegiatan','kegiatan'),
('Pengumuman','pengumuman'),
('Pembangunan','pembangunan'),
('UMKM','umkm');


INSERT INTO berita
(
    kategori_id,
    user_id,
    judul,
    slug,
    excerpt,
    isi,
    thumbnail,
    status,
    featured,
    published_at
)
VALUES
(
    1,
    1,
    'Bantuan Penyerahan',
    'bantuan-penyerahan',
    'Kegiatan bantuan untuk masyarakat sekitar Kelurahan Riko.',

    'Kelurahan Riko melaksanakan kegiatan penyerahan bantuan kepada masyarakat sebagai bentuk kepedulian pemerintah terhadap warga yang membutuhkan. Kegiatan berlangsung dengan tertib dan mendapat antusiasme masyarakat.',

    'storage/uploads/berita/bantuan.jpg',

    'published',

    TRUE,

    NOW()
),

(
    1,
    1,
    'Sosialisasi SP4N LAPOR',
    'sosialisasi-sp4n-lapor',
    'Warga mengikuti kegiatan sosialisasi layanan pengaduan.',

    'Kelurahan Riko mengadakan sosialisasi penggunaan aplikasi SP4N LAPOR agar masyarakat lebih mudah menyampaikan aspirasi maupun pengaduan kepada pemerintah.',

    'storage/uploads/berita/sp4n.jpg',

    'published',

    FALSE,

    NOW()
),

(
    3,
    1,
    'Penanaman Bibit Buah',
    'penanaman-bibit-buah',
    'Aksi penanaman bibit buah sebagai bagian dari program penghijauan.',

    'Pemerintah Kelurahan bersama masyarakat melaksanakan penanaman bibit buah sebagai upaya menjaga kelestarian lingkungan dan meningkatkan ruang hijau.',

    'storage/uploads/berita/bibit.jpg',

    'published',

    FALSE,

    NOW()
);


INSERT INTO jabatan
(
    nama,
    urutan
)
VALUES

('Lurah',1),

('Sekretaris Lurah',2),

('Kasi PM-Kessos',3),

('Kasi Tapem',4),

('Kasi PPSDA',5),

('Staf',6),

('Sopir Ambulance',7);


INSERT INTO pegawai
(
    jabatan_id,
    nama,
    foto
)
VALUES

(
    1,
    'Juliansyah, S.T',
    NULL
),

(
    2,
    'Wulandari, S.Sos',
    'storage/uploads/pegawai/wulandari.jpeg'
),

(
    5,
    'Herniwati, S.IP',
    'storage/uploads/pegawai/herniwati.jpeg'
),

(
    4,
    'Nursanti, S.Sos',
    NULL
),

(
    3,
    'Sudirman, A.Md Kom',
    'storage/uploads/pegawai/sudir.jpg'
),

(
    6,
    'Nopita Sarah',
    'storage/uploads/pegawai/sarah.jpeg'
),

(
    6,
    'Saiyah',
    'storage/uploads/pegawai/saiyah.jpeg'
),

(
    6,
    'Abdul Kasdin, A.Md Kom',
    'storage/uploads/pegawai/abdul-kasdin.jpeg'
),

(
    6,
    'Jumiati, S.H',
    'storage/uploads/pegawai/jumiati.jpeg'
),

(
    6,
    'Eko Waldy',
    'storage/uploads/pegawai/eko-waldy.jpg'
),

(
    6,
    'Adam',
    'storage/uploads/pegawai/adam.jpeg'
),

(
    6,
    'Sainah, S.Kom',
    'storage/uploads/pegawai/sainah.jpeg'
),

(
    6,
    'Hamdi',
    'storage/uploads/pegawai/hamdi.jpeg'
),

(
    6,
    'Nurdin, S.Pd',
    'storage/uploads/pegawai/nurdin.jpeg'
),

(
    7,
    'Ahmat Saili',
    NULL
);


INSERT INTO fasilitas
(
    nama,
    deskripsi
)
VALUES

(
    'Ruang Rapat',
    'Ruang rapat yang digunakan untuk musyawarah, koordinasi, dan kegiatan pemerintahan Kelurahan Riko.'
),

(
    'Ruang Pelayanan Umum',
    'Ruang pelayanan administrasi masyarakat yang nyaman dan mudah diakses.'
),

(
    'Rooftop',
    'Area terbuka yang digunakan untuk berbagai kegiatan dan dokumentasi.'
),

(
    'Ruang Tunggu',
    'Ruang tunggu masyarakat yang dilengkapi kursi dan fasilitas pendukung.'
),

(
    'Pojok Baca',
    'Fasilitas literasi bagi masyarakat yang menyediakan berbagai bacaan.'
);


INSERT INTO fasilitas_foto
(
    fasilitas_id,
    gambar
)
VALUES

(
    1,
    'storage/uploads/fasilitas/ruang-rapat.jpeg'
),

(
    2,
    'storage/uploads/fasilitas/ruang-pelayanan-umum.jpeg'
),

(
    3,
    'storage/uploads/fasilitas/rooftop.jpeg'
),

(
    4,
    'storage/uploads/fasilitas/ruang-tunggu.jpeg'
),

(
    5,
    'storage/uploads/fasilitas/pojok-baca.jpeg'
);


INSERT INTO pelayanan
(
    nama,
    slug,
    deskripsi,
    jam_pelayanan,
    icon
)
VALUES

(
    'Surat Domisili',
    'surat-domisili',
    'Pelayanan penerbitan surat keterangan domisili bagi masyarakat Kelurahan Riko.',
    'Senin - Jumat 08.00 - 15.00',
    'fa-house'
),

(
    'Surat Keterangan Usaha',
    'surat-keterangan-usaha',
    'Pelayanan penerbitan Surat Keterangan Usaha (SKU).',
    'Senin - Jumat 08.00 - 15.00',
    'fa-store'
),

(
    'Surat Pengantar SKCK',
    'surat-pengantar-skck',
    'Pelayanan surat pengantar untuk pembuatan SKCK.',
    'Senin - Jumat 08.00 - 15.00',
    'fa-id-card'
),

(
    'Surat Keterangan Tidak Mampu',
    'surat-keterangan-tidak-mampu',
    'Pelayanan penerbitan Surat Keterangan Tidak Mampu.',
    'Senin - Jumat 08.00 - 15.00',
    'fa-file'
);


INSERT INTO persyaratan_pelayanan
(
    pelayanan_id,
    persyaratan,
    urutan
)
VALUES

(1,'Fotokopi KTP',1),
(1,'Fotokopi KK',2),

(2,'Fotokopi KTP',1),
(2,'Fotokopi KK',2),

(3,'Fotokopi KTP',1),
(3,'Fotokopi KK',2),

(4,'Fotokopi KTP',1),
(4,'Fotokopi KK',2);


INSERT INTO dokumen_pelayanan
(
    pelayanan_id,
    nama_dokumen,
    file
)
VALUES

(
    1,
    'Form Surat Domisili',
    'storage/uploads/dokumen/form-domisili.pdf'
),

(
    2,
    'Form Surat Keterangan Usaha',
    'storage/uploads/dokumen/form-sku.pdf'
),

(
    3,
    'Form Pengantar SKCK',
    'storage/uploads/dokumen/form-skck.pdf'
),

(
    4,
    'Form Surat Keterangan Tidak Mampu',
    'storage/uploads/dokumen/form-sktm.pdf'
);


INSERT INTO download
(
    judul,
    kategori,
    deskripsi,
    ukuran_file,
    ekstensi,
    file
)
VALUES

(
    'Form Surat Domisili',
    'Formulir',
    'Formulir permohonan Surat Domisili.',
    '250 KB',
    'pdf',
    'storage/uploads/download/form-domisili.pdf'
),

(
    'Form Surat Keterangan Usaha',
    'Formulir',
    'Formulir permohonan Surat Keterangan Usaha.',
    '245 KB',
    'pdf',
    'storage/uploads/download/form-sku.pdf'
),

(
    'Form Pengantar SKCK',
    'Formulir',
    'Formulir pengantar pembuatan SKCK.',
    '220 KB',
    'pdf',
    'storage/uploads/download/form-skck.pdf'
),

(
    'Form Surat Keterangan Tidak Mampu',
    'Formulir',
    'Formulir permohonan Surat Keterangan Tidak Mampu.',
    '230 KB',
    'pdf',
    'storage/uploads/download/form-sktm.pdf'
);



INSERT INTO album_galeri
(
    nama,
    slug
)
VALUES

(
    'Kegiatan Kelurahan',
    'kegiatan-kelurahan'
),

(
    'Fasilitas Kelurahan',
    'fasilitas-kelurahan'
),

(
    'Pelayanan Masyarakat',
    'pelayanan-masyarakat'
);


INSERT INTO galeri
(
    album_id,
    judul,
    caption,
    gambar
)
VALUES

(
    1,
    'Penyerahan Bantuan',
    'Kegiatan penyerahan bantuan kepada masyarakat Kelurahan Riko.',
    'storage/uploads/galeri/bantuan.jpg'
),

(
    1,
    'Sosialisasi SP4N LAPOR',
    'Sosialisasi penggunaan layanan SP4N LAPOR.',
    'storage/uploads/galeri/sp4n.jpg'
),

(
    1,
    'Penanaman Bibit Buah',
    'Program penghijauan bersama masyarakat.',
    'storage/uploads/galeri/bibit.jpg'
),

(
    2,
    'Ruang Pelayanan',
    'Fasilitas ruang pelayanan masyarakat.',
    'storage/uploads/fasilitas/ruang-pelayanan-umum.jpeg'
),

(
    2,
    'Ruang Rapat',
    'Ruang rapat Kelurahan Riko.',
    'storage/uploads/fasilitas/ruang-rapat.jpeg'
),

(
    2,
    'Rooftop',
    'Area rooftop Kelurahan.',
    'storage/uploads/fasilitas/rooftop.jpeg'
),

(
    2,
    'Ruang Tunggu',
    'Ruang tunggu masyarakat.',
    'storage/uploads/fasilitas/ruang-tunggu.jpeg'
),

(
    2,
    'Pojok Baca',
    'Fasilitas pojok baca.',
    'storage/uploads/fasilitas/pojok-baca.jpeg'
),

(
    3,
    'Pelayanan Administrasi',
    'Pelayanan administrasi kepada masyarakat.',
    'storage/uploads/galeri/pelayanan.jpg'
);


INSERT INTO agenda
(
    judul,
    slug,
    deskripsi,
    lokasi,
    tanggal_mulai,
    tanggal_selesai,
    thumbnail,
    status
)
VALUES

(
    'Gotong Royong Kelurahan',
    'gotong-royong-kelurahan',
    'Kegiatan gotong royong membersihkan lingkungan bersama masyarakat.',
    'Kantor Kelurahan Riko',
    '2026-08-10 08:00:00',
    '2026-08-10 11:00:00',
    'storage/uploads/agenda/gotongroyong.jpg',
    'akan_datang'
),

(
    'Sosialisasi SP4N LAPOR',
    'sosialisasi-sp4n-lapor',
    'Sosialisasi penggunaan layanan SP4N LAPOR kepada masyarakat.',
    'Aula Kelurahan Riko',
    '2026-08-15 09:00:00',
    '2026-08-15 11:30:00',
    'storage/uploads/agenda/sp4n.jpg',
    'akan_datang'
),

(
    'Pelayanan Administrasi Keliling',
    'pelayanan-administrasi-keliling',
    'Pelayanan administrasi langsung ke lingkungan warga.',
    'RT 02 Kelurahan Riko',
    '2026-08-20 08:30:00',
    '2026-08-20 12:00:00',
    'storage/uploads/agenda/pelayanan.jpg',
    'akan_datang'
),

(
    'Peringatan HUT RI',
    'peringatan-hut-ri',
    'Kegiatan memperingati Hari Kemerdekaan Republik Indonesia.',
    'Lapangan Kelurahan Riko',
    '2026-08-17 07:00:00',
    '2026-08-17 12:00:00',
    'storage/uploads/agenda/hutri.jpg',
    'akan_datang'
);