<?php

$dataset = file_get_contents('instructions/instructions');

# Explode on EOL (End Of Line constant)
$lines = explode(PHP_EOL, $dataset);
$arr = [];
foreach ($lines as $line) {
    if (!strlen($line)) {
      continue;
    }

    $arr[] = (int)$line;
}

$steps = 0;
$pointer = 0;
while ($pointer >= 0 && $pointer < count($arr)) {
    $val = $arr[$pointer];
    $arr[$pointer]++;
    $pointer += $val;

    $steps++;
}

echo $steps . "\n";
