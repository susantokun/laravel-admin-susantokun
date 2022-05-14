<?php

use Illuminate\Database\Seeder;

/*
 * |==============================================================|
 * | Please DO NOT modify this information :                      |
 * |--------------------------------------------------------------|
 * | Author          : Susantokun
 * | Email           : admin@susantokun.com
 * | Instagram       : @susantokun
 * | Website         : http://www.susantokun.com
 * | Youtube         : http://youtube.com/susantokun
 * | File Created    : Friday, 28th February 2020 2:50:20 pm
 * | Last Modified   : Friday, 28th February 2020 2:50:20 pm
 * |==============================================================|
 */

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(AdminMenusSeeder::class);

        $this->call(InfoCategoryCertificatesSeeder::class);
        $this->call(InfoCertificatesSeeder::class);
        $this->call(InfoPlatformsSeeder::class);
        $this->call(InfoFrameworksSeeder::class);
        $this->call(InfoCategoryPortfoliosSeeder::class);
        $this->call(InfoPortfoliosSeeder::class);
        $this->call(InfoPlacesSeeder::class);
        $this->call(InfoExperiencesSeeder::class);
        $this->call(InfoMediaSocialsSeeder::class);
        $this->call(InfoConfigurationsSeeder::class);
    }
}
