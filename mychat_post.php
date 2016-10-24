<?php
//connexion to database
try {
    $myBase = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'dehondtmatthieu', 'mD120989');
}
catch(Exception $error) {
    die('Error: '.$error->getMessage());
}

if ((isset($_POST['pseudo']) && isset($_POST['message'])) && (! empty($_POST['message']) && ! empty($_POST['pseudo']))) {

// insert message to database
$allTable = $myBase->prepare('INSERT INTO Minichat (pseudo, message) VALUES (?, ?)');
$allTable->execute(array($_POST['pseudo'], $_POST['message']));

//redirect to mychat.php
}
header('Location: http://localhost/exercice-php/mini-chat/mychat.php');

?>
