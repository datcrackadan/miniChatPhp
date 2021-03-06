<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=m, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>SchizoChat</title>
</head>
<body>
    <form action="minichat_post.php" method="post">
        <p>
            <label for="pseudo">Pseudo : </label><input type="text" name="pseudo" id="pseudo"><br>
            <label for="message">Message : </label><input type="text" name="message" id="message"><br>
            <input type="submit" value="Send">
        </p>
    </form>

    <?php
        // Connecting to database
        try {
            $database = new PDO('mysql:host=localhost;dbname=miniChat;charset=utf8', 'root', '');
            // echo "Connected";
        } catch (Exception $e) {
            die('Error : '.$e->getMessage());
        }

        // Grab 10 last messages from database
        $response = $database->query('SELECT pseudo, message FROM miniChatMessages ORDER BY ID DESC LIMIT 0,10');

        // Display messages while avoiding HTML or JS insertions thanks to htmlspecialchars
        while ($data = $response->fetch()) {
            echo "<p><strong>" . htmlspecialchars($data["pseudo"]) . "</strong> : " . htmlspecialchars($data["message"]) . "</p>";
        }
        $response->closeCursor();
    ?>









</body>
</html>
