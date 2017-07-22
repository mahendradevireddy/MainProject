<?php
    //open connection to mysql db
    $connection = mysqli_connect("127.0.0.1","root","","nikhil") or die("Error " . mysqli_error($connection));

    //fetch table rows from mysql db
    $sql = "select * from TABLE 3";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));

    //create an array
    $emparray = array();
    $count = mysqli_num_rows($result);
    $fp = fopen('empdata.json', 'w');
    fwrite($fp, "[");
    while($row =mysqli_fetch_assoc($result))
    {
        $count--;
        if($count!=0)
        {
            fwrite($fp,  "{\"name\":");
            fwrite($fp,  "\"".$row['name']."\",");
            fwrite($fp,  "\"value\":");
            fwrite($fp,  $row['value']);
            fwrite($fp,  "},");
        }
        else
        {
            fwrite($fp,  "{\"name\":");
            fwrite($fp,  "\"".$row['name']."\",");
            fwrite($fp,  "\"value\":");
            fwrite($fp,  $row['value']);
            fwrite($fp,  "}");
        }

    }
    fwrite($fp, "]");

    //close the db connection
    mysqli_close($connection);

    fclose($fp);
	shell_exec("chmod 777 -R *.*");
?>
