<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            padding: 0;
            margin: 0;
        }
        .container {
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(30deg, #3366ff, #ff0000);
        }
        .container .form-wrapper {
            border: solid 1px #ccc;
            padding: 60px 30px;
            height: fit-content;
            width: 300px;
            box-shadow: 0 1px 3px #ccc;
            background: #fff;
        }
        .container .form-wrapper .input {
            width: 100%;
            height: 30px;
            border: none;
            outline: none;
            border-bottom: solid 1px #111;
        }
        .container .form-wrapper .input:focus {
            border-color: purple;
        }
        .container .form-wrapper h3 {
            text-align: center;
        }
        .container .form-wrapper .btn {
            background: linear-gradient(30deg, #3366ff, #ff0000);
            padding: 8px 20px;
            border: none;
            cursor: pointer;
            color: #fff;
            display: block;
            margin-left: auto;
        }
        .container .form-wrapper .btn:hover {
            filter: brightness(80%);
        }
        .container .form-wrapper .alert {
            padding: 8px;
            margin-bottom: 20px;
        }
        .alert-success {
            background: #c6f39f;
        }
        .alert-error {
            background: #e58b8b;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <h3>Login</h3>
            <?php if(session()->has('success')){ ?>
                <div class="alert alert-success">
                    <?=(session()->get('success'))?>
                </div>
            <?php } ?>
            <?php if(session()->has('error')){ ?>
                <div class="alert alert-error">
                    <?=(session()->get('error'))?>
                </div>
            <?php } ?>
            <form action="<?=base_url('/login')?>" class="form" method="POST">
                <label for="">Email:</label><br>
                <input type="email" name="email" class="email input" id="email"><br><br>
                <label for="">Password:</label><br>
                <input type="password" name="password" class="password input" id="password"><br><br>
                <input type="submit" value="Submit" class="btn">
                <br>
                <small>No account? <a href="<?=base_url('/register')?>">Register</a> here.</small>
                <br>
            </form>
        </div>
    </div>
</body>
</html>