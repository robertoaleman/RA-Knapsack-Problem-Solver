<?php

require_once 'knapsack.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }
        pre {
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
        }
        .error {
            color: red;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Results</h1>

    <?php
    try {
        // Verificar que se hayan enviado los datos
        if (!isset($_POST['capacity']) || !isset($_POST['items'])) {
            throw new Exception("Please complete all fields in the form.");
        }

        // Obtener y validar la capacidad
        $capacity = filter_var($_POST['capacity'], FILTER_VALIDATE_INT);
        if ($capacity === false || $capacity <= 0) {
            throw new Exception("The capacity must be a positive integer");
        }

        // Procesar los ítems del textarea
        $itemsText = trim($_POST['items']);
        $lines = explode("\n", $itemsText);

        $weights = [];
        $values = [];

        foreach ($lines as $index => $line) {
            $line = trim($line);
            if (empty($line)) continue;

            $parts = array_map('trim', explode(',', $line));
            if (count($parts) !== 2) {
                throw new Exception("Formato inválido en la línea " . ($index + 1) . ". Use: peso,valor");
            }

            [$weight, $value] = $parts;

            if (!is_numeric($weight) || !is_numeric($value) ||
                $weight <= 0 || $value < 0 ||
                floor($weight) != $weight || floor($value) != $value) {
                throw new Exception("The values ​​on the line " . ($index + 1) . " must be positive integers");
            }

            $weights[] = (int)$weight;
            $values[] = (int)$value;
        }

        if (empty($weights)) {
            throw new Exception("You must enter at least one item");
        }

        // Crear instancia de Knapsack y calcular
        $knapsack = new Knapsack($capacity, $weights, $values);
        $result = $knapsack->solve();

        // Mostrar resultados
        echo "<h2>Results:</h2>";
        echo "<pre>" . htmlspecialchars($knapsack->formatResult($result)) . "</pre>";

    } catch (Exception $e) {
        echo "<p class='error'>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
    ?>

    <a href="form.php">Return to the form!</a>
</body>
</html>