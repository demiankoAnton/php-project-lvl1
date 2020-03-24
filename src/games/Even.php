<?php

namespace BrainGames\games\Even;

use function BrainGames\gameEngine\run;

use const BrainGames\gameConfig\GAMES_TO_WIN;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function evenGame()
{
    $gameData = generateGameData();

    run(DESCRIPTION, $gameData);
}

function generateGameData()
{
    for ($i = 0; $i < GAMES_TO_WIN; $i++) {
        $question = rand(0, 999);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        $gameData[] = [$question, $correctAnswer];
    }

    return $gameData;
}

function isEven(int $number)
{
    return $number % 2 == 0;
}
