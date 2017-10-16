<?php

    include('../Class/Sql.php');

    $nomeCategoria = $_POST['NomeCategoria'];

    $query = mysqli_query($conn, "INSERT INTO Categoria (NomeCategoria) VALUES('$nomeCategoria')");

    if($query){
        header('Location: ../admin/categoria.php');
    }else{
        echo "Deu erro"; 
    }

?>