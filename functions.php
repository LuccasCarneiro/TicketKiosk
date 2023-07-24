<?php
    include 'conn.php';
    include 'queries.php';



////////////////////////////////////////////////////USER SIDE FUNCTIONS///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    function gen_stdt()
    {
        include 'conn.php';
        include 'queries.php';
        
        $last_stdvalue = get_last_stdt();
        $new_std = $last_stdvalue + 1;

        $gen_std_sql = "Insert Into tickets(id, value, type, status, time) 
                        Values ('', " . $new_std . ", 1, 1, '" . $currenttime . "')";

        $result = $conn -> query($gen_std_sql);
        if($result)
        {
            return $new_std;
        }
        else
        {
            return 'not ok';
        }
    }


    function gen_preft()
    {
        include 'conn.php';
        include 'queries.php';
        
        $last_prefvalue = get_last_preft();
        $new_pref = $last_prefvalue + 1;

        $gen_pref_sql = "Insert Into tickets(id, value, type, status, time) 
                        Values ('', " . $new_pref . ", 2, 1, '" . $currenttime . "')";

        $result = $conn -> query($gen_pref_sql);
        if($result)
        {
            return $new_pref;
        }
        else
        {
            return 'not ok';
        }
    }


//////////////////////////////////////////////////////MANAGER SIDE FUNCTIONS/////////////////////////////////////////////////////////////////////////////////////////////////////////

                                    ////////////////CALL FUNCTION//////////////////STANDARD

    function call_newstdt_id()
    {
        include 'conn.php';
        include 'queries.php';

        $result = $conn -> query($call_newstdt_id_sql);
        if($result)
        {            
            while ($row = $result -> fetch_assoc())
            {
                return $row['id'];
            }
        }
        else
        {
            return 'No ' . $conn -> error;
        }
    }

    function update_calledstdt()
    {
        include 'conn.php';
        include 'queries.php';
        
        $newstdt_id = call_newstdt_id();

        $update_stdt_sql = "Update tickets 
                            Set status = 2, calltime = '" . $currenttime = date('Y-m-d H:i:s') . "'  
                            Where type = 1
                            And id = " . $newstdt_id;

        $result = $conn -> query($update_stdt_sql);
        
        if($result)
        {
            $result = $conn -> query($sel_called_stdt_sql);
            if($result)
            {
                while ($row = $result -> fetch_assoc())
                {
                    return $row['id'];
                }
            }
            else
            {
                return 'Error: ' . $conn -> error;
            }
        }
        else
        {
            return "Error: " . $conn -> error;
        }
    

    }
    
    function sel_calledstdt()
    {
        include 'conn.php';
        include 'queries.php';
        
        $result = $conn -> query($sel_called_stdt_sql);

        if($result)
        {
            while ($row = $result -> fetch_assoc())
            {
                return 'S' . $row['value'];
            }
        }
    }

    ////////////////CALL FUNCTION//////////////////PREFERENTIAL

    function call_newpreft_id()
    {
        include 'conn.php';
        include 'queries.php';

        $result = $conn -> query($call_newpreft_id_sql);
        if($result)
        {            
            while ($row = $result -> fetch_assoc())
            {
                return $row['id'];
            }
        }
        else
        {
            return 'No ' . $conn -> error;
        }
    }

    function update_calledpreft()
    {
        include 'conn.php';
        include 'queries.php';
        
        $newpreft_id = call_newpreft_id();

        $update_preft_sql = "Update tickets 
                             Set status = 2, calltime = '" . $currenttime = date('Y-m-d H:i:s') . "'  
                             Where type = 2
                             And id = " . $newpreft_id;

        $result = $conn -> query($update_preft_sql);
        
        if($result)
        {
            $result = $conn -> query($sel_called_preft_sql);
            if($result)
            {
                while ($row = $result -> fetch_assoc())
                {
                    return $row['id'];
                }
            }
            else
            {
                return 'Error: ' . $conn -> error;
            }
        }
        else
        {
            return "Error: " . $conn -> error;
        }
    

    }
    
    function sel_calledpreft()
    {
        include 'conn.php';
        include 'queries.php';
        
        $result = $conn -> query($sel_called_preft_sql);

        if($result)
        {
            while ($row = $result -> fetch_assoc())
            {
                return 'P' . $row['value'];
            }
        }
    }

    ////////////////CALL FUNCTION//////////////////GENERAL

    function select_called_ticket()
    {
        include 'conn.php';
        include 'queries.php';

        $result = $conn -> query($sel_called_ticket_sql);

        if($result)
        {
            while ($row = $result -> fetch_assoc())
            {
                if($row['type'] == 1)
                {
                    return 'S' . $row['value'];
                }
                else
                {
                    return 'P' . $row['value'];
                }
            }
        }
    }

                  ////////////////////////////////RESET POOL FUNCTION/////////////////////////////

    function reset_stdt()
    {
        include 'conn.php';
        include 'queries.php';
        $result = $conn -> query($reset_std_sql);
        if($result)
        {
            return 'Standard Ticket pool reset. 一位獲得！';
        }
        else
        {
            return '): - ' . $conn -> error;
        }
    }

    function reset_preft()
    {
        include 'queries.php';
        include 'conn.php';
        $result = $conn -> query($reset_pref_sql);
        if($result)
        {
            return 'Preferential Ticket pool reset. 一位獲得！';
        }
        else
        {
            return '): - ' . $conn -> error;
        }
    }





//////////////////////////////////////////////////////AUXILIARY FUNCTIONS/////////////////////////////////////////////////////////////////////////////////////////////////////////

    function get_last_stdt()
    {
        include 'conn.php';
        include 'queries.php';
        $result = $conn -> query($last_std_sql);

        if ($result -> num_rows > 0)
        {
            while ($row = $result -> fetch_assoc())
            {
                return $last_stdticket = $row['value'];
            }
        }
        else
        {
            return $last_stdticket = 0;
        }
    }

    function stdt_exhibit()
    {
        return $stdt_exhibit = 'S' . get_last_stdt();
    }

    function get_first5_stdt()
    {
        include 'conn.php';
        include 'queries.php';
        $result = $conn -> query($first5_std_sql);

        if ($result -> num_rows > 0)
        {
            while ($row = $result -> fetch_assoc())
            {
                return $first5_stdticket = $row['value'];
            }
        }
        else
        {
            return $first5_stdticket = 0;
        }
    }


    function get_last_preft()
    {
        include 'conn.php';
        include 'queries.php';
        $result = $conn -> query($last_pref_sql);

        if ($result -> num_rows > 0)
        {
            while ($row = $result -> fetch_assoc())
            {
                return $last_prefticket = $row['value'];
            }
        }
        else
        {
            return $last_prefticket = 0;
        }
    }

    function preft_exhibit()
    {
        return $preft_exhibit = 'P' . get_last_preft();
    }

    function get_first5_preft()
    {
        include 'conn.php';
        include 'queries.php';
        $result = $conn -> query($first5_pref_sql);

        if ($result -> num_rows > 0)
        {
            while ($row = $result -> fetch_assoc())
            {
                return $first5_prefticket = $row['value'];
            }
        }
        else
        {
            return $first5_prefticket = 0;
        }
    }

    


            






    
    //function randonT()
    //{
    //    return rand(0, 999);
    //}
    //function randonP()
    //{
    //   return rand(0, 999);
    //}
    //function testfunc()
    //{
    //    echo 'it works!';
    //}
?>
