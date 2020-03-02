<?php

namespace BrainGames\Games\EvenGame;

function evenGameGenerator(&$correctAnswer, &$expressionString)
{
    $expressionString = rand(0, 999);

    if ($expressionString % 2 == 0) {
        $correctAnswer = 'yes';
    } else {
        $correctAnswer = 'no';
    }

    return $expressionString;
}


function getEvenAnswer($answer, $correctAnswer)
{
    if ($answer == $correctAnswer) {
        return 1;
    }
}

function getEvenDescription()
{
    return 'Answer "yes" if the number is even, otherwise answer "no".' . PHP_EOL;
}
