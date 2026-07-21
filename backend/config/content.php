<?php

$site = [
    'nama'    => 'Kelurahan Riko',
    'tagline' => 'Melayani dengan Hati dan Integritas',
    'salam'   => 'Mari bergabung demi masyarakat cerdas, berkarakter, dan berdaya saing tinggi.',
    'alamat'  => 'JL. Ahmad Yani Km.029 Rt.02 Kelurahan Riko Kec. Penajam Kab. PPU',
    'email'   => 'Kelurahan.riko@gmail.com',
    'telepon' => '0852-4700-8536',
    'logo'    => ASSET_URL . '/images/logo/logo-kelurahan.jpg',
];

$social_media = [
    'Instagram'  => 'https://www.instagram.com/officialkelurahan.riko',
    'SP4N Lapor' => '#',
];

$menu = [
    ['label' => 'Profil',        'href' => '#profil'],
    ['label' => 'Visi & Misi',   'href' => '#visi-misi'],
    ['label' => 'Berita',        'href' => '#berita'],
    ['label' => 'Fasilitas',     'href' => '#fasilitas'],
    ['label' => 'Profil Anggota','href' => '#anggota'],
    ['label' => 'Hubungi Kami',  'href' => '#kontak'],
];

$profil = [
    'judul' => 'Profil Kelurahan Riko',
    'isi'   => 'Kelurahan Riko merupakan salah satu kelurahan di wilayah Kecamatan Penajam, '
              . 'Kabupaten Penajam Paser Utara, Kalimantan Timur. Kelurahan ini memiliki potensi '
              . 'sumber daya manusia dan alam yang cukup besar, serta berkomitmen dalam membangun '
              . 'pelayanan publik yang berkualitas. Dengan partisipasi aktif masyarakat, Kelurahan '
              . 'Riko terus mengembangkan potensi lokal menuju kelurahan yang mandiri, sejahtera, '
              . 'dan berdaya saing.',
    'foto'  => ASSET_URL . '/images/fasilitas/kantor.jpeg',
];

$visi_misi = [
    'visi' => 'Terwujudnya Kelurahan Riko yang Mandiri, Sejahtera, dan Berdaya Saing.',
    'misi' => [
        'Meningkatkan kualitas pelayanan publik.',
        'Mendorong pertumbuhan ekonomi melalui UMKM.',
        'Memperkuat gotong royong dan budaya lokal.',
        'Meningkatkan sarana dan prasarana lingkungan.',
    ],
];

$berita = [
    ['title' => 'Bantuan Penyerahan',       'desc' => 'Kegiatan bantuan untuk masyarakat sekitar Kelurahan Riko.'],
    ['title' => 'Sosialisasi SP4N Lapor',   'desc' => 'Warga mengikuti kegiatan sosialisasi layanan pengaduan.'],
    ['title' => 'Penanaman Bibit Buah',     'desc' => 'Aksi penanaman bibit buah sebagai bagian dari program penyerapan emisi karbon.'],
];

// Foto fasilitas diambil dari folder assets/images/fasilitas
$fasilitas = [
    ['nama' => 'Ruang Rapat',           'foto' => ASSET_URL . '/images/fasilitas/ruang-rapat.jpeg'],
    ['nama' => 'Ruang Pelayanan Umum',  'foto' => ASSET_URL . '/images/fasilitas/ruang-pelayanan-umum.jpeg'],
    ['nama' => 'Rooftop',               'foto' => ASSET_URL . '/images/fasilitas/rooftop.jpeg'],
    ['nama' => 'Ruang Tunggu',          'foto' => ASSET_URL . '/images/fasilitas/ruang-tunggu.jpeg'],
    ['nama' => 'Pojok Baca',            'foto' => ASSET_URL . '/images/fasilitas/pojok-baca.jpeg'],
];

// Foto anggota diambil dari folder assets/images/staf.
// 'foto' => null berarti belum ada foto yang dikirim untuk orang itu,
// jadi tampilan akan pakai avatar placeholder daripada foto orang lain yang salah.
$anggota = [
    ['role' => 'Lurah',                  'name' => 'Juliansyah, S.T',        'foto' => null],
    ['role' => 'Sekretaris Lurah',       'name' => 'Wulandari, S.Sos',       'foto' => ASSET_URL . '/images/staf/wulandari.jpeg'],
    ['role' => 'Kasi PPSDA',             'name' => 'Herniwati, S.IP',        'foto' => ASSET_URL . '/images/staf/herniwati.jpeg'],
    ['role' => 'Kasi Tapem',             'name' => 'Nursanti, S.Sos',        'foto' => null],
    ['role' => 'Kasi PM-Kessos',         'name' => 'Sudirman, A.Md Kom',     'foto' => ASSET_URL . '/images/staf/sudir.jpg'],
    ['role' => 'Staf',                   'name' => 'Nopita Sarah',           'foto' => ASSET_URL . '/images/staf/sarah.jpeg'],
    ['role' => 'Staf Surat Menyurat',    'name' => 'Saiyah',                 'foto' => ASSET_URL . '/images/staf/saiyah.jpeg'],
    ['role' => 'Staf Keuangan',          'name' => 'Abdul Kasdin, A.Md Kom', 'foto' => ASSET_URL . '/images/staf/abdul-kasdin.jpeg'],
    ['role' => 'Staf Keuangan',          'name' => 'Jumiati, S.H',           'foto' => ASSET_URL . '/images/staf/jumiati.jpeg'],
    ['role' => 'Staf Pemerintahan',      'name' => 'Eko Waldy',              'foto' => ASSET_URL . '/images/staf/eko-waldy.jpg'],
    ['role' => 'Staf Pemerintahan',      'name' => 'Adam',                   'foto' => ASSET_URL . '/images/staf/adam.jpeg'],
    ['role' => 'Staf PM-Kessos',         'name' => 'Sainah, S.Kom',          'foto' => ASSET_URL . '/images/staf/sainah.jpeg'],
    ['role' => 'Staf PPSDA',             'name' => 'Hamdi',                  'foto' => ASSET_URL . '/images/staf/hamdi.jpeg'],
    ['role' => 'Staf PPSDA',             'name' => 'Nurdin, S.Pd',           'foto' => ASSET_URL . '/images/staf/nurdin.jpeg'],
    ['role' => 'Sopir Ambulance',        'name' => 'Ahmat Saili',            'foto' => null],
];

$peta_embed = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1007.6481029752855!2d116.63125086956566!3d-1.1318050999285811!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df1338819fda001%3A0x74ed46c22c4b3cef!2sKantor%20Lurah%20Riko!5e1!3m2!1sen!2sid!4v1784516134864!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin';
