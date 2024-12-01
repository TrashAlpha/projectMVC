<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link rel="stylesheet" href="view/style.css">
</head>
<body>
    <div class="nav">
        <a href="?c=Wallpaper&m=list">List Wallpaper</a>
        <a href="?c=Wallpaper&m=newWallpaper">Upload Wallpaper</a>

        <?php
        if (isset($_SESSION['username'])) {
            echo '<a href="?c=Auth&m=logout">Logout</a>';
        } else {
            echo '<a href="?c=Auth&m=login">Login</a>';
            echo '<a href="?c=Auth&m=register">Register</a>';
        }
        ?>
    </div>