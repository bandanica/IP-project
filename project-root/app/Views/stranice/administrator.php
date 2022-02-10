<h2>Korisnicki zahtevi:</h2>
<?php
if (isset($zahtevi) && !empty($zahtevi)) {
    ?>
    <table>
        <tr>
            <th>IdK</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Korisnicko ime</th>
            <th>Odbijanje</th>
            <th>Prihvatanje</th>
        </tr>
        <?php

        foreach ($zahtevi as $z) {
            ?>
            <form method='post' action=<?php echo site_url() . "administrator/obradi" ?>>
                <tr>
                    <td><?php echo $z->getIdK() ?>
                        <input type='hidden' value="<?php echo $z->getIdK() ?>"
                               name='idKor'>
                    </td>
                    <td><?php echo $z->getIme() ?></td>
                    <td><?php echo $z->getPrezime() ?></td>
                    <td><?php echo $z->getKorIme() ?></td>
                    <td><input type='submit' name='dugme' value='odbij'></td>
                    <td><input type='submit' name='dugme' value='prihvati'></td>
                </tr>
            </form>
            <?php
        }


        ?>
    </table>
    <?php
} else {
    echo "Nema zahteva za registracijom.";
}
?>
<h2>Svi korisnici</h2>
<?php
if (isset($korisnici) && !empty($korisnici)) {
    ?>
    <table>
        <tr>
            <th>IdK</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Korisnicko ime</th>
            <th>Status</th>
            <th>Azuriranje</th>
            <th>Brisanje</th>
        </tr>
        <?php

        foreach ($korisnici as $k) {
            ?>
            <form method='post' action=<?php echo site_url() . "administrator/azuriranje" ?>>
                <tr>
                    <td><?php echo $k->getIdK() ?>
                        <input type='hidden' value="<?php echo $k->getIdK() ?>"
                               name='idKor'>
                    </td>
                    <td><?php echo $k->getIme() ?></td>
                    <td><?php echo $k->getPrezime() ?></td>
                    <td><?php echo $k->getKorIme() ?></td>
                    <td><?php echo $k->getStatus() ?></td>
                    <td><input type='submit' name='dugme1' value='Azuriraj'></td>
                    <td><input type='submit' name='dugme1' value='Obrisi'></td>
                </tr>
            </form>
            <?php
        }


        ?>
    </table>
    <?php
} else {
    echo "Nema korisnika.";
}
?>


<form method="post" action=<?php echo site_url() . "administrator/noviKorisnikAdmin" ?>>
    <input type="submit" name="noviKorisnik1" value="Dodaj kupca ili oglasivaca">
</form>
<form method="post" action=<?php echo site_url() . "administrator/novaAgencijaAdmin" ?>>
    <input type="submit" name="novaAgencija1" value="Dodaj agenciju">
</form>
<form action="" method="post">
    <input type="submit" name="novaMikro1" value="Dodaj mikrolokaciju">
</form>
<form>
    <input type="submit" name="novaUlica1" value="Dodaj ulicu">
</form>
<form method='post' action=<?php echo site_url() . "login/logout" ?>>
    <input type="submit" name="logout" value="Odjavi se">

</form>