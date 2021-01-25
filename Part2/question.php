<?php 
include "data.php";
session_start();
$maxTime =20;
// ================
$questionsID=$_SESSION["questionsID"];
$question=$data[$questionsID[$_SESSION["currentQuestion"]]];
if (isset($_SESSION["setTime"])) {
    $_SESSION['time']=time()*1000 + 1000 * 60 * $maxTime;
    unset($_SESSION["setTime"]);
}
if (!isset($_SESSION["questionsID"])) {
    header("Location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/question.css">
</head>

<body>
    <div class="questionPage">
        <div class="question">
            <div class="heder">
                <?php echo "<p>Total Question - ".count($questionsID)."</p>";?>
                <p id="timer"></p>
                <?php echo "<p>Max Time - $maxTime Min</p>";?>
            </div>
            <form class="body" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <?php 
                echo "<p><b>Q - {$question['question']}</b></p>";
                foreach($question['answers'] as $k=> $answer){
                    echo '  <input type="radio" id="'.$k.'" name="answer" value="'.$k.'">
                    <label for="'.$k.'">'.$answer['answer'].'</label><br>';
                }
                if ($_SESSION["currentQuestion"]==count($questionsID)-1) {
                    echo '<input type="submit" value="Finish">';
                }else{
                    echo '<input type="submit" value="Next Question">';

                }
                ?>

            </form>
            <?php
            function setAnswers($x){
                    $_SESSION["allAnswers"][$_SESSION["currentQuestion"]]=$x;
            }
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $answerID = $_POST['answer'];
                    if (isset($question['answers'][$answerID]['isTrue'])) setAnswers(true);
                    else setAnswers(false);
                    if ($_SESSION["currentQuestion"]==count($questionsID)-1) {
                        header("Location:done.php");
                    }
                    else{
                        $_SESSION["currentQuestion"]++;
                        header("Location:question.php");
                    }
                }
            ?>
        </div>
        <div class="qNumCon">
            <?php 
            $i=1;
            while ($i <= count($questionsID)){
                if ($i-1 == $_SESSION["currentQuestion"]) echo "<p class='current'>{$i}</p>";
                else echo "<p>{$i}</p>";
                $i++;
            }
            ?>


        </div>
    </div>

    <!-- ======================== -->
    <script>
    </script>
    <?php 
    echo '
    <script>
            var countDownDate = '.$_SESSION['time'].';
    console.log(countDownDate)
    console.log(new Date().getTime())
            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
    
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
                document.getElementById("timer").innerHTML = hours + "h " +
                    minutes + "m " + seconds + "s ";
    
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("timer").innerHTML = "EXPIRED";
                }
            }, 1000);
            </script>
    ';
    ?>
</body>

</html>