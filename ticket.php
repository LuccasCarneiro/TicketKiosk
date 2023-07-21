<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Tickets</title>
    </head>
    <body>
        <center>
        <h1>
            TICKETS
        </h1>
        </center>

        <div>
            <form method="post">
                <input type="submit" name="gen_standardt" value="Standard">
            </form>
       
            <form method="post">
                <input type="submit" name="gen_preferentialt" value="Preferential">
            </form>
        </div>

        <?php
            include_once 'conn.php';
            include_once 'queries.php';
            include_once 'functions.php';

            if (isset($_POST['gen_standardt']))
            {
                $qwe = gen_std();
                echo $qwe;
                
            }
            
            //if (isset($_POST['gen_preferentialt']))
            //{
            //    get_pref();
            //}
        
        ?>

    </body>
</html>