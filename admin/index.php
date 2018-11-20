<?php
session_start();

header('content-type: text/html; charset=utf-8');
mb_internal_encoding('UTF-8');

include('../class/PDOFactory.php');
include('../class/ArticlesManagerPDO.php');
include('../class/Pictures.php');
include('../class/Paragraph.php');
include('../class/Articles.php');

$db = PDOFactory::getMysqlConnexion();
$manager = new ArticlesManagerPDO($db);

$deleted = isset($_GET['deleted']) ? $_GET['deleted'] : NULL;

if(isset($deleted))
{
    $message = "Article supprimé";
}

include("../login/session.php");

?>


<div class="container">
    <div class="alert alert-info alert-dismissible">
        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php
        if(isset($_SESSION['login_user']) && $_SESSION['type'])
            echo ''. $_SESSION['login_user'] . ' is logged and it\'s a(n) : ' . $_SESSION['type'];
        ?>
    </div>
</div>

<?php
if(isset($message))
{
    ?>
    <div class="container">
        <div class="alert alert-info alert-dismissible">
            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php
            echo $message;
            ?>
        </div>
    </div>
    <?php
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom fonts for this template -->
    <link href="../css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="../css/agency.min.css" rel="stylesheet">

    <link href="../css/lity.css" rel="stylesheet"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

</head>
<body>
<div class="articles">

    <?php
    $reponse = $db->query('SELECT * FROM articles');
    ?>
    <h1 style="text-align: center">Welcome <?php echo $_SESSION['login_user']; ?></h1>

    <a href="profil_admin.php" class="btn btn-info btn-md btn-block col-4" style="margin-left: 33%">Profiles</a>
    <a href="articlemanager.php" class="btn btn-info btn-md btn-block col-4" style="margin-left: 33%">Add an article</a>

    <br>

    <input class="form-control col-4" id="myInput" type="text" placeholder="Search.." style="margin-left: 10%">
    <br>

    <section class="bg-light" id="portfolio">

        <div id="myModal" class="container" style="margin-top: -10%">
            <h1 align="center">Articles</h1>
            <div class="row">

                <?php

                $articles = [];
                $articles  = $manager->selectAllArticle();

                foreach($articles as $articleData) {
                    $articleImage = $articleData->getMiniaturePicture();

                    ?>
                    <div class="col-md-4 col-sm-12 portfolio-item">
                        <a class="portfolio-link" data-toggle="modal" href="#<?php echo $articleData->getId();?>">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fas fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid"  src="../<?php echo $articleImage->getFilePath().''.$articleImage->getFileName();?>" alt="">
                        </a>

                        <div class="portfolio-caption">
                            <h4><?php echo $articleData->getTitle() ?></h4>

                            <p class="text-muted"><?php echo $articleData->getSubtitle() ?></p>


                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <a href="../login/logout.php" class="btn btn-info btn-block col-4" style="margin-left: 33%">Logout</a>

        </div>
    </section>
</div>

<?php

foreach($articles as $articleData) {
    ?>

    <div class="portfolio-modal modal fade" id="<?php echo $articleData->getId();?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="row m-0">
                        <div class="col-lg-12 mx-auto">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2 class="text-uppercase" style="text-align: center"><?php echo $articleData->getTitle() ?></h2>
                                <p class="item-intro text-muted">Visite</p>

                                <?php
                                $articlePictures = $articleData->getPictures();
                                $articleParagraphs = $articleData->getText();

                                $paragraphsIndex = 0;
                                $picturesIndex = 0;
                                foreach ($articleData->getPlace() as $key => $place)
                                {
                                    if($place == Articles::TEXT_FIELD)
                                    {
                                        ?>
                                        <p style = "text-align:center"><?php echo $articleParagraphs[$paragraphsIndex]->getText() ?></p>
                                        <?php
                                        $paragraphsIndex++;
                                    }
                                    elseif ($place == Articles::PICTURE_FIELD)
                                    {
                                        ?>
                                        <div class="gallery">
                                            <div class="container">
                                                <a href="../<?php echo $articlePictures[$picturesIndex]->getFilePath().''.$articlePictures[$picturesIndex]->getFileName();?>">
                                                    <img class="img-fluid" src="../<?php echo $articlePictures[$picturesIndex]->getFilePath().''.$articlePictures[$picturesIndex]->getFileName();?>" data-lity class="img-thumbnail" alt="" />
                                                </a>

                                            </div>
                                        </div>
                                        <p style="text-align: right; font-style: italic;"><?php echo $articlePictures[$picturesIndex]->getName(); ?></p>
                                        <?php
                                        $picturesIndex++;
                                    }
                                }

                                ?>

                                <ul class="list-inline">
                                    <li><?php echo $articleData->getDate() ?></li>
                                </ul>
                                <button class="btn btn-info font-weight-bold text-light" data-dismiss="modal" type="button">
                                    <i class="fas fa-times "></i>
                                    Fermer l'article</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>


<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myModal div").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

<?php
include ("../include/inc_footer.php");
?>

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>



