<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programacion web con Laravel</title>
</head>

<body>
    <h1>Aprendiendo PHP</h1>
    <?php
    // $i = 0;
    // $cars = [
    //         'Toyota' => ['Corolla',
    // ,                      'Yaris',
    //                         'Hilux']
    //         ];
    //         ['Nissan' =>    ['March', 
    //                         'Versa', 
    //                         'Sentra']
    //         ];
    // $name = 'Jhon';
    // foreach ($cars as $brand => $models){
    //     echo "<h2>$brand</h2>";
    // }

    echo "<h2>Ejercicio1</h2>";

    $arreglo = [
        'keyStr1' => 'lado',
        0 => 'ledo',
        'keyStr2' => 'lido',
        1 => 'lodo',
        2 => 'ludo'
    ];

    $resultado_normal = "";
    $resultado_invertido = "";

    foreach ($arreglo as $valor) {
        $resultado_normal .= $valor . " ";
    }

    foreach (array_reverse($arreglo) as $valor) {
        $resultado_invertido .= $valor . " ";
    }

    echo $resultado_normal . "<br>";
    echo "Decirlo al revez lo dudo <br>";
    echo $resultado_invertido . "<br>";
    echo "<br>";

    echo "<h2>Ejercicio2</h2>";
    $paises = [
        "México" => ["Monterrey", "Querétaro", "Guadalajara"],
        "Colombia" => ["Bogotá", "Cartagena", "Medellín"],
        "España" => ["Madrid", "Barcelona", "Sevilla"],
        "Argentina" => ["Buenos Aires", "Córdoba", "Rosario"],
        "Japón" => ["Tokio", "Osaka", "Kioto"]
    ];



    foreach ($paises as $pais => $ciudades) {
        echo $pais . ": " . implode(", ", $ciudades) . "<br>";
    }

    echo "<h2>Ejercicio3</h2>";
    $valores = [23, 54, 32, 67, 34, 78, 98, 56, 21, 34, 57, 92, 12, 5, 61];

    sort($valores);
    $mas_bajos = array_slice($valores, 0, 3);
    $mas_altos = array_slice($valores, -3);

    echo "Los 3 números más bajos son: " . implode(", ", $mas_bajos) . "<br>";
    echo "Los 3 números más altos son: " . implode(", ", $mas_altos) . "<br>";
    echo "<br>";

    //for ($i = 0; $i < sizeof($cars); $i++){
    //    echo "<p>Arreglo[$i]: {$cars[$i]}</p>";
    //}
    //echo "<h2>hola $name desde PHP</h2>";
    ?>
</body>

</html>