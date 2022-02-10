<h2>Vasi oglasi:</h2>
<?php
if (isset($mojenekretnine) && !empty($mojenekretnine)) {
    ?>
    <table>
        <tr>
            <th></th>
            <th>Naziv</th>
            <th>Cena</th>
            <th></th>
            <th></th>
        </tr>
        <?php

        foreach ($mojenekretnine as $n1) {
            ?>
            <form method='post' action=<?php echo site_url() . "oglasivac/obradi" ?>>
                <tr>
                    <td><?php //echo $n->getIdK() ?>
                        <input type='hidden' value="<?php echo $n1->getIdn() ?>"
                               name='idNek'>
                    </td>
                    <td><?php echo $n1->getNaziv() ?></td>
                    <td><?php echo $n1->getCena() ?></td>

                    <td><input type='submit' name='dugmeNek' value='izmeni'></td>
                    <td><input type='submit' name='dugmeNek' value='prodato'></td>
                </tr>
            </form>
            <?php
        }


        ?>
    </table>
    <?php
} else {
    echo "Nemate aktivnih oglasa.";
}
?>
<form action=<?php echo site_url() . "oglasivac/novaNekretnina" ?>>
    <input type="submit" id="dodajNekretninu" value="Dodaj novu nekretninu">

</form>
<form action=<?php echo site_url() . "oglasivac/promenaLozinke" ?>>
    <input type="submit" id="dugmeLozinka" value="Promena lozinke">

</form>

<form action=<?php echo site_url() . "oglasivac/podaciIzmena" ?>>
    <input type="submit" id="dugmePodaci" value="Osnovni podaci i izmena">

</form>

<form method='post' action=<?php echo site_url() . "login/logout" ?>>
    <input type="submit" name="logout" value="Odjavi se">

</form>