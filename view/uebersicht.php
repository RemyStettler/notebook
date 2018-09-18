<div class="topcorner">
  <form action="/user/logout" method="post">
    <button type="submit" name="button"><img src="/images/logout.png" alt=""></button>
  </form>
</div>

<form action="/uebersicht/speichern" method="post">
  <div class="textfeld">
    <label for="text"><b>Neue Notiz (max. 1000 Zeichen):<b></label>
      <textarea required class="notizfeld" name="text" rows="8" cols="80" placeholder="Write something..."></textarea>

      <button type="submit" name="Speichern">Speichern</button>
  </div>
</form>

  <form action="/uebersicht/loeschen" method="post">
    <div class="textfeld">
      <label for="erstelltenotizen"><b>Erstellte Notizen:<b></label>
        <!-- <textarea readonly class="notizfeld" name="erstelltenotizen" rows="8" cols="80"><?php //echo $allenotizen ?></textarea> -->
        <table>
          <?php
            foreach ($allenotizen as $notiz)
            {
              echo "<tr>";
              echo "<td>".$notiz->notiz."</td>";
              echo "</tr>";
            }
           ?>
        </table>
          <button type="submit" name="Löschen">Alle Notizen Löschen</button>
    </div>
  </form>
