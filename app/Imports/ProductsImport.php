<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            $validated = \validator(['external_code' => $item['vnesnii_kod']], ['external_code' => 'unique:App\Models\Product,external_code']);
            if ($validated->passes()) {
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
}
