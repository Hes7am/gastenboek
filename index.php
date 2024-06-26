<?php

session_start();
// Definieer het bestand waarin berichten worden opgeslagen
$messages_file = 'messages.json';

// Initialiseer een lege array voor berichten
$messages = [];
if (file_exists($messages_file)) {
    // Als het bestand bestaat
    $messages = json_decode(file_get_contents($messages_file), true);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<section>
  <header>
    <h1>Gastenboek</h1>
    <nav>
      <ul>
      <li class="home"><a href="comments.php">Home</a></li>
                <li><a href="index.php">Comments</a></li>
      </ul>
    </nav>

  </header>

  <div class="contentcomments">
    <div class="main">
    <?php
               /////////// Controleer of de variabele $messages niet leeg is////////////
if (!empty($messages)) {
              ///////// Itereer over elk bericht in de array $messages///////////
    foreach ($messages as $data) {
        echo "<div class='message'>";
        echo "<p><strong>" . htmlspecialchars($data['name']) . "</strong> - " . htmlspecialchars($data['date']) . "</p>";
        echo "<p>" . htmlspecialchars($data['message']) . "</p>";

            //////// Controleer of het bericht een afbeelding bevat//////////////
        if (!empty($data['image'])) {
                //////// Toon de afbeelding met de bijbehorende upload-URL//////////
            echo "<img src='uploads/{$data['image']}' alt=''>";
        }
        echo "</div>";
    }
}
?>


    </div>
  </div>
  <div class="info">



  </div>
  </div>
  </div>




  </div>

  <ul class="circles">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
  </ul>
</section>

</html>