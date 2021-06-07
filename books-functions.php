<?php
// le nom du fichier a lire
define("FILE_NAME", "books.json");

/*
 * Lecture du fichier json
 * et conversion et tableau associatif
 */
function getData()
{
// lecture du fichier
    $data = file_get_contents(FILE_NAME);
//conversion du contenu du fichier en tableau
    $booklist = json_decode($data, true);

    return $booklist;
}
/*
* suppression d'un livre
*/
function deleteOneById(array &$booklist, string $id){
    $booklist = array_filter($booklist, function ($item) use ($id) {
        return $item["id"] != $id;
    });
}
// Sauvegarder la liste dans le fichier json
function saveToJsonFile($booklist){
// Conversion du tableau $booklist en json
$booklistSerialized = json_encode($booklist);

// Ecriture du contenu dans le fichier json
file_put_contents(FILE_NAME, $booklistSerialized);

}

// Redirection vers un autre fichier
function redirectTo($target){
    header("location:$target");
    exit;
}
