<?php

function foo($intervals) {
    // Tri des intervalles en fonction de leur début
    usort($intervals, function($a, $b) {
        return $a[0] - $b[0];
    });

    $mergedIntervals = [];

    foreach ($intervals as $interval) {
        // Si la liste des intervalles fusionnés est vide ou si l'intervalle courant ne se chevauche pas avec le dernier intervalle fusionné
        if (empty($mergedIntervals) || $interval[0] > $mergedIntervals[count($mergedIntervals) - 1][1]) {
            $mergedIntervals[] = $interval;
        } else {
            // Fusion des intervalles
            $mergedIntervals[count($mergedIntervals) - 1][1] = max($mergedIntervals[count($mergedIntervals) - 1][1], $interval[1]);
        }
    }

    return $mergedIntervals;
}

// Test de la fonction avec un jeu de données
$testInput = [[3, 6], [3, 4], [15, 20], [16, 17], [1, 4], [6, 10], [3, 6]];
$result = foo($testInput);

// Affichage du résultat
echo json_encode($result) . PHP_EOL;

?>