<?php

namespace Database\Seeders\Generation1;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
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
