<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(SurveyTableSeeder::class);
        $this->call(QuestionTableSeeder::class);
        $this->call(QuestionAnswerTableSeeder::class);
    }
}
