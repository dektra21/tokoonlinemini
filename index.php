<?php
    require 'array-barang.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/uikit.min.css" />
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bangers|Bitter|Bowlby+One+SC|Indie+Flower|Poppins&display=swap"
        rel="stylesheet">
    <title>Warunk Dektra</title>

</head>

<body class="uk-animation-fade">

    <?php
        require 'index-navbar.php';
    ?>

        <h2 class="uk-heading-bullet" style="padding-left:70px; font-family: 'Poppins', sans-serif;">
            <b>BARANG - BARANG YANG LAGI HOT!</b>
        </h2>

        <br><br>

    <?php
        require 'data-barang.php';
    ?>

</body>

</html>