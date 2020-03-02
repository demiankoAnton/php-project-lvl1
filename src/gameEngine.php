<?php

namespace BrainGames\GameEngine;

use function cli\line;
use function cli\prompt;

function run(string $game)
{
    switch ($game) {
        case 'calc':
            $gameGenerator = 'BrainGames\Games\CalcGame\calcGameGenerate';
            $gameAnswer = 'BrainGames\Games\CalcGame\getCalcAnswer';
            $gameDescription = 'BrainGames\Games\CalcGame\getCalcDescription';
            break;
        case 'even':
            $gameGenerator = 'BrainGames\Games\EvenGame\evenGameGenerator';
            $gameAnswer = 'BrainGames\Games\EvenGame\getEvenAnswer';
            $gameDescription = 'BrainGames\Games\EvenGame\getEvenDescription';
    }

    line($gameDescription());
    $name = prompt('May I have your name?');
    line("Hello, %s!" . PHP_EOL, $name);

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
