<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Panier d'achat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .delete-icon {
            width: 15px;
        }
        .titre {
            font-family: "Arial", sans-serif;
            color: #ff0000;
            font-size: 24px;
        }
    </style>
</head>

<body class="bg-gradient-to-b from-gray-800 to-gray-900 text-white ">
<?php include './views/partials/header.php'; ?>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold text-center">Panier d'achat</h1>

        <?php
        session_start();

        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
        }

        // Supprimer un produit du panier
        function supprimerProduit($id) {
            if (isset($_SESSION['panier'][$id])) {
                unset($_SESSION['panier'][$id]);
            }
        }

        // Calculer le montant total du panier
        function calculerTotal() {
            $total = 0;
            foreach ($_SESSION['panier'] as $product) {
                $total += floatval(str_replace('$', '', $product['price']));

            }
            return $total;
        }

        // Afficher le panier
        function afficherPanier() {
            echo '<table class="w-full max-w-lg mx-auto mt-8 bg-gray-900 border border-gray-700">';
            echo '<tr><th class="px-4 py-2">Image</th><th class="px-4 py-2">Produit</th><th class="px-4 py-2">Prix</th><th class="px-4 py-2">Action</th></tr>';

            foreach ($_SESSION['panier'] as $id => $product) {
                echo '<tr>';
                echo '<td class="px-4 py-2"><img class="h-24" src="' . $product['image_url'] . '" alt="' . $product['product'] . '"></td>';
                echo '<td class="px-4 py-2">' . $product['product'] . '</td>';
                echo '<td class="px-4 py-2">' . $product['price'] . '</td>';
                echo '<td class="px-4 py-2">
                    <form method="post" action="shopping-cart.php">
                        <input type="hidden" name="action" value="supprimer">
                        <input type="hidden" name="id" value="' . $id . '">
                        <button type="submit" class="p-2"><img class="delete-icon" src="delete.png" alt="Supprimer"></button>
                    </form>
                </td>';
                echo '</tr>';
            }

            echo '<tr><td colspan="4" class="px-4 py-2">Total : ' . calculerTotal() . '$</td></tr>';
            echo '</table>';
        }

        // Vérifier les actions à effectuer sur le panier
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['action']) && $_POST['action'] === 'supprimer' && isset($_POST['id'])) {
                supprimerProduit($_POST['id']);
            }
        }

        // Fonction pour ajouter un produit au panier
        function ajouterProduit($product) {
            $id = $product['id'];

            if (isset($_SESSION['panier'][$id])) {
                $_SESSION['panier'][$id]['quantity']++;
            } else {
                $_SESSION['panier'][$id] = array(
                    'image_url' => isset($product['image_url']) ? $product['image_url'] : '',
                    'product' => isset($product['product']) ? $product['product'] : '',
                    'price' => isset($product['price']) ? $product['price'] : '',
                    'quantity' => 1
                );
            }
        }

        $jsonData = file_get_contents('cart.json');
        $panier = json_decode($jsonData, true);

        // Ajouter chaque produit au panier
        foreach ($panier as $key => $value) {
            if (is_array($value) && isset($value['id']) && isset($value['product']) && isset($value['price'])) {
                ajouterProduit($value);
            }
        }

        // Afficher le panier
        afficherPanier();
        ?>

        <p class="text-center mt-4"><a href="checkout.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Aller à la page de paiement</a></p>
    </div>
    <?php include './views/partials/footer.php'; ?>

</body>
</html>



