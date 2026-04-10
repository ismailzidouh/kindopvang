<?php require_once "./partials/header.php" ?>

<main>
  <!-- HOME -->
  <section id="home" class="hero">
    <div class="hero-inner">
      <h1>Alles voor een veilige en speelse wereld voor kinderen</h1>
      <p>
        ALLESKIDSBV ondersteunt ouders en organisaties met professionele kinderopvangoplossingen,
        educatieve programma’s en deskundig advies.
      </p>
      <div class="hero-buttons">
        <a href="diensten.php" class="btn-primary">Ontdek onze diensten</a>
        <a href="contact.php" class="btn-secondary">Neem contact op</a>
      </div>
    </div>
  </section>
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

    <meta charset="UTF-8">
    <title>Agenda</title>
    
</head>
<body>

<div class="card">
    <h3>📋 Lijst met themas</h3>
    <?php if (empty($eventi)): ?>
        <div class="vuoto">Geen themas!</div>
    <?php else: ?>
        <?php ksort($eventi); foreach ($eventi as $data => $lista): ?>
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
  <!-- OVER ONS -->
  <section id="over-ons" class="section">
    <div class="container">
      <h2>Over ons</h2>
      <p>
        ALLESKIDSBV staat voor een veilige, speelse en leerzame omgeving voor ieder kind.
        Met jarenlange ervaring in kinderopvang, educatie en begeleiding werken wij samen
        met ouders en organisaties aan de beste start voor kinderen.
      </p>
      <div class="grid-2">
        <div>
          <h3>Missie & visie</h3>
          <p>
            Onze missie is om kinderen te laten groeien in een omgeving waar veiligheid,
            plezier en ontwikkeling centraal staan. We geloven in speels leren, positieve
            begeleiding en nauwe samenwerking met ouders en professionals.
          </p>
        </div>
        <div>
          <h3>Kernwaarden</h3>
          <ul class="checklist">
            <li>Veiligheid en betrouwbaarheid</li>
            <li>Professionele en betrokken medewerkers</li>
            <li>Speels leren en ontdekken</li>
            <li>Transparante communicatie met ouders en partners</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</main>
<?php require_once "./partials/footer.php"?>