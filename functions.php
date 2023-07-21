<?php

    include 'queries.php';


    function get_last_std()
    {
        include 'conn.php';
        include 'queries.php';
        $result = $conn -> query($last_std_sql);

        if ($result -> num_rows > 0)
        {
            while ($row = $result -> fetch_assoc())
            {
                $last_stdticket = $row['value'];
            }
        }
        else
        {
            $last_stdticket = 'ノーコメント';
        }
        return $last_stdticket;
    }

    function gen_std()
    {
        include 'conn.php';
        include 'queries.php';
        
        $last_stdvalue = get_last_std();

        $new_std = $last_stdvalue + 1;

        return $new_std;

        $result = $conn -> query($gen_std_sql);
//
        //if ($result -> num_rows > 0)
        //{
        //    while ($row = $result -> fetch_assoc())
        //    {
        //        $last_stdvalue = $row['value'];
        //    }
        //}
    }



    function gen_pref()
    {
        echo '';
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
