$(function(){


$(".cart-items-container").slimScroll({

height: '260px',

});

///////////////////////////////////////////////

 $(document).on('click', '.product-add-to-pack', function(e){
  e.preventDefault();

  


  var that = $( this );

  var cart = $(".shopping-cart-area");


  var imgtodrag = $(this).closest('.product-container').find("img").eq(0);


  	if (imgtodrag) 
  	{
        var imgclone = imgtodrag.clone()
            .offset({
            top: imgtodrag.offset().top ,
            left: imgtodrag.offset().left 
        })
            .css({
                'opacity': '0.5',
                'position': 'absolute',
                'height': '150px',
                'width': '150px',
                'z-index': '10000',
                'border-radius': '6px',
        })
            .appendTo($('body'))
            .animate({
                'top': cart.offset().top + 15,
                'left': cart.offset().left + 20,
                'width': 75,
                'height': 75,
                'border-radius': '4px',
        }, 1000, 'easeInOutExpo');
        
        setTimeout(function () {
            cart.effect("bounce", {
                times: 2
            }, 200);
        }, 1500);

        imgclone.animate({
            'width': 0,
            'height': 0
        }, function () {
            $(this).detach();
            var cartCount = Number($(".cart-counter").text());
            // $(".cart-counter").text(Number(cartCount + 1));

            $.get(that.attr('data-url'), function(data) 
            {
               if(data.success)
               {
                  // $(".cart-items-container").slimScroll({
 
                  //   height: '260px',
                   
                  // });
                  $(".cart-item-dropdown-menu").empty().append(data.cartItems);
                  $(".cart-counter").empty().append(data.cartsCount);

                  $(".cart-items-container").slimScroll({
                      height: '260px',
                  });

               }
            });

        });
    };
  });


 $(document).on('click', '.cart-item-decrement', function(e){

  e.stopPropagation();
  e.preventDefault();

  var that = $( this );
  var cic = that.closest('.dropdown-item').find('.cart-item-counter');
  var count = Number(cic.text() - 1);
  var moq = that.closest('.dropdown-item').find('.moq').val();
  if(moq <= count)
  {
    cic.text(count);
    $(".cart-counter").text(Number($(".cart-counter").text() - 1));

    var ip = that.closest('.dropdown-item').find('.item-price').val();
    that.closest('.dropdown-item').find('.item-total-price').text(Number(cic.text() * ip));

    

  }
  else
  {
    that.closest('.dropdown-item').remove();
    $(".cart-counter").text(Number($(".cart-counter").text() - moq));
  }

  var sum = 0;
    $('.item-total-price').each(function(){
        sum += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
    });

    $(".total-price").text(sum.toFixed(2));


  $.get(that.attr('data-url'), function(data) 
  {
     if(data.success)
     {
        // $(".cart-counter").empty().append(data.cartsCount);
     }
  });

 });

 $(document).on('click', '.cart-item-increment', function(e){
  e.stopPropagation();
  e.preventDefault();  
  var that = $( this );
  var cic = that.closest('.dropdown-item').find('.cart-item-counter');
  var cicValue = Number(cic.text());
  var count = Number(cicValue + 1);
    cic.text(count);
    var ip = that.closest('.dropdown-item').find('.item-price').val();    
    that.closest('.dropdown-item').find('.item-total-price').text(Number(cic.text() * ip));
  var cc = Number($(".cart-counter").text());
    $(".cart-counter").text(Number( cc + 1));

    var sum = 0;
    $('.item-total-price').each(function(){
        sum += parseFloat($(this).text());  // Or this.innerHTML, this.innerText
    });

    $(".total-price").text(sum.toFixed(2));

  $.get(that.attr('data-url'), function(data) 
  {
  });

 });

 ///////////////////////////////////////////////


 $(document).on('keypress', '.lead-search-by-type', function(e) {
    if(e.which == 13) {
      e.preventDefault();
    }
  });

  $(document).on("keyup", ".lead-search-by-type", function(e){
    e.preventDefault();
    var that = $( this );
    var q = e.target.value;
    var url = that.attr("data-url");
    var urls = url+'?q='+q;    
    $.ajax({
      url: urls,
      type: 'GET',
      cache: false,
      dataType: 'json',
      success: function(response)
      {
        $(".leads-container").empty().append(response);
      },
      error: function(){}
    });
  });


 });