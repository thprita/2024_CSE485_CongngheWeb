<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center  text-danger">Đăng ký tài khoản</h2>
                    </div>
                    <?php
                    if (isset($_GET['msg']) && $_GET['msg'] === 'error') {
                        echo '<div class="alert alert-success" role="alert">Mật khẩu khác nhau!</div>';
                    }
                    ?>
                    <?php
                    if (isset($_GET['msg']) && $_GET['msg'] === 'success') {
                        echo '<div class="alert alert-success" role="alert">Đăng lý thành công</div>';
                    }
                    ?>
                    <div class="card-body">
                        <form action="?controller=login&action=xuly" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Tài khoản</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password1" class="form-label">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" id="password1" name="password1" required>
                            </div>
                            <div class="mb-3">
                                <select name="role" id="role">
                                    <?php $array = array(); ?>
                                    <?php foreach ($users as $user) : ?>
                                        <?php if (!in_array($user->getRole(), $array)) : ?>
                                            <?php $array[] = $user->getRole(); ?>
                                            <option value="<?php echo $user->getRole(); ?>"><?php echo $user->getRole(); ?></option>
                                        <?php endif ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary " style="float:right" name="signup">ĐĂNG KÝ</button>
                            <a href="?controller=login&action=logout" class="btn btn-primary ">ĐĂNG NHẬP</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>