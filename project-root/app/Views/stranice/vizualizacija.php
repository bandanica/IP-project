<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/osnova.css">

    <script src="https://d3js.org/d3.v7.min.js"></script>
</head>
<body>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="container-fluid sredina">
    <div class="row">
        <div class="col-4">
            <?php
            if (isset($ogl) && ($ogl == 'agent')) {
                ?>
                    <input type="hidden" id="ogl" value="<?php echo $ogl?>">
                <h2>Broj prodatih nekretnina po mesecima za vasu agenciju:</h2>
                <?php
            } elseif (isset($ogl) && isset($lokacije)) {
                ?>
                <input type="hidden" id="ogl" value="<?php echo $ogl?>">
                <h2>Broj prodatih nekretnina po mesecima za mikrolokaciju:</h2>
                <select id="mikLok" onchange="iscrtavanjeGrafikona()">
                    <?php
                    foreach ($lokacije as $l) {
                        ?>
                        <option><?php echo $l->getNaziv(); ?></option>
                        <?php
                    }
                    ?>
                </select>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
    if (isset($ogl)) {
        ?>
        <div class="row text-center justify-content-center">
            <div class="col text-center justify-content-center">
                <div id="d3-container" class="justify-content-center">

                </div>

            </div>
        </div>
        <?php
    }
    ?>
</div>

<script src="<?php echo base_url(); ?>/js/vizualizacija.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>