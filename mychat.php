<!doctype html>
<html>
  <head>
    <title></title>
    <meta charset="utf-8" />
  </head>
  <body>


    <h1>MyChat , new chat website ! </h1>
    <form action="mychat_post.php" method="post">
      <label for="pseudo">Pseudo: </label><input type="text" name="pseudo" id="pseudo"/><br/>
      <label for="message">Message: </label><input type="text" name="message" id="message"/>
      <input type="submit" value="envoyer">
    </form>

    <?php
    // php part (print the message from the database)
    try {
	$myBase = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8',);
    }
    catch (Exception $error) {
	die('Erreur: '.$error->getMessage());
    }


    // get 10 last messages
    $allTable = $myBase->query('SELECT pseudo, message FROM Minichat ORDER BY id DESC LIMIT 0, 10');

    //print the messages
    while ($row = $allTable->fetch()) {
	echo '<p><bold>'.htmlspecialchars($row['pseudo']).'</bold>: '.htmlspecialchars($row['message']).'</p>';
    }
    $allTable->closeCursor();
    ?>
  </body>
</html>
