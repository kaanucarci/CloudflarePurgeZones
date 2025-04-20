<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cloudflare Cache Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f1f1;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-box {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-box img {
            max-width: 120px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="login-box">
    <img src="<?=$helper->get_cdn_url()?>/public/assets/img/logo-lorem.png" width="200">
    <h4 class="mb-4">Cloudflare Cache Service</h4>
    <form method="post" class="login-form">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="username" name="username" placeholder="E-posta" autocomplete="off" required>
            <label for="email">Kullanıcı Adı</label>
        </div>
        <div class="form-floating mb-4">
            <input type="password" class="form-control" id="password" name="password" placeholder="Şifre" autocomplete="off" required>
            <label for="password">Şifre</label>
        </div>
        <button type="submit" name="" class="btn btn-danger w-100">Giriş Yap</button>
        <div class="alert mt-3"></div>
    </form>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="<?=$helper->get_cdn_url()?>/public/assets/js/main.js"></script>
<script>$(document).ready(function (){login();});</script>
</html>

