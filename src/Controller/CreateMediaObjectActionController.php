<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Image;

class CreateMediaObjectActionController extends AbstractController
{
    public function __invoke(Request $request): Image
    {
        $uploadedFile = $request->files->get('imageFile');

        if (!$uploadedFile) {
            throw new BadRequestHttpException('"imageFile" is required');
        }

        $mediaObject = new Image();
        $mediaObject->imageFile = $uploadedFile;

        return $mediaObject;
    }
}
