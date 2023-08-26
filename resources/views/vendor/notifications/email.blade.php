<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 10px !important;
        }

        .greeting {
            font-size: 20px;
            font-weight: bold;
        }

        p {
            font-size: 14px;
        }

        .link {
            background-color: #495C83;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 15px !important;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <title>Permintaan Reset Password</title>
</head>

<body>
    <p class="greeting">{{ $greeting }}</p>
    <p>Kamu meminta untuk melakukan reset password</p>
    <p><b>Jika benar </b>itu <b>kamu</b> yang melakukan Permintaan reset password</p>
    <p>Silahkan klik button di bawah ini untuk melakukan reset password. Jika itu bukan kamu, bisa kamu <b>Abaikan</b>
    </p>
    <p>
        <a href="{{ $actionUrl }}" class="link">
            Reset Password
        </a>
    </p>
    <br><br>

    <code>Note : Jika tombol di atas tidak berfungsi kamu bisa langsung klik link di bawah</code>
    <p>
        <a href="{{ $actionUrl }}">
            {{ $actionUrl }}
        </a>
    </p>

</body>

</html>