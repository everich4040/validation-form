        <?php include("./includes/db.process.php"); ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login and signup form</title>
            <link rel="stylesheet" href="css/main.css">
        </head>

        <body>
            <div class="form-container">
                <?php include("./includes/errors.php"); ?>
                <h1>Login</h1>
                <form action="" method="POST">

                    <div class="each-input">
                        <img src="css/ionicons/add.svg" alt="">
                        <input type=" text " placeholder=" Username" name="username" value="<?php echo $username; ?>">
                    </div>
                    <div class=" each-input ">
                        <img src=" css/ionicons/add.svg " alt=" ">
                        <input type=" password " placeholder=" Password " name="password">
                    </div>

                    <button type="submit" name="login">Login</button>
                    <div class="redirect" style="text-align: center; padding:20px 0;">Not a member? <a href="./signup.php" style="text-decoration: none;">Signup</a></div>
                </form>
            </div>
            <script src=" js/script.js "></script>
        </body>

        </html>