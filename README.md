## Food-Recipes-Website

The project is a dynamic web application designed to provide a seamless user experience through a combination of front-end development and database integration. Leveraging HTML, CSS, and JavaScript, I crafted an intuitive and visually appealing interface tailored to meet specific functionalities. By using PHP along with SQL, I bridged the gap between the front-end interface and the database backend.

## Description

This website is designed to provide users with access to a database of food ingredients, which can then be used to make recipes. If you want to add recipes but don't have all the ingredients available in the database, you can add them yourself, and then go back to creating your own recipes. However, you can't make a recipe without having the necessary ingredients. After the recipes are created, users can see them, edit them, and delete them at any point after creation.

## Getting Started

If you want to run this project locally, you need to follow these steps:

1. Start by cloning this repository: `https://github.com/noragirda/Food-recipes-website.git`
2. Install a local development environment (I used USBWebserver).
3. Take the `foodsandrecipes.sql` file and create the database; you can give it any name you want, it doesn't have to be the same.
4. If you use USBWebserver, take the entire root directory and place it in the USBWebserver's root directory.
5. Make sure your database connection is successful.
6. You have to go through each `.php` file and add your own username and password wherever you find these lines in the code:
$host="localhost";
$username="your_own_username";
$user_pass="your_password_here";
$database_in_use="name_of_your_database";
7.Open a web browser and navigate to the local adress of your server to access the website.

##Usage
Now that the website is up and running, you can mess around and enjoy the features the website provide. 
