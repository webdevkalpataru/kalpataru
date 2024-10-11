<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h2 {
            background-color: #f2f2f2;
            padding: 10px;
        }
        .section p {
            margin: 0;
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <h1><?= $title; ?></h1>

    <div class="section">
        <h2>Identitas Calon</h2>
        <p><?= $identitas; ?></p>
    </div>

    <div class="section">
        <h2>Kegiatan Calon</h2>
        <p><?= $kegiatan; ?></p>
    </div>

    <div class="section">
        <h2>PMIK</h2>
        <p><?= $pmik; ?></p>
    </div>

    <div class="section">
        <h2>Dampak</h2>
        <p><?= $dampak; ?></p>
    </div>

    <div class="section">
        <h2>Keswadayaan</h2>
        <p><?= $keswadayaan; ?></p>
    </div>

    <div class="section">
        <h2>Keistimewaan</h2>
        <p><?= $keistimewaan; ?></p>
    </div>
</body>
</html>