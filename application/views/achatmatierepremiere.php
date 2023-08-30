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

    <script src="<?php echo js_loader('jquery.min') ;?>"></script>
    <script src="<?php echo js_loader('bootstrap') ;?>"></script>
    <script src="<?php echo js_loader('bootstrap-modal') ;?>"></script>
    <!-- Bootstrap CSS -->
 
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
                        <p>Call US :- <a href="#"> +11 900 800 100</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="#"><i class="fa fa-user s_color"></i> My Account</a></li>
                            <li><a href="#"><i class="fas fa-location-arrow"></i> Our location</a></li>
                            <li><a href="#"><i class="fas fa-headset"></i> Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					
                  
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
                    <a class="navbar-brand" href="index.html"><img src="<?php echo img_loader('logo','png');?>" class="logo" alt=""></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>AdminController">Se deconnecter Admin</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>AdminController/listedemandeacceptee">Liste demande acceptee</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>AdminController/achat">Achat matiere premiere</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>AdminController/etatstock">Etat stock</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>AdminController/achatafaire">Achat a faire</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>AdminController/listeproduit">Fabrication produit</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>AdminController/stockpf">Etat stock produit fini</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>AdminController/crudformule">gestion formule</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url();?>AdminController/ventepf">Vente produit fini</a></li>
                        
                    </ul>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                   
                </div>
                <!-- /.navbar-collapse -->

                <!-- Start Atribute Navigation -->
               
                <!-- End Atribute Navigation -->
            </div>
            <!-- Start Side Menu -->
           
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

    <!-- Start All Title Box -->
  
    <!-- End All Title Box -->

    <!-- Start Cart  -->
<div class="cart-box-main">
     <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-3">
                </div>

                <div class="col-sm-6 col-md-7">
                
								
                
                <form action="<?php echo base_url();?>AdminController/validerachat" method="post">
                <label for="pet-select">Matiere premiere</label>
              
                <select name="matiere">
                <?php for ($j=0; $j < count($listematiere) ; $j++) { ?>
                    <option value="<?php echo $listematiere[$j]['id']?>"><?php echo $listematiere[$j]['nom']?></option>
                    <?php }?>
                </select>
              
                </br>
                </br>
                <input type="number" name="qte">  kg
                    </br>
                    </br>
                <button type="submit" class="btn btn-primary" >Acheter</button>
                </form>
                <?php if (isset($listeachat)) {?>
               
                    <h1 id="center"> Liste achat effectue</h1>
                <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>nom</th>
                                    <th>qte</th>
                                    <th> date achat </th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php for ($j=0; $j < count($listeachat) ; $j++) { ?>
                                <tr>
                                    <td class="name-pr">
                                    <?php echo $listeachat[$j]['nom'];?>
								    </td>
                                    <td class="price-pr">
                                        <p><?php echo $listeachat[$j]['qteentree'];?>  </p>
                                    </td>
                                    <td class="price-pr">
                                        <p><?php echo $listeachat[$j]['datemvt'];?>  </p>
                                    </td>
                                   
                                </tr>
                         <?php }?>
                               
                            </tbody>
                        </table>
                    </div>
                <?php }?>

                </div>

            <div class="col-sm-2">
    
             </div>


        </div>
    </div>
</div>
    <!-- End Cart -->

    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
							<p></p>
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