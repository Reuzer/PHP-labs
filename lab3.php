<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo("Ваше уравнение: 10 + x = 33<br>");
    for($x = 0; $x < 100; $x++){
        if(10 + $x == 33){
            echo("Корень уравнения: ");
            echo($x);
            break;
        }
    }
    ?>
</body>
</html>