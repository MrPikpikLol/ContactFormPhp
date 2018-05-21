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
                <form id="contact-form" method="post" action="" role="form">
                    <div class="col-md-6">
                        <label for="firstname">Prenom<span class="blue">*</span></label>
                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Votre prénom">
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-6">
                        <label for="name">Nom<span class="blue">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Votre nom">
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-6">
                        <label for="email">email<span class="blue">*</span></label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Votre email">
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-6">
                        <label for="phone">Telephone<span class="blue">*</span></label>
                        <input type="tel" id="phone" name="phone" class="form-control" placeholder="Votre téléphone">
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-12">
                        <label for="phone">Message<span class="blue">*</span></label>
                        <textarea id="message" name="message" class="form-control" placeholder="message"></textarea>
                        <p class="comments"></p>
                    </div>

                    <div class="col-md-12">
                        <p class="blue"><strong>* Ces informations sont requises</strong></p>
                    </div>

                    <div class="col-md-12">
                        <input type="submit" class="button1" value="Envoyer">
                    </div> 

                </form>
            </div>
        </div>

    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>