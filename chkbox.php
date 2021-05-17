<?php
include("function.php");
connectme();
  if(isset($_POST['submit']))
  {
    $all_id = $_POST['copyBoxId'];
    $extract_id = implode(',' , $all_id);

    $query = "INSERT INTO deployment SELECT * FROM spesaccounts WHERE id IN($extract_id)";
    $runquery = mysql_query($query);
  }
  if($runquery)
  {
    header("Location: spesDeployment.php");
  }

?>