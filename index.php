<?php
/*
sistema simples de passagem

lugaresE = classe economica
lugaresP = primeira classe

*/
// criação das listas
if (isset($_POST['E'])) {
    $lugaresE = $_POST['E'];    // pega as posições anteriores se ouverem
} else {
    $lugaresE = [
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
    ];
}

if (isset($_POST['P'])) {
    $lugaresP = $_POST['P'];
} else {
    $lugaresP = [
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
    ];
}


if(isset($_POST['action'])){ // muda o estado da poltrona
    if($_POST['lug'] == 'P'){
        $lugaresP[(int)$_POST['x']][(int)$_POST['y']] = 1;
    }
    if($_POST['lug'] == 'E'){
        $lugaresE[(int)$_POST['x']][(int)$_POST['y']] = 1;
    }
}

function arayPreserve($lugaresE, $lugaresP) // faz com que alterações anteriores não sejam perdidas
{
    for ($i = 0; $i < count($lugaresP); $i++) {
        for ($j = 0; $j < count($lugaresP[$i]); $j++) {
            echo '<input style="display: none;" type="number" name="P[' . $i . '][' . $j . ']" value="' . $lugaresP[$i][$j] . '">';
        }

    }
    for ($i = 0; $i < count($lugaresE); $i++) {
        for ($j = 0; $j < count($lugaresE[$i]); $j++) {
            echo '<input style="display: none;" type="number" name="E[' . $i . '][' . $j . ']" value="' . $lugaresE[$i][$j] . '">';
        }

    }
}



// pega cada posição da lista e cria um form para que possa ser alterada
for ($i = 0; $i < count($lugaresP); $i++) {
    for ($j = 0; $j < count($lugaresP[$i]); $j++) {
        if ($j == 0) {
            echo "<div style='display: flex;gap: 5px'>";
        }

        echo '<form action="" method="post">';
        echo '<input style="display: none;" type="number" name="x" value="' . $i . '">';
        echo '<input style="display: none;" type="number" name="y" value="' . $j . '">';
        echo '<input style="display: none;" type="text" name="lug" value="P">';
        arayPreserve($lugaresE, $lugaresP);
        if ($lugaresP[$i][$j] == 0) {
            echo '<input type="submit" value="" style="background-color: #0c2;" name="action">';
        } else {
            echo '<input type="submit" value="" style="background-color: #c20;" disabled name="action">';
        }
        echo '</form>';

        if ($j == count($lugaresP[$i]) - 1) {
            echo "</div>";
        }
    }
    echo '<br>';
}
echo '<br>';
echo '<br>';
for ($i = 0; $i < count($lugaresE); $i++) {
    for ($j = 0; $j < count($lugaresE[$i]); $j++) {
        if ($j == 0) {
            echo "<div style='display: flex;gap: 5px'>";
        }

        echo '<form action="" method="post">';
        echo '<input style="display: none;" type="number" name="x" value="' . $i . '">';
        echo '<input style="display: none;" type="number" name="y" value="' . $j . '">';
        echo '<input style="display: none;" type="text" name="lug" value="E">';
        arayPreserve($lugaresE, $lugaresP);
        if ($lugaresE[$i][$j] == 0) {
            echo '<input type="submit" value="" style="background-color: #0c2;" name="action">';
        } else {
            echo '<input type="submit" value="" style="background-color: #c20;" disabled name="action">';
        }
        echo '</form>';

        if ($j == count($lugaresE[$i]) - 1) {
            echo "</div>";
        }
    }
    echo '<br>';
}


?>