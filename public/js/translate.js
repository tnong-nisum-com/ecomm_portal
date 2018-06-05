//Translate controls
$('.btn-comparar').text('Compare');

//Translate cart
$('.add a').text('Add');

//Buy button
$('.buy-button').text('Add to Cart');

$(window).ready(function(){
    $('.product-description .btn-group a:first-child').text('Description');
    $('.product-description .btn-group a:nth-child(2)').text('Specifications');
    $('.product-description .btn-group a:nth-child(3)').text('Reviews');
    //Translations for cart
    $('.product').text('Product');
    $('.shipping_date').text('Delivery');
    $('.product-price').text('Price');
    $('.quantity').text('Quantity');
        
});

//Circumvent alert button and replace content with English
/*
$(document).ready(function(){
    $('.btn-comparar').on('click', function(e){
        e.preventDefault();
    });
});
*/

