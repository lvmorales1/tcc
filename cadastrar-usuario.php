<!DOCTYPE html>
<html>

<head>
    <meta charset="pt-br">
    <meta charset="UTF-8" />

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/2e45453992.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

        <title>Cadastrar cliente</title>
    </head>

<body>

    <nav class="navbar rounded-3 navbar-expand-lg navbar-light " style="background-color:#07f4b0" ;>
        <div class="container-fluid">

            <a class="navbar-brand" href="index.php">
                <img src="img/Costurando Ideias logo.png" width="50" height="50" class=" p-1 d-inline-block align-text-top">
                <a class="navbar-brand fw-bold" href="index.php">Costurando Ideias</a>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-2 ms-auto">
                    <li class="nav-item">
                        <a class="bi bi-house-fill nav-link" href="index.php">&nbsp; Home
                            <span class="visually-hidden"></span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <?php
                        require_once 'conexao.php';
                        //echo "$_SESSION[id_cliente] $_SESSION[id_costureira] - $_SESSION['id_entregador'] ";
                        //exit;
                        // $id_cli = $_SESSION['id_cliente'];
                        if (isset($_SESSION['id_cliente'])) {
                            echo "<a class='bi bi-cart-fill nav-link' href='statuspedidocliente.php'>&nbsp; Carrinho</a>";
                        }
                        if (isset($_SESSION['id_costureira'])) {
                            echo "<a class='bi bi-cart-fill nav-link' href='statuspedidocostureira.php'>&nbsp; Carrinho</a>";
                        }
                        if (isset($_SESSION['id_entregador'])) {
                            echo "<a class='bi bi-cart-fill nav-link' href='statuspedidoentregador.php'>&nbsp; Carrinho</a>";
                        }
                        ?>
                    </li>
                    <?php

                    if (isset($_SESSION['id_cliente']) &&  isset($_SESSION['nome']) && isset($_SESSION['email'])) {
                        echo "
                            <li class='nav-item'>
                                <a class='bi bi-person-fill nav-link' href='perfilc.php'>&nbsp; Perfil</a>
                            </li>
                        ";
                    } else if (isset($_SESSION['id_costureira']) &&  isset($_SESSION['nome']) && isset($_SESSION['email'])) {
                        echo "
                            <li class='nav-item'>
                                <a class='bi bi-person-fill nav-link' href='perfilcus.php'>&nbsp; Perfil</a>
                            </li>
                        ";
                    } else if (isset($_SESSION['id_entregador']) &&  isset($_SESSION['nome']) && isset($_SESSION['email'])) {
                        echo "
                            <li class='nav-item'>
                                <a class='bi bi-person-fill nav-link' href='perfile.php'>&nbsp; Perfil</a>
                            </li>
                        ";
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="sobre.php"><i class="fas fa-info-circle"></i>&nbsp; Sobre nós</a>
                    </li>
                    <?php
                    if (empty($_SESSION['nome']) && empty($_SESSION['email'])) {
                        echo "
                        <li class='nav-item dropdown'>
                            <a class='bi bi-arrow-right-square-fill nav-link dropdown-toggle' data-bs-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>&nbsp; Cadastrar</a>
                            <div class='dropdown-menu dropdown-menu-end success'>
                                <a class='dropdown-item active' href='cadastrar-usuario.php'><i class='fas fa-user'></i> Cadastrar usuário</a>
                                <a class='dropdown-item' href='cadastrar-costureira.php'><i class='fas fa-cut'></i> Cadastrar costureira</a>
                                <a class='dropdown-item' href='cadastrar-entregador.php'><i class='fas fa-shipping-fast'></i> Cadastrar entregador</a>
                            </div>
                        </li>
                         <li>
                            <a class='bi bi-arrow-right-square-fill nav-link dropdown-toggle' data-bs-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>&nbsp; Login</a>
                            <div class='dropdown-menu dropdown-menu-end success'>
                                <a class='dropdown-item' href='login-usuario.php'><i class='fas fa-user'></i> Sou um cliente</a>
                                <a class='dropdown-item' href='login-costureira.php'><i class='fas fa-cut'></i> Sou uma costureira</a>
                               <a class='dropdown-item' href='login-entregador.php'><i class='fas fa-shipping-fast'></i> Sou um entregador</a>
                            </div>
                        </li>";
                    }
                    ?>
                </ul>
                <?php

                if (isset($_SESSION['nome']) && isset($_SESSION['email'])) {
                    echo "
                            <div class='nav-item'>
                                <span class='container-fluid justify-content-end'>
                                    <a class='me-2 btn btn-outline-danger btn-sm' type='button' href='logout.php'><i class='fas fa-sign-out-alt'></i>&nbsp; Sair</a>
                                </span>
                             </div>
                        ";
                }
                ?>
            </div>
        </div>
    </nav>

    <div class="">
        <?php
        require_once 'conexao.php';

        if (isset($_SESSION['id_cliente']) or  isset($_SESSION['id_costureira']) or isset($_SESSION['id_entregador'])) {
            header("Location: index.php");
        }

        ?>
        <div>

            <div class="m-4 jumbotron">
                <h1 class="display-4"><i class="fas fa-address-card"></i> Cadastrar cliente</h1>
                <hr class="my-4">
            </div>

            <form action="cadastrar-usuario-process.php" method="POST" class="container">

                <div class="mb-3">
                    <h5 class="form-label"><i class="fas fa-dice"></i>&nbsp; Dados pessoais</h5>
                    <input class="form-control" type="text" name="nome" maxlength="" placeholder="Digite seu nome" required="required"><br>
                    <input class="form-control" type="text" name="rg" placeholder="Digite o RG" required="required"><br>
                    <input class="form-control" type="text" name="cpf" placeholder="Digite o CPF" required="required">
                </div>

                <label for="exampleFormControlInput1" class="form-label">Sexo:</label>
                <div class="form-check mb-3">
                    <input class=" form-check-input form-check-inline" type="radio" value="F" name="sexo"><i class="fas fa-venus"></i>&nbsp; Feminino</input><br>
                    <input class="form-check-input form-check-inline" type="radio" value="M" name="sexo"><i class="fas fa-mars"></i>&nbsp; Masculino </input><br>
                    <input class="form-check-input form-check-inline" type="radio" value="I" name="sexo"><i class="fas fa-genderless"></i>&nbsp; Prefere não dizer </input><br>
                </div>
                <div class="mb-3">
                    <h5 class="form-label"><i class="fas fa-dice"></i>&nbsp; Dados de login</h5>
                    <input class="form-control" type="email" name="email" placeholder="Digite seu e-mail" required="required"><br>
                    <input class="form-control" type="password" name="senha" placeholder="Digite sua senha" required="required">
                </div>
                <div class="mb-3">
                    <h5 class="form-label"><i class="fas fa-phone-square-alt"></i>&nbsp; Telefones</h5>
                    <input class="form-control" type="text" name="telefone" placeholder="Digite o telefone residencial"><br>
                    <input class="form-control" type="text" name="celular" placeholder="Digite o telefone celular">
                </div>
                <div class="mb-3">
                    <h5 class="form-label"><i class="fas fa-map-marked-alt"></i>&nbsp; Endereço</h5>
                    <input class="form-control" type="text" name="rua" placeholder="Digite o nome da rua" required="required"><br>
                    <input class="form-control" type="text" name="numero" placeholder="Digite o número da rua" required="required"><br>

                    <!-- <i class="bi bi-info-square-fill flex-shrink-0 align-items-center me-1 alert alert-warning" role="alert">&nbsp; Complemento opcional.</i>
                             -->
                    <div class="d-flex">
                        <textarea class=" me-2 form-control" data-bs-toggle="collapse" data-bs-target="#collapseExample" name="complemento" placeholder="Digite o complemento"></textarea>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body alert-success ">Complemento opcional.</div>
                        </div>
                    </div><br>
                    <input class="form-control" type="text" name="cep" placeholder="Digite o CEP" required="required"><br>

                    <select class="form-select" name="estados" id="estados" required="required">
                        <?php

                        $query = "SELECT id_estado,nome FROM estado";
                        $executa = mysqli_query($conexao, $query);
                        echo "<option value='' >Escolha seu estado.</option>";
                        while ($estados = mysqli_fetch_array($executa)) {
                            $estad = utf8_encode($estados['nome']);
                            echo "<option value='$estados[id_estado]'>$estad</option>";
                        }

                        ?>
                    </select><br>
                    <div>
                        <select id="cidades" class="form-select" style="display: none;" name="cidades" required="required"></select>
                    </div>
                </div>
                <div class="mb-3 btn-group">
                    <a href="index.php" id="button" type="submit" class="btn btn-outline-warning"><i class="fas fa-chevron-left"></i>&nbsp; Voltar</a>
                    <input id="button" type="submit" class="bi bi-check-circle-fill rounded btn btn-outline-success" value="Cadastrar"></button>
                </div>
            </form>
        </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
</body>

</html>
<script>
    $("#estados").on("change", function() {
        var idEstado = $("#estados").val();
        $.ajax({
            url: 'pega_cidades.php',
            type: 'POST',
            data: {
                id: idEstado
            },
            beforeSend: function() {
                $("#cidades").css({
                    'display': 'block'
                });
                $("#cidades").html("Carregando...");
            },
            success: function(data) {
                $("#cidades").css({
                    'display': 'block'
                });
                $("#cidades").html(data);
            },
            error: function(data) {
                $("#cidades").css({
                    'display': 'block'
                });
                $("#cidades").html("Houve um erro ao carregar");
            }
        });
    });
</script>