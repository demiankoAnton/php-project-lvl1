<?php

namespace BrainGames\Games\ProgressionGame;

const DESCRIPTION = 'What number is missing in the progression?' . PHP_EOL;

function progressionGame()
{
    $currentProgressionElement = rand(0, 99);
    $progressionStep = rand(1, 9);
    $calculatedElement = rand(1, 9);
    $expressionString = '';
    $correctAnswer = 0;

    for ($i = 0; $i < 10; $i++) {
        if ($i == $calculatedElement - 1) {
            $expressionString .= ".. ";
            $correctAnswer = $currentProgressionElement;
            $currentProgressionElement += $progressionStep;
            continue;
        }

        $expressionString .= "{$currentProgressionElement} ";
        $currentProgressionElement += $progressionStep;
    }

    return [
        DESCRIPTION,
        $expressionString,
        $correctAnswer
    ];
}

