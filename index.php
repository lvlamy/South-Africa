<?php
session_start();

header('content-type: text/html; charset=utf-8');
mb_internal_encoding('UTF-8');

include('class/PDOFactory.php');
include('class/ArticlesManagerPDO.php');
include('class/Pictures.php');
include('class/Paragraph.php');
include('class/Articles.php');

$db = PDOFactory::getMysqlConnexion();
$manager = new ArticlesManagerPDO($db);

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>South-French</title>
    <link rel="icon" href="img/logo_SA.png">

    <!-- Custom styles for this template -->
    <link href="css/full-slider.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


    <!-- Custom fonts for this template -->
    <link href="css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">


      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link href="css/agency.min.css" rel="stylesheet">

    <link href="css/lity.css" rel="stylesheet"/>


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">



    <script src="js/jquery.js"></script>
    <script src="js/lity.js"></script>

  </head>

  <body>

   <!-- navbar -->

    <?php
    include 'include/inc_navbar.php';
    ?>
    
    <!-- Header -->
    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">

              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">

                <?php
                $articlesCarousel = $manager->selectSomeArticles();

                foreach ($articlesCarousel as $key => $articleCarousel)
                {
                    ?>
                    <div class="carousel-item <?php if($key == 0) echo "active";?>" style="background-image: url('<?php
                        echo $articleCarousel->getCarouselPicture()->getFilePath().$articleCarousel->getCarouselPicture()->getFileName();
                    ?>')">
                        <div class="carousel-caption d-none d-md-block">
                            <h3><?php echo $articleCarousel->getTitle();?></h3>
                            <a class="portfolio-link btn bg-warning text-light font-weight-bold" data-toggle="modal" href="#<?php echo $articleCarousel->getId(); ?>">Découvrir</a>
                        </div>
                    </div>
                    <?php
                }
                ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>


    <!--Apropos-->
    <section class="bg-dark text-white mb-0" id="about">
      <div class="container">
        <h2 class="text-center text-uppercase text-white">A propos de nous</h2>
        <hr class="star-light mb-5">
        <div class="row m-0">
          <div class="col-lg-6 ml-auto">
            <h2>Que faisons-nous ici?</h2><br>
            <p class="lead text-justify">Dans le cadre d'un semestre universitaire à l'étranger, nous avons choisi l'Afrique du Sud. Ce choix s'avère être le bon étant donné les richesses inépuisables de ce pays.
              Que ce soit dans les paysages ou dans les activités qu'il propose, celui-ci n'est pas prêt de finir de nous étonner.</p>
          </div>
          <div class="col-lg-6 mr-auto">
            <h2>Qu'allez-vous trouver ici?</h2><br>
            <p class="lead text-justify">Semaine après semaine, nous vous ferons partager toutes nos expéditions afin que vous puissiez
            les suivre comme si vous y étiez !</p>
          </div>
        </div>
      </div>
    </section>



   <div class="articles">

       <?php
       $reponse = $db->query('SELECT * FROM articles');
       ?>

       <section class="bg-light" id="portfolio">

           <div id="myModal" class="container" style="margin-top: -10%">
               <h1 align="center">Expeditions</h1>
               <br>
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
                               <img class="img-fluid"  src="<?php echo $articleImage->getFilePath().''.$articleImage->getFileName();?>" alt="">
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
                                                       <img class="img-fluid" src="<?php echo $articlePictures[$picturesIndex]->getFilePath().''.$articlePictures[$picturesIndex]->getFileName();?>" data-lity class="img-thumbnail" alt="" />
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
                                   <button class="btn btn-primary font-weight-bold text-light" data-dismiss="modal" type="button">
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

   <!-- Footer Section -->

    <?php
    include 'include/inc_footer.php';
    ?>

   <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


   <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-126199606-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-126199606-1');
    </script>
    </body>
</html>