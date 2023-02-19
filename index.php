<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"
		integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"
		integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
		crossorigin="anonymous"></script>
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body style='bacground-color:black;'>
	<div class="container">
		<h2>Tabs- com todos os testes </h2>
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#home">media</a></li>
			<li><a data-toggle="tab" href="#menu1">menor ou maior</a></li>
			<li><a data-toggle="tab" href="#menu2"> palíndromo ?</a></li>
			<li><a data-toggle="tab" href="#menu3">numero é primo?</a></li>
			<li><a data-toggle="tab" href="#menu4">numeros pares?</a></li>
			<li><a data-toggle="tab" href="#menu5">teste 5</a></li>
	
		</ul>

		<div class="tab-content">
			<div id="home" class="tab-pane fade in active">
				<div class="container">
					<div class="card">
						<div class="card-body">
							<h1>Formulário para calcular a média de três números</h1>
							<form method="post" action="index.php">
								<label for="num1">Número 1:</label>
								<input class="form-control" type="number" name="num1" id="num1">
								<label for="num2">Número 2:</label>
								<input class="form-control" type="number" name="num2" id="num2">
								<label for="num3">Número 3:</label>
								<input class="form-control" type="number" name="num3" id="num3">
								<button class="btn btn-primary" type="submit" name="media">Calcular média</button>
							</form>

							<br />
							<?php
							if (isset($_POST['media'])) {
								$num1 = $_POST['num1'];
								$num2 = $_POST['num2'];
								$num3 = $_POST['num3'];
								if ($num1 == null) {
									echo 'digite um numero o campo Número 1 não pode estar vasio';
								} else if ($num2 == null) {
									echo 'digite um numero o campo Número 2 não pode estar vasio';

								} else if ($num3 == null) {
									echo 'digite um numero o campo Número 3 não pode estar vasio';

								} else {

									$media = ($num1 + $num2 + $num3) / 3;
									echo "<p>A média dos três números é: " . $media . "</p>";
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<div id="menu1" class="tab-pane fade">
				<div class="container">
					<div class="card">
						<div class="card-body">
							<h1> função que encontra o menor e o maior </h1>

							<form method="post" action="index.php">
								<label for="arrayNumeros">Digite os números, separados por vírgula:</label>
								<input class="form-control" type="text" id="arrayNumeros" name="arrayNumeros">
								<button class="btn btn-primary" type="submit" name="arrayNumerosButton">Verificar se é
									primo</button>
							</form>
							<br />
							<?php
							function encontrarMenorNumero($numeros)
							{
								$numeros_array = explode(',', $numeros);
								return min($numeros_array);
							}

							function encontrarMaiorNumero($numeros)
							{
								$numeros_array = explode(',', $numeros);
								return max($numeros_array);
							}

							if (isset($_POST['arrayNumerosButton'])) {
								$numeros = $_POST['arrayNumeros'];

								$menor = encontrarMenorNumero($numeros);
								$maior = encontrarMaiorNumero($numeros);

								echo "O menor número é $menor e o maior número é $maior.";

								$numeros_array = explode(',', $numeros);
								rsort($numeros_array);
								echo "<br>Os números digitados em ordem decrescente são: " . implode(', ', $numeros_array);
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<div id="menu2" class="tab-pane fade">
				<div class="container">
					<div class="card">
						<div class="card-body">
							<h1> verifique se uma palavra é um palíndromo </h1>

							<form method="post" action="index.php">
								<label for="PalavraPalíndromo">Digite uma palavra </label>
								<input class="form-control" type="text" name="PalavraPalíndromo" id="PalavraPalíndromo">
								<button class="btn btn-primary" type="submit" name="PalavraPalíndromoButton">Verificar
									se é
									primo</button>
							</form>
							<br />
							<?php
							function verificarPalindromo($palavra)
							{
								// Remover espaços e caracteres especiais da palavra
								$palavra = preg_replace('/[^A-Za-z0-9]/', '', $palavra);

								// Inverter a palavra
								$inverso = strrev($palavra);

								// Comparar a palavra original com o inverso
								if (strtolower($palavra) == strtolower($inverso)) {
									echo "<p>$palavra é um palíndromo!</p>";
								} else {
									echo "<p>$palavra não é um palíndromo.</p>";
								}
							}

							if (isset($_POST['PalavraPalíndromoButton'])) {
								$palavra = $_POST['PalavraPalíndromo'];
								verificarPalindromo($palavra);
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<div id="menu3" class="tab-pane fade">
				<div class="container">
					<div class="card">
						<div class="card-body">
							<h1>Verificar se o numero é primo </h1>

							<form method="post" action="index.php">
								<label for="numero">Digite um número:</label>
								<input class="form-control" type="number" name="numero" id="numero">
								<button class="btn btn-primary" type="submit" name="primo">Verificar se é primo</button>
							</form>

							<br />
							<?php
							if (isset($_POST['primo'])) {
								$numero = $_POST['numero'];
								$primo = true;
								if ($numero == null) {
									echo 'digite um numero ';
								} else {
									if ($numero < 2) {
										$primo = false;
									} else {
										for ($i = 2; $i <= sqrt($numero); $i++) {
											if ($numero % $i == 0) {
												$primo = false;
												break;
											}
										}
									}

									if ($primo) {
										echo "<p>O número " . $numero . " é primo.</p>";
									} else {
										echo "<p>O número " . $numero . " não é primo.</p>";
									}
								}
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<div id="menu4" class="tab-pane fade">
				<div class="container">
					<div class="card">
						<div class="card-body">
							<h1>Verificar numeros pares de $var1 a $var2 </h1>

							<form method="post" action="index.php">
								<label for="numeroPar1">Digite um número:</label>
								<input class="form-control" type="number" name="numeroPar1" id="numeroPar1">
								<label for="numeroPar2">Digite um número:</label>
								<input class="form-control" type="number" name="numeroPar2" id="numeroPar2">
								<button class="btn btn-primary" type="submit" name="numeroPar">Verificar se é
									primo</button>
							</form>

							<br />
							<?php

							if (isset($_POST['numeroPar'])) {

								$NumrtoPar1 = $_POST['numeroPar1'];
								$NumrtoPar2 = $_POST['numeroPar2'];
								if ($NumrtoPar1 == null || $NumrtoPar2 == null) {
									echo 'todos os campos devem ser preenchidos';
								} else if ($NumrtoPar1 > $NumrtoPar2) {
									echo 'o primeiro numero deve ser maior que o segundo !';
								} else {
									for ($i = $NumrtoPar1; $i <= $NumrtoPar2; $i++) {
										if ($i % 2 == 0) {
											echo $i . " ";
										}
									}

								}

							}

							?>
						</div>
					</div>
				</div>
			</div>
			<div id="menu5" class="tab-pane fade">
				<h3>Menu 3</h3>
				<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
				</p>
			</div>

		</div>
		<br />
		<br />
		<div class="container">
			<div class="card">
				<h2>Pagina consumindo a API exteran </h2>
				<a href="Nova-pasta/api.php">
					<button class="btn btn-primary" name="Link">Link para api.php</button>
				</a>
			</div>
		</div>
		<br />
		<br />
		<div class="container">
			<div class="card">
				<h2>Pagina Calculadora Em PHP </h2>
				<a href="Nova-pasta/calculadora.php">
					<button class="btn btn-primary" name="Link">Link para Calculadora</button>
				</a>
			</div>
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js"
		integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
		crossorigin="anonymous"></script>
</body>

</html>