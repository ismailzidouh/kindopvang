<?php require_once "./partials/header.php" ?>

<!-- CONTACT -->
<section id="contact" class="section alt">
  <div class="container">
    <h2>Contact</h2>
    <div>
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
    </div>
  </div>
</section>

<?php require_once "./partials/footer.php" ?>