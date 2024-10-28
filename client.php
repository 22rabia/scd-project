<?php
session_start();

// Check if the session variable for messages exists
if (!isset($_SESSION['chatMessages'])) {
    $_SESSION['chatMessages'] = array();
}

if (isset($_POST['btnSend'])) {
    $host = "127.0.0.1";
    $port = 20205;

    $msg = $_POST['txtMessage'];

    $sock = socket_create(AF_INET, SOCK_STREAM, 0);
    socket_connect($sock, $host, $port);

    socket_write($sock, $msg, strlen($msg));

    $reply = socket_read($sock, 1924);
    $reply = trim($reply);
    $reply = "Server:\t" . str_pad($reply, 20, ' ', STR_PAD_LEFT);

    socket_close($sock);

    // Store the current message in the session variable
    $_SESSION['chatMessages'][] = array('user' => $msg, 'support' => $reply);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/client.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>
<body>
<div class="chat-container">
        <div class="chat-header">Shopping Support</div>
        <div class="chat-messages">
            <?php if (isset($_POST['btnSend'])) { ?>
               
                <div class="support-message"><?php echo htmlspecialchars($reply); ?></div>
            <?php } ?>
        </div>
        <form method="post">
            <div class="chat-input">
                <input type="text" name="txtMessage" id="txtMessage" placeholder="Type your message...">
                <input type="submit" name="btnSend" value="Send">
            </div>
        </form>
    </div>
</body>
</html>

