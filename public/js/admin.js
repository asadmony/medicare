   $(document).ready(function() {  

/////////////////////////////
    $(".select2").select2();

/////////////////////////////
      $(document).on('click','.changed-menu',function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        // alert(url);

        $.ajax({
          url: url,
          type: 'GET',
          dataType: 'json',
          beforeSend: function()
          {
              // $(".modal-feed").show();
          },
          complete: function()
          {
              // $(".modal-feed").hide();
          },
        })
        .done(function(response) {
          // $("#modalLargeFeed").empty().append(response);

          $(".changer").empty().append(response);

          $(".select2").select2();
          

        })
        .fail(function() {
          alert("error");
      });
        
  });

/////////////////////////////////
      $(document).on("click", ".select-cat", function(e){
        e.preventDefault();

        var url = $(this).attr('data-url');
        var box = $(this).closest(".box");
        // alert(url);

        $.ajax({
          url: url,
          type: 'Post',
          dataType: 'json',
          cache: false,
          beforeSend: function()
          {
              // $(".modal-feed").show();
          },
          complete: function()
          {
              // $(".modal-feed").hide();
          },
        })
        .done(function(response) {
          // $("#modalLargeFeed").empty().append(response);

          box.empty().append(response);

          
          

        })
        .fail(function() {
          alert("error");
      });


      });

/////////////////////////////
      $(document).on("click", ".select-subcat", function(e){
        e.preventDefault();

        var url = $(this).attr('data-url');
        var box = $(this).closest(".box");
        // alert(url);

        $.ajax({
          url: url,
          type: 'Post',
          dataType: 'json',
          cache: false,
          beforeSend: function()
          {
              // $(".modal-feed").show();
          },
          complete: function()
          {
              // $(".modal-feed").hide();
          },
        })
        .done(function(response) {
          // $("#modalLargeFeed").empty().append(response);

          box.empty().append(response);

        $('.select2').select2({
          minimumInputLength: 1,
          tags:true,
          tokenSeparators: [','],
          ajax: {
            data: function (params) {
              return {
                q: params.term, // search term
                page: params.page
              };
            },
            processResults: function (data, params) {
              params.page = params.page || 1;
              // alert(data[0].s);
              var data = $.map(data, function (obj) {
                obj.id = obj.id || obj.title;
                return obj;
              });
              var data = $.map(data, function (obj) {
                obj.text = obj.text || obj.title;
                return obj;
              });
              return {
                results: data,
                pagination: {
                  more: (params.page * 30) < data.total_count
                }
              };
            }
          },
        });

 

          
          

        })
        .fail(function() {
          alert("error");
      });


      });




      ////////////////////////////////////
      

$(document).on('keypress', '.product-search', function(e) {
    if(e.which == 13) {
        e.preventDefault();
    }
});

$(document).on('keypress', '.order-search', function(e) {
    if(e.which == 13) {
        e.preventDefault();
    }
});

$(document).on('keypress', '.invoice-search', function(e) {
    if(e.which == 13) {
        e.preventDefault();
    }
});


      $(document).on("keyup", ".product-search", function(e){
    e.preventDefault();

    var that = $( this );
    var q = e.target.value;
    var url = that.attr("data-url");
    var urls = url+'?q='+q;
    // var datalist = $("#products");
    // datalist.empty();
    // alert(urls);
    
    $.ajax({
      url: urls,
      type: 'GET',
      cache: false,
      dataType: 'json',
      success: function(response)
      {
        $(".product-table-body").empty().append(response.page);
      },
      error: function(){}
    });
  });


  /////////////////////////////////////

      $(document).on("keyup", ".order-search", function(e){
    e.preventDefault();
    var that = $( this );
    var q = e.target.value;
    var url = that.attr("data-url");
    var urls = url+'?q='+q;
    // var datalist = $("#products");
    // datalist.empty();
    // alert(urls);
    
    $.ajax({
      url: urls,
      type: 'GET',
      cache: false,
      dataType: 'json',
      success: function(response)
      {
        $(".order-table-body").empty().append(response.page);
      },
      error: function(){}
    });
  });


      /////////////////////////////////////

      $(document).on("keyup", ".invoice-search", function(e){
    e.preventDefault();
    var that = $( this );
    var q = e.target.value;
    var url = that.attr("data-url");
    var urls = url+'?q='+q;
    // var datalist = $("#products");
    // datalist.empty();
    // alert(urls);
    
    $.ajax({
      url: urls,
      type: 'GET',
      cache: false,
      dataType: 'json',
      success: function(response)
      {
        $(".invoice-table-body").empty().append(response.page);
      },
      error: function(){}
    });
  });

      ////////////////////////////////////
      $(document).on('submit','#product-form',function(s){

      s.preventDefault();
      var form = $(this),
      // box = $(this).closest(".box"),
      url = form.attr('action'),
      type = form.attr('method'),
      alldata = new FormData( this );
      // alert(alldata);

      $(".help-block").remove();


      $.ajax({
        url: url,
        type: type,
        // dataType: 'json',
        data: alldata,
        // mimeType:"multipart/form-data",
        contentType: false,
        cache: false,
        processData:false,
        // beforeSend: function()
        // {

        // },
        // complete: function()
        // {

        // },
      }).done(function(response){

        if(response.success == true)
        {
          $(".changer").empty().append(response.page);
          $(".success-js-alert").show();



        }
        else
        {
          $.each( response.errors, function( key, value ) {
            $("input[name~='"+key+"']").after( "<span class='help-block text-red'><strong>"+value+"</strong></span>" );
          });
        }
      
      }).fail(function(){
          alert('error');
      });
  });

  ///////////////////////////////

  $(document).on('click', '.edit-cat', function(e){
    e.preventDefault();
    var that = $(this),
        url = that.attr('data-url');
        // alert(url);
        $.ajax({
          url: url,
          type: 'GET',
          dataType: 'json',
          beforeSend: function()
          {
              // $(".modal-feed").show();
          },
          complete: function()
          {
              // $(".modal-feed").hide();
          },
        })
          .done(function(response) {
            // $("#modalLargeFeed").empty().append(response);

            $(".changer").empty().append(response);
            

          })
          .fail(function() {
            alert("error");
        });



  });
 
  ///////////////////////////////


   $(document).on('click', '.edit-subcat', function(e){
    e.preventDefault();
    var that = $(this),
        url = that.attr('data-url');
        // alert(url);
        $.ajax({
          url: url,
          type: 'GET',
          dataType: 'json',
          beforeSend: function()
          {
              // $(".modal-feed").show();
          },
          complete: function()
          {
              // $(".modal-feed").hide();
          },
        })
          .done(function(response) {
            // $("#modalLargeFeed").empty().append(response);

            $(".changer").empty().append(response);
            

          })
          .fail(function() {
            alert("error");
        });



  });
 
  ///////////////////////////////

  $(document).on('click', '.edit-product', function(e){
    e.preventDefault();
    var that = $(this),
        url = that.attr('data-url');
        // alert(url);
        $.ajax({
          url: url,
          type: 'GET',
          dataType: 'json',
          beforeSend: function()
          {
              // $(".modal-feed").show();
          },
          complete: function()
          {
              // $(".modal-feed").hide();
          },
        })
          .done(function(response) {
            // $("#modalLargeFeed").empty().append(response);

            $(".changer").empty().append(response);




            $('.select2').select2({
          minimumInputLength: 1,
          tags:true,
          tokenSeparators: [','],
          ajax: {
            data: function (params) {
              return {
                q: params.term, // search term
                page: params.page
              };
            },
            processResults: function (data, params) {
              params.page = params.page || 1;
              // alert(data[0].s);
              var data = $.map(data, function (obj) {
                obj.id = obj.id || obj.title;
                return obj;
              });
              var data = $.map(data, function (obj) {
                obj.text = obj.text || obj.title;
                return obj;
              });
              return {
                results: data,
                pagination: {
                  more: (params.page * 30) < data.total_count
                }
              };
            }
          },
        });


            
            

          })
          .fail(function() {
            alert("error");
        });



  });
 
  ///////////////////////////////

    ///////////////////////////////

  $(document).on('click', '.order-confirm', function(e){
    e.preventDefault();
    var that = $(this),
        url = that.attr('data-url');
        // alert(url);
        $.ajax({
          url: url,
          type: 'Post',
          dataType: 'json',
          beforeSend: function()
          {
              // $(".modal-feed").show();
          },
          complete: function()
          {
              // $(".modal-feed").hide();
          },
        })
          .done(function(response) {
            // $("#modalLargeFeed").empty().append(response);

            that.closest(".tr-part").empty().append(response);
            

          })
          .fail(function() {
            alert("error");
        });



  });


    ///////////////////////////////

  $(document).on('click', '.order-delete', function(e){
    e.preventDefault();
    var that = $(this),
        url = that.attr('data-url');
        // alert(url);
        $.ajax({
          url: url,
          type: 'Post',
          dataType: 'json',
          beforeSend: function()
          {
              // $(".modal-feed").show();
          },
          complete: function()
          {
              // $(".modal-feed").hide();
          },
        })
          .done(function(response) {
            // $("#modalLargeFeed").empty().append(response);

            that.closest(".tr-part").remove();
            

          })
          .fail(function() {
            alert("error");
        });



  });
 
  ///////////////////////////////

$(document).on('click', '.search-delete', function(e){
    e.preventDefault();
    var that = $(this),
        url = that.attr('data-url');
        // alert(url);
        $.ajax({
          url: url,
          type: 'Post',
          dataType: 'json',
          beforeSend: function()
          {
              // $(".modal-feed").show();
          },
          complete: function()
          {
              // $(".modal-feed").hide();
          },
        })
          .done(function(response) {
            // $("#modalLargeFeed").empty().append(response);

            that.closest(".tr-part").remove();
            

          })
          .fail(function() {
            alert("error");
        });



  });
 
  ///////////////////////////////
  $(document).on('click','.radio-cheque', function(e){
    $( ".bank-field" ).slideUp( "fast", function() {} );
    $( ".cheque-field" ).slideDown( "slow", function() {});
  });

  $(document).on('click','.radio-bank', function(e){
    $( ".cheque-field" ).slideUp( "fast", function() {} );
    $( ".bank-field" ).slideDown( "slow", function() {});
  });

  $(document).on('click','.radio-cash', function(e){
    $( ".cheque-field, .bank-field" ).slideUp( "fast", function() {} );
  });

  $(".alert").delay(2000).slideUp(1000, function() {
      $(this).alert('close');
    });


  ///////////////////////////////



  // $(document).on('keypress','.product-desc-form',function(event){
  //   if(event.which == 13){
  //     event.preventDefault();
  //     var that = $(this);
  //     var s = that.val();
  //     that.val(s+" \n");
  //   }

  // });


  ////////////////////////////

  //////// new for epl ////////////


  $(document).on('keypress', '.data-search-for-table', function(e) {
    if(e.which == 13) {
      e.preventDefault();
    }
  });

  $(document).on("keyup", ".data-search-for-table", function(e){
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
        $(".all-data-by-paginate").empty().append(response);
      },
      error: function(){}
    });
  });


/////////// delay start ////////////////
var delay = (function(){
var timer = 0;
return function(callback, ms){
  clearTimeout (timer);
  timer = setTimeout(callback, ms);
};
})();
/////////// delay end /////////////////




//product code
//change paste keyup mouseup input
$(document).on('change paste keyup mouseup input', '.product-select-by-term', function(e){
    var q = e.target.value;
    var that = $( this );
    var url =  that.attr("data-url");
    var urls = url + '?q=' + q;
    // alert(urls);

    delay(function(){  
    $.ajax({
      url: urls,
      type: 'GET',
      cache: false,
      dataType: 'json',
      success: function(response)
      {
        if(!response.success)
        {
          // alert('ok');
          $("#product_name").val('');
          if(that.attr('data-id') == 'barcode')
          {
            $("#product_code").val('');

          }
          else if( that.attr('data-id') == 'product_code')
          {

              $("#barcode").val('');
          }
          $("#prouuct_id").val('');

          // $("#tax").val(0);
          $("#transfer_quantity").val(1);
          $("#sale_price").val(0);
          $("#sub_total").val(0);
          $("#ep").val(0);
          $("#ep_subtotal").val(0);
        }
        else if(response.success && response.product == null)
        {
          // $("#txtPurProductName").val('');
          // $("#txtPurUnitPrice").val(0);
          // $("#txtPurchaseQuantity").val('');
          // $("#txtTax").val(0);
          // $("#txtDiscount").val(0);
          // $("#txtPerUnitCost").val(0);
          // $("#txtWholeSalePrice").val(0);
          // $("#txtRetailPrice").val(0);
          // $("#txtPurSubTotal").val(0);
          // $("#txtAdditionalCost").val(0);
        }
        else
        {
          $("#product_name").val(response.product.product_name);

          if(that.attr('data-id') == 'barcode')
          {
            $("#product_code").val(response.product.code);

          }
          else if( that.attr('data-id') == 'product_code')
          {

              $("#barcode").val(response.product.barcode);
          }

          $("#product_id").val(response.product.id);
          $("#transfer_quantity").val(response.product.stock_quantity);
          
          $("#sale_price").val(response.product.sale_price);
          $("#ep").val(response.product.ep);
          $("#sub_total").val(response.product.sale_price * $("#transfer_quantity").val());
          $("#ep_subtotal").val(response.product.ep * $("#transfer_quantity").val());

          // $("#txtTax").val(response.productDetails.tax);
          // $("#txtWholeSalePrice").val(response.productDetails.wholeSale_price);
          // $("#txtRetailPrice").val(response.productDetails.retail_price);
        }
      },
      error: function(){}
    }); //ajax 
}, 50);
  });



  $(document).on('submit','.form-transfer-to-branch',function(s){

      s.preventDefault();
      var form = $(this),
      // box = $(this).closest(".box"),
      url = form.attr('action'),
      type = form.attr('method'),
      alldata = new FormData( this );
      // alert(alldata);

      $(".help-block").remove();


      $.ajax({
        url: url,
        type: type,
        // dataType: 'json',
        data: alldata,
        // mimeType:"multipart/form-data",
        contentType: false,
        cache: false,
        processData:false,
        // beforeSend: function()
        // {

        // },
        // complete: function()
        // {

        // },
      }).done(function(response){

        if(response.success == true)
        {

          $('.all-data-area').empty().append(response.page);
          $("#total_cost").val(response.totalPrice);
          // $(".d-d").text(response.d);
          // $(".success-js-alert").show();


          $("#product_name").val('');
          $("#product_code").val('');
          $("#barcode").val('');
          $("#prouuct_id").val('');

          // $("#tax").val(0);
          $("#transfer_quantity").val(1);
          $("#sale_price").val(0);
          $("#sub_total").val(0);
          $("#ep").val(0);
          $("#ep_subtotal").val(0);
          



        }
        else
        {
          $.each( response.errors, function( key, value ) {
            $("[name~='"+key+"']").after( "<span class='help-block text-red'><strong>"+value+"</strong></span>" );
          });
        }

        // $("#barcode").focus();



      }).fail(function(){
        alert('error');
      });
    });


$(document).on('click', '.data-delete', function(e){

  e.preventDefault();

    var that = $(this),
    url = that.attr('href'),
    table = that.closest('.data-row');
        // alert(url);
        $.ajax({
          url: url,
          type: 'GET',
          dataType: 'json',
        })
        .done(function(response) {
         if(response.success)
         {
          table.remove();
          $(".d-d").text(response.d);
          $(".d-d").val(response.d);
         }
       })
        .fail(function() {
          alert("error");
        });
      });


$(document).on("change", "#select_agent", function(e){
    e.preventDefault();

    var that = $( this );
    var q = that.val();
    var url = that.attr("data-url");
    var urls = url+'?q='+q;
    // var datalist = $("#products");
    // datalist.empty();
    // alert(urls);

    $(".help-block").remove();
    
    $.ajax({
      url: urls,
      type: 'GET',
      cache: false,
      dataType: 'json',
      success: function(response)
      {
        if(response.success)
        {
          var due = response.due,

          pd = $("#previous_due").val(due),
          pt = Number($("#total_cost").val()),
          dis = Number($('#discount').val()),
          paid = Number($("#paid_amount").val()),
          other = Number($("#other_charge").val()),
          add = Number(due) + Number(pt) + Number(other),
          gt = parseFloat((add - Number(dis))).toFixed(2);
          $("#grand_total").val(gt);  
          due = parseFloat(gt - paid).toFixed(2);
          // $("#txtPurPaid").val(gt);  
          // $("#txtPurDue").val(gt);
          $("#due_amount").val(due);
         
        }        
      },
      error: function(){}
    });
  });
  

$(document).on('keyup', '#discount', function(){

    $(".help-block").remove();

    var discount = Number($( this ).val()),
        prev_due = Number($("#previous_due").val()),
        total_cost = Number($("#total_cost").val()),
        other_charge = Number($("#other_charge").val()),
        grand_total = parseFloat(prev_due + total_cost + other_charge - discount).toFixed(2),
        paid = Number($("#paid_amount").val()),
        due = parseFloat(grand_total - paid).toFixed(2);
    $("#grand_total").val(grand_total);
    $("#due_amount").val(due);
  });

  $(document).on('keyup', '#paid_amount', function(){

    $(".help-block").remove();

    var paid = Number($( this ).val()),
        prev_due = Number($("#previous_due").val()),
        total_cost = Number($("#total_cost").val()),
        discount = Number($("#discount").val()),
         other_charge = Number($("#other_charge").val()),
    grand_total = parseFloat(prev_due + total_cost +other_charge - discount).toFixed(2),       
        due = parseFloat(grand_total - paid).toFixed(2);
    $("#grand_total").val(grand_total);
    $("#due_amount").val(due);
  });

  $(document).on('keyup', '#other_charge', function(){

    $(".help-block").remove();

    var other_charge = Number($( this ).val()),
        prev_due = Number($("#previous_due").val()),
        total_cost = Number($("#total_cost").val()),
        discount = Number($("#discount").val()),
         paid = Number($("#paid_amount").val()),
    grand_total = parseFloat(prev_due + total_cost + other_charge - discount).toFixed(2),       
        due = parseFloat(grand_total - paid).toFixed(2);
    $("#grand_total").val(grand_total);
    $("#due_amount").val(due);
  });




 });
