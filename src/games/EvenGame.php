<?php

namespace BrainGames\Games\EvenGame;

use function BrainGames\GameEngine\run;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".' . PHP_EOL;

function evenGame()
{
    $gameResources = evenGameDataGenerator();

    run($gameResources);
}

function evenGameDataGenerator()
{
    $expressionString = rand(0, 999);

    if ($expressionString % 2 == 0) {
        $correctAnswer = 'yes';
    } else {
        $correctAnswer = 'no';
    }

    return [
        DESCRIPTION,
        $expressionString,
        $correctAnswer
    ];
}