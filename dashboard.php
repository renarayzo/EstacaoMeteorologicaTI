<?php
session_start(); // Inicio da Sessão
// Validação de se a sessão do username não existir
if (!isset($_SESSION['username'])) {
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
    <!--<meta http-equiv="refresh" content="5">-->
    <title>Estação Meteorologica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <img src="./images/solNav.png" alt="Sol" width="5%">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Dashboard ME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="historico.php">Histórico</a>
                </li>
            </ul>

            <a class="btn btn-outline-secondary" type="submit" href="logout.php"><img src="./images/logoLogout.png"
                    alt="logo" width="15">Logout</a>
        </div>
    </nav>

    <br>

    <div class="container" style="padding: 0">
        <div class="card">
            <div class="card-body">
                <img class="float-end" src="./images/logoDashboardMet.jpg" alt="Logo Dashboard" width="180px"
                    style="display: inline;">
                <h1 class="card-title">Estação Meteorologica Inteligente</h5>
                    <p class="card-text">Bem Vindo <strong>
                            <?php echo $_SESSION['username'] ?>
                        </strong></p>
                    <a>Tecnologias de Internet - Engenharia Informática<a>
            </div>
        </div>
    </div>


    <section class="vh-60" >
        <div class="container py-5 h-100">

            <div class="row d-flex justify-content-center align-items-center h-100" style="border-radius: 20px; background-color: #B6B4BD;">
                    <div class="row-sensor">
                        <div class="col-md-9 col-lg-7 col-xl-5" style="margin-right: 10vh">                            
                            <div class="card mb-1 gradient-custom" style="border-radius: 25px;">
                                <div style=" width: 100%; text-align: center; padding-top: 1vh;">
                                    <p>Temperatura</p>
                                </div>
                                <div class="card-body p-4 pt-0">
                                    <div id="demo1" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="d-flex justify-content-between mb-4 pb-2">
                                                    <div>
                                                        <!-- Usar API -->
                                                        <h2 class="display-2"><strong>23°C</strong></h2>
                                                        <!-- Usar API -->
                                                        <p class="text-muted mb-0">Coimbra, Portugal</p>
                                                    </div>
                                                    <div> <!-- Temos de meter um if aqui por causa da imagem -->
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-weather/ilu3.webp"
                                                            width="150px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
    
                            <div class="card mb-4" style="border-radius: 25px;">
                                <div class="card-body p-4">
                                    <!-- Meter atuadores -->
    
                                </div>
                            </div>
    
    
                        </div>

                        <div class="col-md-9 col-lg-7 col-xl-5">                            
                            <div class="card mb-1 gradient-custom" style="border-radius: 25px;">
                                <div style=" width: 100%; text-align: center; padding-top: 1vh;">
                                    <p>Chuva</p>
                                </div>
                                <div class="card-body p-4 pt-0">
                                    <div id="demo1" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="d-flex justify-content-between mb-4 pb-2">
                                                    <div>
                                                        <!-- Usar API -->
                                                        <h2 class="display-2"><strong>23°C</strong></h2>
                                                        <!-- Usar API -->
                                                        <p class="text-muted mb-0">Coimbra, Portugal</p>
                                                    </div>
                                                    <div> <!-- Temos de meter um if aqui por causa da imagem -->
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-weather/ilu3.webp"
                                                            width="150px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
    
                            <div class="card mb-4" style="border-radius: 25px;">
                                <div class="card-body p-4">
                                    <!-- Meter atuadores -->
    
                                </div>
                            </div>
    
    
                        </div>
                    </div>
                    
                    <div class="row-sensor">
                    <div class="col-md-9 col-lg-7 col-xl-5" style="margin-right: 10vh">                            
                            <div class="card mb-1 gradient-custom" style="border-radius: 25px;">
                                <div style=" width: 100%; text-align: center; padding-top: 1vh;">
                                    <p>Humidade</p>
                                </div>
                                <div class="card-body p-4 pt-0">
                                    <div id="demo1" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="d-flex justify-content-between mb-4 pb-2">
                                                    <div>
                                                        <!-- Usar API -->
                                                        <h2 class="display-2"><strong>23°C</strong></h2>
                                                        <!-- Usar API -->
                                                        <p class="text-muted mb-0">Coimbra, Portugal</p>
                                                    </div>
                                                    <div> <!-- Temos de meter um if aqui por causa da imagem -->
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-weather/ilu3.webp"
                                                            width="150px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
    
                            <div class="card mb-4" style="border-radius: 25px;">
                                <div class="card-body p-4">
                                    <!-- Meter atuadores -->
    
                                </div>
                            </div>
    
    
                        </div>

                        <div class="col-md-9 col-lg-7 col-xl-5">                            
                            <div class="card mb-1 gradient-custom" style="border-radius: 25px;">
                                <div style=" width: 100%; text-align: center; padding-top: 1vh;">
                                    <p>Vento</p>
                                </div>
                                <div class="card-body p-4 pt-0">
                                    <div id="demo1" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="d-flex justify-content-between mb-4 pb-2">
                                                    <div>
                                                        <!-- Usar API -->
                                                        <h2 class="display-2"><strong>23°C</strong></h2>
                                                        <!-- Usar API -->
                                                        <p class="text-muted mb-0">Coimbra, Portugal</p>
                                                    </div>
                                                    <div> <!-- Temos de meter um if aqui por causa da imagem -->
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-weather/ilu3.webp"
                                                            width="150px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
    
                            <div class="card mb-4" style="border-radius: 25px;">
                                <div class="card-body p-4">
                                    <!-- Meter atuadores -->
    
                                </div>
                            </div>
    
    
                        </div>
                    </div>
                
            </div>

        </div>
    </section>
    </section>

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
                            <td scope="row">
                                <?php echo $nome_temperatura ?>
                            </td>
                            <td>
                                <?php echo $valor_temperatura ?>°
                            </td>
                            <td>
                                <?php echo $hora_temperatura ?>
                            </td>
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