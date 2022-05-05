<?php
    require './db.php';
   $id=$_GET["id"];
    $message="";

    try{
        $cmd=$connection->prepare("SELECT * FROM data WHERE id = :id");
        $cmd->bindValue(":id",$id);
        $cmd->execute();
        $resultado=$cmd->fetch(PDO::FETCH_ASSOC);
       
    }catch(PDOException $e){
        $message="fatal error";
    }
    $nome=$resultado['nome'];
    $email=$resultado['email'];
    if(isset($_POST['name'],$_POST['email'])){
        $nome=$_POST['name'];
        $email=$_POST['email'];

        $sql='UPDATE data SET nome= :nome,email= :email WHERE id = :id ';
        $statement=$connection->prepare($sql);
        $statement->bindValue(":id",$id);
        $statement->bindValue(":nome",$nome);
        $statement->bindValue(":email",$email);
        $statement->execute();

        header("Location: ./index.php");
    }
 
?>
<?php require('./header.php'); ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Update peaple</h2>
            </div>
            <div class="card-body">
                <?php if(!empty($message)):?>
                    <div class="alert alert-success">
                        <?=$message?>
                    </div>
                <?php endif;?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" value="<?=$nome?>" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" value="<?=$email?>" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">update people</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require('./footer.php');?>
