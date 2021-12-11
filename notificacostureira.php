<?php
include_once("lib/includes.php");
require_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

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
  <script src="js/script.js"></script>

  <title>Notificações</title>
</head>

<body>
  <?php require_once 'lib/functions.php';
  //onclick="document.write(<?php  aceitar_pedido($conexao); 
  ?>

  <nav class="navbar navbar-expand-lg navbar-light " style="background-color:#07f4b0" ;>
    <div class="container-fluid">

      <a class="navbar-brand" href="index.php">
        <img src="img/Costurando Ideias logo.png" width="50" height="50" class="p-1 d-inline-block align-text-top">
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
            //echo "$_SESSION[id_cliente] $_SESSION[id_costureira] - $_SESSION['id_entregador'] ";
            //exit;
            // $id_cli = $_SESSION['id_cliente'];
            if (isset($_SESSION['id_cliente'])) {
              echo "
                            <li class='nav-item'><a class='bi bi-cart-fill nav-link' href='carrinho.php'>&nbsp; Carrinho</a></li>
                            <a class='nav-link' href='statuspedidocliente.php'><i class='fas fa-shopping-bag'></i>&nbsp; Meu pedido</a>";
            }
            if (isset($_SESSION['id_costureira'])) {
              echo "<a class='nav-link active' href='statuspedidocostureira.php'><i class='fas fa-cut'></i>&nbsp; Meus serviços</a>";
            }
            if (isset($_SESSION['id_entregador'])) {
              echo "<a class='nav-link' href='statuspedidoentregador.php'><i class='fas fa-shipping-fast'></i>&nbsp; Minhas entregas</a>";
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
                                <a class='dropdown-item' href='cadastrar-usuario.php'><i class='fas fa-user'></i> Cadastrar usuário</a>
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

  <div class="text-center m-4 card shadow">
    <h1 class="m-4 text-center"><i class="fas fa-bell"></i>&nbsp; Notificações</h1>
    <div class="" id="content-notifi">
    </div>
    <div class="d-flex m-4">
      <button type="button" onclick="window.location.href='statuspedidocostureira.php'" class=" btn btn-outline-warning" value=" <?php echo $_SESSION['id_costureira']; ?>"><i class='fas fa-chevron-left'></i>&nbsp; Voltar</button>
    </div>
  </div>


</body>

</html>