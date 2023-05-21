<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::insert([
            [
                'name_ar' => 'الخبرة',
                'name_en' => 'Experience',
                'desc_ar' => 'Construction Cairo Newهي شركة أنظمة متكاملة ذات خبرة. لقد نجح فريقنا المحترف في مجال التيار الخفيف في مساعدة العمالء في الحصول على الحلول المثلى من خالل دراسات الحالة.',
                'desc_en' => 'Construction Cairo New is an experienced integrated systems company. Our professional team in the field of low current has succeeded in helping customers to find the optimal solutions through case studies.',
                'image'   => 'services/img_1.png',
            ],
        ]);
    }
}
