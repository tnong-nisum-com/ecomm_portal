//Translate controls
$('.btn-comparar, .buy-button').text('Compare');

//Translate cart
$('.add a').text('Add');

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

