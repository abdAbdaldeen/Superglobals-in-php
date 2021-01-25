<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <input type="text" name="task">
        <input type="submit" value="ADD">
    </form>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION["Tasks"])) {
        array_push($_SESSION["Tasks"],$_POST["task"]);
    }else{
        $_SESSION["Tasks"] = array($_POST["task"]);
    }
}
if (isset($_SESSION["Tasks"])){
    foreach($_SESSION["Tasks"] as $k=> $task){
        echo "<div class='tesk'>$k | $task</div>";
    }
}
?>
</body>

</html>