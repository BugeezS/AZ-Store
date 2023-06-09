<?php
$items = array(
    array(
        'id' => 1,
        'image_url' => './img/shoe_one.png',
        'product' => 'Shoe 1',
        'price' => '100 $',
    ),
    array(
        'id' => 2,
        'image_url' => './img/shoe_two.png',
        'product' => 'Shoe 2',
        'price' => '200 $',
    ),
    array(
        'id' => 3,
        'image_url' => './img/shoe_one.png',
        'product' => 'Shoe 3',
        'price' => '150 $',
    ),
    array(
        'id' => 4,
        'image_url' => './img/shoe_two.png',
        'product' => 'Shoe 4',
        'price' => '180 $',
    ),
);

$json_path = "./cart.json";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cart_data = json_decode(file_get_contents($json_path), true) ?? array(); 
    foreach ($items as $index => $item) {
        if (isset($_POST["button$index"])) {
            $cart_data[] = $item; 
        }
    }
    file_put_contents($json_path, json_encode($cart_data)); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <title>Document</title>
</head>
<body class="bg-gradient-to-b from-gray-800 to-gray-900">
    <?php include './views/partials/header.php'; ?>
    <main>
        <section class="flex flex-row ">
            <div class ="w-2/5 pt-60 pl-24 mr-24">
                <p class="text-9xl whitespace-normal text-white">SHOE THE RIGHT <span class="text-blue-600">ONE</span>.</p>
                <button class="bg-gradient-to-r from-indigo-500 h-12 w-36 rounded text-white">See our store</button>
            </div>
            <img src="./img/shoe_one.png" alt="shoe" class="">

        </section>
        <hr class="border-1 border-gray-700 mb-12">

        <section class="flex flex-col mb-24">
            <h2 class ="text-3xl text-white pl-24 pb-12 font-bold"> <span class="text-blue-600 ">Our</span> last products</h2>
            <div class="flex flex-row justify-around">
            <?php
                foreach ($items as $item) {
                    echo '<div class="products_shoes text-white  " id=' . $item["id"] . '>
                        <div class=" shadow-xl ">
                            <img class="w-64 mb-6" src=' . $item['image_url'] . '> 
                        </div>
                        <div class="flex flex-row justify-between">
                            <div class="flex flex-col">
                                <h3 class ="text-white text-xl font-bold">' . $item['product'] . '</h3> 
                                <p class ="text-white text-xl font-bold">' . $item['price'] . '</p>
                            </div>
                            <form method="post" action="">
                                <button name="button' . $i . '" class="add_to_cart bg-blue-500 w-24 h-8 rounded " type="submit">Add to cart</button>
                            </form>
                        </div>
                    </div>';
                    $i++;
                }
                ?>   
            </div>         
        </section>


        <section class="text-white mb-24">
            <div class="flex flex-col items-center">
                <img src="./img/shoe_two.png" alt="shoes 2" class="w-96">
                <div class="text-center w-1/4 ">
                    <p class="text-5xl font-bold">WE PROVIDE YOU THE <span class="text-blue-600">BEST</span> QUALITY</p>
                </div>
                <p class="text-xs w-1/3 text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam laudantium, id repellendus impedit quasi mollitia unde harum corrupti deserunt natus omnis sit nesciunt qui numquam deleniti, doloremque modi, est ex!</p>
            </div>
        </section>
        <section class="text-white pb-12">
            <div class="flex justify-center text-center text-sm">
                <div class="w-1/3 pl-24">
                    <div class="flex justify-center">
                        <img src="./img/image-emily.jpg" alt="shoes 2" class="rounded-full w-16 mb-4">
                    </div>
                    <p class="mb-4">Emily from xyz</p>
                    <p class="text-gray-400">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed porro, ipsam, repudiandae accusantium possimus sequi eos ad tempora, eaque quam nihil quidem non. Nisi eum necessitatibus laborum veniam atque vitae!"</p>
                </div>
                <div class="w-1/3 grid justify-center">
                <div class="flex justify-center">
                    <img src="./img/image-thomas.jpg" alt="shoes 2" class="rounded-full w-16 mb-4">
                </div>
                    <p class="mb-4">Thomas from corporate</p>
                    <p class="text-gray-400">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed porro, ipsam, repudiandae accusantium possimus sequi eos ad tempora, eaque quam nihil quidem non. Nisi eum necessitatibus laborum veniam atque vitae!"</p>
                </div>
                <div class="w-1/3 pr-24">
                <div class="flex justify-center">
                    <img src="./img/image-jennie.jpg" alt="shoes 2" class="rounded-full w-16 mb-4">
                </div>
                    <p class="mb-4">Jennie from Nike</p>
                    <p class="text-gray-400">"Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed porro, ipsam, repudiandae accusantium possimus sequi eos ad tempora, eaque quam nihil quidem non. Nisi eum necessitatibus laborum veniam atque vitae!"</p>
                </div>
            </div>
        </section>
    </main>
    <hr class="border-1 border-gray-700 mb-12">

    <?php include './views/partials/footer.php'; ?>

</body>
</html>
