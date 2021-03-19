<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="/css/admin-login.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="login-page">
    <h1 class="login-page__title">Logowanie</h1>
    <form class="login-form">
        <span class="login-form__item">
            <fa-icon [icon]=faUser class="login-form__item--icon"></fa-icon><input id="username" type="text" class="login-form__item--input" placeholder="username">
        </span>
        <span class="login-form__item">
            <fa-icon [icon]=faLock class="login-form__item--icon"></fa-icon><input id="password" type="password" class="login-form__item--input" placeholder="password">
        </span>
        <button type="button" onclick="login()" class="login-form__item login-form__item--button">Zaloguj się </button>
    </form>
</div>
<script src="/js/admin-login.js"></script>
</body>
</html>