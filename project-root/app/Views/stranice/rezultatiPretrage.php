<h2>Rezultati pretrage:</h2>
<?php
if (isset($rezultati) && !empty($rezultati)) {
    ?>
    <table>
        <tr>
            <th>Slika</th>
            <th>Naziv</th>
            <th>Cena</th>
            <th>Linije</th>
            <th></th>
        </tr>
        <?php

        foreach ($rezultati as $n1) {
            //OVO TREBA DA SE DORADI!!! treba fja koja ce da redirektuje na oglas
            ?>
            <form method='post' action=<?php echo site_url() . "korisnik/pogledaj" ?>>
                <tr>
                    <td><?php //echo $n->getIdK() ?>
                        <input type='hidden' value="<?php echo $n1->getIdn() ?>"
                               name='idNek'>
                    </td>
                    <td><?php echo $n1->getNaziv() ?></td>
                    <td><?php echo $n1->getCena() ?></td>


                    <td><input type='submit' name='dugmeO' value='Pogledaj'></td>
                </tr>
            </form>
            <?php
        }


        ?>
    </table>
    <?php
} else {
    echo "Nema oglasa sa unetim karakteristikama";
}
?>