<?php
include(__DIR__ . "/../config/config.php"); 
session_start(); /* this allows you to save data in $_SESSION */
/* https://www.w3schools.com/php/php_sessions.asp */

/* write PHP functions here */

function test()
{
    return "test";
}

function getBreedInfo($breed_id, $api_key)
{
    $breed_url = "https://api.thecatapi.com/v1/breeds/$breed_id?api_key=$api_key";
    return json_decode(file_get_contents($breed_url), true);
}

function getImages($breed_id, $api_key)
{
    $image_url = "https://api.thecatapi.com/v1/images/search?breed_ids=$breed_id&limit=10&api_key=$api_key";
    return json_decode(file_get_contents($image_url), true);
}

    //generate html for the stars
function generateStars($rating) {
    $stars = str_repeat('<i class="fa-solid fa-star"></i>', $rating);
    $stars .= str_repeat('<i class="fa-regular fa-star"></i>', 5 - $rating);
    return "<span class='rating'>$stars</span>";
}
?>