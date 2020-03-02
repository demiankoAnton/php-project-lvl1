<?php

namespace BrainGames\GameEngine;

use function cli\line;
use function cli\prompt;

function run(string $game)
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    switch ($game) {
        case 'calc':
            $gameGenerator = 'BrainGames\Games\CalcGame\calcGenerate';
            $gameAnswer = 'BrainGames\Games\CalcGame\calcAnswer';
            break;
        case 'even':
            $gameGenerator = 'BrainGames\Games\EvenGame\evenGenerator';
            $gameAnswer = 'BrainGames\Games\EvenGame\evenAnswer';
    }

    for ($i = 0; $i < 3; $i++) {
        $expressionString = '';
        $correctAnswer = 0;

        line('Question: ' . $gameGenerator($correctAnswer, $expressionString));
        $answer = prompt('Your answer: ');
        $result = $gameAnswer($answer, $correctAnswer);

        if ($result == 1) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'");
            die;
        }
    }
    line("Congratulations, {$name}!");
}
