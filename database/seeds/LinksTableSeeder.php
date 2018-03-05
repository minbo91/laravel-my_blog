<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'link_name' => '后盾网',
                'link_title' => '国内其中一个培训机构',
                'link_url' => 'http://www.houdunwang.com',
                'link_order' => 1,
            ],
            [
                'link_name' => '后盾网论坛',
                'link_title' => '培训机构的论坛',
                'link_url' => 'http://bbs.houdunwang.com',
                'link_order' => 2,
            ],
        ];
        DB::table('links')->insert( $data );
    }
}
