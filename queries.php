<?php
    include_once 'functions.php';

    $currenttime = date('Y-m-d H:i:s');
    
    $last_std_sql = "Select value 
                 From tickets 
                 Where type = 1 
                 Order by time desc
                 Limit 1";
    
    $last_pref_sql = "Select value 
                  From tickets 
                  Where type = 2 
                  Order by time desc
                  Limit 1";

    //$last_stdvalue = get_last_std();
    //$gen_std_sql = "Insert Into tickets(id, value, type, time) 
    //                Values ('', " . $last_stdvalue . ", 1, '')";

    $gen_pref_sql = "Insert Into tickets(id, value, type, time) 
                     Values ('','','2', " . $currenttime .")";

?>


