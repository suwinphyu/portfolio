<?php get_header();?>


<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    
    <!--animation circle when page loads-->
    <div class="preloader">
        <img src="<?php bloginfo('template_directory');?>/images/icons/loader.gif" alt="Preloader image">
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <i class="fa fa-play-circle"></i> <span class="light"><img src="<?php bloginfo('template_directory');?>/images/icons/logo.png" alt=""></span> 
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#profile">Profile</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Portfolio</a>
                    </li>
                    <!-- <li>
                        <a class="page-scroll" href="#blog">Blog</a>
                    </li> -->
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div> <!-- /.navbar-collapse -->
        </div> <!-- /.container -->
    </nav>


    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading typed">Hello! <br>
                         I'm Su Win Phyu. </h1>             
                            <span class="typed-cursor">|</span>
                            <br>
                            <em>Nice to meet you all.</em>
                            <br>               

                        <a href="#profile" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div> <!--end of row-->
            </div> <!-- end of container in header-->
        </div> <!-- intro-body -->
    </header>

<!--Start of Profile Section -->
     <section id="profile" class="container content-section text-center">
            <div class="col-md-8 col-md-offset-2">
               <div class="profile">
                    <div class="icon-holder">
                        <img src="<?php bloginfo('template_directory');?>/images/icons/skills.png" alt="" class="icon" >
                    </div> <!-- end of icon-holder-->

                    <h4 class="heading">SKILLS</h4>                                                                  
                        <?php                        
                        foreach($results_skillsets as $skills){
                        echo "<h5 class=\"icon-star\">".$skills->skill_name."</h5>";
                        echo "<p>".$skills->skill_description."</p>";
                        }               
                        ?>                   
                </div> <!--end of profile-->                  
                <a href="#timeline" class="btn arrow page-scroll">
                    <i class="fa fa-angle-double-down animated"></i>
                </a> 
            </div>
        </div><!--end of row-->
    </section> <!--end of skills section-->

    
    <section class="cd-horizontal-timeline container other-content text-center" id="timeline">
        <div class="timeline ">
            <div class="events-wrapper">
                <div class="events">
                    <ul>
                     
                        <li><a href="#0" data-date="12/01/2010"  >2010</a></li>
                        <li><a href="#0" data-date="12/01/2012"  >2012</a></li>
                        <li><a href="#0" data-date="12/01/2013"  >2013</a></li> 
                        <li><a href="#0" data-date="12/01/2014"  >2014</a></li> 
                        <li><a href="#0" data-date="12/01/2015" class="selected" >2015</a></li>
                                           
                     
                    </ul>
          
                <span class="filling-line" aria-hidden="true"></span>
            </div> <!-- .events -->
        </div> <!-- .events-wrapper -->
            
        <ul class="cd-timeline-navigation">
            <li><a href="#0" class="prev inactive">Prev</a></li>
            <li><a href="#0" class="next">Next</a></li>
        </ul> <!-- .cd-timeline-navigation -->
    </div> <!-- .timeline -->

    <div class="events-content">

        <ul>
            <li  data-date="12/01/2010">
                <h3><?php echo $results_timeline[0]->timeline_name;?></h3>
                <em><?php echo $results_timeline[0]->timeline_description;?></em>
                <p> 
                    <?php echo $results_timeline[0]->timeline_responsibility;?>
                </p>
            </li>

            <li data-date="12/01/2012">
                <h3><?php echo $results_timeline[1]->timeline_name;?></h3>
                <em><?php echo $results_timeline[1]->timeline_description;?></em>
                <p> 
                    <?php echo $results_timeline[1]->timeline_responsibility;?>
                </p>
            </li>

            <li data-date="12/01/2013">
                <h3><?php echo $results_timeline[2]->timeline_name;?></h3>
                <em><?php echo $results_timeline[2]->timeline_description;?></em>
                <p> 
                    <?php echo $results_timeline[2]->timeline_responsibility;?>
                </p>
            </li>

            <li data-date="12/01/2014">
                 <h3><?php echo $results_timeline[3]->timeline_name;?></h3>
                <em><?php echo $results_timeline[3]->timeline_description;?></em>
                <p> 
                    <?php echo $results_timeline[3]->timeline_responsibility;?>
                </p>
            </li>

            <li data-date="12/01/2015" class="selected">
                 <h3><?php echo $results_timeline[4]->timeline_name;?></h3>
                <em><?php echo $results_timeline[4]->timeline_description;?></em>
                <p> 
                    <?php echo $results_timeline[4]->timeline_responsibility;?>
                </p>
            </li>

                       
        </ul>
    </div> <!-- .events-content -->
 
    <a href="#whoamI" class="btn arrow page-scroll">
        <i class="fa fa-angle-double-down animated"></i>
    </a> 
    
</section>

    <section id="whoamI" class="container other-content text-center">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="profile">
                    <div class="icon-holder">
                        <img src="<?php bloginfo('template_directory');?>/images/icons/person.png" alt="" class="icon">
                    </div>
                        
                    <h4 class="heading">Who Am I</h4>                                                                  
                        <?php
                        foreach($results_aboutme as $about){
                        echo "<p class='summaryheight'>".$about->aboutme_description."</p>"; 
                        }                                                                   
                        ?>
                       
                        
                        <a href="#portfolio" class="btn arrow page-scroll">
                           <i class="fa fa-angle-double-down animated " ></i>
                        </a> 
                </div><!--end of profile-->    
            </div>
        </div> <!--end of row-->

    </section><!--end of whoamI section-->
         
      
   
<!-- Start of Portfolio Section -->
    <section id="portfolio" class="portfolio-section text-center">
        <div class="container">
                            
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3 class="page-header">Portfolio
                    <small style="color:#959595">Lab Page</small>
                </h3>
            </div>
        </div>
        <!-- /.row -->       

        <!-- Projects-->       
        <?php
        foreach($results_project as $project){ ?>    
          
        <div class="col-md-6 portfolio-item">
            <a href="#">
                <img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/images/<?php echo  $project->project_image;?>" alt="">
            </a>
            <h4><a href="#"><?php echo $project->project_name;?></a></h4> 
                    <div class="project_text">
                        <ul>
                        <?php
                        
                            echo "<li align='justify'>".$project->project_description."</li><br>";
                            echo "<li>".$project->project_techone."</li>";
                            echo "<li>".$project->project_techtwo."</li>";
                            
                            
                        ?>
                        </ul>
                    </div>
                    <hr>           
                </div>                 
            <?php } ?>              
            
        </div><!--end of container-->
    </section><!--end of portfolio section-->


<!-- Start of Blog Section -->
   <!--  <section id="blog" class="content-section text-center">
            <div class="container ">
                <div class="col-lg-8 col-lg-offset-2">
                   
                            
                </div>
            </div>            
        
    </section> --><!--end of blog section-->

     <!-- Start of Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-6 col-sm-7">
                <div class="contact-info-box address clearfix">
                    <?php foreach($results_aboutme as $customer){ ?>

                    <h3><i class="fa fa-road" style="color:#3429ff"></i>Address:</h3>
                    <?php echo "<span>".$customer->aboutme_address."</span>";  ?>                                
                </div>
                
                <div class="contact-info-box phone clearfix">
                    <h3><i class="fa fa-mobilefa fa-phone-square" style="color:#3429ff"></i>Phone:</h3>
                <?php         
                    echo "<span>".$customer->aboutme_phoneno."</span>";
                    
                ?>
                </div>
   

                <div class="contact-info-box email clearfix">
                    <h3><i class="fa fa-envelope" style="color:#3429ff"></i>email:</h3>
                    <?php echo "<span>".$customer->aboutme_email."</span>"; ?>
                </div>

                <div class="contact-info-box email clearfix">
                    <h3><i class="fa fa-skype" style="color:#3429ff" ></i>skype:</h3>
                    <?php echo "<span>".$customer->aboutme_skype."</span>"; ?>
                </div>        

                <?php  }?>


                
                <ul class="social-link">
                    <li class="twitter"><a href="https://twitter.com/suwinphyu"><i class="fa fa-twitter fa-fw"></i></a></li>
                    <li class="facebook"><a href="https://www.facebook.com/suwinphyu"><i class="fa fa-facebook"></i></a></li>
                    <!-- <li class="gmail"><a href="#"><i class="fa fa-envelope-o"></i></a></li> -->
                    <li class="linkedin"><a href="https://www.linkedin.com/in/suwinphyu"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>

            <div class="col-lg-6 col-sm-5">
               <!-- <img src="" alt="avatar" class="avatar"> -->

            </div>
        </div><!--end of row-->
    </section><!--end of contact-->

<?php get_footer();?>
 