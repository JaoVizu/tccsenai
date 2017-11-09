<?php

    include('../Class/Sql.php');

    $nomeCategoria = $_POST['NomeCategoria'];

    $query = mysqli_query($conn, "INSERT INTO Categoria (NomeCategoria) VALUES('$nomeCategoria')");

    if($query){
        header('Location: ../admin/index.php#!/categoria');
    }else{
        echo "Deu erro"; 
    }

?>