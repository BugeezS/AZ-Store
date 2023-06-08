<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
<form method="post" action="#">
        <label for="firstName">First name :</label>
        <input name="firstName" type="text"><br>
        <label for="lastName">Last name :</label>
        <input name="lastName" type="text"><br>
        <label for="mail">Mail :</label>
        <input name="mail" type="email"><br>
        <label for="adress">Adress :</label>
        <input name="adress" type="text"><br>
        <label for="postCode">Post code :</label>
        <input name="postCode" type="number"><br>
        <label for="town">Town :</label>
		<input name="town" type="text"><br>
        <label for="country">Country :</label>
		<input name="country" type="text"><br>
        <button type="submit">Submit</button>
    </form>
    <?php
        function mail_validation(){
            if (isset($_POST['mail']) AND !empty($_POST['mail'])){
                $mail = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);
                if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    echo "L'adresse email est considérée comme valide.";
                    return true;
                }else{
                    echo "L'adresse email est considérée comme invalide.";
                    return false;
                }
            }else{
                echo "invalid form (mail)";
                return false;
            }
        }
        function form_validation(){
            if ((isset($_POST['firstName']) AND isset($_POST['lastName']) AND isset($_POST['adress']) AND isset($_POST['postCode']) AND isset($_POST['town']) AND isset($_POST['country'])) AND (!empty($_POST['firstName']) AND !empty($_POST['lastName']) AND !empty($_POST['adress']) AND !empty($_POST['postCode']) AND !empty($_POST['town']) AND !empty($_POST['country']))){
                $_POST['postCode'] = (int)$_POST['postCode'];
                if(is_string($_POST['firstName']) && is_string($_POST['lastName']) && is_string($_POST['adress']) && is_int($_POST['postCode']) && is_string($_POST['town']) && is_string($_POST['country'])){
                    return true;
                }else{
                    echo "invalid form 2";
                    return false;
                }
            }else{
                echo "invalid form 1";
                return false;
            }
        }
        function validation(){
            if(mail_validation() && form_validation()){
                return true;
            }else{
                return false;
            }
        }
        if(validation()){
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
            echo gettype($_POST['firstName'])."<br>";
            echo gettype($_POST['lastName'])."<br>";
            echo gettype($_POST['mail'])."<br>";
            echo gettype($_POST['adress'])."<br>";
            echo gettype($_POST['postCode'])."<br>";
            echo gettype($_POST['town'])."<br>";
            echo gettype($_POST['country'])."<br>";
        }else{
            echo "the form does not pass validation";
        }
    ?>
</body>
</html>