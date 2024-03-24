<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Prize extends Model
{

    protected $guarded = ['id'];




    public  static function nextPrize()
    {
        // TODO: Implement nextPrize() logic here.

        $prizes = Prize::all();

        $total_probability = $prizes-> sum('probability');

        $randomNumber = mt_rand(0, $total_probability*100)/100;

        $cumulativeProbability = 0;
        foreach($prizes as $prize){
            $cumulativeProbability += $prize->probability;
            
            if($randomNumber <= $cumulativeProbability){
                return $prize;
            }
        }

        return null;
    }
}
