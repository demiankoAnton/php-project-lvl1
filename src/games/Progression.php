<?php

namespace BrainGames\games\Progression;

use function BrainGames\gameEngine\run;

use const BrainGames\gameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;

function progressionGame()
{
    $progGameData = generateGameData();

    run(DESCRIPTION, $progGameData);
}

function generateGameData()
{
    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        $question = '';
        $progressionStart = rand(0, 99);
        $progressionStep = rand(1, 9);
        $calculatedElementPosition = rand(1, PROGRESSION_LENGTH);

        for ($j = 0; $j < PROGRESSION_LENGTH; $j++) {
            $currentProgressionElement = $progressionStart + $progressionStep * $j;

            if ($j == $calculatedElementPosition - 1) {
                $question = "{$question} ..";
                $correctAnswer = $currentProgressionElement;
                continue;
            }

            $question = "{$question} {$currentProgressionElement}";
        }

        $gameData[] = [ltrim($question), $correctAnswer];
    }

    return $gameData;
}
