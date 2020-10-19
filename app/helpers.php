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

function getStockLevel($quantity)
{
    if($quantity > setting('site.stock_threshold')){
        $stockLevel = '<span class="badge badge-success" style="display:inline;">In Stock</span>';
    }elseif($quantity <= setting('site.stock_threshold') && $quantity > 0){
        $stockLevel = '<span class="badge badge-warning" style="display:inline;">Low Stock</span>';
    }else{
        $stockLevel = '<span class="badge badge-danger" style="display:inline;">Not available</span>';
    }

    return $stockLevel;
}