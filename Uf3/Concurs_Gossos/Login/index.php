<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <style type="text/css">
        label{
            display: block;
        }
    </style>
</head>
 
<body>
<div>
    <div>
    <h2>Login</h2>
    <form class="form" action="login.php" method="post">
        
        <label>Nom</label>
        <input type="text" name="nom" required="true" placeholder="nom" />
        
        <label>Password</label>
        <input type="password" name="password" required="true" placeholder="password" />
    </br>
        <input type="submit" value="Login" />
        
    </form>
    </div>
</div>
</body>
</html>