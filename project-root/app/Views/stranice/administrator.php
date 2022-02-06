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
            <th>Prihvatanje</th>
            <th>Odbijanje</th>
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