<?php
require_once 'cadastro.php';
$c = new cadastro;

?>


<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login</title>
    <link
      rel="stylesheet"
      href="https://static.tumblr.com/appmvnd/8owq1lawl/style.css"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
      integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="center">
      <h1>avantegarde</h1>
    </div>
    <div class="container">
      <div class="content first-content">
        <div class="first-column">
          <h2 class="title title-primary">bem vindo novamente!</h2>
          <p class="description description-primary">
            mantenhasse conectado conosco
          </p>
          <p class="description description-primary">
            por favor fa�a o login com suas informa��es
          </p>
          <button id="signin" class="btn btn-primary">sign in</button>
        </div>
        <div class="second-column">
          <h2 class="title title-second">criar conta</h2>
          <div class="social-media">
            <ul class="list-social-media">
              <a class="link-social-media" href="#">
                <li class="item-social-media">
                  <i class="fab fa-facebook-f"></i>
                </li>
              </a>
              <a class="link-social-media" href="#">
                <li class="item-social-media">
                  <i class="fab fa-google-plus-g"></i>
                </li>
              </a>
              <a class="link-social-media" href="#">
                <li class="item-social-media">
                  <i class="fab fa-linkedin-in"></i>
                </li>
              </a>
            </ul>
          </div>
          <!-- social media -->
          <p class="description description-second">
            ou use seu email para se registrar:
          </p>
          <form method ="POST" class="form">
            <label class="label-input" for="">
              <i class="far fa-user icon-modify"></i>
              <input type="text" name="nome" placeholder="Name" />
            </label>

            <label class="label-input" for="">
              <i class="far fa-envelope icon-modify"></i>
              <input type="email" name="email" placeholder="Email" />
            </label>

            <label class="label-input" for="">
              <i class="fas fa-lock icon-modify"></i>
              <input type="password" name="senha" placeholder="Password" />
            </label>

            <button class="btn btn-second">sign up</button>
          </form>
        </div>
        <!-- second column -->
      </div>
      <!-- first content -->
      <div class="content second-content">
        <div class="first-column">
          <h2 class="title title-primary">Ol�!</h2>
          <p class="description description-primary">Digite seus dados</p>
          <p class="description description-primary">
            e comece sua jornada conosco
          </p>
          <button id="signup" class="btn btn-primary">sign up</button>
        </div>
        <div class="second-column">
          <h2 class="title title-second">sign in to Avantgarde</h2>
          <div class="social-media">
            <ul class="list-social-media">
              <a class="link-social-media" href="#">
                <li class="item-social-media">
                  <i class="fab fa-facebook-f"></i>
                </li>
              </a>
              <a class="link-social-media" href="#">
                <li class="item-social-media">
                  <i class="fab fa-google-plus-g"></i>
                </li>
              </a>
              <a class="link-social-media" href="#">
                <li class="item-social-media">
                  <i class="fab fa-linkedin-in"></i>
                </li>
              </a>
            </ul>
          </div>
          <!-- social media -->
          <p class="description description-second">ou use seu email:</p>
          <form class="form">
            <label class="label-input" for="">
              <i class="far fa-envelope icon-modify"></i>
              <input type="email" name="email" placeholder="Email" />
            </label>

            <label class="label-input" for="">
              <i class="fas fa-lock icon-modify"></i>
              <input type="password" name="senha" placeholder="Password" />
            </label>

            <a class="password" href="#">esqueceu sua senha?</a>
            <button class="btn btn-second">sign in</button>
          </form>
        </div>
        <!-- second column -->
      </div>
      <!-- second-content -->
    </div>
    <script src="https://static.tumblr.com/appmvnd/8Heq1lfck/app.js"></script>
    <?php
    if(isset($_POST['nome']))
    {
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        if(!empty($nome) && !empty($email) && !empty($senha))
        {
            $c->conectar("cadastro","localhost","root","");
            if($c->msgErro == "")
            {
              if($c->cadastrar($nome, $email, $senha))
              {
                echo "Cadastrado com Sucesso! Acesse para entrar!";

              }else 
              {
                echo "Email ja cadastrado!";

              }

            }else
            {
              echo "Erro: ".$c->msgErro;
            }

        }else
        {
            echo "Preencha todos os campos!";
        }
    }



    ?>
  </body>
</html>