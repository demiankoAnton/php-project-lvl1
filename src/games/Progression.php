<?php

namespace BrainGames\games\Progression;

use function BrainGames\gameEngine\run;

use const BrainGames\gameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;

function progressionGame()
{
    $progGameData = generateProgGameData();

    run(DESCRIPTION, $progGameData);
}

function generateProgGameData()
{
    for ($i = 0; $i < 3; $i++) {
        $currentQuestion = '';
        $progressionStart = rand(0, 99);
        $progressionStep = rand(1, 9);
        $calculatedElementPosition = rand(1, 10);

        for ($j = 0; $j < 10; $j++) {
            $currentProgressionElement = $progressionStart + $progressionStep * $j;

            if ($j == $calculatedElementPosition - 1) {
                $currentQuestion = "{$currentQuestion} ..";
                $correctAnswer = $currentProgressionElement;
                continue;
            }

            $currentQuestion = "{$currentQuestion} {$currentProgressionElement}";
        }

        $progGameData[] = [ltrim($currentQuestion), $correctAnswer];
    }

    return $progGameData;
}
