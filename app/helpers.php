<?php 


function presentPrice($price)
{
    $var = str_replace(',', '', $price);

    return number_format($var /1,0).' Ks';
}

function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category  ? $output : '';
}

function productImage($path)
{
    return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('images/not-found.jpg');
}
