
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
</head>
<body>
    <?php
    if(isset($error)){
        ErrorNotificate($error);
    }
     ?>
    <form class="body" action="/SchoolMangmentSystem/index.php/Home" method="post" enctype="multipart/form-data">
    <div class="BodyLogin"> 
    <?php require 'View\partials\Login\pic.php' ?>    
    <div class="Container">
    <?php require 'View\partials\Login\loginParagraph.php' ?>    
    <div>
    <?php require 'View\partials\Login\email.php' ?>    
    </div>
    <div>
    <?php require 'View\partials\Login\password.php' ?>    
    </div>
    <?php require 'View\partials\Login\Button.php' ?>    
    </div>
    </div>
    </form> 
</body>
</html>