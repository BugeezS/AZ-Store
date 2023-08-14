# AZ_Store

## Project overview

- Type of challenge : consolidation
- Duration : 2 days
- Group : 2/3 
- Form : TBD

## Learning objectives

- Use variables, conditions, loops, functions, *json_encode()* and *json_decode()*.

## The Mission

You are a web developer for a web agency and your boss has asked you to create a small shopping cart for a website of a client (see below). The shopping cart should be able to add and remove products. The shopping cart should also be able to display the total price of the products in it.

## Pages

- index.php : 
  - The home page (it should display the products). 
  - Each product should have a button to add it to the shopping cart.

- shopping-cart.php : 
  - The shopping cart should have a button to remove a product from the shopping cart
  - The shopping cart should have a button to go to the checkout page

- Checkout.php : 
  - The checkout page (it should display the products in the shopping cart). 
  - The checkout page should have a form to give informations for the shipping with the following fields:
    - First name
    - Last name
    - Email
    - Address
    - City
    - Zip code
    - Country
  - The checkout page should have a button, after submiting the form, just display a message "Thank you for your order" and empty the shopping cart.

### Must-have features

- The user should be able to add a product to the shopping cart.
- The user should be able to remove a product from the shopping cart.
- The user should be able to see the total price of the products in the shopping cart.
- Use **a json file** to store the shopping cart. (using a json file for this purpose is only to introduce file manipulation in PHP)
- Your file structure should include a **views** folder for pages, this views folder should also include a "partials" folder for elements that are repeated on mutiple pages and should be **included** or **required** ; for example header, nav, footer, learn more about this on google ;)
- Use an array to store the products. Each product should be an array.

```php
$items = [
    [
        'id' => 1,
        'product' => 'Nike Air Max 270',
        'price' => 140,
        'image_url' => '/assets/img/nike-air-max-279.jpeg', 
    ],
    // ...
];
```

- Validate the form (all fields are required, email should be a valid email, zip code should be a number, etc...).
- Sanitize the data (remove the spaces, remove the special characters, etc...).



### Good to know
- You may use tailwindcss or other CSS frameworks to style the website.


### Deliverables

- Just a repository on github with the code is enough. (You will learn how to deploy your website later).
  
### Printscreen

The client wants the website to look like this. Create the pages and make them look like this. You can use the images in the assets folder.

![Example](az_store.png)
