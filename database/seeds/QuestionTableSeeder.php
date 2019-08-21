<?php

use Illuminate\Database\Seeder;
use App\Question;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questionInfos = array(
            "questions" => array('Votre adresse mail', 'Votre âge', 'Votre sexe', 'Nombre de personne dans votre foyer (adulte & enfants)', 'Votre profession', 'Quel marque de casque VR utilisez vous ?', 'Sur quel magasin d’application achetez vous des contenus VR ?', 'Quel casque envisagez vous d’acheter dans un futur proche ?', 'Au sein de votre foyer, combien de personne utilisent votre casque VR pour regarder Bigscreen ?', 'Vous utilisez principalement Bigscreen pour :', 'Combien donnez vous de point pour la qualité de l’image sur Bigscreen ?', 'Combien donnez vous de point pour le confort d’utilisation de l’interface Bigscreen ?', 'Combien donnez vous de point pour la connection réseau de Bigscreen ?', 'Combien donnez vous de point pour la qualité des graphismes 3D dans Bigscreen ?', 'Combien donnez vous de point pour la qualité audio dans Bigscreen ?', 'Aimeriez vous avoir des notifications plus précises au cours de vos sessions Bigscreen ?', 'Aimeriez vous pouvoir inviter un ami à rejoindre votre session via son smartphone ?', 'Aimeriez vous pouvoir enregistrer des émissions TV pour pouvoir les regarder ultérieurement ?', 'Aimeriez vous jouer à des jeux exclusifs sur votre Bigscreen ?', 'Quelle nouvelle fonctionnalité de vos rêve devrait exister sur Bigscreen ?'),
            "questions_type" => array('B', 'B', 'A', 'C', 'B', 'A', 'A', 'A', 'C', 'A', 'C', 'C', 'C', 'C', 'C', 'A', 'A', 'A', 'A', 'B'),
            "is_email" => array(true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false)
        );

        for ($i = 0; $i < count($questionInfos["questions"]); $i++) {
            Question::create([
                "survey_id" => 1,
                "question" => $questionInfos['questions'][$i],
                "question_type" => $questionInfos['questions_type'][$i],
                "is_email" => $questionInfos['is_email'][$i]
            ]);
        }
    }
}
