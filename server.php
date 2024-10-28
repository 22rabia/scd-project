<?php
$host = "127.0.0.1";
$port = 20205;
set_time_limit(0);

$sock = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
$result = socket_bind($sock, $host, $port) or die("Could not bind to socket.\n");

$result = socket_listen($sock, 3) or die("Could not set up socket listener\n");
echo "Listening for connections\n";

class Chat
{
    function readline()
    {
        return rtrim(fgets(STDIN));
    }
}

do {
    $accept = socket_accept($sock);
    
    if ($accept === false) {
        // Error accepting connection, continue with the next iteration
        continue;
    }

    $msg = socket_read($accept, 1024);
    
    if ($msg === false) {
        // Error reading input, close the connection and continue with the next iteration
        socket_close($accept);
        continue;
    }

    $msg = trim($msg);
    echo "Client says:\t" . $msg . "\n\n";

    $line = new Chat();
    echo "Enter Reply:\t";
    $reply = $line->readline();

    socket_write($accept, $reply, strlen($reply)) or die("Could not write output\n");

    socket_close($accept);

} while (true);

socket_close($sock);
?>
