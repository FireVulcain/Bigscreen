<?php

use Illuminate\Database\Seeder;
use App\Survey;

class SurveyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Survey::create([
            'name' => 'Survey n°1'
        ]);
    }
}
