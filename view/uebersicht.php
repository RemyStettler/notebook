<div class="topcorner">
  <form action="/user/logout" method="post">
    <button type="submit" name="button"><img src="/images/logout.png" alt=""></button>
  </form>
</div>

<form action="/uebersicht/speichern" method="post">
  <div id="textfeld">
    <label for="text"><b>Eure Notizen:<b></label>
      <textarea id="notizfeld" name="text" rows="8" cols="80" placeholder="Write something..."></textarea>

      <button type="submit" name="Speichern">Speichern</button>
      <button type="submit" name="Löschen">Alle Notizen Löschen</button>
  </div>
</form>
