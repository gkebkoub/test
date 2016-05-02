 <?php
include("header.php");
?>


    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('http://images.frandroid.com/wp-content/uploads/2014/11/Nexus-6-.jpg');"></div>
                <div class="carousel-caption">
                    
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://www1.sunrise.ch/is-bin/intershop.static/WFS/Sunrise-Residential-Site/Sunrise-Residential/de_CH/00%20Privatkunden/Startseite/Stage%20NEW/Stage_s6.jpg');"></div>
                <div class="carousel-caption">
                   
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://www.frandroid.com/blogs/avis-mobile/wp-content/uploads/sites/95/2015/02/nexus-6-product-photo.jpg');"></div>
                <div class="carousel-caption">
                    
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>







    <?php



if (!empty($_SESSION["Auth"])) {
					echo "<h2>Bienvenue ".$_SESSION['Auth']['login']."</h2>";
		}

?>

  <section id="just-intro">
             <div class="container">
             <div class="row text-center pad-row">
            <div class="col-md-4  col-sm-4">
                 <i class="fa fa-desktop fa-5x"></i>
                            <h4> <strong>Shoptel</strong> </h4>
                            <p>
                               Le site présenté  a été crée à partir du framework Bootstrap.
                               C'est un site "responsive", c'est-à-dire qu'il est adaptable sur différentes plateformes.
                            </p>
                         
                </div>
             <div class="col-md-4  col-sm-4">
                 <i class="glyphicon glyphicon-bell  fa-5x"></i>
                            <h4> <strong>Payement sécurisé</strong> </h4>
                            <p>
                                Carte Bancaire VISA, MASTER CARD, CARTE BLEUE acceptées. PAYPAL, BITCOINS acceptés.
                                Tous les paiements sont sécurisés
                            </p>
                           
                </div>
            <div class="col-md-4  col-sm-4">
                  <i class="fa fa-pencil  fa-5x"></i>
                            <h4> <strong>Vente de téléphone</strong> </h4>
                            <p>
                                Nous vendons des téléphones, de toutes les gammes.
                            </p>
                      
                </div>
                    
            </div>
                 </div>
         </section>
     <!--/.JUST-INTRO END-->
     
    <!--/.NOTE END-->
        </section>
        <br><br>
<?php 
include("footer.php");
?>
