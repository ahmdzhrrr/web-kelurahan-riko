<?php

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\AboutController;
use App\Controllers\PelayananController;
use App\Controllers\BeritaController;
use App\Controllers\FasilitasController;
use App\Controllers\PegawaiController;
use App\Controllers\GaleriController;
use App\Controllers\PendudukController;

use App\Controllers\DashboardController;
use App\Controllers\SejarahController;
use App\Controllers\ProfilController;
use App\Controllers\SettingController;
use App\Controllers\ProfilWebsiteController;
use App\Controllers\VisiMisiAdminController;
use App\Controllers\SejarahAdminController;
use App\Controllers\KontakController;
use App\Controllers\PelayananAdminController;
use App\Controllers\BeritaAdminController;
use App\Controllers\GaleriAdminController;
use App\Controllers\FasilitasAdminController;
use App\Controllers\PegawaiAdminController;
use App\Controllers\PendudukAdminController;

return function ($router) {

    /*
    |--------------------------------------------------------------------------
    | WEBSITE PUBLIC
    |--------------------------------------------------------------------------
    */

    $router->get(
        '/',
        [HomeController::class, 'index']
    )->middleware('maintenance');

    $router->get(
        '/tentang/profil',
        [AboutController::class, 'profil']
    )->middleware('maintenance');

    $router->get(
        '/tentang/visi-misi',
        [AboutController::class, 'visiMisi']
    )->middleware('maintenance');

    $router->get(
        '/tentang/sejarah',
        [AboutController::class, 'sejarah']
    )->middleware('maintenance');

    $router->get(
        '/tentang/struktur',
        [PegawaiController::class, 'struktur']
    )->middleware('maintenance');

    $router->get(
        '/tentang/penduduk',
        [PendudukController::class, 'index']
    );

    $router->get(
        '/pegawai',
        [PegawaiController::class, 'index']
    )->middleware('maintenance');

    $router->get(
        '/pelayanan',
        [PelayananController::class, 'index']
    )->middleware('maintenance');

    $router->get(
        '/pelayanan/{slug}',
        [PelayananController::class, 'detail']
    )->middleware('maintenance');

    $router->get(
        '/berita',
        [BeritaController::class, 'index']
    )->middleware('maintenance');

    $router->get(
        '/berita/{slug}',
        [BeritaController::class, 'detail']
    )->middleware('maintenance');

    $router->get(
        '/fasilitas',
        [FasilitasController::class, 'index']
    )->middleware('maintenance');

    $router->get(
        '/galeri',
        [GaleriController::class, 'index']
    )->middleware('maintenance');

    $router->get(
        '/galeri/{slug}',
        [GaleriController::class, 'album']
    )->middleware('maintenance');

    /*
    |--------------------------------------------------------------------------
    | SUPERADMIN AUTH
    |--------------------------------------------------------------------------
    */

    $router->get(
        '/superadmin/login',
        [LoginController::class, 'index']
    )->middleware('guest');

    $router->post(
        '/superadmin/login',
        [LoginController::class, 'login']
    )->middleware('guest');


    /*
    |--------------------------------------------------------------------------
    | SUPERADMIN
    |--------------------------------------------------------------------------
    */

    $router->get(
        '/superadmin/dashboard',
        [DashboardController::class, 'index']
    )->middleware('superadmin');

    $router->post(
        '/superadmin/logout',
        [LoginController::class, 'logout']
    )->middleware('superadmin');


    /*
    |--------------------------------------------------------------------------
    | SUPERADMIN - SEJARAH
    |--------------------------------------------------------------------------
    */

    $router->get(
        '/superadmin/sejarah',
        [SejarahController::class, 'index']
    )->middleware('superadmin');

    $router->post(
        '/superadmin/sejarah/update',
        [SejarahController::class, 'update']
    )->middleware('superadmin');


    /*
    |--------------------------------------------------------------------------
    | SUPERADMIN - PROFIL
    |--------------------------------------------------------------------------
    */

    $router->get(
        '/superadmin/profil',
        [ProfilController::class, 'index']
    )->middleware('superadmin');
    
    $router->post(
        '/superadmin/profil/update',
        [ProfilController::class, 'update']
    )->middleware('superadmin');
    
    $router->post(
        '/superadmin/profil/password',
        [ProfilController::class, 'updatePassword']
    )->middleware('superadmin');

     /*
    |--------------------------------------------------------------------------
    | SUPERADMIN - KELOLA
    |--------------------------------------------------------------------------
    */

    $router->get(
        '/superadmin/settings',
        [SettingController::class, 'index']
    )->middleware('superadmin');
    
    $router->post(
        '/superadmin/settings/update',
        [SettingController::class, 'update']
    )->middleware('superadmin');

    $router->get(
        '/superadmin/profil-website',
        [ProfilWebsiteController::class, 'index']
    )->middleware('superadmin');
    
    $router->post(
        '/superadmin/profil-website/update',
        [ProfilWebsiteController::class, 'update']
    )->middleware('superadmin');

    $router->get(
        '/superadmin/visi-misi',
        [VisiMisiAdminController::class, 'index']
    )->middleware('superadmin');
    
    $router->post(
        '/superadmin/visi-misi/update',
        [VisiMisiAdminController::class, 'updateVisi']
    )->middleware('superadmin');
    
    $router->post(
        '/superadmin/visi-misi/update-misi',
        [VisiMisiAdminController::class, 'updateMisi']
    )->middleware('superadmin');

    $router->get(
        '/superadmin/sejarah',
        [SejarahAdminController::class, 'index']
    )->middleware('superadmin');
    
    $router->post(
        '/superadmin/sejarah/update',
        [SejarahAdminController::class, 'update']
    )->middleware('superadmin');

    $router->get(
        '/superadmin/kontak',
        [KontakController::class, 'index']
    )->middleware('superadmin');
    
    $router->post(
        '/superadmin/kontak/update',
        [KontakController::class, 'update']
    )->middleware('superadmin');

    $router->get(
        '/superadmin/pelayanan',
        [PelayananAdminController::class, 'index']
    )->middleware('superadmin');

    $router->get(
        '/superadmin/pelayanan/create',
        [PelayananAdminController::class, 'create']
    )->middleware('superadmin');

    $router->post(
        '/superadmin/pelayanan/store',
        [PelayananAdminController::class, 'store']
    )->middleware('superadmin');

    $router->get(
        '/superadmin/pelayanan/edit/{id}',
        [PelayananAdminController::class, 'edit']
    )->middleware('superadmin');

    $router->post(
        '/superadmin/pelayanan/update/{id}',
        [PelayananAdminController::class, 'update']
    )->middleware('superadmin');

    $router->post(
        '/superadmin/pelayanan/delete/{id}',
        [PelayananAdminController::class, 'delete']
    )->middleware('superadmin');

    $router->post(
        '/superadmin/pelayanan/{id}/persyaratan/store',
        [PelayananAdminController::class, 'storePersyaratan']
    )->middleware('superadmin');

    $router->post(
        '/superadmin/persyaratan/{id}/update',
        [PelayananAdminController::class, 'updatePersyaratan']
    )->middleware('superadmin');

    $router->post(
        '/superadmin/persyaratan/{id}/delete',
        [PelayananAdminController::class, 'deletePersyaratan']
    )->middleware('superadmin');

    $router
    ->get('/superadmin/berita', [BeritaAdminController::class, 'index'])
    ->middleware('auth')
    ->middleware('superadmin');

    $router
        ->get('/superadmin/berita/create', [BeritaAdminController::class, 'create'])
        ->middleware('auth')
        ->middleware('superadmin');

    $router
        ->post('/superadmin/berita/store', [BeritaAdminController::class, 'store'])
        ->middleware('auth')
        ->middleware('superadmin');

    $router
        ->get('/superadmin/berita/edit/{id}', [BeritaAdminController::class, 'edit'])
        ->middleware('auth')
        ->middleware('superadmin');

    $router
        ->post('/superadmin/berita/update/{id}', [BeritaAdminController::class, 'update'])
        ->middleware('auth')
        ->middleware('superadmin');

    $router
        ->post('/superadmin/berita/delete/{id}', [BeritaAdminController::class, 'delete'])
        ->middleware('auth')
        ->middleware('superadmin');

    $router
        ->post('/superadmin/berita/publish/{id}', [BeritaAdminController::class, 'publish'])
        ->middleware('auth')
        ->middleware('superadmin');

    $router
        ->post('/superadmin/berita/draft/{id}', [BeritaAdminController::class, 'draft'])
        ->middleware('auth')
        ->middleware('superadmin');

    $router
        ->get(
            '/superadmin/galeri',
            [GaleriAdminController::class, 'index']
        )
        ->middleware('auth')
        ->middleware('superadmin');

    $router
        ->get(
            '/superadmin/galeri/create',
            [GaleriAdminController::class, 'create']
        )
        ->middleware('auth')
        ->middleware('superadmin');

    $router
        ->post(
            '/superadmin/galeri/store',
            [GaleriAdminController::class, 'store']
        )
        ->middleware('auth')
        ->middleware('superadmin');

    $router
        ->get(
            '/superadmin/galeri/edit/{id}',
            [GaleriAdminController::class, 'edit']
        )
        ->middleware('auth')
        ->middleware('superadmin');

    $router
        ->post(
            '/superadmin/galeri/update/{id}',
            [GaleriAdminController::class, 'update']
        )
        ->middleware('auth')
        ->middleware('superadmin');

    $router
        ->post(
            '/superadmin/galeri/delete/{id}',
            [GaleriAdminController::class, 'delete']
        )
        ->middleware('auth')
        ->middleware('superadmin');

    $router
        ->get(
            '/superadmin/galeri/{albumId}/foto',
            [GaleriAdminController::class, 'photos']
        )
        ->middleware('auth')
        ->middleware('superadmin');

    $router
        ->get(
            '/superadmin/galeri/{albumId}/foto/create',
            [GaleriAdminController::class, 'createPhoto']
        )
        ->middleware('auth')
        ->middleware('superadmin');

    $router
        ->post(
            '/superadmin/galeri/{albumId}/foto/store',
            [GaleriAdminController::class, 'storePhoto']
        )
        ->middleware('auth')
        ->middleware('superadmin');

    $router
        ->get(
            '/superadmin/galeri/foto/edit/{id}',
            [GaleriAdminController::class, 'editPhoto']
        )
        ->middleware('auth')
        ->middleware('superadmin');

    $router
        ->post(
            '/superadmin/galeri/foto/update/{id}',
            [GaleriAdminController::class, 'updatePhoto']
        )
        ->middleware('auth')
        ->middleware('superadmin');

    $router
        ->post(
            '/superadmin/galeri/foto/delete/{id}',
            [GaleriAdminController::class, 'deletePhoto']
        )
        ->middleware('auth')
        ->middleware('superadmin');

    $router
        ->get(
            '/superadmin/fasilitas',
            [FasilitasAdminController::class, 'index']
        )
        ->middleware('auth')
        ->middleware('superadmin');


    $router
        ->get(
            '/superadmin/fasilitas/create',
            [FasilitasAdminController::class, 'create']
        )
        ->middleware('auth')
        ->middleware('superadmin');


    $router
        ->post(
            '/superadmin/fasilitas/store',
            [FasilitasAdminController::class, 'store']
        )
        ->middleware('auth')
        ->middleware('superadmin');


    $router
        ->get(
            '/superadmin/fasilitas/edit/{id}',
            [FasilitasAdminController::class, 'edit']
        )
        ->middleware('auth')
        ->middleware('superadmin');


    $router
        ->post(
            '/superadmin/fasilitas/update/{id}',
            [FasilitasAdminController::class, 'update']
        )
        ->middleware('auth')
        ->middleware('superadmin');


    $router
        ->post(
            '/superadmin/fasilitas/delete/{id}',
            [FasilitasAdminController::class, 'delete']
        )
        ->middleware('auth')
        ->middleware('superadmin');


    $router
        ->get(
            '/superadmin/fasilitas/{id}/photos',
            [FasilitasAdminController::class, 'photos']
        )
        ->middleware('auth')
        ->middleware('superadmin');


    $router
        ->post(
            '/superadmin/fasilitas/{id}/photos/upload',
            [FasilitasAdminController::class, 'uploadPhoto']
        )
        ->middleware('auth')
        ->middleware('superadmin');


    $router
        ->post(
            '/superadmin/fasilitas/photos/delete/{id}',
            [FasilitasAdminController::class, 'deletePhoto']
        )
        ->middleware('auth')
        ->middleware('superadmin');

        $router
        ->get(
            '/superadmin/pegawai',
            [PegawaiAdminController::class, 'index']
        )
        ->middleware('superadmin');

    $router
        ->get(
            '/superadmin/pegawai/create',
            [PegawaiAdminController::class, 'create']
        )
        ->middleware('superadmin');

    $router
        ->post(
            '/superadmin/pegawai/store',
            [PegawaiAdminController::class, 'store']
        )
        ->middleware('superadmin');

    $router
        ->get(
            '/superadmin/pegawai/edit/{id}',
            [PegawaiAdminController::class, 'edit']
        )
        ->middleware('superadmin');

    $router
        ->post(
            '/superadmin/pegawai/update/{id}',
            [PegawaiAdminController::class, 'update']
        )
        ->middleware('superadmin');

    $router
        ->post(
            '/superadmin/pegawai/delete/{id}',
            [PegawaiAdminController::class, 'delete']
        )
        ->middleware('superadmin');

    $router
        ->get('/superadmin/penduduk',
            [PendudukAdminController::class, 'index']
        );

        $router
        ->post('/superadmin/penduduk/rekapitulasi/store',
            [PendudukAdminController::class, 'storeRekapitulasi']
        );
        
        $router
        ->post('/superadmin/penduduk/rekapitulasi/update/{id}',
            [PendudukAdminController::class, 'updateRekapitulasi']
        );
        
        $router
        ->post('/superadmin/penduduk/rekapitulasi/delete/{id}',
            [PendudukAdminController::class, 'deleteRekapitulasi']
        );

        $router
        ->post('/superadmin/penduduk/pekerjaan/store',
            [PendudukAdminController::class, 'storePekerjaan']
        );
        
        $router
        ->post('/superadmin/penduduk/pekerjaan/update/{id}',
            [PendudukAdminController::class, 'updatePekerjaan']
        );
        
        $router
        ->post('/superadmin/penduduk/pekerjaan/delete/{id}',
            [PendudukAdminController::class, 'deletePekerjaan']
        );

        $router
        ->post('/superadmin/penduduk/pendidikan/store',
            [PendudukAdminController::class, 'storePendidikan']
        );
        
        $router
        ->post('/superadmin/penduduk/pendidikan/update/{id}',
            [PendudukAdminController::class, 'updatePendidikan']
        );
        
        $router
        ->post('/superadmin/penduduk/pendidikan/delete/{id}',
            [PendudukAdminController::class, 'deletePendidikan']
        );

        $router
        ->post('/superadmin/penduduk/kepala-keluarga/save',
            [PendudukAdminController::class, 'saveKepalaKeluarga']
        );

        $router
        ->post('/superadmin/penduduk/kk-rt/store',
            [PendudukAdminController::class, 'storeKKPerRT']
        );
        
        $router
        ->post('/superadmin/penduduk/kk-rt/update/{id}',
            [PendudukAdminController::class, 'updateKKPerRT']
        );
        
        $router
        ->post('/superadmin/penduduk/kk-rt/delete/{id}',
            [PendudukAdminController::class, 'deleteKKPerRT']
        );


        $router
        ->post('/superadmin/penduduk/rt/store',
            [PendudukAdminController::class, 'storePendudukPerRT']
        );

        $router
        ->post('/superadmin/penduduk/rt/update/{id}',
            [PendudukAdminController::class, 'updatePendudukPerRT']
        );

        $router
        ->post('/superadmin/penduduk/rt/delete/{id}',
            [PendudukAdminController::class, 'deletePendudukPerRT']
        );


        $router
        ->post('/superadmin/penduduk/umur/store',
            [PendudukAdminController::class, 'storeUmur']
        );

        $router
        ->post('/superadmin/penduduk/umur/update/{id}',
            [PendudukAdminController::class, 'updateUmur']
        );

        $router
        ->post('/superadmin/penduduk/umur/delete/{id}',
            [PendudukAdminController::class, 'deleteUmur']
        );
};