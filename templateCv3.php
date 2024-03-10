<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Realisation de CV</title>
   <style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

main {
    box-shadow: 30px 0px 40px rgb(196, 196, 196), -30px 0px 40px rgb(196, 196, 196);
    margin: auto;
    max-width: 900px;
}

.srkl {
    display: flex;
    justify-content: space-between;
    margin-top: 25px;
    background-color: white;
    width: 100%;
}
header {
    height: 160px;
    padding-top: 10px;
    color: white;
    background-color: #024788	;
}

.photo {
    margin-left: 7%;
    border-radius: 50%;
    width: 130px;
    height: 130px;
    overflow: hidden;
}
.des{
    margin-left: 25%;
    margin-top: -10%;
}
h3{
    color: #0097e1 ;
    font-weight: bold;
    letter-spacing: .1rem;
    font-size: 20px;
}
.post{
    color: orange;
    font-weight: bold;
    letter-spacing: .1rem;
}
.right{
    padding: 0;
    margin: 5px;
    margin-top: -10%;
}
.right p{
   margin-left: 600px;
   letter-spacing: .1rem;
}
.info{
    width: 20px;
    height: 20px;
}
.section-left{
    background-color: white;
    float: left;
    width: 400px;
}
.section-right{
    background-color: white;
    float: right;
    width: 400px;
}
 h4{
    margin-left: 10%;
    color: #0097e1 ;
    letter-spacing: .1rem;
    font-size: 18px;
}
hr.light{
 border-top: 2px solid #0097e1 ;
 width: 90%;
 margin-top: .8rem;
 margin-bottom: 1rem;
}
.atouts{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    margin-left: 10%;
}
.div{
    margin-left: 10%;
}

.skls {
    padding: 0px;
    width: 40%;
    margin-left: 10%
}
.cool {
    background-color: #fff;
    border: 2px solid #ccc;
    width: 300px;
    height: 7px;
}

.po {
    margin-top: 20px;
}
strong{
    color: #0097e1 ;
    text-decoration: none;
}
.inner {
    height: 100%;
    background-color:  black;
}
.interet{
    margin-left: 10%;
}
span{
    margin-left: 10px;
}
   </style>

</head>
<a href="telecharger_cv3.php" class="btn-download" download>Télécharger CV en PDF</a>



<body>
 <!-- Bouton de téléchargement PDF -->
    <?php
    // Inclure votre classe CV
    require_once('Cv_classe.php');

    // Récupérer les données du CV depuis la base de données (remplacez l'ID approprié)
    $cv = CV::fetchCVFromDatabase();

    // Vérifier si le CV existe
    if ($cv) {
?>
    <main>
       <header>
                <div class="photo">
                <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents($cv->getImagePath())); ?>"  width="100%" height="100%" alt="">
                </div>
                <div class="des">
                <h3 style="color: white;"><?php echo $cv->getNom();?> <?php echo $cv->getLnom();?></h3>
            </div>
            <div class="right">
                <p><img src="data:image/png;base64,<?php echo base64_encode(file_get_contents('mail.png')); ?>" class="info"><?php echo $cv->getMail(); ?></p>
                <p><img src="data:image/png;base64,<?php echo base64_encode(file_get_contents('maps.png')); ?>" class="info"><?php echo $cv->getAdr() . ', ' . $cv->getCp() . ' ' . $cv->getCity(); ?></p>
                <p><img src="data:image/png;base64,<?php echo base64_encode(file_get_contents('tele.png')); ?>" class="info"><?php echo $cv->getPhone(); ?></p>
            </div>

       </header>


<section class="section-left">
    <h4>About Me</h4>
    <hr class="light">
     <div class="div">
     <?php echo $cv->getHeadline(); ?>
     </div>

     <h4>Diplomas and qualifications</h4>
    <hr class="light">
       <div class="div">

           <div>
            <?php
                     $degree = $cv->getDegree();
                     if ($degree !== null) {
                 ?>
           <b><?php echo $degree; ?></b><strong> / <?php echo $cv->getEcole1(); ?></strong>  <?php echo $cv->getLieuDiplome1(); ?> <br> <?php echo $cv->getDateDegree(); ?>

            <?php
               }
             ?>
           </div>

           <br>

               <div>
                      <?php
                               $degree2 = $cv->getDegree2();
                               if ($degree2 !== null) {
                           ?>
                     <b><?php echo $degree2; ?></b> <strong> /<?php echo $cv->getEcole2(); ?></strong>  <?php echo $cv->getLieuDiplome2(); ?> <br> <?php echo $cv->getDateDegree2(); ?>

                      <?php
                         }
                       ?>
               </div>

       </div>

    <h4>Erofessional experiences</h4>
     <hr class="light">
        <div class="div">
      <?php
          $work = $cv->getWork();
          if ($work !== null) {
      ?>
          <p>
              <b><?php echo $work; ?></b> <strong>,<?php echo $cv->getEntreprise1(); ?> <?php echo $cv->getLieu1(); ?></strong><br>
              <?php echo $cv->getDateWork(); ?><br>
              <?php echo $cv->getDescription1(); ?> <strong> <?php echo $cv->getEntreprise1(); ?> </strong>.
          </p>
      <?php
          }
      ?>

      <?php
          $work2 = $cv->getWork2();
          if ($work2 !== null) {
      ?>
        <p>
                    <b><?php echo $work; ?></b> <strong>,<?php echo $cv->getEntreprise2(); ?> <?php echo $cv->getLieu2(); ?></strong><br>
                    <?php echo $cv->getDateWork2(); ?><br>
                    <?php echo $cv->getDescription2(); ?> <strong> <?php echo $cv->getEntreprise2(); ?> </strong>.
                </p>
      <?php
          }
      ?>

        </div>
            <h4>Certifications</h4>
             <hr class="light">
                <div class="div">
              <?php
                  $certif = $cv->getCertif();
                  if ($work !== null) {
              ?>
                  <p>
                      <b><?php echo $certif; ?></b>
                  </p>
              <?php
                  }
              ?>
              </div>
</section>

<section class="section-right">
    <h4>skills</h4>
    <hr class="light">
      <div class="skls">

                <div class="po">
                    <p><?php echo $cv->getSkills(); ?></p>
                    <div class="cool">
                        <div style="width:80%  " class="inner"></div>
                    </div>
                </div>

                <div class="po">
                    <p><?php echo $cv->getDescriptionDiplome1(); ?> </p>
                    <div class="cool">
                        <div style="width:75%" class="inner"> </div>
                    </div>
                </div>

                <div class="po">
                    <p><?php echo $cv->getDescriptionDiplome2(); ?></p>
                    <div class="cool">
                        <div style="width:65%" class="inner"> </div>
                    </div>
                </div>

            </div>


     <h4>language</h4>
     <hr class="light">
     <div class="skls">
         <div class="po">
                    <p><?php echo $cv->getLanguages(); ?></p>
                    <div class="cool">
                        <div style="width:90%" class="inner"> </div>
                    </div>
                </div>
                <div class="po">
                    <p><?php echo $cv->getLanguages2(); ?></p>
                    <div class="cool">
                        <div style="width:75%" class="inner"> </div>
                    </div>
                </div>
                    <div class="po">
                                    <p><?php echo $cv->getLanguages3(); ?></p>
                                    <div class="cool">
                                        <div style="width:68%" class="inner"> </div>
                                    </div>
                                </div>
      </div>
     <h4>Social networks</h4>
     <hr class="light">
     <div class="interet">
      <p> <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents('f.png')); ?>" class="info"><span>https://www.facebook.com/<?php echo $cv->getFacebook();?></span></p>
      <p><img src="data:image/png;base64,<?php echo base64_encode(file_get_contents('l.png')); ?>" class="info"><span>https://www.instagram.com/<?php echo $cv->getLinkedin();?></span></p>
      <p><img src="data:image/png;base64,<?php echo base64_encode(file_get_contents('g.png')); ?>" class="info"><span><?php echo $cv->getGit();?></span></p>
      <p><img src="data:image/png;base64,<?php echo base64_encode(file_get_contents('t.png')); ?>" class="info"><span>https://www.twitter.com/pro_azou?s=08</span></p>

     </div>


    <h4>Hobbies</h4>
     <hr class="light">
     <div class="interet">
          <div><b>Sport</b></div>
          <div><b>Surf the Internet</b></div>
          <div><b>Reading</b></div>
          <div><b>to travel</b></div>
     </div>
</section>


        <div class="srkl">

        </div>
     <hr class="light">
    </main>
    <?php
        } else {
            echo "Aucun CV trouvé dans la base de données.";
        }
    ?>


</body>

</html>