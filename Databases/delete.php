<?php
$pdo = require 'db.php';
if (isset($_GET['id'])) {
$contactId = $_GET['id'];
$stmt = $pdo ->prepare('SELECT IMAGE FROM contacts WHERE id =:id');
$stmt -> execute([':id' =>$contactId]);
$contact = $stmt -> fetch(PDO::FETCH_ASSOC);
//this condition will delete the image if its EXISTS
if($contact && $contact['image']){
    $imagePath = 'uploads/' . $contact['image'];
    if(file_exists($imagePath)){
        unlink($imagePath); // this will delete the Image
}
$stmt = $pdo ->prepare('DELETE FROM contacts WHERE id = :id');
$stmt -> execute([':id' => $contactId]);
    echo "Contact Deleted";
}
}