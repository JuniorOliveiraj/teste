<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Calculadora </title>
</head>

<body>
    <a href="../index.php">
        <button style='margin:2%' class="btn btn-primary" name="Link"> <- back</button>
    </a>
    <div class="container">
        <div class="card" style="  width:100%;  display: flex; justify-content: center;">
            <h2>calculadora </h2>
            
    <?php
    // Definir as variáveis que serão utilizadas na operação
    $num1 = $_POST['num1'] ?? 0;
    $num2 = $_POST['num2'] ?? 0;
    $op = $_POST['op'] ?? '+';

    // Executar a operação
    switch ($op) {
        case '+':
            $resultado = $num1 + $num2;
            break;
        case '-':
            $resultado = $num1 - $num2;
            break;
        case '*':
            $resultado = $num1 * $num2;
            break;
        case '/':
            if ($num2 == 0) {
                $resultado = 'Não é possível dividir por zero';
            } else {
                $resultado = $num1 / $num2;
            }
            break;
        default:
            $resultado = 'Operação inválida';
            break;
    }
    ?>

    <h1>Calculadora Simples em PHP</h1>

    <form method="post">
        <input type="number" name="num1" value="<?php echo $num1; ?>">
        <select name="op">
            <option value="+" <?php if ($op == '+') echo 'selected'; ?>>+</option>
            <option value="-" <?php if ($op == '-') echo 'selected'; ?>>-</option>
            <option value="*" <?php if ($op == '*') echo 'selected'; ?>>*</option>
            <option value="/" <?php if ($op == '/') echo 'selected'; ?>>/</option>
        </select>
        <input type="number" name="num2" value="<?php echo $num2; ?>">
        <input type="submit" value="Calcular">
    </form>

    <?php
    // Exibir o resultado da operação
    echo '<p>Resultado: ' . $resultado . '</p>';
    ?>
       
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