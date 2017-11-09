
<?php
include("../Class/Sql.php");

$idCliente = $_GET["idCliente"];
$statusCli = NULL;

$sqlstat = mysqli_query($conn,"SELECT StatusCliente FROM cliente where codcliente = '$idCliente'");

foreach($sqlstat as $q){
    $statusCli = $q['StatusCliente'];
}

    try{
        if(strtoupper($statusCli) === 'ATIVO'){
            
            $sqlStatus = mysqli_query($conn, "UPDATE Cliente SET StatusCliente = 'INATIVO' WHERE CodCliente = '$idCliente'");
            
            //verificando se a query retornou true
            if($sqlStatus){ header("Location:../admin/index.php#!/users");}else{ echo 'Ocorreu um erro ao alterar o status do Cliente, consulte o desenvolvedor';}
            
            
        }else{
            
            $sqlStatus = mysqli_query($conn, "UPDATE Cliente SET StatusCliente = 'ATIVO' WHERE CodCliente = '$idCliente'");

            if($sqlStatus){ header("Location:../admin/index.php#!/users");}else{ echo 'Ocorreu um erro ao alterar o status do Cliente, consulte o desenvolvedor';}
            
        }
    }catch(Exception $e){
        print('Ocorreu um erro, consulte o desenvolvedor \n' . $e->getMessage());
    }
  


?>