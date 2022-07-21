<?php
    $resultadoCliente = $conn->prepare("SELECT * FROM clientes WHERE id= :id LIMIT 1");
    $resultadoCliente->bindParam(":id", $id);
    $resultadoCliente->execute();
    $linhaCliente = $resultadoCliente->fetch(PDO::FETCH_ASSOC);
    ?>