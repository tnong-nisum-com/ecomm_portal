$(document).ready(function(){
    var itemList;
    var bagCount = 0;
    
    vtexjs.checkout.getOrderForm()
    .done(function(OrderForm){
        var quantity = 0; 

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
    
    var bridgeCORS = function(iLink, itemObj){
        var url = 'https://216.218.200.215/cart.php';
        var vtexLink = iLink.split('?')[0];
        var data = qryStringParse(iLink);

        //update item quantity
        if(itemObj[data.sku] !== undefined){
            //update item quantity
            data.qty = itemObj[data.sku] + 1;
        }else{
            data.qty = 1;
        }

        //save as string so can be ajax-ed
        data = JSON.stringify(data);

        $.ajax({
            url: url,
            data: 'data=' + data,
            dataType: 'html',
            type: 'post',
            success: function(html){
                //update current state of the cart
                //update current state of the cart
                var count = $('.cart-info .items').text().match(/[0-9]/g)*1;
                count++;
                updateCartCount(count);
            }
        });
    };
});



