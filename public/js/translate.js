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
    $('#cartLoadedDiv > div.cart > table > thead > tr > th.product').text('Product');
    $('#cartLoadedDiv > div.cart > table > thead > tr > th.shipping-date').text('Delivery');
    $('#cartLoadedDiv > div.cart > table > thead > tr > th.product-price').text('Price');
    $('#cartLoadedDiv > div.cart > table > thead > tr > th.quantity').text('Quantity');
        
});

//Circumvent alert button and replace content with English
/*
$(document).ready(function(){
    $('.btn-comparar').on('click', function(e){
        e.preventDefault();
    });
});
*/

