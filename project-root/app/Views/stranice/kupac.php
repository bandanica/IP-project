<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/kupacStil.css">
    <script src="<?php echo base_url(); ?>/js/kupac.js"></script>
</head>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="container-fluid sredina" >
    <div class="row">
        <div class="col-2">
            <h5>Pretraga nekretnina:</h5>
        </div>
    </div>
    <div class="row">
<!--        <form name="Forma za pretragu" method="post" action=--><?php //echo site_url() . "korisnik/pretragaNekretnine" ?>

            Tip:<select id="izabranTip" required>
                <?php
                if (isset($tipoviN)) {
                    foreach ($tipoviN as $n) {
                        ?>
                        <option><?php echo $n->getNazivTipa(); ?></option>
                        <?php
                    }
                }
                ?>
            </select>


            Lokacija:<select multiple id="Lokacija">
                <option></option>
                <?php
                if (isset($lokacije)) {
                    $j = 0;
                    foreach ($lokacije as $l) {
                        $j += 1;
                        ?>
                        <option><?php echo $l; ?></option>
                        <script>
                            save("<?php echo $l?>");
                        </script>
                        <?php
                    }
                }
                ?>

            </select>


            <!--    <section class="main">-->
            <!--        Lokacija:-->
            <!--        <div class="search" autocomplete="off" method="post" action="">-->
            <!--            <input autocomplete="false" name="hidden" type="text" style="display:none;">-->
            <!--            <input type="text" name="q" placeholder="Unesite lokaciju..." id="searchBox"/>-->
            <!--            <ul class="results" id="suggestionsList">-->
            <!---->
            <!--            </ul>-->
            <!--        </div>-->
            <!--    </section>-->


            <!--            <input type="text" name="lok" aria-autocomplete="list" aria-haspopup="true" placeholder="Upisi lokaciju...">-->


            Cena DO (EUR):<input type="text" id="cenaDO">


            Kvadratura OD (m2): <input type="text" id="kvadrOD">


            Min. br. soba:<select id="brs">
                <option></option>
                <option>1</option>
                <option>1.5</option>
                <option>2</option>
                <option>2.5</option>
                <option>3</option>
                <option>3.5</option>
                <option>4</option>
                <option>4.5</option>
                <option>5</option>
                <option>5+</option>
            </select>


            <input type="submit" id="pret" name="dP" value="Pretrazi" onclick="NadjiNekretnine()">

<!--        </form>-->

    </div>
    <div class="row">
        <div class="listaNek" id="prikazN">

        </div>
    </div>




    <?php if (isset($poruka2)) {
        echo $poruka2;

    } ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
