<?php
   
    try{
        $connection=new PDO("mysql:dbname=crudPhp;host=localhost","root","");
        $cmd=$connection->prepare("SELECT * FROM data WHERE id = :id");
        $cmd->bindValue(":id",3);
        $cmd->execute();
        $resultado=$cmd->fetch(PDO::FETCH_ASSOC);
        //echo $resultado['nome'];
        //  print_r($resultado);
    }catch(PDOException $e){
        echo 'falal error';
    }
?>