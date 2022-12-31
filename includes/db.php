<?php 
$connection = mysqli_connect('localhost','root','','cms-new');

if(!$connection){
    echo "we are connnect Data Base successfully!!  khanjavid";
}else{
    echo " database connected done !!";
}
?>