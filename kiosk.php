<!DOCTYPE html>
<html lang="pt-br">
    <head>                                                                                                      <?php header("Refresh:4"); ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>KIOSK</title>
        <style>
        .square-box
        {
            width: 600px;
            height: 200px;
            color:black;
            background-color: #7777ff;
            border: 1px solid black;
            text-align: center;
            line-height: 100px;
        }

        p
        {
            font-size: 40px;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
        }

        </style>
    </head>
    <body style="color:rgb(200, 200, 200); background-color:rgb(21, 30, 35)">
        <center>
            <?php
                include_once 'conn.php';
                include_once 'queries.php';
                include_once 'functions.php';


                $ticket = select_called_ticket();

                $checkchange = "Select value 
                                From checkchange";
                
                $result = $conn -> query($checkchange);
                while ($row = $result -> fetch_assoc())
                {
                    $prevticket = $row['value'];
                }

                if ($prevticket == $ticket)
                {
                    //nada
                }
                else
                {
                    if($ticket == null)
                    {
                        //echo '<script type="text/javascript">
                        //        function playNotificationSound()
                        //        {
                        //            var audio = new Audio("./src/mario.mp3");
                        //            audio.play();
                        //        }
                        //        window.onload = function()
                        //        {
                        //            playNotificationSound();
                        //        };
                        //        </script>';
                                
                                
                        $updatechange = "Update checkchange
                        Set value = '" . $ticket . "' 
                        Where id = 1";
                        $result = $conn -> query($updatechange);
                    }
                    else
                    {
                        echo '<script type="text/javascript">
                                function playNotificationSound()
                                {
                                    var audio = new Audio("./src/tune.wav");
                                    audio.play();
                                }
                                window.onload = function()
                                {
                                    playNotificationSound();
                                };
                                </script>';


                        $updatechange = "Update checkchange
                        Set value = '" . $ticket . "' 
                        Where id = 1";
                        $result = $conn -> query($updatechange);
                    }
                }

                if($ticket == null)
                {
                    $text = "Aguarde";
                }
                else
                {
                    $text = "Senha: " . $ticket;
                }
            ?>
            </br></br></br></br></br></br></br></br></br>
            <div class="square-box"><p><?php echo $text; ?></p></div>
 
        </center>
    </body>
</html>