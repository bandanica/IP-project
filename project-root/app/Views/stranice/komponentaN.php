<form method='get' action=<?php echo site_url() . "korisnik/pogledaj" ?>>
    <div class="card mb-3 offset-3 text-dark bg-light" style="max-width: 700px;"">
    <div class="row g-0">
        <div class="col-4">
            <?php if ($n1->getSlike() != null) {
                //$dir_path = base_url()."/".$n1->getSlike();
                $dir_path = $n1->getSlike();
                //echo $dir_path;
                $slike = scandir($dir_path);
                $files = array_diff(scandir($dir_path), array('.', '..'));
                foreach ($files as $file) {
                    ?>
                    <img src="<?php echo base_url() . "/" . $dir_path . "/" . $file; ?>" class="img-fluid rounded-start" alt="slika nekretnine">

                    <?php
                    //echo $file;
                    break;
                }
                ?>

                <?php
            }
            else{
                ?>
                <img src="<?php echo base_url() . "/noimage/noim.jpg"; ?>" class="img-fluid rounded-start" alt="slika nekretnine">
                <?php
            }?>
        </div>
        <div class="col-8">
            <div class="card-body">
                <h5 class="card-title"><?php echo $n1->getNaziv()."," ?> <?php echo $n1->getCena() ?>EUR</h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $n1->getGradid()->getNaziv() . " - opstina " . $n1->getOpstina()->getNaziv() . " - " . $n1->getMikrolokacija()->getNaziv(); ?></h6>
                <input type='hidden' value="<?php echo $n1->getIdn() ?>"
                       name='idNek'>
                <!--                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->

                <p class="card-text"><small class="text-muted">Kvadratura: <?php echo $n1->getKvadratura() ?>m2|
                        Sobe: <?php echo $n1->getBrSoba() ?>|
                        Sprat: <?php echo $n1->getSprat() ?><br/>
                        <?php echo $n1->getOpis() ?></small></p>

                <input type='submit' name='dugmeO' value='Pogledaj'>
            </div>
        </div>
    </div>
    </div>
</form>