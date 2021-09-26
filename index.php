<?php

require_once "vendor/autoload.php";

use App\ChatMessage;
use App\Chat;

if (isset($_POST['submit'])) {
    new ChatMessage($_POST['name'], $_POST['nickname'], $_POST['chat']);
    header("Refresh:0");
}
$chat = new Chat("app/chat.csv");
$messages = $chat->getMessages();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Daniels Chat</title>
</head>
<body>
<table class="table . w-auto">
    <tbody>
    <?php foreach ($messages as $message): ?>
        <tr>
            <th scope="row"><?php echo "{$message[0]} ({$message[1]})" ; ?></th>
            <td style="word-wrap: break-word;min-width: 300px;max-width: 300px;"><?php echo $message[2]; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>

<form method="post">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="nickname">Nickname:</label><br>
    <input type="text" id="nickname" name="nickname"><br>
    <label for="chat"></label><br>
    <input type="text" id="chat" name="chat" placeholder="Send a message"/>
    <input type="submit" name="submit" value="Chat">
</form>