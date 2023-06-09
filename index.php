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
    <header>
        <nav class="flex flex-row justify-around  h-16 items-center">
            <h2 class="text-white text-2xl font-bold">AZ-[store]</h2>
            <ul class="flex flex-row ">
                <li class="pr-4 text-white">Home</li>
                <li class="pr-4 text-white">About</li>
                <li class="pr-4 text-white">Products</li>
                <li class="pr-4 text-white">Contact</li>
            </ul>
            <div class="flex flex-row">
                <svg fill="#ffff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                    width="20px" height="20px" viewBox="0 0 902.86 902.86"
                    xml:space="preserve" >
                <g>
                    <g>
                        <path d="M671.504,577.829l110.485-432.609H902.86v-68H729.174L703.128,179.2L0,178.697l74.753,399.129h596.751V577.829z
                            M685.766,247.188l-67.077,262.64H131.199L81.928,246.756L685.766,247.188z"/>
                        <path d="M578.418,825.641c59.961,0,108.743-48.783,108.743-108.744s-48.782-108.742-108.743-108.742H168.717
                            c-59.961,0-108.744,48.781-108.744,108.742s48.782,108.744,108.744,108.744c59.962,0,108.743-48.783,108.743-108.744
                            c0-14.4-2.821-28.152-7.927-40.742h208.069c-5.107,12.59-7.928,26.342-7.928,40.742
                            C469.675,776.858,518.457,825.641,578.418,825.641z M209.46,716.897c0,22.467-18.277,40.744-40.743,40.744
                            c-22.466,0-40.744-18.277-40.744-40.744c0-22.465,18.277-40.742,40.744-40.742C191.183,676.155,209.46,694.432,209.46,716.897z
                            M619.162,716.897c0,22.467-18.277,40.744-40.743,40.744s-40.743-18.277-40.743-40.744c0-22.465,18.277-40.742,40.743-40.742
                            S619.162,694.432,619.162,716.897z"/>
                    </g>
                </g>
                </svg>
                <span class="text-white">Login</span>
            </div>
        </nav>
        <hr class="border-1 border-gray-700">
    </header>
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


        <section class="text-white mb-64">
            <div class="flex flex-col items-center">
                <img src="./img/shoe_two.png" alt="shoes 2" class="w-96">
                <div class="text-center w-1/4 ">
                    <p class="text-5xl font-bold">WE PROVIDE YOU THE <span class="text-blue-600">BEST</span> QUALITY</p>
                </div>
                <p class="text-xs w-1/3 text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam laudantium, id repellendus impedit quasi mollitia unde harum corrupti deserunt natus omnis sit nesciunt qui numquam deleniti, doloremque modi, est ex!</p>
            </div>
        </section>
        <section class="text-white">
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

    <footer class="text-white">
        <ul>
            <li>Home</li>
            <li>About</li> 
            <li>Product</li>
            <li>Contact</li>
        </ul>
    </footer>
</body>
</html>
