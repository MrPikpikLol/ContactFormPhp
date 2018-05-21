<?php 

    $firstname = $name = $email = $phone = $message = "";
    $firstnameError = $nameError = $emailError = $phoneError = $messageError = "";
    $isSuccess = false; 
    $emailTo = "pikpikdev@gmail.com";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $firstname = verifyInput($_POST['firstname']);
        $name = verifyInput($_POST['name']);
        $email = verifyInput($_POST['email']);
        $phone = verifyInput($_POST['phone']);
        $message = verifyInput($_POST['message']);
        $isSuccess = true;
        $emailText = "";

        if(empty($firstname))
        {
            $firstnameError = "Je veux connaitre ton prénom !";
            $isSuccess = false;
        }
        else
        {
            $emailText .= "firstName : $firstname\n";
        }
            
        if(empty($name))
        {
            $nameError = "Et oui je veux tout savoir, même ton nom !";
            $isSuccess = false;
        }
        else
        {
            $emailText .= "name : $name\n";
        }

        if(!isEmail($email))
        {
            $emailError = "T'éssaies de me rouler ? Ce n'est pas un email ça !";
            $isSuccess = false;
        }
        else
        {
            $emailText .= "email : $email\n";
        }

        if(empty($phone))
        {
            $phoneError = "Je vois bien que ce n'est pas un numéro de téléphone !";
            $isSuccess = false;
        }
        else
        {
            $emailText .= "phone : $phone\n";
        }

            
        if(empty($message))
        {
            $messageError = "Qu'est ce que tu veux me dire ?";
            $isSuccess = false;
        }
        else
        {
            $emailText .= "message : $message\n";
        }

        if($isSuccess)
        {
           $headers = "From: $firstname $name <$email>\r\nReply-To: $email"; 
           mail($emailTo, "Un message de votre site", $emailText, $headers);
           $firstname = $name = $email = $phone = $message = ""; 
        }

    }

    /*function isPhone($var)
    {
        return preg_match("/^[0-9 ]*$/", $var);
    }*/

    function isEmail($var)
    {
        return filter_var($var, FILTER_VALIDATE_EMAIL);
    }

    function verifyInput($var)
    {
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);

        return $var;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contactez Moi</title>

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">



</head>

<body>
    <div class="container">
        
        <div class="divider"></div>
        <div class="heading">
            <h2>Contactez-moi</h2>
        </div>
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <form id="contact-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form">
                    <div class="col-md-6">
                        <label for="firstname">Prenom<span class="blue">*</span></label>
                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Votre prénom" value="<?php echo $firstname; ?>">
                        <p class="comments"><?php echo $firstnameError; ?></p>
                    </div>

                    <div class="col-md-6">
                        <label for="name">Nom<span class="blue">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Votre nom" value="<?php echo $name; ?>">
                        <p class="comments"><?php echo $nameError; ?></p>
                    </div>

                    <div class="col-md-6">
                        <label for="email">email<span class="blue">*</span></label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Votre email" value="<?php echo $email; ?>">
                        <p class="comments"><?php echo $emailError; ?></p>
                    </div>

                    <div class="col-md-6">
                        <label for="phone">Telephone<span class="blue">*</span></label>
                        <input type="tel" id="phone" name="phone" class="form-control" placeholder="Votre téléphone" value="<?php echo $phone; ?>">
                        <p class="comments"><?php echo $phoneError; ?></p>
                    </div>

                    <div class="col-md-12">
                        <label for="phone">Message<span class="blue">*</span></label>
                        <textarea id="message" name="message" class="form-control" placeholder="message"></textarea value="<?php echo $message; ?>">
                        <p class="comments"><?php echo $messageError; ?></p>
                    </div>

                    <div class="col-md-12">
                        <p class="blue"><strong>* Ces informations sont requises</strong></p>
                    </div>

                    <div class="col-md-12">
                        <input type="submit" class="button1" value="Envoyer">
                    </div> 

                    <p class="thank-you" style="display: <?php if($isSuccess) echo 'block'; else echo 'none' ?>">Votre message à bien été envoyé. Merci de m'avoir contacté :)</p>

                </form>
            </div>
        </div>

    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>