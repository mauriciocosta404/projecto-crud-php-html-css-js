<?php
    require './db.php';
    $message="";
    if(isset($_POST['name']) && isset($_POST['email'])){
        $nome=$_POST['name'];
        $email=$_POST['email'];
        
        try{
            $sqlInsert="INSERT INTO data(nome,email) VALUES('$nome','$email')";
            $statement=$connection->prepare($sqlInsert);
            $statement->execute();
            $message="added successfully";
        }catch(PDOException $e){
            $message="fatal error";
        }

           
    }
?>

<?php require('./header.php'); ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Add peaple</h2>
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
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">name</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">add peaple</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require('./footer.php');?>
