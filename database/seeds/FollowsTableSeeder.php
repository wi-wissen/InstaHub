<?php

use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        \DB::table('follows')->delete();
        
        \DB::table('follows')->insert(array (
            0 => 
            array (
                'id' => 1,
                'following_id' => 17,
                'follower_id' => 84,
                'created_at' => '2017-09-13 00:00:03',
                'updated_at' => '2017-09-13 00:00:03',
            ),
            1 => 
            array (
                'id' => 2,
                'following_id' => 28,
                'follower_id' => 58,
                'created_at' => '2017-09-22 08:32:28',
                'updated_at' => '2017-09-22 08:32:28',
            ),
            2 => 
            array (
                'id' => 3,
                'following_id' => 48,
                'follower_id' => 24,
                'created_at' => '2017-08-26 15:00:06',
                'updated_at' => '2017-08-26 15:00:06',
            ),
            3 => 
            array (
                'id' => 4,
                'following_id' => 137,
                'follower_id' => 164,
                'created_at' => '2017-09-20 20:28:29',
                'updated_at' => '2017-09-20 20:28:29',
            ),
            4 => 
            array (
                'id' => 5,
                'following_id' => 158,
                'follower_id' => 166,
                'created_at' => '2017-09-16 21:05:20',
                'updated_at' => '2017-09-16 21:05:20',
            ),
            5 => 
            array (
                'id' => 6,
                'following_id' => 191,
                'follower_id' => 79,
                'created_at' => '2017-09-05 00:25:15',
                'updated_at' => '2017-09-05 00:25:15',
            ),
            6 => 
            array (
                'id' => 7,
                'following_id' => 67,
                'follower_id' => 111,
                'created_at' => '2017-09-06 13:16:04',
                'updated_at' => '2017-09-06 13:16:04',
            ),
            7 => 
            array (
                'id' => 8,
                'following_id' => 138,
                'follower_id' => 103,
                'created_at' => '2017-09-01 02:07:00',
                'updated_at' => '2017-09-01 02:07:00',
            ),
            8 => 
            array (
                'id' => 9,
                'following_id' => 91,
                'follower_id' => 101,
                'created_at' => '2017-09-17 16:11:49',
                'updated_at' => '2017-09-17 16:11:49',
            ),
            9 => 
            array (
                'id' => 10,
                'following_id' => 75,
                'follower_id' => 38,
                'created_at' => '2017-09-10 21:43:38',
                'updated_at' => '2017-09-10 21:43:38',
            ),
            10 => 
            array (
                'id' => 11,
                'following_id' => 98,
                'follower_id' => 172,
                'created_at' => '2017-09-20 11:57:05',
                'updated_at' => '2017-09-20 11:57:05',
            ),
            11 => 
            array (
                'id' => 12,
                'following_id' => 179,
                'follower_id' => 121,
                'created_at' => '2017-09-09 02:57:00',
                'updated_at' => '2017-09-09 02:57:00',
            ),
            12 => 
            array (
                'id' => 13,
                'following_id' => 191,
                'follower_id' => 92,
                'created_at' => '2017-09-01 12:51:44',
                'updated_at' => '2017-09-01 12:51:44',
            ),
            13 => 
            array (
                'id' => 14,
                'following_id' => 42,
                'follower_id' => 1,
                'created_at' => '2017-09-23 08:41:12',
                'updated_at' => '2017-09-23 08:41:12',
            ),
            14 => 
            array (
                'id' => 15,
                'following_id' => 186,
                'follower_id' => 127,
                'created_at' => '2017-09-08 11:33:12',
                'updated_at' => '2017-09-08 11:33:12',
            ),
            15 => 
            array (
                'id' => 16,
                'following_id' => 15,
                'follower_id' => 111,
                'created_at' => '2017-09-10 16:57:21',
                'updated_at' => '2017-09-10 16:57:21',
            ),
            16 => 
            array (
                'id' => 17,
                'following_id' => 188,
                'follower_id' => 21,
                'created_at' => '2017-09-09 22:04:47',
                'updated_at' => '2017-09-09 22:04:47',
            ),
            17 => 
            array (
                'id' => 18,
                'following_id' => 26,
                'follower_id' => 19,
                'created_at' => '2017-09-01 02:45:29',
                'updated_at' => '2017-09-01 02:45:29',
            ),
            18 => 
            array (
                'id' => 19,
                'following_id' => 92,
                'follower_id' => 75,
                'created_at' => '2017-09-17 20:35:32',
                'updated_at' => '2017-09-17 20:35:32',
            ),
            19 => 
            array (
                'id' => 20,
                'following_id' => 15,
                'follower_id' => 165,
                'created_at' => '2017-09-01 12:34:07',
                'updated_at' => '2017-09-01 12:34:07',
            ),
            20 => 
            array (
                'id' => 21,
                'following_id' => 8,
                'follower_id' => 94,
                'created_at' => '2017-08-30 14:14:41',
                'updated_at' => '2017-08-30 14:14:41',
            ),
            21 => 
            array (
                'id' => 22,
                'following_id' => 179,
                'follower_id' => 61,
                'created_at' => '2017-09-18 10:00:11',
                'updated_at' => '2017-09-18 10:00:11',
            ),
            22 => 
            array (
                'id' => 23,
                'following_id' => 127,
                'follower_id' => 21,
                'created_at' => '2017-09-01 06:09:23',
                'updated_at' => '2017-09-01 06:09:23',
            ),
            23 => 
            array (
                'id' => 24,
                'following_id' => 33,
                'follower_id' => 13,
                'created_at' => '2017-09-05 00:05:29',
                'updated_at' => '2017-09-05 00:05:29',
            ),
            24 => 
            array (
                'id' => 25,
                'following_id' => 53,
                'follower_id' => 111,
                'created_at' => '2017-09-19 23:00:00',
                'updated_at' => '2017-09-19 23:00:00',
            ),
            25 => 
            array (
                'id' => 26,
                'following_id' => 91,
                'follower_id' => 16,
                'created_at' => '2017-09-10 08:55:52',
                'updated_at' => '2017-09-10 08:55:52',
            ),
            26 => 
            array (
                'id' => 27,
                'following_id' => 153,
                'follower_id' => 21,
                'created_at' => '2017-08-31 04:46:55',
                'updated_at' => '2017-08-31 04:46:55',
            ),
            27 => 
            array (
                'id' => 28,
                'following_id' => 105,
                'follower_id' => 138,
                'created_at' => '2017-09-08 00:13:31',
                'updated_at' => '2017-09-08 00:13:31',
            ),
            28 => 
            array (
                'id' => 29,
                'following_id' => 15,
                'follower_id' => 175,
                'created_at' => '2017-09-16 18:47:54',
                'updated_at' => '2017-09-16 18:47:54',
            ),
            29 => 
            array (
                'id' => 30,
                'following_id' => 44,
                'follower_id' => 116,
                'created_at' => '2017-08-28 13:24:44',
                'updated_at' => '2017-08-28 13:24:44',
            ),
            30 => 
            array (
                'id' => 31,
                'following_id' => 34,
                'follower_id' => 134,
                'created_at' => '2017-09-20 00:53:10',
                'updated_at' => '2017-09-20 00:53:10',
            ),
            31 => 
            array (
                'id' => 32,
                'following_id' => 46,
                'follower_id' => 33,
                'created_at' => '2017-09-11 08:16:06',
                'updated_at' => '2017-09-11 08:16:06',
            ),
            32 => 
            array (
                'id' => 33,
                'following_id' => 36,
                'follower_id' => 136,
                'created_at' => '2017-09-06 15:18:00',
                'updated_at' => '2017-09-06 15:18:00',
            ),
            33 => 
            array (
                'id' => 34,
                'following_id' => 88,
                'follower_id' => 123,
                'created_at' => '2017-09-23 00:52:13',
                'updated_at' => '2017-09-23 00:52:13',
            ),
            34 => 
            array (
                'id' => 35,
                'following_id' => 160,
                'follower_id' => 132,
                'created_at' => '2017-09-20 01:25:26',
                'updated_at' => '2017-09-20 01:25:26',
            ),
            35 => 
            array (
                'id' => 36,
                'following_id' => 50,
                'follower_id' => 122,
                'created_at' => '2017-08-26 19:08:27',
                'updated_at' => '2017-08-26 19:08:27',
            ),
            36 => 
            array (
                'id' => 37,
                'following_id' => 186,
                'follower_id' => 97,
                'created_at' => '2017-08-29 11:31:52',
                'updated_at' => '2017-08-29 11:31:52',
            ),
            37 => 
            array (
                'id' => 38,
                'following_id' => 41,
                'follower_id' => 187,
                'created_at' => '2017-09-08 10:22:42',
                'updated_at' => '2017-09-08 10:22:42',
            ),
            38 => 
            array (
                'id' => 39,
                'following_id' => 104,
                'follower_id' => 68,
                'created_at' => '2017-09-20 20:04:16',
                'updated_at' => '2017-09-20 20:04:16',
            ),
            39 => 
            array (
                'id' => 40,
                'following_id' => 74,
                'follower_id' => 22,
                'created_at' => '2017-09-20 06:18:51',
                'updated_at' => '2017-09-20 06:18:51',
            ),
            40 => 
            array (
                'id' => 41,
                'following_id' => 19,
                'follower_id' => 62,
                'created_at' => '2017-09-01 12:13:35',
                'updated_at' => '2017-09-01 12:13:35',
            ),
            41 => 
            array (
                'id' => 42,
                'following_id' => 127,
                'follower_id' => 42,
                'created_at' => '2017-09-13 00:11:35',
                'updated_at' => '2017-09-13 00:11:35',
            ),
            42 => 
            array (
                'id' => 43,
                'following_id' => 19,
                'follower_id' => 101,
                'created_at' => '2017-08-29 00:16:18',
                'updated_at' => '2017-08-29 00:16:18',
            ),
            43 => 
            array (
                'id' => 44,
                'following_id' => 11,
                'follower_id' => 140,
                'created_at' => '2017-09-01 00:53:58',
                'updated_at' => '2017-09-01 00:53:58',
            ),
            44 => 
            array (
                'id' => 45,
                'following_id' => 146,
                'follower_id' => 178,
                'created_at' => '2017-09-18 00:40:10',
                'updated_at' => '2017-09-18 00:40:10',
            ),
            45 => 
            array (
                'id' => 46,
                'following_id' => 184,
                'follower_id' => 161,
                'created_at' => '2017-09-09 04:30:02',
                'updated_at' => '2017-09-09 04:30:02',
            ),
            46 => 
            array (
                'id' => 47,
                'following_id' => 71,
                'follower_id' => 178,
                'created_at' => '2017-09-11 23:39:57',
                'updated_at' => '2017-09-11 23:39:57',
            ),
            47 => 
            array (
                'id' => 48,
                'following_id' => 38,
                'follower_id' => 88,
                'created_at' => '2017-09-17 04:43:35',
                'updated_at' => '2017-09-17 04:43:35',
            ),
            48 => 
            array (
                'id' => 49,
                'following_id' => 30,
                'follower_id' => 22,
                'created_at' => '2017-09-09 19:43:07',
                'updated_at' => '2017-09-09 19:43:07',
            ),
            49 => 
            array (
                'id' => 50,
                'following_id' => 133,
                'follower_id' => 195,
                'created_at' => '2017-09-20 03:21:22',
                'updated_at' => '2017-09-20 03:21:22',
            ),
            50 => 
            array (
                'id' => 51,
                'following_id' => 108,
                'follower_id' => 143,
                'created_at' => '2017-09-12 08:50:33',
                'updated_at' => '2017-09-12 08:50:33',
            ),
            51 => 
            array (
                'id' => 52,
                'following_id' => 124,
                'follower_id' => 20,
                'created_at' => '2017-09-12 06:41:13',
                'updated_at' => '2017-09-12 06:41:13',
            ),
            52 => 
            array (
                'id' => 53,
                'following_id' => 67,
                'follower_id' => 52,
                'created_at' => '2017-09-08 00:18:10',
                'updated_at' => '2017-09-08 00:18:10',
            ),
            53 => 
            array (
                'id' => 54,
                'following_id' => 79,
                'follower_id' => 106,
                'created_at' => '2017-09-10 21:52:01',
                'updated_at' => '2017-09-10 21:52:01',
            ),
            54 => 
            array (
                'id' => 55,
                'following_id' => 164,
                'follower_id' => 191,
                'created_at' => '2017-09-04 03:09:54',
                'updated_at' => '2017-09-04 03:09:54',
            ),
            55 => 
            array (
                'id' => 56,
                'following_id' => 9,
                'follower_id' => 161,
                'created_at' => '2017-09-20 03:32:51',
                'updated_at' => '2017-09-20 03:32:51',
            ),
            56 => 
            array (
                'id' => 57,
                'following_id' => 178,
                'follower_id' => 172,
                'created_at' => '2017-08-25 02:34:25',
                'updated_at' => '2017-08-25 02:34:25',
            ),
            57 => 
            array (
                'id' => 58,
                'following_id' => 92,
                'follower_id' => 96,
                'created_at' => '2017-09-18 12:36:21',
                'updated_at' => '2017-09-18 12:36:21',
            ),
            58 => 
            array (
                'id' => 59,
                'following_id' => 129,
                'follower_id' => 191,
                'created_at' => '2017-09-07 03:06:55',
                'updated_at' => '2017-09-07 03:06:55',
            ),
            59 => 
            array (
                'id' => 60,
                'following_id' => 90,
                'follower_id' => 128,
                'created_at' => '2017-09-15 06:53:24',
                'updated_at' => '2017-09-15 06:53:24',
            ),
            60 => 
            array (
                'id' => 61,
                'following_id' => 71,
                'follower_id' => 88,
                'created_at' => '2017-09-15 14:14:37',
                'updated_at' => '2017-09-15 14:14:37',
            ),
            61 => 
            array (
                'id' => 62,
                'following_id' => 125,
                'follower_id' => 190,
                'created_at' => '2017-09-22 04:52:55',
                'updated_at' => '2017-09-22 04:52:55',
            ),
            62 => 
            array (
                'id' => 63,
                'following_id' => 40,
                'follower_id' => 176,
                'created_at' => '2017-08-27 09:46:12',
                'updated_at' => '2017-08-27 09:46:12',
            ),
            63 => 
            array (
                'id' => 64,
                'following_id' => 3,
                'follower_id' => 185,
                'created_at' => '2017-09-03 16:46:11',
                'updated_at' => '2017-09-03 16:46:11',
            ),
            64 => 
            array (
                'id' => 65,
                'following_id' => 133,
                'follower_id' => 58,
                'created_at' => '2017-08-26 09:21:25',
                'updated_at' => '2017-08-26 09:21:25',
            ),
            65 => 
            array (
                'id' => 66,
                'following_id' => 11,
                'follower_id' => 41,
                'created_at' => '2017-09-14 07:46:01',
                'updated_at' => '2017-09-14 07:46:01',
            ),
            66 => 
            array (
                'id' => 67,
                'following_id' => 30,
                'follower_id' => 52,
                'created_at' => '2017-09-01 02:52:26',
                'updated_at' => '2017-09-01 02:52:26',
            ),
            67 => 
            array (
                'id' => 68,
                'following_id' => 75,
                'follower_id' => 13,
                'created_at' => '2017-09-05 11:11:18',
                'updated_at' => '2017-09-05 11:11:18',
            ),
            68 => 
            array (
                'id' => 69,
                'following_id' => 174,
                'follower_id' => 148,
                'created_at' => '2017-09-18 07:57:14',
                'updated_at' => '2017-09-18 07:57:14',
            ),
            69 => 
            array (
                'id' => 70,
                'following_id' => 180,
                'follower_id' => 9,
                'created_at' => '2017-09-09 16:21:26',
                'updated_at' => '2017-09-09 16:21:26',
            ),
            70 => 
            array (
                'id' => 71,
                'following_id' => 163,
                'follower_id' => 11,
                'created_at' => '2017-09-15 17:12:20',
                'updated_at' => '2017-09-15 17:12:20',
            ),
            71 => 
            array (
                'id' => 72,
                'following_id' => 16,
                'follower_id' => 95,
                'created_at' => '2017-09-11 10:30:37',
                'updated_at' => '2017-09-11 10:30:37',
            ),
            72 => 
            array (
                'id' => 73,
                'following_id' => 50,
                'follower_id' => 166,
                'created_at' => '2017-09-11 15:51:12',
                'updated_at' => '2017-09-11 15:51:12',
            ),
            73 => 
            array (
                'id' => 74,
                'following_id' => 68,
                'follower_id' => 100,
                'created_at' => '2017-09-13 10:42:47',
                'updated_at' => '2017-09-13 10:42:47',
            ),
            74 => 
            array (
                'id' => 75,
                'following_id' => 5,
                'follower_id' => 168,
                'created_at' => '2017-09-21 04:06:01',
                'updated_at' => '2017-09-21 04:06:01',
            ),
            75 => 
            array (
                'id' => 76,
                'following_id' => 94,
                'follower_id' => 50,
                'created_at' => '2017-09-19 18:01:12',
                'updated_at' => '2017-09-19 18:01:12',
            ),
            76 => 
            array (
                'id' => 77,
                'following_id' => 138,
                'follower_id' => 168,
                'created_at' => '2017-08-26 00:21:19',
                'updated_at' => '2017-08-26 00:21:19',
            ),
            77 => 
            array (
                'id' => 78,
                'following_id' => 5,
                'follower_id' => 101,
                'created_at' => '2017-09-23 04:08:43',
                'updated_at' => '2017-09-23 04:08:43',
            ),
            78 => 
            array (
                'id' => 79,
                'following_id' => 72,
                'follower_id' => 108,
                'created_at' => '2017-09-15 00:30:31',
                'updated_at' => '2017-09-15 00:30:31',
            ),
            79 => 
            array (
                'id' => 80,
                'following_id' => 66,
                'follower_id' => 40,
                'created_at' => '2017-09-09 23:18:04',
                'updated_at' => '2017-09-09 23:18:04',
            ),
            80 => 
            array (
                'id' => 81,
                'following_id' => 136,
                'follower_id' => 162,
                'created_at' => '2017-09-12 22:31:34',
                'updated_at' => '2017-09-12 22:31:34',
            ),
            81 => 
            array (
                'id' => 82,
                'following_id' => 91,
                'follower_id' => 71,
                'created_at' => '2017-09-11 09:27:46',
                'updated_at' => '2017-09-11 09:27:46',
            ),
            82 => 
            array (
                'id' => 83,
                'following_id' => 133,
                'follower_id' => 176,
                'created_at' => '2017-09-23 09:33:09',
                'updated_at' => '2017-09-23 09:33:09',
            ),
            83 => 
            array (
                'id' => 84,
                'following_id' => 155,
                'follower_id' => 52,
                'created_at' => '2017-09-03 03:03:14',
                'updated_at' => '2017-09-03 03:03:14',
            ),
            84 => 
            array (
                'id' => 85,
                'following_id' => 94,
                'follower_id' => 103,
                'created_at' => '2017-09-07 10:25:09',
                'updated_at' => '2017-09-07 10:25:09',
            ),
            85 => 
            array (
                'id' => 86,
                'following_id' => 128,
                'follower_id' => 84,
                'created_at' => '2017-09-17 07:34:35',
                'updated_at' => '2017-09-17 07:34:35',
            ),
            86 => 
            array (
                'id' => 87,
                'following_id' => 38,
                'follower_id' => 17,
                'created_at' => '2017-09-16 16:38:32',
                'updated_at' => '2017-09-16 16:38:32',
            ),
            87 => 
            array (
                'id' => 88,
                'following_id' => 35,
                'follower_id' => 112,
                'created_at' => '2017-09-21 19:47:44',
                'updated_at' => '2017-09-21 19:47:44',
            ),
            88 => 
            array (
                'id' => 89,
                'following_id' => 6,
                'follower_id' => 131,
                'created_at' => '2017-09-04 02:52:00',
                'updated_at' => '2017-09-04 02:52:00',
            ),
            89 => 
            array (
                'id' => 90,
                'following_id' => 93,
                'follower_id' => 118,
                'created_at' => '2017-09-15 11:50:39',
                'updated_at' => '2017-09-15 11:50:39',
            ),
            90 => 
            array (
                'id' => 91,
                'following_id' => 64,
                'follower_id' => 84,
                'created_at' => '2017-09-20 08:27:15',
                'updated_at' => '2017-09-20 08:27:15',
            ),
            91 => 
            array (
                'id' => 92,
                'following_id' => 45,
                'follower_id' => 52,
                'created_at' => '2017-08-29 12:45:33',
                'updated_at' => '2017-08-29 12:45:33',
            ),
            92 => 
            array (
                'id' => 93,
                'following_id' => 150,
                'follower_id' => 146,
                'created_at' => '2017-09-13 12:13:50',
                'updated_at' => '2017-09-13 12:13:50',
            ),
            93 => 
            array (
                'id' => 94,
                'following_id' => 159,
                'follower_id' => 38,
                'created_at' => '2017-09-13 11:59:09',
                'updated_at' => '2017-09-13 11:59:09',
            ),
            94 => 
            array (
                'id' => 95,
                'following_id' => 39,
                'follower_id' => 110,
                'created_at' => '2017-09-18 00:35:57',
                'updated_at' => '2017-09-18 00:35:57',
            ),
            95 => 
            array (
                'id' => 96,
                'following_id' => 56,
                'follower_id' => 177,
                'created_at' => '2017-09-05 17:32:35',
                'updated_at' => '2017-09-05 17:32:35',
            ),
            96 => 
            array (
                'id' => 97,
                'following_id' => 39,
                'follower_id' => 44,
                'created_at' => '2017-09-22 18:02:49',
                'updated_at' => '2017-09-22 18:02:49',
            ),
            97 => 
            array (
                'id' => 98,
                'following_id' => 143,
                'follower_id' => 50,
                'created_at' => '2017-09-07 00:21:22',
                'updated_at' => '2017-09-07 00:21:22',
            ),
            98 => 
            array (
                'id' => 99,
                'following_id' => 68,
                'follower_id' => 192,
                'created_at' => '2017-09-01 10:29:34',
                'updated_at' => '2017-09-01 10:29:34',
            ),
            99 => 
            array (
                'id' => 100,
                'following_id' => 122,
                'follower_id' => 51,
                'created_at' => '2017-09-15 06:02:38',
                'updated_at' => '2017-09-15 06:02:38',
            ),
            100 => 
            array (
                'id' => 101,
                'following_id' => 14,
                'follower_id' => 141,
                'created_at' => '2017-09-21 07:57:19',
                'updated_at' => '2017-09-21 07:57:19',
            ),
            101 => 
            array (
                'id' => 102,
                'following_id' => 161,
                'follower_id' => 138,
                'created_at' => '2017-09-01 10:06:49',
                'updated_at' => '2017-09-01 10:06:49',
            ),
            102 => 
            array (
                'id' => 103,
                'following_id' => 76,
                'follower_id' => 99,
                'created_at' => '2017-08-26 03:21:42',
                'updated_at' => '2017-08-26 03:21:42',
            ),
            103 => 
            array (
                'id' => 104,
                'following_id' => 10,
                'follower_id' => 82,
                'created_at' => '2017-09-13 04:32:31',
                'updated_at' => '2017-09-13 04:32:31',
            ),
            104 => 
            array (
                'id' => 105,
                'following_id' => 131,
                'follower_id' => 11,
                'created_at' => '2017-09-24 22:26:35',
                'updated_at' => '2017-09-24 22:26:35',
            ),
            105 => 
            array (
                'id' => 106,
                'following_id' => 15,
                'follower_id' => 58,
                'created_at' => '2017-08-30 16:20:59',
                'updated_at' => '2017-08-30 16:20:59',
            ),
            106 => 
            array (
                'id' => 107,
                'following_id' => 177,
                'follower_id' => 47,
                'created_at' => '2017-09-18 11:13:14',
                'updated_at' => '2017-09-18 11:13:14',
            ),
            107 => 
            array (
                'id' => 108,
                'following_id' => 29,
                'follower_id' => 19,
                'created_at' => '2017-09-21 13:00:28',
                'updated_at' => '2017-09-21 13:00:28',
            ),
            108 => 
            array (
                'id' => 109,
                'following_id' => 83,
                'follower_id' => 85,
                'created_at' => '2017-09-06 20:29:19',
                'updated_at' => '2017-09-06 20:29:19',
            ),
            109 => 
            array (
                'id' => 110,
                'following_id' => 169,
                'follower_id' => 13,
                'created_at' => '2017-09-07 21:31:15',
                'updated_at' => '2017-09-07 21:31:15',
            ),
            110 => 
            array (
                'id' => 111,
                'following_id' => 169,
                'follower_id' => 139,
                'created_at' => '2017-09-08 14:21:03',
                'updated_at' => '2017-09-08 14:21:03',
            ),
            111 => 
            array (
                'id' => 112,
                'following_id' => 92,
                'follower_id' => 95,
                'created_at' => '2017-08-27 06:07:16',
                'updated_at' => '2017-08-27 06:07:16',
            ),
            112 => 
            array (
                'id' => 113,
                'following_id' => 155,
                'follower_id' => 166,
                'created_at' => '2017-09-16 04:37:49',
                'updated_at' => '2017-09-16 04:37:49',
            ),
            113 => 
            array (
                'id' => 114,
                'following_id' => 40,
                'follower_id' => 125,
                'created_at' => '2017-09-20 01:28:12',
                'updated_at' => '2017-09-20 01:28:12',
            ),
            114 => 
            array (
                'id' => 115,
                'following_id' => 106,
                'follower_id' => 161,
                'created_at' => '2017-09-21 02:49:26',
                'updated_at' => '2017-09-21 02:49:26',
            ),
            115 => 
            array (
                'id' => 116,
                'following_id' => 146,
                'follower_id' => 84,
                'created_at' => '2017-09-17 17:05:40',
                'updated_at' => '2017-09-17 17:05:40',
            ),
            116 => 
            array (
                'id' => 117,
                'following_id' => 12,
                'follower_id' => 161,
                'created_at' => '2017-09-23 22:58:57',
                'updated_at' => '2017-09-23 22:58:57',
            ),
            117 => 
            array (
                'id' => 118,
                'following_id' => 97,
                'follower_id' => 93,
                'created_at' => '2017-09-23 03:35:46',
                'updated_at' => '2017-09-23 03:35:46',
            ),
            118 => 
            array (
                'id' => 119,
                'following_id' => 54,
                'follower_id' => 91,
                'created_at' => '2017-09-19 08:00:44',
                'updated_at' => '2017-09-19 08:00:44',
            ),
            119 => 
            array (
                'id' => 120,
                'following_id' => 152,
                'follower_id' => 168,
                'created_at' => '2017-09-21 00:08:20',
                'updated_at' => '2017-09-21 00:08:20',
            ),
            120 => 
            array (
                'id' => 121,
                'following_id' => 147,
                'follower_id' => 77,
                'created_at' => '2017-09-14 01:52:16',
                'updated_at' => '2017-09-14 01:52:16',
            ),
            121 => 
            array (
                'id' => 122,
                'following_id' => 92,
                'follower_id' => 102,
                'created_at' => '2017-09-24 07:04:28',
                'updated_at' => '2017-09-24 07:04:28',
            ),
            122 => 
            array (
                'id' => 123,
                'following_id' => 89,
                'follower_id' => 38,
                'created_at' => '2017-09-08 03:22:56',
                'updated_at' => '2017-09-08 03:22:56',
            ),
            123 => 
            array (
                'id' => 124,
                'following_id' => 79,
                'follower_id' => 134,
                'created_at' => '2017-08-29 20:39:25',
                'updated_at' => '2017-08-29 20:39:25',
            ),
            124 => 
            array (
                'id' => 125,
                'following_id' => 32,
                'follower_id' => 183,
                'created_at' => '2017-08-30 04:33:41',
                'updated_at' => '2017-08-30 04:33:41',
            ),
            125 => 
            array (
                'id' => 126,
                'following_id' => 118,
                'follower_id' => 136,
                'created_at' => '2017-09-15 14:07:24',
                'updated_at' => '2017-09-15 14:07:24',
            ),
            126 => 
            array (
                'id' => 127,
                'following_id' => 14,
                'follower_id' => 58,
                'created_at' => '2017-08-26 20:39:47',
                'updated_at' => '2017-08-26 20:39:47',
            ),
            127 => 
            array (
                'id' => 128,
                'following_id' => 97,
                'follower_id' => 92,
                'created_at' => '2017-09-14 17:35:47',
                'updated_at' => '2017-09-14 17:35:47',
            ),
            128 => 
            array (
                'id' => 129,
                'following_id' => 193,
                'follower_id' => 75,
                'created_at' => '2017-09-21 12:10:08',
                'updated_at' => '2017-09-21 12:10:08',
            ),
            129 => 
            array (
                'id' => 130,
                'following_id' => 153,
                'follower_id' => 115,
                'created_at' => '2017-08-31 09:30:12',
                'updated_at' => '2017-08-31 09:30:12',
            ),
            130 => 
            array (
                'id' => 131,
                'following_id' => 185,
                'follower_id' => 8,
                'created_at' => '2017-09-14 08:35:54',
                'updated_at' => '2017-09-14 08:35:54',
            ),
            131 => 
            array (
                'id' => 132,
                'following_id' => 7,
                'follower_id' => 68,
                'created_at' => '2017-08-26 22:14:11',
                'updated_at' => '2017-08-26 22:14:11',
            ),
            132 => 
            array (
                'id' => 133,
                'following_id' => 55,
                'follower_id' => 92,
                'created_at' => '2017-09-14 08:30:21',
                'updated_at' => '2017-09-14 08:30:21',
            ),
            133 => 
            array (
                'id' => 134,
                'following_id' => 42,
                'follower_id' => 66,
                'created_at' => '2017-08-30 21:31:34',
                'updated_at' => '2017-08-30 21:31:34',
            ),
            134 => 
            array (
                'id' => 135,
                'following_id' => 80,
                'follower_id' => 118,
                'created_at' => '2017-09-01 18:45:29',
                'updated_at' => '2017-09-01 18:45:29',
            ),
            135 => 
            array (
                'id' => 136,
                'following_id' => 107,
                'follower_id' => 119,
                'created_at' => '2017-09-06 19:33:44',
                'updated_at' => '2017-09-06 19:33:44',
            ),
            136 => 
            array (
                'id' => 137,
                'following_id' => 167,
                'follower_id' => 194,
                'created_at' => '2017-09-22 21:44:42',
                'updated_at' => '2017-09-22 21:44:42',
            ),
            137 => 
            array (
                'id' => 138,
                'following_id' => 164,
                'follower_id' => 82,
                'created_at' => '2017-09-11 21:26:58',
                'updated_at' => '2017-09-11 21:26:58',
            ),
            138 => 
            array (
                'id' => 139,
                'following_id' => 8,
                'follower_id' => 165,
                'created_at' => '2017-09-14 15:10:53',
                'updated_at' => '2017-09-14 15:10:53',
            ),
            139 => 
            array (
                'id' => 140,
                'following_id' => 138,
                'follower_id' => 10,
                'created_at' => '2017-09-21 23:42:30',
                'updated_at' => '2017-09-21 23:42:30',
            ),
            140 => 
            array (
                'id' => 141,
                'following_id' => 120,
                'follower_id' => 118,
                'created_at' => '2017-08-27 20:39:03',
                'updated_at' => '2017-08-27 20:39:03',
            ),
            141 => 
            array (
                'id' => 142,
                'following_id' => 32,
                'follower_id' => 101,
                'created_at' => '2017-09-11 18:24:33',
                'updated_at' => '2017-09-11 18:24:33',
            ),
            142 => 
            array (
                'id' => 143,
                'following_id' => 97,
                'follower_id' => 114,
                'created_at' => '2017-08-31 06:06:10',
                'updated_at' => '2017-08-31 06:06:10',
            ),
            143 => 
            array (
                'id' => 144,
                'following_id' => 154,
                'follower_id' => 14,
                'created_at' => '2017-09-23 14:57:38',
                'updated_at' => '2017-09-23 14:57:38',
            ),
            144 => 
            array (
                'id' => 145,
                'following_id' => 106,
                'follower_id' => 186,
                'created_at' => '2017-09-06 10:57:57',
                'updated_at' => '2017-09-06 10:57:57',
            ),
            145 => 
            array (
                'id' => 146,
                'following_id' => 32,
                'follower_id' => 62,
                'created_at' => '2017-09-04 23:10:49',
                'updated_at' => '2017-09-04 23:10:49',
            ),
            146 => 
            array (
                'id' => 147,
                'following_id' => 19,
                'follower_id' => 51,
                'created_at' => '2017-08-27 14:07:15',
                'updated_at' => '2017-08-27 14:07:15',
            ),
            147 => 
            array (
                'id' => 148,
                'following_id' => 26,
                'follower_id' => 86,
                'created_at' => '2017-09-17 06:54:57',
                'updated_at' => '2017-09-17 06:54:57',
            ),
            148 => 
            array (
                'id' => 149,
                'following_id' => 30,
                'follower_id' => 137,
                'created_at' => '2017-09-15 11:51:22',
                'updated_at' => '2017-09-15 11:51:22',
            ),
            149 => 
            array (
                'id' => 150,
                'following_id' => 133,
                'follower_id' => 72,
                'created_at' => '2017-09-12 13:31:31',
                'updated_at' => '2017-09-12 13:31:31',
            ),
            150 => 
            array (
                'id' => 151,
                'following_id' => 50,
                'follower_id' => 41,
                'created_at' => '2017-09-09 19:29:36',
                'updated_at' => '2017-09-09 19:29:36',
            ),
            151 => 
            array (
                'id' => 152,
                'following_id' => 159,
                'follower_id' => 148,
                'created_at' => '2017-09-13 16:06:26',
                'updated_at' => '2017-09-13 16:06:26',
            ),
            152 => 
            array (
                'id' => 153,
                'following_id' => 14,
                'follower_id' => 22,
                'created_at' => '2017-09-07 04:09:00',
                'updated_at' => '2017-09-07 04:09:00',
            ),
            153 => 
            array (
                'id' => 154,
                'following_id' => 183,
                'follower_id' => 61,
                'created_at' => '2017-09-16 06:50:03',
                'updated_at' => '2017-09-16 06:50:03',
            ),
            154 => 
            array (
                'id' => 155,
                'following_id' => 107,
                'follower_id' => 69,
                'created_at' => '2017-09-11 22:48:03',
                'updated_at' => '2017-09-11 22:48:03',
            ),
            155 => 
            array (
                'id' => 156,
                'following_id' => 146,
                'follower_id' => 14,
                'created_at' => '2017-09-12 21:18:37',
                'updated_at' => '2017-09-12 21:18:37',
            ),
            156 => 
            array (
                'id' => 157,
                'following_id' => 28,
                'follower_id' => 43,
                'created_at' => '2017-09-17 18:47:37',
                'updated_at' => '2017-09-17 18:47:37',
            ),
            157 => 
            array (
                'id' => 158,
                'following_id' => 99,
                'follower_id' => 178,
                'created_at' => '2017-09-06 01:40:39',
                'updated_at' => '2017-09-06 01:40:39',
            ),
            158 => 
            array (
                'id' => 159,
                'following_id' => 172,
                'follower_id' => 74,
                'created_at' => '2017-09-04 00:11:34',
                'updated_at' => '2017-09-04 00:11:34',
            ),
            159 => 
            array (
                'id' => 160,
                'following_id' => 148,
                'follower_id' => 101,
                'created_at' => '2017-09-23 17:49:23',
                'updated_at' => '2017-09-23 17:49:23',
            ),
            160 => 
            array (
                'id' => 161,
                'following_id' => 150,
                'follower_id' => 90,
                'created_at' => '2017-08-31 21:36:54',
                'updated_at' => '2017-08-31 21:36:54',
            ),
            161 => 
            array (
                'id' => 162,
                'following_id' => 70,
                'follower_id' => 180,
                'created_at' => '2017-09-11 14:00:38',
                'updated_at' => '2017-09-11 14:00:38',
            ),
            162 => 
            array (
                'id' => 163,
                'following_id' => 82,
                'follower_id' => 22,
                'created_at' => '2017-09-23 14:07:07',
                'updated_at' => '2017-09-23 14:07:07',
            ),
            163 => 
            array (
                'id' => 164,
                'following_id' => 190,
                'follower_id' => 64,
                'created_at' => '2017-08-29 02:30:25',
                'updated_at' => '2017-08-29 02:30:25',
            ),
            164 => 
            array (
                'id' => 165,
                'following_id' => 29,
                'follower_id' => 95,
                'created_at' => '2017-09-01 12:45:24',
                'updated_at' => '2017-09-01 12:45:24',
            ),
            165 => 
            array (
                'id' => 166,
                'following_id' => 5,
                'follower_id' => 35,
                'created_at' => '2017-09-16 03:50:35',
                'updated_at' => '2017-09-16 03:50:35',
            ),
            166 => 
            array (
                'id' => 167,
                'following_id' => 37,
                'follower_id' => 87,
                'created_at' => '2017-08-30 23:15:21',
                'updated_at' => '2017-08-30 23:15:21',
            ),
            167 => 
            array (
                'id' => 168,
                'following_id' => 132,
                'follower_id' => 43,
                'created_at' => '2017-09-06 01:03:32',
                'updated_at' => '2017-09-06 01:03:32',
            ),
            168 => 
            array (
                'id' => 169,
                'following_id' => 150,
                'follower_id' => 115,
                'created_at' => '2017-09-17 03:22:08',
                'updated_at' => '2017-09-17 03:22:08',
            ),
            169 => 
            array (
                'id' => 170,
                'following_id' => 45,
                'follower_id' => 137,
                'created_at' => '2017-09-16 21:55:43',
                'updated_at' => '2017-09-16 21:55:43',
            ),
            170 => 
            array (
                'id' => 171,
                'following_id' => 55,
                'follower_id' => 62,
                'created_at' => '2017-09-14 19:47:19',
                'updated_at' => '2017-09-14 19:47:19',
            ),
            171 => 
            array (
                'id' => 172,
                'following_id' => 72,
                'follower_id' => 82,
                'created_at' => '2017-09-01 16:37:35',
                'updated_at' => '2017-09-01 16:37:35',
            ),
            172 => 
            array (
                'id' => 173,
                'following_id' => 123,
                'follower_id' => 187,
                'created_at' => '2017-09-19 10:15:59',
                'updated_at' => '2017-09-19 10:15:59',
            ),
            173 => 
            array (
                'id' => 174,
                'following_id' => 110,
                'follower_id' => 105,
                'created_at' => '2017-08-25 23:18:53',
                'updated_at' => '2017-08-25 23:18:53',
            ),
            174 => 
            array (
                'id' => 175,
                'following_id' => 128,
                'follower_id' => 3,
                'created_at' => '2017-09-22 20:06:40',
                'updated_at' => '2017-09-22 20:06:40',
            ),
            175 => 
            array (
                'id' => 176,
                'following_id' => 35,
                'follower_id' => 185,
                'created_at' => '2017-08-31 14:03:15',
                'updated_at' => '2017-08-31 14:03:15',
            ),
            176 => 
            array (
                'id' => 177,
                'following_id' => 151,
                'follower_id' => 48,
                'created_at' => '2017-09-21 08:31:39',
                'updated_at' => '2017-09-21 08:31:39',
            ),
            177 => 
            array (
                'id' => 178,
                'following_id' => 169,
                'follower_id' => 76,
                'created_at' => '2017-09-22 13:19:55',
                'updated_at' => '2017-09-22 13:19:55',
            ),
            178 => 
            array (
                'id' => 179,
                'following_id' => 123,
                'follower_id' => 134,
                'created_at' => '2017-09-19 13:04:57',
                'updated_at' => '2017-09-19 13:04:57',
            ),
            179 => 
            array (
                'id' => 180,
                'following_id' => 151,
                'follower_id' => 23,
                'created_at' => '2017-09-10 14:01:07',
                'updated_at' => '2017-09-10 14:01:07',
            ),
            180 => 
            array (
                'id' => 181,
                'following_id' => 163,
                'follower_id' => 154,
                'created_at' => '2017-09-19 18:39:33',
                'updated_at' => '2017-09-19 18:39:33',
            ),
            181 => 
            array (
                'id' => 182,
                'following_id' => 154,
                'follower_id' => 111,
                'created_at' => '2017-09-11 21:51:43',
                'updated_at' => '2017-09-11 21:51:43',
            ),
            182 => 
            array (
                'id' => 183,
                'following_id' => 76,
                'follower_id' => 93,
                'created_at' => '2017-09-04 01:31:16',
                'updated_at' => '2017-09-04 01:31:16',
            ),
            183 => 
            array (
                'id' => 184,
                'following_id' => 121,
                'follower_id' => 102,
                'created_at' => '2017-09-16 22:35:14',
                'updated_at' => '2017-09-16 22:35:14',
            ),
            184 => 
            array (
                'id' => 185,
                'following_id' => 150,
                'follower_id' => 63,
                'created_at' => '2017-08-25 08:18:09',
                'updated_at' => '2017-08-25 08:18:09',
            ),
            185 => 
            array (
                'id' => 186,
                'following_id' => 105,
                'follower_id' => 24,
                'created_at' => '2017-09-14 23:09:32',
                'updated_at' => '2017-09-14 23:09:32',
            ),
            186 => 
            array (
                'id' => 187,
                'following_id' => 13,
                'follower_id' => 56,
                'created_at' => '2017-09-09 12:52:02',
                'updated_at' => '2017-09-09 12:52:02',
            ),
            187 => 
            array (
                'id' => 188,
                'following_id' => 47,
                'follower_id' => 186,
                'created_at' => '2017-09-17 19:50:54',
                'updated_at' => '2017-09-17 19:50:54',
            ),
            188 => 
            array (
                'id' => 189,
                'following_id' => 69,
                'follower_id' => 34,
                'created_at' => '2017-09-04 04:50:51',
                'updated_at' => '2017-09-04 04:50:51',
            ),
            189 => 
            array (
                'id' => 190,
                'following_id' => 188,
                'follower_id' => 107,
                'created_at' => '2017-09-12 13:57:41',
                'updated_at' => '2017-09-12 13:57:41',
            ),
            190 => 
            array (
                'id' => 191,
                'following_id' => 155,
                'follower_id' => 49,
                'created_at' => '2017-09-24 11:22:47',
                'updated_at' => '2017-09-24 11:22:47',
            ),
            191 => 
            array (
                'id' => 193,
                'following_id' => 67,
                'follower_id' => 164,
                'created_at' => '2017-09-20 06:53:28',
                'updated_at' => '2017-09-20 06:53:28',
            ),
            192 => 
            array (
                'id' => 194,
                'following_id' => 17,
                'follower_id' => 101,
                'created_at' => '2017-08-27 20:33:54',
                'updated_at' => '2017-08-27 20:33:54',
            ),
            193 => 
            array (
                'id' => 195,
                'following_id' => 178,
                'follower_id' => 14,
                'created_at' => '2017-09-14 13:01:06',
                'updated_at' => '2017-09-14 13:01:06',
            ),
            194 => 
            array (
                'id' => 196,
                'following_id' => 33,
                'follower_id' => 145,
                'created_at' => '2017-09-02 11:19:23',
                'updated_at' => '2017-09-02 11:19:23',
            ),
            195 => 
            array (
                'id' => 197,
                'following_id' => 190,
                'follower_id' => 54,
                'created_at' => '2017-09-08 05:31:03',
                'updated_at' => '2017-09-08 05:31:03',
            ),
            196 => 
            array (
                'id' => 198,
                'following_id' => 123,
                'follower_id' => 102,
                'created_at' => '2017-09-10 10:45:14',
                'updated_at' => '2017-09-10 10:45:14',
            ),
            197 => 
            array (
                'id' => 199,
                'following_id' => 13,
                'follower_id' => 158,
                'created_at' => '2017-09-15 09:18:16',
                'updated_at' => '2017-09-15 09:18:16',
            ),
            198 => 
            array (
                'id' => 200,
                'following_id' => 163,
                'follower_id' => 134,
                'created_at' => '2017-09-15 00:30:23',
                'updated_at' => '2017-09-15 00:30:23',
            ),
            199 => 
            array (
                'id' => 201,
                'following_id' => 176,
                'follower_id' => 9,
                'created_at' => '2017-09-23 20:40:56',
                'updated_at' => '2017-09-23 20:40:56',
            ),
            200 => 
            array (
                'id' => 202,
                'following_id' => 69,
                'follower_id' => 30,
                'created_at' => '2017-09-14 12:31:57',
                'updated_at' => '2017-09-14 12:31:57',
            ),
            201 => 
            array (
                'id' => 203,
                'following_id' => 93,
                'follower_id' => 152,
                'created_at' => '2017-09-06 19:06:27',
                'updated_at' => '2017-09-06 19:06:27',
            ),
            202 => 
            array (
                'id' => 204,
                'following_id' => 166,
                'follower_id' => 193,
                'created_at' => '2017-09-02 22:52:08',
                'updated_at' => '2017-09-02 22:52:08',
            ),
            203 => 
            array (
                'id' => 205,
                'following_id' => 190,
                'follower_id' => 80,
                'created_at' => '2017-08-27 15:46:30',
                'updated_at' => '2017-08-27 15:46:30',
            ),
            204 => 
            array (
                'id' => 206,
                'following_id' => 113,
                'follower_id' => 17,
                'created_at' => '2017-09-12 06:10:18',
                'updated_at' => '2017-09-12 06:10:18',
            ),
            205 => 
            array (
                'id' => 207,
                'following_id' => 182,
                'follower_id' => 47,
                'created_at' => '2017-09-07 11:15:27',
                'updated_at' => '2017-09-07 11:15:27',
            ),
            206 => 
            array (
                'id' => 208,
                'following_id' => 109,
                'follower_id' => 162,
                'created_at' => '2017-09-18 12:59:45',
                'updated_at' => '2017-09-18 12:59:45',
            ),
            207 => 
            array (
                'id' => 209,
                'following_id' => 161,
                'follower_id' => 157,
                'created_at' => '2017-09-21 17:48:54',
                'updated_at' => '2017-09-21 17:48:54',
            ),
            208 => 
            array (
                'id' => 210,
                'following_id' => 176,
                'follower_id' => 153,
                'created_at' => '2017-09-09 03:53:10',
                'updated_at' => '2017-09-09 03:53:10',
            ),
            209 => 
            array (
                'id' => 211,
                'following_id' => 21,
                'follower_id' => 140,
                'created_at' => '2017-09-09 14:02:08',
                'updated_at' => '2017-09-09 14:02:08',
            ),
            210 => 
            array (
                'id' => 212,
                'following_id' => 150,
                'follower_id' => 74,
                'created_at' => '2017-09-12 19:45:34',
                'updated_at' => '2017-09-12 19:45:34',
            ),
            211 => 
            array (
                'id' => 213,
                'following_id' => 74,
                'follower_id' => 44,
                'created_at' => '2017-09-07 05:40:09',
                'updated_at' => '2017-09-07 05:40:09',
            ),
            212 => 
            array (
                'id' => 214,
                'following_id' => 8,
                'follower_id' => 159,
                'created_at' => '2017-09-09 14:09:12',
                'updated_at' => '2017-09-09 14:09:12',
            ),
            213 => 
            array (
                'id' => 215,
                'following_id' => 133,
                'follower_id' => 169,
                'created_at' => '2017-09-07 04:04:34',
                'updated_at' => '2017-09-07 04:04:34',
            ),
            214 => 
            array (
                'id' => 216,
                'following_id' => 98,
                'follower_id' => 71,
                'created_at' => '2017-09-13 06:23:18',
                'updated_at' => '2017-09-13 06:23:18',
            ),
            215 => 
            array (
                'id' => 217,
                'following_id' => 172,
                'follower_id' => 184,
                'created_at' => '2017-09-03 18:51:02',
                'updated_at' => '2017-09-03 18:51:02',
            ),
            216 => 
            array (
                'id' => 218,
                'following_id' => 172,
                'follower_id' => 53,
                'created_at' => '2017-09-05 22:19:53',
                'updated_at' => '2017-09-05 22:19:53',
            ),
            217 => 
            array (
                'id' => 219,
                'following_id' => 141,
                'follower_id' => 157,
                'created_at' => '2017-09-21 17:27:14',
                'updated_at' => '2017-09-21 17:27:14',
            ),
            218 => 
            array (
                'id' => 220,
                'following_id' => 13,
                'follower_id' => 22,
                'created_at' => '2017-08-27 00:44:18',
                'updated_at' => '2017-08-27 00:44:18',
            ),
            219 => 
            array (
                'id' => 221,
                'following_id' => 162,
                'follower_id' => 43,
                'created_at' => '2017-09-14 08:59:10',
                'updated_at' => '2017-09-14 08:59:10',
            ),
            220 => 
            array (
                'id' => 222,
                'following_id' => 171,
                'follower_id' => 112,
                'created_at' => '2017-09-08 06:51:03',
                'updated_at' => '2017-09-08 06:51:03',
            ),
            221 => 
            array (
                'id' => 223,
                'following_id' => 119,
                'follower_id' => 92,
                'created_at' => '2017-08-29 13:53:54',
                'updated_at' => '2017-08-29 13:53:54',
            ),
            222 => 
            array (
                'id' => 224,
                'following_id' => 86,
                'follower_id' => 192,
                'created_at' => '2017-09-08 05:48:54',
                'updated_at' => '2017-09-08 05:48:54',
            ),
            223 => 
            array (
                'id' => 225,
                'following_id' => 60,
                'follower_id' => 138,
                'created_at' => '2017-09-23 07:11:07',
                'updated_at' => '2017-09-23 07:11:07',
            ),
            224 => 
            array (
                'id' => 226,
                'following_id' => 82,
                'follower_id' => 63,
                'created_at' => '2017-09-04 01:31:17',
                'updated_at' => '2017-09-04 01:31:17',
            ),
            225 => 
            array (
                'id' => 227,
                'following_id' => 122,
                'follower_id' => 191,
                'created_at' => '2017-09-16 22:35:15',
                'updated_at' => '2017-09-16 22:35:15',
            ),
            226 => 
            array (
                'id' => 228,
                'following_id' => 54,
                'follower_id' => 31,
                'created_at' => '2017-08-25 08:18:10',
                'updated_at' => '2017-08-25 08:18:10',
            ),
            227 => 
            array (
                'id' => 229,
                'following_id' => 112,
                'follower_id' => 84,
                'created_at' => '2017-09-14 23:09:33',
                'updated_at' => '2017-09-14 23:09:33',
            ),
            228 => 
            array (
                'id' => 230,
                'following_id' => 146,
                'follower_id' => 15,
                'created_at' => '2017-09-09 12:52:03',
                'updated_at' => '2017-09-09 12:52:03',
            ),
            229 => 
            array (
                'id' => 231,
                'following_id' => 62,
                'follower_id' => 125,
                'created_at' => '2017-09-17 19:50:55',
                'updated_at' => '2017-09-17 19:50:55',
            ),
            230 => 
            array (
                'id' => 232,
                'following_id' => 122,
                'follower_id' => 18,
                'created_at' => '2017-09-04 04:50:52',
                'updated_at' => '2017-09-04 04:50:52',
            ),
            231 => 
            array (
                'id' => 233,
                'following_id' => 79,
                'follower_id' => 101,
                'created_at' => '2017-09-12 13:57:42',
                'updated_at' => '2017-09-12 13:57:42',
            ),
            232 => 
            array (
                'id' => 234,
                'following_id' => 44,
                'follower_id' => 74,
                'created_at' => '2017-09-24 11:22:48',
                'updated_at' => '2017-09-24 11:22:48',
            ),
            233 => 
            array (
                'id' => 235,
                'following_id' => 163,
                'follower_id' => 96,
                'created_at' => '2017-09-20 06:53:29',
                'updated_at' => '2017-09-20 06:53:29',
            ),
            234 => 
            array (
                'id' => 236,
                'following_id' => 43,
                'follower_id' => 70,
                'created_at' => '2017-08-27 20:33:55',
                'updated_at' => '2017-08-27 20:33:55',
            ),
            235 => 
            array (
                'id' => 237,
                'following_id' => 157,
                'follower_id' => 81,
                'created_at' => '2017-09-14 13:01:07',
                'updated_at' => '2017-09-14 13:01:07',
            ),
            236 => 
            array (
                'id' => 238,
                'following_id' => 188,
                'follower_id' => 34,
                'created_at' => '2017-09-02 11:19:24',
                'updated_at' => '2017-09-02 11:19:24',
            ),
            237 => 
            array (
                'id' => 239,
                'following_id' => 27,
                'follower_id' => 7,
                'created_at' => '2017-09-08 05:31:04',
                'updated_at' => '2017-09-08 05:31:04',
            ),
            238 => 
            array (
                'id' => 240,
                'following_id' => 29,
                'follower_id' => 47,
                'created_at' => '2017-09-10 10:45:15',
                'updated_at' => '2017-09-10 10:45:15',
            ),
            239 => 
            array (
                'id' => 241,
                'following_id' => 70,
                'follower_id' => 112,
                'created_at' => '2017-09-15 09:18:17',
                'updated_at' => '2017-09-15 09:18:17',
            ),
            240 => 
            array (
                'id' => 242,
                'following_id' => 126,
                'follower_id' => 52,
                'created_at' => '2017-09-15 00:30:24',
                'updated_at' => '2017-09-15 00:30:24',
            ),
            241 => 
            array (
                'id' => 244,
                'following_id' => 33,
                'follower_id' => 37,
                'created_at' => '2017-09-23 20:40:57',
                'updated_at' => '2017-09-23 20:40:57',
            ),
            242 => 
            array (
                'id' => 245,
                'following_id' => 102,
                'follower_id' => 181,
                'created_at' => '2017-09-14 12:31:58',
                'updated_at' => '2017-09-14 12:31:58',
            ),
            243 => 
            array (
                'id' => 246,
                'following_id' => 70,
                'follower_id' => 2,
                'created_at' => '2017-09-06 19:06:28',
                'updated_at' => '2017-09-06 19:06:28',
            ),
            244 => 
            array (
                'id' => 247,
                'following_id' => 90,
                'follower_id' => 192,
                'created_at' => '2017-09-02 22:52:09',
                'updated_at' => '2017-09-02 22:52:09',
            ),
            245 => 
            array (
                'id' => 248,
                'following_id' => 119,
                'follower_id' => 102,
                'created_at' => '2017-08-27 15:46:31',
                'updated_at' => '2017-08-27 15:46:31',
            ),
            246 => 
            array (
                'id' => 249,
                'following_id' => 64,
                'follower_id' => 86,
                'created_at' => '2017-09-12 06:10:19',
                'updated_at' => '2017-09-12 06:10:19',
            ),
            247 => 
            array (
                'id' => 250,
                'following_id' => 123,
                'follower_id' => 5,
                'created_at' => '2017-09-07 11:15:28',
                'updated_at' => '2017-09-07 11:15:28',
            ),
            248 => 
            array (
                'id' => 251,
                'following_id' => 19,
                'follower_id' => 18,
                'created_at' => '2017-09-18 12:59:46',
                'updated_at' => '2017-09-18 12:59:46',
            ),
            249 => 
            array (
                'id' => 252,
                'following_id' => 50,
                'follower_id' => 118,
                'created_at' => '2017-09-21 17:48:55',
                'updated_at' => '2017-09-21 17:48:55',
            ),
            250 => 
            array (
                'id' => 253,
                'following_id' => 85,
                'follower_id' => 160,
                'created_at' => '2017-09-09 03:53:11',
                'updated_at' => '2017-09-09 03:53:11',
            ),
            251 => 
            array (
                'id' => 254,
                'following_id' => 144,
                'follower_id' => 92,
                'created_at' => '2017-09-09 14:02:09',
                'updated_at' => '2017-09-09 14:02:09',
            ),
            252 => 
            array (
                'id' => 255,
                'following_id' => 119,
                'follower_id' => 182,
                'created_at' => '2017-09-12 19:45:35',
                'updated_at' => '2017-09-12 19:45:35',
            ),
            253 => 
            array (
                'id' => 256,
                'following_id' => 157,
                'follower_id' => 52,
                'created_at' => '2017-09-07 05:40:10',
                'updated_at' => '2017-09-07 05:40:10',
            ),
            254 => 
            array (
                'id' => 257,
                'following_id' => 22,
                'follower_id' => 161,
                'created_at' => '2017-09-09 14:09:13',
                'updated_at' => '2017-09-09 14:09:13',
            ),
            255 => 
            array (
                'id' => 258,
                'following_id' => 60,
                'follower_id' => 108,
                'created_at' => '2017-09-07 04:04:35',
                'updated_at' => '2017-09-07 04:04:35',
            ),
            256 => 
            array (
                'id' => 259,
                'following_id' => 110,
                'follower_id' => 106,
                'created_at' => '2017-09-13 06:23:19',
                'updated_at' => '2017-09-13 06:23:19',
            ),
            257 => 
            array (
                'id' => 260,
                'following_id' => 18,
                'follower_id' => 144,
                'created_at' => '2017-09-03 18:51:03',
                'updated_at' => '2017-09-03 18:51:03',
            ),
            258 => 
            array (
                'id' => 261,
                'following_id' => 172,
                'follower_id' => 109,
                'created_at' => '2017-09-05 22:19:54',
                'updated_at' => '2017-09-05 22:19:54',
            ),
            259 => 
            array (
                'id' => 262,
                'following_id' => 184,
                'follower_id' => 47,
                'created_at' => '2017-09-21 17:27:15',
                'updated_at' => '2017-09-21 17:27:15',
            ),
            260 => 
            array (
                'id' => 263,
                'following_id' => 187,
                'follower_id' => 164,
                'created_at' => '2017-08-27 00:44:19',
                'updated_at' => '2017-08-27 00:44:19',
            ),
            261 => 
            array (
                'id' => 264,
                'following_id' => 7,
                'follower_id' => 142,
                'created_at' => '2017-09-14 08:59:11',
                'updated_at' => '2017-09-14 08:59:11',
            ),
            262 => 
            array (
                'id' => 265,
                'following_id' => 109,
                'follower_id' => 53,
                'created_at' => '2017-09-08 06:51:04',
                'updated_at' => '2017-09-08 06:51:04',
            ),
            263 => 
            array (
                'id' => 266,
                'following_id' => 150,
                'follower_id' => 156,
                'created_at' => '2017-08-29 13:53:55',
                'updated_at' => '2017-08-29 13:53:55',
            ),
            264 => 
            array (
                'id' => 267,
                'following_id' => 41,
                'follower_id' => 81,
                'created_at' => '2017-09-08 05:48:55',
                'updated_at' => '2017-09-08 05:48:55',
            ),
            265 => 
            array (
                'id' => 268,
                'following_id' => 63,
                'follower_id' => 144,
                'created_at' => '2017-09-23 07:11:08',
                'updated_at' => '2017-09-23 07:11:08',
            ),
            266 => 
            array (
                'id' => 269,
                'following_id' => 126,
                'follower_id' => 43,
                'created_at' => '2017-09-04 01:31:18',
                'updated_at' => '2017-09-04 01:31:18',
            ),
            267 => 
            array (
                'id' => 270,
                'following_id' => 129,
                'follower_id' => 106,
                'created_at' => '2017-09-16 22:35:16',
                'updated_at' => '2017-09-16 22:35:16',
            ),
            268 => 
            array (
                'id' => 271,
                'following_id' => 104,
                'follower_id' => 160,
                'created_at' => '2017-08-25 08:18:11',
                'updated_at' => '2017-08-25 08:18:11',
            ),
            269 => 
            array (
                'id' => 272,
                'following_id' => 95,
                'follower_id' => 97,
                'created_at' => '2017-09-14 23:09:34',
                'updated_at' => '2017-09-14 23:09:34',
            ),
            270 => 
            array (
                'id' => 273,
                'following_id' => 46,
                'follower_id' => 106,
                'created_at' => '2017-09-09 12:52:04',
                'updated_at' => '2017-09-09 12:52:04',
            ),
            271 => 
            array (
                'id' => 274,
                'following_id' => 185,
                'follower_id' => 17,
                'created_at' => '2017-09-17 19:50:56',
                'updated_at' => '2017-09-17 19:50:56',
            ),
            272 => 
            array (
                'id' => 275,
                'following_id' => 165,
                'follower_id' => 42,
                'created_at' => '2017-09-04 04:50:53',
                'updated_at' => '2017-09-04 04:50:53',
            ),
            273 => 
            array (
                'id' => 276,
                'following_id' => 74,
                'follower_id' => 54,
                'created_at' => '2017-09-12 13:57:43',
                'updated_at' => '2017-09-12 13:57:43',
            ),
            274 => 
            array (
                'id' => 277,
                'following_id' => 129,
                'follower_id' => 122,
                'created_at' => '2017-09-24 11:22:49',
                'updated_at' => '2017-09-24 11:22:49',
            ),
            275 => 
            array (
                'id' => 279,
                'following_id' => 187,
                'follower_id' => 17,
                'created_at' => '2017-09-20 06:53:30',
                'updated_at' => '2017-09-20 06:53:30',
            ),
            276 => 
            array (
                'id' => 280,
                'following_id' => 111,
                'follower_id' => 132,
                'created_at' => '2017-08-27 20:33:56',
                'updated_at' => '2017-08-27 20:33:56',
            ),
            277 => 
            array (
                'id' => 281,
                'following_id' => 114,
                'follower_id' => 3,
                'created_at' => '2017-09-14 13:01:08',
                'updated_at' => '2017-09-14 13:01:08',
            ),
            278 => 
            array (
                'id' => 282,
                'following_id' => 56,
                'follower_id' => 34,
                'created_at' => '2017-09-02 11:19:25',
                'updated_at' => '2017-09-02 11:19:25',
            ),
            279 => 
            array (
                'id' => 283,
                'following_id' => 146,
                'follower_id' => 43,
                'created_at' => '2017-09-08 05:31:05',
                'updated_at' => '2017-09-08 05:31:05',
            ),
            280 => 
            array (
                'id' => 284,
                'following_id' => 150,
                'follower_id' => 147,
                'created_at' => '2017-09-10 10:45:16',
                'updated_at' => '2017-09-10 10:45:16',
            ),
            281 => 
            array (
                'id' => 285,
                'following_id' => 59,
                'follower_id' => 125,
                'created_at' => '2017-09-15 09:18:18',
                'updated_at' => '2017-09-15 09:18:18',
            ),
            282 => 
            array (
                'id' => 286,
                'following_id' => 5,
                'follower_id' => 158,
                'created_at' => '2017-09-15 00:30:25',
                'updated_at' => '2017-09-15 00:30:25',
            ),
            283 => 
            array (
                'id' => 287,
                'following_id' => 116,
                'follower_id' => 184,
                'created_at' => '2017-09-23 20:40:58',
                'updated_at' => '2017-09-23 20:40:58',
            ),
            284 => 
            array (
                'id' => 288,
                'following_id' => 157,
                'follower_id' => 167,
                'created_at' => '2017-09-14 12:31:59',
                'updated_at' => '2017-09-14 12:31:59',
            ),
            285 => 
            array (
                'id' => 289,
                'following_id' => 79,
                'follower_id' => 179,
                'created_at' => '2017-09-06 19:06:29',
                'updated_at' => '2017-09-06 19:06:29',
            ),
            286 => 
            array (
                'id' => 290,
                'following_id' => 87,
                'follower_id' => 33,
                'created_at' => '2017-09-02 22:52:10',
                'updated_at' => '2017-09-02 22:52:10',
            ),
            287 => 
            array (
                'id' => 291,
                'following_id' => 175,
                'follower_id' => 105,
                'created_at' => '2017-08-27 15:46:32',
                'updated_at' => '2017-08-27 15:46:32',
            ),
            288 => 
            array (
                'id' => 292,
                'following_id' => 155,
                'follower_id' => 9,
                'created_at' => '2017-09-12 06:10:20',
                'updated_at' => '2017-09-12 06:10:20',
            ),
            289 => 
            array (
                'id' => 293,
                'following_id' => 155,
                'follower_id' => 13,
                'created_at' => '2017-09-07 11:15:29',
                'updated_at' => '2017-09-07 11:15:29',
            ),
            290 => 
            array (
                'id' => 294,
                'following_id' => 194,
                'follower_id' => 164,
                'created_at' => '2017-09-18 12:59:47',
                'updated_at' => '2017-09-18 12:59:47',
            ),
            291 => 
            array (
                'id' => 295,
                'following_id' => 91,
                'follower_id' => 141,
                'created_at' => '2017-09-21 17:48:56',
                'updated_at' => '2017-09-21 17:48:56',
            ),
            292 => 
            array (
                'id' => 296,
                'following_id' => 46,
                'follower_id' => 177,
                'created_at' => '2017-09-09 03:53:12',
                'updated_at' => '2017-09-09 03:53:12',
            ),
            293 => 
            array (
                'id' => 297,
                'following_id' => 60,
                'follower_id' => 171,
                'created_at' => '2017-09-09 14:02:10',
                'updated_at' => '2017-09-09 14:02:10',
            ),
            294 => 
            array (
                'id' => 298,
                'following_id' => 65,
                'follower_id' => 190,
                'created_at' => '2017-09-12 19:45:36',
                'updated_at' => '2017-09-12 19:45:36',
            ),
            295 => 
            array (
                'id' => 299,
                'following_id' => 38,
                'follower_id' => 121,
                'created_at' => '2017-09-07 05:40:11',
                'updated_at' => '2017-09-07 05:40:11',
            ),
            296 => 
            array (
                'id' => 300,
                'following_id' => 15,
                'follower_id' => 77,
                'created_at' => '2017-09-09 14:09:14',
                'updated_at' => '2017-09-09 14:09:14',
            ),
            297 => 
            array (
                'id' => 301,
                'following_id' => 86,
                'follower_id' => 193,
                'created_at' => '2017-09-07 04:04:36',
                'updated_at' => '2017-09-07 04:04:36',
            ),
            298 => 
            array (
                'id' => 302,
                'following_id' => 23,
                'follower_id' => 172,
                'created_at' => '2017-09-13 06:23:20',
                'updated_at' => '2017-09-13 06:23:20',
            ),
            299 => 
            array (
                'id' => 303,
                'following_id' => 36,
                'follower_id' => 191,
                'created_at' => '2017-09-03 18:51:04',
                'updated_at' => '2017-09-03 18:51:04',
            ),
            300 => 
            array (
                'id' => 304,
                'following_id' => 10,
                'follower_id' => 75,
                'created_at' => '2017-09-05 22:19:55',
                'updated_at' => '2017-09-05 22:19:55',
            ),
            301 => 
            array (
                'id' => 305,
                'following_id' => 160,
                'follower_id' => 15,
                'created_at' => '2017-09-21 17:27:16',
                'updated_at' => '2017-09-21 17:27:16',
            ),
            302 => 
            array (
                'id' => 306,
                'following_id' => 4,
                'follower_id' => 193,
                'created_at' => '2017-08-27 00:44:20',
                'updated_at' => '2017-08-27 00:44:20',
            ),
            303 => 
            array (
                'id' => 307,
                'following_id' => 13,
                'follower_id' => 21,
                'created_at' => '2017-09-14 08:59:12',
                'updated_at' => '2017-09-14 08:59:12',
            ),
            304 => 
            array (
                'id' => 308,
                'following_id' => 75,
                'follower_id' => 89,
                'created_at' => '2017-09-08 06:51:05',
                'updated_at' => '2017-09-08 06:51:05',
            ),
            305 => 
            array (
                'id' => 309,
                'following_id' => 183,
                'follower_id' => 22,
                'created_at' => '2017-08-29 13:53:56',
                'updated_at' => '2017-08-29 13:53:56',
            ),
            306 => 
            array (
                'id' => 310,
                'following_id' => 180,
                'follower_id' => 147,
                'created_at' => '2017-09-08 05:48:56',
                'updated_at' => '2017-09-08 05:48:56',
            ),
            307 => 
            array (
                'id' => 311,
                'following_id' => 179,
                'follower_id' => 107,
                'created_at' => '2017-09-23 07:11:09',
                'updated_at' => '2017-09-23 07:11:09',
            ),
            308 => 
            array (
                'id' => 312,
                'following_id' => 59,
                'follower_id' => 143,
                'created_at' => '2017-09-04 01:31:19',
                'updated_at' => '2017-09-04 01:31:19',
            ),
            309 => 
            array (
                'id' => 313,
                'following_id' => 41,
                'follower_id' => 87,
                'created_at' => '2017-09-16 22:35:17',
                'updated_at' => '2017-09-16 22:35:17',
            ),
            310 => 
            array (
                'id' => 314,
                'following_id' => 187,
                'follower_id' => 86,
                'created_at' => '2017-08-25 08:18:12',
                'updated_at' => '2017-08-25 08:18:12',
            ),
            311 => 
            array (
                'id' => 315,
                'following_id' => 33,
                'follower_id' => 3,
                'created_at' => '2017-09-14 23:09:35',
                'updated_at' => '2017-09-14 23:09:35',
            ),
            312 => 
            array (
                'id' => 316,
                'following_id' => 109,
                'follower_id' => 60,
                'created_at' => '2017-09-09 12:52:05',
                'updated_at' => '2017-09-09 12:52:05',
            ),
            313 => 
            array (
                'id' => 317,
                'following_id' => 162,
                'follower_id' => 169,
                'created_at' => '2017-09-17 19:50:57',
                'updated_at' => '2017-09-17 19:50:57',
            ),
            314 => 
            array (
                'id' => 318,
                'following_id' => 4,
                'follower_id' => 64,
                'created_at' => '2017-09-04 04:50:54',
                'updated_at' => '2017-09-04 04:50:54',
            ),
            315 => 
            array (
                'id' => 319,
                'following_id' => 11,
                'follower_id' => 50,
                'created_at' => '2017-09-12 13:57:44',
                'updated_at' => '2017-09-12 13:57:44',
            ),
            316 => 
            array (
                'id' => 320,
                'following_id' => 73,
                'follower_id' => 192,
                'created_at' => '2017-09-24 11:22:50',
                'updated_at' => '2017-09-24 11:22:50',
            ),
            317 => 
            array (
                'id' => 321,
                'following_id' => 42,
                'follower_id' => 169,
                'created_at' => '2017-09-20 06:53:31',
                'updated_at' => '2017-09-20 06:53:31',
            ),
            318 => 
            array (
                'id' => 322,
                'following_id' => 65,
                'follower_id' => 161,
                'created_at' => '2017-08-27 20:33:57',
                'updated_at' => '2017-08-27 20:33:57',
            ),
            319 => 
            array (
                'id' => 323,
                'following_id' => 143,
                'follower_id' => 81,
                'created_at' => '2017-09-14 13:01:09',
                'updated_at' => '2017-09-14 13:01:09',
            ),
            320 => 
            array (
                'id' => 324,
                'following_id' => 128,
                'follower_id' => 81,
                'created_at' => '2017-09-02 11:19:26',
                'updated_at' => '2017-09-02 11:19:26',
            ),
            321 => 
            array (
                'id' => 325,
                'following_id' => 54,
                'follower_id' => 113,
                'created_at' => '2017-09-08 05:31:06',
                'updated_at' => '2017-09-08 05:31:06',
            ),
            322 => 
            array (
                'id' => 326,
                'following_id' => 32,
                'follower_id' => 143,
                'created_at' => '2017-09-10 10:45:17',
                'updated_at' => '2017-09-10 10:45:17',
            ),
            323 => 
            array (
                'id' => 327,
                'following_id' => 27,
                'follower_id' => 142,
                'created_at' => '2017-09-15 09:18:19',
                'updated_at' => '2017-09-15 09:18:19',
            ),
            324 => 
            array (
                'id' => 328,
                'following_id' => 88,
                'follower_id' => 95,
                'created_at' => '2017-09-15 00:30:26',
                'updated_at' => '2017-09-15 00:30:26',
            ),
            325 => 
            array (
                'id' => 329,
                'following_id' => 58,
                'follower_id' => 109,
                'created_at' => '2017-09-23 20:40:59',
                'updated_at' => '2017-09-23 20:40:59',
            ),
            326 => 
            array (
                'id' => 330,
                'following_id' => 152,
                'follower_id' => 94,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            327 => 
            array (
                'id' => 331,
                'following_id' => 121,
                'follower_id' => 152,
                'created_at' => '2017-09-06 19:06:30',
                'updated_at' => '2017-09-06 19:06:30',
            ),
            328 => 
            array (
                'id' => 332,
                'following_id' => 58,
                'follower_id' => 52,
                'created_at' => '2017-09-02 22:52:11',
                'updated_at' => '2017-09-02 22:52:11',
            ),
            329 => 
            array (
                'id' => 334,
                'following_id' => 3,
                'follower_id' => 101,
                'created_at' => '2017-08-27 15:46:33',
                'updated_at' => '2017-08-27 15:46:33',
            ),
            330 => 
            array (
                'id' => 335,
                'following_id' => 107,
                'follower_id' => 75,
                'created_at' => '2017-09-12 06:10:21',
                'updated_at' => '2017-09-12 06:10:21',
            ),
            331 => 
            array (
                'id' => 336,
                'following_id' => 52,
                'follower_id' => 68,
                'created_at' => '2017-09-07 11:15:30',
                'updated_at' => '2017-09-07 11:15:30',
            ),
            332 => 
            array (
                'id' => 337,
                'following_id' => 154,
                'follower_id' => 182,
                'created_at' => '2017-09-18 12:59:48',
                'updated_at' => '2017-09-18 12:59:48',
            ),
            333 => 
            array (
                'id' => 338,
                'following_id' => 88,
                'follower_id' => 7,
                'created_at' => '2017-09-21 17:48:57',
                'updated_at' => '2017-09-21 17:48:57',
            ),
            334 => 
            array (
                'id' => 339,
                'following_id' => 63,
                'follower_id' => 191,
                'created_at' => '2017-09-09 03:53:13',
                'updated_at' => '2017-09-09 03:53:13',
            ),
            335 => 
            array (
                'id' => 340,
                'following_id' => 87,
                'follower_id' => 69,
                'created_at' => '2017-09-09 14:02:11',
                'updated_at' => '2017-09-09 14:02:11',
            ),
            336 => 
            array (
                'id' => 341,
                'following_id' => 143,
                'follower_id' => 127,
                'created_at' => '2017-09-12 19:45:37',
                'updated_at' => '2017-09-12 19:45:37',
            ),
            337 => 
            array (
                'id' => 342,
                'following_id' => 73,
                'follower_id' => 100,
                'created_at' => '2017-09-07 05:40:12',
                'updated_at' => '2017-09-07 05:40:12',
            ),
            338 => 
            array (
                'id' => 343,
                'following_id' => 69,
                'follower_id' => 168,
                'created_at' => '2017-09-09 14:09:15',
                'updated_at' => '2017-09-09 14:09:15',
            ),
            339 => 
            array (
                'id' => 344,
                'following_id' => 156,
                'follower_id' => 129,
                'created_at' => '2017-09-07 04:04:37',
                'updated_at' => '2017-09-07 04:04:37',
            ),
            340 => 
            array (
                'id' => 345,
                'following_id' => 52,
                'follower_id' => 113,
                'created_at' => '2017-09-13 06:23:21',
                'updated_at' => '2017-09-13 06:23:21',
            ),
            341 => 
            array (
                'id' => 346,
                'following_id' => 19,
                'follower_id' => 44,
                'created_at' => '2017-09-03 18:51:05',
                'updated_at' => '2017-09-03 18:51:05',
            ),
            342 => 
            array (
                'id' => 347,
                'following_id' => 26,
                'follower_id' => 98,
                'created_at' => '2017-09-05 22:19:56',
                'updated_at' => '2017-09-05 22:19:56',
            ),
            343 => 
            array (
                'id' => 348,
                'following_id' => 52,
                'follower_id' => 56,
                'created_at' => '2017-09-21 17:27:17',
                'updated_at' => '2017-09-21 17:27:17',
            ),
            344 => 
            array (
                'id' => 349,
                'following_id' => 30,
                'follower_id' => 120,
                'created_at' => '2017-08-27 00:44:21',
                'updated_at' => '2017-08-27 00:44:21',
            ),
            345 => 
            array (
                'id' => 350,
                'following_id' => 161,
                'follower_id' => 182,
                'created_at' => '2017-09-14 08:59:13',
                'updated_at' => '2017-09-14 08:59:13',
            ),
            346 => 
            array (
                'id' => 351,
                'following_id' => 16,
                'follower_id' => 89,
                'created_at' => '2017-09-08 06:51:06',
                'updated_at' => '2017-09-08 06:51:06',
            ),
            347 => 
            array (
                'id' => 352,
                'following_id' => 65,
                'follower_id' => 141,
                'created_at' => '2017-08-29 13:53:57',
                'updated_at' => '2017-08-29 13:53:57',
            ),
            348 => 
            array (
                'id' => 353,
                'following_id' => 135,
                'follower_id' => 120,
                'created_at' => '2017-09-08 05:48:57',
                'updated_at' => '2017-09-08 05:48:57',
            ),
            349 => 
            array (
                'id' => 354,
                'following_id' => 101,
                'follower_id' => 65,
                'created_at' => '2017-09-23 07:11:10',
                'updated_at' => '2017-09-23 07:11:10',
            ),
            350 => 
            array (
                'id' => 355,
                'following_id' => 27,
                'follower_id' => 191,
                'created_at' => '2017-09-04 01:31:20',
                'updated_at' => '2017-09-04 01:31:20',
            ),
            351 => 
            array (
                'id' => 356,
                'following_id' => 170,
                'follower_id' => 71,
                'created_at' => '2017-09-16 22:35:18',
                'updated_at' => '2017-09-16 22:35:18',
            ),
            352 => 
            array (
                'id' => 357,
                'following_id' => 31,
                'follower_id' => 61,
                'created_at' => '2017-08-25 08:18:13',
                'updated_at' => '2017-08-25 08:18:13',
            ),
            353 => 
            array (
                'id' => 358,
                'following_id' => 136,
                'follower_id' => 155,
                'created_at' => '2017-09-14 23:09:36',
                'updated_at' => '2017-09-14 23:09:36',
            ),
            354 => 
            array (
                'id' => 359,
                'following_id' => 147,
                'follower_id' => 19,
                'created_at' => '2017-09-09 12:52:06',
                'updated_at' => '2017-09-09 12:52:06',
            ),
            355 => 
            array (
                'id' => 360,
                'following_id' => 119,
                'follower_id' => 12,
                'created_at' => '2017-09-17 19:50:58',
                'updated_at' => '2017-09-17 19:50:58',
            ),
            356 => 
            array (
                'id' => 361,
                'following_id' => 32,
                'follower_id' => 157,
                'created_at' => '2017-09-04 04:50:55',
                'updated_at' => '2017-09-04 04:50:55',
            ),
            357 => 
            array (
                'id' => 362,
                'following_id' => 175,
                'follower_id' => 11,
                'created_at' => '2017-09-12 13:57:45',
                'updated_at' => '2017-09-12 13:57:45',
            ),
            358 => 
            array (
                'id' => 363,
                'following_id' => 106,
                'follower_id' => 65,
                'created_at' => '2017-09-24 11:22:51',
                'updated_at' => '2017-09-24 11:22:51',
            ),
            359 => 
            array (
                'id' => 364,
                'following_id' => 44,
                'follower_id' => 31,
                'created_at' => '2017-09-20 06:53:32',
                'updated_at' => '2017-09-20 06:53:32',
            ),
            360 => 
            array (
                'id' => 365,
                'following_id' => 161,
                'follower_id' => 161,
                'created_at' => '2017-08-27 20:33:58',
                'updated_at' => '2017-08-27 20:33:58',
            ),
            361 => 
            array (
                'id' => 366,
                'following_id' => 161,
                'follower_id' => 40,
                'created_at' => '2017-09-14 13:01:10',
                'updated_at' => '2017-09-14 13:01:10',
            ),
            362 => 
            array (
                'id' => 367,
                'following_id' => 75,
                'follower_id' => 155,
                'created_at' => '2017-09-02 11:19:27',
                'updated_at' => '2017-09-02 11:19:27',
            ),
            363 => 
            array (
                'id' => 368,
                'following_id' => 10,
                'follower_id' => 184,
                'created_at' => '2017-09-08 05:31:07',
                'updated_at' => '2017-09-08 05:31:07',
            ),
            364 => 
            array (
                'id' => 369,
                'following_id' => 195,
                'follower_id' => 124,
                'created_at' => '2017-09-10 10:45:18',
                'updated_at' => '2017-09-10 10:45:18',
            ),
            365 => 
            array (
                'id' => 370,
                'following_id' => 183,
                'follower_id' => 142,
                'created_at' => '2017-09-15 09:18:20',
                'updated_at' => '2017-09-15 09:18:20',
            ),
            366 => 
            array (
                'id' => 371,
                'following_id' => 178,
                'follower_id' => 92,
                'created_at' => '2017-09-15 00:30:27',
                'updated_at' => '2017-09-15 00:30:27',
            ),
            367 => 
            array (
                'id' => 372,
                'following_id' => 94,
                'follower_id' => 108,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            368 => 
            array (
                'id' => 373,
                'following_id' => 121,
                'follower_id' => 191,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            369 => 
            array (
                'id' => 374,
                'following_id' => 191,
                'follower_id' => 96,
                'created_at' => '2017-09-06 19:06:31',
                'updated_at' => '2017-09-06 19:06:31',
            ),
            370 => 
            array (
                'id' => 375,
                'following_id' => 184,
                'follower_id' => 61,
                'created_at' => '2017-09-02 22:52:12',
                'updated_at' => '2017-09-02 22:52:12',
            ),
            371 => 
            array (
                'id' => 376,
                'following_id' => 55,
                'follower_id' => 104,
                'created_at' => '2017-08-27 15:46:34',
                'updated_at' => '2017-08-27 15:46:34',
            ),
            372 => 
            array (
                'id' => 377,
                'following_id' => 108,
                'follower_id' => 135,
                'created_at' => '2017-09-12 06:10:22',
                'updated_at' => '2017-09-12 06:10:22',
            ),
            373 => 
            array (
                'id' => 378,
                'following_id' => 128,
                'follower_id' => 147,
                'created_at' => '2017-09-07 11:15:31',
                'updated_at' => '2017-09-07 11:15:31',
            ),
            374 => 
            array (
                'id' => 379,
                'following_id' => 49,
                'follower_id' => 132,
                'created_at' => '2017-09-18 12:59:49',
                'updated_at' => '2017-09-18 12:59:49',
            ),
            375 => 
            array (
                'id' => 380,
                'following_id' => 90,
                'follower_id' => 69,
                'created_at' => '2017-09-21 17:48:58',
                'updated_at' => '2017-09-21 17:48:58',
            ),
            376 => 
            array (
                'id' => 381,
                'following_id' => 72,
                'follower_id' => 53,
                'created_at' => '2017-09-09 03:53:14',
                'updated_at' => '2017-09-09 03:53:14',
            ),
            377 => 
            array (
                'id' => 382,
                'following_id' => 17,
                'follower_id' => 10,
                'created_at' => '2017-09-09 14:02:12',
                'updated_at' => '2017-09-09 14:02:12',
            ),
            378 => 
            array (
                'id' => 383,
                'following_id' => 145,
                'follower_id' => 36,
                'created_at' => '2017-09-12 19:45:38',
                'updated_at' => '2017-09-12 19:45:38',
            ),
            379 => 
            array (
                'id' => 384,
                'following_id' => 15,
                'follower_id' => 117,
                'created_at' => '2017-09-07 05:40:13',
                'updated_at' => '2017-09-07 05:40:13',
            ),
            380 => 
            array (
                'id' => 385,
                'following_id' => 104,
                'follower_id' => 40,
                'created_at' => '2017-09-09 14:09:16',
                'updated_at' => '2017-09-09 14:09:16',
            ),
            381 => 
            array (
                'id' => 386,
                'following_id' => 141,
                'follower_id' => 115,
                'created_at' => '2017-09-07 04:04:38',
                'updated_at' => '2017-09-07 04:04:38',
            ),
            382 => 
            array (
                'id' => 387,
                'following_id' => 35,
                'follower_id' => 101,
                'created_at' => '2017-09-13 06:23:22',
                'updated_at' => '2017-09-13 06:23:22',
            ),
            383 => 
            array (
                'id' => 388,
                'following_id' => 139,
                'follower_id' => 179,
                'created_at' => '2017-09-03 18:51:06',
                'updated_at' => '2017-09-03 18:51:06',
            ),
            384 => 
            array (
                'id' => 389,
                'following_id' => 180,
                'follower_id' => 22,
                'created_at' => '2017-09-05 22:19:57',
                'updated_at' => '2017-09-05 22:19:57',
            ),
            385 => 
            array (
                'id' => 390,
                'following_id' => 34,
                'follower_id' => 103,
                'created_at' => '2017-09-21 17:27:18',
                'updated_at' => '2017-09-21 17:27:18',
            ),
            386 => 
            array (
                'id' => 391,
                'following_id' => 101,
                'follower_id' => 25,
                'created_at' => '2017-08-27 00:44:22',
                'updated_at' => '2017-08-27 00:44:22',
            ),
            387 => 
            array (
                'id' => 392,
                'following_id' => 53,
                'follower_id' => 107,
                'created_at' => '2017-09-14 08:59:14',
                'updated_at' => '2017-09-14 08:59:14',
            ),
            388 => 
            array (
                'id' => 393,
                'following_id' => 184,
                'follower_id' => 75,
                'created_at' => '2017-09-08 06:51:07',
                'updated_at' => '2017-09-08 06:51:07',
            ),
            389 => 
            array (
                'id' => 394,
                'following_id' => 117,
                'follower_id' => 7,
                'created_at' => '2017-08-29 13:53:58',
                'updated_at' => '2017-08-29 13:53:58',
            ),
            390 => 
            array (
                'id' => 395,
                'following_id' => 22,
                'follower_id' => 169,
                'created_at' => '2017-09-08 05:48:58',
                'updated_at' => '2017-09-08 05:48:58',
            ),
            391 => 
            array (
                'id' => 396,
                'following_id' => 186,
                'follower_id' => 156,
                'created_at' => '2017-09-23 07:11:11',
                'updated_at' => '2017-09-23 07:11:11',
            ),
            392 => 
            array (
                'id' => 397,
                'following_id' => 22,
                'follower_id' => 30,
                'created_at' => '2017-09-04 01:31:21',
                'updated_at' => '2017-09-04 01:31:21',
            ),
            393 => 
            array (
                'id' => 398,
                'following_id' => 158,
                'follower_id' => 160,
                'created_at' => '2017-09-16 22:35:19',
                'updated_at' => '2017-09-16 22:35:19',
            ),
            394 => 
            array (
                'id' => 399,
                'following_id' => 149,
                'follower_id' => 53,
                'created_at' => '2017-08-25 08:18:14',
                'updated_at' => '2017-08-25 08:18:14',
            ),
            395 => 
            array (
                'id' => 400,
                'following_id' => 60,
                'follower_id' => 16,
                'created_at' => '2017-09-14 23:09:37',
                'updated_at' => '2017-09-14 23:09:37',
            ),
            396 => 
            array (
                'id' => 401,
                'following_id' => 61,
                'follower_id' => 186,
                'created_at' => '2017-09-09 12:52:07',
                'updated_at' => '2017-09-09 12:52:07',
            ),
            397 => 
            array (
                'id' => 402,
                'following_id' => 114,
                'follower_id' => 29,
                'created_at' => '2017-09-17 19:50:59',
                'updated_at' => '2017-09-17 19:50:59',
            ),
            398 => 
            array (
                'id' => 403,
                'following_id' => 41,
                'follower_id' => 102,
                'created_at' => '2017-09-04 04:50:56',
                'updated_at' => '2017-09-04 04:50:56',
            ),
            399 => 
            array (
                'id' => 404,
                'following_id' => 176,
                'follower_id' => 97,
                'created_at' => '2017-09-12 13:57:46',
                'updated_at' => '2017-09-12 13:57:46',
            ),
            400 => 
            array (
                'id' => 405,
                'following_id' => 2,
                'follower_id' => 82,
                'created_at' => '2017-09-24 11:22:52',
                'updated_at' => '2017-09-24 11:22:52',
            ),
            401 => 
            array (
                'id' => 406,
                'following_id' => 192,
                'follower_id' => 113,
                'created_at' => '2017-09-20 06:53:33',
                'updated_at' => '2017-09-20 06:53:33',
            ),
            402 => 
            array (
                'id' => 407,
                'following_id' => 170,
                'follower_id' => 26,
                'created_at' => '2017-08-27 20:33:59',
                'updated_at' => '2017-08-27 20:33:59',
            ),
            403 => 
            array (
                'id' => 408,
                'following_id' => 58,
                'follower_id' => 30,
                'created_at' => '2017-09-14 13:01:11',
                'updated_at' => '2017-09-14 13:01:11',
            ),
            404 => 
            array (
                'id' => 409,
                'following_id' => 58,
                'follower_id' => 59,
                'created_at' => '2017-09-02 11:19:28',
                'updated_at' => '2017-09-02 11:19:28',
            ),
            405 => 
            array (
                'id' => 410,
                'following_id' => 60,
                'follower_id' => 54,
                'created_at' => '2017-09-08 05:31:08',
                'updated_at' => '2017-09-08 05:31:08',
            ),
            406 => 
            array (
                'id' => 411,
                'following_id' => 67,
                'follower_id' => 55,
                'created_at' => '2017-09-10 10:45:19',
                'updated_at' => '2017-09-10 10:45:19',
            ),
            407 => 
            array (
                'id' => 412,
                'following_id' => 160,
                'follower_id' => 158,
                'created_at' => '2017-09-15 09:18:21',
                'updated_at' => '2017-09-15 09:18:21',
            ),
            408 => 
            array (
                'id' => 413,
                'following_id' => 170,
                'follower_id' => 45,
                'created_at' => '2017-09-15 00:30:28',
                'updated_at' => '2017-09-15 00:30:28',
            ),
            409 => 
            array (
                'id' => 414,
                'following_id' => 56,
                'follower_id' => 162,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            410 => 
            array (
                'id' => 415,
                'following_id' => 139,
                'follower_id' => 86,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            411 => 
            array (
                'id' => 416,
                'following_id' => 53,
                'follower_id' => 66,
                'created_at' => '2017-09-06 19:06:32',
                'updated_at' => '2017-09-06 19:06:32',
            ),
            412 => 
            array (
                'id' => 417,
                'following_id' => 33,
                'follower_id' => 160,
                'created_at' => '2017-09-02 22:52:13',
                'updated_at' => '2017-09-02 22:52:13',
            ),
            413 => 
            array (
                'id' => 418,
                'following_id' => 34,
                'follower_id' => 169,
                'created_at' => '2017-08-27 15:46:35',
                'updated_at' => '2017-08-27 15:46:35',
            ),
            414 => 
            array (
                'id' => 419,
                'following_id' => 96,
                'follower_id' => 149,
                'created_at' => '2017-09-12 06:10:23',
                'updated_at' => '2017-09-12 06:10:23',
            ),
            415 => 
            array (
                'id' => 420,
                'following_id' => 105,
                'follower_id' => 163,
                'created_at' => '2017-09-07 11:15:32',
                'updated_at' => '2017-09-07 11:15:32',
            ),
            416 => 
            array (
                'id' => 421,
                'following_id' => 170,
                'follower_id' => 160,
                'created_at' => '2017-09-18 12:59:50',
                'updated_at' => '2017-09-18 12:59:50',
            ),
            417 => 
            array (
                'id' => 422,
                'following_id' => 145,
                'follower_id' => 30,
                'created_at' => '2017-09-21 17:48:59',
                'updated_at' => '2017-09-21 17:48:59',
            ),
            418 => 
            array (
                'id' => 423,
                'following_id' => 190,
                'follower_id' => 85,
                'created_at' => '2017-09-09 03:53:15',
                'updated_at' => '2017-09-09 03:53:15',
            ),
            419 => 
            array (
                'id' => 424,
                'following_id' => 89,
                'follower_id' => 8,
                'created_at' => '2017-09-09 14:02:13',
                'updated_at' => '2017-09-09 14:02:13',
            ),
            420 => 
            array (
                'id' => 425,
                'following_id' => 137,
                'follower_id' => 105,
                'created_at' => '2017-09-12 19:45:39',
                'updated_at' => '2017-09-12 19:45:39',
            ),
            421 => 
            array (
                'id' => 426,
                'following_id' => 121,
                'follower_id' => 113,
                'created_at' => '2017-09-07 05:40:14',
                'updated_at' => '2017-09-07 05:40:14',
            ),
            422 => 
            array (
                'id' => 427,
                'following_id' => 76,
                'follower_id' => 151,
                'created_at' => '2017-09-09 14:09:17',
                'updated_at' => '2017-09-09 14:09:17',
            ),
            423 => 
            array (
                'id' => 428,
                'following_id' => 64,
                'follower_id' => 51,
                'created_at' => '2017-09-07 04:04:39',
                'updated_at' => '2017-09-07 04:04:39',
            ),
            424 => 
            array (
                'id' => 429,
                'following_id' => 90,
                'follower_id' => 159,
                'created_at' => '2017-09-13 06:23:23',
                'updated_at' => '2017-09-13 06:23:23',
            ),
            425 => 
            array (
                'id' => 430,
                'following_id' => 106,
                'follower_id' => 16,
                'created_at' => '2017-09-03 18:51:07',
                'updated_at' => '2017-09-03 18:51:07',
            ),
            426 => 
            array (
                'id' => 431,
                'following_id' => 124,
                'follower_id' => 72,
                'created_at' => '2017-09-05 22:19:58',
                'updated_at' => '2017-09-05 22:19:58',
            ),
            427 => 
            array (
                'id' => 432,
                'following_id' => 151,
                'follower_id' => 113,
                'created_at' => '2017-09-21 17:27:19',
                'updated_at' => '2017-09-21 17:27:19',
            ),
            428 => 
            array (
                'id' => 433,
                'following_id' => 76,
                'follower_id' => 181,
                'created_at' => '2017-08-27 00:44:23',
                'updated_at' => '2017-08-27 00:44:23',
            ),
            429 => 
            array (
                'id' => 435,
                'following_id' => 76,
                'follower_id' => 169,
                'created_at' => '2017-09-14 08:59:15',
                'updated_at' => '2017-09-14 08:59:15',
            ),
            430 => 
            array (
                'id' => 436,
                'following_id' => 187,
                'follower_id' => 181,
                'created_at' => '2017-09-08 06:51:08',
                'updated_at' => '2017-09-08 06:51:08',
            ),
            431 => 
            array (
                'id' => 437,
                'following_id' => 23,
                'follower_id' => 114,
                'created_at' => '2017-08-29 13:53:59',
                'updated_at' => '2017-08-29 13:53:59',
            ),
            432 => 
            array (
                'id' => 438,
                'following_id' => 100,
                'follower_id' => 78,
                'created_at' => '2017-09-08 05:48:59',
                'updated_at' => '2017-09-08 05:48:59',
            ),
            433 => 
            array (
                'id' => 439,
                'following_id' => 161,
                'follower_id' => 34,
                'created_at' => '2017-09-23 07:11:12',
                'updated_at' => '2017-09-23 07:11:12',
            ),
            434 => 
            array (
                'id' => 440,
                'following_id' => 184,
                'follower_id' => 32,
                'created_at' => '2017-09-04 01:31:22',
                'updated_at' => '2017-09-04 01:31:22',
            ),
            435 => 
            array (
                'id' => 441,
                'following_id' => 104,
                'follower_id' => 148,
                'created_at' => '2017-09-16 22:35:20',
                'updated_at' => '2017-09-16 22:35:20',
            ),
            436 => 
            array (
                'id' => 442,
                'following_id' => 112,
                'follower_id' => 61,
                'created_at' => '2017-08-25 08:18:15',
                'updated_at' => '2017-08-25 08:18:15',
            ),
            437 => 
            array (
                'id' => 443,
                'following_id' => 75,
                'follower_id' => 56,
                'created_at' => '2017-09-14 23:09:38',
                'updated_at' => '2017-09-14 23:09:38',
            ),
            438 => 
            array (
                'id' => 444,
                'following_id' => 158,
                'follower_id' => 77,
                'created_at' => '2017-09-09 12:52:08',
                'updated_at' => '2017-09-09 12:52:08',
            ),
            439 => 
            array (
                'id' => 445,
                'following_id' => 142,
                'follower_id' => 43,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            440 => 
            array (
                'id' => 446,
                'following_id' => 6,
                'follower_id' => 142,
                'created_at' => '2017-09-04 04:50:57',
                'updated_at' => '2017-09-04 04:50:57',
            ),
            441 => 
            array (
                'id' => 447,
                'following_id' => 52,
                'follower_id' => 86,
                'created_at' => '2017-09-12 13:57:47',
                'updated_at' => '2017-09-12 13:57:47',
            ),
            442 => 
            array (
                'id' => 448,
                'following_id' => 52,
                'follower_id' => 186,
                'created_at' => '2017-09-24 11:22:53',
                'updated_at' => '2017-09-24 11:22:53',
            ),
            443 => 
            array (
                'id' => 449,
                'following_id' => 54,
                'follower_id' => 121,
                'created_at' => '2017-09-20 06:53:34',
                'updated_at' => '2017-09-20 06:53:34',
            ),
            444 => 
            array (
                'id' => 450,
                'following_id' => 165,
                'follower_id' => 145,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            445 => 
            array (
                'id' => 451,
                'following_id' => 190,
                'follower_id' => 121,
                'created_at' => '2017-09-14 13:01:12',
                'updated_at' => '2017-09-14 13:01:12',
            ),
            446 => 
            array (
                'id' => 452,
                'following_id' => 153,
                'follower_id' => 169,
                'created_at' => '2017-09-02 11:19:29',
                'updated_at' => '2017-09-02 11:19:29',
            ),
            447 => 
            array (
                'id' => 453,
                'following_id' => 123,
                'follower_id' => 91,
                'created_at' => '2017-09-08 05:31:09',
                'updated_at' => '2017-09-08 05:31:09',
            ),
            448 => 
            array (
                'id' => 454,
                'following_id' => 100,
                'follower_id' => 28,
                'created_at' => '2017-09-10 10:45:20',
                'updated_at' => '2017-09-10 10:45:20',
            ),
            449 => 
            array (
                'id' => 455,
                'following_id' => 66,
                'follower_id' => 11,
                'created_at' => '2017-09-15 09:18:22',
                'updated_at' => '2017-09-15 09:18:22',
            ),
            450 => 
            array (
                'id' => 456,
                'following_id' => 170,
                'follower_id' => 156,
                'created_at' => '2017-09-15 00:30:29',
                'updated_at' => '2017-09-15 00:30:29',
            ),
            451 => 
            array (
                'id' => 457,
                'following_id' => 16,
                'follower_id' => 90,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            452 => 
            array (
                'id' => 458,
                'following_id' => 10,
                'follower_id' => 148,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            453 => 
            array (
                'id' => 459,
                'following_id' => 64,
                'follower_id' => 181,
                'created_at' => '2017-09-06 19:06:33',
                'updated_at' => '2017-09-06 19:06:33',
            ),
            454 => 
            array (
                'id' => 460,
                'following_id' => 57,
                'follower_id' => 144,
                'created_at' => '2017-09-02 22:52:14',
                'updated_at' => '2017-09-02 22:52:14',
            ),
            455 => 
            array (
                'id' => 461,
                'following_id' => 6,
                'follower_id' => 88,
                'created_at' => '2017-08-27 15:46:36',
                'updated_at' => '2017-08-27 15:46:36',
            ),
            456 => 
            array (
                'id' => 462,
                'following_id' => 186,
                'follower_id' => 159,
                'created_at' => '2017-09-12 06:10:24',
                'updated_at' => '2017-09-12 06:10:24',
            ),
            457 => 
            array (
                'id' => 463,
                'following_id' => 91,
                'follower_id' => 23,
                'created_at' => '2017-09-07 11:15:33',
                'updated_at' => '2017-09-07 11:15:33',
            ),
            458 => 
            array (
                'id' => 464,
                'following_id' => 134,
                'follower_id' => 111,
                'created_at' => '2017-09-18 12:59:51',
                'updated_at' => '2017-09-18 12:59:51',
            ),
            459 => 
            array (
                'id' => 465,
                'following_id' => 129,
                'follower_id' => 66,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            460 => 
            array (
                'id' => 466,
                'following_id' => 195,
                'follower_id' => 132,
                'created_at' => '2017-09-09 03:53:16',
                'updated_at' => '2017-09-09 03:53:16',
            ),
            461 => 
            array (
                'id' => 467,
                'following_id' => 150,
                'follower_id' => 149,
                'created_at' => '2017-09-09 14:02:14',
                'updated_at' => '2017-09-09 14:02:14',
            ),
            462 => 
            array (
                'id' => 468,
                'following_id' => 57,
                'follower_id' => 170,
                'created_at' => '2017-09-12 19:45:40',
                'updated_at' => '2017-09-12 19:45:40',
            ),
            463 => 
            array (
                'id' => 469,
                'following_id' => 195,
                'follower_id' => 121,
                'created_at' => '2017-09-07 05:40:15',
                'updated_at' => '2017-09-07 05:40:15',
            ),
            464 => 
            array (
                'id' => 470,
                'following_id' => 43,
                'follower_id' => 64,
                'created_at' => '2017-09-09 14:09:18',
                'updated_at' => '2017-09-09 14:09:18',
            ),
            465 => 
            array (
                'id' => 471,
                'following_id' => 55,
                'follower_id' => 133,
                'created_at' => '2017-09-07 04:04:40',
                'updated_at' => '2017-09-07 04:04:40',
            ),
            466 => 
            array (
                'id' => 472,
                'following_id' => 18,
                'follower_id' => 43,
                'created_at' => '2017-09-13 06:23:24',
                'updated_at' => '2017-09-13 06:23:24',
            ),
            467 => 
            array (
                'id' => 473,
                'following_id' => 168,
                'follower_id' => 173,
                'created_at' => '2017-09-03 18:51:08',
                'updated_at' => '2017-09-03 18:51:08',
            ),
            468 => 
            array (
                'id' => 474,
                'following_id' => 111,
                'follower_id' => 50,
                'created_at' => '2017-09-05 22:19:59',
                'updated_at' => '2017-09-05 22:19:59',
            ),
            469 => 
            array (
                'id' => 475,
                'following_id' => 97,
                'follower_id' => 124,
                'created_at' => '2017-09-21 17:27:20',
                'updated_at' => '2017-09-21 17:27:20',
            ),
            470 => 
            array (
                'id' => 476,
                'following_id' => 152,
                'follower_id' => 74,
                'created_at' => '2017-08-27 00:44:24',
                'updated_at' => '2017-08-27 00:44:24',
            ),
            471 => 
            array (
                'id' => 477,
                'following_id' => 82,
                'follower_id' => 45,
                'created_at' => '2017-09-14 08:59:16',
                'updated_at' => '2017-09-14 08:59:16',
            ),
            472 => 
            array (
                'id' => 478,
                'following_id' => 21,
                'follower_id' => 154,
                'created_at' => '2017-09-08 06:51:09',
                'updated_at' => '2017-09-08 06:51:09',
            ),
            473 => 
            array (
                'id' => 479,
                'following_id' => 142,
                'follower_id' => 62,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            474 => 
            array (
                'id' => 480,
                'following_id' => 98,
                'follower_id' => 81,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            475 => 
            array (
                'id' => 481,
                'following_id' => 38,
                'follower_id' => 114,
                'created_at' => '2017-09-23 07:11:13',
                'updated_at' => '2017-09-23 07:11:13',
            ),
            476 => 
            array (
                'id' => 482,
                'following_id' => 142,
                'follower_id' => 93,
                'created_at' => '2017-09-04 01:31:23',
                'updated_at' => '2017-09-04 01:31:23',
            ),
            477 => 
            array (
                'id' => 483,
                'following_id' => 140,
                'follower_id' => 129,
                'created_at' => '2017-09-16 22:35:21',
                'updated_at' => '2017-09-16 22:35:21',
            ),
            478 => 
            array (
                'id' => 484,
                'following_id' => 137,
                'follower_id' => 46,
                'created_at' => '2017-08-25 08:18:16',
                'updated_at' => '2017-08-25 08:18:16',
            ),
            479 => 
            array (
                'id' => 485,
                'following_id' => 15,
                'follower_id' => 112,
                'created_at' => '2017-09-14 23:09:39',
                'updated_at' => '2017-09-14 23:09:39',
            ),
            480 => 
            array (
                'id' => 486,
                'following_id' => 29,
                'follower_id' => 12,
                'created_at' => '2017-09-09 12:52:09',
                'updated_at' => '2017-09-09 12:52:09',
            ),
            481 => 
            array (
                'id' => 487,
                'following_id' => 65,
                'follower_id' => 189,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            482 => 
            array (
                'id' => 488,
                'following_id' => 188,
                'follower_id' => 165,
                'created_at' => '2017-09-04 04:50:58',
                'updated_at' => '2017-09-04 04:50:58',
            ),
            483 => 
            array (
                'id' => 489,
                'following_id' => 187,
                'follower_id' => 191,
                'created_at' => '2017-09-12 13:57:48',
                'updated_at' => '2017-09-12 13:57:48',
            ),
            484 => 
            array (
                'id' => 490,
                'following_id' => 130,
                'follower_id' => 125,
                'created_at' => '2017-09-24 11:22:54',
                'updated_at' => '2017-09-24 11:22:54',
            ),
            485 => 
            array (
                'id' => 491,
                'following_id' => 82,
                'follower_id' => 120,
                'created_at' => '2017-09-20 06:53:35',
                'updated_at' => '2017-09-20 06:53:35',
            ),
            486 => 
            array (
                'id' => 492,
                'following_id' => 153,
                'follower_id' => 124,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            487 => 
            array (
                'id' => 493,
                'following_id' => 155,
                'follower_id' => 183,
                'created_at' => '2017-09-14 13:01:13',
                'updated_at' => '2017-09-14 13:01:13',
            ),
            488 => 
            array (
                'id' => 495,
                'following_id' => 61,
                'follower_id' => 50,
                'created_at' => '2017-09-02 11:19:30',
                'updated_at' => '2017-09-02 11:19:30',
            ),
            489 => 
            array (
                'id' => 496,
                'following_id' => 164,
                'follower_id' => 84,
                'created_at' => '2017-09-08 05:31:10',
                'updated_at' => '2017-09-08 05:31:10',
            ),
            490 => 
            array (
                'id' => 497,
                'following_id' => 106,
                'follower_id' => 87,
                'created_at' => '2017-09-10 10:45:21',
                'updated_at' => '2017-09-10 10:45:21',
            ),
            491 => 
            array (
                'id' => 498,
                'following_id' => 149,
                'follower_id' => 69,
                'created_at' => '2017-09-15 09:18:23',
                'updated_at' => '2017-09-15 09:18:23',
            ),
            492 => 
            array (
                'id' => 499,
                'following_id' => 153,
                'follower_id' => 186,
                'created_at' => '2017-09-15 00:30:30',
                'updated_at' => '2017-09-15 00:30:30',
            ),
            493 => 
            array (
                'id' => 500,
                'following_id' => 151,
                'follower_id' => 100,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            494 => 
            array (
                'id' => 501,
                'following_id' => 23,
                'follower_id' => 97,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            495 => 
            array (
                'id' => 502,
                'following_id' => 2,
                'follower_id' => 127,
                'created_at' => '2017-09-06 19:06:34',
                'updated_at' => '2017-09-06 19:06:34',
            ),
            496 => 
            array (
                'id' => 503,
                'following_id' => 101,
                'follower_id' => 176,
                'created_at' => '2017-09-02 22:52:15',
                'updated_at' => '2017-09-02 22:52:15',
            ),
            497 => 
            array (
                'id' => 504,
                'following_id' => 149,
                'follower_id' => 66,
                'created_at' => '2017-08-27 15:46:37',
                'updated_at' => '2017-08-27 15:46:37',
            ),
            498 => 
            array (
                'id' => 506,
                'following_id' => 133,
                'follower_id' => 184,
                'created_at' => '2017-09-12 06:10:25',
                'updated_at' => '2017-09-12 06:10:25',
            ),
            499 => 
            array (
                'id' => 507,
                'following_id' => 23,
                'follower_id' => 184,
                'created_at' => '2017-09-07 11:15:34',
                'updated_at' => '2017-09-07 11:15:34',
            ),
        ));
        \DB::table('follows')->insert(array (
            0 => 
            array (
                'id' => 508,
                'following_id' => 184,
                'follower_id' => 173,
                'created_at' => '2017-09-18 12:59:52',
                'updated_at' => '2017-09-18 12:59:52',
            ),
            1 => 
            array (
                'id' => 509,
                'following_id' => 56,
                'follower_id' => 3,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            2 => 
            array (
                'id' => 510,
                'following_id' => 8,
                'follower_id' => 30,
                'created_at' => '2017-09-09 03:53:17',
                'updated_at' => '2017-09-09 03:53:17',
            ),
            3 => 
            array (
                'id' => 511,
                'following_id' => 146,
                'follower_id' => 60,
                'created_at' => '2017-09-09 14:02:15',
                'updated_at' => '2017-09-09 14:02:15',
            ),
            4 => 
            array (
                'id' => 512,
                'following_id' => 98,
                'follower_id' => 105,
                'created_at' => '2017-09-12 19:45:41',
                'updated_at' => '2017-09-12 19:45:41',
            ),
            5 => 
            array (
                'id' => 513,
                'following_id' => 73,
                'follower_id' => 81,
                'created_at' => '2017-09-07 05:40:16',
                'updated_at' => '2017-09-07 05:40:16',
            ),
            6 => 
            array (
                'id' => 514,
                'following_id' => 27,
                'follower_id' => 149,
                'created_at' => '2017-09-09 14:09:19',
                'updated_at' => '2017-09-09 14:09:19',
            ),
            7 => 
            array (
                'id' => 515,
                'following_id' => 78,
                'follower_id' => 140,
                'created_at' => '2017-09-07 04:04:41',
                'updated_at' => '2017-09-07 04:04:41',
            ),
            8 => 
            array (
                'id' => 516,
                'following_id' => 125,
                'follower_id' => 39,
                'created_at' => '2017-09-13 06:23:25',
                'updated_at' => '2017-09-13 06:23:25',
            ),
            9 => 
            array (
                'id' => 517,
                'following_id' => 92,
                'follower_id' => 37,
                'created_at' => '2017-09-03 18:51:09',
                'updated_at' => '2017-09-03 18:51:09',
            ),
            10 => 
            array (
                'id' => 518,
                'following_id' => 71,
                'follower_id' => 45,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            11 => 
            array (
                'id' => 519,
                'following_id' => 93,
                'follower_id' => 160,
                'created_at' => '2017-09-21 17:27:21',
                'updated_at' => '2017-09-21 17:27:21',
            ),
            12 => 
            array (
                'id' => 520,
                'following_id' => 53,
                'follower_id' => 103,
                'created_at' => '2017-08-27 00:44:25',
                'updated_at' => '2017-08-27 00:44:25',
            ),
            13 => 
            array (
                'id' => 521,
                'following_id' => 170,
                'follower_id' => 118,
                'created_at' => '2017-09-14 08:59:17',
                'updated_at' => '2017-09-14 08:59:17',
            ),
            14 => 
            array (
                'id' => 522,
                'following_id' => 149,
                'follower_id' => 181,
                'created_at' => '2017-09-08 06:51:10',
                'updated_at' => '2017-09-08 06:51:10',
            ),
            15 => 
            array (
                'id' => 523,
                'following_id' => 6,
                'follower_id' => 141,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            16 => 
            array (
                'id' => 524,
                'following_id' => 153,
                'follower_id' => 59,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            17 => 
            array (
                'id' => 525,
                'following_id' => 11,
                'follower_id' => 135,
                'created_at' => '2017-09-23 07:11:14',
                'updated_at' => '2017-09-23 07:11:14',
            ),
            18 => 
            array (
                'id' => 526,
                'following_id' => 150,
                'follower_id' => 187,
                'created_at' => '2017-09-04 01:31:24',
                'updated_at' => '2017-09-04 01:31:24',
            ),
            19 => 
            array (
                'id' => 527,
                'following_id' => 1,
                'follower_id' => 17,
                'created_at' => '2017-09-16 22:35:22',
                'updated_at' => '2017-09-16 22:35:22',
            ),
            20 => 
            array (
                'id' => 528,
                'following_id' => 71,
                'follower_id' => 125,
                'created_at' => '2017-08-25 08:18:17',
                'updated_at' => '2017-08-25 08:18:17',
            ),
            21 => 
            array (
                'id' => 529,
                'following_id' => 124,
                'follower_id' => 158,
                'created_at' => '2017-09-14 23:09:40',
                'updated_at' => '2017-09-14 23:09:40',
            ),
            22 => 
            array (
                'id' => 530,
                'following_id' => 139,
                'follower_id' => 110,
                'created_at' => '2017-09-09 12:52:10',
                'updated_at' => '2017-09-09 12:52:10',
            ),
            23 => 
            array (
                'id' => 531,
                'following_id' => 180,
                'follower_id' => 89,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            24 => 
            array (
                'id' => 532,
                'following_id' => 79,
                'follower_id' => 57,
                'created_at' => '2017-09-04 04:50:59',
                'updated_at' => '2017-09-04 04:50:59',
            ),
            25 => 
            array (
                'id' => 533,
                'following_id' => 141,
                'follower_id' => 86,
                'created_at' => '2017-09-12 13:57:49',
                'updated_at' => '2017-09-12 13:57:49',
            ),
            26 => 
            array (
                'id' => 534,
                'following_id' => 122,
                'follower_id' => 80,
                'created_at' => '2017-09-24 11:22:55',
                'updated_at' => '2017-09-24 11:22:55',
            ),
            27 => 
            array (
                'id' => 535,
                'following_id' => 178,
                'follower_id' => 135,
                'created_at' => '2017-09-20 06:53:36',
                'updated_at' => '2017-09-20 06:53:36',
            ),
            28 => 
            array (
                'id' => 536,
                'following_id' => 138,
                'follower_id' => 62,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            29 => 
            array (
                'id' => 537,
                'following_id' => 95,
                'follower_id' => 6,
                'created_at' => '2017-09-14 13:01:14',
                'updated_at' => '2017-09-14 13:01:14',
            ),
            30 => 
            array (
                'id' => 538,
                'following_id' => 25,
                'follower_id' => 3,
                'created_at' => '2017-09-02 11:19:31',
                'updated_at' => '2017-09-02 11:19:31',
            ),
            31 => 
            array (
                'id' => 539,
                'following_id' => 148,
                'follower_id' => 52,
                'created_at' => '2017-09-08 05:31:11',
                'updated_at' => '2017-09-08 05:31:11',
            ),
            32 => 
            array (
                'id' => 540,
                'following_id' => 32,
                'follower_id' => 140,
                'created_at' => '2017-09-10 10:45:22',
                'updated_at' => '2017-09-10 10:45:22',
            ),
            33 => 
            array (
                'id' => 541,
                'following_id' => 113,
                'follower_id' => 195,
                'created_at' => '2017-09-15 09:18:24',
                'updated_at' => '2017-09-15 09:18:24',
            ),
            34 => 
            array (
                'id' => 542,
                'following_id' => 51,
                'follower_id' => 87,
                'created_at' => '2017-09-15 00:30:31',
                'updated_at' => '2017-09-15 00:30:31',
            ),
            35 => 
            array (
                'id' => 543,
                'following_id' => 98,
                'follower_id' => 99,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            36 => 
            array (
                'id' => 544,
                'following_id' => 47,
                'follower_id' => 137,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            37 => 
            array (
                'id' => 545,
                'following_id' => 11,
                'follower_id' => 62,
                'created_at' => '2017-09-06 19:06:35',
                'updated_at' => '2017-09-06 19:06:35',
            ),
            38 => 
            array (
                'id' => 546,
                'following_id' => 149,
                'follower_id' => 146,
                'created_at' => '2017-09-02 22:52:16',
                'updated_at' => '2017-09-02 22:52:16',
            ),
            39 => 
            array (
                'id' => 547,
                'following_id' => 58,
                'follower_id' => 103,
                'created_at' => '2017-08-27 15:46:38',
                'updated_at' => '2017-08-27 15:46:38',
            ),
            40 => 
            array (
                'id' => 548,
                'following_id' => 14,
                'follower_id' => 86,
                'created_at' => '2017-09-12 06:10:26',
                'updated_at' => '2017-09-12 06:10:26',
            ),
            41 => 
            array (
                'id' => 549,
                'following_id' => 116,
                'follower_id' => 78,
                'created_at' => '2017-09-07 11:15:35',
                'updated_at' => '2017-09-07 11:15:35',
            ),
            42 => 
            array (
                'id' => 550,
                'following_id' => 28,
                'follower_id' => 34,
                'created_at' => '2017-09-18 12:59:53',
                'updated_at' => '2017-09-18 12:59:53',
            ),
            43 => 
            array (
                'id' => 551,
                'following_id' => 149,
                'follower_id' => 32,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            44 => 
            array (
                'id' => 552,
                'following_id' => 135,
                'follower_id' => 115,
                'created_at' => '2017-09-09 03:53:18',
                'updated_at' => '2017-09-09 03:53:18',
            ),
            45 => 
            array (
                'id' => 553,
                'following_id' => 75,
                'follower_id' => 137,
                'created_at' => '2017-09-09 14:02:16',
                'updated_at' => '2017-09-09 14:02:16',
            ),
            46 => 
            array (
                'id' => 554,
                'following_id' => 16,
                'follower_id' => 27,
                'created_at' => '2017-09-12 19:45:42',
                'updated_at' => '2017-09-12 19:45:42',
            ),
            47 => 
            array (
                'id' => 555,
                'following_id' => 125,
                'follower_id' => 22,
                'created_at' => '2017-09-07 05:40:17',
                'updated_at' => '2017-09-07 05:40:17',
            ),
            48 => 
            array (
                'id' => 556,
                'following_id' => 33,
                'follower_id' => 135,
                'created_at' => '2017-09-09 14:09:20',
                'updated_at' => '2017-09-09 14:09:20',
            ),
            49 => 
            array (
                'id' => 557,
                'following_id' => 24,
                'follower_id' => 53,
                'created_at' => '2017-09-07 04:04:42',
                'updated_at' => '2017-09-07 04:04:42',
            ),
            50 => 
            array (
                'id' => 558,
                'following_id' => 13,
                'follower_id' => 168,
                'created_at' => '2017-09-13 06:23:26',
                'updated_at' => '2017-09-13 06:23:26',
            ),
            51 => 
            array (
                'id' => 559,
                'following_id' => 105,
                'follower_id' => 117,
                'created_at' => '2017-09-03 18:51:10',
                'updated_at' => '2017-09-03 18:51:10',
            ),
            52 => 
            array (
                'id' => 560,
                'following_id' => 25,
                'follower_id' => 4,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            53 => 
            array (
                'id' => 561,
                'following_id' => 167,
                'follower_id' => 16,
                'created_at' => '2017-09-21 17:27:22',
                'updated_at' => '2017-09-21 17:27:22',
            ),
            54 => 
            array (
                'id' => 562,
                'following_id' => 18,
                'follower_id' => 72,
                'created_at' => '2017-08-27 00:44:26',
                'updated_at' => '2017-08-27 00:44:26',
            ),
            55 => 
            array (
                'id' => 563,
                'following_id' => 119,
                'follower_id' => 158,
                'created_at' => '2017-09-14 08:59:18',
                'updated_at' => '2017-09-14 08:59:18',
            ),
            56 => 
            array (
                'id' => 564,
                'following_id' => 11,
                'follower_id' => 73,
                'created_at' => '2017-09-08 06:51:11',
                'updated_at' => '2017-09-08 06:51:11',
            ),
            57 => 
            array (
                'id' => 565,
                'following_id' => 121,
                'follower_id' => 52,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            58 => 
            array (
                'id' => 566,
                'following_id' => 139,
                'follower_id' => 117,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            59 => 
            array (
                'id' => 567,
                'following_id' => 102,
                'follower_id' => 70,
                'created_at' => '2017-09-23 07:11:15',
                'updated_at' => '2017-09-23 07:11:15',
            ),
            60 => 
            array (
                'id' => 568,
                'following_id' => 130,
                'follower_id' => 41,
                'created_at' => '2017-09-04 01:31:25',
                'updated_at' => '2017-09-04 01:31:25',
            ),
            61 => 
            array (
                'id' => 569,
                'following_id' => 98,
                'follower_id' => 180,
                'created_at' => '2017-09-16 22:35:23',
                'updated_at' => '2017-09-16 22:35:23',
            ),
            62 => 
            array (
                'id' => 570,
                'following_id' => 173,
                'follower_id' => 191,
                'created_at' => '2017-08-25 08:18:18',
                'updated_at' => '2017-08-25 08:18:18',
            ),
            63 => 
            array (
                'id' => 571,
                'following_id' => 58,
                'follower_id' => 13,
                'created_at' => '2017-09-14 23:09:41',
                'updated_at' => '2017-09-14 23:09:41',
            ),
            64 => 
            array (
                'id' => 572,
                'following_id' => 21,
                'follower_id' => 104,
                'created_at' => '2017-09-09 12:52:11',
                'updated_at' => '2017-09-09 12:52:11',
            ),
            65 => 
            array (
                'id' => 573,
                'following_id' => 1,
                'follower_id' => 80,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            66 => 
            array (
                'id' => 574,
                'following_id' => 175,
                'follower_id' => 22,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            67 => 
            array (
                'id' => 575,
                'following_id' => 5,
                'follower_id' => 58,
                'created_at' => '2017-09-12 13:57:50',
                'updated_at' => '2017-09-12 13:57:50',
            ),
            68 => 
            array (
                'id' => 576,
                'following_id' => 23,
                'follower_id' => 177,
                'created_at' => '2017-09-24 11:22:56',
                'updated_at' => '2017-09-24 11:22:56',
            ),
            69 => 
            array (
                'id' => 577,
                'following_id' => 23,
                'follower_id' => 135,
                'created_at' => '2017-09-20 06:53:37',
                'updated_at' => '2017-09-20 06:53:37',
            ),
            70 => 
            array (
                'id' => 578,
                'following_id' => 12,
                'follower_id' => 144,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            71 => 
            array (
                'id' => 579,
                'following_id' => 42,
                'follower_id' => 81,
                'created_at' => '2017-09-14 13:01:15',
                'updated_at' => '2017-09-14 13:01:15',
            ),
            72 => 
            array (
                'id' => 580,
                'following_id' => 165,
                'follower_id' => 126,
                'created_at' => '2017-09-02 11:19:32',
                'updated_at' => '2017-09-02 11:19:32',
            ),
            73 => 
            array (
                'id' => 581,
                'following_id' => 131,
                'follower_id' => 73,
                'created_at' => '2017-09-08 05:31:12',
                'updated_at' => '2017-09-08 05:31:12',
            ),
            74 => 
            array (
                'id' => 582,
                'following_id' => 94,
                'follower_id' => 152,
                'created_at' => '2017-09-10 10:45:23',
                'updated_at' => '2017-09-10 10:45:23',
            ),
            75 => 
            array (
                'id' => 583,
                'following_id' => 176,
                'follower_id' => 12,
                'created_at' => '2017-09-15 09:18:25',
                'updated_at' => '2017-09-15 09:18:25',
            ),
            76 => 
            array (
                'id' => 584,
                'following_id' => 32,
                'follower_id' => 18,
                'created_at' => '2017-09-15 00:30:32',
                'updated_at' => '2017-09-15 00:30:32',
            ),
            77 => 
            array (
                'id' => 585,
                'following_id' => 187,
                'follower_id' => 157,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            78 => 
            array (
                'id' => 586,
                'following_id' => 136,
                'follower_id' => 123,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            79 => 
            array (
                'id' => 587,
                'following_id' => 121,
                'follower_id' => 194,
                'created_at' => '2017-09-06 19:06:36',
                'updated_at' => '2017-09-06 19:06:36',
            ),
            80 => 
            array (
                'id' => 588,
                'following_id' => 68,
                'follower_id' => 113,
                'created_at' => '2017-09-02 22:52:17',
                'updated_at' => '2017-09-02 22:52:17',
            ),
            81 => 
            array (
                'id' => 589,
                'following_id' => 129,
                'follower_id' => 67,
                'created_at' => '2017-08-27 15:46:39',
                'updated_at' => '2017-08-27 15:46:39',
            ),
            82 => 
            array (
                'id' => 590,
                'following_id' => 4,
                'follower_id' => 38,
                'created_at' => '2017-09-12 06:10:27',
                'updated_at' => '2017-09-12 06:10:27',
            ),
            83 => 
            array (
                'id' => 591,
                'following_id' => 69,
                'follower_id' => 135,
                'created_at' => '2017-09-07 11:15:36',
                'updated_at' => '2017-09-07 11:15:36',
            ),
            84 => 
            array (
                'id' => 592,
                'following_id' => 27,
                'follower_id' => 19,
                'created_at' => '2017-09-18 12:59:54',
                'updated_at' => '2017-09-18 12:59:54',
            ),
            85 => 
            array (
                'id' => 593,
                'following_id' => 53,
                'follower_id' => 91,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            86 => 
            array (
                'id' => 594,
                'following_id' => 128,
                'follower_id' => 140,
                'created_at' => '2017-09-09 03:53:19',
                'updated_at' => '2017-09-09 03:53:19',
            ),
            87 => 
            array (
                'id' => 595,
                'following_id' => 176,
                'follower_id' => 123,
                'created_at' => '2017-09-09 14:02:17',
                'updated_at' => '2017-09-09 14:02:17',
            ),
            88 => 
            array (
                'id' => 596,
                'following_id' => 165,
                'follower_id' => 194,
                'created_at' => '2017-09-12 19:45:43',
                'updated_at' => '2017-09-12 19:45:43',
            ),
            89 => 
            array (
                'id' => 597,
                'following_id' => 147,
                'follower_id' => 21,
                'created_at' => '2017-09-07 05:40:18',
                'updated_at' => '2017-09-07 05:40:18',
            ),
            90 => 
            array (
                'id' => 598,
                'following_id' => 187,
                'follower_id' => 18,
                'created_at' => '2017-09-09 14:09:21',
                'updated_at' => '2017-09-09 14:09:21',
            ),
            91 => 
            array (
                'id' => 599,
                'following_id' => 63,
                'follower_id' => 42,
                'created_at' => '2017-09-07 04:04:43',
                'updated_at' => '2017-09-07 04:04:43',
            ),
            92 => 
            array (
                'id' => 600,
                'following_id' => 98,
                'follower_id' => 55,
                'created_at' => '2017-09-13 06:23:27',
                'updated_at' => '2017-09-13 06:23:27',
            ),
            93 => 
            array (
                'id' => 601,
                'following_id' => 127,
                'follower_id' => 120,
                'created_at' => '2017-09-03 18:51:11',
                'updated_at' => '2017-09-03 18:51:11',
            ),
            94 => 
            array (
                'id' => 602,
                'following_id' => 163,
                'follower_id' => 112,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            95 => 
            array (
                'id' => 603,
                'following_id' => 32,
                'follower_id' => 88,
                'created_at' => '2017-09-21 17:27:23',
                'updated_at' => '2017-09-21 17:27:23',
            ),
            96 => 
            array (
                'id' => 604,
                'following_id' => 106,
                'follower_id' => 167,
                'created_at' => '2017-08-27 00:44:27',
                'updated_at' => '2017-08-27 00:44:27',
            ),
            97 => 
            array (
                'id' => 605,
                'following_id' => 54,
                'follower_id' => 145,
                'created_at' => '2017-09-14 08:59:19',
                'updated_at' => '2017-09-14 08:59:19',
            ),
            98 => 
            array (
                'id' => 607,
                'following_id' => 48,
                'follower_id' => 2,
                'created_at' => '2017-09-08 06:51:12',
                'updated_at' => '2017-09-08 06:51:12',
            ),
            99 => 
            array (
                'id' => 608,
                'following_id' => 54,
                'follower_id' => 45,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            100 => 
            array (
                'id' => 609,
                'following_id' => 178,
                'follower_id' => 68,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            101 => 
            array (
                'id' => 610,
                'following_id' => 28,
                'follower_id' => 27,
                'created_at' => '2017-09-23 07:11:16',
                'updated_at' => '2017-09-23 07:11:16',
            ),
            102 => 
            array (
                'id' => 611,
                'following_id' => 76,
                'follower_id' => 26,
                'created_at' => '2017-09-04 01:31:26',
                'updated_at' => '2017-09-04 01:31:26',
            ),
            103 => 
            array (
                'id' => 612,
                'following_id' => 85,
                'follower_id' => 22,
                'created_at' => '2017-09-16 22:35:24',
                'updated_at' => '2017-09-16 22:35:24',
            ),
            104 => 
            array (
                'id' => 613,
                'following_id' => 165,
                'follower_id' => 143,
                'created_at' => '2017-08-25 08:18:19',
                'updated_at' => '2017-08-25 08:18:19',
            ),
            105 => 
            array (
                'id' => 614,
                'following_id' => 10,
                'follower_id' => 45,
                'created_at' => '2017-09-14 23:09:42',
                'updated_at' => '2017-09-14 23:09:42',
            ),
            106 => 
            array (
                'id' => 615,
                'following_id' => 4,
                'follower_id' => 41,
                'created_at' => '2017-09-09 12:52:12',
                'updated_at' => '2017-09-09 12:52:12',
            ),
            107 => 
            array (
                'id' => 616,
                'following_id' => 189,
                'follower_id' => 77,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            108 => 
            array (
                'id' => 617,
                'following_id' => 6,
                'follower_id' => 121,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            109 => 
            array (
                'id' => 618,
                'following_id' => 188,
                'follower_id' => 135,
                'created_at' => '2017-09-12 13:57:51',
                'updated_at' => '2017-09-12 13:57:51',
            ),
            110 => 
            array (
                'id' => 619,
                'following_id' => 180,
                'follower_id' => 101,
                'created_at' => '2017-09-24 11:22:57',
                'updated_at' => '2017-09-24 11:22:57',
            ),
            111 => 
            array (
                'id' => 620,
                'following_id' => 141,
                'follower_id' => 159,
                'created_at' => '2017-09-20 06:53:38',
                'updated_at' => '2017-09-20 06:53:38',
            ),
            112 => 
            array (
                'id' => 621,
                'following_id' => 18,
                'follower_id' => 155,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            113 => 
            array (
                'id' => 622,
                'following_id' => 62,
                'follower_id' => 67,
                'created_at' => '2017-09-14 13:01:16',
                'updated_at' => '2017-09-14 13:01:16',
            ),
            114 => 
            array (
                'id' => 623,
                'following_id' => 187,
                'follower_id' => 29,
                'created_at' => '2017-09-02 11:19:33',
                'updated_at' => '2017-09-02 11:19:33',
            ),
            115 => 
            array (
                'id' => 624,
                'following_id' => 69,
                'follower_id' => 40,
                'created_at' => '2017-09-08 05:31:13',
                'updated_at' => '2017-09-08 05:31:13',
            ),
            116 => 
            array (
                'id' => 625,
                'following_id' => 174,
                'follower_id' => 62,
                'created_at' => '2017-09-10 10:45:24',
                'updated_at' => '2017-09-10 10:45:24',
            ),
            117 => 
            array (
                'id' => 626,
                'following_id' => 14,
                'follower_id' => 157,
                'created_at' => '2017-09-15 09:18:26',
                'updated_at' => '2017-09-15 09:18:26',
            ),
            118 => 
            array (
                'id' => 627,
                'following_id' => 63,
                'follower_id' => 163,
                'created_at' => '2017-09-15 00:30:33',
                'updated_at' => '2017-09-15 00:30:33',
            ),
            119 => 
            array (
                'id' => 628,
                'following_id' => 36,
                'follower_id' => 193,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            120 => 
            array (
                'id' => 629,
                'following_id' => 91,
                'follower_id' => 86,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            121 => 
            array (
                'id' => 630,
                'following_id' => 186,
                'follower_id' => 85,
                'created_at' => '2017-09-06 19:06:37',
                'updated_at' => '2017-09-06 19:06:37',
            ),
            122 => 
            array (
                'id' => 631,
                'following_id' => 89,
                'follower_id' => 50,
                'created_at' => '2017-09-02 22:52:18',
                'updated_at' => '2017-09-02 22:52:18',
            ),
            123 => 
            array (
                'id' => 632,
                'following_id' => 39,
                'follower_id' => 145,
                'created_at' => '2017-08-27 15:46:40',
                'updated_at' => '2017-08-27 15:46:40',
            ),
            124 => 
            array (
                'id' => 633,
                'following_id' => 94,
                'follower_id' => 150,
                'created_at' => '2017-09-12 06:10:28',
                'updated_at' => '2017-09-12 06:10:28',
            ),
            125 => 
            array (
                'id' => 634,
                'following_id' => 102,
                'follower_id' => 189,
                'created_at' => '2017-09-07 11:15:37',
                'updated_at' => '2017-09-07 11:15:37',
            ),
            126 => 
            array (
                'id' => 635,
                'following_id' => 10,
                'follower_id' => 192,
                'created_at' => '2017-09-18 12:59:55',
                'updated_at' => '2017-09-18 12:59:55',
            ),
            127 => 
            array (
                'id' => 636,
                'following_id' => 73,
                'follower_id' => 145,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            128 => 
            array (
                'id' => 637,
                'following_id' => 61,
                'follower_id' => 32,
                'created_at' => '2017-09-09 03:53:20',
                'updated_at' => '2017-09-09 03:53:20',
            ),
            129 => 
            array (
                'id' => 638,
                'following_id' => 131,
                'follower_id' => 28,
                'created_at' => '2017-09-09 14:02:18',
                'updated_at' => '2017-09-09 14:02:18',
            ),
            130 => 
            array (
                'id' => 639,
                'following_id' => 185,
                'follower_id' => 67,
                'created_at' => '2017-09-12 19:45:44',
                'updated_at' => '2017-09-12 19:45:44',
            ),
            131 => 
            array (
                'id' => 640,
                'following_id' => 150,
                'follower_id' => 152,
                'created_at' => '2017-09-07 05:40:19',
                'updated_at' => '2017-09-07 05:40:19',
            ),
            132 => 
            array (
                'id' => 641,
                'following_id' => 34,
                'follower_id' => 179,
                'created_at' => '2017-09-09 14:09:22',
                'updated_at' => '2017-09-09 14:09:22',
            ),
            133 => 
            array (
                'id' => 642,
                'following_id' => 49,
                'follower_id' => 156,
                'created_at' => '2017-09-07 04:04:44',
                'updated_at' => '2017-09-07 04:04:44',
            ),
            134 => 
            array (
                'id' => 643,
                'following_id' => 170,
                'follower_id' => 105,
                'created_at' => '2017-09-13 06:23:28',
                'updated_at' => '2017-09-13 06:23:28',
            ),
            135 => 
            array (
                'id' => 644,
                'following_id' => 65,
                'follower_id' => 68,
                'created_at' => '2017-09-03 18:51:12',
                'updated_at' => '2017-09-03 18:51:12',
            ),
            136 => 
            array (
                'id' => 645,
                'following_id' => 155,
                'follower_id' => 31,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            137 => 
            array (
                'id' => 646,
                'following_id' => 146,
                'follower_id' => 76,
                'created_at' => '2017-09-21 17:27:24',
                'updated_at' => '2017-09-21 17:27:24',
            ),
            138 => 
            array (
                'id' => 647,
                'following_id' => 35,
                'follower_id' => 116,
                'created_at' => '2017-08-27 00:44:28',
                'updated_at' => '2017-08-27 00:44:28',
            ),
            139 => 
            array (
                'id' => 648,
                'following_id' => 91,
                'follower_id' => 85,
                'created_at' => '2017-09-14 08:59:20',
                'updated_at' => '2017-09-14 08:59:20',
            ),
            140 => 
            array (
                'id' => 649,
                'following_id' => 167,
                'follower_id' => 64,
                'created_at' => '2017-09-08 06:51:13',
                'updated_at' => '2017-09-08 06:51:13',
            ),
            141 => 
            array (
                'id' => 650,
                'following_id' => 107,
                'follower_id' => 79,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            142 => 
            array (
                'id' => 651,
                'following_id' => 8,
                'follower_id' => 13,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            143 => 
            array (
                'id' => 652,
                'following_id' => 144,
                'follower_id' => 79,
                'created_at' => '2017-09-23 07:11:17',
                'updated_at' => '2017-09-23 07:11:17',
            ),
            144 => 
            array (
                'id' => 653,
                'following_id' => 93,
                'follower_id' => 8,
                'created_at' => '2017-09-04 01:31:27',
                'updated_at' => '2017-09-04 01:31:27',
            ),
            145 => 
            array (
                'id' => 654,
                'following_id' => 48,
                'follower_id' => 96,
                'created_at' => '2017-09-16 22:35:25',
                'updated_at' => '2017-09-16 22:35:25',
            ),
            146 => 
            array (
                'id' => 655,
                'following_id' => 59,
                'follower_id' => 186,
                'created_at' => '2017-08-25 08:18:20',
                'updated_at' => '2017-08-25 08:18:20',
            ),
            147 => 
            array (
                'id' => 656,
                'following_id' => 157,
                'follower_id' => 71,
                'created_at' => '2017-09-14 23:09:43',
                'updated_at' => '2017-09-14 23:09:43',
            ),
            148 => 
            array (
                'id' => 657,
                'following_id' => 83,
                'follower_id' => 151,
                'created_at' => '2017-09-09 12:52:13',
                'updated_at' => '2017-09-09 12:52:13',
            ),
            149 => 
            array (
                'id' => 658,
                'following_id' => 26,
                'follower_id' => 109,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            150 => 
            array (
                'id' => 659,
                'following_id' => 34,
                'follower_id' => 85,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            151 => 
            array (
                'id' => 660,
                'following_id' => 31,
                'follower_id' => 28,
                'created_at' => '2017-09-12 13:57:52',
                'updated_at' => '2017-09-12 13:57:52',
            ),
            152 => 
            array (
                'id' => 661,
                'following_id' => 18,
                'follower_id' => 187,
                'created_at' => '2017-09-24 11:22:58',
                'updated_at' => '2017-09-24 11:22:58',
            ),
            153 => 
            array (
                'id' => 662,
                'following_id' => 163,
                'follower_id' => 99,
                'created_at' => '2017-09-20 06:53:39',
                'updated_at' => '2017-09-20 06:53:39',
            ),
            154 => 
            array (
                'id' => 663,
                'following_id' => 153,
                'follower_id' => 29,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            155 => 
            array (
                'id' => 664,
                'following_id' => 183,
                'follower_id' => 120,
                'created_at' => '2017-09-14 13:01:17',
                'updated_at' => '2017-09-14 13:01:17',
            ),
            156 => 
            array (
                'id' => 665,
                'following_id' => 26,
                'follower_id' => 95,
                'created_at' => '2017-09-02 11:19:34',
                'updated_at' => '2017-09-02 11:19:34',
            ),
            157 => 
            array (
                'id' => 666,
                'following_id' => 65,
                'follower_id' => 28,
                'created_at' => '2017-09-08 05:31:14',
                'updated_at' => '2017-09-08 05:31:14',
            ),
            158 => 
            array (
                'id' => 667,
                'following_id' => 71,
                'follower_id' => 141,
                'created_at' => '2017-09-10 10:45:25',
                'updated_at' => '2017-09-10 10:45:25',
            ),
            159 => 
            array (
                'id' => 668,
                'following_id' => 19,
                'follower_id' => 137,
                'created_at' => '2017-09-15 09:18:27',
                'updated_at' => '2017-09-15 09:18:27',
            ),
            160 => 
            array (
                'id' => 669,
                'following_id' => 88,
                'follower_id' => 42,
                'created_at' => '2017-09-15 00:30:34',
                'updated_at' => '2017-09-15 00:30:34',
            ),
            161 => 
            array (
                'id' => 671,
                'following_id' => 90,
                'follower_id' => 67,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            162 => 
            array (
                'id' => 672,
                'following_id' => 180,
                'follower_id' => 150,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            163 => 
            array (
                'id' => 673,
                'following_id' => 178,
                'follower_id' => 52,
                'created_at' => '2017-09-06 19:06:38',
                'updated_at' => '2017-09-06 19:06:38',
            ),
            164 => 
            array (
                'id' => 674,
                'following_id' => 135,
                'follower_id' => 117,
                'created_at' => '2017-09-02 22:52:19',
                'updated_at' => '2017-09-02 22:52:19',
            ),
            165 => 
            array (
                'id' => 675,
                'following_id' => 86,
                'follower_id' => 110,
                'created_at' => '2017-08-27 15:46:41',
                'updated_at' => '2017-08-27 15:46:41',
            ),
            166 => 
            array (
                'id' => 676,
                'following_id' => 33,
                'follower_id' => 149,
                'created_at' => '2017-09-12 06:10:29',
                'updated_at' => '2017-09-12 06:10:29',
            ),
            167 => 
            array (
                'id' => 677,
                'following_id' => 179,
                'follower_id' => 54,
                'created_at' => '2017-09-07 11:15:38',
                'updated_at' => '2017-09-07 11:15:38',
            ),
            168 => 
            array (
                'id' => 678,
                'following_id' => 6,
                'follower_id' => 37,
                'created_at' => '2017-09-18 12:59:56',
                'updated_at' => '2017-09-18 12:59:56',
            ),
            169 => 
            array (
                'id' => 679,
                'following_id' => 127,
                'follower_id' => 193,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            170 => 
            array (
                'id' => 680,
                'following_id' => 122,
                'follower_id' => 5,
                'created_at' => '2017-09-09 03:53:21',
                'updated_at' => '2017-09-09 03:53:21',
            ),
            171 => 
            array (
                'id' => 681,
                'following_id' => 2,
                'follower_id' => 41,
                'created_at' => '2017-09-09 14:02:19',
                'updated_at' => '2017-09-09 14:02:19',
            ),
            172 => 
            array (
                'id' => 682,
                'following_id' => 18,
                'follower_id' => 164,
                'created_at' => '2017-09-12 19:45:45',
                'updated_at' => '2017-09-12 19:45:45',
            ),
            173 => 
            array (
                'id' => 683,
                'following_id' => 123,
                'follower_id' => 112,
                'created_at' => '2017-09-07 05:40:20',
                'updated_at' => '2017-09-07 05:40:20',
            ),
            174 => 
            array (
                'id' => 684,
                'following_id' => 29,
                'follower_id' => 136,
                'created_at' => '2017-09-09 14:09:23',
                'updated_at' => '2017-09-09 14:09:23',
            ),
            175 => 
            array (
                'id' => 685,
                'following_id' => 17,
                'follower_id' => 93,
                'created_at' => '2017-09-07 04:04:45',
                'updated_at' => '2017-09-07 04:04:45',
            ),
            176 => 
            array (
                'id' => 686,
                'following_id' => 72,
                'follower_id' => 3,
                'created_at' => '2017-09-13 06:23:29',
                'updated_at' => '2017-09-13 06:23:29',
            ),
            177 => 
            array (
                'id' => 687,
                'following_id' => 94,
                'follower_id' => 105,
                'created_at' => '2017-09-03 18:51:13',
                'updated_at' => '2017-09-03 18:51:13',
            ),
            178 => 
            array (
                'id' => 688,
                'following_id' => 70,
                'follower_id' => 38,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            179 => 
            array (
                'id' => 689,
                'following_id' => 77,
                'follower_id' => 185,
                'created_at' => '2017-09-21 17:27:25',
                'updated_at' => '2017-09-21 17:27:25',
            ),
            180 => 
            array (
                'id' => 690,
                'following_id' => 18,
                'follower_id' => 139,
                'created_at' => '2017-08-27 00:44:29',
                'updated_at' => '2017-08-27 00:44:29',
            ),
            181 => 
            array (
                'id' => 691,
                'following_id' => 188,
                'follower_id' => 108,
                'created_at' => '2017-09-14 08:59:21',
                'updated_at' => '2017-09-14 08:59:21',
            ),
            182 => 
            array (
                'id' => 692,
                'following_id' => 96,
                'follower_id' => 142,
                'created_at' => '2017-09-08 06:51:14',
                'updated_at' => '2017-09-08 06:51:14',
            ),
            183 => 
            array (
                'id' => 693,
                'following_id' => 21,
                'follower_id' => 9,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            184 => 
            array (
                'id' => 694,
                'following_id' => 137,
                'follower_id' => 28,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            185 => 
            array (
                'id' => 695,
                'following_id' => 87,
                'follower_id' => 12,
                'created_at' => '2017-09-23 07:11:18',
                'updated_at' => '2017-09-23 07:11:18',
            ),
            186 => 
            array (
                'id' => 696,
                'following_id' => 186,
                'follower_id' => 45,
                'created_at' => '2017-09-04 01:31:28',
                'updated_at' => '2017-09-04 01:31:28',
            ),
            187 => 
            array (
                'id' => 697,
                'following_id' => 34,
                'follower_id' => 160,
                'created_at' => '2017-09-16 22:35:26',
                'updated_at' => '2017-09-16 22:35:26',
            ),
            188 => 
            array (
                'id' => 698,
                'following_id' => 169,
                'follower_id' => 146,
                'created_at' => '2017-08-25 08:18:21',
                'updated_at' => '2017-08-25 08:18:21',
            ),
            189 => 
            array (
                'id' => 699,
                'following_id' => 61,
                'follower_id' => 99,
                'created_at' => '2017-09-14 23:09:44',
                'updated_at' => '2017-09-14 23:09:44',
            ),
            190 => 
            array (
                'id' => 700,
                'following_id' => 86,
                'follower_id' => 73,
                'created_at' => '2017-09-09 12:52:14',
                'updated_at' => '2017-09-09 12:52:14',
            ),
            191 => 
            array (
                'id' => 701,
                'following_id' => 164,
                'follower_id' => 161,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            192 => 
            array (
                'id' => 702,
                'following_id' => 177,
                'follower_id' => 38,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            193 => 
            array (
                'id' => 703,
                'following_id' => 41,
                'follower_id' => 91,
                'created_at' => '2017-09-12 13:57:53',
                'updated_at' => '2017-09-12 13:57:53',
            ),
            194 => 
            array (
                'id' => 704,
                'following_id' => 178,
                'follower_id' => 115,
                'created_at' => '2017-09-24 11:22:59',
                'updated_at' => '2017-09-24 11:22:59',
            ),
            195 => 
            array (
                'id' => 705,
                'following_id' => 9,
                'follower_id' => 81,
                'created_at' => '2017-09-20 06:53:40',
                'updated_at' => '2017-09-20 06:53:40',
            ),
            196 => 
            array (
                'id' => 706,
                'following_id' => 171,
                'follower_id' => 65,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            197 => 
            array (
                'id' => 707,
                'following_id' => 46,
                'follower_id' => 189,
                'created_at' => '2017-09-14 13:01:18',
                'updated_at' => '2017-09-14 13:01:18',
            ),
            198 => 
            array (
                'id' => 708,
                'following_id' => 169,
                'follower_id' => 48,
                'created_at' => '2017-09-02 11:19:35',
                'updated_at' => '2017-09-02 11:19:35',
            ),
            199 => 
            array (
                'id' => 709,
                'following_id' => 73,
                'follower_id' => 52,
                'created_at' => '2017-09-08 05:31:15',
                'updated_at' => '2017-09-08 05:31:15',
            ),
            200 => 
            array (
                'id' => 710,
                'following_id' => 164,
                'follower_id' => 4,
                'created_at' => '2017-09-10 10:45:26',
                'updated_at' => '2017-09-10 10:45:26',
            ),
            201 => 
            array (
                'id' => 711,
                'following_id' => 63,
                'follower_id' => 170,
                'created_at' => '2017-09-15 09:18:28',
                'updated_at' => '2017-09-15 09:18:28',
            ),
            202 => 
            array (
                'id' => 712,
                'following_id' => 11,
                'follower_id' => 43,
                'created_at' => '2017-09-15 00:30:35',
                'updated_at' => '2017-09-15 00:30:35',
            ),
            203 => 
            array (
                'id' => 713,
                'following_id' => 127,
                'follower_id' => 195,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            204 => 
            array (
                'id' => 714,
                'following_id' => 122,
                'follower_id' => 17,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            205 => 
            array (
                'id' => 715,
                'following_id' => 135,
                'follower_id' => 112,
                'created_at' => '2017-09-06 19:06:39',
                'updated_at' => '2017-09-06 19:06:39',
            ),
            206 => 
            array (
                'id' => 716,
                'following_id' => 21,
                'follower_id' => 84,
                'created_at' => '2017-09-02 22:52:20',
                'updated_at' => '2017-09-02 22:52:20',
            ),
            207 => 
            array (
                'id' => 717,
                'following_id' => 23,
                'follower_id' => 107,
                'created_at' => '2017-08-27 15:46:42',
                'updated_at' => '2017-08-27 15:46:42',
            ),
            208 => 
            array (
                'id' => 718,
                'following_id' => 31,
                'follower_id' => 144,
                'created_at' => '2017-09-12 06:10:30',
                'updated_at' => '2017-09-12 06:10:30',
            ),
            209 => 
            array (
                'id' => 719,
                'following_id' => 174,
                'follower_id' => 30,
                'created_at' => '2017-09-07 11:15:39',
                'updated_at' => '2017-09-07 11:15:39',
            ),
            210 => 
            array (
                'id' => 720,
                'following_id' => 130,
                'follower_id' => 49,
                'created_at' => '2017-09-18 12:59:57',
                'updated_at' => '2017-09-18 12:59:57',
            ),
            211 => 
            array (
                'id' => 721,
                'following_id' => 2,
                'follower_id' => 15,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            212 => 
            array (
                'id' => 722,
                'following_id' => 124,
                'follower_id' => 8,
                'created_at' => '2017-09-09 03:53:22',
                'updated_at' => '2017-09-09 03:53:22',
            ),
            213 => 
            array (
                'id' => 723,
                'following_id' => 100,
                'follower_id' => 174,
                'created_at' => '2017-09-09 14:02:20',
                'updated_at' => '2017-09-09 14:02:20',
            ),
            214 => 
            array (
                'id' => 724,
                'following_id' => 107,
                'follower_id' => 136,
                'created_at' => '2017-09-12 19:45:46',
                'updated_at' => '2017-09-12 19:45:46',
            ),
            215 => 
            array (
                'id' => 725,
                'following_id' => 163,
                'follower_id' => 2,
                'created_at' => '2017-09-07 05:40:21',
                'updated_at' => '2017-09-07 05:40:21',
            ),
            216 => 
            array (
                'id' => 726,
                'following_id' => 78,
                'follower_id' => 91,
                'created_at' => '2017-09-09 14:09:24',
                'updated_at' => '2017-09-09 14:09:24',
            ),
            217 => 
            array (
                'id' => 727,
                'following_id' => 160,
                'follower_id' => 77,
                'created_at' => '2017-09-07 04:04:46',
                'updated_at' => '2017-09-07 04:04:46',
            ),
            218 => 
            array (
                'id' => 728,
                'following_id' => 116,
                'follower_id' => 119,
                'created_at' => '2017-09-13 06:23:30',
                'updated_at' => '2017-09-13 06:23:30',
            ),
            219 => 
            array (
                'id' => 729,
                'following_id' => 26,
                'follower_id' => 138,
                'created_at' => '2017-09-03 18:51:14',
                'updated_at' => '2017-09-03 18:51:14',
            ),
            220 => 
            array (
                'id' => 730,
                'following_id' => 128,
                'follower_id' => 34,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            221 => 
            array (
                'id' => 731,
                'following_id' => 166,
                'follower_id' => 195,
                'created_at' => '2017-09-21 17:27:26',
                'updated_at' => '2017-09-21 17:27:26',
            ),
            222 => 
            array (
                'id' => 732,
                'following_id' => 192,
                'follower_id' => 193,
                'created_at' => '2017-08-27 00:44:30',
                'updated_at' => '2017-08-27 00:44:30',
            ),
            223 => 
            array (
                'id' => 733,
                'following_id' => 158,
                'follower_id' => 24,
                'created_at' => '2017-09-14 08:59:22',
                'updated_at' => '2017-09-14 08:59:22',
            ),
            224 => 
            array (
                'id' => 734,
                'following_id' => 45,
                'follower_id' => 58,
                'created_at' => '2017-09-08 06:51:15',
                'updated_at' => '2017-09-08 06:51:15',
            ),
            225 => 
            array (
                'id' => 735,
                'following_id' => 176,
                'follower_id' => 150,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            226 => 
            array (
                'id' => 736,
                'following_id' => 26,
                'follower_id' => 168,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            227 => 
            array (
                'id' => 738,
                'following_id' => 132,
                'follower_id' => 57,
                'created_at' => '2017-09-23 07:11:19',
                'updated_at' => '2017-09-23 07:11:19',
            ),
            228 => 
            array (
                'id' => 739,
                'following_id' => 123,
                'follower_id' => 64,
                'created_at' => '2017-09-04 01:31:29',
                'updated_at' => '2017-09-04 01:31:29',
            ),
            229 => 
            array (
                'id' => 740,
                'following_id' => 156,
                'follower_id' => 46,
                'created_at' => '2017-09-16 22:35:27',
                'updated_at' => '2017-09-16 22:35:27',
            ),
            230 => 
            array (
                'id' => 741,
                'following_id' => 138,
                'follower_id' => 150,
                'created_at' => '2017-08-25 08:18:22',
                'updated_at' => '2017-08-25 08:18:22',
            ),
            231 => 
            array (
                'id' => 742,
                'following_id' => 150,
                'follower_id' => 81,
                'created_at' => '2017-09-14 23:09:45',
                'updated_at' => '2017-09-14 23:09:45',
            ),
            232 => 
            array (
                'id' => 743,
                'following_id' => 24,
                'follower_id' => 174,
                'created_at' => '2017-09-09 12:52:15',
                'updated_at' => '2017-09-09 12:52:15',
            ),
            233 => 
            array (
                'id' => 744,
                'following_id' => 190,
                'follower_id' => 100,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            234 => 
            array (
                'id' => 745,
                'following_id' => 149,
                'follower_id' => 96,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            235 => 
            array (
                'id' => 746,
                'following_id' => 135,
                'follower_id' => 160,
                'created_at' => '2017-09-12 13:57:54',
                'updated_at' => '2017-09-12 13:57:54',
            ),
            236 => 
            array (
                'id' => 747,
                'following_id' => 53,
                'follower_id' => 101,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            237 => 
            array (
                'id' => 748,
                'following_id' => 74,
                'follower_id' => 24,
                'created_at' => '2017-09-20 06:53:41',
                'updated_at' => '2017-09-20 06:53:41',
            ),
            238 => 
            array (
                'id' => 749,
                'following_id' => 157,
                'follower_id' => 46,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            239 => 
            array (
                'id' => 750,
                'following_id' => 125,
                'follower_id' => 62,
                'created_at' => '2017-09-14 13:01:19',
                'updated_at' => '2017-09-14 13:01:19',
            ),
            240 => 
            array (
                'id' => 751,
                'following_id' => 73,
                'follower_id' => 164,
                'created_at' => '2017-09-02 11:19:36',
                'updated_at' => '2017-09-02 11:19:36',
            ),
            241 => 
            array (
                'id' => 752,
                'following_id' => 80,
                'follower_id' => 132,
                'created_at' => '2017-09-08 05:31:16',
                'updated_at' => '2017-09-08 05:31:16',
            ),
            242 => 
            array (
                'id' => 753,
                'following_id' => 63,
                'follower_id' => 159,
                'created_at' => '2017-09-10 10:45:27',
                'updated_at' => '2017-09-10 10:45:27',
            ),
            243 => 
            array (
                'id' => 754,
                'following_id' => 73,
                'follower_id' => 39,
                'created_at' => '2017-09-15 09:18:29',
                'updated_at' => '2017-09-15 09:18:29',
            ),
            244 => 
            array (
                'id' => 755,
                'following_id' => 11,
                'follower_id' => 193,
                'created_at' => '2017-09-15 00:30:36',
                'updated_at' => '2017-09-15 00:30:36',
            ),
            245 => 
            array (
                'id' => 756,
                'following_id' => 145,
                'follower_id' => 131,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            246 => 
            array (
                'id' => 757,
                'following_id' => 88,
                'follower_id' => 138,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            247 => 
            array (
                'id' => 758,
                'following_id' => 36,
                'follower_id' => 40,
                'created_at' => '2017-09-06 19:06:40',
                'updated_at' => '2017-09-06 19:06:40',
            ),
            248 => 
            array (
                'id' => 759,
                'following_id' => 148,
                'follower_id' => 21,
                'created_at' => '2017-09-02 22:52:21',
                'updated_at' => '2017-09-02 22:52:21',
            ),
            249 => 
            array (
                'id' => 760,
                'following_id' => 25,
                'follower_id' => 167,
                'created_at' => '2017-08-27 15:46:43',
                'updated_at' => '2017-08-27 15:46:43',
            ),
            250 => 
            array (
                'id' => 761,
                'following_id' => 77,
                'follower_id' => 150,
                'created_at' => '2017-09-12 06:10:31',
                'updated_at' => '2017-09-12 06:10:31',
            ),
            251 => 
            array (
                'id' => 762,
                'following_id' => 181,
                'follower_id' => 165,
                'created_at' => '2017-09-07 11:15:40',
                'updated_at' => '2017-09-07 11:15:40',
            ),
            252 => 
            array (
                'id' => 763,
                'following_id' => 157,
                'follower_id' => 41,
                'created_at' => '2017-09-18 12:59:58',
                'updated_at' => '2017-09-18 12:59:58',
            ),
            253 => 
            array (
                'id' => 764,
                'following_id' => 169,
                'follower_id' => 41,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            254 => 
            array (
                'id' => 765,
                'following_id' => 123,
                'follower_id' => 126,
                'created_at' => '2017-09-09 03:53:23',
                'updated_at' => '2017-09-09 03:53:23',
            ),
            255 => 
            array (
                'id' => 766,
                'following_id' => 111,
                'follower_id' => 48,
                'created_at' => '2017-09-09 14:02:21',
                'updated_at' => '2017-09-09 14:02:21',
            ),
            256 => 
            array (
                'id' => 767,
                'following_id' => 130,
                'follower_id' => 65,
                'created_at' => '2017-09-12 19:45:47',
                'updated_at' => '2017-09-12 19:45:47',
            ),
            257 => 
            array (
                'id' => 768,
                'following_id' => 17,
                'follower_id' => 179,
                'created_at' => '2017-09-07 05:40:22',
                'updated_at' => '2017-09-07 05:40:22',
            ),
            258 => 
            array (
                'id' => 769,
                'following_id' => 92,
                'follower_id' => 44,
                'created_at' => '2017-09-09 14:09:25',
                'updated_at' => '2017-09-09 14:09:25',
            ),
            259 => 
            array (
                'id' => 770,
                'following_id' => 44,
                'follower_id' => 29,
                'created_at' => '2017-09-07 04:04:47',
                'updated_at' => '2017-09-07 04:04:47',
            ),
            260 => 
            array (
                'id' => 771,
                'following_id' => 79,
                'follower_id' => 189,
                'created_at' => '2017-09-13 06:23:31',
                'updated_at' => '2017-09-13 06:23:31',
            ),
            261 => 
            array (
                'id' => 772,
                'following_id' => 13,
                'follower_id' => 66,
                'created_at' => '2017-09-03 18:51:15',
                'updated_at' => '2017-09-03 18:51:15',
            ),
            262 => 
            array (
                'id' => 773,
                'following_id' => 44,
                'follower_id' => 118,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            263 => 
            array (
                'id' => 774,
                'following_id' => 151,
                'follower_id' => 127,
                'created_at' => '2017-09-21 17:27:27',
                'updated_at' => '2017-09-21 17:27:27',
            ),
            264 => 
            array (
                'id' => 775,
                'following_id' => 115,
                'follower_id' => 1,
                'created_at' => '2017-08-27 00:44:31',
                'updated_at' => '2017-08-27 00:44:31',
            ),
            265 => 
            array (
                'id' => 776,
                'following_id' => 14,
                'follower_id' => 96,
                'created_at' => '2017-09-14 08:59:23',
                'updated_at' => '2017-09-14 08:59:23',
            ),
            266 => 
            array (
                'id' => 777,
                'following_id' => 75,
                'follower_id' => 55,
                'created_at' => '2017-09-08 06:51:16',
                'updated_at' => '2017-09-08 06:51:16',
            ),
            267 => 
            array (
                'id' => 778,
                'following_id' => 65,
                'follower_id' => 138,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            268 => 
            array (
                'id' => 779,
                'following_id' => 88,
                'follower_id' => 111,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            269 => 
            array (
                'id' => 780,
                'following_id' => 49,
                'follower_id' => 7,
                'created_at' => '2017-09-23 07:11:20',
                'updated_at' => '2017-09-23 07:11:20',
            ),
            270 => 
            array (
                'id' => 781,
                'following_id' => 5,
                'follower_id' => 176,
                'created_at' => '2017-09-04 01:31:30',
                'updated_at' => '2017-09-04 01:31:30',
            ),
            271 => 
            array (
                'id' => 782,
                'following_id' => 44,
                'follower_id' => 70,
                'created_at' => '2017-09-16 22:35:28',
                'updated_at' => '2017-09-16 22:35:28',
            ),
            272 => 
            array (
                'id' => 783,
                'following_id' => 70,
                'follower_id' => 88,
                'created_at' => '2017-08-25 08:18:23',
                'updated_at' => '2017-08-25 08:18:23',
            ),
            273 => 
            array (
                'id' => 784,
                'following_id' => 54,
                'follower_id' => 161,
                'created_at' => '2017-09-14 23:09:46',
                'updated_at' => '2017-09-14 23:09:46',
            ),
            274 => 
            array (
                'id' => 785,
                'following_id' => 8,
                'follower_id' => 3,
                'created_at' => '2017-09-09 12:52:16',
                'updated_at' => '2017-09-09 12:52:16',
            ),
            275 => 
            array (
                'id' => 786,
                'following_id' => 50,
                'follower_id' => 54,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            276 => 
            array (
                'id' => 787,
                'following_id' => 186,
                'follower_id' => 64,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            277 => 
            array (
                'id' => 788,
                'following_id' => 169,
                'follower_id' => 180,
                'created_at' => '2017-09-12 13:57:55',
                'updated_at' => '2017-09-12 13:57:55',
            ),
            278 => 
            array (
                'id' => 789,
                'following_id' => 141,
                'follower_id' => 161,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            279 => 
            array (
                'id' => 790,
                'following_id' => 128,
                'follower_id' => 177,
                'created_at' => '2017-09-20 06:53:42',
                'updated_at' => '2017-09-20 06:53:42',
            ),
            280 => 
            array (
                'id' => 791,
                'following_id' => 101,
                'follower_id' => 133,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            281 => 
            array (
                'id' => 792,
                'following_id' => 37,
                'follower_id' => 41,
                'created_at' => '2017-09-14 13:01:20',
                'updated_at' => '2017-09-14 13:01:20',
            ),
            282 => 
            array (
                'id' => 793,
                'following_id' => 81,
                'follower_id' => 14,
                'created_at' => '2017-09-02 11:19:37',
                'updated_at' => '2017-09-02 11:19:37',
            ),
            283 => 
            array (
                'id' => 794,
                'following_id' => 19,
                'follower_id' => 159,
                'created_at' => '2017-09-08 05:31:17',
                'updated_at' => '2017-09-08 05:31:17',
            ),
            284 => 
            array (
                'id' => 795,
                'following_id' => 180,
                'follower_id' => 68,
                'created_at' => '2017-09-10 10:45:28',
                'updated_at' => '2017-09-10 10:45:28',
            ),
            285 => 
            array (
                'id' => 796,
                'following_id' => 188,
                'follower_id' => 81,
                'created_at' => '2017-09-15 09:18:30',
                'updated_at' => '2017-09-15 09:18:30',
            ),
            286 => 
            array (
                'id' => 797,
                'following_id' => 17,
                'follower_id' => 88,
                'created_at' => '2017-09-15 00:30:37',
                'updated_at' => '2017-09-15 00:30:37',
            ),
            287 => 
            array (
                'id' => 798,
                'following_id' => 93,
                'follower_id' => 131,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            288 => 
            array (
                'id' => 800,
                'following_id' => 182,
                'follower_id' => 45,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            289 => 
            array (
                'id' => 801,
                'following_id' => 67,
                'follower_id' => 31,
                'created_at' => '2017-09-06 19:06:41',
                'updated_at' => '2017-09-06 19:06:41',
            ),
            290 => 
            array (
                'id' => 802,
                'following_id' => 143,
                'follower_id' => 123,
                'created_at' => '2017-09-02 22:52:22',
                'updated_at' => '2017-09-02 22:52:22',
            ),
            291 => 
            array (
                'id' => 803,
                'following_id' => 101,
                'follower_id' => 116,
                'created_at' => '2017-08-27 15:46:44',
                'updated_at' => '2017-08-27 15:46:44',
            ),
            292 => 
            array (
                'id' => 804,
                'following_id' => 133,
                'follower_id' => 147,
                'created_at' => '2017-09-12 06:10:32',
                'updated_at' => '2017-09-12 06:10:32',
            ),
            293 => 
            array (
                'id' => 805,
                'following_id' => 47,
                'follower_id' => 60,
                'created_at' => '2017-09-07 11:15:41',
                'updated_at' => '2017-09-07 11:15:41',
            ),
            294 => 
            array (
                'id' => 806,
                'following_id' => 89,
                'follower_id' => 193,
                'created_at' => '2017-09-18 12:59:59',
                'updated_at' => '2017-09-18 12:59:59',
            ),
            295 => 
            array (
                'id' => 807,
                'following_id' => 13,
                'follower_id' => 162,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            296 => 
            array (
                'id' => 808,
                'following_id' => 120,
                'follower_id' => 87,
                'created_at' => '2017-09-09 03:53:24',
                'updated_at' => '2017-09-09 03:53:24',
            ),
            297 => 
            array (
                'id' => 809,
                'following_id' => 36,
                'follower_id' => 106,
                'created_at' => '2017-09-09 14:02:22',
                'updated_at' => '2017-09-09 14:02:22',
            ),
            298 => 
            array (
                'id' => 810,
                'following_id' => 146,
                'follower_id' => 94,
                'created_at' => '2017-09-12 19:45:48',
                'updated_at' => '2017-09-12 19:45:48',
            ),
            299 => 
            array (
                'id' => 811,
                'following_id' => 44,
                'follower_id' => 172,
                'created_at' => '2017-09-07 05:40:23',
                'updated_at' => '2017-09-07 05:40:23',
            ),
            300 => 
            array (
                'id' => 812,
                'following_id' => 42,
                'follower_id' => 128,
                'created_at' => '2017-09-09 14:09:26',
                'updated_at' => '2017-09-09 14:09:26',
            ),
            301 => 
            array (
                'id' => 813,
                'following_id' => 158,
                'follower_id' => 145,
                'created_at' => '2017-09-07 04:04:48',
                'updated_at' => '2017-09-07 04:04:48',
            ),
            302 => 
            array (
                'id' => 814,
                'following_id' => 76,
                'follower_id' => 139,
                'created_at' => '2017-09-13 06:23:32',
                'updated_at' => '2017-09-13 06:23:32',
            ),
            303 => 
            array (
                'id' => 815,
                'following_id' => 3,
                'follower_id' => 85,
                'created_at' => '2017-09-03 18:51:16',
                'updated_at' => '2017-09-03 18:51:16',
            ),
            304 => 
            array (
                'id' => 816,
                'following_id' => 169,
                'follower_id' => 187,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            305 => 
            array (
                'id' => 817,
                'following_id' => 101,
                'follower_id' => 3,
                'created_at' => '2017-09-21 17:27:28',
                'updated_at' => '2017-09-21 17:27:28',
            ),
            306 => 
            array (
                'id' => 818,
                'following_id' => 91,
                'follower_id' => 50,
                'created_at' => '2017-08-27 00:44:32',
                'updated_at' => '2017-08-27 00:44:32',
            ),
            307 => 
            array (
                'id' => 819,
                'following_id' => 39,
                'follower_id' => 137,
                'created_at' => '2017-09-14 08:59:24',
                'updated_at' => '2017-09-14 08:59:24',
            ),
            308 => 
            array (
                'id' => 820,
                'following_id' => 49,
                'follower_id' => 3,
                'created_at' => '2017-09-08 06:51:17',
                'updated_at' => '2017-09-08 06:51:17',
            ),
            309 => 
            array (
                'id' => 821,
                'following_id' => 73,
                'follower_id' => 66,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            310 => 
            array (
                'id' => 822,
                'following_id' => 173,
                'follower_id' => 186,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            311 => 
            array (
                'id' => 823,
                'following_id' => 17,
                'follower_id' => 83,
                'created_at' => '2017-09-23 07:11:21',
                'updated_at' => '2017-09-23 07:11:21',
            ),
            312 => 
            array (
                'id' => 824,
                'following_id' => 29,
                'follower_id' => 169,
                'created_at' => '2017-09-04 01:31:31',
                'updated_at' => '2017-09-04 01:31:31',
            ),
            313 => 
            array (
                'id' => 825,
                'following_id' => 188,
                'follower_id' => 173,
                'created_at' => '2017-09-16 22:35:29',
                'updated_at' => '2017-09-16 22:35:29',
            ),
            314 => 
            array (
                'id' => 826,
                'following_id' => 74,
                'follower_id' => 64,
                'created_at' => '2017-08-25 08:18:24',
                'updated_at' => '2017-08-25 08:18:24',
            ),
            315 => 
            array (
                'id' => 827,
                'following_id' => 176,
                'follower_id' => 57,
                'created_at' => '2017-09-14 23:09:47',
                'updated_at' => '2017-09-14 23:09:47',
            ),
            316 => 
            array (
                'id' => 828,
                'following_id' => 94,
                'follower_id' => 84,
                'created_at' => '2017-09-09 12:52:17',
                'updated_at' => '2017-09-09 12:52:17',
            ),
            317 => 
            array (
                'id' => 829,
                'following_id' => 150,
                'follower_id' => 153,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            318 => 
            array (
                'id' => 830,
                'following_id' => 155,
                'follower_id' => 112,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            319 => 
            array (
                'id' => 831,
                'following_id' => 30,
                'follower_id' => 10,
                'created_at' => '2017-09-12 13:57:56',
                'updated_at' => '2017-09-12 13:57:56',
            ),
            320 => 
            array (
                'id' => 832,
                'following_id' => 32,
                'follower_id' => 178,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            321 => 
            array (
                'id' => 833,
                'following_id' => 40,
                'follower_id' => 163,
                'created_at' => '2017-09-20 06:53:43',
                'updated_at' => '2017-09-20 06:53:43',
            ),
            322 => 
            array (
                'id' => 834,
                'following_id' => 28,
                'follower_id' => 50,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            323 => 
            array (
                'id' => 835,
                'following_id' => 180,
                'follower_id' => 17,
                'created_at' => '2017-09-14 13:01:21',
                'updated_at' => '2017-09-14 13:01:21',
            ),
            324 => 
            array (
                'id' => 836,
                'following_id' => 185,
                'follower_id' => 80,
                'created_at' => '2017-09-02 11:19:38',
                'updated_at' => '2017-09-02 11:19:38',
            ),
            325 => 
            array (
                'id' => 837,
                'following_id' => 150,
                'follower_id' => 57,
                'created_at' => '2017-09-08 05:31:18',
                'updated_at' => '2017-09-08 05:31:18',
            ),
            326 => 
            array (
                'id' => 838,
                'following_id' => 159,
                'follower_id' => 26,
                'created_at' => '2017-09-10 10:45:29',
                'updated_at' => '2017-09-10 10:45:29',
            ),
            327 => 
            array (
                'id' => 839,
                'following_id' => 18,
                'follower_id' => 100,
                'created_at' => '2017-09-15 09:18:31',
                'updated_at' => '2017-09-15 09:18:31',
            ),
            328 => 
            array (
                'id' => 840,
                'following_id' => 70,
                'follower_id' => 103,
                'created_at' => '2017-09-15 00:30:38',
                'updated_at' => '2017-09-15 00:30:38',
            ),
            329 => 
            array (
                'id' => 841,
                'following_id' => 8,
                'follower_id' => 33,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            330 => 
            array (
                'id' => 842,
                'following_id' => 114,
                'follower_id' => 127,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            331 => 
            array (
                'id' => 843,
                'following_id' => 181,
                'follower_id' => 109,
                'created_at' => '2017-09-06 19:06:42',
                'updated_at' => '2017-09-06 19:06:42',
            ),
            332 => 
            array (
                'id' => 844,
                'following_id' => 167,
                'follower_id' => 182,
                'created_at' => '2017-09-02 22:52:23',
                'updated_at' => '2017-09-02 22:52:23',
            ),
            333 => 
            array (
                'id' => 845,
                'following_id' => 80,
                'follower_id' => 126,
                'created_at' => '2017-08-27 15:46:45',
                'updated_at' => '2017-08-27 15:46:45',
            ),
            334 => 
            array (
                'id' => 846,
                'following_id' => 91,
                'follower_id' => 150,
                'created_at' => '2017-09-12 06:10:33',
                'updated_at' => '2017-09-12 06:10:33',
            ),
            335 => 
            array (
                'id' => 847,
                'following_id' => 51,
                'follower_id' => 33,
                'created_at' => '2017-09-07 11:15:42',
                'updated_at' => '2017-09-07 11:15:42',
            ),
            336 => 
            array (
                'id' => 848,
                'following_id' => 39,
                'follower_id' => 62,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            337 => 
            array (
                'id' => 849,
                'following_id' => 135,
                'follower_id' => 184,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            338 => 
            array (
                'id' => 850,
                'following_id' => 32,
                'follower_id' => 89,
                'created_at' => '2017-09-09 03:53:25',
                'updated_at' => '2017-09-09 03:53:25',
            ),
            339 => 
            array (
                'id' => 851,
                'following_id' => 100,
                'follower_id' => 31,
                'created_at' => '2017-09-09 14:02:23',
                'updated_at' => '2017-09-09 14:02:23',
            ),
            340 => 
            array (
                'id' => 852,
                'following_id' => 194,
                'follower_id' => 97,
                'created_at' => '2017-09-12 19:45:49',
                'updated_at' => '2017-09-12 19:45:49',
            ),
            341 => 
            array (
                'id' => 853,
                'following_id' => 151,
                'follower_id' => 142,
                'created_at' => '2017-09-07 05:40:24',
                'updated_at' => '2017-09-07 05:40:24',
            ),
            342 => 
            array (
                'id' => 854,
                'following_id' => 161,
                'follower_id' => 159,
                'created_at' => '2017-09-09 14:09:27',
                'updated_at' => '2017-09-09 14:09:27',
            ),
            343 => 
            array (
                'id' => 855,
                'following_id' => 40,
                'follower_id' => 120,
                'created_at' => '2017-09-07 04:04:49',
                'updated_at' => '2017-09-07 04:04:49',
            ),
            344 => 
            array (
                'id' => 856,
                'following_id' => 19,
                'follower_id' => 117,
                'created_at' => '2017-09-13 06:23:33',
                'updated_at' => '2017-09-13 06:23:33',
            ),
            345 => 
            array (
                'id' => 857,
                'following_id' => 91,
                'follower_id' => 127,
                'created_at' => '2017-09-03 18:51:17',
                'updated_at' => '2017-09-03 18:51:17',
            ),
            346 => 
            array (
                'id' => 858,
                'following_id' => 123,
                'follower_id' => 180,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            347 => 
            array (
                'id' => 859,
                'following_id' => 182,
                'follower_id' => 23,
                'created_at' => '2017-09-21 17:27:29',
                'updated_at' => '2017-09-21 17:27:29',
            ),
            348 => 
            array (
                'id' => 860,
                'following_id' => 67,
                'follower_id' => 170,
                'created_at' => '2017-08-27 00:44:33',
                'updated_at' => '2017-08-27 00:44:33',
            ),
            349 => 
            array (
                'id' => 861,
                'following_id' => 91,
                'follower_id' => 128,
                'created_at' => '2017-09-14 08:59:25',
                'updated_at' => '2017-09-14 08:59:25',
            ),
            350 => 
            array (
                'id' => 862,
                'following_id' => 172,
                'follower_id' => 112,
                'created_at' => '2017-09-08 06:51:18',
                'updated_at' => '2017-09-08 06:51:18',
            ),
            351 => 
            array (
                'id' => 863,
                'following_id' => 56,
                'follower_id' => 176,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            352 => 
            array (
                'id' => 864,
                'following_id' => 62,
                'follower_id' => 10,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            353 => 
            array (
                'id' => 865,
                'following_id' => 53,
                'follower_id' => 87,
                'created_at' => '2017-09-23 07:11:22',
                'updated_at' => '2017-09-23 07:11:22',
            ),
            354 => 
            array (
                'id' => 866,
                'following_id' => 159,
                'follower_id' => 57,
                'created_at' => '2017-09-04 01:31:32',
                'updated_at' => '2017-09-04 01:31:32',
            ),
            355 => 
            array (
                'id' => 867,
                'following_id' => 178,
                'follower_id' => 47,
                'created_at' => '2017-09-16 22:35:30',
                'updated_at' => '2017-09-16 22:35:30',
            ),
            356 => 
            array (
                'id' => 868,
                'following_id' => 156,
                'follower_id' => 121,
                'created_at' => '2017-08-25 08:18:25',
                'updated_at' => '2017-08-25 08:18:25',
            ),
            357 => 
            array (
                'id' => 869,
                'following_id' => 111,
                'follower_id' => 55,
                'created_at' => '2017-09-14 23:09:48',
                'updated_at' => '2017-09-14 23:09:48',
            ),
            358 => 
            array (
                'id' => 870,
                'following_id' => 145,
                'follower_id' => 164,
                'created_at' => '2017-09-09 12:52:18',
                'updated_at' => '2017-09-09 12:52:18',
            ),
            359 => 
            array (
                'id' => 871,
                'following_id' => 8,
                'follower_id' => 15,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            360 => 
            array (
                'id' => 872,
                'following_id' => 26,
                'follower_id' => 117,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            361 => 
            array (
                'id' => 873,
                'following_id' => 32,
                'follower_id' => 109,
                'created_at' => '2017-09-12 13:57:57',
                'updated_at' => '2017-09-12 13:57:57',
            ),
            362 => 
            array (
                'id' => 874,
                'following_id' => 43,
                'follower_id' => 71,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            363 => 
            array (
                'id' => 875,
                'following_id' => 88,
                'follower_id' => 56,
                'created_at' => '2017-09-20 06:53:44',
                'updated_at' => '2017-09-20 06:53:44',
            ),
            364 => 
            array (
                'id' => 876,
                'following_id' => 104,
                'follower_id' => 195,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            365 => 
            array (
                'id' => 877,
                'following_id' => 28,
                'follower_id' => 1,
                'created_at' => '2017-09-14 13:01:22',
                'updated_at' => '2017-09-14 13:01:22',
            ),
            366 => 
            array (
                'id' => 878,
                'following_id' => 26,
                'follower_id' => 55,
                'created_at' => '2017-09-02 11:19:39',
                'updated_at' => '2017-09-02 11:19:39',
            ),
            367 => 
            array (
                'id' => 879,
                'following_id' => 135,
                'follower_id' => 83,
                'created_at' => '2017-09-08 05:31:19',
                'updated_at' => '2017-09-08 05:31:19',
            ),
            368 => 
            array (
                'id' => 880,
                'following_id' => 148,
                'follower_id' => 16,
                'created_at' => '2017-09-10 10:45:30',
                'updated_at' => '2017-09-10 10:45:30',
            ),
            369 => 
            array (
                'id' => 881,
                'following_id' => 163,
                'follower_id' => 21,
                'created_at' => '2017-09-15 09:18:32',
                'updated_at' => '2017-09-15 09:18:32',
            ),
            370 => 
            array (
                'id' => 882,
                'following_id' => 77,
                'follower_id' => 116,
                'created_at' => '2017-09-15 00:30:39',
                'updated_at' => '2017-09-15 00:30:39',
            ),
            371 => 
            array (
                'id' => 883,
                'following_id' => 98,
                'follower_id' => 120,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            372 => 
            array (
                'id' => 884,
                'following_id' => 89,
                'follower_id' => 35,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            373 => 
            array (
                'id' => 885,
                'following_id' => 146,
                'follower_id' => 122,
                'created_at' => '2017-09-06 19:06:43',
                'updated_at' => '2017-09-06 19:06:43',
            ),
            374 => 
            array (
                'id' => 886,
                'following_id' => 47,
                'follower_id' => 152,
                'created_at' => '2017-09-02 22:52:24',
                'updated_at' => '2017-09-02 22:52:24',
            ),
            375 => 
            array (
                'id' => 887,
                'following_id' => 10,
                'follower_id' => 24,
                'created_at' => '2017-08-27 15:46:46',
                'updated_at' => '2017-08-27 15:46:46',
            ),
            376 => 
            array (
                'id' => 888,
                'following_id' => 160,
                'follower_id' => 101,
                'created_at' => '2017-09-12 06:10:34',
                'updated_at' => '2017-09-12 06:10:34',
            ),
            377 => 
            array (
                'id' => 889,
                'following_id' => 28,
                'follower_id' => 176,
                'created_at' => '2017-09-07 11:15:43',
                'updated_at' => '2017-09-07 11:15:43',
            ),
            378 => 
            array (
                'id' => 890,
                'following_id' => 34,
                'follower_id' => 183,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            379 => 
            array (
                'id' => 891,
                'following_id' => 193,
                'follower_id' => 141,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            380 => 
            array (
                'id' => 892,
                'following_id' => 166,
                'follower_id' => 139,
                'created_at' => '2017-09-09 03:53:26',
                'updated_at' => '2017-09-09 03:53:26',
            ),
            381 => 
            array (
                'id' => 893,
                'following_id' => 46,
                'follower_id' => 164,
                'created_at' => '2017-09-09 14:02:24',
                'updated_at' => '2017-09-09 14:02:24',
            ),
            382 => 
            array (
                'id' => 894,
                'following_id' => 193,
                'follower_id' => 122,
                'created_at' => '2017-09-12 19:45:50',
                'updated_at' => '2017-09-12 19:45:50',
            ),
            383 => 
            array (
                'id' => 895,
                'following_id' => 181,
                'follower_id' => 81,
                'created_at' => '2017-09-07 05:40:25',
                'updated_at' => '2017-09-07 05:40:25',
            ),
            384 => 
            array (
                'id' => 896,
                'following_id' => 5,
                'follower_id' => 25,
                'created_at' => '2017-09-09 14:09:28',
                'updated_at' => '2017-09-09 14:09:28',
            ),
            385 => 
            array (
                'id' => 897,
                'following_id' => 123,
                'follower_id' => 42,
                'created_at' => '2017-09-07 04:04:50',
                'updated_at' => '2017-09-07 04:04:50',
            ),
            386 => 
            array (
                'id' => 898,
                'following_id' => 78,
                'follower_id' => 9,
                'created_at' => '2017-09-13 06:23:34',
                'updated_at' => '2017-09-13 06:23:34',
            ),
            387 => 
            array (
                'id' => 899,
                'following_id' => 106,
                'follower_id' => 117,
                'created_at' => '2017-09-03 18:51:18',
                'updated_at' => '2017-09-03 18:51:18',
            ),
            388 => 
            array (
                'id' => 900,
                'following_id' => 101,
                'follower_id' => 162,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            389 => 
            array (
                'id' => 901,
                'following_id' => 100,
                'follower_id' => 32,
                'created_at' => '2017-09-21 17:27:30',
                'updated_at' => '2017-09-21 17:27:30',
            ),
            390 => 
            array (
                'id' => 902,
                'following_id' => 20,
                'follower_id' => 191,
                'created_at' => '2017-08-27 00:44:34',
                'updated_at' => '2017-08-27 00:44:34',
            ),
            391 => 
            array (
                'id' => 903,
                'following_id' => 12,
                'follower_id' => 138,
                'created_at' => '2017-09-14 08:59:26',
                'updated_at' => '2017-09-14 08:59:26',
            ),
            392 => 
            array (
                'id' => 904,
                'following_id' => 7,
                'follower_id' => 92,
                'created_at' => '2017-09-08 06:51:19',
                'updated_at' => '2017-09-08 06:51:19',
            ),
            393 => 
            array (
                'id' => 905,
                'following_id' => 106,
                'follower_id' => 33,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            394 => 
            array (
                'id' => 906,
                'following_id' => 189,
                'follower_id' => 27,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            395 => 
            array (
                'id' => 907,
                'following_id' => 35,
                'follower_id' => 190,
                'created_at' => '2017-09-23 07:11:23',
                'updated_at' => '2017-09-23 07:11:23',
            ),
            396 => 
            array (
                'id' => 908,
                'following_id' => 139,
                'follower_id' => 107,
                'created_at' => '2017-09-04 01:31:33',
                'updated_at' => '2017-09-04 01:31:33',
            ),
            397 => 
            array (
                'id' => 909,
                'following_id' => 82,
                'follower_id' => 180,
                'created_at' => '2017-09-16 22:35:31',
                'updated_at' => '2017-09-16 22:35:31',
            ),
            398 => 
            array (
                'id' => 910,
                'following_id' => 74,
                'follower_id' => 114,
                'created_at' => '2017-08-25 08:18:26',
                'updated_at' => '2017-08-25 08:18:26',
            ),
            399 => 
            array (
                'id' => 912,
                'following_id' => 129,
                'follower_id' => 188,
                'created_at' => '2017-09-14 23:09:49',
                'updated_at' => '2017-09-14 23:09:49',
            ),
            400 => 
            array (
                'id' => 913,
                'following_id' => 69,
                'follower_id' => 171,
                'created_at' => '2017-09-09 12:52:19',
                'updated_at' => '2017-09-09 12:52:19',
            ),
            401 => 
            array (
                'id' => 914,
                'following_id' => 28,
                'follower_id' => 87,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            402 => 
            array (
                'id' => 915,
                'following_id' => 133,
                'follower_id' => 165,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            403 => 
            array (
                'id' => 916,
                'following_id' => 150,
                'follower_id' => 106,
                'created_at' => '2017-09-12 13:57:58',
                'updated_at' => '2017-09-12 13:57:58',
            ),
            404 => 
            array (
                'id' => 917,
                'following_id' => 131,
                'follower_id' => 55,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            405 => 
            array (
                'id' => 919,
                'following_id' => 134,
                'follower_id' => 117,
                'created_at' => '2017-09-20 06:53:45',
                'updated_at' => '2017-09-20 06:53:45',
            ),
            406 => 
            array (
                'id' => 920,
                'following_id' => 47,
                'follower_id' => 133,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            407 => 
            array (
                'id' => 921,
                'following_id' => 77,
                'follower_id' => 74,
                'created_at' => '2017-09-14 13:01:23',
                'updated_at' => '2017-09-14 13:01:23',
            ),
            408 => 
            array (
                'id' => 922,
                'following_id' => 109,
                'follower_id' => 194,
                'created_at' => '2017-09-02 11:19:40',
                'updated_at' => '2017-09-02 11:19:40',
            ),
            409 => 
            array (
                'id' => 923,
                'following_id' => 45,
                'follower_id' => 165,
                'created_at' => '2017-09-08 05:31:20',
                'updated_at' => '2017-09-08 05:31:20',
            ),
            410 => 
            array (
                'id' => 924,
                'following_id' => 53,
                'follower_id' => 37,
                'created_at' => '2017-09-10 10:45:31',
                'updated_at' => '2017-09-10 10:45:31',
            ),
            411 => 
            array (
                'id' => 925,
                'following_id' => 97,
                'follower_id' => 190,
                'created_at' => '2017-09-15 09:18:33',
                'updated_at' => '2017-09-15 09:18:33',
            ),
            412 => 
            array (
                'id' => 926,
                'following_id' => 110,
                'follower_id' => 23,
                'created_at' => '2017-09-15 00:30:40',
                'updated_at' => '2017-09-15 00:30:40',
            ),
            413 => 
            array (
                'id' => 927,
                'following_id' => 53,
                'follower_id' => 31,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            414 => 
            array (
                'id' => 928,
                'following_id' => 98,
                'follower_id' => 65,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            415 => 
            array (
                'id' => 929,
                'following_id' => 69,
                'follower_id' => 137,
                'created_at' => '2017-09-06 19:06:44',
                'updated_at' => '2017-09-06 19:06:44',
            ),
            416 => 
            array (
                'id' => 930,
                'following_id' => 170,
                'follower_id' => 107,
                'created_at' => '2017-09-02 22:52:25',
                'updated_at' => '2017-09-02 22:52:25',
            ),
            417 => 
            array (
                'id' => 931,
                'following_id' => 91,
                'follower_id' => 153,
                'created_at' => '2017-08-27 15:46:47',
                'updated_at' => '2017-08-27 15:46:47',
            ),
            418 => 
            array (
                'id' => 932,
                'following_id' => 3,
                'follower_id' => 56,
                'created_at' => '2017-09-12 06:10:35',
                'updated_at' => '2017-09-12 06:10:35',
            ),
            419 => 
            array (
                'id' => 933,
                'following_id' => 47,
                'follower_id' => 76,
                'created_at' => '2017-09-07 11:15:44',
                'updated_at' => '2017-09-07 11:15:44',
            ),
            420 => 
            array (
                'id' => 934,
                'following_id' => 114,
                'follower_id' => 153,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            421 => 
            array (
                'id' => 935,
                'following_id' => 24,
                'follower_id' => 63,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            422 => 
            array (
                'id' => 936,
                'following_id' => 87,
                'follower_id' => 134,
                'created_at' => '2017-09-09 03:53:27',
                'updated_at' => '2017-09-09 03:53:27',
            ),
            423 => 
            array (
                'id' => 937,
                'following_id' => 171,
                'follower_id' => 56,
                'created_at' => '2017-09-09 14:02:25',
                'updated_at' => '2017-09-09 14:02:25',
            ),
            424 => 
            array (
                'id' => 938,
                'following_id' => 161,
                'follower_id' => 160,
                'created_at' => '2017-09-12 19:45:51',
                'updated_at' => '2017-09-12 19:45:51',
            ),
            425 => 
            array (
                'id' => 939,
                'following_id' => 125,
                'follower_id' => 103,
                'created_at' => '2017-09-07 05:40:26',
                'updated_at' => '2017-09-07 05:40:26',
            ),
            426 => 
            array (
                'id' => 940,
                'following_id' => 81,
                'follower_id' => 3,
                'created_at' => '2017-09-09 14:09:29',
                'updated_at' => '2017-09-09 14:09:29',
            ),
            427 => 
            array (
                'id' => 941,
                'following_id' => 56,
                'follower_id' => 140,
                'created_at' => '2017-09-07 04:04:51',
                'updated_at' => '2017-09-07 04:04:51',
            ),
            428 => 
            array (
                'id' => 942,
                'following_id' => 162,
                'follower_id' => 25,
                'created_at' => '2017-09-13 06:23:35',
                'updated_at' => '2017-09-13 06:23:35',
            ),
            429 => 
            array (
                'id' => 943,
                'following_id' => 114,
                'follower_id' => 65,
                'created_at' => '2017-09-03 18:51:19',
                'updated_at' => '2017-09-03 18:51:19',
            ),
            430 => 
            array (
                'id' => 944,
                'following_id' => 145,
                'follower_id' => 23,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            431 => 
            array (
                'id' => 945,
                'following_id' => 86,
                'follower_id' => 27,
                'created_at' => '2017-09-21 17:27:31',
                'updated_at' => '2017-09-21 17:27:31',
            ),
            432 => 
            array (
                'id' => 946,
                'following_id' => 106,
                'follower_id' => 78,
                'created_at' => '2017-08-27 00:44:35',
                'updated_at' => '2017-08-27 00:44:35',
            ),
            433 => 
            array (
                'id' => 947,
                'following_id' => 63,
                'follower_id' => 178,
                'created_at' => '2017-09-14 08:59:27',
                'updated_at' => '2017-09-14 08:59:27',
            ),
            434 => 
            array (
                'id' => 948,
                'following_id' => 13,
                'follower_id' => 7,
                'created_at' => '2017-09-08 06:51:20',
                'updated_at' => '2017-09-08 06:51:20',
            ),
            435 => 
            array (
                'id' => 949,
                'following_id' => 76,
                'follower_id' => 156,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            436 => 
            array (
                'id' => 950,
                'following_id' => 183,
                'follower_id' => 163,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            437 => 
            array (
                'id' => 951,
                'following_id' => 76,
                'follower_id' => 25,
                'created_at' => '2017-09-23 07:11:24',
                'updated_at' => '2017-09-23 07:11:24',
            ),
            438 => 
            array (
                'id' => 952,
                'following_id' => 103,
                'follower_id' => 57,
                'created_at' => '2017-09-04 01:31:34',
                'updated_at' => '2017-09-04 01:31:34',
            ),
            439 => 
            array (
                'id' => 953,
                'following_id' => 22,
                'follower_id' => 97,
                'created_at' => '2017-09-16 22:35:32',
                'updated_at' => '2017-09-16 22:35:32',
            ),
            440 => 
            array (
                'id' => 954,
                'following_id' => 115,
                'follower_id' => 43,
                'created_at' => '2017-08-25 08:18:27',
                'updated_at' => '2017-08-25 08:18:27',
            ),
            441 => 
            array (
                'id' => 955,
                'following_id' => 86,
                'follower_id' => 159,
                'created_at' => '2017-09-14 23:09:50',
                'updated_at' => '2017-09-14 23:09:50',
            ),
            442 => 
            array (
                'id' => 956,
                'following_id' => 11,
                'follower_id' => 33,
                'created_at' => '2017-09-09 12:52:20',
                'updated_at' => '2017-09-09 12:52:20',
            ),
            443 => 
            array (
                'id' => 957,
                'following_id' => 35,
                'follower_id' => 17,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            444 => 
            array (
                'id' => 958,
                'following_id' => 45,
                'follower_id' => 16,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            445 => 
            array (
                'id' => 959,
                'following_id' => 55,
                'follower_id' => 18,
                'created_at' => '2017-09-12 13:57:59',
                'updated_at' => '2017-09-12 13:57:59',
            ),
            446 => 
            array (
                'id' => 960,
                'following_id' => 187,
                'follower_id' => 134,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            447 => 
            array (
                'id' => 961,
                'following_id' => 104,
                'follower_id' => 18,
                'created_at' => '2017-09-20 06:53:46',
                'updated_at' => '2017-09-20 06:53:46',
            ),
            448 => 
            array (
                'id' => 962,
                'following_id' => 128,
                'follower_id' => 98,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            449 => 
            array (
                'id' => 963,
                'following_id' => 161,
                'follower_id' => 62,
                'created_at' => '2017-09-14 13:01:24',
                'updated_at' => '2017-09-14 13:01:24',
            ),
            450 => 
            array (
                'id' => 964,
                'following_id' => 118,
                'follower_id' => 169,
                'created_at' => '2017-09-02 11:19:41',
                'updated_at' => '2017-09-02 11:19:41',
            ),
            451 => 
            array (
                'id' => 965,
                'following_id' => 66,
                'follower_id' => 115,
                'created_at' => '2017-09-08 05:31:21',
                'updated_at' => '2017-09-08 05:31:21',
            ),
            452 => 
            array (
                'id' => 966,
                'following_id' => 40,
                'follower_id' => 80,
                'created_at' => '2017-09-10 10:45:32',
                'updated_at' => '2017-09-10 10:45:32',
            ),
            453 => 
            array (
                'id' => 967,
                'following_id' => 139,
                'follower_id' => 193,
                'created_at' => '2017-09-15 09:18:34',
                'updated_at' => '2017-09-15 09:18:34',
            ),
            454 => 
            array (
                'id' => 968,
                'following_id' => 170,
                'follower_id' => 145,
                'created_at' => '2017-09-15 00:30:41',
                'updated_at' => '2017-09-15 00:30:41',
            ),
            455 => 
            array (
                'id' => 969,
                'following_id' => 172,
                'follower_id' => 48,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            456 => 
            array (
                'id' => 970,
                'following_id' => 79,
                'follower_id' => 49,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            457 => 
            array (
                'id' => 971,
                'following_id' => 180,
                'follower_id' => 168,
                'created_at' => '2017-09-06 19:06:45',
                'updated_at' => '2017-09-06 19:06:45',
            ),
            458 => 
            array (
                'id' => 972,
                'following_id' => 178,
                'follower_id' => 56,
                'created_at' => '2017-09-02 22:52:26',
                'updated_at' => '2017-09-02 22:52:26',
            ),
            459 => 
            array (
                'id' => 973,
                'following_id' => 47,
                'follower_id' => 13,
                'created_at' => '2017-08-27 15:46:48',
                'updated_at' => '2017-08-27 15:46:48',
            ),
            460 => 
            array (
                'id' => 974,
                'following_id' => 166,
                'follower_id' => 158,
                'created_at' => '2017-09-12 06:10:36',
                'updated_at' => '2017-09-12 06:10:36',
            ),
            461 => 
            array (
                'id' => 975,
                'following_id' => 114,
                'follower_id' => 10,
                'created_at' => '2017-09-07 11:15:45',
                'updated_at' => '2017-09-07 11:15:45',
            ),
            462 => 
            array (
                'id' => 976,
                'following_id' => 160,
                'follower_id' => 64,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            463 => 
            array (
                'id' => 977,
                'following_id' => 23,
                'follower_id' => 57,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            464 => 
            array (
                'id' => 978,
                'following_id' => 30,
                'follower_id' => 9,
                'created_at' => '2017-09-09 03:53:28',
                'updated_at' => '2017-09-09 03:53:28',
            ),
            465 => 
            array (
                'id' => 979,
                'following_id' => 129,
                'follower_id' => 190,
                'created_at' => '2017-09-09 14:02:26',
                'updated_at' => '2017-09-09 14:02:26',
            ),
            466 => 
            array (
                'id' => 980,
                'following_id' => 62,
                'follower_id' => 145,
                'created_at' => '2017-09-12 19:45:52',
                'updated_at' => '2017-09-12 19:45:52',
            ),
            467 => 
            array (
                'id' => 981,
                'following_id' => 145,
                'follower_id' => 68,
                'created_at' => '2017-09-07 05:40:27',
                'updated_at' => '2017-09-07 05:40:27',
            ),
            468 => 
            array (
                'id' => 983,
                'following_id' => 134,
                'follower_id' => 27,
                'created_at' => '2017-09-09 14:09:30',
                'updated_at' => '2017-09-09 14:09:30',
            ),
            469 => 
            array (
                'id' => 984,
                'following_id' => 167,
                'follower_id' => 81,
                'created_at' => '2017-09-07 04:04:52',
                'updated_at' => '2017-09-07 04:04:52',
            ),
            470 => 
            array (
                'id' => 986,
                'following_id' => 33,
                'follower_id' => 73,
                'created_at' => '2017-09-13 06:23:36',
                'updated_at' => '2017-09-13 06:23:36',
            ),
            471 => 
            array (
                'id' => 987,
                'following_id' => 109,
                'follower_id' => 44,
                'created_at' => '2017-09-03 18:51:20',
                'updated_at' => '2017-09-03 18:51:20',
            ),
            472 => 
            array (
                'id' => 988,
                'following_id' => 125,
                'follower_id' => 108,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            473 => 
            array (
                'id' => 989,
                'following_id' => 159,
                'follower_id' => 115,
                'created_at' => '2017-09-21 17:27:32',
                'updated_at' => '2017-09-21 17:27:32',
            ),
            474 => 
            array (
                'id' => 990,
                'following_id' => 120,
                'follower_id' => 71,
                'created_at' => '2017-08-27 00:44:36',
                'updated_at' => '2017-08-27 00:44:36',
            ),
            475 => 
            array (
                'id' => 991,
                'following_id' => 82,
                'follower_id' => 82,
                'created_at' => '2017-09-14 08:59:28',
                'updated_at' => '2017-09-14 08:59:28',
            ),
            476 => 
            array (
                'id' => 992,
                'following_id' => 17,
                'follower_id' => 166,
                'created_at' => '2017-09-08 06:51:21',
                'updated_at' => '2017-09-08 06:51:21',
            ),
            477 => 
            array (
                'id' => 993,
                'following_id' => 52,
                'follower_id' => 33,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            478 => 
            array (
                'id' => 994,
                'following_id' => 125,
                'follower_id' => 133,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            479 => 
            array (
                'id' => 995,
                'following_id' => 69,
                'follower_id' => 154,
                'created_at' => '2017-09-23 07:11:25',
                'updated_at' => '2017-09-23 07:11:25',
            ),
            480 => 
            array (
                'id' => 996,
                'following_id' => 49,
                'follower_id' => 103,
                'created_at' => '2017-09-04 01:31:35',
                'updated_at' => '2017-09-04 01:31:35',
            ),
            481 => 
            array (
                'id' => 997,
                'following_id' => 63,
                'follower_id' => 26,
                'created_at' => '2017-09-16 22:35:33',
                'updated_at' => '2017-09-16 22:35:33',
            ),
            482 => 
            array (
                'id' => 998,
                'following_id' => 194,
                'follower_id' => 2,
                'created_at' => '2017-08-25 08:18:28',
                'updated_at' => '2017-08-25 08:18:28',
            ),
            483 => 
            array (
                'id' => 999,
                'following_id' => 40,
                'follower_id' => 184,
                'created_at' => '2017-09-14 23:09:51',
                'updated_at' => '2017-09-14 23:09:51',
            ),
            484 => 
            array (
                'id' => 1000,
                'following_id' => 140,
                'follower_id' => 18,
                'created_at' => '2017-09-09 12:52:21',
                'updated_at' => '2017-09-09 12:52:21',
            ),
            485 => 
            array (
                'id' => 1001,
                'following_id' => 170,
                'follower_id' => 50,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            486 => 
            array (
                'id' => 1002,
                'following_id' => 70,
                'follower_id' => 107,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            487 => 
            array (
                'id' => 1003,
                'following_id' => 80,
                'follower_id' => 9,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            488 => 
            array (
                'id' => 1004,
                'following_id' => 53,
                'follower_id' => 105,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            489 => 
            array (
                'id' => 1005,
                'following_id' => 128,
                'follower_id' => 97,
                'created_at' => '2017-09-20 06:53:47',
                'updated_at' => '2017-09-20 06:53:47',
            ),
            490 => 
            array (
                'id' => 1006,
                'following_id' => 97,
                'follower_id' => 22,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            491 => 
            array (
                'id' => 1007,
                'following_id' => 110,
                'follower_id' => 168,
                'created_at' => '2017-09-14 13:01:25',
                'updated_at' => '2017-09-14 13:01:25',
            ),
            492 => 
            array (
                'id' => 1008,
                'following_id' => 171,
                'follower_id' => 123,
                'created_at' => '2017-09-02 11:19:42',
                'updated_at' => '2017-09-02 11:19:42',
            ),
            493 => 
            array (
                'id' => 1009,
                'following_id' => 139,
                'follower_id' => 158,
                'created_at' => '2017-09-08 05:31:22',
                'updated_at' => '2017-09-08 05:31:22',
            ),
            494 => 
            array (
                'id' => 1010,
                'following_id' => 26,
                'follower_id' => 111,
                'created_at' => '2017-09-10 10:45:33',
                'updated_at' => '2017-09-10 10:45:33',
            ),
            495 => 
            array (
                'id' => 1011,
                'following_id' => 19,
                'follower_id' => 27,
                'created_at' => '2017-09-15 09:18:35',
                'updated_at' => '2017-09-15 09:18:35',
            ),
            496 => 
            array (
                'id' => 1012,
                'following_id' => 15,
                'follower_id' => 140,
                'created_at' => '2017-09-15 00:30:42',
                'updated_at' => '2017-09-15 00:30:42',
            ),
            497 => 
            array (
                'id' => 1013,
                'following_id' => 182,
                'follower_id' => 169,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            498 => 
            array (
                'id' => 1014,
                'following_id' => 120,
                'follower_id' => 155,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            499 => 
            array (
                'id' => 1015,
                'following_id' => 57,
                'follower_id' => 56,
                'created_at' => '2017-09-06 19:06:46',
                'updated_at' => '2017-09-06 19:06:46',
            ),
        ));
        \DB::table('follows')->insert(array (
            0 => 
            array (
                'id' => 1016,
                'following_id' => 33,
                'follower_id' => 158,
                'created_at' => '2017-09-02 22:52:27',
                'updated_at' => '2017-09-02 22:52:27',
            ),
            1 => 
            array (
                'id' => 1017,
                'following_id' => 150,
                'follower_id' => 193,
                'created_at' => '2017-08-27 15:46:49',
                'updated_at' => '2017-08-27 15:46:49',
            ),
            2 => 
            array (
                'id' => 1020,
                'following_id' => 56,
                'follower_id' => 171,
                'created_at' => '2017-09-12 06:10:37',
                'updated_at' => '2017-09-12 06:10:37',
            ),
            3 => 
            array (
                'id' => 1021,
                'following_id' => 190,
                'follower_id' => 183,
                'created_at' => '2017-09-07 11:15:46',
                'updated_at' => '2017-09-07 11:15:46',
            ),
            4 => 
            array (
                'id' => 1022,
                'following_id' => 21,
                'follower_id' => 52,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            5 => 
            array (
                'id' => 1023,
                'following_id' => 105,
                'follower_id' => 71,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            6 => 
            array (
                'id' => 1024,
                'following_id' => 121,
                'follower_id' => 42,
                'created_at' => '2017-09-09 03:53:29',
                'updated_at' => '2017-09-09 03:53:29',
            ),
            7 => 
            array (
                'id' => 1025,
                'following_id' => 142,
                'follower_id' => 183,
                'created_at' => '2017-09-09 14:02:27',
                'updated_at' => '2017-09-09 14:02:27',
            ),
            8 => 
            array (
                'id' => 1026,
                'following_id' => 169,
                'follower_id' => 119,
                'created_at' => '2017-09-12 19:45:53',
                'updated_at' => '2017-09-12 19:45:53',
            ),
            9 => 
            array (
                'id' => 1027,
                'following_id' => 82,
                'follower_id' => 38,
                'created_at' => '2017-09-07 05:40:28',
                'updated_at' => '2017-09-07 05:40:28',
            ),
            10 => 
            array (
                'id' => 1028,
                'following_id' => 109,
                'follower_id' => 105,
                'created_at' => '2017-09-09 14:09:31',
                'updated_at' => '2017-09-09 14:09:31',
            ),
            11 => 
            array (
                'id' => 1029,
                'following_id' => 65,
                'follower_id' => 8,
                'created_at' => '2017-09-07 04:04:53',
                'updated_at' => '2017-09-07 04:04:53',
            ),
            12 => 
            array (
                'id' => 1030,
                'following_id' => 161,
                'follower_id' => 47,
                'created_at' => '2017-09-13 06:23:37',
                'updated_at' => '2017-09-13 06:23:37',
            ),
            13 => 
            array (
                'id' => 1031,
                'following_id' => 191,
                'follower_id' => 190,
                'created_at' => '2017-09-03 18:51:21',
                'updated_at' => '2017-09-03 18:51:21',
            ),
            14 => 
            array (
                'id' => 1032,
                'following_id' => 148,
                'follower_id' => 15,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            15 => 
            array (
                'id' => 1033,
                'following_id' => 148,
                'follower_id' => 140,
                'created_at' => '2017-09-21 17:27:33',
                'updated_at' => '2017-09-21 17:27:33',
            ),
            16 => 
            array (
                'id' => 1034,
                'following_id' => 155,
                'follower_id' => 80,
                'created_at' => '2017-08-27 00:44:37',
                'updated_at' => '2017-08-27 00:44:37',
            ),
            17 => 
            array (
                'id' => 1035,
                'following_id' => 139,
                'follower_id' => 78,
                'created_at' => '2017-09-14 08:59:29',
                'updated_at' => '2017-09-14 08:59:29',
            ),
            18 => 
            array (
                'id' => 1036,
                'following_id' => 110,
                'follower_id' => 45,
                'created_at' => '2017-09-08 06:51:22',
                'updated_at' => '2017-09-08 06:51:22',
            ),
            19 => 
            array (
                'id' => 1037,
                'following_id' => 53,
                'follower_id' => 8,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            20 => 
            array (
                'id' => 1038,
                'following_id' => 69,
                'follower_id' => 136,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            21 => 
            array (
                'id' => 1039,
                'following_id' => 149,
                'follower_id' => 130,
                'created_at' => '2017-09-23 07:11:26',
                'updated_at' => '2017-09-23 07:11:26',
            ),
            22 => 
            array (
                'id' => 1040,
                'following_id' => 191,
                'follower_id' => 104,
                'created_at' => '2017-09-04 01:31:36',
                'updated_at' => '2017-09-04 01:31:36',
            ),
            23 => 
            array (
                'id' => 1041,
                'following_id' => 145,
                'follower_id' => 103,
                'created_at' => '2017-09-16 22:35:34',
                'updated_at' => '2017-09-16 22:35:34',
            ),
            24 => 
            array (
                'id' => 1042,
                'following_id' => 15,
                'follower_id' => 32,
                'created_at' => '2017-08-25 08:18:29',
                'updated_at' => '2017-08-25 08:18:29',
            ),
            25 => 
            array (
                'id' => 1043,
                'following_id' => 160,
                'follower_id' => 13,
                'created_at' => '2017-09-14 23:09:52',
                'updated_at' => '2017-09-14 23:09:52',
            ),
            26 => 
            array (
                'id' => 1044,
                'following_id' => 174,
                'follower_id' => 32,
                'created_at' => '2017-09-09 12:52:22',
                'updated_at' => '2017-09-09 12:52:22',
            ),
            27 => 
            array (
                'id' => 1045,
                'following_id' => 194,
                'follower_id' => 82,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            28 => 
            array (
                'id' => 1046,
                'following_id' => 178,
                'follower_id' => 164,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            29 => 
            array (
                'id' => 1047,
                'following_id' => 115,
                'follower_id' => 85,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            30 => 
            array (
                'id' => 1048,
                'following_id' => 9,
                'follower_id' => 61,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            31 => 
            array (
                'id' => 1049,
                'following_id' => 110,
                'follower_id' => 5,
                'created_at' => '2017-09-20 06:53:48',
                'updated_at' => '2017-09-20 06:53:48',
            ),
            32 => 
            array (
                'id' => 1050,
                'following_id' => 182,
                'follower_id' => 173,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            33 => 
            array (
                'id' => 1051,
                'following_id' => 65,
                'follower_id' => 121,
                'created_at' => '2017-09-14 13:01:26',
                'updated_at' => '2017-09-14 13:01:26',
            ),
            34 => 
            array (
                'id' => 1052,
                'following_id' => 189,
                'follower_id' => 43,
                'created_at' => '2017-09-02 11:19:43',
                'updated_at' => '2017-09-02 11:19:43',
            ),
            35 => 
            array (
                'id' => 1053,
                'following_id' => 187,
                'follower_id' => 96,
                'created_at' => '2017-09-08 05:31:23',
                'updated_at' => '2017-09-08 05:31:23',
            ),
            36 => 
            array (
                'id' => 1054,
                'following_id' => 70,
                'follower_id' => 139,
                'created_at' => '2017-09-10 10:45:34',
                'updated_at' => '2017-09-10 10:45:34',
            ),
            37 => 
            array (
                'id' => 1055,
                'following_id' => 33,
                'follower_id' => 81,
                'created_at' => '2017-09-15 09:18:36',
                'updated_at' => '2017-09-15 09:18:36',
            ),
            38 => 
            array (
                'id' => 1056,
                'following_id' => 128,
                'follower_id' => 92,
                'created_at' => '2017-09-15 00:30:43',
                'updated_at' => '2017-09-15 00:30:43',
            ),
            39 => 
            array (
                'id' => 1057,
                'following_id' => 121,
                'follower_id' => 125,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            40 => 
            array (
                'id' => 1058,
                'following_id' => 155,
                'follower_id' => 167,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            41 => 
            array (
                'id' => 1059,
                'following_id' => 32,
                'follower_id' => 116,
                'created_at' => '2017-09-06 19:06:47',
                'updated_at' => '2017-09-06 19:06:47',
            ),
            42 => 
            array (
                'id' => 1060,
                'following_id' => 70,
                'follower_id' => 185,
                'created_at' => '2017-09-02 22:52:28',
                'updated_at' => '2017-09-02 22:52:28',
            ),
            43 => 
            array (
                'id' => 1061,
                'following_id' => 127,
                'follower_id' => 14,
                'created_at' => '2017-08-27 15:46:50',
                'updated_at' => '2017-08-27 15:46:50',
            ),
            44 => 
            array (
                'id' => 1062,
                'following_id' => 22,
                'follower_id' => 38,
                'created_at' => '2017-09-12 06:10:38',
                'updated_at' => '2017-09-12 06:10:38',
            ),
            45 => 
            array (
                'id' => 1063,
                'following_id' => 134,
                'follower_id' => 158,
                'created_at' => '2017-09-07 11:15:47',
                'updated_at' => '2017-09-07 11:15:47',
            ),
            46 => 
            array (
                'id' => 1064,
                'following_id' => 83,
                'follower_id' => 22,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            47 => 
            array (
                'id' => 1065,
                'following_id' => 7,
                'follower_id' => 6,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            48 => 
            array (
                'id' => 1066,
                'following_id' => 120,
                'follower_id' => 188,
                'created_at' => '2017-09-09 03:53:30',
                'updated_at' => '2017-09-09 03:53:30',
            ),
            49 => 
            array (
                'id' => 1067,
                'following_id' => 65,
                'follower_id' => 13,
                'created_at' => '2017-09-09 14:02:28',
                'updated_at' => '2017-09-09 14:02:28',
            ),
            50 => 
            array (
                'id' => 1068,
                'following_id' => 35,
                'follower_id' => 77,
                'created_at' => '2017-09-12 19:45:54',
                'updated_at' => '2017-09-12 19:45:54',
            ),
            51 => 
            array (
                'id' => 1069,
                'following_id' => 160,
                'follower_id' => 166,
                'created_at' => '2017-09-07 05:40:29',
                'updated_at' => '2017-09-07 05:40:29',
            ),
            52 => 
            array (
                'id' => 1070,
                'following_id' => 159,
                'follower_id' => 63,
                'created_at' => '2017-09-09 14:09:32',
                'updated_at' => '2017-09-09 14:09:32',
            ),
            53 => 
            array (
                'id' => 1071,
                'following_id' => 114,
                'follower_id' => 20,
                'created_at' => '2017-09-07 04:04:54',
                'updated_at' => '2017-09-07 04:04:54',
            ),
            54 => 
            array (
                'id' => 1072,
                'following_id' => 24,
                'follower_id' => 1,
                'created_at' => '2017-09-13 06:23:38',
                'updated_at' => '2017-09-13 06:23:38',
            ),
            55 => 
            array (
                'id' => 1073,
                'following_id' => 30,
                'follower_id' => 12,
                'created_at' => '2017-09-03 18:51:22',
                'updated_at' => '2017-09-03 18:51:22',
            ),
            56 => 
            array (
                'id' => 1074,
                'following_id' => 138,
                'follower_id' => 40,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            57 => 
            array (
                'id' => 1075,
                'following_id' => 163,
                'follower_id' => 89,
                'created_at' => '2017-09-21 17:27:34',
                'updated_at' => '2017-09-21 17:27:34',
            ),
            58 => 
            array (
                'id' => 1076,
                'following_id' => 50,
                'follower_id' => 115,
                'created_at' => '2017-08-27 00:44:38',
                'updated_at' => '2017-08-27 00:44:38',
            ),
            59 => 
            array (
                'id' => 1077,
                'following_id' => 48,
                'follower_id' => 148,
                'created_at' => '2017-09-14 08:59:30',
                'updated_at' => '2017-09-14 08:59:30',
            ),
            60 => 
            array (
                'id' => 1078,
                'following_id' => 159,
                'follower_id' => 132,
                'created_at' => '2017-09-08 06:51:23',
                'updated_at' => '2017-09-08 06:51:23',
            ),
            61 => 
            array (
                'id' => 1079,
                'following_id' => 119,
                'follower_id' => 16,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            62 => 
            array (
                'id' => 1080,
                'following_id' => 139,
                'follower_id' => 187,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            63 => 
            array (
                'id' => 1081,
                'following_id' => 141,
                'follower_id' => 75,
                'created_at' => '2017-09-23 07:11:27',
                'updated_at' => '2017-09-23 07:11:27',
            ),
            64 => 
            array (
                'id' => 1082,
                'following_id' => 124,
                'follower_id' => 66,
                'created_at' => '2017-09-04 01:31:37',
                'updated_at' => '2017-09-04 01:31:37',
            ),
            65 => 
            array (
                'id' => 1083,
                'following_id' => 36,
                'follower_id' => 185,
                'created_at' => '2017-09-16 22:35:35',
                'updated_at' => '2017-09-16 22:35:35',
            ),
            66 => 
            array (
                'id' => 1084,
                'following_id' => 156,
                'follower_id' => 61,
                'created_at' => '2017-08-25 08:18:30',
                'updated_at' => '2017-08-25 08:18:30',
            ),
            67 => 
            array (
                'id' => 1085,
                'following_id' => 68,
                'follower_id' => 128,
                'created_at' => '2017-09-14 23:09:53',
                'updated_at' => '2017-09-14 23:09:53',
            ),
            68 => 
            array (
                'id' => 1086,
                'following_id' => 79,
                'follower_id' => 63,
                'created_at' => '2017-09-09 12:52:23',
                'updated_at' => '2017-09-09 12:52:23',
            ),
            69 => 
            array (
                'id' => 1087,
                'following_id' => 148,
                'follower_id' => 24,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            70 => 
            array (
                'id' => 1088,
                'following_id' => 27,
                'follower_id' => 158,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            71 => 
            array (
                'id' => 1089,
                'following_id' => 20,
                'follower_id' => 69,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            72 => 
            array (
                'id' => 1090,
                'following_id' => 51,
                'follower_id' => 109,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            73 => 
            array (
                'id' => 1091,
                'following_id' => 77,
                'follower_id' => 181,
                'created_at' => '2017-09-20 06:53:49',
                'updated_at' => '2017-09-20 06:53:49',
            ),
            74 => 
            array (
                'id' => 1093,
                'following_id' => 2,
                'follower_id' => 29,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            75 => 
            array (
                'id' => 1094,
                'following_id' => 145,
                'follower_id' => 42,
                'created_at' => '2017-09-14 13:01:27',
                'updated_at' => '2017-09-14 13:01:27',
            ),
            76 => 
            array (
                'id' => 1095,
                'following_id' => 66,
                'follower_id' => 110,
                'created_at' => '2017-09-02 11:19:44',
                'updated_at' => '2017-09-02 11:19:44',
            ),
            77 => 
            array (
                'id' => 1096,
                'following_id' => 192,
                'follower_id' => 81,
                'created_at' => '2017-09-08 05:31:24',
                'updated_at' => '2017-09-08 05:31:24',
            ),
            78 => 
            array (
                'id' => 1097,
                'following_id' => 149,
                'follower_id' => 45,
                'created_at' => '2017-09-10 10:45:35',
                'updated_at' => '2017-09-10 10:45:35',
            ),
            79 => 
            array (
                'id' => 1098,
                'following_id' => 180,
                'follower_id' => 60,
                'created_at' => '2017-09-15 09:18:37',
                'updated_at' => '2017-09-15 09:18:37',
            ),
            80 => 
            array (
                'id' => 1099,
                'following_id' => 36,
                'follower_id' => 115,
                'created_at' => '2017-09-15 00:30:44',
                'updated_at' => '2017-09-15 00:30:44',
            ),
            81 => 
            array (
                'id' => 1100,
                'following_id' => 30,
                'follower_id' => 84,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            82 => 
            array (
                'id' => 1101,
                'following_id' => 111,
                'follower_id' => 187,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            83 => 
            array (
                'id' => 1102,
                'following_id' => 129,
                'follower_id' => 127,
                'created_at' => '2017-09-06 19:06:48',
                'updated_at' => '2017-09-06 19:06:48',
            ),
            84 => 
            array (
                'id' => 1103,
                'following_id' => 117,
                'follower_id' => 90,
                'created_at' => '2017-09-02 22:52:29',
                'updated_at' => '2017-09-02 22:52:29',
            ),
            85 => 
            array (
                'id' => 1104,
                'following_id' => 159,
                'follower_id' => 34,
                'created_at' => '2017-08-27 15:46:51',
                'updated_at' => '2017-08-27 15:46:51',
            ),
            86 => 
            array (
                'id' => 1105,
                'following_id' => 44,
                'follower_id' => 21,
                'created_at' => '2017-09-12 06:10:39',
                'updated_at' => '2017-09-12 06:10:39',
            ),
            87 => 
            array (
                'id' => 1106,
                'following_id' => 129,
                'follower_id' => 158,
                'created_at' => '2017-09-07 11:15:48',
                'updated_at' => '2017-09-07 11:15:48',
            ),
            88 => 
            array (
                'id' => 1107,
                'following_id' => 158,
                'follower_id' => 113,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            89 => 
            array (
                'id' => 1108,
                'following_id' => 150,
                'follower_id' => 40,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            90 => 
            array (
                'id' => 1110,
                'following_id' => 139,
                'follower_id' => 4,
                'created_at' => '2017-09-09 03:53:31',
                'updated_at' => '2017-09-09 03:53:31',
            ),
            91 => 
            array (
                'id' => 1111,
                'following_id' => 192,
                'follower_id' => 39,
                'created_at' => '2017-09-09 14:02:29',
                'updated_at' => '2017-09-09 14:02:29',
            ),
            92 => 
            array (
                'id' => 1112,
                'following_id' => 107,
                'follower_id' => 115,
                'created_at' => '2017-09-12 19:45:55',
                'updated_at' => '2017-09-12 19:45:55',
            ),
            93 => 
            array (
                'id' => 1113,
                'following_id' => 74,
                'follower_id' => 88,
                'created_at' => '2017-09-07 05:40:30',
                'updated_at' => '2017-09-07 05:40:30',
            ),
            94 => 
            array (
                'id' => 1114,
                'following_id' => 61,
                'follower_id' => 150,
                'created_at' => '2017-09-09 14:09:33',
                'updated_at' => '2017-09-09 14:09:33',
            ),
            95 => 
            array (
                'id' => 1115,
                'following_id' => 69,
                'follower_id' => 1,
                'created_at' => '2017-09-07 04:04:55',
                'updated_at' => '2017-09-07 04:04:55',
            ),
            96 => 
            array (
                'id' => 1116,
                'following_id' => 193,
                'follower_id' => 70,
                'created_at' => '2017-09-13 06:23:39',
                'updated_at' => '2017-09-13 06:23:39',
            ),
            97 => 
            array (
                'id' => 1117,
                'following_id' => 107,
                'follower_id' => 38,
                'created_at' => '2017-09-03 18:51:23',
                'updated_at' => '2017-09-03 18:51:23',
            ),
            98 => 
            array (
                'id' => 1118,
                'following_id' => 156,
                'follower_id' => 155,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            99 => 
            array (
                'id' => 1119,
                'following_id' => 22,
                'follower_id' => 115,
                'created_at' => '2017-09-21 17:27:35',
                'updated_at' => '2017-09-21 17:27:35',
            ),
            100 => 
            array (
                'id' => 1120,
                'following_id' => 55,
                'follower_id' => 109,
                'created_at' => '2017-08-27 00:44:39',
                'updated_at' => '2017-08-27 00:44:39',
            ),
            101 => 
            array (
                'id' => 1121,
                'following_id' => 110,
                'follower_id' => 113,
                'created_at' => '2017-09-14 08:59:31',
                'updated_at' => '2017-09-14 08:59:31',
            ),
            102 => 
            array (
                'id' => 1122,
                'following_id' => 49,
                'follower_id' => 27,
                'created_at' => '2017-09-08 06:51:24',
                'updated_at' => '2017-09-08 06:51:24',
            ),
            103 => 
            array (
                'id' => 1123,
                'following_id' => 30,
                'follower_id' => 54,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            104 => 
            array (
                'id' => 1124,
                'following_id' => 100,
                'follower_id' => 59,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            105 => 
            array (
                'id' => 1125,
                'following_id' => 29,
                'follower_id' => 11,
                'created_at' => '2017-09-23 07:11:28',
                'updated_at' => '2017-09-23 07:11:28',
            ),
            106 => 
            array (
                'id' => 1126,
                'following_id' => 7,
                'follower_id' => 195,
                'created_at' => '2017-09-04 01:31:38',
                'updated_at' => '2017-09-04 01:31:38',
            ),
            107 => 
            array (
                'id' => 1127,
                'following_id' => 44,
                'follower_id' => 153,
                'created_at' => '2017-09-16 22:35:36',
                'updated_at' => '2017-09-16 22:35:36',
            ),
            108 => 
            array (
                'id' => 1128,
                'following_id' => 3,
                'follower_id' => 15,
                'created_at' => '2017-08-25 08:18:31',
                'updated_at' => '2017-08-25 08:18:31',
            ),
            109 => 
            array (
                'id' => 1129,
                'following_id' => 139,
                'follower_id' => 91,
                'created_at' => '2017-09-14 23:09:54',
                'updated_at' => '2017-09-14 23:09:54',
            ),
            110 => 
            array (
                'id' => 1130,
                'following_id' => 174,
                'follower_id' => 97,
                'created_at' => '2017-09-09 12:52:24',
                'updated_at' => '2017-09-09 12:52:24',
            ),
            111 => 
            array (
                'id' => 1131,
                'following_id' => 56,
                'follower_id' => 96,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            112 => 
            array (
                'id' => 1132,
                'following_id' => 29,
                'follower_id' => 6,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            113 => 
            array (
                'id' => 1133,
                'following_id' => 18,
                'follower_id' => 44,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            114 => 
            array (
                'id' => 1134,
                'following_id' => 145,
                'follower_id' => 18,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            115 => 
            array (
                'id' => 1135,
                'following_id' => 169,
                'follower_id' => 168,
                'created_at' => '2017-09-20 06:53:50',
                'updated_at' => '2017-09-20 06:53:50',
            ),
            116 => 
            array (
                'id' => 1136,
                'following_id' => 84,
                'follower_id' => 159,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            117 => 
            array (
                'id' => 1137,
                'following_id' => 112,
                'follower_id' => 9,
                'created_at' => '2017-09-14 13:01:28',
                'updated_at' => '2017-09-14 13:01:28',
            ),
            118 => 
            array (
                'id' => 1138,
                'following_id' => 33,
                'follower_id' => 40,
                'created_at' => '2017-09-02 11:19:45',
                'updated_at' => '2017-09-02 11:19:45',
            ),
            119 => 
            array (
                'id' => 1139,
                'following_id' => 52,
                'follower_id' => 26,
                'created_at' => '2017-09-08 05:31:25',
                'updated_at' => '2017-09-08 05:31:25',
            ),
            120 => 
            array (
                'id' => 1140,
                'following_id' => 11,
                'follower_id' => 95,
                'created_at' => '2017-09-10 10:45:36',
                'updated_at' => '2017-09-10 10:45:36',
            ),
            121 => 
            array (
                'id' => 1141,
                'following_id' => 94,
                'follower_id' => 96,
                'created_at' => '2017-09-15 09:18:38',
                'updated_at' => '2017-09-15 09:18:38',
            ),
            122 => 
            array (
                'id' => 1142,
                'following_id' => 108,
                'follower_id' => 142,
                'created_at' => '2017-09-15 00:30:45',
                'updated_at' => '2017-09-15 00:30:45',
            ),
            123 => 
            array (
                'id' => 1143,
                'following_id' => 38,
                'follower_id' => 142,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            124 => 
            array (
                'id' => 1144,
                'following_id' => 159,
                'follower_id' => 88,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            125 => 
            array (
                'id' => 1145,
                'following_id' => 22,
                'follower_id' => 37,
                'created_at' => '2017-09-06 19:06:49',
                'updated_at' => '2017-09-06 19:06:49',
            ),
            126 => 
            array (
                'id' => 1146,
                'following_id' => 173,
                'follower_id' => 195,
                'created_at' => '2017-09-02 22:52:30',
                'updated_at' => '2017-09-02 22:52:30',
            ),
            127 => 
            array (
                'id' => 1147,
                'following_id' => 117,
                'follower_id' => 111,
                'created_at' => '2017-08-27 15:46:52',
                'updated_at' => '2017-08-27 15:46:52',
            ),
            128 => 
            array (
                'id' => 1148,
                'following_id' => 48,
                'follower_id' => 10,
                'created_at' => '2017-09-12 06:10:40',
                'updated_at' => '2017-09-12 06:10:40',
            ),
            129 => 
            array (
                'id' => 1149,
                'following_id' => 128,
                'follower_id' => 47,
                'created_at' => '2017-09-07 11:15:49',
                'updated_at' => '2017-09-07 11:15:49',
            ),
            130 => 
            array (
                'id' => 1150,
                'following_id' => 25,
                'follower_id' => 65,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            131 => 
            array (
                'id' => 1151,
                'following_id' => 172,
                'follower_id' => 4,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            132 => 
            array (
                'id' => 1152,
                'following_id' => 23,
                'follower_id' => 35,
                'created_at' => '2017-09-09 03:53:32',
                'updated_at' => '2017-09-09 03:53:32',
            ),
            133 => 
            array (
                'id' => 1153,
                'following_id' => 66,
                'follower_id' => 62,
                'created_at' => '2017-09-09 14:02:30',
                'updated_at' => '2017-09-09 14:02:30',
            ),
            134 => 
            array (
                'id' => 1154,
                'following_id' => 157,
                'follower_id' => 152,
                'created_at' => '2017-09-12 19:45:56',
                'updated_at' => '2017-09-12 19:45:56',
            ),
            135 => 
            array (
                'id' => 1155,
                'following_id' => 24,
                'follower_id' => 71,
                'created_at' => '2017-09-07 05:40:31',
                'updated_at' => '2017-09-07 05:40:31',
            ),
            136 => 
            array (
                'id' => 1156,
                'following_id' => 187,
                'follower_id' => 133,
                'created_at' => '2017-09-09 14:09:34',
                'updated_at' => '2017-09-09 14:09:34',
            ),
            137 => 
            array (
                'id' => 1157,
                'following_id' => 126,
                'follower_id' => 108,
                'created_at' => '2017-09-07 04:04:56',
                'updated_at' => '2017-09-07 04:04:56',
            ),
            138 => 
            array (
                'id' => 1158,
                'following_id' => 69,
                'follower_id' => 26,
                'created_at' => '2017-09-13 06:23:40',
                'updated_at' => '2017-09-13 06:23:40',
            ),
            139 => 
            array (
                'id' => 1159,
                'following_id' => 190,
                'follower_id' => 97,
                'created_at' => '2017-09-03 18:51:24',
                'updated_at' => '2017-09-03 18:51:24',
            ),
            140 => 
            array (
                'id' => 1160,
                'following_id' => 70,
                'follower_id' => 190,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            141 => 
            array (
                'id' => 1161,
                'following_id' => 180,
                'follower_id' => 26,
                'created_at' => '2017-09-21 17:27:36',
                'updated_at' => '2017-09-21 17:27:36',
            ),
            142 => 
            array (
                'id' => 1162,
                'following_id' => 95,
                'follower_id' => 175,
                'created_at' => '2017-08-27 00:44:40',
                'updated_at' => '2017-08-27 00:44:40',
            ),
            143 => 
            array (
                'id' => 1163,
                'following_id' => 38,
                'follower_id' => 81,
                'created_at' => '2017-09-14 08:59:32',
                'updated_at' => '2017-09-14 08:59:32',
            ),
            144 => 
            array (
                'id' => 1164,
                'following_id' => 10,
                'follower_id' => 41,
                'created_at' => '2017-09-08 06:51:25',
                'updated_at' => '2017-09-08 06:51:25',
            ),
            145 => 
            array (
                'id' => 1165,
                'following_id' => 146,
                'follower_id' => 1,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            146 => 
            array (
                'id' => 1166,
                'following_id' => 167,
                'follower_id' => 54,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            147 => 
            array (
                'id' => 1167,
                'following_id' => 10,
                'follower_id' => 105,
                'created_at' => '2017-09-23 07:11:29',
                'updated_at' => '2017-09-23 07:11:29',
            ),
            148 => 
            array (
                'id' => 1168,
                'following_id' => 122,
                'follower_id' => 190,
                'created_at' => '2017-09-04 01:31:39',
                'updated_at' => '2017-09-04 01:31:39',
            ),
            149 => 
            array (
                'id' => 1169,
                'following_id' => 79,
                'follower_id' => 104,
                'created_at' => '2017-09-16 22:35:37',
                'updated_at' => '2017-09-16 22:35:37',
            ),
            150 => 
            array (
                'id' => 1170,
                'following_id' => 37,
                'follower_id' => 82,
                'created_at' => '2017-08-25 08:18:32',
                'updated_at' => '2017-08-25 08:18:32',
            ),
            151 => 
            array (
                'id' => 1171,
                'following_id' => 119,
                'follower_id' => 7,
                'created_at' => '2017-09-14 23:09:55',
                'updated_at' => '2017-09-14 23:09:55',
            ),
            152 => 
            array (
                'id' => 1172,
                'following_id' => 42,
                'follower_id' => 153,
                'created_at' => '2017-09-09 12:52:25',
                'updated_at' => '2017-09-09 12:52:25',
            ),
            153 => 
            array (
                'id' => 1173,
                'following_id' => 116,
                'follower_id' => 141,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            154 => 
            array (
                'id' => 1174,
                'following_id' => 195,
                'follower_id' => 73,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            155 => 
            array (
                'id' => 1175,
                'following_id' => 143,
                'follower_id' => 80,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            156 => 
            array (
                'id' => 1177,
                'following_id' => 174,
                'follower_id' => 132,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            157 => 
            array (
                'id' => 1178,
                'following_id' => 55,
                'follower_id' => 50,
                'created_at' => '2017-09-20 06:53:51',
                'updated_at' => '2017-09-20 06:53:51',
            ),
            158 => 
            array (
                'id' => 1179,
                'following_id' => 63,
                'follower_id' => 141,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            159 => 
            array (
                'id' => 1180,
                'following_id' => 66,
                'follower_id' => 104,
                'created_at' => '2017-09-14 13:01:29',
                'updated_at' => '2017-09-14 13:01:29',
            ),
            160 => 
            array (
                'id' => 1181,
                'following_id' => 143,
                'follower_id' => 107,
                'created_at' => '2017-09-02 11:19:46',
                'updated_at' => '2017-09-02 11:19:46',
            ),
            161 => 
            array (
                'id' => 1182,
                'following_id' => 63,
                'follower_id' => 5,
                'created_at' => '2017-09-08 05:31:26',
                'updated_at' => '2017-09-08 05:31:26',
            ),
            162 => 
            array (
                'id' => 1183,
                'following_id' => 61,
                'follower_id' => 24,
                'created_at' => '2017-09-10 10:45:37',
                'updated_at' => '2017-09-10 10:45:37',
            ),
            163 => 
            array (
                'id' => 1185,
                'following_id' => 22,
                'follower_id' => 162,
                'created_at' => '2017-09-15 09:18:39',
                'updated_at' => '2017-09-15 09:18:39',
            ),
            164 => 
            array (
                'id' => 1186,
                'following_id' => 109,
                'follower_id' => 26,
                'created_at' => '2017-09-15 00:30:46',
                'updated_at' => '2017-09-15 00:30:46',
            ),
            165 => 
            array (
                'id' => 1187,
                'following_id' => 170,
                'follower_id' => 8,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            166 => 
            array (
                'id' => 1188,
                'following_id' => 174,
                'follower_id' => 49,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            167 => 
            array (
                'id' => 1189,
                'following_id' => 97,
                'follower_id' => 133,
                'created_at' => '2017-09-06 19:06:50',
                'updated_at' => '2017-09-06 19:06:50',
            ),
            168 => 
            array (
                'id' => 1190,
                'following_id' => 161,
                'follower_id' => 22,
                'created_at' => '2017-09-02 22:52:31',
                'updated_at' => '2017-09-02 22:52:31',
            ),
            169 => 
            array (
                'id' => 1191,
                'following_id' => 85,
                'follower_id' => 183,
                'created_at' => '2017-08-27 15:46:53',
                'updated_at' => '2017-08-27 15:46:53',
            ),
            170 => 
            array (
                'id' => 1192,
                'following_id' => 60,
                'follower_id' => 195,
                'created_at' => '2017-09-12 06:10:41',
                'updated_at' => '2017-09-12 06:10:41',
            ),
            171 => 
            array (
                'id' => 1193,
                'following_id' => 113,
                'follower_id' => 189,
                'created_at' => '2017-09-07 11:15:50',
                'updated_at' => '2017-09-07 11:15:50',
            ),
            172 => 
            array (
                'id' => 1194,
                'following_id' => 130,
                'follower_id' => 157,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            173 => 
            array (
                'id' => 1195,
                'following_id' => 47,
                'follower_id' => 31,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            174 => 
            array (
                'id' => 1196,
                'following_id' => 91,
                'follower_id' => 67,
                'created_at' => '2017-09-09 03:53:33',
                'updated_at' => '2017-09-09 03:53:33',
            ),
            175 => 
            array (
                'id' => 1197,
                'following_id' => 81,
                'follower_id' => 43,
                'created_at' => '2017-09-09 14:02:31',
                'updated_at' => '2017-09-09 14:02:31',
            ),
            176 => 
            array (
                'id' => 1198,
                'following_id' => 82,
                'follower_id' => 110,
                'created_at' => '2017-09-12 19:45:57',
                'updated_at' => '2017-09-12 19:45:57',
            ),
            177 => 
            array (
                'id' => 1199,
                'following_id' => 21,
                'follower_id' => 70,
                'created_at' => '2017-09-07 05:40:32',
                'updated_at' => '2017-09-07 05:40:32',
            ),
            178 => 
            array (
                'id' => 1200,
                'following_id' => 107,
                'follower_id' => 92,
                'created_at' => '2017-09-09 14:09:35',
                'updated_at' => '2017-09-09 14:09:35',
            ),
            179 => 
            array (
                'id' => 1201,
                'following_id' => 156,
                'follower_id' => 75,
                'created_at' => '2017-09-07 04:04:57',
                'updated_at' => '2017-09-07 04:04:57',
            ),
            180 => 
            array (
                'id' => 1202,
                'following_id' => 53,
                'follower_id' => 147,
                'created_at' => '2017-09-13 06:23:41',
                'updated_at' => '2017-09-13 06:23:41',
            ),
            181 => 
            array (
                'id' => 1203,
                'following_id' => 165,
                'follower_id' => 146,
                'created_at' => '2017-09-03 18:51:25',
                'updated_at' => '2017-09-03 18:51:25',
            ),
            182 => 
            array (
                'id' => 1204,
                'following_id' => 81,
                'follower_id' => 184,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            183 => 
            array (
                'id' => 1205,
                'following_id' => 193,
                'follower_id' => 187,
                'created_at' => '2017-09-21 17:27:37',
                'updated_at' => '2017-09-21 17:27:37',
            ),
            184 => 
            array (
                'id' => 1206,
                'following_id' => 152,
                'follower_id' => 128,
                'created_at' => '2017-08-27 00:44:41',
                'updated_at' => '2017-08-27 00:44:41',
            ),
            185 => 
            array (
                'id' => 1207,
                'following_id' => 174,
                'follower_id' => 143,
                'created_at' => '2017-09-14 08:59:33',
                'updated_at' => '2017-09-14 08:59:33',
            ),
            186 => 
            array (
                'id' => 1208,
                'following_id' => 123,
                'follower_id' => 43,
                'created_at' => '2017-09-08 06:51:26',
                'updated_at' => '2017-09-08 06:51:26',
            ),
            187 => 
            array (
                'id' => 1209,
                'following_id' => 131,
                'follower_id' => 127,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            188 => 
            array (
                'id' => 1210,
                'following_id' => 6,
                'follower_id' => 70,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            189 => 
            array (
                'id' => 1211,
                'following_id' => 74,
                'follower_id' => 56,
                'created_at' => '2017-09-23 07:11:30',
                'updated_at' => '2017-09-23 07:11:30',
            ),
            190 => 
            array (
                'id' => 1212,
                'following_id' => 123,
                'follower_id' => 73,
                'created_at' => '2017-09-04 01:31:40',
                'updated_at' => '2017-09-04 01:31:40',
            ),
            191 => 
            array (
                'id' => 1213,
                'following_id' => 144,
                'follower_id' => 70,
                'created_at' => '2017-09-16 22:35:38',
                'updated_at' => '2017-09-16 22:35:38',
            ),
            192 => 
            array (
                'id' => 1214,
                'following_id' => 32,
                'follower_id' => 164,
                'created_at' => '2017-08-25 08:18:33',
                'updated_at' => '2017-08-25 08:18:33',
            ),
            193 => 
            array (
                'id' => 1215,
                'following_id' => 48,
                'follower_id' => 16,
                'created_at' => '2017-09-14 23:09:56',
                'updated_at' => '2017-09-14 23:09:56',
            ),
            194 => 
            array (
                'id' => 1216,
                'following_id' => 152,
                'follower_id' => 48,
                'created_at' => '2017-09-09 12:52:26',
                'updated_at' => '2017-09-09 12:52:26',
            ),
            195 => 
            array (
                'id' => 1217,
                'following_id' => 126,
                'follower_id' => 12,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            196 => 
            array (
                'id' => 1218,
                'following_id' => 8,
                'follower_id' => 26,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            197 => 
            array (
                'id' => 1219,
                'following_id' => 171,
                'follower_id' => 93,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            198 => 
            array (
                'id' => 1220,
                'following_id' => 27,
                'follower_id' => 55,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            199 => 
            array (
                'id' => 1221,
                'following_id' => 34,
                'follower_id' => 34,
                'created_at' => '2017-09-20 06:53:52',
                'updated_at' => '2017-09-20 06:53:52',
            ),
            200 => 
            array (
                'id' => 1222,
                'following_id' => 111,
                'follower_id' => 73,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            201 => 
            array (
                'id' => 1223,
                'following_id' => 116,
                'follower_id' => 142,
                'created_at' => '2017-09-14 13:01:30',
                'updated_at' => '2017-09-14 13:01:30',
            ),
            202 => 
            array (
                'id' => 1224,
                'following_id' => 6,
                'follower_id' => 169,
                'created_at' => '2017-09-02 11:19:47',
                'updated_at' => '2017-09-02 11:19:47',
            ),
            203 => 
            array (
                'id' => 1225,
                'following_id' => 66,
                'follower_id' => 123,
                'created_at' => '2017-09-08 05:31:27',
                'updated_at' => '2017-09-08 05:31:27',
            ),
            204 => 
            array (
                'id' => 1226,
                'following_id' => 132,
                'follower_id' => 48,
                'created_at' => '2017-09-10 10:45:38',
                'updated_at' => '2017-09-10 10:45:38',
            ),
            205 => 
            array (
                'id' => 1227,
                'following_id' => 122,
                'follower_id' => 79,
                'created_at' => '2017-09-15 09:18:40',
                'updated_at' => '2017-09-15 09:18:40',
            ),
            206 => 
            array (
                'id' => 1228,
                'following_id' => 143,
                'follower_id' => 186,
                'created_at' => '2017-09-15 00:30:47',
                'updated_at' => '2017-09-15 00:30:47',
            ),
            207 => 
            array (
                'id' => 1229,
                'following_id' => 110,
                'follower_id' => 138,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            208 => 
            array (
                'id' => 1230,
                'following_id' => 144,
                'follower_id' => 115,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            209 => 
            array (
                'id' => 1231,
                'following_id' => 156,
                'follower_id' => 127,
                'created_at' => '2017-09-06 19:06:51',
                'updated_at' => '2017-09-06 19:06:51',
            ),
            210 => 
            array (
                'id' => 1232,
                'following_id' => 194,
                'follower_id' => 190,
                'created_at' => '2017-09-02 22:52:32',
                'updated_at' => '2017-09-02 22:52:32',
            ),
            211 => 
            array (
                'id' => 1233,
                'following_id' => 165,
                'follower_id' => 162,
                'created_at' => '2017-08-27 15:46:54',
                'updated_at' => '2017-08-27 15:46:54',
            ),
            212 => 
            array (
                'id' => 1234,
                'following_id' => 194,
                'follower_id' => 152,
                'created_at' => '2017-09-12 06:10:42',
                'updated_at' => '2017-09-12 06:10:42',
            ),
            213 => 
            array (
                'id' => 1235,
                'following_id' => 177,
                'follower_id' => 24,
                'created_at' => '2017-09-07 11:15:51',
                'updated_at' => '2017-09-07 11:15:51',
            ),
            214 => 
            array (
                'id' => 1236,
                'following_id' => 141,
                'follower_id' => 89,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            215 => 
            array (
                'id' => 1237,
                'following_id' => 80,
                'follower_id' => 63,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            216 => 
            array (
                'id' => 1238,
                'following_id' => 151,
                'follower_id' => 36,
                'created_at' => '2017-09-09 03:53:34',
                'updated_at' => '2017-09-09 03:53:34',
            ),
            217 => 
            array (
                'id' => 1239,
                'following_id' => 145,
                'follower_id' => 41,
                'created_at' => '2017-09-09 14:02:32',
                'updated_at' => '2017-09-09 14:02:32',
            ),
            218 => 
            array (
                'id' => 1240,
                'following_id' => 9,
                'follower_id' => 44,
                'created_at' => '2017-09-12 19:45:58',
                'updated_at' => '2017-09-12 19:45:58',
            ),
            219 => 
            array (
                'id' => 1241,
                'following_id' => 159,
                'follower_id' => 141,
                'created_at' => '2017-09-07 05:40:33',
                'updated_at' => '2017-09-07 05:40:33',
            ),
            220 => 
            array (
                'id' => 1242,
                'following_id' => 151,
                'follower_id' => 63,
                'created_at' => '2017-09-09 14:09:36',
                'updated_at' => '2017-09-09 14:09:36',
            ),
            221 => 
            array (
                'id' => 1243,
                'following_id' => 116,
                'follower_id' => 83,
                'created_at' => '2017-09-07 04:04:58',
                'updated_at' => '2017-09-07 04:04:58',
            ),
            222 => 
            array (
                'id' => 1244,
                'following_id' => 77,
                'follower_id' => 189,
                'created_at' => '2017-09-13 06:23:42',
                'updated_at' => '2017-09-13 06:23:42',
            ),
            223 => 
            array (
                'id' => 1245,
                'following_id' => 189,
                'follower_id' => 148,
                'created_at' => '2017-09-03 18:51:26',
                'updated_at' => '2017-09-03 18:51:26',
            ),
            224 => 
            array (
                'id' => 1246,
                'following_id' => 184,
                'follower_id' => 71,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            225 => 
            array (
                'id' => 1247,
                'following_id' => 53,
                'follower_id' => 32,
                'created_at' => '2017-09-21 17:27:38',
                'updated_at' => '2017-09-21 17:27:38',
            ),
            226 => 
            array (
                'id' => 1248,
                'following_id' => 146,
                'follower_id' => 146,
                'created_at' => '2017-08-27 00:44:42',
                'updated_at' => '2017-08-27 00:44:42',
            ),
            227 => 
            array (
                'id' => 1249,
                'following_id' => 45,
                'follower_id' => 176,
                'created_at' => '2017-09-14 08:59:34',
                'updated_at' => '2017-09-14 08:59:34',
            ),
            228 => 
            array (
                'id' => 1250,
                'following_id' => 146,
                'follower_id' => 34,
                'created_at' => '2017-09-08 06:51:27',
                'updated_at' => '2017-09-08 06:51:27',
            ),
            229 => 
            array (
                'id' => 1251,
                'following_id' => 125,
                'follower_id' => 83,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            230 => 
            array (
                'id' => 1252,
                'following_id' => 90,
                'follower_id' => 111,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            231 => 
            array (
                'id' => 1253,
                'following_id' => 28,
                'follower_id' => 69,
                'created_at' => '2017-09-23 07:11:31',
                'updated_at' => '2017-09-23 07:11:31',
            ),
            232 => 
            array (
                'id' => 1254,
                'following_id' => 108,
                'follower_id' => 189,
                'created_at' => '2017-09-04 01:31:41',
                'updated_at' => '2017-09-04 01:31:41',
            ),
            233 => 
            array (
                'id' => 1255,
                'following_id' => 82,
                'follower_id' => 90,
                'created_at' => '2017-09-16 22:35:39',
                'updated_at' => '2017-09-16 22:35:39',
            ),
            234 => 
            array (
                'id' => 1256,
                'following_id' => 19,
                'follower_id' => 60,
                'created_at' => '2017-08-25 08:18:34',
                'updated_at' => '2017-08-25 08:18:34',
            ),
            235 => 
            array (
                'id' => 1257,
                'following_id' => 46,
                'follower_id' => 125,
                'created_at' => '2017-09-14 23:09:57',
                'updated_at' => '2017-09-14 23:09:57',
            ),
            236 => 
            array (
                'id' => 1258,
                'following_id' => 189,
                'follower_id' => 87,
                'created_at' => '2017-09-09 12:52:27',
                'updated_at' => '2017-09-09 12:52:27',
            ),
            237 => 
            array (
                'id' => 1259,
                'following_id' => 149,
                'follower_id' => 156,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            238 => 
            array (
                'id' => 1260,
                'following_id' => 98,
                'follower_id' => 23,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            239 => 
            array (
                'id' => 1261,
                'following_id' => 100,
                'follower_id' => 179,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            240 => 
            array (
                'id' => 1262,
                'following_id' => 8,
                'follower_id' => 169,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            241 => 
            array (
                'id' => 1263,
                'following_id' => 107,
                'follower_id' => 153,
                'created_at' => '2017-09-20 06:53:53',
                'updated_at' => '2017-09-20 06:53:53',
            ),
            242 => 
            array (
                'id' => 1264,
                'following_id' => 174,
                'follower_id' => 58,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            243 => 
            array (
                'id' => 1265,
                'following_id' => 166,
                'follower_id' => 167,
                'created_at' => '2017-09-14 13:01:31',
                'updated_at' => '2017-09-14 13:01:31',
            ),
            244 => 
            array (
                'id' => 1266,
                'following_id' => 152,
                'follower_id' => 101,
                'created_at' => '2017-09-02 11:19:48',
                'updated_at' => '2017-09-02 11:19:48',
            ),
            245 => 
            array (
                'id' => 1267,
                'following_id' => 44,
                'follower_id' => 58,
                'created_at' => '2017-09-08 05:31:28',
                'updated_at' => '2017-09-08 05:31:28',
            ),
            246 => 
            array (
                'id' => 1268,
                'following_id' => 102,
                'follower_id' => 85,
                'created_at' => '2017-09-10 10:45:39',
                'updated_at' => '2017-09-10 10:45:39',
            ),
            247 => 
            array (
                'id' => 1269,
                'following_id' => 51,
                'follower_id' => 55,
                'created_at' => '2017-09-15 09:18:41',
                'updated_at' => '2017-09-15 09:18:41',
            ),
            248 => 
            array (
                'id' => 1270,
                'following_id' => 35,
                'follower_id' => 29,
                'created_at' => '2017-09-15 00:30:48',
                'updated_at' => '2017-09-15 00:30:48',
            ),
            249 => 
            array (
                'id' => 1271,
                'following_id' => 154,
                'follower_id' => 65,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            250 => 
            array (
                'id' => 1272,
                'following_id' => 76,
                'follower_id' => 64,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            251 => 
            array (
                'id' => 1273,
                'following_id' => 109,
                'follower_id' => 149,
                'created_at' => '2017-09-06 19:06:52',
                'updated_at' => '2017-09-06 19:06:52',
            ),
            252 => 
            array (
                'id' => 1274,
                'following_id' => 141,
                'follower_id' => 184,
                'created_at' => '2017-09-02 22:52:33',
                'updated_at' => '2017-09-02 22:52:33',
            ),
            253 => 
            array (
                'id' => 1275,
                'following_id' => 193,
                'follower_id' => 114,
                'created_at' => '2017-08-27 15:46:55',
                'updated_at' => '2017-08-27 15:46:55',
            ),
            254 => 
            array (
                'id' => 1276,
                'following_id' => 175,
                'follower_id' => 119,
                'created_at' => '2017-09-12 06:10:43',
                'updated_at' => '2017-09-12 06:10:43',
            ),
            255 => 
            array (
                'id' => 1277,
                'following_id' => 95,
                'follower_id' => 89,
                'created_at' => '2017-09-07 11:15:52',
                'updated_at' => '2017-09-07 11:15:52',
            ),
            256 => 
            array (
                'id' => 1278,
                'following_id' => 161,
                'follower_id' => 48,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            257 => 
            array (
                'id' => 1279,
                'following_id' => 183,
                'follower_id' => 18,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            258 => 
            array (
                'id' => 1280,
                'following_id' => 136,
                'follower_id' => 40,
                'created_at' => '2017-09-09 03:53:35',
                'updated_at' => '2017-09-09 03:53:35',
            ),
            259 => 
            array (
                'id' => 1281,
                'following_id' => 146,
                'follower_id' => 69,
                'created_at' => '2017-09-09 14:02:33',
                'updated_at' => '2017-09-09 14:02:33',
            ),
            260 => 
            array (
                'id' => 1282,
                'following_id' => 59,
                'follower_id' => 46,
                'created_at' => '2017-09-12 19:45:59',
                'updated_at' => '2017-09-12 19:45:59',
            ),
            261 => 
            array (
                'id' => 1283,
                'following_id' => 45,
                'follower_id' => 152,
                'created_at' => '2017-09-07 05:40:34',
                'updated_at' => '2017-09-07 05:40:34',
            ),
            262 => 
            array (
                'id' => 1285,
                'following_id' => 10,
                'follower_id' => 174,
                'created_at' => '2017-09-09 14:09:37',
                'updated_at' => '2017-09-09 14:09:37',
            ),
            263 => 
            array (
                'id' => 1286,
                'following_id' => 171,
                'follower_id' => 45,
                'created_at' => '2017-09-07 04:04:59',
                'updated_at' => '2017-09-07 04:04:59',
            ),
            264 => 
            array (
                'id' => 1287,
                'following_id' => 176,
                'follower_id' => 104,
                'created_at' => '2017-09-13 06:23:43',
                'updated_at' => '2017-09-13 06:23:43',
            ),
            265 => 
            array (
                'id' => 1288,
                'following_id' => 107,
                'follower_id' => 110,
                'created_at' => '2017-09-03 18:51:27',
                'updated_at' => '2017-09-03 18:51:27',
            ),
            266 => 
            array (
                'id' => 1289,
                'following_id' => 135,
                'follower_id' => 189,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            267 => 
            array (
                'id' => 1290,
                'following_id' => 23,
                'follower_id' => 109,
                'created_at' => '2017-09-21 17:27:39',
                'updated_at' => '2017-09-21 17:27:39',
            ),
            268 => 
            array (
                'id' => 1291,
                'following_id' => 16,
                'follower_id' => 189,
                'created_at' => '2017-08-27 00:44:43',
                'updated_at' => '2017-08-27 00:44:43',
            ),
            269 => 
            array (
                'id' => 1293,
                'following_id' => 192,
                'follower_id' => 175,
                'created_at' => '2017-09-14 08:59:35',
                'updated_at' => '2017-09-14 08:59:35',
            ),
            270 => 
            array (
                'id' => 1294,
                'following_id' => 78,
                'follower_id' => 11,
                'created_at' => '2017-09-08 06:51:28',
                'updated_at' => '2017-09-08 06:51:28',
            ),
            271 => 
            array (
                'id' => 1295,
                'following_id' => 133,
                'follower_id' => 8,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            272 => 
            array (
                'id' => 1296,
                'following_id' => 88,
                'follower_id' => 54,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            273 => 
            array (
                'id' => 1297,
                'following_id' => 69,
                'follower_id' => 116,
                'created_at' => '2017-09-23 07:11:32',
                'updated_at' => '2017-09-23 07:11:32',
            ),
            274 => 
            array (
                'id' => 1298,
                'following_id' => 184,
                'follower_id' => 68,
                'created_at' => '2017-09-04 01:31:42',
                'updated_at' => '2017-09-04 01:31:42',
            ),
            275 => 
            array (
                'id' => 1299,
                'following_id' => 164,
                'follower_id' => 151,
                'created_at' => '2017-09-16 22:35:40',
                'updated_at' => '2017-09-16 22:35:40',
            ),
            276 => 
            array (
                'id' => 1300,
                'following_id' => 1,
                'follower_id' => 135,
                'created_at' => '2017-08-25 08:18:35',
                'updated_at' => '2017-08-25 08:18:35',
            ),
            277 => 
            array (
                'id' => 1301,
                'following_id' => 12,
                'follower_id' => 195,
                'created_at' => '2017-09-14 23:09:58',
                'updated_at' => '2017-09-14 23:09:58',
            ),
            278 => 
            array (
                'id' => 1302,
                'following_id' => 144,
                'follower_id' => 22,
                'created_at' => '2017-09-09 12:52:28',
                'updated_at' => '2017-09-09 12:52:28',
            ),
            279 => 
            array (
                'id' => 1303,
                'following_id' => 93,
                'follower_id' => 100,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            280 => 
            array (
                'id' => 1304,
                'following_id' => 138,
                'follower_id' => 73,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            281 => 
            array (
                'id' => 1305,
                'following_id' => 14,
                'follower_id' => 184,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            282 => 
            array (
                'id' => 1306,
                'following_id' => 12,
                'follower_id' => 110,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            283 => 
            array (
                'id' => 1307,
                'following_id' => 147,
                'follower_id' => 148,
                'created_at' => '2017-09-20 06:53:54',
                'updated_at' => '2017-09-20 06:53:54',
            ),
            284 => 
            array (
                'id' => 1308,
                'following_id' => 169,
                'follower_id' => 138,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            285 => 
            array (
                'id' => 1309,
                'following_id' => 169,
                'follower_id' => 131,
                'created_at' => '2017-09-14 13:01:32',
                'updated_at' => '2017-09-14 13:01:32',
            ),
            286 => 
            array (
                'id' => 1310,
                'following_id' => 64,
                'follower_id' => 108,
                'created_at' => '2017-09-02 11:19:49',
                'updated_at' => '2017-09-02 11:19:49',
            ),
            287 => 
            array (
                'id' => 1311,
                'following_id' => 58,
                'follower_id' => 148,
                'created_at' => '2017-09-08 05:31:29',
                'updated_at' => '2017-09-08 05:31:29',
            ),
            288 => 
            array (
                'id' => 1312,
                'following_id' => 98,
                'follower_id' => 103,
                'created_at' => '2017-09-10 10:45:40',
                'updated_at' => '2017-09-10 10:45:40',
            ),
            289 => 
            array (
                'id' => 1314,
                'following_id' => 154,
                'follower_id' => 26,
                'created_at' => '2017-09-15 09:18:42',
                'updated_at' => '2017-09-15 09:18:42',
            ),
            290 => 
            array (
                'id' => 1315,
                'following_id' => 54,
                'follower_id' => 74,
                'created_at' => '2017-09-15 00:30:49',
                'updated_at' => '2017-09-15 00:30:49',
            ),
            291 => 
            array (
                'id' => 1316,
                'following_id' => 188,
                'follower_id' => 193,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            292 => 
            array (
                'id' => 1317,
                'following_id' => 65,
                'follower_id' => 49,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            293 => 
            array (
                'id' => 1318,
                'following_id' => 41,
                'follower_id' => 37,
                'created_at' => '2017-09-06 19:06:53',
                'updated_at' => '2017-09-06 19:06:53',
            ),
            294 => 
            array (
                'id' => 1319,
                'following_id' => 48,
                'follower_id' => 38,
                'created_at' => '2017-09-02 22:52:34',
                'updated_at' => '2017-09-02 22:52:34',
            ),
            295 => 
            array (
                'id' => 1320,
                'following_id' => 54,
                'follower_id' => 175,
                'created_at' => '2017-08-27 15:46:56',
                'updated_at' => '2017-08-27 15:46:56',
            ),
            296 => 
            array (
                'id' => 1321,
                'following_id' => 125,
                'follower_id' => 115,
                'created_at' => '2017-09-12 06:10:44',
                'updated_at' => '2017-09-12 06:10:44',
            ),
            297 => 
            array (
                'id' => 1322,
                'following_id' => 169,
                'follower_id' => 175,
                'created_at' => '2017-09-07 11:15:53',
                'updated_at' => '2017-09-07 11:15:53',
            ),
            298 => 
            array (
                'id' => 1323,
                'following_id' => 109,
                'follower_id' => 75,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            299 => 
            array (
                'id' => 1324,
                'following_id' => 128,
                'follower_id' => 100,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            300 => 
            array (
                'id' => 1325,
                'following_id' => 171,
                'follower_id' => 46,
                'created_at' => '2017-09-09 03:53:36',
                'updated_at' => '2017-09-09 03:53:36',
            ),
            301 => 
            array (
                'id' => 1326,
                'following_id' => 59,
                'follower_id' => 145,
                'created_at' => '2017-09-09 14:02:34',
                'updated_at' => '2017-09-09 14:02:34',
            ),
            302 => 
            array (
                'id' => 1327,
                'following_id' => 21,
                'follower_id' => 158,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            303 => 
            array (
                'id' => 1328,
                'following_id' => 132,
                'follower_id' => 50,
                'created_at' => '2017-09-07 05:40:35',
                'updated_at' => '2017-09-07 05:40:35',
            ),
            304 => 
            array (
                'id' => 1329,
                'following_id' => 108,
                'follower_id' => 61,
                'created_at' => '2017-09-09 14:09:38',
                'updated_at' => '2017-09-09 14:09:38',
            ),
            305 => 
            array (
                'id' => 1330,
                'following_id' => 8,
                'follower_id' => 106,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            306 => 
            array (
                'id' => 1331,
                'following_id' => 113,
                'follower_id' => 11,
                'created_at' => '2017-09-13 06:23:44',
                'updated_at' => '2017-09-13 06:23:44',
            ),
            307 => 
            array (
                'id' => 1332,
                'following_id' => 91,
                'follower_id' => 115,
                'created_at' => '2017-09-03 18:51:28',
                'updated_at' => '2017-09-03 18:51:28',
            ),
            308 => 
            array (
                'id' => 1333,
                'following_id' => 119,
                'follower_id' => 63,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            309 => 
            array (
                'id' => 1334,
                'following_id' => 89,
                'follower_id' => 33,
                'created_at' => '2017-09-21 17:27:40',
                'updated_at' => '2017-09-21 17:27:40',
            ),
            310 => 
            array (
                'id' => 1335,
                'following_id' => 116,
                'follower_id' => 47,
                'created_at' => '2017-08-27 00:44:44',
                'updated_at' => '2017-08-27 00:44:44',
            ),
            311 => 
            array (
                'id' => 1336,
                'following_id' => 146,
                'follower_id' => 62,
                'created_at' => '2017-09-14 08:59:36',
                'updated_at' => '2017-09-14 08:59:36',
            ),
            312 => 
            array (
                'id' => 1337,
                'following_id' => 151,
                'follower_id' => 125,
                'created_at' => '2017-09-08 06:51:29',
                'updated_at' => '2017-09-08 06:51:29',
            ),
            313 => 
            array (
                'id' => 1338,
                'following_id' => 36,
                'follower_id' => 62,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            314 => 
            array (
                'id' => 1339,
                'following_id' => 33,
                'follower_id' => 191,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            315 => 
            array (
                'id' => 1340,
                'following_id' => 132,
                'follower_id' => 173,
                'created_at' => '2017-09-23 07:11:33',
                'updated_at' => '2017-09-23 07:11:33',
            ),
            316 => 
            array (
                'id' => 1341,
                'following_id' => 92,
                'follower_id' => 41,
                'created_at' => '2017-09-04 01:31:43',
                'updated_at' => '2017-09-04 01:31:43',
            ),
            317 => 
            array (
                'id' => 1342,
                'following_id' => 74,
                'follower_id' => 14,
                'created_at' => '2017-09-16 22:35:41',
                'updated_at' => '2017-09-16 22:35:41',
            ),
            318 => 
            array (
                'id' => 1343,
                'following_id' => 63,
                'follower_id' => 64,
                'created_at' => '2017-08-25 08:18:36',
                'updated_at' => '2017-08-25 08:18:36',
            ),
            319 => 
            array (
                'id' => 1344,
                'following_id' => 139,
                'follower_id' => 62,
                'created_at' => '2017-09-14 23:09:59',
                'updated_at' => '2017-09-14 23:09:59',
            ),
            320 => 
            array (
                'id' => 1345,
                'following_id' => 42,
                'follower_id' => 90,
                'created_at' => '2017-09-09 12:52:29',
                'updated_at' => '2017-09-09 12:52:29',
            ),
            321 => 
            array (
                'id' => 1346,
                'following_id' => 143,
                'follower_id' => 188,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            322 => 
            array (
                'id' => 1347,
                'following_id' => 32,
                'follower_id' => 95,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            323 => 
            array (
                'id' => 1348,
                'following_id' => 86,
                'follower_id' => 68,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            324 => 
            array (
                'id' => 1349,
                'following_id' => 150,
                'follower_id' => 91,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            325 => 
            array (
                'id' => 1350,
                'following_id' => 16,
                'follower_id' => 59,
                'created_at' => '2017-09-20 06:53:55',
                'updated_at' => '2017-09-20 06:53:55',
            ),
            326 => 
            array (
                'id' => 1351,
                'following_id' => 159,
                'follower_id' => 183,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            327 => 
            array (
                'id' => 1352,
                'following_id' => 115,
                'follower_id' => 144,
                'created_at' => '2017-09-14 13:01:33',
                'updated_at' => '2017-09-14 13:01:33',
            ),
            328 => 
            array (
                'id' => 1353,
                'following_id' => 110,
                'follower_id' => 41,
                'created_at' => '2017-09-02 11:19:50',
                'updated_at' => '2017-09-02 11:19:50',
            ),
            329 => 
            array (
                'id' => 1354,
                'following_id' => 143,
                'follower_id' => 16,
                'created_at' => '2017-09-08 05:31:30',
                'updated_at' => '2017-09-08 05:31:30',
            ),
            330 => 
            array (
                'id' => 1355,
                'following_id' => 128,
                'follower_id' => 131,
                'created_at' => '2017-09-10 10:45:41',
                'updated_at' => '2017-09-10 10:45:41',
            ),
            331 => 
            array (
                'id' => 1356,
                'following_id' => 188,
                'follower_id' => 94,
                'created_at' => '2017-09-15 09:18:43',
                'updated_at' => '2017-09-15 09:18:43',
            ),
            332 => 
            array (
                'id' => 1357,
                'following_id' => 11,
                'follower_id' => 49,
                'created_at' => '2017-09-15 00:30:50',
                'updated_at' => '2017-09-15 00:30:50',
            ),
            333 => 
            array (
                'id' => 1358,
                'following_id' => 134,
                'follower_id' => 2,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            334 => 
            array (
                'id' => 1359,
                'following_id' => 132,
                'follower_id' => 100,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            335 => 
            array (
                'id' => 1360,
                'following_id' => 34,
                'follower_id' => 48,
                'created_at' => '2017-09-06 19:06:54',
                'updated_at' => '2017-09-06 19:06:54',
            ),
            336 => 
            array (
                'id' => 1361,
                'following_id' => 39,
                'follower_id' => 56,
                'created_at' => '2017-09-02 22:52:35',
                'updated_at' => '2017-09-02 22:52:35',
            ),
            337 => 
            array (
                'id' => 1362,
                'following_id' => 115,
                'follower_id' => 19,
                'created_at' => '2017-08-27 15:46:57',
                'updated_at' => '2017-08-27 15:46:57',
            ),
            338 => 
            array (
                'id' => 1363,
                'following_id' => 105,
                'follower_id' => 109,
                'created_at' => '2017-09-12 06:10:45',
                'updated_at' => '2017-09-12 06:10:45',
            ),
            339 => 
            array (
                'id' => 1364,
                'following_id' => 1,
                'follower_id' => 132,
                'created_at' => '2017-09-07 11:15:54',
                'updated_at' => '2017-09-07 11:15:54',
            ),
            340 => 
            array (
                'id' => 1365,
                'following_id' => 185,
                'follower_id' => 59,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            341 => 
            array (
                'id' => 1366,
                'following_id' => 79,
                'follower_id' => 163,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            342 => 
            array (
                'id' => 1367,
                'following_id' => 52,
                'follower_id' => 151,
                'created_at' => '2017-09-09 03:53:37',
                'updated_at' => '2017-09-09 03:53:37',
            ),
            343 => 
            array (
                'id' => 1368,
                'following_id' => 13,
                'follower_id' => 195,
                'created_at' => '2017-09-09 14:02:35',
                'updated_at' => '2017-09-09 14:02:35',
            ),
            344 => 
            array (
                'id' => 1369,
                'following_id' => 53,
                'follower_id' => 178,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            345 => 
            array (
                'id' => 1370,
                'following_id' => 28,
                'follower_id' => 22,
                'created_at' => '2017-09-07 05:40:36',
                'updated_at' => '2017-09-07 05:40:36',
            ),
            346 => 
            array (
                'id' => 1371,
                'following_id' => 49,
                'follower_id' => 145,
                'created_at' => '2017-09-09 14:09:39',
                'updated_at' => '2017-09-09 14:09:39',
            ),
            347 => 
            array (
                'id' => 1372,
                'following_id' => 161,
                'follower_id' => 68,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            348 => 
            array (
                'id' => 1373,
                'following_id' => 138,
                'follower_id' => 90,
                'created_at' => '2017-09-13 06:23:45',
                'updated_at' => '2017-09-13 06:23:45',
            ),
            349 => 
            array (
                'id' => 1374,
                'following_id' => 72,
                'follower_id' => 44,
                'created_at' => '2017-09-03 18:51:29',
                'updated_at' => '2017-09-03 18:51:29',
            ),
            350 => 
            array (
                'id' => 1375,
                'following_id' => 193,
                'follower_id' => 74,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            351 => 
            array (
                'id' => 1376,
                'following_id' => 49,
                'follower_id' => 152,
                'created_at' => '2017-09-21 17:27:41',
                'updated_at' => '2017-09-21 17:27:41',
            ),
            352 => 
            array (
                'id' => 1377,
                'following_id' => 58,
                'follower_id' => 58,
                'created_at' => '2017-08-27 00:44:45',
                'updated_at' => '2017-08-27 00:44:45',
            ),
            353 => 
            array (
                'id' => 1378,
                'following_id' => 115,
                'follower_id' => 111,
                'created_at' => '2017-09-14 08:59:37',
                'updated_at' => '2017-09-14 08:59:37',
            ),
            354 => 
            array (
                'id' => 1379,
                'following_id' => 121,
                'follower_id' => 48,
                'created_at' => '2017-09-08 06:51:30',
                'updated_at' => '2017-09-08 06:51:30',
            ),
            355 => 
            array (
                'id' => 1380,
                'following_id' => 120,
                'follower_id' => 26,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            356 => 
            array (
                'id' => 1381,
                'following_id' => 75,
                'follower_id' => 30,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            357 => 
            array (
                'id' => 1383,
                'following_id' => 95,
                'follower_id' => 45,
                'created_at' => '2017-09-23 07:11:34',
                'updated_at' => '2017-09-23 07:11:34',
            ),
            358 => 
            array (
                'id' => 1384,
                'following_id' => 36,
                'follower_id' => 75,
                'created_at' => '2017-09-04 01:31:44',
                'updated_at' => '2017-09-04 01:31:44',
            ),
            359 => 
            array (
                'id' => 1385,
                'following_id' => 84,
                'follower_id' => 121,
                'created_at' => '2017-09-16 22:35:42',
                'updated_at' => '2017-09-16 22:35:42',
            ),
            360 => 
            array (
                'id' => 1386,
                'following_id' => 1,
                'follower_id' => 161,
                'created_at' => '2017-08-25 08:18:37',
                'updated_at' => '2017-08-25 08:18:37',
            ),
            361 => 
            array (
                'id' => 1387,
                'following_id' => 25,
                'follower_id' => 14,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            362 => 
            array (
                'id' => 1389,
                'following_id' => 108,
                'follower_id' => 175,
                'created_at' => '2017-09-09 12:52:30',
                'updated_at' => '2017-09-09 12:52:30',
            ),
            363 => 
            array (
                'id' => 1390,
                'following_id' => 24,
                'follower_id' => 190,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            364 => 
            array (
                'id' => 1392,
                'following_id' => 55,
                'follower_id' => 27,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            365 => 
            array (
                'id' => 1393,
                'following_id' => 23,
                'follower_id' => 156,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            366 => 
            array (
                'id' => 1395,
                'following_id' => 91,
                'follower_id' => 56,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            367 => 
            array (
                'id' => 1396,
                'following_id' => 11,
                'follower_id' => 170,
                'created_at' => '2017-09-20 06:53:56',
                'updated_at' => '2017-09-20 06:53:56',
            ),
            368 => 
            array (
                'id' => 1397,
                'following_id' => 6,
                'follower_id' => 145,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            369 => 
            array (
                'id' => 1398,
                'following_id' => 80,
                'follower_id' => 79,
                'created_at' => '2017-09-14 13:01:34',
                'updated_at' => '2017-09-14 13:01:34',
            ),
            370 => 
            array (
                'id' => 1399,
                'following_id' => 104,
                'follower_id' => 83,
                'created_at' => '2017-09-02 11:19:51',
                'updated_at' => '2017-09-02 11:19:51',
            ),
            371 => 
            array (
                'id' => 1400,
                'following_id' => 57,
                'follower_id' => 95,
                'created_at' => '2017-09-08 05:31:31',
                'updated_at' => '2017-09-08 05:31:31',
            ),
            372 => 
            array (
                'id' => 1401,
                'following_id' => 72,
                'follower_id' => 68,
                'created_at' => '2017-09-10 10:45:42',
                'updated_at' => '2017-09-10 10:45:42',
            ),
            373 => 
            array (
                'id' => 1402,
                'following_id' => 133,
                'follower_id' => 61,
                'created_at' => '2017-09-15 09:18:44',
                'updated_at' => '2017-09-15 09:18:44',
            ),
            374 => 
            array (
                'id' => 1403,
                'following_id' => 107,
                'follower_id' => 53,
                'created_at' => '2017-09-15 00:30:51',
                'updated_at' => '2017-09-15 00:30:51',
            ),
            375 => 
            array (
                'id' => 1404,
                'following_id' => 24,
                'follower_id' => 175,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            376 => 
            array (
                'id' => 1405,
                'following_id' => 132,
                'follower_id' => 64,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            377 => 
            array (
                'id' => 1406,
                'following_id' => 56,
                'follower_id' => 128,
                'created_at' => '2017-09-06 19:06:55',
                'updated_at' => '2017-09-06 19:06:55',
            ),
            378 => 
            array (
                'id' => 1408,
                'following_id' => 57,
                'follower_id' => 157,
                'created_at' => '2017-09-02 22:52:36',
                'updated_at' => '2017-09-02 22:52:36',
            ),
            379 => 
            array (
                'id' => 1409,
                'following_id' => 142,
                'follower_id' => 167,
                'created_at' => '2017-08-27 15:46:58',
                'updated_at' => '2017-08-27 15:46:58',
            ),
            380 => 
            array (
                'id' => 1410,
                'following_id' => 41,
                'follower_id' => 133,
                'created_at' => '2017-09-12 06:10:46',
                'updated_at' => '2017-09-12 06:10:46',
            ),
            381 => 
            array (
                'id' => 1411,
                'following_id' => 177,
                'follower_id' => 39,
                'created_at' => '2017-09-07 11:15:55',
                'updated_at' => '2017-09-07 11:15:55',
            ),
            382 => 
            array (
                'id' => 1412,
                'following_id' => 95,
                'follower_id' => 71,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            383 => 
            array (
                'id' => 1413,
                'following_id' => 80,
                'follower_id' => 88,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            384 => 
            array (
                'id' => 1414,
                'following_id' => 27,
                'follower_id' => 153,
                'created_at' => '2017-09-09 03:53:38',
                'updated_at' => '2017-09-09 03:53:38',
            ),
            385 => 
            array (
                'id' => 1415,
                'following_id' => 171,
                'follower_id' => 29,
                'created_at' => '2017-09-09 14:02:36',
                'updated_at' => '2017-09-09 14:02:36',
            ),
            386 => 
            array (
                'id' => 1416,
                'following_id' => 69,
                'follower_id' => 112,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            387 => 
            array (
                'id' => 1417,
                'following_id' => 81,
                'follower_id' => 69,
                'created_at' => '2017-09-07 05:40:37',
                'updated_at' => '2017-09-07 05:40:37',
            ),
            388 => 
            array (
                'id' => 1418,
                'following_id' => 62,
                'follower_id' => 151,
                'created_at' => '2017-09-09 14:09:40',
                'updated_at' => '2017-09-09 14:09:40',
            ),
            389 => 
            array (
                'id' => 1419,
                'following_id' => 37,
                'follower_id' => 64,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            390 => 
            array (
                'id' => 1420,
                'following_id' => 77,
                'follower_id' => 133,
                'created_at' => '2017-09-13 06:23:46',
                'updated_at' => '2017-09-13 06:23:46',
            ),
            391 => 
            array (
                'id' => 1422,
                'following_id' => 83,
                'follower_id' => 73,
                'created_at' => '2017-09-03 18:51:30',
                'updated_at' => '2017-09-03 18:51:30',
            ),
            392 => 
            array (
                'id' => 1423,
                'following_id' => 28,
                'follower_id' => 180,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            393 => 
            array (
                'id' => 1424,
                'following_id' => 123,
                'follower_id' => 85,
                'created_at' => '2017-09-21 17:27:42',
                'updated_at' => '2017-09-21 17:27:42',
            ),
            394 => 
            array (
                'id' => 1425,
                'following_id' => 95,
                'follower_id' => 36,
                'created_at' => '2017-08-27 00:44:46',
                'updated_at' => '2017-08-27 00:44:46',
            ),
            395 => 
            array (
                'id' => 1426,
                'following_id' => 185,
                'follower_id' => 5,
                'created_at' => '2017-09-14 08:59:38',
                'updated_at' => '2017-09-14 08:59:38',
            ),
            396 => 
            array (
                'id' => 1427,
                'following_id' => 129,
                'follower_id' => 114,
                'created_at' => '2017-09-08 06:51:31',
                'updated_at' => '2017-09-08 06:51:31',
            ),
            397 => 
            array (
                'id' => 1429,
                'following_id' => 58,
                'follower_id' => 67,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            398 => 
            array (
                'id' => 1430,
                'following_id' => 183,
                'follower_id' => 88,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            399 => 
            array (
                'id' => 1431,
                'following_id' => 96,
                'follower_id' => 63,
                'created_at' => '2017-09-23 07:11:35',
                'updated_at' => '2017-09-23 07:11:35',
            ),
            400 => 
            array (
                'id' => 1432,
                'following_id' => 58,
                'follower_id' => 150,
                'created_at' => '2017-09-04 01:31:45',
                'updated_at' => '2017-09-04 01:31:45',
            ),
            401 => 
            array (
                'id' => 1433,
                'following_id' => 147,
                'follower_id' => 100,
                'created_at' => '2017-09-16 22:35:43',
                'updated_at' => '2017-09-16 22:35:43',
            ),
            402 => 
            array (
                'id' => 1434,
                'following_id' => 15,
                'follower_id' => 134,
                'created_at' => '2017-08-25 08:18:38',
                'updated_at' => '2017-08-25 08:18:38',
            ),
            403 => 
            array (
                'id' => 1435,
                'following_id' => 145,
                'follower_id' => 87,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            404 => 
            array (
                'id' => 1436,
                'following_id' => 194,
                'follower_id' => 42,
                'created_at' => '2017-09-09 12:52:31',
                'updated_at' => '2017-09-09 12:52:31',
            ),
            405 => 
            array (
                'id' => 1437,
                'following_id' => 20,
                'follower_id' => 58,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            406 => 
            array (
                'id' => 1438,
                'following_id' => 73,
                'follower_id' => 188,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            407 => 
            array (
                'id' => 1439,
                'following_id' => 22,
                'follower_id' => 19,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            408 => 
            array (
                'id' => 1440,
                'following_id' => 63,
                'follower_id' => 103,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            409 => 
            array (
                'id' => 1441,
                'following_id' => 60,
                'follower_id' => 26,
                'created_at' => '2017-09-20 06:53:57',
                'updated_at' => '2017-09-20 06:53:57',
            ),
            410 => 
            array (
                'id' => 1442,
                'following_id' => 59,
                'follower_id' => 134,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            411 => 
            array (
                'id' => 1443,
                'following_id' => 59,
                'follower_id' => 40,
                'created_at' => '2017-09-14 13:01:35',
                'updated_at' => '2017-09-14 13:01:35',
            ),
            412 => 
            array (
                'id' => 1444,
                'following_id' => 157,
                'follower_id' => 189,
                'created_at' => '2017-09-02 11:19:52',
                'updated_at' => '2017-09-02 11:19:52',
            ),
            413 => 
            array (
                'id' => 1445,
                'following_id' => 166,
                'follower_id' => 92,
                'created_at' => '2017-09-08 05:31:32',
                'updated_at' => '2017-09-08 05:31:32',
            ),
            414 => 
            array (
                'id' => 1446,
                'following_id' => 82,
                'follower_id' => 159,
                'created_at' => '2017-09-10 10:45:43',
                'updated_at' => '2017-09-10 10:45:43',
            ),
            415 => 
            array (
                'id' => 1447,
                'following_id' => 8,
                'follower_id' => 50,
                'created_at' => '2017-09-15 09:18:45',
                'updated_at' => '2017-09-15 09:18:45',
            ),
            416 => 
            array (
                'id' => 1448,
                'following_id' => 169,
                'follower_id' => 137,
                'created_at' => '2017-09-15 00:30:52',
                'updated_at' => '2017-09-15 00:30:52',
            ),
            417 => 
            array (
                'id' => 1449,
                'following_id' => 55,
                'follower_id' => 194,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            418 => 
            array (
                'id' => 1450,
                'following_id' => 115,
                'follower_id' => 125,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            419 => 
            array (
                'id' => 1451,
                'following_id' => 180,
                'follower_id' => 153,
                'created_at' => '2017-09-06 19:06:56',
                'updated_at' => '2017-09-06 19:06:56',
            ),
            420 => 
            array (
                'id' => 1452,
                'following_id' => 103,
                'follower_id' => 12,
                'created_at' => '2017-09-02 22:52:37',
                'updated_at' => '2017-09-02 22:52:37',
            ),
            421 => 
            array (
                'id' => 1453,
                'following_id' => 36,
                'follower_id' => 87,
                'created_at' => '2017-08-27 15:46:59',
                'updated_at' => '2017-08-27 15:46:59',
            ),
            422 => 
            array (
                'id' => 1454,
                'following_id' => 35,
                'follower_id' => 103,
                'created_at' => '2017-09-12 06:10:47',
                'updated_at' => '2017-09-12 06:10:47',
            ),
            423 => 
            array (
                'id' => 1455,
                'following_id' => 181,
                'follower_id' => 78,
                'created_at' => '2017-09-07 11:15:56',
                'updated_at' => '2017-09-07 11:15:56',
            ),
            424 => 
            array (
                'id' => 1456,
                'following_id' => 132,
                'follower_id' => 133,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            425 => 
            array (
                'id' => 1457,
                'following_id' => 53,
                'follower_id' => 135,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            426 => 
            array (
                'id' => 1458,
                'following_id' => 34,
                'follower_id' => 107,
                'created_at' => '2017-09-09 03:53:39',
                'updated_at' => '2017-09-09 03:53:39',
            ),
            427 => 
            array (
                'id' => 1459,
                'following_id' => 95,
                'follower_id' => 111,
                'created_at' => '2017-09-09 14:02:37',
                'updated_at' => '2017-09-09 14:02:37',
            ),
            428 => 
            array (
                'id' => 1460,
                'following_id' => 37,
                'follower_id' => 176,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            429 => 
            array (
                'id' => 1462,
                'following_id' => 49,
                'follower_id' => 79,
                'created_at' => '2017-09-07 05:40:38',
                'updated_at' => '2017-09-07 05:40:38',
            ),
            430 => 
            array (
                'id' => 1463,
                'following_id' => 49,
                'follower_id' => 4,
                'created_at' => '2017-09-09 14:09:41',
                'updated_at' => '2017-09-09 14:09:41',
            ),
            431 => 
            array (
                'id' => 1464,
                'following_id' => 96,
                'follower_id' => 68,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            432 => 
            array (
                'id' => 1465,
                'following_id' => 37,
                'follower_id' => 43,
                'created_at' => '2017-09-13 06:23:47',
                'updated_at' => '2017-09-13 06:23:47',
            ),
            433 => 
            array (
                'id' => 1466,
                'following_id' => 170,
                'follower_id' => 30,
                'created_at' => '2017-09-03 18:51:31',
                'updated_at' => '2017-09-03 18:51:31',
            ),
            434 => 
            array (
                'id' => 1467,
                'following_id' => 59,
                'follower_id' => 14,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            435 => 
            array (
                'id' => 1468,
                'following_id' => 59,
                'follower_id' => 34,
                'created_at' => '2017-09-21 17:27:43',
                'updated_at' => '2017-09-21 17:27:43',
            ),
            436 => 
            array (
                'id' => 1470,
                'following_id' => 81,
                'follower_id' => 58,
                'created_at' => '2017-08-27 00:44:47',
                'updated_at' => '2017-08-27 00:44:47',
            ),
            437 => 
            array (
                'id' => 1471,
                'following_id' => 59,
                'follower_id' => 102,
                'created_at' => '2017-09-14 08:59:39',
                'updated_at' => '2017-09-14 08:59:39',
            ),
            438 => 
            array (
                'id' => 1472,
                'following_id' => 105,
                'follower_id' => 82,
                'created_at' => '2017-09-08 06:51:32',
                'updated_at' => '2017-09-08 06:51:32',
            ),
            439 => 
            array (
                'id' => 1473,
                'following_id' => 109,
                'follower_id' => 14,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            440 => 
            array (
                'id' => 1474,
                'following_id' => 100,
                'follower_id' => 132,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            441 => 
            array (
                'id' => 1475,
                'following_id' => 183,
                'follower_id' => 157,
                'created_at' => '2017-09-23 07:11:36',
                'updated_at' => '2017-09-23 07:11:36',
            ),
            442 => 
            array (
                'id' => 1476,
                'following_id' => 93,
                'follower_id' => 2,
                'created_at' => '2017-09-04 01:31:46',
                'updated_at' => '2017-09-04 01:31:46',
            ),
            443 => 
            array (
                'id' => 1477,
                'following_id' => 126,
                'follower_id' => 159,
                'created_at' => '2017-09-16 22:35:44',
                'updated_at' => '2017-09-16 22:35:44',
            ),
            444 => 
            array (
                'id' => 1479,
                'following_id' => 87,
                'follower_id' => 143,
                'created_at' => '2017-08-25 08:18:39',
                'updated_at' => '2017-08-25 08:18:39',
            ),
            445 => 
            array (
                'id' => 1480,
                'following_id' => 124,
                'follower_id' => 42,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            446 => 
            array (
                'id' => 1481,
                'following_id' => 110,
                'follower_id' => 88,
                'created_at' => '2017-09-09 12:52:32',
                'updated_at' => '2017-09-09 12:52:32',
            ),
            447 => 
            array (
                'id' => 1482,
                'following_id' => 14,
                'follower_id' => 186,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            448 => 
            array (
                'id' => 1483,
                'following_id' => 24,
                'follower_id' => 166,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            449 => 
            array (
                'id' => 1484,
                'following_id' => 23,
                'follower_id' => 28,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            450 => 
            array (
                'id' => 1485,
                'following_id' => 107,
                'follower_id' => 185,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            451 => 
            array (
                'id' => 1486,
                'following_id' => 83,
                'follower_id' => 70,
                'created_at' => '2017-09-20 06:53:58',
                'updated_at' => '2017-09-20 06:53:58',
            ),
            452 => 
            array (
                'id' => 1487,
                'following_id' => 40,
                'follower_id' => 142,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            453 => 
            array (
                'id' => 1489,
                'following_id' => 141,
                'follower_id' => 65,
                'created_at' => '2017-09-14 13:01:36',
                'updated_at' => '2017-09-14 13:01:36',
            ),
            454 => 
            array (
                'id' => 1490,
                'following_id' => 176,
                'follower_id' => 168,
                'created_at' => '2017-09-02 11:19:53',
                'updated_at' => '2017-09-02 11:19:53',
            ),
            455 => 
            array (
                'id' => 1491,
                'following_id' => 18,
                'follower_id' => 146,
                'created_at' => '2017-09-08 05:31:33',
                'updated_at' => '2017-09-08 05:31:33',
            ),
            456 => 
            array (
                'id' => 1492,
                'following_id' => 155,
                'follower_id' => 54,
                'created_at' => '2017-09-10 10:45:44',
                'updated_at' => '2017-09-10 10:45:44',
            ),
            457 => 
            array (
                'id' => 1494,
                'following_id' => 29,
                'follower_id' => 103,
                'created_at' => '2017-09-15 09:18:46',
                'updated_at' => '2017-09-15 09:18:46',
            ),
            458 => 
            array (
                'id' => 1495,
                'following_id' => 82,
                'follower_id' => 169,
                'created_at' => '2017-09-15 00:30:53',
                'updated_at' => '2017-09-15 00:30:53',
            ),
            459 => 
            array (
                'id' => 1496,
                'following_id' => 156,
                'follower_id' => 102,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            460 => 
            array (
                'id' => 1497,
                'following_id' => 83,
                'follower_id' => 33,
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            461 => 
            array (
                'id' => 1498,
                'following_id' => 31,
                'follower_id' => 133,
                'created_at' => '2017-09-06 19:06:57',
                'updated_at' => '2017-09-06 19:06:57',
            ),
            462 => 
            array (
                'id' => 1499,
                'following_id' => 1,
                'follower_id' => 19,
                'created_at' => '2017-09-30 09:18:49',
                'updated_at' => '2017-09-30 09:18:49',
            ),
        ));
        
        \DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
