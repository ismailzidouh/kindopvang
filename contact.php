<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <?php require_once "./partials/header.php" ?>
</head>
<body>
        <!-- CONTACT -->
    <section id="contact" class="section alt">
      <div class="container">
        <h2>Contact</h2>
        <div class="grid-2">
          <div>
            <p>
              Heb je een vraag, wil je meer informatie of een vrijblijvend gesprek plannen?
              Laat je gegevens achter, dan nemen wij zo snel mogelijk contact met je op.
            </p>
            <form class="contact-form">
              <div class="form-group">
                <label for="naam">Naam</label>
                <input type="text" id="naam" name="naam" placeholder="Je naam" required />
              </div>
              <div class="form-group">
                <label for="email">E-mailadres</label>
                <input type="email" id="email" name="email" placeholder="je@voorbeeld.nl" required />
              </div>
              <div class="form-group">
                <label for="onderwerp">Onderwerp</label>
                <input type="text" id="onderwerp" name="onderwerp" placeholder="Waar gaat je vraag over?" />
              </div>
              <div class="form-group">
                <label for="bericht">Bericht</label>
                <textarea id="bericht" name="bericht" rows="4" placeholder="Schrijf hier je bericht..." required></textarea>
              </div>
              <button type="submit" class="btn-primary">Verstuur bericht</button>
            </form>
          </div>
          <?php 
          require_once "./partials/footer.php"
          ?>
</html>