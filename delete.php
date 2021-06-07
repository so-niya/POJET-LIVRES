<?php
// inclusion de la bibliothèque des fonctions books
require "books-functions.php";
// Récupération du paramètre id
$id = filter_input(INPUT_GET, "id");

// Récupération la liste des livres

$booklist = getData();

// filtrer la liste des livres
// pour ne conserver que ceux dont l'id est différent
// du paramètre
deleteOneById($booklist, $id);


saveToJsonFile($booklist);

// Redirection vers index.php
redirectTo("index.php");
