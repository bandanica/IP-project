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
            if (isset($mojenekretnine) && !empty($mojenekretnine)) {
                ?>
                <table class="table table-striped table-bordered caption-top" style="width: 100%">
                    <caption>Vasi oglasi:</caption>
                    <thead>
                    <tr>
                        <th></th>
                        <th>Naziv</th>
                        <th>Cena</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
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
                                <td><?php echo $n1->getCena()." EUR"; ?></td>
                                <?php if ($n1->getStatus() == 'Aktivno') {
                                    ?>
                                    <td class="text-center"><input type='submit' name='dugmeNek' value='izmeni'></td>
                                    <td class="text-center"><input type='submit' name='dugmeNek' value='prodato'></td>
                                    <?php
                                } else {
                                    ?>
                                    <td colspan="2" class="text-center">Prodato</td>
                                    <?php
                                } ?>

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
                echo "Nemate aktivnih oglasa.";
            }
            ?>
        </div>
    </div>
</div>


<!--<form action=--><?php //echo site_url() . "oglasivac/novaNekretnina" ?><!--
    <input type="submit" id="dodajNekretninu" value="Dodaj novu nekretninu">-->
<!---->
<!--</form>-->
<!--<form action=--><?php //echo site_url() . "oglasivac/promenaLozinke" ?><!--
    <input type="submit" id="dugmeLozinka" value="Promena lozinke">-->
<!---->
<!--</form>-->
<!---->
<!--<form action=--><?php //echo site_url() . "oglasivac/podaciIzmena" ?><!--
   <input type="submit" id="dugmePodaci" value="Osnovni podaci i izmena">-->
<!---->
<!--</form>-->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>
</html>