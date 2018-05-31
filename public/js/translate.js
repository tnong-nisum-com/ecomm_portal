//Translate controls
$('.btn-comparar').text('Compare');

//Translate cart
$('.add a').text('Add');

//Buy button
$('.buy-button').text('Add to Cart');

$(document).ready(function(){
    $('.product-description .btn-group a:first-child').text('Product Description');
    $('.product-description .btn-group a:nth-child(2)').text('Product Specifications');
    $('.product-description .btn-group a:nth-child(3)').text('Reviews');
});

//Circumvent alert button and replace content with English
/*
$(document).ready(function(){
    $('.btn-comparar').on('click', function(e){
        e.preventDefault();
    });
});
*/

