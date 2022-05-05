<?php
    require './db.php';
    $id=$_GET['id'];
    $message="";
    try{
        $cmd=$connection->prepare('DELETE FROM data WHERE id= :id');
        $cmd->bindValue(':id',$id);
        $cmd->execute();
        header("Location: ./index.php");
    }catch(PDOException $ex){
        $message="fatal error";
    }
 
?>
