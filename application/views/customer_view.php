<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <link rel="stylesheet" href="<?= site_url("assets/css/style.css") ?>" type="text/css" media="screen" />
    <script src="<?= site_url("assets/js/jquery.js") ?>"></script>
    <script src="<?= site_url("assets/js/script.js") ?>"></script>
</head>
<body>

<div id="container">
    <h1>Hi <?= $customer_fullname; ?>, Welcome to CodeIgniter!</h1>
    <div id="body">
        <?php
            $keys = array_keys($customer);
            foreach ($keys as $key) {
                echo " >> {$key} : {$customer[$key]}<br/>";
            }
        ?>
        <input type="text" id="url_check" />
        <button id="btnCheck"> check </button>
    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>