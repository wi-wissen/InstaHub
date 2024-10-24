<?php

namespace Database\Seeders\Generation2;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('ads')->delete();

        DB::table('ads')->insert([
            0 => [
                'id' => 1,
                'priority' => 2,
                'name' => 'freizeitpark',
                'type' => 'banner',
                'url' => '/noad',
                'img' => '/img/ad/freizeitpark.jpg',
                'query' => 'SELECT CASE gender WHEN \'male\' THEN true ELSE false END FROM users where id=$user',
                'created_at' => '2024-10-24 00:00:00',
                'updated_at' => '2024-10-24 00:00:00',
            ],
            1 => [
                'id' => 2,
                'priority' => 1,
                'name' => 'bergalm',
                'type' => 'banner',
                'url' => '/noad',
                'img' => '/img/ad/bergalm.jpg',
                'query' => 'SELECT 
CASE 
WHEN description LIKE \'%naturelover%\' 
  OR description LIKE \'%naturliebe%\' 
  OR description LIKE \'%naturliebhaber%\'
  OR description LIKE \'%naturpur%\'
  OR description LIKE \'%naturelovers%\'
  OR description LIKE \'%bergabenteuer%\' THEN true 
ELSE false 
END 
FROM photos 
WHERE id=$photo',
                'created_at' => '2024-10-24 00:00:00',
                'updated_at' => '2024-10-24 00:00:00',
            ],
            2 => [
                'id' => 3,
                'priority' => 2,
                'name' => 'ivo',
                'type' => 'photo',
                'url' => '/noad',
                'img' => '/img/ad/maze3.jpg',
                'query' => 'SELECT 
CASE 
WHEN device = \'desktop\' THEN true 
ELSE false 
END 
FROM analytics
WHERE user_id=$user
ORDER BY id DESC
LIMIT 1',
                'created_at' => '2024-10-24 00:00:00',
                'updated_at' => '2024-10-24 00:00:00',
            ],
            3 => [
                'id' => 4,
                'priority' => 2,
                'name' => 'princess',
                'type' => 'banner',
                'url' => '/noad',
                'img' => '/img/ad/princess.jpg',
                'query' => 'SELECT CASE gender WHEN \'female\' THEN true ELSE false END FROM users where id=$user',
                'created_at' => '2024-10-24 00:00:00',
                'updated_at' => '2024-10-24 00:00:00',
            ],
            4 => [
                'id' => 5,
                'priority' => 1,
                'name' => 'oodel',
                'type' => 'photo',
                'url' => '/noad',
                'img' => '/img/ad/reinehaut.jpg',
                'query' => 'SELECT 
CASE 
WHEN TIMESTAMPDIFF(YEAR, birthday, CURDATE()) < 15 THEN true 
ELSE false 
END 
FROM users 
WHERE id=$user',
                'created_at' => '2024-10-24 00:00:00',
                'updated_at' => '2024-10-24 00:00:00',
            ],
            5 => [
                'id' => 6,
                'priority' => 1,
                'name' => 'truti',
                'type' => 'banner',
                'url' => '/noad',
                'img' => '/img/ad/sommerferien.jpg',
                'query' => 'SELECT 
CASE 
WHEN description LIKE \'%beachvibes%\' 
  OR description LIKE \'%poollife%\'
  OR description LIKE \'%schwimmen%\'
  OR description LIKE \'%wasserratte%\'
  OR description LIKE \'%swimlife%\'
  OR description LIKE \'%swimsquad%\' THEN true 
ELSE false 
END 
FROM photos 
WHERE id=$photo',
                'created_at' => '2024-10-24 00:00:00',
                'updated_at' => '2024-10-24 00:00:00',
            ],
            6 => [
                'id' => 7,
                'priority' => 3,
                'name' => 'andromeda ',
                'type' => 'photo',
                'url' => '/noad',
                'img' => '/img/ad/smoothie.jpg',
                'query' => 'SELECT id FROM users WHERE id=$user',
                'created_at' => '2024-10-24 00:00:00',
                'updated_at' => '2024-10-24 00:00:00',
            ],
            7 => [
                'id' => 8,
                'priority' => 3,
                'name' => 'burgerhaus',
                'type' => 'banner',
                'url' => '/noad',
                'img' => '/img/ad/brokkolie.jpg',
                'query' => 'SELECT id FROM users WHERE id=$user',
                'created_at' => '2024-10-24 00:00:00',
                'updated_at' => '2024-10-24 00:00:00',
            ],
        ]);
    }
}