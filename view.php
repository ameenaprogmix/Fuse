<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Fuzzy Product Matching</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2em;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }

        .score-bar {
            background-color: #eee;
            border-radius: 4px;
            overflow: hidden;
        }

        .score-fill {
            background-color: #4CAF50;
            height: 16px;
        }
    </style>
</head>

<body>

    <h2>Fuzzy Product Matching</h2>

    <table>
        <thead>
            <tr>
                <th>Original Product</th>
                <th>Matched Product</th>
                <th>Score Text (%)</th>
                <th>Score Combined (%)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($matches as $match): ?>
                <tr>
                    <td><?= $match['original'] ?></td>
                    <td><?= $match['matched'] ?></td>
                    <td>
                        <?= $match['score_text'] ?>%
                        <div class="score-bar">
                            <div class="score-fill" style="width: <?= $match['score_text'] ?>%"></div>
                        </div>
                    </td>
                    <td>
                        <?= $match['score_combined'] ?>%
                        <div class="score-bar">
                            <div class="score-fill" style="width: <?= $match['score_combined'] ?>%"></div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>
