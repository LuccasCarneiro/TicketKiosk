<body style="color:rgb(200, 200, 200); background-color:rgb(21, 30, 35)"><center>
<?php  

    date_default_timezone_set('America/Sao_Paulo');

    global $mysqli;

    $host = "localhost";
    $db = "tickets";
    $user = "root";
    $pass = "";
        
    $conn = new mysqli($host, $user, $pass, $db) or die ("not ok... :(");
    if ($conn -> connect_errno)
    {
        echo "わりぃ おれ4んだわ :: " . $conn -> connect_errno . " - " . $conn -> connect_error;
        echo "<br><br><br> ご迷惑をかけて申し訳ございません 🙇🏻‍♂️🙇🏻‍♀️";
    }

    else
    {
        //echo 'DBおｋ！';
    }
?>
</center>