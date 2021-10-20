<?php
namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::create([
            'name' => 'ngay1.pdf',
            'description' => 'File pdf demo',
            'type' => 'pdf'
        ]);
        Document::create([
            'name' => 'Hồ Đức Tuân-TACN.docx',
            'description' => 'File docs demo',
            'type' => 'docx'
        ]);

          Document::create([
            'name' => 'Seoul.mp4',
            'description' => 'File video demo',
            'type' => 'mp4'
        ]);
    }
}
