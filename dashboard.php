<?php
    session_start(); // Inicio da Sessão
    // Validação de se a sessão do username não existir
    if(!isset($_SESSION['username'])){
        header("refresh:5; url=index.php");
        die("Acesso Restrito!");
    }
?>

<?php
    $valor_temperatura = file_get_contents("api/files/temperatura/valor.txt");
    $hora_temperatura = file_get_contents("api/files/temperatura/hora.txt");
    $nome_temperatura = file_get_contents("api/files/temperatura/nome.txt");
    //echo $nome_temperatura . ": " . $valor_temperatura . " em " . $hora_temperatura
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="refresh" content="5">
        <title>Plataforma IoT</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="./style.css">
    </head>

    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

        <nav class="navbar navbar-expand-sm bg-light navbar-light">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Dashboard EI-TI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="historico.php">Histórico</a>
                    </li>
                </ul>

                <a class="btn btn-outline-secondary" type="submit" href="logout.php">Logout</a>
            </div>
        </nav>

        <br>
        
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <img class="float-end" src="./images/logoDashboardMet.jpg" alt="Logo Dashboard" width="180px" style="display: inline;">
                    <h1 class="card-title">Estação Meteorologica Inteligente</h5>
                    <p class="card-text">Bem Vindo <strong><?php echo $_SESSION['username'] ?></strong></p>
                    <a>Tecnologias de Internet - Engenharia Informática<a>
                </div>
            </div>
        </div>

        <br>

        <div class="container">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <div class="card ">
                        <div class="card-header sensor">
                            <strong>Temperatura: <?php echo $valor_temperatura; ?>°</strong>
                        </div>
                        <div class="card-body">
                            <img src="./images/temperature-high.png" alt="">
                        </div>
                        <div class="card-footer text-muted">
                            <strong>Atualização:</strong> <?php echo $hora_temperatura ?> - <a href="#">Histórico</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 text-center">
                    <div class="card ">
                        <div class="card-header sensor">
                            <strong>Humidade: 70%</strong> 
                        </div>
                        <div class="card-body">
                            <img src="./images/humidity-high.png" alt="">
                        </div>
                        <div class="card-footer text-muted">
                            <strong>Atualização:</strong> 2023/03/10 14:31 - <a href="#">Histórico</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 text-center">
                    <div class="card ">
                        <div class="card-header atuador">
                            <strong>Led Arduino: Ligado</strong>
                        </div>
                        <div class="card-body">
                            <img src="./images/light-on.png" alt="">
                        </div>
                        <div class="card-footer text-muted">
                            <strong>Atualização:</strong> 2023/03/10 14:31 - <a href="#">Histórico</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="container">
            <div class="card">
                <div class="card-header">
                    <strong>Tabela de Sensores</strong>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tipo de Dispositivo IoT</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Data de Atualização</th>
                                <th scope="col">Estado Alertas</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <td scope="row"><?php echo $nome_temperatura ?></td>
                                <td><?php echo $valor_temperatura ?>°</td>
                                <td><?php echo $hora_temperatura ?></td>
                                <td><span class="badge rounded-pill text-bg-danger">Elevada</span></td>
                            </tr>
                            <tr>
                                <td scope="row">Humidade</td>
                                <td>70%</td>
                                <td>2023/03/10 14:31</td>
                                <td><span class="badge rounded-pill text-bg-primary">Normal</span></td>
                            </tr>
                            <tr>
                                <td scope="row">Led Arduino</td>
                                <td>Ligado</td>
                                <td>2023/03/10 14:31</td>
                                <td><span class="badge rounded-pill text-bg-success">Ativo</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <br>
    </body>
</html>