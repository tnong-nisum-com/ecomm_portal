var checkoutHREF = 'https://nisumusa.vtexcommercestable.com.br/checkout/#/cart';
        var bagCount = $('em.amount-items-em').text()*1;
        var productCount = $('em.amount-products-em').text()*1;
        var itemHREF = null;
        
        //set bag count
        $('.cart-info .items').text(bagCount);

        //clicking bag icon would go to checkout
        $('.shop-cart-button').attr('href', checkoutHREF);
        
        //allow click only if cart is greater than 0
        $('.shop-cart-button').click(function(e){
            if(bagCount === 0){
                e.preventDefault();
            }else{
                $(this).unbind('click');
            }
        });
        
        //disable add to cart click and increment bag count
        $('.add a').click(function(e){
            e.preventDefault();
            var buyParams = JSON.parse(qryStringStringify($(this).attr('href')));
            vtexjs.checkout.getOrderForm().then(
                function(OrderForm){
                    var item = {
                        id: buyParams.id,
                        quantity: buyParams.qty,
                        seller: buyParams.seller
                    };
                    return vtexjs.checkout.addToCart([item], null, buyParams.sc);
                }
            )
            .done(
                function(OrderForm){
                    console.log(OrderForm);
                }
            );
            
            $('.cart-info .items').text(bagCount);
        });
        
        var postCart = function(){
            $.ajax({
                url: '/api/checkout/pub/orderForm/f04c983604e1425d8c65d2835572ca9f/items/update/',
                type: 'post',
                success: function(html){
                    console.log(html);
                }
            });
        };
        
        var bridgeCORS = function(iLink){
            var url = 'https://216.218.200.215/cart.php';
            var vtexLink = iLink.split('?')[0];
            var data = qryStringStringify(iLink);
            $.ajax({
                url: url,
                data: 'data=' + data,
                dataType: 'html',
                type: 'post',
                success: function(html){
                    return html;
                }
            });
        };
        
        var getCartTotals = function(turl){
            var url = 'https://216.218.200.215/cors_bridge.php';
            var targetURL = encodeURIComponent(turl);
            $.ajax({
                url: url,
                data: 'url=' + targetURL,
                dataType: 'html',
                type: 'get',
                success: function(html){
                    alert(html);
                }
            });
        };
       
        var qryStringStringify = function(iLink){
           var actionString = iLink.split('?')[0];
           var qryString = iLink.split('?')[1];
           var qryParts = qryString.split('&');
           var nameValue = {};
           for(var i = 0; i < qryParts.length; i++){
               var name = qryParts[i].split('=')[0];
               nameValue[name] = qryParts[i].split('=')[1];
           }
           return JSON.stringify(nameValue);
        };