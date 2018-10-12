<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>South-French</title>
    <link rel="icon" href="img/logo_SA.png">


    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/full-slider.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


    <!-- Custom fonts for this template -->
    <link href="css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link href="css/agency.min.css" rel="stylesheet">

    <link href="css/lity.css" rel="stylesheet"/>


    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">



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
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('img/3expe/Au_Bout_du_Monde.png')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Au bout du monde</h3>
              <a class="portfolio-link btn bg-warning text-light font-weight-bold" data-toggle="modal" href="#portfolioModal5">Découvrir</a>
            </div>
          </div>


          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('img/3expe/Requin.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Plongée en eaux troubles</h3>
              <a class="portfolio-link btn bg-warning text-light font-weight-bold" data-toggle="modal" href="#portfolioModal4">Découvrir</a>
            </div>
          </div>


          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('img/3expe/Pingouin3.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Boulders Beach</h3>
              <a class="portfolio-link btn bg-warning text-light font-weight-bold" data-toggle="modal" href="#portfolioModal3">Découvrir</a>
            </div>
          </div>



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



    <!-- Expedition -->
    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Expeditions</h2>
            <h3 class="section-subheading text-muted">Découvrez toutes nos expeditions</h3>
          </div>
        </div>
        <div class="row m-0">
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/Article/Article2-Lions_Head/img_vignette.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Lion's head</h4>
              <p class="text-muted">Domaine de Table Mountain</p>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/Article/Article1-Hermanus/whale_vignette.JPG" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Baleines</h4>
              <p class="text-muted">Hermanus</p>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/Article/Article3-Pingouin/img_vignette.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Pingouins</h4>
              <p class="text-muted">Boulder's Beach</p>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/Article/Article4-Requins/requin_vignette.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Requins</h4>
              <p class="text-muted">Plongée en eaux troubles</p>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/Article/Article5-Au_Bout_du_Monde/cap_vignette.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Au bout du Monde</h4>
              <p class="text-muted">Découverte</p>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal7">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/Article/Article7-Twelves_Apostles/vignette.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Twelves Apostles</h4>
              <p class="text-muted">Randonnée</p>
            </div>
          </div>
        </div>
      </div>
    </section>






    <!-- Articles -->


    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2 class="text-uppercase">De Signal Hill à Lion's Head</h2>
                  <p class="item-intro text-muted">randonnée</p>

<!--                  <div id="myModal" class="modal-img modal-fluid">-->
<!--                    <!-- Modal content -->
<!--                    <span class="close-img">&times;</span>-->
<!--                    <img class="modal-content-img" id="img01">-->
<!--                  </div>-->


<!--                  <a href="#top1">-->
<!--                    <img class="img-fluid myImg" src="img/Article/Article2-Lions_Head/DJI_0011.JPG" alt="">-->
<!--                  </a>-->


                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article2-Lions_Head/DJI_0011.JPG"><img class="img-fluid" src="img/Article/Article2-Lions_Head/DJI_0011.JPG" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>

                  <p style="text-align: right; font-style: italic;">Lion's Head à gauche et Twelve Apostles à droite</p>

                  <br/>
                  <h4 style = "text-align: center;">Lion's Head : pic rocheux surplombant la ville du Cap.
                  </h4>
                  <p style = "text-align:center"> Il est possible d’arriver au pied du rocher de Lion’s head par plusieurs chemins.
                    Soit en empruntant un chemin en haut d’un quartier résidentiel du côté de Bantry Bay soit un autre que nous avons pris,
                    en haut d’une rue proche de green point. Il est aussi possible d’atteindre le bas du rocher en voiture en empruntant Kloof road.
                    En prenant le chemin sillonnant la colline de Signal Hill on aperçoit très vite l’ensemble du quartier de Seapoint ainsi que l’océan
                    qui s’efface à l’horizon. Le chemin n’est pas très compliqué, nous vous recommandons donc d’observer le paysage pendant que vous marchez.
                    Cela ne sera bientôt plus possible…

                  </p>


                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article2-Lions_Head/DJI_0008.JPG"><img class="img-fluid" src="img/Article/Article2-Lions_Head/DJI_0008.JPG" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Signal Hill</p>

                  <p style = "text-align: center;"> Tout au long de cette marche, vous pourrez voir énormément de points de vue différents.
                    D’ailleurs en continuant sur ce chemin vous prendrez vite de la hauteur, ce qui vous découvrira l’ensemble de Clifton
                    où l’on trouve certaines des meilleures plages de la ville. Un belvédère naturel vous permet d’observer la baie dominée
                    par la chaine de montagnes : « Twelve Apostles ».
                    Les nuages stagnant au niveau de cette chaîne de montagnes nous offrent un spectacle exceptionnel.
                  </p>

                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article2-Lions_Head/IMG_20180901_162646.jpg"><img class="img-fluid" src="img/Article/Article2-Lions_Head/IMG_20180901_162646.jpg" data-lity class="img-thumbnail" alt="" /></a>
                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Vue sur Clifton depuis Lion's Head</p>

                  <p style = "text-align: center;">En continuant sur le sentier, on s’aperçoit que celui-ci fait le tour du rocher en prenant de l’altitude.
                    Très vite, nous nous retrouvons de nouveau face à signal Hill, mais en ayant pris plus de hauteur. C’est à ce moment qu’on se rend
                    compte que Lion’s head domine la ville du Cap. Nous profitons de cette vue pour faire une pause, car le plus dur reste à venir.

                  </p>

                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article2-Lions_Head/IMG_20180901_165732.jpg"><img class="img-fluid" src="img/Article/Article2-Lions_Head/IMG_20180901_165732.jpg" data-lity class="img-thumbnail" alt="" /></a>
                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Vue sur le Cap</p>


                  <p style = "text-align: left;">Arrivés en bas du rocher, un seul chemin s’offre à nous, gravir la tête du lion par la crinière.
                    C’est la partie de la randonnée la plus complexe, en effet il faut savoir que nous sommes à 650m au-dessus du sol et que le chemin
                    est à flanc de falaise.
                    La montée est tellement abrupte qu’à certains moments nous sommes obligés d’utiliser des prises d’escalades mises à disposition.</p>


                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article2-Lions_Head/lions_montee.jpeg"><img class="img-fluid" src="img/Article/Article2-Lions_Head/lions_montee.jpeg" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Dernière partie de la randonnée, la crinière du lion</p>

                  <p style = "text-align: left;">Enfin ! Le sommet de Lion’s Head est à nous ! La fin de la montée n’a pas été facile, loin de là. Entre le soleil brulant,
                    le vide sous nos pieds et la fatigue s’accumulant, nous avons dû puiser dans nos dernières ressources pour venir à bout de cette épreuve.
                    Tous ces efforts furent récompensés lorsqu’un panorama à 360° s’offrit à nous. D’un côté, une vue imprenable sur l’Océan, de l’autre,
                    la ville du Cap et ses environs au pied du domaine de Table Mountain.
                  </p>

                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article2-Lions_Head/Lionshead.jpeg"><img class="img-fluid" src="img/Article/Article2-Lions_Head/Lionshead.jpeg" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Le sommet de Lion's Head, et Table Mountain en arrière plan</p>

                  <ul class="list-inline">
                    <li>Date: 24 Aout 2018</li>
                  </ul>
                  <button class="btn btn-warning font-weight-bold text-light" data-dismiss="modal" type="button">
                    <i class="fas fa-times "></i>
                    Fermer l'article</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2 class="text-uppercase">Hermanus</h2>
                  <p class="item-intro text-muted">Rencontre avec les baleines</p>

                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article1-Hermanus/bandeau_bal.JPG"><img class="img-fluid" src="img/Article/Article1-Hermanus/bandeau_bal.JPG" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Baleine sautant hors de l'eau</p>

                  <br/>
                  <h4 style = "text-align: center;">Hermanus, une gigantesque rencontre
                  </h4>
                  <p style = "text-align:center">Il est très rare de pouvoir observer des baleines depuis la côte. Coup de chance,
                    les baleines franches australes passent au large de l’Afrique du Sud de juin à novembre. À cette période,
                    les baleines approchent la péninsule pour trouver des eaux peu profondes pour mettre bas. Nous avons donc fait route vers Hermanus
                    une ville réputée pour avoir un point de vue imprenable sur les baleines depuis sa côte. Un arrêt sur la route nous permet de voir
                    que nous sommes bien rentrés dans les terres.
                  </p>

                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article1-Hermanus/pause.jpg"><img class="img-fluid" src="img/Article/Article1-Hermanus/pause.jpg" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">La région du Cap au second plan</p>

                  <p style = "text-align: center;"> Une fois arrivés sur place, il a fallu trouver le meilleur endroit pour observer le spectacle.
                    Les baleines ne se sont pas fait attendre,
                    à peine garés, les yeux vers l’océan les voilà qui sautent hors de l’eau et frappent leur queue à la surface.

                  </p>

                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article1-Hermanus/ocean_bal2.JPG"><img class="img-fluid" src="img/Article/Article1-Hermanus/ocean_bal2.JPG" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Baleine vue du ciel</p>

                  <p style = "text-align: center;">Au bout d'une quinzaine de minutes, elles arrêtent leur spectacle.
                    Heureusement, les côtes d’Hermanus sont magnifiques, une route piétonne longe le bord de mer,
                    nous l’empruntons donc et profitons d’une balade durant le coucher de soleil.
                  </p>

                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article1-Hermanus/drone_cote.png"><img class="img-fluid" src="img/Article/Article1-Hermanus/drone_cote.png" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Côte de Hermanus</p>


                  <p style = "text-align: center;">Nous nous sommes fait arrêter par des damans, la marmotte locale. En effet, certaines colonies
                    se sont installées le long de la côte, pas très sauvages, ils approchent volontiers les passants.
                  </p>

                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article1-Hermanus/daman1.JPG"><img class="img-fluid" src="img/Article/Article1-Hermanus/daman1.JPG" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Daman du Cap</p>

                  <ul class="list-inline">
                    <li>Date: 8 Septembre 2018</li>
                  </ul>
                  <button class="btn btn-warning font-weight-bold text-light" data-dismiss="modal" type="button">
                    <i class="fas fa-times "></i>
                  Fermer l'article</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2 class="text-uppercase" style="text-align: center">Rencontre avec les pingouins</h2>
                  <p class="item-intro text-muted">découverte</p>

                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article3-Pingouin/bandeau_ping.jpg"><img class="img-fluid" src="img/Article/Article3-Pingouin/bandeau_ping.jpg" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Boulder's beach</p>

                  <br/>
                  <h4 style = "text-align: center;">Boulder's Beach
                  </h4>
                  <p style = "text-align:center"> Boulder's Beach est l'une des trois seules régions continentales d'Afrique du sud où les
                    manchots ont établi des colonies. De seulement deux couples reproducteurs en 1982, la colonie compte maintenant plus de 3000 individus.
                    Ce sont des manchots africains et la seule race de manchots du continent africain.
                  </p>

                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article3-Pingouin/gang.jpg"><img class="img-fluid" src="img/Article/Article3-Pingouin/gang.jpg" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Groupe de manchots</p>

                  <p style = "text-align:center"> Boulder's Beach fait partie de la zone de protection marine du parc national de Table Mountain et est située près de Simon's Town.
                    Les plages sont d'un blanc éclatant et protégées par de gros rochers.
                    Les rochers créent des criques abritées où les pingouins peuvent se protéger des vagues et du vent.</p>


                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article3-Pingouin/collage.JPG"><img class="img-fluid" src="img/Article/Article3-Pingouin/collage.JPG" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <br/><br/>

                  <p style = "text-align: center;"> La plage a spécialement été aménagée pour l'observation des manchots
                    avec des points d'observation situés sur la plage, et des passerelles situées au-dessus de la colonie.

                  </p>


                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article3-Pingouin/coloni.jpg"><img class="img-fluid" src="img/Article/Article3-Pingouin/coloni.jpg" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Colonie de manchots</p>


                  <p style = "text-align: center;"> Mal à l'aise sur terre, avec une démarche approximative pour les tout-petits,
                    les manchots sont beaucoup plus à l'aise en mer. Ils sont capables de nager jusqu'à 20 km/h
                    pour attraper des calmars ou des anchois.
                  </p>

                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article3-Pingouin/plage.jpg"><img class="img-fluid" src="img/Article/Article3-Pingouin/plage.jpg" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Manchot sur la plage</p>


                  <ul class="list-inline">
                    <li>Date: 16 Septembre 2018</li>
                  </ul>
                  <button class="btn btn-warning font-weight-bold text-light" data-dismiss="modal" type="button">
                    <i class="fas fa-times "></i>
                    Fermer l'article</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2 class="text-uppercase" style="text-align: center">Plongé en cage dans des eaux à requins</h2>
                  <p class="item-intro text-muted">Plongée en eau trouble</p>

                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article4-Requins/gansbaai.jpeg"><img class="img-fluid" src="img/Article/Article4-Requins/gansbaai.jpeg" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Gansbaai vue du ciel</p>

                  <h4 style = "text-align: center;">
                  </h4>
                  <p style = "text-align:center">
                    Ce matin, nous nous sommes levés tôt ; l’aventure que nous voulions vivre impliquait notre présence dans un centre de plongée sous-marine en cage. En effet, nous partions à la recherche des requins blancs au large des côtes de Gansbaai.
                    Nous sommes arrivés au centre aux alentours de 7 heures avec l’impatience et l’émerveillement d’un enfant le soir de Noël. Une reproduction de requin blanc trônait devant l’agence. La lumière du soleil levant nous offrait un superbe spectacle qui ne faisait qu’augmenter notre excitation.
                  </p>

                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article4-Requins/devanture.jpg"><img class="img-fluid" src="img/Article/Article4-Requins/devanture.jpg" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Reproduction du grand blanc</p>

                  <p style = "text-align:center">
                    Pour nous accueillir un petit déjeuner nous attendait, cet en-cas nous a permis de faire le plein d’énergie avant le briefing du responsable de l’excursion qui nous a permis d’avoir plus d’informations sur la présence de requins dans le secteur.
                    Le Briefing fini, nous nous dirigeons vers le port où se trouvent les bateaux de toutes les agences de plongée voisines.
                  </p>

                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article4-Requins/Port-soleil.jpg"><img class="img-fluid" src="img/Article/Article4-Requins/Port-soleil.jpg" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Port de Gansbaai</p>
                  <br/><br/>

                  <p style = "text-align: center;">Ça y est nous partons au large avec une seule idée en tête, voir ce grand prédateur à quelques centimètres de nous.
                    Très vite, nous nous écartons des côtes de Gansbaai et l’équipage du bateau commence à préparer une espèce de mélasse de poisson qui servira d’appât pour les requins. Une armée de mouettes attirée par l’odeur suivait notre navire à la trace.
                  </p>

                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article4-Requins/mouette.jpg"><img class="img-fluid" src="img/Article/Article4-Requins/mouette.jpg" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Mouettes suivant le bateau</p>


                  <p style = "text-align: center;"> Une fois arrivés sur place l’équipage a commencé à appâter les requins en jetant la mixture par-dessus bord. Quelques consignes de sécurité nous sont données puis deux employés s’occupent de mettre la cage à la mer et de la sécuriser correctement.
                    Nous observons leurs gestes avec attention, la cage a l’air solide, suffisamment pour résister à la morsure puissante d’un requin.
                  </p>

                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article4-Requins/cage.jpg"><img class="img-fluid" src="img/Article/Article4-Requins/cage.jpg" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Cage protégeant des requins</p>

                  <p style = "text-align: center;">Après quelques heures d’attente, c’est enfin l’heure, quelques requins ont été repérés proches de notre embarcation.
                    Ni une ni deux, le personnel augmente les doses de soupe de poisson qu’il jette par-dessus bord et accroche une tête de thon à un fil comme un appât au bout d’une canne à pêche.
                    Nous enfilons rapidement une combinaison intégrale avant de mettre un masque et de nous jeter dans la cage.
                    Quelques secondes après le voilà, un requin-cuivre passe à quelques centimètres de nous,
                    l’immense squale, après nous avoir montré ses dents, repart au large en nous laissant d’incroyables images en tête.


                  </p>

                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article4-Requins/requin.jpg"><img class="img-fluid" src="img/Article/Article4-Requins/requin.jpg" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Requin cuivre</p>


                  <ul class="list-inline">
                    <li>Date: 24 Septembre 2018</li>
                  </ul>
                  <button class="btn btn-warning font-weight-bold text-light" data-dismiss="modal" type="button">
                    <i class="fas fa-times "></i>
                    Fermer l'article</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2 class="text-uppercase" style="text-align: center">Au bout du Monde</h2>
                  <p class="item-intro text-muted">Découverte</p>

                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article5-Au_Bout_du_Monde/Cap_aiguilles_bandeau.png"><img class="img-fluid" src="img/Article/Article5-Au_Bout_du_Monde/Cap_aiguilles_bandeau.png" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Bord de mer du cap de l'aiguille</p>

                  <h4 style = "text-align: center;">
                  </h4>
                  <p style = "text-align:center">
                    « J’irai au bout du monde », c’est une phrase qui pourrait vous venir en tête dans des moments où vous avez envie d’évasion.
                    Nous sommes donc allés au bout du monde, plus précisément au cap de l’aiguille, la pointe sud de l’Afrique.
                  </p>

                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article5-Au_Bout_du_Monde/Phare.png"><img class="img-fluid" src="img/Article/Article5-Au_Bout_du_Monde/Phare.png" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Phare du Cap de l'aiguille</p>

                  <p style = "text-align:center">
                    Le site est assez isolé et peu exploité. Une promenade aménagée le long de la mer est la seule activité disponible à cet endroit, mais le site en lui-même est une réserve naturelle extraordinaire.
                    Nous avons donc sorti un drone pour observer le lieu depuis le ciel, mais avons vite été arrêtés par les gardes du parc.
                  </p>


                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article5-Au_Bout_du_Monde/cap_drone.JPG"><img class="img-fluid" src="img/Article/Article5-Au_Bout_du_Monde/cap_drone.JPG" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Cap de l'aiguille vue du ciel</p>
                  <br/><br/>

                  <p style = "text-align: center;">Toujours en quête de nature nous sommes allés à la réserve de Walker Bay.
                    On y trouve une grotte préhistorique qui a été occupée par des hommes du milieu et de la fin de l’âge de pierre.
                    Celle-ci est très calme. Nous en profitons donc pour nous arrêter et profiter d'une superbe vue sur l'océan Atlantique.
                  </p>

                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article5-Au_Bout_du_Monde/Grotte.png"><img class="img-fluid" src="img/Article/Article5-Au_Bout_du_Monde/Grotte.png" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Vue depuis la grotte</p>


                  <p style = "text-align: center;">
                    Juste à côté de là se trouve une plage vide, parfait, nous avions bien besoin de repos.
                    On y accède en escaladant quelques rochers, à la période où nous y sommes allés,
                    celle-ci était déserte et l’océan était déchaîné. Des vagues de plusieurs mètres s’abattaient sur la plage. Les montagnes au loin offrent un grand spectacle.
                  </p>

                  <div class="gallery">
                    <div class="container">
                      <a href="img/Article/Article5-Au_Bout_du_Monde/Plage.png"><img class="img-fluid" src="img/Article/Article5-Au_Bout_du_Monde/Plage.png" data-lity class="img-thumbnail" alt="" /></a>

                    </div>
                  </div>
                  <p style="text-align: right; font-style: italic;">Plage de Walker Bay</p>

                  <ul class="list-inline">
                    <li>Date: 22 Septembre 2018</li>
                  </ul>
                  <button class="btn btn-warning font-weight-bold text-light" data-dismiss="modal" type="button">
                    <i class="fas fa-times "></i>
                    Fermer l'article</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


   <div class="portfolio-modal modal fade" id="portfolioModal7" tabindex="-1" role="dialog" aria-hidden="true">
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
                 <h2 class="text-uppercase" style="text-align: center">Twelves apostles</h2>
                 <p class="item-intro text-muted">Randonnée</p>

                 <div class="gallery">
                   <div class="container">
                     <a href="img/Article/Article7-Twelves_Apostles/1.jpg"><img class="img-fluid" src="img/Article/Article7-Twelves_Apostles/1.jpg" data-lity class="img-thumbnail" alt="" /></a>

                   </div>
                 </div>
                 <p style="text-align: right; font-style: italic;">Nuages descendant de Table Mountain   </p>


                 <p style = "text-align:center">La chaîne des Twelves Apostles se situe à l’arrière de Table Mountain,
                   offrant une vue imprenable sur l'Océan Atlantique. Nous avons donc décidé de grimper au-dessus de ces douze pics
                   afin d'y contempler la vue. Nous savions que pour arriver au sommet, nous devions monter par l'une des douze gorges.
                   Nous avons donc choisi de monter par la gorge de KasteelSpoort, qui nous semblait être la plus sécurisée.


                 </p>

                 <div class="gallery">
                   <div class="container">
                     <a href="img/Article/Article7-Twelves_Apostles/2.jpg"><img class="img-fluid" src="img/Article/Article7-Twelves_Apostles/2.jpg" data-lity class="img-thumbnail" alt="" /></a>

                   </div>
                 </div>
                 <p style="text-align: right; font-style: italic;">Début de l'ascension de la gorge de Kastleespoort</p>

                 <p style = "text-align:center">
                   L'ascension fût longue et difficile. Au fur et à mesure que l'on montait, les parois de la gorge se rétrécissaient
                   et le sentier devenait de plus en plus technique. Au fur et à mesure de notre montée, nous pouvions voir le
                   quartier de Camp's Bay rétrécir à vue d'oeil.
                   Nous savions qu'il était raisonnable de nous arrêter de temps en temps afin de faire une petite pause.

                 </p>


                 <div class="gallery">
                   <div class="container">
                     <a href="img/Article/Article7-Twelves_Apostles/3%20copie.JPG"><img class="img-fluid" src="img/Article/Article7-Twelves_Apostles/3%20copie.JPG" data-lity class="img-thumbnail" alt="" /></a>

                   </div>
                 </div>
                 <p style="text-align: right; font-style: italic;">Ascension de la gorge</p>


                 <p style = "text-align: center;">Après une bonne et intense heure de marche, nous voilà au sommet !</br>
                   Là, une vue sur tout Camp's Bay ainsi que l'Océan Atlantique s'offre à nous. Le paysage est à couper le souffle,
                   mais pas le temps de traîner. Le vent se lève et il n'est pas bon de rester trop près du précipice.

                 </p>

                 <div class="gallery">
                   <div class="container">
                     <a href="img/Article/Article7-Twelves_Apostles/4.jpg"><img class="img-fluid" src="img/Article/Article7-Twelves_Apostles/4.jpg" data-lity class="img-thumbnail" alt="" /></a>

                   </div>
                 </div>
                 <p style="text-align: right; font-style: italic;">Vue de Camp's Bay depuis le sommet</p>


                 <p style = "text-align: center;">
                   Notre itinéraire se poursuit alors, le long des douze pics. Tout autour de nous, une succession de rochers de plusieurs
                   mètres de haut et de hautes herbes à perte de vue. Il nous a fallu une bonne heure et demi pour parcourir
                   entierement le sommet des Twelves Apostles. On perd très vite la notion du temps, comme déconnecté face à l'immensité
                   de ces paysages.

                 </p>

                 <div class="gallery">
                   <div class="container">
                     <a href="img/Article/Article7-Twelves_Apostles/5.jpg"><img class="img-fluid" src="img/Article/Article7-Twelves_Apostles/5.jpg" data-lity class="img-thumbnail" alt="" /></a>

                   </div>
                 </div>
                 <p style="text-align: right; font-style: italic;">Balade au sommet</p>

                 <p style = "text-align: center;">
                   A plus de 600 mètres du sol, nous étions à l'un des points les plus haut de Cape Town. De là, nous pouvions profiter de
                   certains des plus beaux paysages que nous avons vu ici. D'un coté, nous pouvions voir False Bay situé à plus de vingt kilomètres
                   de là, et de l'autre la succession des gorges avec en arrière plan l'Océan Atlantique.



                 </p>

                 <div class="gallery">
                   <div class="container">
                     <a href="img/Article/Article7-Twelves_Apostles/6.JPG"><img class="img-fluid" src="img/Article/Article7-Twelves_Apostles/6.JPG" data-lity class="img-thumbnail" alt="" /></a>

                   </div>
                 </div>
                 <p style="text-align: right; font-style: italic;">Des paysages incroyables vue du sommet</p>


                 <p style = "text-align: center;">
                  Il est déjà temps de redescendre. Le vent souffle de plus en plus et cela devient dangereux de rester sur le sommet des
                   Twelves Apostles. Nous décidons donc de redescendre par une autre gorge.
                   Toute aussi impressionante à monter qu'à descendre, il faut avoir le coeur bien accroché pour descendre dans ces immenses
                   crevaces.
                 </p>

                 <div class="gallery">
                   <div class="container">
                     <a href="img/Article/Article7-Twelves_Apostles/7.jpg"><img class="img-fluid" src="img/Article/Article7-Twelves_Apostles/7.jpg" data-lity class="img-thumbnail" alt="" /></a>

                   </div>
                 </div>
                 <p style="text-align: right; font-style: italic;">Descente par Woody Ravine Trail</p>


                 <p style = "text-align: center;">
                   La descente était abrupte ! En effet, le vide sous nos pieds nous obligeait à rester concentrés.
                   Nous nous retournions souvent afin de réaliser à quel point le dénivelé était important.
                   Même après treize kilometres de marche, une magnifique vue de Lion's Head et des Twelves Apostles qui nous attendait
                   nous a completement fait oublier la fatigue accumulée.


                 </p>
                 <div class="gallery">
                   <div class="container">
                     <a href="img/Article/Article7-Twelves_Apostles/8.jpg"><img class="img-fluid" src="img/Article/Article7-Twelves_Apostles/8.jpg" data-lity class="img-thumbnail" alt="" /></a>

                   </div>
                 </div>
                 <p style="text-align: right; font-style: italic;">Vue sur Lion's Head à gauche et Twelves Apostles à <droite></droite></p>


                 <ul class="list-inline">
                   <li>Date: 03 Octobre 2018</li>
                 </ul>
                 <button class="btn btn-warning font-weight-bold text-light" data-dismiss="modal" type="button">
                   <i class="fas fa-times "></i>
                   Fermer l'article</button>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>


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