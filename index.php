<?php
include("./includes/db.process.php");

//Redirect user to login page if the person hasn't enter the right information
if (!isset($_SESSION['username'])) {
    header("Location: login.php?secured");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="css/main.css">

</head>

<body>
    <header>
        <nav>
            <div class="logo">Kast</div>
            <a href="index.php?logout" class="logout">logout</a>
        </nav>
    </header>


    <div class="user_message">
        <?php
        if (isset($_SESSION['username'])) { ?>
            <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
        <?php
        }

        ?>
    </div>
</body>

</html>