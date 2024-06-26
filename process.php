<?php
session_start();

function canPostMessage() {
      /////////// Als de tijd van het laatste verzonden bericht niet is ingesteld, kan de gebruiker posten///////////
    if (!isset($_SESSION['last_message_time'])) {
        return true; 
    }
        ////////// Bereken de verstreken tijd sinds het laatste verzonden bericht////////////
    $last_message_time = $_SESSION['last_message_time'];
    $current_time = time();
    $elapsed_time = $current_time - $last_message_time;

    return $elapsed_time >= (24 * 60 * 60);
}
       //////////Controleert of er een afbeeldingsbestand bestaat////////////////////
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    if (!canPostMessage()) {
        echo "<script>alert('Je kunt slechts elke 24 uur een bericht Sturen.');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
        exit();
    }
    $name = htmlspecialchars($_POST['name']);
    $message = htmlspecialchars($_POST['message']);
    $filename = null;

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image'];
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $max_size = 5 * 1024 * 1024; 
        if (in_array($image['type'], $allowed_types) && $image['size'] <= $max_size) {
            ////////////// Generate a unique filename to prevent overwriting///////////////
            $filename = uniqid() . '_' . $image['name'];

            move_uploaded_file($image['tmp_name'], 'uploads/' . $filename);
        } else {
            header("Location: index.php?error=Invalid file. Upload een JPEG-, PNG- of GIF-bestand (max. grootte 5 MB).");
            exit();
        }
    }
       ///////////////// Save new data to the array///////////////
    $entry = [
        'name' => $name,
        'date' => date('Y-m-d H:i:s'),
        'message' => $message,
        'image' => $filename
    ];

    $messages_file = 'messages.json';
    $messages = [];

    if (file_exists($messages_file)) {
        $messages = json_decode(file_get_contents($messages_file), true);
    }

    $messages[] = $entry;

    file_put_contents($messages_file, json_encode($messages, JSON_PRETTY_PRINT));

    $_SESSION['last_message_time'] = time(); 

    header("Location: index.php");
    exit();
} 
?>
