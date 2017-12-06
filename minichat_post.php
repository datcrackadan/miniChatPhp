<?php
    try {
        $database = new PDO('mysql:host=localhost;dbname=miniChat;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Error : '.$e->getMessage());
    }


    $request = $database->prepare('INSERT INTO miniChatMessages (pseudo, message) VALUES(?, ?)');
    $request->execute(array($_POST['pseudo'], $_POST['message']));


    header('Location: minichat.php');
?>
