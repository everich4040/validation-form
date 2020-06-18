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
                <h1>Sign up</h1>
                <form action="" method="POST">
                    <div class="each-input">
                        <img src="css/ionicons/add.svg" alt="">
                        <input type="text" placeholder="Fullname" name="fullname" value="<?php echo $fullname; ?>">
                    </div>
                    <div class="each-input">
                        <img src="css/ionicons/add.svg" alt="">
                        <input type=" text " placeholder=" Username" name="username" value="<?php echo $username; ?>">
                    </div>
                    <div class=" each-input ">
                        <img src=" css/ionicons/add.svg " alt=" ">
                        <input type=" email " placeholder=" Email " name="email" value="<?php echo $email; ?>">
                    </div>
                    <div class=" each-input ">
                        <img src=" css/ionicons/add.svg " alt=" ">
                        <input type=" password " placeholder=" Password " name="password">
                    </div>
                    <div class=" each-input ">
                        <img src=" css/ionicons/add.svg " alt=" ">
                        <input type=" password " placeholder=" Confirm password" name="password_2">
                    </div>
                    <button type="submit" name="signup">signup</button>
                    <div class="redirect" style="text-align: center; padding:20px 0;">Already a member? <a href="./login.php" style="text-decoration: none;">login</a></div>
                </form>
            </div>
            <script src=" js/script.js "></script>
        </body>

        </html>