<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <?php
    $user = [
        "avatar" => "uploads/img.jpg",
        "name" => "dylan",
        "phone" => 1223,
        "email" => "dylan@gmail.com",
        "company" => "dylan",
    ];

    ?>
    <div class="container">
        <h2>Account Settings</h2>
        <div class="account">
            <div class="left">

                <a href="">Profile</a><br>
                <a href="">Password</a><br>
                <a href="">interations</a><br>
                <a href="">Billing</a>
            </div>
            <div class="form">
                <form action="upload_profile.php" method="POST" enctype="multipart/form-data">
                    <div class="img">
                        <?php if (!empty($user['avatar'])) : ?>
                            <img src="<?php echo $user['avatar']; ?>" alt="Avatar">
                        <?php else : ?>
                            <span>No avatar uploaded</span>
                        <?php endif; ?>
                    </div>
                    <div class="item">
                        <label for="avatar" class="changeavatar">Change My Avatar</label>
                        <input type="file" id="avatar" name="avatar" accept="image/*" style="display:none">
                    </div>
                    <div class="item">
                        <p>Full Name</p>
                        <input type="text" name="" id="" value="<?php echo $user['name']; ?>" required>
                    </div>
                    <div class="item">
                        <p>Email</p>
                        <input type="text" name="" id="" value="<?php echo $user['email']; ?>">
                    </div>
                    <div class="item">
                        <p>Phone</p>
                        <input type="text" name="" id="" value="<?php echo $user['phone']; ?>">
                    </div>
                    <div class="item">
                        <p>Company Name</p>
                        <input type="text" name="" id="" value="<?php echo $user['company']; ?>">
                    </div>
                    <div class="submit">
                        <button type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>