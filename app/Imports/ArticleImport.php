<?php

namespace App\Imports;

use App\Models\Article;
use Maatwebsite\Excel\Concerns\ToModel;

class ArticleImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Article([
            'designation' => $row[0],
            'reference' => $row[1],
            'priority' => $row[3],
            'marque' => $row[4],
            'brand_id' => $row[5],
            'quantity' => $row[5],
        ]);
    }
}
