<?php

namespace BrainGames\Games\EvenGame;

use function BrainGames\GameEngine\run;

use const BrainGames\GameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".' . PHP_EOL;

function evenGame()
{
    $gameResources = evenGameDataGenerator();

    run(DESCRIPTION, $gameResources);
}

function evenGameDataGenerator()
{
    $expressionStrings = [];
    $correctAnswers = [];

    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        $expressionStrings[] = rand(0, 999);

        if ($expressionStrings[$i] % 2 == 0) {
            $correctAnswers[] = 'yes';
        } else {
            $correctAnswers[] = 'no';
        }
    }

    return [
        $expressionStrings,
        $correctAnswers
    ];
}
