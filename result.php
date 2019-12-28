<?php 
    $name=$_POST['name'];
    $lastname=$_POST['lastname'];


    $person=array();
    $person['name']=$name;
    $person['lastname']=$lastname;
    //echo " สวัสดีครับ  $name $lastname";

    $json = json_encode($person);
    echo $json;
?>