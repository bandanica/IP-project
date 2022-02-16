<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;


class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if ($session->has("vrstaKor")){
            $idTip = $session->get('vrstaKor')->getIdt();
            switch ($idTip){
                case 3: return redirect()->to(site_url("oglasivac"));
                case 2: return redirect()->to(site_url("oglasivac"));
                case 1: return redirect()->to(site_url("korisnik"));
            }
        } else {
            return redirect()->to(site_url("login"));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}