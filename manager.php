<!DOCTYPE html>
<html lang="pt-br">
    <head>                                                              <?php header("Refresh:30"); ?>
        <title>MANAGER</title>

        <style>
            
            .form-container
            {
                display: flex;
            }
            
            .form-container form
            {
                margin-right: 10px;
            }
            
            .form-container form:last-child
            {
                margin-right: 0;
            }

            table
            {
                border-collapse: collapse;
                width: 100%;
            }
            th, td
            {
                text-align: center;
                border: 1px solid gray;
                padding: 8px;
            }
        </style>

    </head>
    <body>
        <center>
        <h1>
            MANAGER
        </h1>
        </center>

        <table>
            <thead>
                <tr>
                    <th>Standard</th>
                    <th>Preferential</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>
                        <!-- Standard Tickets Form -->
                        <div class = "form-container">
                            
                            <form method="post">
                                <input type="submit" name="call_standardt" value="Call Standard">
                            </form>

                            <!--<form method="post">
                                <input type="submit" name="first5_standardt" value="First 5 Standard">
                            </form>-->

                            <form method="post">
                                <input type="submit" name="reset_stdt" value="Reset Standard">
                            </form>
                        </div>
                    </td>
                    <td>
                        <!-- Preferetial Tickets Form -->
                        <div class = "form-container">

                            <form method="post">
                                <input type="submit" name="call_preferentialt" value="Call Preferential">
                            </form>
                            
                            <!--<form method="post">
                                <input type="submit" name="first5_preferentialt" value="First 5 Preferential">
                            </form>-->
                            
                            <form method="post">
                                <input type="submit" name="reset_preft" value="Reset Preferential">
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                      
                        <?php
                            include_once 'conn.php';
                            include_once 'queries.php';
                            include_once 'functions.php';


                            //Standard Tickets

                            if (isset($_POST['call_standardt']))
                            {
                                update_calledstdt();
                                echo sel_calledstdt();
                            }
                        
                            //if (isset($_POST['first5_standardt']))
                            //{
                            //    echo "first 5 Standard Tickets: S" . $first5_stdt = get_first5_stdt();
                            //}

                            if (isset($_POST['reset_stdt']))
                            {
                                //reset_stdt();
                                echo reset_stdt();
                            }

                            if (empty($_POST['first5_standardt']) && empty($_POST['last_standardt']) && empty($_POST['reset_stdt']))
                            {
                                $last_stdt = stdt_exhibit();
                                if($last_stdt == 0)
                                {
                                    echo "Be the first one!";
                                }
                                else
                                {
                                    echo "Previous Standard Ticket: " . $last_stdt;
                                }
                            }
                        
                        ?>
                    </td>
                    <td>

                        <?php
                            //Preferential Tickets

                            if (isset($_POST['call_preferentialt']))
                            {
                                update_calledpreft();
                                echo sel_calledpreft();
                            }

                            //if (isset($_POST['first5_preferentialt']))
                            //{
                            //    echo "first 5 preferential Tickets: P" . $first5_preft = get_first5_preft();
                            //}

                            if (isset($_POST['reset_preft']))
                            {
                                //reset_preft();
                                echo reset_preft();
                            }

                            if (empty($_POST['first5_preferentialt']) && empty($_POST['last_preferentialt']) && empty($_POST['reset_preft']))
                            {
                                $last_preft = preft_exhibit();
                                if($last_preft == 0)
                                {
                                    echo "Be the first one!";
                                }
                                else
                                {
                                    echo "Previous preferential Ticket: " . $last_preft;
                                }
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                            $result = $conn -> query($select_newstd_sql);

                            if($result)
                            {
                                while ($row = $result -> fetch_assoc())
                                {
                                    echo "ID: " . $row['id'] .
                                    " - - - Ticket: S" . $row['value'] . 
                                    " - - - Type: " . $row['type'] . 
                                    " - - - Status: " . $row['status'] . 
                                    " - - - Time: " . $row['time'] . 
                                    " - - - Call Time: " . $row['calltime']. "<br>";
                                }
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            $result = $conn -> query($select_newpref_sql);

                            if($result)
                            {
                                while ($row = $result -> fetch_assoc())
                                {
                                    echo "ID: " . $row['id'] .
                                    " - - - Ticket: S" . $row['value'] . 
                                    " - - - Type: " . $row['type'] . 
                                    " - - - Status: " . $row['status'] . 
                                    " - - - Time: " . $row['time'] . 
                                    " - - - Call Time: " . $row['calltime']. "<br>";
                                }
                            }
                        ?>
                    </td>
                </tr>
            </table>
    </body>
</html>