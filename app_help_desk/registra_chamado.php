<?php

    session_start();    

    $titulo = str_replace("#", "-", $_POST["titulo"]);
    $categoria = str_replace("#", "-", $_POST["categoria"]);
    $descricao = str_replace("#", "-", $_POST["descricao"]);

    $texto = $_SESSION["id"] . "#" . $titulo . "#" . $categoria . "#" . $descricao . PHP_EOL;
    echo $texto;
    

    $file = fopen("arquivo.hd", "a");

    fwrite($file , $texto);
    fclose($file);

    header("Location: abrir_chamado.php");

?>