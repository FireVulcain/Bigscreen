<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\QuestionAnswer;
use App\Question;

class Charts extends Model
{
    /**
     * Forme un tableau Key/Value pour la gestion des pie charts avec Chartjs
     *
     * @param integer $id
     * @return array $datas
     */
    public static function pieCharts(int $id)
    {
        /**
         * On récupère le total de réponse a la question
         */
        $query = DB::table('user_answers')
                ->select(DB::raw('count("answer") as nb_vote, answer'))
                ->where('question_id', $id)
                ->groupBy('answer')
                ->get();

        /**
         * On récupère toutes les réponses possibles à la question
         */
        $labels = QuestionAnswer::all()
                    ->where('question_id', $id)
                    ->pluck('answers')
                    ->toArray();

        $question = Question::all()->where('id', $id)->pluck('question');

        $datas = [];
        $datas['question'] = $question;
        

        /**
         * On forme un tableau avec pour clé la réponse à la question
         * et pour valeur le nombre total de réponse
         * Ex : $datas['HTC Vive'] = 6
         * Ici 6 personnes on répondu 'HTC vive' à la question
         */
        if (count($query) !== 0) {
            foreach ($query as $key => $value) {
                $datas['value'][$value->answer] = $value->nb_vote;
            }
        } else {
            $datas['value'] = [];
        }
        


        /**
         * Ici, on vérifie si la réponse à la question se trouve dans le tableau des réponses utilisateurs
         * afin de l'avoir dans le tableau, initié à 0 pour le sondage
         * Ex : Personne ne répond 'Windows store' à la question, on l'ajoute quand même à notre tableau
         * $datas['Windows Store'] = 0
         */
        foreach ($labels as $key => $value) {
            if (!array_key_exists($value, $datas['value'])) {
                $datas['value'][$value] = 0;
            }
        }

        return $datas;
    }

    /**
     * Forme un tableau Key/Value pour la gestion des radar charts avec Chartjs
     *
     * @param array $id
     * @return array $datas
     */
    public static function radarChart(array $id)
    {
        $datas = [];
        for ($i=0; $i < count($id); $i++) {
            $avgNote = DB::table('user_answers')
                ->select(DB::raw('ROUND(AVG(answer), 2) as note'))
                ->where('question_id', $id[$i])
                ->value('note');

            $datas['Question n°'.$id[$i]] = $avgNote;
        }

        return $datas;
    }
}
