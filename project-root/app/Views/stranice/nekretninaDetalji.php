<?php
if (isset($nek)){
    ?>
    <h2><?php echo $nek->getNaziv();?></h2>
    <p><?php  echo $nek->getGradid()->getNaziv()." - ".$nek->getOpstina()->getNaziv()." - ".$nek->getMikrolokacija()->getNaziv()." - ".
        $nek->getUlica()->getNaziv();?></p>
    Tip:<?php echo $nek->getTip()->getNazivTipa();?>
    Kvadratura: <?php echo $nek->getKvadratura();?>m2
    Soba: <?php echo $nek->getBrSoba();?>
    <form method='post' action=<?php echo site_url() . "korisnik/dodajUOmiljene" ?>>
        <input type='hidden' value="<?php echo $nek->getIdn() ?>"
               name='idNek'>
        <input type="submit" id="dugmeOmiljene" value="Dodaj u omiljene">
    </form>
<?php

}