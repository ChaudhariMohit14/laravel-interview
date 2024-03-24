<?php

namespace App;

class SimulationEngine{
    public function runSimulation($prizes, $participantsCount){
        $winners = [];

        for($i=0; $i<$participantsCount; $i++){
            $randomNumber = mt_rand()/mt_getrandmax();
            $cumulativeProbability = 0;

            foreach($prizes as $prize){
                $cumulativeProbability += $prize->probability;

                if($randomNumber <= $cumulativeProbability){
                    $winner = [
                        'participant_id' => $i+1,
                        'prize_id' => $prize->id,
                        'prize_title' => $prize->title
                    ];
                    $winners[] = $winner;
                    break;
                }
            }
        }

        return $winners;

    }
}
