<?php

require 'db.php';

$matches = [];

$mquery = $pdo->query("SELECT name FROM m_products");
$dquery = $pdo->query("SELECT name FROM d_products");

$mProducts = $mquery->fetchAll();
$pProducts = $dquery->fetchAll();

foreach ($mProducts as $mProduct) {
    foreach ($pProducts as $pProduct) {
        similar_text(strtolower($mProduct['name']), strtolower($pProduct['name']), $scoreText);

        $levDistance = levenshtein(strtolower($mProduct['name']), strtolower($pProduct['name']));
        $maxLength = max(strlen($mProduct['name']), strlen($pProduct['name']));
        $levenshteinScore = $maxLength > 0 ? 100 - ($levDistance / $maxLength * 100) : 0;

        $scoreCombined = ($levenshteinScore * 0.5) + ($scoreText * 0.5);

        if ($scoreText > 90 && $scoreCombined > 90) {
            $matches[] = [
                'original' => $mProduct['name'],
                'matched' => $pProduct['name'],
                'score_text' => round($scoreText, 2),
                'score_combined' => round($scoreCombined, 2),
            ];
        }
    }
}

include 'view.php';
