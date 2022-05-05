<?php
    require('./db.php');
    $selectSql="SELECT * FROM data";

    $statement=$connection->prepare($selectSql);
    $statement->execute();
    $data=$statement->fetchAll(PDO::FETCH_OBJ);
?>
<?php require('./header.php');?>
   <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>all data</h2>
            </div>
            <div class="card-body"> 
                <table class="table table-bordered">
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>    
                    <?php foreach($data as $people):?>
                    <tr>
                        <td><?=$people->id?></td>
                        <td><?=$people->nome?></td>
                        <td><?=$people->email?></td>
                            <td>
                                <a href="edit.php?id=<?=$people->id?>"  class="btn btn-info">Edit</a>   
                                <a onclick="return confirm('are you sure you want to delete this people')"  href="delete.php?id=<?=$people->id?>" class="btn btn-danger">Delete</a>
                            </td>
                    </tr>
                    <?php endforeach;?>
                </table>
                
            </div>
        </div>
   </div>
<?php require('./footer.php'); ?>