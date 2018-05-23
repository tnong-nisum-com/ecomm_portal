var itemList = {};
var bagCount = 0;
var quantity = 0; 

$(document).ready(function(){
    var count = $('#shop-cart p.cart-info span:nth-child(4)').text()*1;
    $('.cart-info .items').text(count);
});
