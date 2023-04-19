<?php
    session_start();
    $file = fopen("./assets/users.txt", "r"); 

    // Verifica se o username existe
    if(isset($_POST['username'])){  
        // Precorre cada linha do ficheiro
        while(!feof($file)) {
            $line = fgets($file);
            $line = trim($line); // Retira os espaços a mais
            $credentials = explode(",", $line); // Separa a linha em username e password

            // Verifica se o username e a password estão corretas
            if ($credentials[0] == $_POST['username'] && password_verify($_POST['password'], $credentials[1])) {
                $loginStatus = true;
                $_SESSION['username'] = $_POST['username'];
                header("refresh:.5; dashboard.php");
                break; // Sai do ciclo se encontrar o username e a password corretas
            }
            else{
                $loginStatus = false;
            }
        }
    }

    fclose($file);
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Estação Meteorológica</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>

    <body>
        <br>
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <!-- Imagem -->
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="./images/loginLogo.png" class="img-fluid" alt="Login Imagem">
                </div>
                <!-- Formulário -->
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form method="post">
                        <h1 style="margin-bottom: 10%; text-align: center;">Autenticação</h1>
                        <!-- Username -->
                        <div class="form-outline mb-4">
                            <label class="form-label" >Username</label>
                            <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required/>
                        </div>

                        <!-- Password -->
                        <div class="form-outline mb-4">
                            <label class="form-label" >Password</label>
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="***********" required/>
                            
                        </div>

                        <!-- Botão Submeter -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Submeter</button>
                    </form>
                </div>
                <br>
                
                <?php if(isset($loginStatus) && $loginStatus == false){ //Se $loginStatus existir e as credenciais estão incorretas?>
                    <!-- Alerta de Falha ao Auntenticar -->
                    <hr style="height:3px;border-width:0;background-color:black;border-radius:5px;width:50%">
                    <div class="alert alert-danger" role="alert" style="width:67%">Username ou Password Incorretas!</div>
                <?php }elseif(isset($loginStatus) && $loginStatus == true){ //Se $loginStatus existir e as credenciais estão corretas?>
                    <!-- Alerta de Falha ao Auntenticar -->
                    <hr style="height:3px;border-width:0;background-color:black;border-radius:5px;width:50%">
                    <div class="alert alert-success" role="alert" style="width:67%">Autenticação Efetuada com Sucesso!</div>
                <?php }?>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>