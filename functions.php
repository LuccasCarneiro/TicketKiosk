<?php
    include 'conn.php';
    include 'queries.php';

    function gen_stdt()
    {
        include 'conn.php';
        include 'queries.php';
        
        $last_stdvalue = get_last_stdt();
        $new_std = $last_stdvalue + 1;

        $gen_std_sql = "Insert Into tickets(id, value, type, time) 
                        Values ('', " . $new_std . ", 1, '" . $currenttime . "')";

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

    function reset_stdt()
    {
        include 'queries.php';
        include 'conn.php';
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

    function gen_preft()
    {
        include 'conn.php';
        include 'queries.php';
        
        $last_prefvalue = get_last_preft();
        $new_pref = $last_prefvalue + 1;

        $gen_pref_sql = "Insert Into tickets(id, value, type, time) 
                        Values ('', " . $new_pref . ", 2, '" . $currenttime . "')";

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
