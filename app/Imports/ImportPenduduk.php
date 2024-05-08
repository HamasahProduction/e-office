<?php

namespace App\Imports;

use App\Models\Penduduk;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class ImportPenduduk implements ToCollection, WithHeadingRow
{
    use Importable;

	public function collection(Collection $rows)
	{		

	}
}
