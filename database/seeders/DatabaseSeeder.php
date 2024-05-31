<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Acara;
use App\Models\Story;
use App\Models\Ucapan;
use App\Models\Undangan;
use App\Models\mempelaiPria;
use App\Models\documentation;

use App\Models\mempelaiWanita;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Role::create([
            'nRole' => 'Admin'
        ]);
        Role::create([
            'nRole' => 'User'
        ]);

        User::create([
            'username' => 'Zutto24',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'idrole' => 1
        ]);
        User::create([
            'username' => 'Mamat',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345'),
            'idrole' => 2
        ]);

        Undangan::create([
            'judulUndangan' => 'Prewedding',
            'nPanggilPria' => 'Fahrizal ',
            'nPanggilWanita' => 'Aida',
            'idUser' => 2
        ]);

        Undangan::create([
            'judulUndangan' => 'Prewedding',
            'nPanggilPria' => 'Fulan ',
            'nPanggilWanita' => 'Fulani',
            'idUser' => 2
        ]);

        MempelaiPria::create([
            'nmMempelaiPria' => 'Fahrizal Zidan',
            'nmIbu' => 'Waridin',
            'nmBapak' => 'Tutirah',
            'nRekening' => 'bca',
            'noRek' => '3040542832',
            'idUndangan' => 1
        ]);

        MempelaiWanita::create([
            'nmMempelaiWanita' => 'Aida Dwi Widiyanti',
            'nmIbu' => 'Memet Slamet Riyadi',
            'nmBapak' => 'Evi Chusnaeti',
            'nRekening' => 'bca',
            'noRek' => '3040542832',
            'idUndangan' => 1
        ]);

        Documentation::create([
            'fFormalPria' => '',
            'fFormalWanita' => '',
            'fWedding' => '',
            'idUndangan' => 1
        ]);

        Acara::create([
            'namaAcara' => 'AKAD',
            'tglAcara' => Carbon::createFromDate(2024, 10, 4), // (Y, m, d)
            'kecamatan' => 'Karangsembung',
            'kota' => 'Kabupaten Cirebon',
            'provinsi' => 'Jawa Barat',
            'alamatLengkap' => 'Karangsuwung, Kec. Karangsembung, Kabupaten Cirebon, Jawa Barat 45186',
            'aMulai' => Carbon::createFromTime(8, 0, 0),
            'aSelesai' => Carbon::createFromTime(9, 0, 0),
            'linkGmaps' => 'https://maps.app.goo.gl/nDFZy7PfEUuQ9QnB7',
            'embedGmaps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3961.3393110959164!2d108.6423267!3d-6.8498676!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f052bdd087819%3A0x8eebb3044cb90d12!2sPT.%20PG%20Rajawali%20II!5e0!3m2!1sid!2sid!4v1716726537495!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'idUndangan' => 1
        ]);

        Acara::create([
            'namaAcara' => 'RESEPSI',
            'tglAcara' => Carbon::createFromDate(2024, 10, 4), // (Y, m, d)
            'kecamatan' => 'Karangsembung',
            'kota' => 'Kabupaten Cirebon',
            'provinsi' => 'Jawa Barat',
            'alamatLengkap' => 'Karangsuwung, Kec. Karangsembung, Kabupaten Cirebon, Jawa Barat 45186',
            'aMulai' => Carbon::createFromTime(9, 0, 0),
            'aSelesai' => Carbon::createFromTime(16, 0, 0),
            'linkGmaps' => 'https://maps.app.goo.gl/nDFZy7PfEUuQ9QnB7',
            'embedGmaps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3961.3393110959164!2d108.6423267!3d-6.8498676!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f052bdd087819%3A0x8eebb3044cb90d12!2sPT.%20PG%20Rajawali%20II!5e0!3m2!1sid!2sid!4v1716726537495!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'idUndangan' => 1
        ]);

        Story::create([
            'judul' => '2017',
            'cerita' => 'Awal pertemuan kita yang tanpa sengaja kita bertemu pada suatu tugas sekolah yaitu Praktek Kerja Lapangan (PKL) pada salah satu Instansi Yaitu PT. Telkom Akses Cirebon, Kami Saling mengenal dan berteman selama ±1 bulan, Zidan mulai ada rasa tertarik dengan Aida namun hanya sekedar tertarik saja',
            'gambar' => '',
            'idUndangan' => 1
        ]);

        Ucapan::create([
            'nama' => 'Slamet Septiawan',
            'alamat' => 'Kota Cirebon',
            'ucapan' => 'Selamat menikah! Semoga kalian selalu akur meskipun terkadang berbeda pendapat. Ingat, pernikahan bukan tentang siapa yang selalu benar, tapi tentang siapa yang selalu mau mengalah.',
            'idUndangan' => 1
        ]);
    }
}
