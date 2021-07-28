<?php

namespace App\Controller;

use App\Entity\Image;
use App\Form\ImageFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Utils\UploadedBase64File;
use App\Utils\Base64FileExtractor;

class ImageController extends AbstractController
{
    public function __invoke(Image $data)
    {
        dd($data);

    }

    /**
     * @Route("/api/images", methods={"POST"}, name="api_add_image")
     */
    public function addImage(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        if($data === null
            || !is_array($data)
            || count($data) !== 1
            || !isset($data['image']['name'], $data['image']['value'])
            || count($data['image']) !== 2
        ) {
            // Throw invalid format request for image
        }

        $imageFile = new UploadedBase64File($data['image']['value'], $data['image']['name']);
        $image = new Image();
        $form = $this->createForm(ImageFormType::class, $image, ['csrf_protection' => false]);

    }
}
