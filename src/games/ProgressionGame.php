<?php

namespace BrainGames\Games\ProgressionGame;

use function BrainGames\GameEngine\run;

use const BrainGames\GameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'What number is missing in the progression?' . PHP_EOL;

function progressionGame()
{
    $gameResources = progressionGameGenerator();

    run(DESCRIPTION, $gameResources);
}

function progressionGameGenerator()
{
    $expressionStrings = [];
    $correctAnswers = [];

    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        $expressionString = '';
        $currentProgressionElement = rand(0, 99);
        $progressionStep = rand(1, 9);
        $calculatedElement = rand(1, 9);

        for ($j = 0; $j < 10; $j++) {
            if ($j == $calculatedElement - 1) {
                $expressionString .= ".. ";
                $correctAnswers[] = $currentProgressionElement;
                $currentProgressionElement += $progressionStep;
                continue;
            }

            $expressionString .= "{$currentProgressionElement} ";
            $currentProgressionElement += $progressionStep;
        }

        $expressionStrings[] = $expressionString;
    }

    return [
        $expressionStrings,
        $correctAnswers
    ];
}
