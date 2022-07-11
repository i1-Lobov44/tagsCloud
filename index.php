<?php
require_once('func.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Облаго Тегов</title>

</head>
<body>

    <ul>
        <li><a href="1.php">1</a></li>
        <li><a href="2.php">2</a></li>
        <li><a href="3.php">3</a></li>
        <li><a href="4.php">4</a></li>
        <li><a href="5.php">5</a></li>
        <li><a href="6.php">6</a></li>
        <li><a href="7.php">7</a></li>
        <li><a href="8.php">8</a></li>
        <li><a href="9.php">9</a></li>
        <li><a href="10.php">10</a></li>
    </ul>

<div class="cloud" 
style="
        position: relative;
        width: 100vw;
        height: 70vh;
">
    <?php
    
    
    $countedArr = [];
    for($i = 0; $i <= 9; $i++)
    {
        $line = file(($i+1) . '.phpCount.txt');
        $countedArr[$i] = $line[0] == '' ? 0 : $line[0];
    }

    $maxViews = MaxViews($countedArr);
    $keyArr = Keywords();


        for($j = 0; $j < 10; $j++)
        {
            $fontSize = 15 + $countedArr[$j] * 100 / $maxViews;
            $transparency = 0.2 + $countedArr[$j] / $maxViews > 1 ? 1 : 0.5 + $countedArr[$j] / $maxViews;

            $rand = array_rand($keyArr[$j], 1);
        ?>
            <div class="tag" 
            style="
                position: absolute;
                font-size: <?= $fontSize > 64 ?  64 : $fontSize  ?>px;
                color: rgba(0,0,0,<?= $transparency ?>);
                top: <?=random_int(0, 700)?>;
                right: <?=random_int(0, 700)?>;
                bottom: <?=random_int(0, 700)?>;
                left: <?=random_int(0, 700)?>;
            ">
            <?= $keyArr[$j][$rand] ?>
            </div>
        <?php
        }
    ?>
</div>
</body>
</html>