<!DOCTYPE html>
<html>
<head>
    <title>KIOSK CLE</title>
</head>
<body>
    <img src="{{ URL::to('/public/assets/images/kioskcle.png') }}" alt="Logo Kiosk CLE">
    <h1>{{ $mailData['title'] }}</h1>
    <h3>Hola {{ $mailData['name'] }}</h3>
    <p>Ingresa a la plataforma con el siguiente usuario y contrasena</p>
    <p>Correo: {{ $mailData['email'] }}</p>
    <p>Contrasena: {{ $mailData['password'] }}</p>
    <p>Para cualquier duda o aclaracion, contacte al administrador</p>
</body>
</html>
