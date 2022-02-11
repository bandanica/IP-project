<html>
<head>
    <script src="<?php echo base_url(); ?>/js/admin.js"></script>
</head>
<body>
<form method="post" action=<?php echo site_url() . "administrator/dodajMikro" ?>>
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

    Opstina:<select id="opst" name="opst">
        <option></option>
    </select>
    Naziv mikrolokaicje:<input type="text" name="naziv">
    <input type="submit" id="dugmeDodaj">
</form>
</body>
</html>