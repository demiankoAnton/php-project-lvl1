<?php

namespace BrainGames\Games\EvenGame;

use function cli\line;
use function cli\prompt;

function evenGenerator(&$correctAnswer, &$expressionString)
{
    $expressionString = rand(0, 999);

    if ($expressionString % 2 == 0) {
        $correctAnswer = 'yes';
    } else {
        $correctAnswer = 'no';
    }

    return $expressionString;
}


function evenAnswer($answer, $correctAnswer)
{
    if ($answer == $correctAnswer) {
        return 1;
    }

    return 0;
}