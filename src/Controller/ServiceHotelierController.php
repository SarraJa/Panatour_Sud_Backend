<?php

namespace App\Controller;


use App\Entity\Image;
use App\Entity\ServiceHotelier;
use App\Form\ImageFormType;
use App\Repository\ServiceHotelierRepository;
use App\Utils\UploadedBase64File;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\Form;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ServiceHotelierController extends AbstractController
{
    private $ServiceHotelierRepository;



    public function __construct(ServiceHotelierRepository $ServiceHotelierRepository)
    {
        $this->ServiceHotelierRepository = $ServiceHotelierRepository;
    }



    public function __invoke(ServiceHotelier $data)
    {
        dd($data);

    }


    public function add(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $libele = $data['libele'];
        $adresse = $data['adresse'];
        $type = $data['type'];
        $prix = $data['prix'];
       // $imageFile = new UploadedBase64File($data['image']['value'], $data['image']['name']);
       // $image = new Image();
      //  $form = $this->createForm(ImageFormType::class, $image, ['csrf_protection' => false]);
       $img_file = $data['images'];
     //   $data = base64_encode($img);
       $imgData = base64_encode(file_get_contents($img_file));
       $image = 'data: '.mime_content_type($img_file).';base64,'.$imgData;
       /* $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
        $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

        $query = "insert into images(image) values('".$image."')";
        pg_query($con,$query);
        INSERT INTO img (dat) VALUES (decode(BASE64_INPUT_FROM_PHP, 'base64');*/
      /*  $name = $_FILES['file']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            // Upload file
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
                // Insert record
                $query = "insert into image(name) values('".$name."')";
                pg_query($con,$query);
            }

        }*/


        if (empty($libele) || empty($adresse) || empty($type) || empty($prix) ) {
            throw new NotFoundHttpException('Expecting mandatory parameters!');
        }

        $this->ServiceHotelierRepository->saveHotel($libele, $adresse, $type, $prix,$image);

        return new JsonResponse(['status' => 'created!'], Response::HTTP_CREATED);
    }
}

