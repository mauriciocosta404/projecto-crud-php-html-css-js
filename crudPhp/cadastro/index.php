<?php
require '../login/header.php';
require '../db.php';

if(isset($_POST['name'],$_POST['email'])){
    $nome=$_POST['name'];
    $email=$_POST['email'];

    $sql='INSERT INTO data(nome,email) VALUES(:nome, :email)';
    $statement=$connection->prepare($sql);
    $statement->bindValue(':nome',$nome);
    $statement->bindValue(':email',$email);
    $statement->execute();
    header("Location:../index.php");
}

?>
<div class="wrapper">
    <form action="" method="post" class="form-signin">
        <h2 class="form-signin-heading text-center">Sign up</h2>
        <input type="text" name="name" class="form-control" placeholder="informe o seu nome">
        <input type="email" name="email" id="" class="form-control" placeholder="informe o seu email">
        <input type="submit" class="btn btn-lg btn-primary btn-block" style=" background-color:  #0dcaf0;" value="Cadastrar">
    </form>
</div>

<?php require '../login/footer.php'; ?>