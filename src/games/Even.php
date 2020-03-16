<?php

namespace BrainGames\games\Even;

use function BrainGames\gameEngine\run;

use const BrainGames\gameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function evenGame()
{
    $evenGameData = generateEvenGameData();

    run(DESCRIPTION, $evenGameData);
}

function generateEvenGameData()
{
    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        $randNumber = rand(0, 999);
        $correctAnswer = isEven($randNumber) ? 'yes' : 'no';
        $evenGameData[] = [$randNumber, $correctAnswer];
    }

    return $evenGameData;
}

function isEven(int $number)
{
    return $number % 2 == 0;
}
