        var checkoutHREF = 'https://nisumusa.vtexcommercestable.com.br/checkout/#/cart';
        var bagCount = $('em.amount-items-em').text()*1;
        var productCount = $('em.amount-products-em').text()*1;
        var itemHREF = null;
        var itemList = {};
        var order_form_id = null;
        
        
        $(document).ready(function(){
            //disable add to cart click and increment bag count
            $('.add a').click(function(e){
                e.preventDefault();
                var buyLink = $(this).attr('href');
                //get orderFormId
                vtexjs.checkout.getOrderForm()
                .done(function(OrderForm){
                    order_form_id = OrderForm.orderFormId;
                    bridgeCORS(buyLink, itemList);
                });
            });
        });
        
        //set bag count
        $('.cart-info .items').text(bagCount);
        
        $('.add a').text('Add');

        //clicking bag icon would go to checkout
        $('.shop-cart-button').attr('href', checkoutHREF);
        
        
        //get current cart and update
        var updateCartCount = function(){
            var quantity = 0; 
            vtexjs.checkout.getOrderForm()
            .done(function(OrderForm){
                for(var i = 0; i < OrderForm.items.length; i++){
                    itemList[OrderForm.items[i].id] = OrderForm.items[i].quantity;
                    quantity += OrderForm.items[i].quantity;
                 } 
                 quantity = quantity*1;
            });
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
                data.qty = itemObj[data.sku]*1 + 1;
            }else{
                data.qty = 1;
            }
            //add orderFormId
            data.orderFormId = order_form_id;
            
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
                    updateCartCount();
                }
            });
        };
        
       
        var qryStringParse = function(iLink){
           var actionString = iLink.split('?')[0];
           var qryString = iLink.split('?')[1];
           var qryParts = qryString.split('&');
           var nameValue = {};
           
           for(var i = 0; i < qryParts.length; i++){
               var name = qryParts[i].split('=')[0];
               nameValue[name] = qryParts[i].split('=')[1];
           }
           return nameValue;
        };
