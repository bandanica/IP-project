<html>
<head>
    <script src="<?php echo base_url(); ?>/js/novaNek.js"></script>
</head>
<body>
<form >
    Naziv nekretnine:<input type="text" name="nazivN"><br/>
    Grad:<select name="gr" onchange="promenaGrad()">
        <option></option>
        <?php
        if (isset($gradovi)){
            foreach ($gradovi as $g){
                ?>
        <option value = <?php echo $g->getIdg()?>><?php echo $g->getNaziv();?></option>
            <?php
            }
        }
        ?>

    </select>
    <div id="op" hidden>
        Opstine:<select id="opst">

        </select>

    </div>
    <input type="submit" name="dodaj" value="Zavrsi">
</form>
</body>
</html>
