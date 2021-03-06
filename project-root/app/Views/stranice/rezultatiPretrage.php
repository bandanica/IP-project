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

<div class="container-fluid sredina">
    <div class="row text-center">
        <h2>Rezultati pretrage:</h2>
    </div>

    <?php
    if (isset($rezultati) && !empty($rezultati) && isset($proseci)) {
        ?>
<!--        <table>-->
<!--            <tr>-->
<!--                <th></th>-->
<!--                <th>Slika</th>-->
<!--                <th>Naziv</th>-->
<!--                <th>Cena</th>-->
<!--                <th>Linije</th>-->
<!--                <th></th>-->
<!--            </tr>-->
            <?php
            $brojac = 0;
            foreach ($rezultati as $n1) {
                //OVO TREBA DA SE DORADI!!! treba fja koja ce da redirektuje na oglas
                ?>
                <form method='get' action=<?php echo site_url() . "korisnik/pogledaj" ?>>
                <div class="card mb-3 offset-3 text-dark bg-light shadow" style="max-width: 700px;"">
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
                                <h5 class="card-title"><?php echo $n1->getNaziv().", " ?> <?php echo $n1->getCena() ?> &euro;</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $n1->getGradid()->getNaziv() . " - opstina " . $n1->getOpstina()->getNaziv() . " - " . $n1->getMikrolokacija()->getNaziv(); ?></h6>
                                <input type='hidden' value="<?php echo $n1->getIdn() ?>"
                                       name='idNek'>
                                <!--                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->

                                <p class="card-text"><small class="text-muted">Kvadratura: <?php echo $n1->getKvadratura() ?>m2|
                                        Sobe: <?php echo $n1->getBrSoba() ?>|
                                        Sprat: <?php echo $n1->getSprat() ?><br/>
                                        <?php echo $n1->getOpis() ?></small></p>
                                <!--                <p> --><?php //echo $n1->getIdn(); ?><!--</p>-->
                                <p class="card-text text-muted"><small>Linije: <?php if ($n1->getLinijeprevoza()!=""){
                                            echo $n1->getLinijeprevoza();
                                        }?></small></p>
                                <p class="card-text text-muted"><small>Prosek: <?php if (isset($proseci[$brojac]) && $proseci[$brojac]!=null){
                                            $ispis = number_format((float)$proseci[$brojac], 2, '.', '');
                                            echo $ispis;
                                        }?> &euro; /m2</small></p>
                                <input type='submit' name='dugmeO' value='Pogledaj'>
                            </div>
                        </div>
                    </div>
                </div>
                </form>



                <?php
                $brojac+=1;
            }


            ?>

        <?php
    } else {
        echo "Nema oglasa sa unetim karakteristikama";
    }
    ?>




<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <?php
            $prev="#";
            $next ="#";
            if (isset($nump) && isset($page)){
                if ($page>1){
                    $prev = $page-1;
                }
                else{
                    $prev=1;
                }
                if ($page<$nump){
                    $next = $page+1;
                }
                else{
                    $next = $page;
                }
            }?>
            <a class="page-link" href="<?php echo site_url() . "korisnik/slStranaNapredno?page=".$prev?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <!--                <span class="sr-only">Previous</span>-->
            </a>
            <!--            <a class="page-link" href="#">Previous</a>-->
        </li>
        <?php
        if (isset($nump) && isset($page)){
            for ($i=1;$i<=$nump;$i++){
                if ($i==$page){
                    ?>
                    <li class="page-item active"><a class="page-link" href="<?php echo site_url() . "korisnik/slStranaNapredno?page=".$i?>"><?php echo $i;?></a></li>
                    <?php

                }
                else{
                    ?>
                    <li class="page-item"><a class="page-link" href="<?php echo site_url() . "korisnik/slStranaNapredno?page=".$i?>"><?php echo $i;?></a></li>
                    <?php
                }

            }
        }


        ?>
        <!--        <li class="page-item"><a class="page-link" href="#">1</a></li>-->
        <!--        <li class="page-item"><a class="page-link" href="#">2</a></li>-->
        <!--        <li class="page-item"><a class="page-link" href="#">3</a></li>-->
        <li class="page-item">
            <a class="page-link" href="<?php echo site_url() . "korisnik/slStranaNapredno?page=".$next?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
            <!--            <a class="page-link" href="#">Next</a>-->
        </li>
    </ul>
</nav>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


</body>
</html>

