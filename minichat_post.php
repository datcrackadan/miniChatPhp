<?php
    // Connect to database (not possible only once???)
    try {
        $database = new PDO('mysql:host=localhost;dbname=miniChat;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Error : '.$e->getMessage());
    }

    // Insert message into database with prepared request
    $request = $database->prepare('INSERT INTO miniChatMessages (pseudo, message) VALUES(?, ?)');
    $request->execute(array($_POST['pseudo'], $_POST['message']));

    // Redirect user to main page without them even knowing about this one
    header('Location: minichat.php');
?>
