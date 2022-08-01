<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CheckUsers implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // If the visitor tries to access our views through segment Auth
        $uri = service('uri');
        if($uri->getSegment(1) == 'auth'){
            if($uri->getSegment(2) == '')
                $segment='/';
            else
                $segment= '/'.$uri->getSegment(2);
            return redirect()->to($segment);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}