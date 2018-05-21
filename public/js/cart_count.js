var itemList;
var bagCount = 0;
var quantity = 0; 

$(document).ready(function(){
    vtexjs.checkout.getOrderForm()
    .done(function(OrderForm){
        for(var i = 0; i < OrderForm.items.length; i++){
            itemList[OrderForm.items[i].id] = OrderForm.items[i].quantity;
            quantity += OrderForm.items[i].quantity;
         } 

         quantity = quantity*1;
         updateCartCount(quantity);
    });
    
    var updateCartCount = function(quantity){
        //update current state of the cart
        var string = $('.cart-info .items').text().replace(/[0-9]+/g, quantity);
        $('.cart-info .items').text(string);
        //update global count
        bagCount = quantity;
    };
});

