<?php

namespace Database\Seeders;

use App\Models\Type;
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
        for($i=1; $i<=10; $i++){
            $type = Type::create([
                'name' => 'Тип '.$i,
            ]);
        }
        $types = Type::all();
        for($i=1; $i<=5; $i++){
            $brand = Brand::create([
                'name' => 'Бренд '.$i,
                'image' => 'https://avatars.dzeninfra.ru/get-zen_doc/4473624/pub_608521d53b735b52f8068061_60852321874e5a0225c9f7e2/scale_1200'
            ]);
            for($j=1; $j<=5; $j++){
                $design = Design::create([
                    'name' => 'Модель '.$i+$j,
                    'brand_id' => $brand->id
                ]);
                for($s=1; $s<=5; $s++){
                    $generation = Generation::create([
                        'name' => 'Поколение '.$s,
                        'image' => 'https://w7.pngwing.com/pngs/475/527/png-transparent-automotive-engine-parts-car-parts-engine.png',
                        'design_id' => $design->id
                    ]);
                    for($g=1; $g<=5; $g++){
                        $modification = Modification::create([
                            'name' => 'Имя '.$g+$s+$j+$i,
                            'generation_id' => $generation->id
                        ]);
                        for($p=1; $p<=5; $p++){
                            $detail = Detail::create([
                                'detail_brand' => 'Бренд делали '.$i+$j,
                                'number' => 'sadkljfadsjk324',
                                'descr' => 'Описание детали '.$p+$i,
                                'price' => 1000,
                                'image' => 'https://www.skb-4.com/sites/default/files/category_images/detali_i_uzly_machin_i_mehanizmov.jpg',
                                'count' => 123,
                                'brand_id' => $brand->id,
                                'design_id' => $design->id,
                                'generation_id' => $generation->id,
                                'modification_id' => $modification->id,
                                'type_id' => $types[random_int(0, 9)]->id,
                            ]);
                        }

                    }
                }
            }
        }
    }
}
