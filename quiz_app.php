<?php

$questions = [
    ['question' => 'What is 2x2?', 'correct' => '4'],
    ['question' => 'What is the capital of Bangladesh?', 'correct' => 'Dhaka'],
    ['question' => 'Who wrote Agnibina?', 'correct' => 'Kazi Nazrul Islam'],
];

echo "__________Quiz App__________";

while (true) {
    echo "\n1. Start Quiz\n2. Exit\n";
    $choice = (int) readline("Choose an option (1-2): ");

    if ($choice === 1) {
        startQuiz($questions);
    } elseif ($choice === 2) {
        break;
    } else {
        echo "\nInvalid option! Please choose an option from 1 to 2.\n";
    }
}

function startQuiz(array $questions): void
{
    $answers = showQuestions($questions);
    showResult($questions, $answers);
}

function showQuestions(array $questions): array
{
    $answers = [];

    echo PHP_EOL;

    foreach ($questions as $index => $question) {
        echo ($index + 1) . ". " . $question['question'] . "\n";
        $answers[] = trim(readline("Your answer: "));
    }

    return $answers;
}

function showResult(array $questions, array $answers): void
{
    $myScore = evaluateQuiz($questions, $answers);

    echo "\nYou scored {$myScore} out of " . count($questions) . ".\n";

    if ($myScore == count($questions)) {
        echo "Excellent job!\n";
    } elseif ($myScore >= 1) {
        echo "Good effort!\n";
    } else {
        echo "Your result is fail. Try later!\n";
    }
}

function evaluateQuiz(array $questions, array $answers): int
{
    $score = 0;

    foreach ($questions as $index => $question) {
        if ($question['correct'] === $answers[$index]) {
            $score++;
        }
    }

    return $score;
}