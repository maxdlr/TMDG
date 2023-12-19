<?php

function generator(string $title, string $query, string $response): false|int
{
    $now = new DateTimeImmutable();
    $dateData = "## " . date_format($now, 'd-m-Y');

    $mainTitle = "# Test CirculApp" . PHP_EOL;
    $date = $now == new DateTimeImmutable() ? $dateData . PHP_EOL : null;

    $divider = file_exists('test.md') ? PHP_EOL : $mainTitle . PHP_EOL;

    if (file_exists('test.md') && $now == new DateTimeImmutable()) {
        $heading = null;
    } else if (file_exists('test.md')) {
        $heading = PHP_EOL;
    } else {
        $heading = $mainTitle . PHP_EOL;
    }

    $table = "| Test | Valeurs soumises | Résultat |" . PHP_EOL . "| ----------- | ----------- | ----------- |"  . PHP_EOL;
    $tableData = "| $title | $query | $response |"  . PHP_EOL;

    $data = $heading . $date . $table . $tableData;

    return file_put_contents('test.md', $data, FILE_APPEND);
}

generator(
    'Les admins peuvent créer des utilisateurs',
    'Admin créer un user',
    '200'
);