<?php

namespace BrainGames\games\Progression;

use function BrainGames\gameEngine\run;

use const BrainGames\gameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;

function progressionGame()
{
    $gameResources = progressionGameGenerator();

    run(DESCRIPTION, $gameResources);
}

function progressionGameGenerator()
{
    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        $currentExpression = '';
        $progressionStart = rand(0, 99);
        $progressionStep = rand(1, 9);
        $calculatedElement = rand(1, 9);

        for ($j = 0; $j < PROGRESSION_LENGTH; $j++) {
            $currentProgressionElement = $progressionStart + $progressionStep * $j;

            if ($j == $calculatedElement - 1) {
                $currentExpression = "{$currentExpression} ..";
                $correctAnswers = $currentProgressionElement;
                continue;
            }

            $currentExpression = "{$currentExpression} {$currentProgressionElement}";
        }

        $gameResources[] = [ltrim($currentExpression), $correctAnswers];
    }

    return $gameResources;
}
