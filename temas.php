<?php
// agenda.php - Agenda eventi minimalista

$file = 'eventi.txt';

// Carica eventi
$eventi = file_exists($file) ? unserialize(file_get_contents($file)) : [];

// Aggiungi evento
if (isset($_POST['add'])) {
    $data = $_POST['data'];
    $evento = trim($_POST['evento']);
    if ($data && $evento) {
        $eventi[$data][] = htmlspecialchars($evento);
        file_put_contents($file, serialize($eventi));
    }
}

// Elimina evento
if (isset($_POST['del'])) {
    unset($eventi[$_POST['data']][$_POST['idx']]);
    if (empty($eventi[$_POST['data']])) unset($eventi[$_POST['data']]);
    file_put_contents($file, serialize($eventi));
}

$oggi = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
    <style>
        body {
            font-family: Arial;
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background: #f0f2f5;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin: 0 0 20px 0;
            color: #1a73e8;
        }

        input,
        button {
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        input {
            flex: 1;
        }

        button {
            background: #1a73e8;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background: #1557b0;
        }

        .evento {
            background: #f8f9fa;
            padding: 10px;
            margin: 8px 0;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .data {
            font-weight: bold;
            color: #1a73e8;
            margin-top: 15px;
        }

        .del-btn {
            background: #dc3545;
            padding: 5px 10px;
            font-size: 12px;
        }

        .del-btn:hover {
            background: #c82333;
        }

        .flex {
            display: flex;
            gap: 10px;
        }

        .vuoto {
            color: #888;
            text-align: center;
            padding: 20px;
        }
    </style>
    <link rel="icon" type="image/png" href="logo.jpg">
</head>

<body>
    <div class="card">
        <h1>📅 themas agenda</h1>

        <form method="POST">
            <div class="flex">
                <input type="date" name="data" value="<?= $oggi ?>" required>
                <input type="text" name="evento" placeholder="Beschrijving van het evenement" required
                    title="voer de desription ann"
                    oninvalid="this.setCustomValidity('❌ moet gevolt worden')"
                    oninput="this.setCustomValidity('')">
                <button type="submit" name="add">➕ Toevoegen</button>
            </div>
        </form>
    </div>
    <div class="card">
        <h3>📋 Lijst met thema</h3>
        <?php if (empty($eventi)): ?>
            <div class="vuoto">Geen themas. Voeg er een toe!</div>
        <?php else: ?>
            <?php ksort($eventi);
            foreach ($eventi as $data => $lista): ?>
                <div class="data">📅 <?= date('d/m/Y', strtotime($data)) ?></div>
                <?php foreach ($lista as $idx => $evento): ?>
                    <div class="evento">
                        <span>📌 <?= $evento ?></span>
                        <form method="POST" style="margin:0">
                            <input type="hidden" name="data" value="<?= $data ?>">
                            <input type="hidden" name="idx" value="<?= $idx ?>">
                            <button type="submit" name="del" class="del-btn">🗑️</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>

</html>