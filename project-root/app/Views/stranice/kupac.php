<form action=<?php echo site_url() . "korisnik/promenaLozinke" ?>>
    <input type="submit" id="dugmeLozinka" value="Promena lozinke">

</form>
<?php if (isset($poruka2)){
    echo $poruka2;

}?>