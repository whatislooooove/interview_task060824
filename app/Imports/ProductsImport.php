<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // 1320 = 100%
        // (1320-880) 420 = x%
        // добавить обработку добавления существующих записей (валидация)
        foreach ($collection as $item) {
            $attributes = [
                'external_code' => $item['vnesnii_kod'],
                'name' => $item['naimenovanie'],
                'description' => $item['opisanie'],
                'price' => (int)$item['cena_cena_prodazi'],
                'discount (%)' => ((int)$item['cena_cena_prodazi'] - (int)$item['zakupocnaia_cena']) * 100 / (int)$item['cena_cena_prodazi']
            ];

            Product::create($attributes);
        }
    }
}
