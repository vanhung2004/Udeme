<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styling Forgot Div</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8; /* Set a background color for the body */
            margin: 0;
            padding: 0;
        }

        .forgott {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 80px auto;
            margin-top: 50px;
        }

        .forgott h2 {
            color: #333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        p {
            color: #666;
        }

        .btn_1 {
            background-color: #317C94;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn_1:hover {
            background-color: #317C94;
        }
    </style>
</head>
<body>

    <div class="forgott">
        <h2>Quên mật khẩu</h2>

        <form action="index.php?act=forgot" method="post">
            <div id="forgot_pe">
                <div class="form-group">
                    <input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Type your email">
                </div>
                <?php
                    if (isset($error_message)) {
                        echo $error_message;
                    }
                    ?>
                <p>A new password will be sent shortly.</p>
                <div class="text-center">
                    <input type="submit" name="forgot_password" value="Reset Password" class="btn_1">
                </div>
            </div>
        </form>

    </div>

</body>
</html>
