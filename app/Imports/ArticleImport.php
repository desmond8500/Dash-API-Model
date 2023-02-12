<?php

namespace App\Imports;

use App\Models\Article;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ArticleImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Article([

            'designation' => $row['designation'],
            'description' => $row['description'],
            'reference' => $row['reference'],
            'priority' => $row['priority'],
            'quantity' => $row['quantity'],
            'price' => $row['price'],
            'image' => $row['image'],
            'brand_id' => $row['brand_id'],
            'provider_id' => $row['provider_id'],

        ]);
    }
}
