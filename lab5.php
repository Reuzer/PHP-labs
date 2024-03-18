<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" name= "start" id = 'start'>
        <button type = "submit" onclick="start.value = '(8+10)*tan(30)='">Вычислить</button><br>
    </form>
    <?php
        if(!empty($_POST["start"])){
            require('trigonomy.php');
            echo("<br>");
            echo (round(tang('echo((8+10)*tan(10));')));
        }
    ?>

</body>
</html>