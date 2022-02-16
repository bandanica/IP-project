<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class KorisnikFilter implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        $path = $_SERVER['REQUEST_URI'];
        $method = explode("/", $path);
        if (!isset($_SESSION['vrstaKor']) && sizeof($method) > 2) {
            $method = $method[2];
            if (!($method == "naprednaPretraga" || $method == "pretragaNekretnine"
                || $method == "promenaStranice" || $method == "Pogledaj"
                || $method == "izvrsiNapredno" || $method == "dodajUOmiljene"
                || $method == "pogledajOmiljenje" || $method == "omiljenaObrada")) {
                return redirect()->to(site_url("Login"));
            }
            return;
        }

        if ($session->has("vrstaKor")) {
            $tip = $session->get('vrstaKor');
            $idTipKor = $tip->getIdt();

            switch ($idTipKor) {
                case 4:
                    return redirect()->to(site_url("administrator"));
                case 3:
                    return redirect()->to(site_url("oglasivac"));
                case 2:
                    return redirect()->to(site_url("oglasivac"));
            }
        } else {
            return redirect()->to(site_url("korisnik"));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }

}