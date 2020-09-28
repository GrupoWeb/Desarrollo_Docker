<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    
</head>
<body>
    <div class="container">
	    <div class="row">
		    <div class="login">
                <div class="login-triangle"></div>
                <h2 class="login-header">CONTROL DE VEHICULOS 2s</h2>
                <form class="login-container" action="controller/acceso.php" method="post">
                    <p><input type="text" placeholder="usuario" name="usuario"></p>
                    <p><input type="password" placeholder="Password" name="clave"></p>
                    <p><input type="submit" value="Entrar"></p>
                </form>
            </div>
	    </div>
    </div>
</body>
</html>