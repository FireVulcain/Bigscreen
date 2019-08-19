<?php

use Illuminate\Database\Seeder;
use App\QuestionAnswer;
use App\Question;

class QuestionAnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $populateQuestions = array(
            "question_id" => array(3, 6, 7, 8, 10, 16, 17),
            "answers" => array(
                ['Homme', 'Femme', 'Préfère de pas répondre'],
                ['Occulus Rift/s', 'HTC Vive', 'Windows Mixed Reality', 'PSVR'],
                ['SteamVR', 'Occulus store', 'Viveport', 'Playstation VR', 'Google Play', 'Windows store'],
                ['Occulus Quest', 'Occulus Go', 'HTC Vive Pro', 'Autre', 'Aucun'],
                ['regarder des émissions TV en direct', 'regarder des films', 'jouer en solo', 'jouer en team'],
                ['Oui', 'Non'],
                ['Oui', 'Non']
            )
        );

        for ($i = 0; $i < count($populateQuestions['answers']); $i++) {
            for ($j = 0; $j < count($populateQuestions['answers'][$i]); $j++) {
                QuestionAnswer::create([
                    "question_id" => $populateQuestions['question_id'][$i],
                    "answers" => $populateQuestions['answers'][$i][$j]
                ]);
            }
        }
    }
}
