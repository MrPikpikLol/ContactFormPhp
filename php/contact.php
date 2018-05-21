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