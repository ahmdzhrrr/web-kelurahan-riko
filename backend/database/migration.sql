CREATE DATABASE IF NOT EXISTS webkel_riko
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE webkel_riko;

SET FOREIGN_KEY_CHECKS = 0;


CREATE TABLE users (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nama VARCHAR(150) NOT NULL,

    username VARCHAR(50) NOT NULL UNIQUE,

    password VARCHAR(255) NOT NULL,

    role VARCHAR(30) NOT NULL DEFAULT 'superadmin',

    email VARCHAR(100) UNIQUE,

    is_active BOOLEAN DEFAULT TRUE,

    remember_token VARCHAR(255),

    foto VARCHAR(255),

    last_login DATETIME NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP

) ENGINE=InnoDB;


CREATE TABLE kontak (

    id INT AUTO_INCREMENT PRIMARY KEY,

    alamat TEXT NOT NULL,

    email VARCHAR(100),

    telepon VARCHAR(30),

    whatsapp VARCHAR(30),

    maps LONGTEXT,

    latitude DECIMAL(10,8),

    longitude DECIMAL(11,8),

    jam_operasional TEXT,

    instagram VARCHAR(255),

    facebook VARCHAR(255),

    youtube VARCHAR(255),

    tiktok VARCHAR(255),

    website VARCHAR(255),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP

) ENGINE=InnoDB;


CREATE TABLE settings (

    id INT AUTO_INCREMENT PRIMARY KEY,

    site_name VARCHAR(150) NOT NULL,

    tagline VARCHAR(255),

    logo VARCHAR(255),

    favicon VARCHAR(255),

    hero_title VARCHAR(255),

    hero_subtitle TEXT,

    footer TEXT,

    copyright VARCHAR(255),

    meta_title VARCHAR(255),

    meta_description TEXT,

    meta_keywords TEXT,

    maintenance_mode BOOLEAN DEFAULT FALSE,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP

) ENGINE=InnoDB;


CREATE TABLE banner (

    id INT AUTO_INCREMENT PRIMARY KEY,

    judul VARCHAR(255) NOT NULL,

    subjudul TEXT,

    desktop_image VARCHAR(255),

    mobile_image VARCHAR(255),

    link VARCHAR(255) DEFAULT NULL,

    urutan INT DEFAULT 0,

    status ENUM('aktif','nonaktif')
        DEFAULT 'aktif',

    button_text VARCHAR(100),

    button_link VARCHAR(255),

    mulai_tayang DATE,

    selesai_tayang DATE,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    deleted_at TIMESTAMP NULL DEFAULT NULL

) ENGINE=InnoDB;


CREATE TABLE profil (

    id INT AUTO_INCREMENT PRIMARY KEY,

    judul VARCHAR(255),

    isi LONGTEXT,

    gambar VARCHAR(255),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP

) ENGINE=InnoDB;


CREATE TABLE visi_misi (

    id INT AUTO_INCREMENT PRIMARY KEY,

    jenis ENUM('visi','misi'),

    isi LONGTEXT,

    urutan INT DEFAULT 0,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP

) ENGINE=InnoDB;


CREATE TABLE kategori_berita (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nama VARCHAR(100) NOT NULL,

    slug VARCHAR(100) UNIQUE,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP

) ENGINE=InnoDB;


CREATE TABLE berita (

    id INT AUTO_INCREMENT PRIMARY KEY,

    meta_title VARCHAR(255),

    meta_description TEXT,

    thumbnail_alt VARCHAR(255),

    kategori_id INT NOT NULL,

    user_id INT NOT NULL,

    judul VARCHAR(255) NOT NULL,

    slug VARCHAR(255) UNIQUE,

    excerpt TEXT,

    isi LONGTEXT NOT NULL,

    thumbnail VARCHAR(255),

    views INT DEFAULT 0,

    is_featured BOOLEAN DEFAULT FALSE,

    status ENUM('draft','published')
        DEFAULT 'draft',

    published_at DATETIME NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,
    
    deleted_at TIMESTAMP NULL DEFAULT NULL

) ENGINE=InnoDB;


CREATE TABLE jabatan (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nama VARCHAR(100) NOT NULL,

    urutan INT DEFAULT 0,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

) ENGINE=InnoDB;


CREATE TABLE pegawai (

    id INT AUTO_INCREMENT PRIMARY KEY,

    jabatan_id INT NOT NULL,

    nama VARCHAR(150) NOT NULL,

    nip VARCHAR(30),

    email VARCHAR(100),

    telepon VARCHAR(30),

    riwayat_pendidikan VARCHAR (50),

    foto VARCHAR(255),

    status ENUM('aktif','nonaktif')
        DEFAULT 'aktif',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,
    
    deleted_at TIMESTAMP NULL DEFAULT NULL

) ENGINE=InnoDB;


CREATE TABLE fasilitas (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nama VARCHAR(150) NOT NULL,

    deskripsi TEXT,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    deleted_at TIMESTAMP NULL DEFAULT NULL

) ENGINE=InnoDB;


CREATE TABLE fasilitas_foto (

    id INT AUTO_INCREMENT PRIMARY KEY,

    fasilitas_id INT NOT NULL,

    gambar VARCHAR(255) NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

) ENGINE=InnoDB;


CREATE TABLE pelayanan (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nama VARCHAR(200) NOT NULL,

    slug VARCHAR(200) UNIQUE,

    deskripsi LONGTEXT,

    jam_pelayanan TEXT,

    icon VARCHAR(255),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    deleted_at TIMESTAMP NULL DEFAULT NULL

) ENGINE=InnoDB;


CREATE TABLE persyaratan_pelayanan (

    id INT AUTO_INCREMENT PRIMARY KEY,

    pelayanan_id INT NOT NULL,

    persyaratan TEXT NOT NULL,

    urutan INT DEFAULT 0,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

) ENGINE=InnoDB;


CREATE TABLE dokumen_pelayanan (

    id INT AUTO_INCREMENT PRIMARY KEY,

    pelayanan_id INT NOT NULL,

    nama_dokumen VARCHAR(255) NOT NULL,

    file VARCHAR(255) NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

) ENGINE=InnoDB;


CREATE TABLE download (

    id INT AUTO_INCREMENT PRIMARY KEY,

    judul VARCHAR(255) NOT NULL,

    kategori VARCHAR(100),

    deskripsi TEXT,

    ukuran_file VARCHAR(20),

    ekstensi VARCHAR(20),

    file VARCHAR(255) NOT NULL,

    jumlah_download INT DEFAULT 0,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP

) ENGINE=InnoDB;


CREATE TABLE album_galeri (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nama VARCHAR(150) NOT NULL,

    slug VARCHAR(150) UNIQUE,

    deskripsi TEXT,

    cover VARCHAR(255),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP

) ENGINE=InnoDB;


CREATE TABLE galeri (

    id INT AUTO_INCREMENT PRIMARY KEY,

    album_id INT NOT NULL,

    judul VARCHAR(255),

    caption TEXT,

    gambar VARCHAR(255) NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    deleted_at TIMESTAMP NULL DEFAULT NULL

) ENGINE=InnoDB;


CREATE TABLE agenda (

    id INT AUTO_INCREMENT PRIMARY KEY,

    judul VARCHAR(255) NOT NULL,

    slug VARCHAR(255) UNIQUE,

    thumbnail VARCHAR(255),

    deskripsi LONGTEXT,

    lokasi VARCHAR(255),

    tanggal_mulai DATETIME,

    tanggal_selesai DATETIME,

    gambar VARCHAR(255),

    status ENUM('akan_datang','berlangsung','selesai')
        DEFAULT 'akan_datang',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,
    
    deleted_at TIMESTAMP NULL DEFAULT NULL

) ENGINE=InnoDB;


CREATE TABLE logs (

    id BIGINT AUTO_INCREMENT PRIMARY KEY,

    user_id INT,

    aktivitas VARCHAR(255) NOT NULL,

    ip_address VARCHAR(45),

    user_agent TEXT,

    url TEXT,

    method VARCHAR(10),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

) ENGINE=InnoDB;


ALTER TABLE berita
ADD CONSTRAINT fk_berita_user
FOREIGN KEY(user_id)
REFERENCES users(id)
ON UPDATE CASCADE
ON DELETE RESTRICT;

ALTER TABLE berita
ADD CONSTRAINT fk_berita_kategori
FOREIGN KEY(kategori_id)
REFERENCES kategori_berita(id)
ON UPDATE CASCADE
ON DELETE RESTRICT;

ALTER TABLE pegawai
ADD CONSTRAINT fk_pegawai_jabatan
FOREIGN KEY(jabatan_id)
REFERENCES jabatan(id)
ON UPDATE CASCADE
ON DELETE RESTRICT;

ALTER TABLE fasilitas_foto
ADD CONSTRAINT fk_fasilitas
FOREIGN KEY(fasilitas_id)
REFERENCES fasilitas(id)
ON UPDATE CASCADE
ON DELETE CASCADE;

ALTER TABLE persyaratan_pelayanan
ADD CONSTRAINT fk_persyaratan
FOREIGN KEY(pelayanan_id)
REFERENCES pelayanan(id)
ON UPDATE CASCADE
ON DELETE CASCADE;

ALTER TABLE dokumen_pelayanan
ADD CONSTRAINT fk_dokumen
FOREIGN KEY(pelayanan_id)
REFERENCES pelayanan(id)
ON UPDATE CASCADE
ON DELETE CASCADE;

ALTER TABLE galeri
ADD CONSTRAINT fk_album
FOREIGN KEY(album_id)
REFERENCES album_galeri(id)
ON UPDATE CASCADE
ON DELETE CASCADE;

ALTER TABLE logs
ADD CONSTRAINT fk_logs
FOREIGN KEY(user_id)
REFERENCES users(id)
ON UPDATE CASCADE
ON DELETE SET NULL;


CREATE INDEX idx_users_username
ON users(username);

CREATE INDEX idx_berita_slug
ON berita(slug);

CREATE INDEX idx_berita_status
ON berita(status);

CREATE INDEX idx_berita_publish
ON berita(published_at);

CREATE INDEX idx_kategori_slug
ON kategori_berita(slug);

CREATE INDEX idx_pelayanan_slug
ON pelayanan(slug);

CREATE INDEX idx_album_slug
ON album_galeri(slug);

CREATE INDEX idx_agenda_slug
ON agenda(slug);

CREATE INDEX idx_pegawai_status
ON pegawai(status);

CREATE INDEX idx_logs_created
ON logs(created_at);

SET FOREIGN_KEY_CHECKS = 1;