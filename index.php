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
<body>
    <header>
        <nav class="flex flex-row justify-around border-solid border-black border-2 ">
            <h2>AZ-[store]</h2>
            <ul class="flex flex-row justify-between">
                <li>Home</li>
                <li>About</li>
                <li>Products</li>
                <li>Contact</li>
            </ul>
            <div class="flex flex-row">
                <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                    width="20px" height="20px" viewBox="0 0 902.86 902.86"
                    xml:space="preserve">
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
                <span>Login</span>
            </div>
        </nav>
    </header>
    <main>
        <section>
            <p>ShOE THE RIGHT ONE.</p>
            <button>See our store</button>
            <img src="./img/shoe_one.png" alt="shoe">
        </section>
        <section class="flex flex-row">
            <h3>Our last products</h3>
            <?php
            foreach ($items as $item) {
                echo '<div class="products_shoes " id=' . $item["id"] . '>
                    <img src=' . $item['image_url'] . '> 
                    <h3>' . $item['product'] . '</h3> 
                    <p>' . $item['price'] . '</p>
                    <form method="post" action="">
                        <button name="button' . $i . '" class="add_to_cart" type="submit">add to cart</button>
                    </form>
                </div>';
                $i++;
            }
            ?>            
        </section>
        <section>
            <div>
                <img src="./img/shoe_two.png" alt="shoes 2">
                <p>WE PROVIDE YOU THE BEST QUALITY</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam laudantium, id repellendus impedit quasi mollitia unde harum corrupti deserunt natus omnis sit nesciunt qui numquam deleniti, doloremque modi, est ex!</p>
            </div>
            <div>
                <div>
                    <img src="./img/image-emily.jpg" alt="shoes 2">
                    <span>Emily from xyz</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed porro, ipsam, repudiandae accusantium possimus sequi eos ad tempora, eaque quam nihil quidem non. Nisi eum necessitatibus laborum veniam atque vitae!</p>
                </div>
                <div>
                    <img src="./img/image-thomas.jpg" alt="shoes 2">
                    <span>Thomas from corporate</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed porro, ipsam, repudiandae accusantium possimus sequi eos ad tempora, eaque quam nihil quidem non. Nisi eum necessitatibus laborum veniam atque vitae!</p>
                </div>
                <div>
                    <img src="./img/image-jennie.jpg" alt="shoes 2">
                    <span>Jennie from Nike</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed porro, ipsam, repudiandae accusantium possimus sequi eos ad tempora, eaque quam nihil quidem non. Nisi eum necessitatibus laborum veniam atque vitae!</p>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <ul>
            <li>Home</li>
            <li>About</li> 
            <li>Product</li>
            <li>Contact</li>
        </ul>
    </footer>
</body>
</html>
