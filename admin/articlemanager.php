<?php

header('content-type: text/html; charset=utf-8');
mb_internal_encoding('UTF-8');

include "../lib/tools.php";

$db = PDOFactory::getMysqlConnexion();
$manager = new ArticlesManagerPDO($db);

const IMG_PATH = 'img/';

$add = isset($_GET['add']) ? $_GET['add'] : NULL;
$list = isset($_GET['list']) ? $_GET['list'] : NULL;
$edit = isset($_GET['edit']) ? $_GET['edit'] : NULL;
$delete = isset($_GET['delete']) ? $_GET['delete'] : NULL;
$id = isset($_POST['id']) ? $_POST['id'] : NULL;

if(isset($_GET['nfa']))
{
    $messages[] = "Article Not Found";
}

if(isset($_POST['deleteSubmit']))
{
    $manager->delete($id);
    $messages[] = "Article is deleted";
}

if(isset($_POST['submit'])){


    if(!empty($_FILES['miniaturePicture']['name']))
    {
        $miniaturePicture = new Pictures(array(
            'id' => $_POST['miniatureId'],
            'filePath' => IMG_PATH,
            'type' => Pictures::MINIATURE_PICTURE,
            'place' => 1,
            'fileName' => $_FILES['miniaturePicture']['name'],
            'tmpName' => $_FILES['miniaturePicture']['tmp_name'],
            'errorFile' => $_FILES['miniaturePicture']['error'],
            'size' => $_FILES['miniaturePicture']['size'],
            'name' => $_POST['miniatureName'],
            'source' => $_POST['miniatureSource']
        ));
    }
    else
    {
        $miniaturePicture = new Pictures(array(
            'id' => $_POST['miniatureId'],
            'type' => Pictures::MINIATURE_PICTURE,
            'place' => 1,
            'name' => $_POST['miniatureName'],
            'source' => $_POST['miniatureSource'],
            'fileName' => "unknown"
        ));
    }

    if($_FILES['carouselPicture']['name'])
    {
        $carouselPicture = new Pictures(array(
            'id' => $_POST['carouselId'],
            'filePath' => IMG_PATH,
            'place' => 1,
            'type' => Pictures::CAROUSEL_PICTURE,
            'fileName' => $_FILES['carouselPicture']['name'],
            'tmpName' => $_FILES['carouselPicture']['tmp_name'],
            'errorFile' => $_FILES['carouselPicture']['error'],
            'size' => $_FILES['carouselPicture']['size'],
            'name' => $_POST['carouselName'],
            'source' => $_POST['carouselSource']
        ));
    }
    else
    {
        $carouselPicture = new Pictures(array(
            'id' => $_POST['carouselId'],
            'filePath' => IMG_PATH,
            'place' => 1,
            'type' => Pictures::CAROUSEL_PICTURE,
            'fileName' => "unknown",
            'name' => $_POST['carouselName'],
            'source' => $_POST['carouselSource']
        ));
    }


    $pictures = [];
    if(isset($_POST['picturesName']))
    {
        $pictureSize = count($_POST['picturesName']);
        for($i=0; $i < $pictureSize; $i++){
            if($_POST['idPicture'][$i] == 0 || $_FILES['pictures']['name'][$i])
            {
                $pictures[] = new Pictures(array(
                    'id' => $_POST['idPicture'][$i],
                    'idArticle' => $id,
                    'fileName' => $_FILES['pictures']['name'][$i],
                    'tmpName' => $_FILES['pictures']['tmp_name'][$i],
                    'errorFile' => $_FILES['pictures']['error'][$i],
                    'size' => $_FILES['pictures']['size'][$i],
                    'name' => $_POST['picturesName'][$i],
                    'source' => $_POST['sources'][$i],
                    'filePath' => IMG_PATH
                ));
            }
            else
            {
                $pictures[] = new Pictures(array(
                    'id' => $_POST['idPicture'][$i],
                    'fileName' => "unknown",
                    'name' => $_POST['picturesName'][$i],
                    'source' => $_POST['sources'][$i],
                    'filePath' => IMG_PATH
                ));
            }

        }
    }


    $text = [];
    if(isset($_POST['text']))
    {
        foreach($_POST['text'] as $key => $value)
        {
            $text[] = new Paragraph(array(
                'id' => $_POST['idText'][$key],
                'idArticle' => $id,
                'text' => $value
            ));
        }
    }

    $place = isset($_POST['place']) ? $_POST['place'] : NULL;

    $article = new Articles(array(
        'id' => $id,
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

    if(isset($id)) //Update
    {
        $articleId = $manager->selectArticle($id);

        $article->setId($id);

        $valid = true;

        if(!$article->isValidUpdate())
        {
            $valid = false;
        }

        foreach($article->getPictures() as $picture)
        {
            if(!empty($picture->getTmpName()))
            {
                if(!$picture->addPicture())
                    $valid = false;
            }
        }

        if(!empty($miniaturePicture->getTmpName()))
        {
            if(!$miniaturePicture->addPicture())
                $valid = false;
        }

        if(!empty($carouselPicture->getTmpName()))
        {
            if(!$carouselPicture->addPicture())
                $valid = false;
        }

        if($valid)
        {
            $manager->update($article);
            $_POST = array();
            $messages[] = "Article Update !";
        }
        else
        {
            $errors = $article->getErrors();
        }

    }
    else //Add
    {
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
            $messages[] = "Article added !";
        }
        else
        {
            $errors = $article->getErrors();
        }
    }
}

if(isset($errors))
{
    if(in_array(Articles::INVALID_TITLE,$errors)){
        $messages[] = "Invalid title";
    }
    if(in_array(Articles::INVALID_SUBTITLE,$errors)){
        $messages[] = "Invalid subtitle";
    }
    if(in_array(Articles::INVALID_AUTHOR,$errors)){
        $messages[] = "Invalid author";
    }
    if(in_array(Articles::INVALID_PARAGRAPH,$errors)){
        $messages[] = "Add at least one paragraph";
    }
    if(in_array(Articles::INVALID_MINIATURE_PICTURE,$errors)){
        $messages[] = "Add a thumbnail";
    }
    if(in_array(Articles::INVALID_CAROUSEL_PICTURE,$errors)){
        $messages[] = "Add a carousel picture";
    }
    if(in_array(Pictures::INVALID_NAME,$errors)){
        $messages[] = "Invalid picture name";
    }
    if(in_array(Pictures::INVALID_SOURCE,$errors)){
        $messages[] = "Invalid source";
    }
    if(in_array(Pictures::UPLOAD_ERROR,$errors)){
        $messages[] = "Upload all the files";
    }
    if(in_array(Pictures::INVALID_EXTENSION,$errors)){
        $messages[] = "Invalid extension";
    }
    if(in_array(Paragraph::INVALID_TEXT,$errors)){
        $messages[] = "Invalid paragraph";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <?php
    include "../Include/inc_head.php";
    ?>
</head>
<body>
<div class="pl-3">
    <div class="col-12 pr-lg-5 pl-lg-5">
        <?php
        if(isset($messages))
        {
            foreach($messages as $message)
            {
                echo "<div class=\"alert alert-danger\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                            ".$message."
                          </div>";
            }
        }
        ?>
    </div>
</div>
<?php
if(isset($add) || isset($edit))
{
    if(isset($edit))
    {
        if(!$manager->ifExist($edit))
        {
            header('Location: articlemanager.php?nfa');
        }
        $articleInfo = $manager->selectArticle($edit);
    }

    ?>

    <?php
    if(isset($edit))
    {
        ?>
        <div class="container-fluid mt-4 mb-4 pl-3">
            <div class="col-12 pr-lg-5 pl-lg-5">
                <a href="articlemanager.php?list" class="p-0 m-0 btn btn-link text-dark">
                    <img class="mr-2" src="../img/styles/ic_arrow_back_black_24dp.png" alt="return_row">articles list</a>
            </div>
        </div>
        <?php
    }
    else
    {
        ?>
        <div class="container-fluid mt-4 mb-4 pl-3">
            <div class="col-12 pr-lg-5 pl-lg-5">
                <a href="articlemanager.php" class="p-0 m-0 btn btn-link text-dark">
                    <img class="mr-2" src="../img/styles/ic_arrow_back_black_24dp.png" alt="return_row">admin</a>
            </div>
        </div>
        <?php
    }
    ?>

    <div class="pl-3">
        <div class="col-12 mt-4 pr-lg-5 pl-lg-5 mb-3">
            <h1>Admin - <?php
                if(isset($add))
                    echo 'New article';
                elseif (isset($edit))
                    echo 'Edit Article'
                ?></h1>
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
                <button class="btn btn-primary btn-block" onclick="fieldsManager('text')">Add a text</button>
            </div>
            <div class="pl-2 col-6">
                <button class="btn btn-primary btn-block" onclick="fieldsManager('picture')">Add a picture</button>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-9 pt-3 pr-lg-5 pl-lg-5 ">
        <form action="articlemanager.php<?php
        if(isset($edit))
            echo "?edit=".$edit;
        else
            echo "?add";
        ?>" id="formArticle" method="post" enctype="multipart/form-data" class="d-flex flex-column col-12 mb-5">
            <label class="mb-3">Title : </label>
            <input type="text" name="title" value="<?php
            if(isset($_POST['title']))
                echo $_POST['title'];
            elseif(isset($articleInfo))
                echo $articleInfo->getTitle();
            ?>" placeholder="Title" class="mb-3 form-control">
            <label class="mb-3">Subtitle : </label>
            <input type="text" name="subtitle" value="<?php
            if(isset($_POST['subtitle']))
                echo $_POST['subtitle'];
            elseif(isset($articleInfo))
                echo $articleInfo->getSubtitle();
            ?>" placeholder="Subtitle" class="mb-3 form-control">
            <label class="mb-3">Author : </label>
            <input type="text" name="author" value="<?php
            if(isset($_POST['author']))
                echo $_POST['author'];
            elseif(isset($articleInfo))
                echo $articleInfo->getAuthor();
            ?>" placeholder="Author" class="mb-3 form-control">
            <label class="mb-3">Thumbnail :</label>
            <input type="text" name="miniatureSource" value="<?php
            if(isset($_POST['miniatureSource']))
                echo $_POST['miniatureSource'];
            elseif(isset($articleInfo))
                echo $articleInfo->getMiniaturePicture()->getSource();
            ?>"  placeholder="Source" class="mb-3 form-control">
            <input type="text" name="miniatureName" value="<?php
            if(isset($_POST['miniatureName']))
                echo $_POST['miniatureName'];
            elseif(isset($articleInfo))
                echo $articleInfo->getMiniaturePicture()->getName();
            ?>"  placeholder="Pictures Name" class="mb-3 form-control">
            <input type="file" name="miniaturePicture" class="mb-3 form-control-file border">
            <input type="hidden" name="miniatureId" value="<?php
            if(isset($articleInfo))
                echo $articleInfo->getMiniaturePicture()->getId();
            else
                echo "0";
            ?>">
            <label class="mb-3">Carousel picture : </label>
            <input type="text" name="carouselSource" value="<?php
            if(isset($_POST['carouselSource']))
                echo $_POST['carouselSource'];
            elseif(isset($articleInfo))
                echo $articleInfo->getCarouselPicture()->getSource();
            ?>" placeholder="Source" class="mb-3 form-control">
            <input type="text" name="carouselName" value="<?php
            if(isset($_POST['carouselName']))
                echo $_POST['carouselName'];
            elseif(isset($articleInfo))
                echo $articleInfo->getCarouselPicture()->getName();
            ?>" placeholder="Pictures Name" class="mb-3 form-control">
            <input type="file" name="carouselPicture" class="mb-3 form-control-file border">
            <input type="hidden" name="carouselId" value="<?php
            if(isset($articleInfo))
                echo $articleInfo->getCarouselPicture()->getId();
            else
                echo "0";
            ?>">
            <h4 class="text-center mt-3">Article contents : </h4>
            <div id="fieldsGroup">
                <?php
                if(isset($_POST['sources']) || isset($_POST['text']))
                {
                    if(isset($_POST['place']))
                    {

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
                                    <textarea name="text[]" class="form-control mb-3" placeholder="Text..." rows="5"><?php
                                        echo $_POST['text'][$textIndex];
                                        ?></textarea>
                                    <input type="hidden" name="idText[]" value="<?php echo $_POST['idText'][$textIndex]?>">
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
                                    <input type="text" name="sources[]" value="<?php
                                    echo $_POST['sources'][$pictureIndex];
                                    ?>"  placeholder="Source" class="mb-3 form-control">
                                    <input type="text" name="picturesName[]" value="<?php
                                    echo $_POST['picturesName'][$pictureIndex];
                                    ?>"  placeholder="Pictures Name" class="mb-3 form-control">
                                    <input type="file" name="pictures[]" class="mb-3 form-control-file border">
                                    <input type="hidden" name="idPicture[]" value="<?php echo $_POST['idPicture'][$pictureIndex]?>">
                                    <input type="hidden" name="place[]" value="2">
                                </div>
                                <?php
                                $pictureIndex++;
                            }
                        }
                        ?>
                        <input type="hidden" name="id" value="0">
                        <?php
                    }
                }
                elseif(isset($edit))
                {

                    $index = 0;
                    $maxPlace = $manager->maxPlace($edit);

                    for($i = 1; $i < $maxPlace+1; $i++)
                    {

                        foreach ($articleInfo->getText() as $textInfo)
                        {
                            if($textInfo->getPlace() == $i)
                            {
                                ?>
                                <div class="form-group fields">
                                    <label class="mb-3">Text : </label>
                                    <button onclick="deleteField(this)" class="close p-0 m-0">&times;</button>
                                    <textarea name="text[]" class="form-control mb-3" placeholder="Text..." rows="5"><?php
                                        echo $textInfo->getText();
                                        ?></textarea>
                                    <input type="hidden" name="idText[]" value="<?php echo $textInfo->getId()?>">
                                    <input type="hidden" name="place[]" value="1">
                                </div>
                                <?php
                            }
                        }
                        foreach ($articleInfo->getPictures() as $pictureInfo)
                        {
                            if ($pictureInfo->getPlace() == $i)
                            {
                                ?>
                                <div class="form-group fields">
                                    <label class="mb-3">Pictures : </label>
                                    <button onclick="deleteField(this)" class="close p-0 m-0">&times;</button>
                                    <input type="text" name="sources[]" value="<?php
                                    echo $pictureInfo->getSource();
                                    ?>"  placeholder="Source" class="mb-3 form-control">
                                    <input type="text" name="picturesName[]" value="<?php
                                    echo $pictureInfo->getName();
                                    ?>"  placeholder="Pictures Name" class="mb-3 form-control">
                                    <input type="file" name="pictures[]" class="mb-3 form-control-file border">
                                    <input type="hidden" name="idPicture[]" value="<?php echo $pictureInfo->getId()?>">
                                    <input type="hidden" name="place[]" value="2">
                                </div>
                                <?php
                            }
                        }

                    }
                    ?>
                    <?php
                }
                ?>
            </div>
            <?php
            if(isset($edit))
            {
                ?>
                <input type="hidden" name="id" value="<?php echo $edit ?>">
                <?php
            }
            ?>
            <input type="submit" name="submit" value="Submit" class="mb-3 mt-3 btn btn-lg btn-primary">
        </form>
    </div>
    <?php
}
elseif (isset($delete) && !empty($delete))
{
    ?>
    <div class="col-12 offset-md-2 col-md-8 offset-lg-3 col-lg-6 border mt-5 p-3">
        <h4 class="p-3">Are you sure you want to delete this article?</h4>
        <div class="row">
            <div class="col-6 pl-3 pr-3">
                <form action="articlemanager.php?list" method="post">
                    <input type="hidden" name="id" value="<?php echo $delete?>">
                    <input type="submit" name="deleteSubmit" class="btn btn-block btn-outline-primary" value="Yes">
                </form>
            </div>
            <div class="col-6 pl-3 pr-3">
                <a href="articlemanager.php" class="btn btn-block btn-primary">No</a>
            </div>
        </div>
    </div>
    <?php
}
elseif (isset($list))
{
    ?>
    <div class="d-flex justify-content-center align-items-center p-0 mt-4 mb-4">
        <div class="col-12 col-md-8 col-lg-6">
            <a href="articlemanager.php" class="p-0 m-0 btn btn-link text-dark">
                <img class="mr-2" src="../img/styles/ic_arrow_back_black_24dp.png" alt="return_row">article manager</a>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center flex-column">
        <div class="col-12 col-md-8 col-lg-6">
            <h1 class="display-3 mb-3">Article list</h1>
            <input class="form-control mb-4" id="myInput" type="text" placeholder="Search..">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th></th>
                </tr>
                </thead>
                <tbody id="myTable">
                <?php
                $allArticles = $manager->selectAllArticle();
                foreach ($allArticles as $articleData)
                {
                    ?>

                    <tr>
                        <td><?php echo $articleData->getTitle() ?></td>
                        <td><?php echo $articleData->getAuthor() ?></td>
                        <td class="d-flex justify-content-around">
                            <a href="#">View</a>
                            <a href="articlemanager.php?edit=<?php echo $articleData->getId()?>">Edit</a>
                            <a href="articlemanager.php?delete=<?php echo $articleData->getId()?>">Delete</a>
                        </td>
                    </tr>

                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}
else
{
    ?>
    <div class="container-fluid mt-4 mb-4 pl-4">
        <div class="pl-4 col-12 offset-md-2 col-md-8 offset-lg-3 col-lg-6">
            <a href="index.php" class="p-0 m-0 btn btn-link text-dark">
                <img class="mr-2" src="../img/styles/ic_arrow_back_black_24dp.png" alt="return_row">admin</a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <h1 class="display-3 p-3">Article Manager</h1>
            <div class="d-flex justify-content-between">
                <div class="col-6 p-3">
                    <a href="articlemanager.php?add" class="btn btn-block btn-primary">Add</a>
                </div>
                <div class="col-6 p-3">
                    <a href="articlemanager.php?list" class="btn btn-block btn-primary">List</a>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

<?php
include "../Include/inc_script.php";
?>
<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
</body>
</html>
