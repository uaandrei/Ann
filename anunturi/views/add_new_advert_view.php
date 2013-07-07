<form>
  <h3 id="myModalLabel" class="text-center">Adauga anunt nou</h3>
  <label>Email</label>
  <input type="email" name="email" class="span9" required>
  <div class="controls-row">
    <select class="span3" name="category">
      <?php
      foreach ($categories as $category)
      {
        echo "<option value='$category->id'>$category->name</option>";
      }
      ?>
    </select>
    <input class="span9" type="text" placeholder="Titlu anunt" required title="Va rugam introduceti titlul anuntului">
  </div>
  <div class="controls">
    <textarea rows="4" class="span12" placeholder="Descriere anunt"></textarea>
  </div>
  <div class="controls-row">
    <input type="number" class="span3" placeholder="Pret anunt">
    <select class="span2">
      <option>RON</option>
      <option>EUR</option>
    </select>
  </div>
  <div class="controls-row">
    <div class="controls inline">
      <label>Judet</label>
      <select>
        <option>Alege judet...</option>
        <option>Brasov</option>
        <option>Harghita</option>
      </select>
    </div>
    <div class="controls inline">
      <label>Oras</label>
      <select>
        <option>Brasov</option>
        <option>Toplita</option>
      </select>
    </div>
  </div>
  <label>
    Tip anunt
    <div class="controls">
      <label class="radio">
        <input type="radio" name="tip_anunt" value="oferta" checked>
        Oferta
      </label>
      <label class="radio">
        <input type="radio" name="tip_anunt" value="cerere">
        Cerere
      </label>
    </div>
  </label>
  <div class="horizontal-separator"></div>
  <button class="btn btn-primary" type="submit">Adauga</button>
</form>
