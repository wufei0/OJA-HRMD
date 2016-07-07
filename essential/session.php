<?php

//Check whether the session  is present or not
if (!isset($_SESSION['username']) )
{
    header("location: index.php");
    exit();
}


?>