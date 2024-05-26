<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Design;
use App\Models\Detail;
use App\Models\Generation;
use App\Models\Modification;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=5; $i++){
            $brand = Brand::create([
                'name' => 'Бренд '.$i,
                'image' => 'brand'.$i.'.jpg'
            ]);
            for($j=1; $j<=5; $j++){
                $design = Design::create([
                    'name' => 'Модель '.$i+$j,
                    'brand_id' => $brand->id
                ]);
                for($s=1; $s<=5; $s++){
                    $generation = Generation::create([
                        'name' => 'Поколение '.$s,
                        'image' => 'generation'.$s.'.jpg',
                        'design_id' => $design->id
                    ]);
                    for($g=1; $g<=5; $g++){
                        $modification = Modification::create([
                            'text' => 'Текст '.$g+$s+$j+$i,
                            'generation_id' => $generation->id
                        ]);
                        for($p=1; $p<=5; $p++){
                            $detail = Detail::create([
                                'detail_brand' => 'Бренд делали '.$i+$j,
                                'number' => 'sadkljfadsjk324',
                                'descr' => 'Описание детали '.$p+$i,
                                'price' => 1000,
                                'image' => 'detail.'.$i+$g+$j.'.jpg',
                                'count' => 123,
                                'modification_id' => $modification->id,
                            ]);
                        }

                    }
                }
            }
        }
    }
}
