<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="output.css">
        <script src="scripts/main.js"></script>
        <title>Checkout</title>
    </head>
    <body>
        <div class="w-full max-w-xs">
            <form method="post" action="#" id="form">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="firstName">First name :</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="firstName" type="text">
                    <p class="text-red-500 text-xs italic">Please enter your first name.</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="lastName">Last name :</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="lastName" type="text">
                    <p class="text-red-500 text-xs italic">Please enter your last name.</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="mail">Mail :</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="mail" type="email">
                    <p class="text-red-500 text-xs italic">Please enter your email.</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="adress">Adress :</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="adress" type="text">
                    <p class="text-red-500 text-xs italic">Please enter your adress.</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="postCode">Post code :</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="postCode" type="number">
                    <p class="text-red-500 text-xs italic">Please enter your post code.</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="town">Town :</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="town" type="text">
                    <p class="text-red-500 text-xs italic">Please enter your town.</p>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="country">Country :</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="country" type="text">
                    <p class="text-red-500 text-xs italic">Please enter your country.</p>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Submit</button>
                </div>
            </form>
        </div>

        <?php
            function names_validation(){
                if ((isset($_POST['firstName']) AND isset($_POST['lastName'])) AND (!empty($_POST['firstName']) AND !empty($_POST['lastName']))){
                    $_POST['firstName'] = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
                    $_POST['lastName'] = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
                    // if(preg_match("/^[A-Z][A-Za-z' -]*$/", $_POST['firstName']) AND preg_match("/^[A-Z][A-Za-z' -]*$/", $_POST['lastName'])) {
                    //     return true;
                    // }else{
                    //     $_POST['firstName'] = "Erreur";
                    //     $_POST['lastName'] = "Erreur";
                    //     echo "invalid form (names)<br>";
                    //     return false;
                    // }
                    return true;
                }else{
                    echo "empty or non-existent inputs (names)<br>";
                    return false;
                }
            }

            function mail_validation(){
                if (isset($_POST['mail']) AND !empty($_POST['mail'])){
                    $mail = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);

                    if (filter_var($mail, FILTER_VALIDATE_EMAIL)
                    // AND preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $mail)
                    ){
                        return true;
                    }else{
                        echo "invalid form (mail)<br>";
                        return false;
                    }
                }else{
                    echo "empty or non-existent input (mail)<br>";
                    return false;
                }
            }
            
            function adress_validation(){
                if (((isset($_POST['adress']) AND isset($_POST['postCode'])) AND isset($_POST['town']) AND isset($_POST['country']))
                AND (!empty($_POST['adress']) AND !empty($_POST['postCode']) AND !empty($_POST['town']) AND !empty($_POST['country']))){
                    $_POST['adress'] = filter_var($_POST['adress'], FILTER_SANITIZE_STRING);
                    $_POST['postCode'] = (int)filter_var($_POST['postCode'], FILTER_SANITIZE_NUMBER_INT);
                    $_POST['town'] = filter_var($_POST['town'], FILTER_SANITIZE_STRING);
                    $_POST['country'] = filter_var($_POST['country'], FILTER_SANITIZE_STRING);

                    if(is_string($_POST['adress']) && filter_var($_POST['postCode'], FILTER_VALIDATE_INT) && is_string($_POST['town']) && is_string($_POST['country'])){
                        return true;
                    }else{
                        echo "invalid form (adress)<br>";
                        return false;
                    }
                }else{
                    echo "empty or non-existent inputs (adress)<br>";
                    return false;
                }
            }
            function validation(){
                if(names_validation() && mail_validation() && adress_validation()){
                    return true;
                }else{
                    return false;
                }
            }
            if(validation()){
                // echo "<pre>";
                // print_r($_POST);
                // echo "</pre>";
                echo "Thank you for your order !";
            }else{
                echo "the form does not pass validation !";
            }
        ?>
    </body>
</html>