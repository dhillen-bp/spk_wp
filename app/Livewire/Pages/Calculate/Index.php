<?php

namespace App\Livewire\Pages\Calculate;

use App\Models\Criteria;
use App\Models\Employee;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Masmerise\Toaster\Toaster;

class Index extends Component
{
    public $vectorS = [];
    public $vectorV = [];
    public $normalizedScores = [];

    public function calculateNormalization()
    {
        // Ambil kriteria dengan bobot eksponensial
        $criterias = Criteria::all();
        $employees = Employee::with(['scores.criteria'])->get();

        // Hitung vektor S untuk setiap karyawan
        foreach ($employees as $employee) {
            $sValue = 1; // Inisialisasi nilai S untuk karyawan ini

            foreach ($criterias as $criteria) {
                // Dapatkan skor karyawan untuk kriteria ini
                $score = $employee->scores->where('criteria_id', $criteria->id)->first();

                // Jika skor ada, hitung nilai normalisasi dengan pangkat bobot
                if ($score) {
                    $exponent = $criteria->weight / 100;
                    $sValue *= pow($score->score, $exponent);

                    // Simpan hasil normalisasi (jika ingin ditampilkan di tabel normalisasi)
                    $this->normalizedScores[$employee->id][$criteria->id] = pow($score->score, $exponent);
                }
            }

            // Simpan nilai S untuk karyawan ini
            $this->vectorS[$employee->id] = $sValue;
        }

        // Hitung total S
        $totalS = array_sum($this->vectorS);

        // Hitung vektor V untuk setiap karyawan
        foreach ($this->vectorS as $employeeId => $sValue) {
            $this->vectorV[$employeeId] = $sValue / $totalS;
        }
    }

    public function saveRankings()
    {
        // Hapus data pemeringkatan sebelumnya jika perlu
        \DB::table('rankings')->truncate();

        // Simpan vektor V dan hitung ranking
        $rank = 1;
        foreach ($this->vectorV as $employeeId => $finalScore) {
            // Simpan ke dalam tabel rankings
            \DB::table('rankings')->insert([
                'employee_id' => $employeeId,
                'final_score' => $finalScore,
                'rank' => $rank,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $rank++;
        }

        Toaster::success('Ranking successfully saved!');
        return $this->redirect(route('criteria.index'));
    }

    public function render()
    {
        $this->calculateNormalization();
        $criterias = Criteria::all();
        $employees = $employees = Employee::with(['scores.criteria'])->get();

        return view('livewire.pages.calculate.index', [
            'criterias' => $criterias,
            'employees' => $employees,
            'normalizedScores' => $this->normalizedScores,
            'vectorS' => $this->vectorS,
            'vectorV' => $this->vectorV,
        ])->layout('layouts.app');
    }
}
