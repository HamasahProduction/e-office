<?php

namespace App\Imports;

use App\Models\DetailAnggotaKeluarga;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class ImportAnggotaKeluarga implements ToCollection, WithHeadingRow
{
    use Importable;

	public function collection(Collection $rows)
	{		

	}
}
