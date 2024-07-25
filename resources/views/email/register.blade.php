<html>
<head>
    <title>Registration</title>
    <style>
        body{
            font-family: cursive;
            width: 100%;
            height: 100%;
            margin: 0 auto;
        }
        .title{
            background:#fafafa;
            color:#333;
            text-align: center;
            font-size: 28px;
            padding:15px;
            font-weight: bold;
        }
        .content{
            min-height: 300px;
            color:#333;
            padding: 15px 30px;
        }
        .footer{
            background:#fafafa;
            color:#fff;
            text-align: center;
            padding:15px;
        }
    </style>
</head>
<body>
    <div class="title">
        <img src="https://gtanepal.org/assets/frontend/images/logo.png" alt="" />
    </div>
    <div class="content">
        <h3>Login Credential</h3>
        <p><strong>Username: </strong>{{ $user }}</p>
        <p><strong>Password: </strong>{{ $password }}</p>
    </div>
    <div class="footer">
        &copy; gtanepal.org
    </div>
</body>
</html>
