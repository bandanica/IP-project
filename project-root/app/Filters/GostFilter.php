<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

/*
 * klasa GostFilter se poziva prilikom poziva Login kontrolera
 * propusta svakoga jer korisnik treba da ima mogucnost gosta
 */
class GostFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if ($session->has("vrstaKor")){
            $path = $_SERVER['REQUEST_URI'];
            $method = explode("/", $path)[1];
            if ($method=="logout" || $method=="registrovan"){
                return;
            }

            $tip = $session->get('vrstaKor');
            $idTipKor = $tip->getIdt();

            switch ($idTipKor){
                case 4: return redirect()->to(site_url("administrator"));
                case 3: return redirect()->to(site_url("oglasivac"));
                case 2: return redirect()->to(site_url("oglasivac"));
                case 1: return redirect()->to(site_url("korisnik"));
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}