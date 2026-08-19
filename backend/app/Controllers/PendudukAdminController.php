<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\PendudukModel;
use App\Models\RtModel;

class PendudukAdminController extends Controller
{
    protected PendudukModel $penduduk;
    protected RtModel $rt;

    public function __construct()
    {
        $this->penduduk = new PendudukModel();
        $this->rt = new RtModel();
    }


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD PENDUDUK
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $data = [
            'pekerjaan'      => $this->penduduk->adminPekerjaan(),
            'pendidikan'     => $this->penduduk->adminPendidikan(),
            'kepalaKeluarga' => $this->penduduk->adminKepalaKeluarga(),
            'rekapitulasi'   => $this->penduduk->adminRekapitulasi(),
            'kkPerRT'        => $this->penduduk->adminKKPerRT(),
            'pendudukPerRT'  => $this->penduduk->adminPendudukPerRT(),
            'umur'           => $this->penduduk->adminUmur(),

            'rt' => $this->rt->allActive(),
        ];

        return $this->adminView('penduduk/index', $data);
    }


    /*
    |--------------------------------------------------------------------------
    | PEKERJAAN
    |--------------------------------------------------------------------------
    */

    public function storePekerjaan()
    {
        $pekerjaan = trim($_POST['pekerjaan'] ?? '');
        $lakiLaki = (int) ($_POST['laki_laki'] ?? 0);
        $perempuan = (int) ($_POST['perempuan'] ?? 0);
        $urutan = (int) ($_POST['urutan'] ?? 0);

        if ($pekerjaan === '') {
            return $this->back('Pekerjaan wajib diisi.');
        }

        if ($lakiLaki < 0 || $perempuan < 0) {
            return $this->back('Jumlah penduduk tidak boleh negatif.');
        }

        $jumlah = $lakiLaki + $perempuan;

        $this->penduduk->createPekerjaan([
            'pekerjaan' => $pekerjaan,
            'laki_laki' => $lakiLaki,
            'perempuan' => $perempuan,
            'jumlah' => $jumlah,
            'urutan' => $urutan,
        ]);

        return $this->success('Data pekerjaan berhasil ditambahkan.');
    }


    public function updatePekerjaan(int $id)
    {
        $pekerjaan = trim($_POST['pekerjaan'] ?? '');
        $lakiLaki = (int) ($_POST['laki_laki'] ?? 0);
        $perempuan = (int) ($_POST['perempuan'] ?? 0);
        $urutan = (int) ($_POST['urutan'] ?? 0);

        if ($pekerjaan === '') {
            return $this->back('Pekerjaan wajib diisi.');
        }

        $jumlah = $lakiLaki + $perempuan;

        $this->penduduk->updatePekerjaan($id, [
            'pekerjaan' => $pekerjaan,
            'laki_laki' => $lakiLaki,
            'perempuan' => $perempuan,
            'jumlah' => $jumlah,
            'urutan' => $urutan,
        ]);

        return $this->success('Data pekerjaan berhasil diperbarui.');
    }


    public function deletePekerjaan(int $id)
    {
        $this->penduduk->deletePekerjaan($id);

        return $this->success('Data pekerjaan berhasil dihapus.');
    }


    /*
    |--------------------------------------------------------------------------
    | PENDIDIKAN
    |--------------------------------------------------------------------------
    */

    public function storePendidikan()
    {
        $pendidikan = trim($_POST['pendidikan'] ?? '');
        $lakiLaki = (int) ($_POST['laki_laki'] ?? 0);
        $perempuan = (int) ($_POST['perempuan'] ?? 0);
        $urutan = (int) ($_POST['urutan'] ?? 0);

        if ($pendidikan === '') {
            return $this->back('Pendidikan wajib diisi.');
        }

        $jumlah = $lakiLaki + $perempuan;

        $this->penduduk->createPendidikan([
            'pendidikan' => $pendidikan,
            'laki_laki' => $lakiLaki,
            'perempuan' => $perempuan,
            'jumlah' => $jumlah,
            'urutan' => $urutan,
        ]);

        return $this->success('Data pendidikan berhasil ditambahkan.');
    }


    public function updatePendidikan(int $id)
    {
        $pendidikan = trim($_POST['pendidikan'] ?? '');
        $lakiLaki = (int) ($_POST['laki_laki'] ?? 0);
        $perempuan = (int) ($_POST['perempuan'] ?? 0);
        $urutan = (int) ($_POST['urutan'] ?? 0);

        if ($pendidikan === '') {
            return $this->back('Pendidikan wajib diisi.');
        }

        $jumlah = $lakiLaki + $perempuan;

        $this->penduduk->updatePendidikan($id, [
            'pendidikan' => $pendidikan,
            'laki_laki' => $lakiLaki,
            'perempuan' => $perempuan,
            'jumlah' => $jumlah,
            'urutan' => $urutan,
        ]);

        return $this->success('Data pendidikan berhasil diperbarui.');
    }


    public function deletePendidikan(int $id)
    {
        $this->penduduk->deletePendidikan($id);

        return $this->success('Data pendidikan berhasil dihapus.');
    }


    /*
    |--------------------------------------------------------------------------
    | KEPALA KELUARGA
    |--------------------------------------------------------------------------
    */

    public function saveKepalaKeluarga()
    {
        $id = isset($_POST['id'])
            ? (int) $_POST['id']
            : 0;

        $kkBulanLalu = max(
            0,
            (int) ($_POST['kk_bulan_lalu'] ?? 0)
        );

        $datang = max(
            0,
            (int) ($_POST['datang'] ?? 0)
        );

        $pindah = max(
            0,
            (int) ($_POST['pindah'] ?? 0)
        );

        $kkBulanIni = $kkBulanLalu + $datang - $pindah;

        if ($kkBulanIni < 0) {
            $kkBulanIni = 0;
        }

        $data = [
            'kk_bulan_lalu' => $kkBulanLalu,
            'datang' => $datang,
            'pindah' => $pindah,
            'kk_bulan_ini' => $kkBulanIni,
        ];

        if ($id > 0) {
            $this->penduduk->updateKepalaKeluarga($id, $data);
        } else {
            $this->penduduk->createKepalaKeluarga($data);
        }

        return $this->success(
            'Data kepala keluarga berhasil disimpan.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | REKAPITULASI
    |--------------------------------------------------------------------------
    */

    public function storeRekapitulasi()
    {
        $keterangan = trim($_POST['keterangan'] ?? '');
        $lakiLaki = (int) ($_POST['laki_laki'] ?? 0);
        $perempuan = (int) ($_POST['perempuan'] ?? 0);
        $urutan = (int) ($_POST['urutan'] ?? 0);

        if ($keterangan === '') {
            return $this->back('Keterangan wajib diisi.');
        }

        $jumlah = $lakiLaki + $perempuan;

        $this->penduduk->createRekapitulasi([
            'keterangan' => $keterangan,
            'laki_laki' => $lakiLaki,
            'perempuan' => $perempuan,
            'jumlah' => $jumlah,
            'urutan' => $urutan,
        ]);

        return $this->success(
            'Data rekapitulasi berhasil ditambahkan.'
        );
    }


    public function updateRekapitulasi(int $id)
    {
        $keterangan = trim($_POST['keterangan'] ?? '');
        $lakiLaki = (int) ($_POST['laki_laki'] ?? 0);
        $perempuan = (int) ($_POST['perempuan'] ?? 0);
        $urutan = (int) ($_POST['urutan'] ?? 0);

        if ($keterangan === '') {
            return $this->back('Keterangan wajib diisi.');
        }

        $jumlah = $lakiLaki + $perempuan;

        $this->penduduk->updateRekapitulasi($id, [
            'keterangan' => $keterangan,
            'laki_laki' => $lakiLaki,
            'perempuan' => $perempuan,
            'jumlah' => $jumlah,
            'urutan' => $urutan,
        ]);

        return $this->success(
            'Data rekapitulasi berhasil diperbarui.'
        );
    }


    public function deleteRekapitulasi(int $id)
    {
        $this->penduduk->deleteRekapitulasi($id);

        return $this->success(
            'Data rekapitulasi berhasil dihapus.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | KK PER RT
    |--------------------------------------------------------------------------
    */

    public function storeKKPerRT()
    {
        $rt = trim($_POST['rt'] ?? '');
        $jumlahKK = max(
            0,
            (int) ($_POST['jumlah_kk'] ?? 0)
        );
        $urutan = max(
            0,
            (int) ($_POST['urutan'] ?? 0)
        );

        if ($rt === '') {
            return $this->back('RT wajib dipilih.');
        }

        $this->penduduk->createKKPerRT([
            'rt' => $rt,
            'jumlah_kk' => $jumlahKK,
            'urutan' => $urutan,
        ]);

        return $this->success(
            'Data KK per RT berhasil ditambahkan.'
        );
    }


    public function updateKKPerRT(int $id)
    {
        $rt = trim($_POST['rt'] ?? '');
        $jumlahKK = max(
            0,
            (int) ($_POST['jumlah_kk'] ?? 0)
        );
        $urutan = max(
            0,
            (int) ($_POST['urutan'] ?? 0)
        );

        if ($rt === '') {
            return $this->back('RT wajib dipilih.');
        }

        $this->penduduk->updateKKPerRT($id, [
            'rt' => $rt,
            'jumlah_kk' => $jumlahKK,
            'urutan' => $urutan,
        ]);

        return $this->success(
            'Data KK per RT berhasil diperbarui.'
        );
    }


    public function deleteKKPerRT(int $id)
    {
        $this->penduduk->deleteKKPerRT($id);

        return $this->success(
            'Data KK per RT berhasil dihapus.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | PENDUDUK PER RT
    |--------------------------------------------------------------------------
    */

    public function storePendudukPerRT()
    {
        $rt = trim($_POST['rt'] ?? '');
        $lakiLaki = max(
            0,
            (int) ($_POST['laki_laki'] ?? 0)
        );
        $perempuan = max(
            0,
            (int) ($_POST['perempuan'] ?? 0)
        );
        $urutan = max(
            0,
            (int) ($_POST['urutan'] ?? 0)
        );

        if ($rt === '') {
            return $this->back('RT wajib dipilih.');
        }

        $jumlah = $lakiLaki + $perempuan;

        $this->penduduk->createPendudukPerRT([
            'rt' => $rt,
            'laki_laki' => $lakiLaki,
            'perempuan' => $perempuan,
            'jumlah' => $jumlah,
            'urutan' => $urutan,
        ]);

        return $this->success(
            'Data penduduk per RT berhasil ditambahkan.'
        );
    }


    public function updatePendudukPerRT(int $id)
    {
        $rt = trim($_POST['rt'] ?? '');
        $lakiLaki = max(
            0,
            (int) ($_POST['laki_laki'] ?? 0)
        );
        $perempuan = max(
            0,
            (int) ($_POST['perempuan'] ?? 0)
        );
        $urutan = max(
            0,
            (int) ($_POST['urutan'] ?? 0)
        );

        if ($rt === '') {
            return $this->back('RT wajib dipilih.');
        }

        $jumlah = $lakiLaki + $perempuan;

        $this->penduduk->updatePendudukPerRT($id, [
            'rt' => $rt,
            'laki_laki' => $lakiLaki,
            'perempuan' => $perempuan,
            'jumlah' => $jumlah,
            'urutan' => $urutan,
        ]);

        return $this->success(
            'Data penduduk per RT berhasil diperbarui.'
        );
    }


    public function deletePendudukPerRT(int $id)
    {
        $this->penduduk->deletePendudukPerRT($id);

        return $this->success(
            'Data penduduk per RT berhasil dihapus.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | KELOMPOK UMUR
    |--------------------------------------------------------------------------
    */

    public function storeUmur()
    {
        $kelompokUmur = trim(
            $_POST['kelompok_umur'] ?? ''
        );

        $jumlah = max(
            0,
            (int) ($_POST['jumlah'] ?? 0)
        );

        $urutan = max(
            0,
            (int) ($_POST['urutan'] ?? 0)
        );

        if ($kelompokUmur === '') {
            return $this->back(
                'Kelompok umur wajib diisi.'
            );
        }

        $this->penduduk->createUmur([
            'kelompok_umur' => $kelompokUmur,
            'jumlah' => $jumlah,
            'urutan' => $urutan,
        ]);

        return $this->success(
            'Data kelompok umur berhasil ditambahkan.'
        );
    }


    public function updateUmur(int $id)
    {
        $kelompokUmur = trim(
            $_POST['kelompok_umur'] ?? ''
        );

        $jumlah = max(
            0,
            (int) ($_POST['jumlah'] ?? 0)
        );

        $urutan = max(
            0,
            (int) ($_POST['urutan'] ?? 0)
        );

        if ($kelompokUmur === '') {
            return $this->back(
                'Kelompok umur wajib diisi.'
            );
        }

        $this->penduduk->updateUmur($id, [
            'kelompok_umur' => $kelompokUmur,
            'jumlah' => $jumlah,
            'urutan' => $urutan,
        ]);

        return $this->success(
            'Data kelompok umur berhasil diperbarui.'
        );
    }


    public function deleteUmur(int $id)
    {
        $this->penduduk->deleteUmur($id);

        return $this->success(
            'Data kelompok umur berhasil dihapus.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RT
    |--------------------------------------------------------------------------
    */

    public function storeRT()
    {
        $nomorRT = trim($_POST['nomor_rt'] ?? '');
        $namaKetua = trim($_POST['nama_ketua'] ?? '');

        $jumlahKK = max(
            0,
            (int) ($_POST['jumlah_kk'] ?? 0)
        );

        $jumlahPenduduk = max(
            0,
            (int) ($_POST['jumlah_penduduk'] ?? 0)
        );

        if ($nomorRT === '') {
            return $this->back('Nomor RT wajib diisi.');
        }

        if ($namaKetua === '') {
            return $this->back('Nama ketua RT wajib diisi.');
        }

        /*
        * Foto
        * Untuk sementara ambil nama file yang dikirim.
        * Proses upload fisik akan kita sesuaikan dengan
        * sistem upload project kamu.
        */
        $foto = null;

        if (
            isset($_FILES['foto']) &&
            $_FILES['foto']['error'] === UPLOAD_ERR_OK
        ) {
            $foto = $this->uploadFotoRT($_FILES['foto']);
        }

        $this->rt->create([
            'nomor_rt' => $nomorRT,
            'nama_ketua' => $namaKetua,
            'foto' => $foto,
            'jumlah_kk' => $jumlahKK,
            'jumlah_penduduk' => $jumlahPenduduk,
        ]);

        return $this->success(
            'Data RT berhasil ditambahkan.'
        );
    }


    public function updateRT(int $id)
    {
        $rt = $this->rt->findById($id);

        if (!$rt) {
            return $this->back('Data RT tidak ditemukan.');
        }

        $nomorRT = trim($_POST['nomor_rt'] ?? '');
        $namaKetua = trim($_POST['nama_ketua'] ?? '');

        $jumlahKK = max(
            0,
            (int) ($_POST['jumlah_kk'] ?? 0)
        );

        $jumlahPenduduk = max(
            0,
            (int) ($_POST['jumlah_penduduk'] ?? 0)
        );

        if ($nomorRT === '') {
            return $this->back('Nomor RT wajib diisi.');
        }

        if ($namaKetua === '') {
            return $this->back('Nama ketua RT wajib diisi.');
        }


        /*
        * Jika admin upload foto baru,
        * foto lama diganti.
        */
        if (
            isset($_FILES['foto']) &&
            $_FILES['foto']['error'] === UPLOAD_ERR_OK
        ) {
            $foto = $this->uploadFotoRT($_FILES['foto']);

            $this->rt->update($id, [
                'nomor_rt' => $nomorRT,
                'nama_ketua' => $namaKetua,
                'foto' => $foto,
                'jumlah_kk' => $jumlahKK,
                'jumlah_penduduk' => $jumlahPenduduk,
            ]);
        } else {

            /*
            * Tidak upload foto baru,
            * sehingga foto lama tetap digunakan.
            */
            $this->rt->updateWithoutPhoto($id, [
                'nomor_rt' => $nomorRT,
                'nama_ketua' => $namaKetua,
                'jumlah_kk' => $jumlahKK,
                'jumlah_penduduk' => $jumlahPenduduk,
            ]);
        }

        return $this->success(
            'Data RT berhasil diperbarui.'
        );
    }


    public function deleteRT(int $id)
    {
        $rt = $this->rt->findById($id);

        if (!$rt) {
            return $this->back('Data RT tidak ditemukan.');
        }

        $this->rt->delete($id);

        return $this->success(
            'Data RT berhasil dihapus.'
        );
    }


    public function restoreRT(int $id)
    {
        $rt = $this->rt->findById($id);

        if (!$rt) {
            return $this->back('Data RT tidak ditemukan.');
        }

        $this->rt->restore($id);

        return $this->success(
            'Data RT berhasil diaktifkan kembali.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | REDIRECT HELPER
    |--------------------------------------------------------------------------
    */

    private function back(string $message)
    {
        $_SESSION['error'] = $message;

        header(
            'Location: ' .
            ($_SERVER['HTTP_REFERER'] ?? '/superadmin/penduduk')
        );

        exit;
    }


    private function success(string $message)
    {
        $_SESSION['success'] = $message;

        header('Location: /superadmin/penduduk');

        exit;
    }
}