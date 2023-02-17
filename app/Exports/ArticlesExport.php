<?php

namespace App\Exports;

use App\Models\Article;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ArticlesExport implements FromView
{
    public function view(): View
    {
        return view('_tabler.export.articles', [
            'articles' => Article::all(),
        ]);
    }
}
