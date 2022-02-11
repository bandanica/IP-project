<html>
<head>
    <script src="<?php echo base_url(); ?>/js/admin.js"></script>
</head>
<body>
<form method="post" action=<?php echo site_url() . "administrator/dodajUl" ?>>
    Grad:<select name="gr" onchange="promenaGrad()">
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

    Opstina:<select id="opst" name="opst" onchange="promenaOpstina()">
        <option></option>
    </select>

    Mikrolokacija:<select id="lok" name="lok" onchange="promenaLokacije()">
        <option></option>
    </select>
    Naziv ulice:<input type="text" name="naziv">
    <input type="submit" id="dugmeDodaj">
</form>
</body>
</html>