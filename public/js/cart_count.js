var itemList = {};
var bagCount = 0;
var quantity = 0; 

$(function(){

	vtexjs.checkout.getOrderForm()
            .done(function(OrderForm){
var quantity = 0;
                for(var i = 0; i < OrderForm.items.length; i++){
                    itemList[OrderForm.items[i].id] = OrderForm.items[i].quantity;
                    quantity += OrderForm.items[i].quantity;
                 } 
		quantity = quantity*1;
    $('.cart-info .items').text(quantity);
            });
});
