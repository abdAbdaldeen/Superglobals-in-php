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
    <!-- 1 -->
    <!-- <form method="post">
        <input type="text" name="name">
        <input type="password" name="password">
        <input type="submit">
    </form> -->

    <!-- 3 -->
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <input require type="number" name="1N">
        <select id="O" name="O">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input require type="number" name="2N">
        <input type="submit" value="=">
    </form>
    <?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $FN = $_POST['1N'];
//     $SN = $_POST['2N'];
//     $O = $_POST['O'];
//     switch ($O) {
//         case '+':
//             echo $FN + $SN;
//             break;
//         case '-':
//             echo $FN - $SN;
//             break;
//         case '*':
//             echo $FN * $SN;
//             break;
//         case '/':
//             echo $FN / $SN;
//             break;
        
//         default:
//             echo "something want wrong";
//             break;
//     }
// }
// =====================
// 5
//Returns the filename of the currently executing script
echo "<br>";

// $arr =explode("/",$_SERVER['SCRIPT_NAME']);
// $c = count($arr);
// echo "project name: $arr[1]";
// echo "<br>";

// echo "script name: {$arr[$c-1]}";
// echo "<br>";
// ----------------
//6
// ----------------
// 7&8
if(isset($_SESSION['views'])){
   $_SESSION['views']++;
}else{
   $_SESSION['views'] = 1;
}
echo "Total page views = ". $_SESSION['views'];
// ----------------
// 9
if (!count($_COOKIE)) {
    echo "enable Cookies";
}

// setcookie("name", "value", time() + 7 * 24 * 60 * 60, "/");

echo "<pre>";
print_r($_COOKIE);
// unset($_COOKIE["name"]);
// setcookie("name", "", 0, "/");

//10
echo date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
?>


</body>

</html>