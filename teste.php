<?php

    $query = mysqli_query($conn, " SELECT * FROM Encomenda a INNER JOIN Cliente b ON a.codcliente = b.codcliente;");
?>