<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PanduanKesehatan;

class PanduanKesehatanSeeder extends Seeder
{
    public function run()
    {
        PanduanKesehatan::create([
            'judul' => 'Bagaimana cara menjaga pola makan sehat?',
            'konten' => 'Konsumsilah makanan bergizi seimbang...',
        ]);

        PanduanKesehatan::create([
            'judul' => 'Apa tips mengatur waktu agar tidak stres selama kuliah?',
            'konten' => 'Buatlah jadwal harian atau mingguan...',
        ]);
        PanduanKesehatan::create([
            'judul' => 'Cara bertahan hidup di semester 8?',
            'konten' => 'Buatlah jadwal harian atau mingguan...',
        ]);
        PanduanKesehatan::create([
            'judul' => 'Perut lapar di akhir bulan',
            'konten' => 'Buatlah jadwal harian atau mingguan...',
        ]);
        PanduanKesehatan::create([
            'judul' => 'Bagaimana cara tidak kepeleset saat futsal',
            'konten' => 'Buatlah jadwal harian atau mingguan...',
        ]);
    }
}
