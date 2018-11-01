<?php

header('content-type: text/html; charset=utf-8');
mb_internal_encoding('UTF-8');

include('class/PDOFactory.php');
include('class/ArticlesManagerPDO.php');
include('class/Pictures.php');
include('class/Paragraph.php');
include('class/Articles.php');

$db = PDOFactory::getMysqlConnexion();
$manager = new ArticlesManagerPDO($db);

const IMG_PATH = 'img/';


if(isset($_POST['submit'])){

    $miniaturePicture = new Pictures(array(
        'filePath' => IMG_PATH,
        'type' => Pictures::MINIATURE_PICTURE,
        'fileName' => $_FILES['miniaturePicture']['name'],
        'tmpName' => $_FILES['miniaturePicture']['tmp_name'],
        'errorFile' => $_FILES['miniaturePicture']['error'],
        'size' => $_FILES['miniaturePicture']['size'],
        'name' => $_POST['miniatureName'],
        'source' => $_POST['miniatureSource']
    ));

    $carouselPicture = new Pictures(array(
        'filePath' => IMG_PATH,
        'type' => Pictures::CAROUSEL_PICTURE,
        'fileName' => $_FILES['carouselPicture']['name'],
        'tmpName' => $_FILES['carouselPicture']['tmp_name'],
        'errorFile' => $_FILES['carouselPicture']['error'],
        'size' => $_FILES['carouselPicture']['size'],
        'name' => $_POST['carouselName'],
        'source' => $_POST['carouselSource']
    ));
    $pictures = [];
    if(isset($_POST['picturesName']))
    {
        $pictureSize = count($_POST['picturesName']);
        for($i=0; $i < $pictureSize; $i++){
            $pictures[] = new Pictures(array(
                'fileName' => $_FILES['pictures']['name'][$i],
                'tmpName' => $_FILES['pictures']['tmp_name'][$i],
                'errorFile' => $_FILES['pictures']['error'][$i],
                'size' => $_FILES['pictures']['size'][$i],
                'name' => $_POST['picturesName'][$i],
                'source' => $_POST['sources'][$i],
                'filePath' => IMG_PATH
            ));
        }
    }


    $text = [];
    if(isset($_POST['text']))
    {
        foreach($_POST['text'] as $value)
        {
            $text[] = new Paragraph(array(
                'text' => $value
            ));
        }
    }

    $place = isset($_POST['place']) ? $_POST['place'] : NULL;

    $article = new Articles(array(
        'title' => $_POST['title'],
        'subtitle' => $_POST['subtitle'],
        'author' => $_POST['author'],
        'text' => $text,
        'pictures' => $pictures,
        'miniaturePicture' => $miniaturePicture,
        'carouselPicture' => $carouselPicture,
        'place' => $place
    ));

    if(!empty($place))
    {
        $article->addPlace();
    }

    if($article->isValid())
    {
        foreach($article->getPictures() as $picture)
        {
            $picture->move();
        }
        $miniaturePicture->move();
        $carouselPicture->move();
        $manager->save($article);
        $_POST = array();
        $success = true;
    }
    else
    {
        $errors = $article->getErrors();
    }
}

if(isset($errors))
{
    if(in_array(Articles::INVALID_TITLE,$errors)){
        $errorMessages[] = "Invalid title";
    }
    if(in_array(Articles::INVALID_SUBTITLE,$errors)){
        $errorMessages[] = "Invalid subtitle";
    }
    if(in_array(Articles::INVALID_AUTHOR,$errors)){
        $errorMessages[] = "Invalid author";
    }
    if(in_array(Articles::INVALID_PARAGRAPH,$errors)){
        $errorMessages[] = "Add at least one paragraph";
    }
    if(in_array(Articles::INVALID_MINIATURE_PICTURE,$errors)){
        $errorMessages[] = "Add a thumbnail";
    }
    if(in_array(Articles::INVALID_CAROUSEL_PICTURE,$errors)){
        $errorMessages[] = "Add a carousel picture";
    }
    if(in_array(Pictures::INVALID_NAME,$errors)){
        $errorMessages[] = "Invalid picture name";
    }
    if(in_array(Pictures::INVALID_SOURCE,$errors)){
        $errorMessages[] = "Invalid source";
    }
    if(in_array(Pictures::UPLOAD_ERROR,$errors)){
        $errorMessages[] = "Upload all the files";
    }
    if(in_array(Pictures::INVALID_EXTENSION,$errors)){
        $errorMessages[] = "Invalid extension";
    }
    if(in_array(Paragraph::INVALID_TEXT,$errors)){
        $errorMessages[] = "Invalid paragraph";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<div class="pl-3">
    <div class="col-12 mt-4 pr-lg-5 pl-lg-5 mb-3">
        <h1>Admin - New article</h1>
    </div>
    <div class="col-12 pr-lg-5 pl-lg-5">
        <?php
        if(isset($errorMessages))
        {
            foreach($errorMessages as $errorMessage)
            {
                echo "<div class=\"alert alert-danger\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                            ".$errorMessage.".
                          </div>";
            }
        }

        if(isset($success))
        {
            echo "<div class=\"alert alert-success\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                            <span>Article added !</span>
                          </div>";
        }

        ?>
    </div>
</div>

<div class="d-none d-lg-block container sticky-top col-3 pr-5 pt-5 float-right">
    <div class="pt-4">
        <button class="btn btn-primary btn-block col-12 btn-lg" onclick="fieldsManager('text')"> Add a text</button>
        <button class="btn btn-primary btn-block col-12 btn-lg" onclick="fieldsManager('picture')"> Add a picture </button>
    </div>
</div>
<div class="d-lg-none container-fluid fixed-bottom border bg-white p-0" style="height: 100px;">
    <div class="d-flex justify-content-between align-items-center h-100">
        <div class="pr-2 col-6">
            <button class="btn btn-primary btn-block" onclick="fieldsManager('text')"> Ajouter un paragraphe</button>
        </div>
        <div class="pl-2 col-6">
            <button class="btn btn-primary btn-block" onclick="fieldsManager('picture')"> Ajouter une photo </button>
        </div>
    </div>
</div>

<div class="col-12 col-lg-9 pt-3 pr-lg-5 pl-lg-5 ">
        <form action="addArticle.php" id="formArticle" method="post" enctype="multipart/form-data" class="d-flex flex-column col-12 mb-5">
            <label class="mb-3">Title : </label>
            <input type="text" name="title" value="<?php if(isset($_POST['title'])) echo $_POST['title'] ?>" placeholder="Title" class="mb-3 form-control">
            <label class="mb-3">Subtitle : </label>
            <input type="text" name="subtitle" value="<?php if(isset($_POST['subtitle'])) echo $_POST['subtitle'] ?>" placeholder="Subtitle" class="mb-3 form-control">
            <label class="mb-3">Author : </label>
            <input type="text" name="author" value="<?php if(isset($_POST['author'])) echo $_POST['author'] ?>" placeholder="Author" class="mb-3 form-control">
            <label class="mb-3">Thumbnail :</label>
            <input type="text" name="miniatureSource" value="<?php if(isset($_POST['miniatureSource'])) echo $_POST['miniatureSource'] ?>"  placeholder="Source" class="mb-3 form-control">
            <input type="text" name="miniatureName" value="<?php if(isset($_POST['miniatureName'])) echo $_POST['miniatureName'] ?>"  placeholder="Pictures Name" class="mb-3 form-control">
            <input type="file" name="miniaturePicture" class="mb-3 form-control-file border">
            <label class="mb-3">Carousel picture : </label>
            <input type="text" name="carouselSource" value="<?php if(isset($_POST['carouselSource'])) echo $_POST['carouselSource'] ?>" placeholder="Source" class="mb-3 form-control">
            <input type="text" name="carouselName" value="<?php if(isset($_POST['carouselName'])) echo $_POST['carouselName'] ?>" placeholder="Pictures Name" class="mb-3 form-control">
            <input type="file" name="carouselPicture" class="mb-3 form-control-file border">
            <h4 class="text-center mt-3">Article contents : </h4>
            <div id="fieldsGroup">
                <?php
                if(isset($_POST['sources']) || isset($_POST['picturesName']))
                {
                    if(isset($_POST['place']))
                    {
                        $sources = $_POST['sources'];
                        $picturesName = $_POST['picturesName'];
                        $place = $_POST['place'];
                        $textIndex = 0;
                        $pictureIndex = 0;
                        foreach($place as $key => $value)
                        {
                            if($value == Articles::TEXT_FIELD)
                            {
                                ?>
                                <div class="form-group fields">
                                    <label class="mb-3">Text : </label>
                                    <button onclick="deleteField(this)" class="close p-0 m-0">&times;</button>
                                    <textarea name="text[]" class="form-control mb-3" placeholder="Text..." rows="5"><?php echo $_POST['text'][$textIndex] ?></textarea>
                                    <input type="hidden" name="place[]" value="1">
                                </div>
                                <?php
                                $textIndex++;
                            }
                            elseif($value == Articles::PICTURE_FIELD)
                            {
                                ?>
                                <div class="form-group fields">
                                    <label class="mb-3">Pictures : </label>
                                    <button onclick="deleteField(this)" class="close p-0 m-0">&times;</button>
                                    <input type="text" name="sources[]" value="<?php echo $_POST['sources'][$pictureIndex] ?>"  placeholder="Source" class="mb-3 form-control">
                                    <input type="text" name="picturesName[]" value="<?php echo $_POST['picturesName'][$pictureIndex] ?>"  placeholder="Pictures Name" class="mb-3 form-control">
                                    <input type="file" name="pictures[]" class="mb-3 form-control-file border">
                                    <input type="hidden" name="place[]" value="2">
                                </div>
                                <?php
                                $pictureIndex++;
                            }
                        }
                    }
                }
                ?>
            </div>
            <input type="submit" name="submit" value="Submit" class="mb-3 mt-3 btn btn-lg btn-primary">
        </form>
</div>
<script src="js/myScript.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
