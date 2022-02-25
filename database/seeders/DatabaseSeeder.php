<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('UsersTableSeeder');
        $this->call('CommentsTableSeeder');
        $this->call('FollowsTableSeeder');
        $this->call('LikesTableSeeder');
        $this->call('PhotosTableSeeder');
        $this->call('TagsTableSeeder');
        $this->call('AdsTableSeeder');
    }
}
