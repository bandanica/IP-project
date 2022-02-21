<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/osnova.css">
    <script src="<?php echo base_url(); ?>/js/admin.js"></script>
</head>
<body>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="container-fluid">
    <div class="row pt-4">
        <div class="col-2">
            <h5>Dodavanje mikrolokacije:</h5>
        </div>
        <div class="col">

            <form method="post" action=<?php echo site_url() . "administrator/dodajMikro" ?>>
                Grad:<select name="gr" onclick="promenaGrad()">
                    <option></option>
                    <?php
                    if (isset($gradovi)) {
                        foreach ($gradovi as $g) {
                            ?>
                            <option value= <?php echo $g->getIdg() ?>><?php echo $g->getNaziv(); ?></option>
                            <?php
                        }
                    }
                    ?>

                </select>

                Opstina:<select id="opst" name="opst">
                    <option></option>
                </select>
                Naziv mikrolokaicje:<input type="text" name="naziv">
                <input type="submit" id="dugmeDodaj" value="Dodaj">
            </form>
        </div>

    </div>
    <div class="row">
        <div class="oglas">
            <?php if (isset($prazneLok)) {

                ?>
                <table class="table table-striped table-bordered caption-top" style="width: 100%">
                    <caption class="text-">Mikrolokacije na kojima nema nekretnina</caption>
                    <thead>

                    <tr>
                        <th></th>
                        <th>Naziv</th>
                        <th>Opstina</th>
                        <th>Grad</th>
                        <th class="text-center">Brisanje</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach ($prazneLok as $lok) {
                        {
                            ?>
                            <form method='post' action=<?php echo site_url() . "administrator/brisanjeMikrolokacije" ?>>
                                <tr>
                                    <td><?php //echo $lok->getIdmikro()
                                        ?>
                                        <input type='hidden' value="<?php echo $lok->getIdmikro() ?>"
                                               name='idLok'>
                                    </td>
                                    <td><?php echo $lok->getNaziv() ?></td>
                                    <td><?php $o = $lok->getOpstina();
                                        echo $o->getNaziv(); ?></td>
                                    <td><?php $gr = $o->getGrad();
                                        echo $gr->getNaziv(); ?></td>
                                    <td class="text-center"><input type='submit' name='dugme1' value='Obrisi'></td>
                                </tr>
                            </form>
                            <?php
                        }
                    }

                    ?>
                    </tbody>
                    <tfoot>

                    </tfoot>

                </table>

                <?php

            }
            ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>