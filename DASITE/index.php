<!DOCTYPE php>
<html lang=en>
    <body>
        <p><?= var_dump($_SERVER) ?></p>

        <?php
            $userAgent = $_SERVER['HTTP_USER_AGENT'];
            echo "Your User Agent: " . $userAgent;
        ?>
    </body>
</html>