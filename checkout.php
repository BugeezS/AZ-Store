<?php 
    session_start(); 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (validation()) {
            clear_cart();
            echo "Thank you for your order ".$_POST['firstName']." !";
            header("Refresh: 3; url=".$_SERVER['PHP_SELF']);
            exit;
        } else {
            echo "<p>the form does not pass validation!</p>";
        }
    }
?>
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
    <body class="bg-gradient-to-b from-gray-800 to-gray-900">
    <?php include './views/partials/header.php'; ?>
        <h1 class="text-2xl flex justify-center text-center mt-1 text-white">Checkout informations</h1>
        <h2 class="text-xl flex justify-center text-center mt-1 text-white">Cart contents</h2>
        <div class="justify-center text-center text-white">
        <?php
            // Calculer le montant total du panier
            function calculate_total() {
                $total = 0;
                foreach ($_SESSION['cart'] as $product) {
                    $total += floatval($product['price']);
                }
                return $total;
            }
            // Afficher le panier
            function display_cart() {
                $jsonData = file_get_contents('cart.json');
                $products = json_decode($jsonData, true);
            
                if (!empty($products)) { 
                    $_SESSION['cart'] = $products;
                    
                    echo '<table class="w-full max-w-lg mx-auto mt-2 bg-gray-900 border border-gray-700">';
                    echo '<tr><th class="px-4 py-2">Image</th><th class="px-4 py-2">Produit</th><th class="px-4 py-2">Prix</th></tr>';
            
                    foreach ($_SESSION['cart'] as $id => $product) {
                        echo '<tr>';
                        echo '<td class="px-4 py-2"><img class="h-24" src="' . $product['image_url'] . '" alt="' . $product['product'] . '"></td>';
                        echo '<td class="px-4 py-2">' . $product['product'] . '</td>';
                        echo '<td class="px-4 py-2">' . $product['price'] . '</td>';
                        echo '<td class="px-4 py-2"></td>';
                        echo '</tr>';
                    }
                    echo '<tr><td colspan="4" class="px-4 py-2">Total : ' . calculate_total() . '$</td></tr>';
                    echo '</table>';
                } else {
                    echo 'Le panier est vide.';
                }
            }
            display_cart();
        ?>
        </div>
        <h2 class="text-xl flex justify-center text-center mt-1 text-white">delivery information</h2>
        <div class="flex justify-center text-center mt-1">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-lg" method="post" action="#" id="form">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="firstName">First name :</label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="firstName" type="text" required>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="lastName">Last name :</label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="lastName" type="text" required>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="mail">Mail :</label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="mail" type="email" required>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="adress">Adress :</label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="adress" type="text" required>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="postCode">Post code :</label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="postCode" type="number">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="town">Town :</label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="town" type="text" required>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="country">Country :</label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="country" type="text" required>
                    </div>
                </div>
                <div class="flex items-center justify-between flex justify-center">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Submit</button>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="reset">Reset</button>
                </div>
            </form>
        </div>
        <div class="flex justify-center text-center text-white mb-8">
        <?php
            // Validation du nom et prénom
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
            // Validation de l'adresse mail
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
            // Validation de l'adresse, ville, code postal et pays
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
            // Validation du formulaire
            function validation(){
                if(names_validation() && mail_validation() && adress_validation()){
                    return true;
                }else{
                    return false;
                }
            }
            // Vider le panier
            function clear_cart() {
                $_SESSION['cart'] = array();
                file_put_contents('cart.json', '');
            }
            // if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            //     if(validation()){
            //         clear_cart();
            //         echo "Thank you for your order ".$_POST['firstName']." !";
            //         header("Refresh: 3; url=".$_SERVER['PHP_SELF']);
            //         exit;
            //     }else{
            //         echo "<p >the form does not pass validation !</p>";
            //     }
            // }
        ?>
        </div>
    <?php include './views/partials/footer.php'; ?>

    </body>
</html>