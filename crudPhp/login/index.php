
<?php
    require './header.php';
    require '../db.php';
    $message="";
    
    $sql='SELECT * FROM data';
    $statement=$connection->prepare($sql);
    $statement->execute();
    $data=$statement->fetchAll(PDO::FETCH_OBJ);

    if(isset($_POST['name'],$_POST['email'])){
        $nome=$_POST['name'];
        $email=$_POST['email'];
        
        foreach($data as $row){
            if($row->nome==$nome && $row->email==$email){
                header("Location:../index.php");
            }else{
                $message="you have not account click here";
            }
        }
    }
    
?>


   <div class="wrapper">
       <form action="" method="post" class="form-signin">
            <h2 class="form-signin-heading text-center">Login Form</h2>

            <?php if(!empty($message)): ?>
                    <div onclick="cadastrar();" class=" alert alert-danger">
                        <?=$message?>
                    </div>
            <?php endif; ?>
            <input type="text" class="form-control"  name="name" placeholder="informe o seu nome"
            requied="" autofocus="">
            <input type="email" class="form-control" name="email" placeholder="informe o seu email"
            requied="" >
            <label for="checkbox">
                <input type="checkbox" class="checkbox" value="  remember-me" name="reMember-me" id="reMember-me">
                remember-me
            </label>
            <button class="btn btn-lg btn-primary btn-block" style=" background-color:  #0dcaf0;">Login</button>
       </form>
   </div>
   <script src="./script.js"></script>
<?php require './footer.php'; ?>