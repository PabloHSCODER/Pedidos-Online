
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Login</title>
    <style type="text/css">
     .center{
        width:800px;
        height:auto;
        margin: 0 auto;
        padding: 150px;;}
</style>
</head>
<body>
<div class="center">
<div id="login">
      
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="process.php" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Usuario:</label><br>
                                <input type="text" name="usuario" id="usuario" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Senha:</label><br>
                                <input type="password" name="senha" id="senha" class="form-control">
                            </div>
                            <div class="form-group">
                                
                                <input type="submit" name="acao" class="btn btn-info btn-md" value="entre">
                            </div>
                            <div id="cadastre" class="form-group">
                            <input type="submit" name="acao" class="btn btn-info btn-md"value="cadastrar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
</body>
</html>
