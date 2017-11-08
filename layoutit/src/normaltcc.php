<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NORMAL TCC</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div id="app" class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-default navbar-inverse" role="navigation">
				<div class="navbar-header">

					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <a class="navbar-brand" href="#">NORMAL TCC</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

					<ul class="nav navbar-nav navbar-right">

					</ul>
				</div>

			</nav>
      <form class="" action="normaltcc.php" method="post">
        <input type="hidden" name="acao" value="yes">
        <button type="submit" class="btn btn-lg btn-success btn-block">
  				Iniciar
  			</button>

      </form>


            <h3>
      				Processamento: Calcula do 1º até o 3º Número Perfeito
      			</h3>

      <table class="table">
        <thead>
					<tr>
						<th>#</th>
						<th>Valor</th>
					</tr>
				</thead>

				<tbody>

            <?php
                if(!empty($_POST)){
                  $mensagem = numeroExec();
                  for($i = 0; $i< sizeof($mensagem); $i++ ){
                      echo "<tr class='success'>";
                      echo "<td>".($i+1)."</td>";
                      echo "<td>$mensagem[$i]</td>";
                      echo "</tr>";
                  }
                }
            ?>


				</tbody>
			</table>

      <h3>
        Memória: Calcula o 25º Número Fibonacci Recursivo
      </h3>


      <table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Número Fibonacci</th>
            <th>Valor</th>
					</tr>
				</thead>

				<tbody>

          <?php
              if(!empty($_POST)){
                $numeroFibona = 25;
                $fibona = fibonacci($numeroFibona);
      					echo "<tr class='danger'>";
      					echo "<td>1</td>";
      					echo "<td>$numeroFibona</td>";
                echo "<td>$fibona</td>";
      					echo "</tr>";
              }
          ?>

				</tbody>
			</table>

      <h3>
        Banco de Dados: Consulta Registros no Mysql
      </h3>

      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>ID</th>
            <th>Nome</th>
          </tr>
        </thead>

        <tbody>

          <?php
              if(!empty($_POST)){
                $result = consulta();
                $cont = 1;
                while ($row = $result->fetch_assoc()) {
                  echo "<tr class='warning'>";
                  echo "<td>$cont</td>";
                  echo "<td>".$row["id"]."</td>";
                  echo "<td>".$row["nome"]."</td>";
                  echo "</tr>";
                  $cont++;
              }
            }
          ?>

        </tbody>
      </table>

		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

<?php
      function perfeito($n){
          $res = 0;
          for($i = 2; $i<=($n); $i++){
            if($n % $i == 0){
              $res+= ($n / $i);
            }
          }
          return $res;
        }

        function numeroExec(){
          $mensagem = [];
          $cont = 2;
          $fim = 1;
          $numero = 3;

            while ($fim <= $numero){
              if($cont == perfeito($cont)){
                $fim++;
                array_push($mensagem , $cont);
                $cont++;
              }
              else {
                $cont++;
              }
            }
            return $mensagem;
        }

        function fibonacci($n){
          if($n == 0){return 0;}
          if($n == 1){return 1;}
          else {return fibonacci($n-1) + fibonacci($n-2);}
        }


        function consulta(){

          $mysqli = new mysqli("localhost", "root", "", "node");
          $query = "SELECT * FROM usuario";

          $statement = $mysqli->prepare($query);
          $statement->execute();
          $result = $statement->get_result();

          mysqli_close($mysqli);

          return $result;

        }

?>

  </body>
</html>
