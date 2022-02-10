<form method='post' action=<?php echo site_url() . "administrator/kreirajAgenciju" ?>>
    Naziv:<input type="text" name="imeAg"><br/>
    PIB:<input type="text" name="pib"><br/>
    Kontakt telefon:<input type="text" name="telAg"><br/>
    Adresa:<input type="text" name="adrAg"><br/>
    Grad:<select name="gradici" onchange="f()">
        <?php
        if (isset($gradovi)) {
            foreach ($gradovi as $g) {
                ?>
                <option><?php echo $g->getNaziv() ?> </option>
                <?php
            }
        }
        ?>

    </select>
    <br/>
    <input type="submit" id="dugmeID" value="Zavrsi">
</form>
