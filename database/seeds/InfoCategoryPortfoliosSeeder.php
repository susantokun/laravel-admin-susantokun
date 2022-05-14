<?php

use Illuminate\Database\Seeder;

class InfoCategoryPortfoliosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info_category_portfolios')->insert(
            [
                [
                    'platform_id'  => '1',
                    'framework_id' => '1',
                    'description'  => 'website codeigniter',
                    'status'       => 'enable',
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s')
                ],
                [
                    'platform_id'  => '1',
                    'framework_id' => '2',
                    'description'  => 'website laravel',
                    'status'       => 'enable',
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s')
                ],
                [
                    'platform_id'  => '1',
                    'framework_id' => '3',
                    'description'  => 'website reactjs',
                    'status'       => 'enable',
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s')
                ],
            ]
        );
    }
}
