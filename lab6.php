<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $string = "aaab";
        $pattern = '/(?<=a{3})b/';
        $result = preg_replace($pattern, '!', $string);
        echo $result . "<br>"; // Вывод: !b

        $string = 'aa aba abba abbba abbbba abbbbba';
        $pattern = '/\b(?:a(?:b{5,}))a\b/';
        preg_match_all($pattern, $string, $matches);
        print_r($matches[0]);
        echo("<br>");

        $string = 'aba aca aea abba adca abea';
        $pattern = '/\b(?:abba|abea)\b/';
        preg_match_all($pattern, $string, $matches);
        print_r($matches[0]);
        echo("<br>");

        $string = 'aae xxz 33a';
        $pattern = '/(.)\1/';
        $result = preg_replace($pattern, '!', $string);
        echo $result . "\n";
    ?>
</body>
</html>