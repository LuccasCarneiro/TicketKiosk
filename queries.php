<?php
    include_once 'functions.php';
    include_once 'conn.php';

    $currenttime = date('Y-m-d H:i:s');
    
    //standard ticket querries

    $reset_std_sql = "Delete From tickets 
                   Where type = 1";
    
    $last_std_sql = "Select value 
                     From tickets 
                     Where type = 1 
                     Order by time desc
                     Limit 1";

    $select_newstd_sql = "Select id, value, type, status, time, calltime 
                       From tickets 
                       Where status = 1 
                       And type = 1";

    $first5_std_sql = "Select value 
                      From tickets 
                      Where type = 1 
                      Limit 5";

    //preferential ticket querries

    $reset_pref_sql = "Delete From tickets 
                   Where type = 2";
    
    $last_pref_sql = "Select value 
                      From tickets 
                      Where type = 2 
                      Order by time desc
                      Limit 1";

    $select_newpref_sql = "Select id, value, type, status, time, calltime 
                        From tickets 
                        Where status = 1 
                        And type = 2";

    $first5_pref_sql = "Select value 
                      From tickets 
                      Where type = 2 
                      Limit 5";


////////////////////////////////CALL NEXT////////////////////////////////

    $call_newstdt_id_sql = "Select id, value, type, status, time
                            From tickets
                            Where status = 1
                            And type = 1
                            Order by id asc
                            Limit 1";

    $sel_called_stdt_sql = "Select id, value
                            From tickets
                            Where status = 2
                            And type = 1
                            Order by id desc
                            Limit 1";

    $call_newpreft_id_sql = "Select id, value, type, status, time
                            From tickets
                            Where status = 1
                            And type = 2
                            Order by id asc
                            Limit 1";

    $sel_called_preft_sql = "Select id, value
                            From tickets
                            Where status = 2
                            And type = 2
                            Order by id desc
                            Limit 1";

                            
    $sel_called_ticket_sql = "Select id, value, type
                              From tickets
                              Where status = 2
                              Order by calltime desc
                              Limit 1";
    



    //$last_stdvalue = get_last_std();
    //$gen_std_sql = "Insert Into tickets(id, value, type, time) 
    //                Values ('', " . $invalue . ", 1, '" . $currenttime . "')";

    //$gen_pref_sql = "Insert Into tickets(id, value, type, time) 
    //                 Values ('','','2', " . $currenttime .")";

?>


