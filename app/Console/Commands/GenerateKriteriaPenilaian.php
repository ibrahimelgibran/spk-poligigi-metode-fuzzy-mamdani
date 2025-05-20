<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateKriteriaPenilaian extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-kriteria-penilaian';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
   public function handle()
{
    $asets = \App\Models\Aset::all();

    foreach ($asets as $aset) {
        $kriteria = \App\Models\KriteriaPenilaian::firstOrNew([
            'nama_alat_kesehatan_dan_bahan' => $aset->nama_alat_dan_bahan,
        ]);

        switch ($aset->tingkat_kebutuhan) {
            case '3':
                $kriteria->nilai_akhir = 100;
                $kriteria->keterangan = 'Sangat Direkomendasi';
                break;
            case '2':
                $kriteria->nilai_akhir = 75;
                $kriteria->keterangan = 'Direkomendasi';
                break;
            case '1':
                $kriteria->nilai_akhir = 25;
                $kriteria->keterangan = 'Tidak Direkomendasi';
                break;
            default:
                $kriteria->nilai_akhir = 0;
                $kriteria->keterangan = 'Tidak Ada Keterangan';
                break;
        }

        $kriteria->save();
    }

    $this->info('Data kriteria penilaian berhasil diupdate.');
}

}
