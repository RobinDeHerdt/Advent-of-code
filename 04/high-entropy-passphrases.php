<?php

const ANAGRAM_CHECK = TRUE;
const DUPLICATE_CHECK = TRUE;

$dataset = file_get_contents('input/passphrases');

# Explode on EOL (End Of Line constant)
$phrases = explode(PHP_EOL, $dataset);

$count = 0;
foreach ($phrases as $phrase) {
  # Make sure no empty lines are included in the check.
  if (!$phrase) {
    continue;
  }

  if (passphrase_is_valid($phrase)) {
    $count++;
  }
}

echo "There are " . $count . " valid phrases. \n";

function passphrase_is_valid($phrase) {
  $words = explode(" ", $phrase);

  foreach ($words as $key => $word) {
    foreach($words as $dkey => $dword) {
      # Don't execute the check when we're on the current word.
      if ($key === $dkey) {
        continue;
      }

      if (ANAGRAM_CHECK) {
        # If the words are an anagran, the phrase is invalid.
        if (is_anagram($word, $dword)) {
          return FALSE;
        }
      }

      if (DUPLICATE_CHECK) {
        # If the words match, the phrase is invalid.
        if (is_duplicate($word, $dword)) {
          return FALSE;
        }
      }
    }
  }

  return TRUE;
}

function is_anagram($word, $dword)  {
  # Count_chars: counts the number of occurrences of every byte-value.
  if (count_chars($word, 1) === count_chars($dword, 1)) {
    return TRUE;
  }

  return FALSE;
}

function is_duplicate($word, $dword) {
  if ($word === $dword) {
    return TRUE;
  }

  return FALSE;
}
