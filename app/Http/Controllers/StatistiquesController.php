<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use Illuminate\Http\Request;

class StatistiquesController extends Controller
{
    public function statistiquesAdmin()
    {
        $stages = (stage::all());
        $count_pfe = 0;
        $count_im = 0;
        $count = 0;
        $pourcentage_pfe = [];
        $pourcentage_im = [];

        $count_li = 0;
        $count_ma = 0;
        $count_do = 0;
        $count_in = 0;
        $count_ts = 0;
        $pourcentage_li = [];
        $pourcentage_ma = [];
        $pourcentage_do = [];
        $pourcentage_in = [];
        $pourcentage_ts = [];

        $count_en = 0;
        $count_te = 0;
        $pourcentage_en = [];
        $pourcentage_te = [];



        foreach ($stages as $stage) {
            $count++;
        }

        foreach ($stages as $stage) {
            if ($stage->type_stage == "pfe") {
                $count_pfe++;
            } else {
                $count_im++;
            }
        }

        $formattedPercentage_pfe = number_format(($count_pfe * 100) / $count, 1);
        $formattedPercentage_im = number_format(($count_im * 100) / $count, 1);
        $pourcentage_pfe[] = $formattedPercentage_pfe;
        $pourcentage_im[] = $formattedPercentage_im;

        foreach ($stages as $stage) {
            if ($stage->level == "licence") {
                $count_li++;
            }
            if ($stage->level == "master") {
                $count_ma++;
            }
            if ($stage->level == "doctorat") {
                $count_do++;
            }
            if ($stage->level == "ingénieur") {
                $count_in++;
            }
            if ($stage->level == "TS") {
                $count_ts++;
            }
        }
        $formattedPercentage_li = number_format(($count_li * 100) / $count, 1);
        $formattedPercentage_ma = number_format(($count_ma * 100) / $count, 1);
        $formattedPercentage_do = number_format(($count_do * 100) / $count, 1);
        $formattedPercentage_in = number_format(($count_in * 100) / $count, 1);
        $formattedPercentage_ts = number_format(($count_ts * 100) / $count, 1);

        $pourcentage_li[] = $formattedPercentage_li;
        $pourcentage_ma[] = $formattedPercentage_ma;
        $pourcentage_do[] = $formattedPercentage_do;
        $pourcentage_in[] = $formattedPercentage_in;
        $pourcentage_ts[] = $formattedPercentage_ts;

        foreach ($stages as $stage) {
            if ($stage->end_date > now()) {
                $count_en++;
            } else {
                $count_te++;
            }
        }
        $formattedPercentage_en = number_format(($count_en * 100) / $count, 1);
        $formattedPercentage_te = number_format(($count_te * 100) / $count, 1);

        $pourcentage_en[] = $formattedPercentage_en;
        $pourcentage_te[] = $formattedPercentage_te;




        return view('admin.statistiques', compact(
            'stages',
            'pourcentage_pfe',
            'pourcentage_im',
            'count_pfe',
            'count_im',
            'pourcentage_li',
            'pourcentage_ma',
            'pourcentage_do',
            'pourcentage_en',
            'pourcentage_te',
            'pourcentage_in',
            'count_li',
            'count_ma',
            'count_do',
            'count_en',
            'count_te',
            'count_in',
            'pourcentage_ts',
            'count_ts'
        ));
    }
}
