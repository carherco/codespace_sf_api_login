<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FileUploadController extends AbstractController
{
    /**
     * @Route("/file", name="file")
     */
    public function index(Request $request): Response
    {
        $nombre = $request->request->get('nombre', '');
        $file = $request->files->get('fichero');
        dump($file);

        $directory = $this->getParameter('upload_images_dir');
        $fileName = 'patata.jpg';
        $file->move($directory, $fileName);
        
        $data['nombre'] = $nombre;
        return $this->json($data);
    }
}
