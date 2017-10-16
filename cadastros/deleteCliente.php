
<?php
include("../Class/Sql.php");

$idCliente = $_GET["idCliente"];

$sqldel = mysqli_query($conn,"CALL sp_users_delete($idCliente)");



    if ($sqldel){
        header('Location:../admin/users.php');
    }else{
        echo "erro";
    }








?>