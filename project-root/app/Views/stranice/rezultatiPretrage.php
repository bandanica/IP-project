<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/osnova.css">
</head>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<h2>Rezultati pretrage:</h2>
<?php
if (isset($rezultati) && !empty($rezultati)) {
    ?>
    <table>
        <tr>
            <th></th>
            <th>Slika</th>
            <th>Naziv</th>
            <th>Cena</th>
            <th>Linije</th>
            <th></th>
        </tr>
        <?php

        foreach ($rezultati as $n1) {
            //OVO TREBA DA SE DORADI!!! treba fja koja ce da redirektuje na oglas
            ?>
            <form method='post' action=<?php echo site_url() . "korisnik/pogledaj" ?>>
                <tr>
                    <td><?php //echo $n->getIdK() ?>
                        <input type='hidden' value="<?php echo $n1->getIdn() ?>"
                               name='idNek'>
                    </td>
                    <td><?php if ($n1->getSlike()!=null){
                            //$dir_path = base_url()."/".$n1->getSlike();
                            $dir_path = $n1->getSlike();
                            //echo $dir_path;
                            $slike = scandir($dir_path);
                            $files = array_diff(scandir($dir_path), array('.', '..'));
                            foreach($files as $file){
                                ?>
                                <img src="<?php echo base_url() . "/" . $dir_path."/".$file;?>" alt="slika nekretnine" width="100" height="100">
                                    <?php
                                //echo $file;
                                break;
                            }
                            ?>
<!--                            <div class="fotorama">-->
<!--                                <div data-img="--><?php //echo base_url() . "/" . $n1->getSlike()."stanVracar1.jpg";?><!--">One</div>-->
<!--                                <div data-img="--><?php //echo base_url() . "/" . $n1->getSlike()."stanVracar3.jpg";?><!--"><strong>Two</strong></div>-->
<!--                                <div data-img="--><?php //echo base_url() . "/" . $n1->getSlike()."stanVracar1.jpg";?><!--"><em>Three</em></div>-->
<!--                            </div>-->

                    <?php
                        }?></td>
                    <td><?php echo $n1->getNaziv() ?></td>
                    <td><?php echo $n1->getCena() ?></td>


                    <td><input type='submit' name='dugmeO' value='Pogledaj'></td>
                </tr>
            </form>
            <?php
        }


        ?>
    </table>
    <?php
} else {
    echo "Nema oglasa sa unetim karakteristikama";
}
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


</body>
</html>

