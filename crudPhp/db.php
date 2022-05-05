<?php
   
    try{
        $connection=new PDO("mysql:dbname=crudPhp;host=localhost","root","");
     
    }catch(PDOException $e){
        echo 'falal error';
    }
?>