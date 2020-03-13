<?php

namespace BrainGames\games\Even;

use function BrainGames\gameEngine\run;

use const BrainGames\gameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function evenGame()
{
    $gameResources = evenGameDataGenerator();

    run(DESCRIPTION, $gameResources);
}

function evenGameDataGenerator()
{
    $currentQuestions = [];
    $correctAnswers = [];

    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        $randNumber = rand(0, 999);
        $answer = isEven($randNumber) ? 'yes' : 'no';

        $currentQuestions[] = $randNumber;
        $correctAnswers[] = $answer;
    }

    return [
        $currentQuestions,
        $correctAnswers
    ];
}

function isEven(int $number)
{
    return $number % 2 == 0;
}