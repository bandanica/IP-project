<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/kupacStil.css">
</head>
<body>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="container-fluid">
    <div class="row text-center">
        <h2>Omiljene nekretnine:</h2>
    </div>

    <?php
    if (isset($rezultati) && !empty($rezultati)) {
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

        foreach ($rezultati as $n1) {
            //OVO TREBA DA SE DORADI!!! treba fja koja ce da redirektuje na oglas
            ?>
            <form method='post' action=<?php echo site_url() . "korisnik/omiljenaObrada" ?>>
                <div class="row">
                    <div class="card mb-3 text-dark bg-light" style="max-width: 700px;">
                        <div class="col-4">
                            <?php if ($n1->getSlike() != null) {
                                //$dir_path = base_url()."/".$n1->getSlike();
                                $dir_path = $n1->getSlike();
                                //echo $dir_path;
                                $slike = scandir($dir_path);
                                $files = array_diff(scandir($dir_path), array('.', '..'));
                                foreach ($files as $file) {
                                    ?>
                                    <img src="<?php echo base_url() . "/" . $dir_path . "/" . $file; ?>"
                                         class="img-fluid rounded-start" alt="slika nekretnine">

                                    <?php
                                    //echo $file;
                                    break;
                                }
                                ?>

                                <?php
                            } else {
                                ?>
                                <img src="<?php echo base_url() . "/noimage/noim.jpg"; ?>"
                                     class="img-fluid rounded-start"
                                     alt="slika nekretnine">
                                <?php
                            } ?>
                        </div>
                        <div class="col-6">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $n1->getNaziv() ?></h5>
                                <input type='hidden' value="<?php echo $n1->getIdn() ?>"
                                       name='idNek'>
                                <!--                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>-->
                                <p class="card-text"><small class="text-muted"><?php echo $n1->getCena() ?>EUR</small>
                                </p>
                                <input type='submit' name='dugmeOm' value='Pogledaj'>
                                <input type='submit' name='dugmeOm' value='Izbaci iz omiljenih'>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <?php
        }


        ?>

        <?php
    } else {
        echo "Nema oglasa sa unetim karakteristikama";
    }
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>
</html>