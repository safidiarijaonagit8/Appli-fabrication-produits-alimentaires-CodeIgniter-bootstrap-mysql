<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>exam s4</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?php echo img_loader('favicon','ico') ;?>" type="image/x-icon">
    <!--<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">-->
    <link rel="apple-touch-icon" href="<?php echo img_loader('apple-touch-icon','png') ;?>">
    <!--<link rel="apple-touch-icon" href="images/apple-touch-icon.png">-->
  
    
    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
    <link rel="stylesheet" href="<?php echo css_loader('bootstrap.min') ;?>">
    <!-- Site CSS -->
    <!--<link rel="stylesheet" href="css/style.css">-->
    <link rel="stylesheet" href="<?php echo css_loader('style') ;?>">
    <!-- Responsive CSS -->
     <!--<link rel="stylesheet" href="css/responsive.css">-->
    <link rel="stylesheet" href="<?php echo css_loader('responsive') ;?>">
    <!-- Custom CSS -->
    <!--<link rel="stylesheet" href="css/custom.css">-->
    <link rel="stylesheet" href="<?php echo css_loader('custom') ;?>">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					
                    <div class="right-phone-box">
                       
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="#"><i class="fa fa-user s_color"></i>  Account</a></li>
                            <li><a href="#"><i class="fas fa-location-arrow"></i>  location</a></li>
                            <li><a href="#"><i class="fas fa-headset"></i> Contact </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="login-box">
						<select id="basic" class="selectpicker show-tick form-control" data-placeholder="Sign In">
							<option>Register Here</option>
							<option>Sign In</option>
						</select>
					</div>
                  
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="Accueil.php"><img src="<?php echo img_loader('logo','png');?>" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>Welcome">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>IndexAdmin">Se connecter Admin</a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">CHOIX CAISSE</a>
                            <ul class="dropdown-menu">
                            
                            <?php for ($i=0; $i < count($listeCaisse) ; $i++) { ?>
								<li><a href="<?php echo base_url();?>Accueil/accueilCont/test?idCaisse=<?php echo $listeCaisse[$i]['idCaisse']; ?>"><?php echo $listeCaisse[$i]['nomCaisse']; ?></a></li>
							<?php }?>
                            
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Galerie</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact </a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                        <li class="side-menu">
							<a href="#">
								<i class="fa fa-shopping-bag"></i>
								<span class="badge">3</span>
								<p>My Cart</p>
							</a>
						</li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
            <div class="side">
                <a href="#" class="close-side"><i class="fa fa-times"></i></a>
              
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="images/banner-01.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Bienvgyenue chez <br> Freshshop</strong></h1>
                            <p class="m-b-40"></p>
                            
                        </div>
                    </div>
                </div>
            </li>
           
            
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Categories  -->
 
    <!-- End Categories -->
	


    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Nos produits</h1>
                        <p>Bienvenue chez nous...Choisissez ce qui vous plait</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                
                    <div class="special-menu text-center">
                    <h2>Liste des categories (cliquez)</h2>
                        <div class="button-group filter-button-group">
                        <?php for ($i=0; $i < count($listeCategorie) ; $i++) { ?>
                            <button class="active" data-filter=".<?php echo $listeCategorie[$i]['nomCategorie']; ?>"><?php echo $listeCategorie[$i]['nomCategorie']; ?></button>                
                    <?php } ?>
                          
                        </div>
                    </div>
                </div>
            </div>

            <div class="row special-list">
            <?php for ($k=0; $k < count($listeCategorie) ; $k++) { ?>
                
                <?php for ($j=0; $j < count($listeProduit) ; $j++) { ?>
                    <?php if( $listeProduit[$j]['nomCategorie']==$listeCategorie[$k]['nomCategorie']){?>
                    <div class="col-lg-3 col-md-6 special-grid <?php echo $listeCategorie[$k]['nomCategorie']; ?>">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">Sale</p>
                            </div>
                           <?php $sary = $listeProduit[$j]['saryProduit'];?>
                            <img src="<?php echo img_loader($sary,'png');?>" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                            <a class="cart" href="<?php echo base_url();?>AddToCart/ajoutCart/test?idProduit=<?php echo $listeProduit[$j]['idProduit'];?>&&idCaisse=<?php echo $choixCaisse;?> ">Add to Cart</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4><?php echo $listeProduit[$j]['nomProduit'] ;?> </h4>
                            <h5><?php echo $listeProduit[$j]['prixUnitaire'] ;?> ariary</h5>
                        </div>
                    </div>
                </div>
                <?php }}}?>
              

                

               
            </div>
        </div>
    </div>
    <!-- End Products  -->

    <!-- Start Blog  -->
 
    <!-- End Blog  -->


    <!-- Start Instagram Feed  -->
    
    <!-- End Instagram Feed  -->


    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Business Time</h3>
							<ul class="list-time">
								<li>Monday - Friday: 08.00am to 05.00pm</li> <li>Saturday: 10.00am to 08.00pm</li> <li>Sunday: <span>Closed</span></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Newsletter</h3>
							<form class="newsletter-box">
								<div class="form-group">
									<input class="" type="email" name="Email" placeholder="Email Address*" />
									<i class="fa fa-envelope"></i>
								</div>
								<button class="btn hvr-hover" type="submit">Submit</button>
							</form>
						</div>
					</div>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="footer-top-box">
							<h3>Social Media</h3>
							
							<ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
						</div>
					</div>
				</div>
				<hr>
                <div class="row">
                   
                   
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
            <a href="https://html.design/">html design</a></p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="<?php echo js_loader('jquery-3.2.1.min') ;?>"></script>
 
    <script src="<?php echo js_loader('popper.min') ;?>"></script>
    
    <script src="<?php echo js_loader('bootstrap.min') ;?>"></script>
 
    <!-- ALL PLUGINS -->
    <script src="<?php echo js_loader('jquery.superslides.min') ;?>"></script>
   
    <script src="<?php echo js_loader('bootstrap-select') ;?>"></script>

    <script src="<?php echo js_loader('inewsticker') ;?>"></script>
  
    <script src="<?php echo js_loader('bootsnav') ;?>"></script>
 
    <script src="<?php echo js_loader('images-loded.min') ;?>"></script>
 
    <script src="<?php echo js_loader('isotope.min') ;?>"></script>
 
    <script src="<?php echo js_loader('owl.carousel.min') ;?>"></script>

    <script src="<?php echo js_loader('baguetteBox.min') ;?>"></script>
  
    <script src="<?php echo js_loader('form-validator.min') ;?>"></script>
 
    <script src="<?php echo js_loader('contact-form-script') ;?>"></script>

    <script src="<?php echo js_loader('custom') ;?>"></script>
  
</body>

</html>