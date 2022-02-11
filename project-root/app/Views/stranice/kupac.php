<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/pretragaNekretnina.css">
    <script src="<?php echo base_url(); ?>/js/kupac.js"></script>
</head>
<body>


<h2>Pretraga nekretnina:</h2>
<form name="Forma za pretragu" method="post" action=<?php echo site_url() . "korisnik/pretragaNekretnine" ?>>
    Tip:<select name="izabranTip" required>
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

    Lokacija:<select name="Lokacija[]" multiple>
        <option></option>
        <?php
        if (isset($lokacije)) {
            foreach ($lokacije as $l) {
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

    <!--            <input type="text" name="lok" aria-autocomplete="list" aria-haspopup="true" placeholder="Upisi lokaciju...">-->


    Cena DO (EUR):<input type="text" name="cenaDO">
    Kvadratura OD (m2): <input type="text" name="kvadrOD">
    Min. br. soba:<select name="brs">
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
    <input type="submit" id="pret" value="Pretrazi">

</form>

<form action=<?php echo site_url() . "korisnik/naprednaPretraga" ?>>
    <input type="submit" id="dugmeNapredno" value="Napredna pretraga">

</form>

<form action=<?php echo site_url() . "korisnik/promenaLozinke" ?>>
    <input type="submit" id="dugmeLozinka" value="Promena lozinke">

</form>
<form method='post' action=<?php echo site_url() . "login/logout" ?>>
    <input type="submit" name="logout" value="Odjavi se">

</form>
<?php if (isset($poruka2)) {
    echo $poruka2;

} ?>

</body>
</html>
