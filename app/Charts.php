<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\QuestionAnswer;

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
                ->select(DB::raw('avg(answer) as note'))
                ->where('question_id', $id[$i])
                ->value('note');

            $datas['Q'.$id[$i]] = $query;
        }

        return $datas;
    }
}
