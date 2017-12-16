<!DOCTYPE html>
<html lang="en">
<head>
  <title>Page de confirmation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
if(isset($_POST['email'])) {

    //php form
    $email_to = "elkabir.asma@gmail.com";
    $email_subject = "CV stage web developper";

    function died($error) {
        // error code
        echo "Je suis désolée, mais une erreur est survenue. Veuillez recommencer.";
        echo $error."<br /><br />";
        die();
    }


    // validation expected data exists
    if(!isset($_POST['nom']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('Je suis désolée, mais une erreur est survenue.');
    }



    $first_name = $_POST['nom']; // required
    $email_from = $_POST['email']; // required
    $comments = $_POST['message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'Veuillez entrer une adresse valide.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'Veuillez entrer un nom valide.<br />';
  }

  if(strlen($comments) < 2) {
    $error_message .= 'Votre message n\'est pas valide. Veuillez recommencer.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

    $email_message = "Veuillez trouver les détails ci-dessous.\n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }



    $email_message .= "Nom: ".clean_string($first_name)."\n";
    $email_message .= "E-mail: ".clean_string($email_from)."\n";
    $email_message .= "Message: ".clean_string($comments)."\n";

// email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

<?php

}
?>


<!--Main menu-->
  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Accueil</a>
    </div><!--navbar header-->

  <ul class="nav navbar-nav">
    <li><a href="index.php#cl">A propos</a></li>
    <li><a href="index.php#education">Formation</a></li>
    <li><a href="index.php#experience">Expériences</a></li>
    <li><a href="index.php#skills">Compétences</a></li>
    <li><a href="index.php#portfolio">Portfolio</a></li>
    <li><a href="index.php#hobby">Intérêts</a></li>
    <li><a href="index.php#contact">Contact</a></li>
  </ul><!--nav left-->

  <ul class="nav navbar-nav navbar-right"><!--nav right-->
    <li><a href="https://www.linkedin.com/in/asma-el-kabir-a20295151/" target="_blank"><i class="fa fa-linkedin" style="font-size:20px"></i></a></li>
    <!-- <li><a href="#"><i class="fa fa-skype" style="font-size:20px"></i></a></li>
    <li><a href="#"><i class="fa fa-google-plus" style="font-size:20px"></i></a></li>
    <li><a href="#"><i class="fa fa-github" style="font-size:20px"></i></a></li> -->
    <li><a href="index.php#contact"><i class="fa fa-envelope" style="font-size:20px"></i></a></li>
  </ul><!--nav droite-->

  </div><!--container-fluid-navbar-->
  </nav><!--navbar main-menu-->
<div class="container">
  <h2 style="padding-top: 100px">Message envoyé !</h2>
  <div class="alert alert-success">
    <strong>Merci pour votre message !</strong> Je reviendrai vers vous très rapidement !</div>

</div>

</body>
</html>
