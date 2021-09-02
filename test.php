<?php

    $result = revertCharacters("Привет! Давно не виделись.");
    echo $result; // Тевирп! Онвад ен ьсиледив.
    
    function revertCharacters(string $str): string
    {
        $newStr = '';

        $strArray = explode(' ', $str);

        foreach ($strArray as $letter) {
            $strLen = mb_strlen($letter);
            $postFix = '';
            $upper = false;
            $newLetter = '';
    
            for ($i = $strLen; $i > 0; $i--) {
                $char = mb_substr($letter, $i - 1, 1, 'utf-8');

                if (mb_strtoupper($char) === $char && preg_match('/[Аа-Яя]/', $char) && $upper == false) {
                    $upper = true;
                    $char = mb_strtolower($char);
                }

                if (ctype_graph($char) && $postFix == '') {
                    $postFix = $char;
                    $char = '';
                }

                $newLetter .= $char;
            }
            
            if ($upper) {
              $newLetter = mb_strtoupper(mb_substr($newLetter, 0, 1, 'utf-8')) . mb_substr($newLetter, 1, mb_strlen($newLetter));
            }
            $newLetter .= $postFix . ' ';
            
            $newStr .= $newLetter;
        }

        return  $newStr;
    }
