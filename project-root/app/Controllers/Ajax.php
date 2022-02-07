<?php

namespace App\Controllers;

class Ajax extends BaseController
{
    public function index()
    {
        return view("stranice/ajax");
    }

    public function korisnici()
    {
        $svi = $this->doctrine->em->getRepository(\App\Models\Entities\Korisnik::class)->findAll();
        $korImena = [];
        foreach ($svi as $k)
            array_push($korImena, [
                "ime" => $k->getKorIme()
            ]);
        return json_encode($korImena);
    }

    public function korisnik()
    {
        if ($this->request->getMethod() != 'post') {
            return 'mora get zahtev';
        }
        $id = $this->request->getVar("id");
        $k = $this->doctrine->em->getRepository(\App\Models\Entities\Korisnik::class)->find($id);
        if ($k) {
            return json_encode([
                "ime" => $k->getIme(),
                "prezime" => $k->getPrezime()
            ]);
        }
        return "ne postoji";
    }
}