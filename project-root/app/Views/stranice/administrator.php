<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/osnova.css">
</head>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="container-fluid">

    <div class="row">

        <div class="col">

            <?php
            if (isset($korisnici) && !empty($korisnici)) {
                ?>
                <table class="table table-striped table-bordered caption-top" style="width: 100%">
                    <caption>Lista svih korisnici</caption>
                    <thead>

                    <tr>
                        <th>IdK</th>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Korisnicko ime</th>
                        <th>Status</th>
                        <th>Azuriranje</th>
                        <th>Brisanje</th>
                    </tr>
                    </thead>
                    <tbody>
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
                    </tbody>
                    <tfoot>

                    </tfoot>

                </table>
                <?php
            } else {
                echo "Nema korisnika.";
            }
            ?>
        </div>
        <div class="col">

            <?php
            if (isset($zahtevi) && !empty($zahtevi)) {
                ?>
                <table class="table table-striped table-bordered caption-top" style="width: 100%">
                    <caption>Korisnicki zahtevi</caption>
                    <thead>
                    <tr>
                        <th>IdK</th>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Korisnicko ime</th>
                        <th>Odbijanje</th>
                        <th>Prihvatanje</th>
                    </tr>
                    </thead>
                    <tbody>
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
                    </tbody>
                    <tfoot>

                    </tfoot>


                </table>
                <?php
            } else {
                echo "Nema zahteva za registracijom.";
            }
            ?>
        </div>
    </div>

    <!--    <form method="post" action=--><?php //echo site_url() . "administrator/noviKorisnikAdmin" ?><!--
        <input type="submit" name="noviKorisnik1" value="Dodaj kupca ili oglasivaca">-->
    <!--    </form>-->
    <!--    <form method="post" action=--><?php //echo site_url() . "administrator/novaAgencijaAdmin" ?><!--
        <input type="submit" name="novaAgencija1" value="Dodaj agenciju">-->
    <!--    </form>-->
    <!--    <form method="post" action=--><?php //echo site_url() . "administrator/novaLokacijaAdmin" ?><!--
        <input type="submit" name="novaMikro1" value="Dodaj mikrolokaciju">-->
    <!--    </form>-->
    <!--    <form method="post" action=--><?php //echo site_url() . "administrator/novaUlicaAdmin" ?><!--
        <input type="submit" name="novaUlica1" value="Dodaj ulicu">-->
    <!--    </form>-->
    <!--    <form method='post' action=--><?php //echo site_url() . "login/logout" ?><!--
        <input type="submit" name="logout" value="Odjavi se">-->

    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
