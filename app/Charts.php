<?php

namespace Bigscreen;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Bigscreen\QuestionAnswer;

class Charts extends Model
{
    public static function pieCharts(int $id)
    {
        $query = DB::table('user_answers')
                ->select(DB::raw('count("answer") as nb_vote, answer'))
                ->where('question_id', $id)
                ->groupBy('answer')
                ->get();

        $labels = QuestionAnswer::all()
                    ->where('question_id', $id)
                    ->pluck('answers')
                    ->toArray();

        $datas = [];
        
        foreach ($query as $key => $value) {
            $datas[$value->answer] = $value->nb_vote;
        }
        foreach ($labels as $key => $value) {
            if (!array_key_exists($value, $datas)) {
                $datas[$value] = 0;
            }
        }
        return $datas;
    }

    public static function radarChart(array $id)
    {
        $datas = [];
        for ($i=0; $i < count($id); $i++) {
            $query = DB::table('user_answers')
                ->select(DB::raw('ROUND(AVG(answer), 2) as note'))
                ->where('question_id', $id[$i])
                ->value('note');

            $datas['Question n°'.$id[$i]] = $query;
        }

        return $datas;
    }
}
