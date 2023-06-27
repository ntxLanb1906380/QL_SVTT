<!doctype html>
<html lang="en">

<head>
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>ĐĂNG NHẬP</title>
</head>

<body>

        <h3><i>ĐĂNG NHẬP</i></h3>
        <form action="log_mod.php" method="post" class = "form">
            <?php if (isset($_GET['error'])) { ?>
                <p class="error">
                    <?php echo $_GET['error']; ?>
                </p>
            <?php } ?>
                <label for="username">Mã nhân viên</label>
                <input type="text" class="form-control" id="username" name="mnv">

                <label for="password">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="pw">

                <label><span class="caption">Nhớ tôi</span>
                    <input type="checkbox" checked="checked" />
                </label>
                <span><a href="quenMK.php" >Quên mật khẩu?</a></span>
            <input type="submit" value="Log In">
        </form>
</body>

</html>