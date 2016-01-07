<?php

use Illuminate\Database\Seeder;
use App\Models\PublishingCompanies;

class PublishingCompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	PublishingCompanies::create(['name' => 'Novatec']);
    	PublishingCompanies::create(['name' => 'Abril']);
    	PublishingCompanies::create(['name' => 'Ciência Moderna']);
    	PublishingCompanies::create(['name' => 'Makron Books']);
    	PublishingCompanies::create(['name' => 'O\'REILLY']);
    	PublishingCompanies::create(['name' => 'Thomson']);
    	PublishingCompanies::create(['name' => 'Editora Ática']);

    }
}
