<?php 
session_start();
include "data.php";
unset($_SESSION["questionsID"]);
unset($_SESSION["currentQuestion"]);
unset($_SESSION["time"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/done.css">
</head>

<body>
    <div class="qNumCon">
        <?php 
        $numberOfTrue=0;
            $i=1;
            while ($i <= count($_SESSION["allAnswers"])){
                if ($_SESSION["allAnswers"][$i-1]) {
                    echo "<p class='true'>{$i}</p>";
                    $numberOfTrue++;
                }
                else echo "<p>{$i}</p>";
                $i++;
            }
echo"<h2>$numberOfTrue/".count($_SESSION["allAnswers"])."</h2>"
            ?>

    </div>
</body>

</html>