<?php

namespace App\Imports;

use App\Models\Extra;
use App\Models\Images;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */

    private function getImage($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode == 200) {
            $contents = file_get_contents($url);
            Storage::put('/public/img/' . basename($url), $contents);
            return Storage::url('/img/' . basename($url)) . ', ';
        }

        return '';
    }
    private function insertInProductsTable($data) {
        $validated = \validator(['external_code' => $data['vnesnii_kod']], ['external_code' => 'unique:App\Models\Product,external_code']);
        if ($validated->passes()) {
            $attributes = [
                'external_code' => $data['vnesnii_kod'],
                'name' => $data['naimenovanie'],
                'description' => $data['opisanie'],
                'price' => (int)$data['cena_cena_prodazi'],
                'discount' => ((int)$data['cena_cena_prodazi'] - (int)$data['zakupocnaia_cena']) * 100 / (int)$data['cena_cena_prodazi']
            ];

            return Product::create($attributes)->id;
        }

        return false;
    }

    private function insertInExtraTable($id, $data) {
        $extraAttributes = [
            'product_id' => $id,
            'size' => $data['dop_pole_razmer'],
            'colour' => $data['dop_pole_cvet'],
            'brand' => $data['dop_pole_brend'],
            'composition' => $data['dop_pole_sostav'],
            'quantity_in_package' => $data['dop_pole_kol_vo_v_upakovke'],
            'quantity_url' => $data['dop_pole_ssylka_na_upakovku'],
            'image_url' => $data['dop_pole_ssylki_na_foto'],
            'seo_title' => $data['dop_pole_seo_title'],
            'seo_h1' => $data['dop_pole_seo_h1'],
            'seo_description' => $data['dop_pole_seo_description'],
            'weight' => $data['dop_pole_ves_tovarag'],
            'width' => $data['dop_pole_sirinamm'],
            'height' => $data['dop_pole_vysotamm'],
            'length' => $data['dop_pole_dlinamm'],
            'package_weight' => $data['dop_pole_ves_upakovkig'],
            'package_width' => $data['dop_pole_sirina_upakovkimm'],
            'package_height' => $data['dop_pole_vysota_upakovkimm'],
            'package_length' => $data['dop_pole_dlina_upakovkimm'],
            'category' => $data['dop_pole_kategoriia_tovara']
        ];
        Extra::create($extraAttributes);
    }

    private function insertInImagesTable($id, $data) {
        $urls = explode(', ', $data['dop_pole_ssylki_na_foto']);
        $imgPaths = '';
        foreach ($urls as $url) {
           $imgPaths .= $this->getImage($url);
        }

        $attributes = [
            'product_id' => $id,
            'image_url' => $data['dop_pole_ssylki_na_foto'],
            'image_path' => $imgPaths
        ];

        Images::create($attributes);
    }
    public function collection(Collection $collection)
    {
        foreach ($collection as $item) {
            $id = $this->insertInProductsTable($item);

            if ($id !== false) {
                $this->insertInExtraTable($id, $item);
                $this->insertInImagesTable($id, $item);
            }
        }
    }
}
