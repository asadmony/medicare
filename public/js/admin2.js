$(document).ready(function() {


      $(document).on('submit', '.cashout-delete-form', function(e){
      e.preventDefault();
      var that = $(this),
          url = that.attr('action');
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

              that.closest(".box").remove();
              

            })
            .fail(function() {
              alert("error");
          });
    });
 
 ////////////////////////////////////
 
 $(document).on('click','.cashout-pay-now',function(e){
  e.preventDefault();
   var that = $(this),
   url = that.attr('data-url');

   $.ajax({
          url: url,
          type: 'Post',
          dataType: 'json',
        })
          .done(function(response) {
 
            if(response.success)
            {
              that.closest('.box').empty().append(response.page);
            }

          })
          .fail(function() {
            alert("error");
        });
 });
  



    ///////////////////////////////

  $(document).on('click', '.delete-extra-img', function(e){
    e.preventDefault();
    var that = $(this),
        url = that.attr('data-url');
        // alert(url);
        // that.closest('li').remove();
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

            that.closest('li').remove();
            

          })
          .fail(function() {
            alert("error");
        });



  });
 
  ///////////////////////////////
    
 

      $(document).on('keypress','.input-color', function(e) {
          if(e.which == 13) {

            var that = $(this),
            url = that.attr('data-url'),
            color = that.val();

             $(".help-block").remove();
              $.ajax({
              url: url,
              type: 'POST',
              data: {color: color},
       
            }).done(function(response){

              if(response.success == true)
              {
                $('tbody.add-tr-color').empty().append(response.page);
                $('.input-color').val('').focus();
       

              }
              else
              {
                $('.input-color').after( "<span class='help-block text-red'><strong>"+response.error+"</strong></span>" );
              }
            
            }).fail(function(){
                alert('error');
            });

              return false;
          }
      });


      $(document).on('click','.btn-color-add',function(s){
      s.preventDefault();
      var  that = $( this ),
      url = that.attr('data-url'),
      color = $(".input-color").val();

      
      $(".help-block").remove();
      $.ajax({
        url: url,
        type: 'POST',
        // dataType: 'json',
        data: {color: color},
        // mimeType:"multipart/form-data",
        // contentType: false,
        // cache: false,
        // processData:false,
        // beforeSend: function()
        // {

        // },
        // complete: function()
        // {

        // },
      }).done(function(response){

        if(response.success == true)
        {
          $('tbody.add-tr-color').empty().append(response.page);
          $('.input-color').val('').focus();
 

        }
        else
        {
          $('.input-color').after( "<span class='help-block text-red'><strong>"+response.error+"</strong></span>" );
        }
      
      }).fail(function(){
          alert('error');
      });
  });
      ///////////////////////////////////////////////
      

      $(document).on('click', '.color-list-delete', function(e){
    e.preventDefault();
    var that = $(this),
        url = that.attr('data-url');
        // alert(url);
        $.ajax({
          url: url,
          type: 'Post',
          dataType: 'json',
          // beforeSend: function()
          // {
          //     // $(".modal-feed").show();
          // },
          // complete: function()
          // {
          //     // $(".modal-feed").hide();
          // },
        })
          .done(function(response) {

 
             $('tbody.add-tr-color').empty().append(response.page);
           

          })
          .fail(function() {
            alert("error");
        });



  });

  
 
 

      $(document).on('keypress','.input-size', function(e) {
          if(e.which == 13) {

            var that = $(this),
            url = that.attr('data-url'),
            size = that.val();

             $(".help-block").remove();
              $.ajax({
              url: url,
              type: 'POST',
              data: {size: size},
       
            }).done(function(response){

              if(response.success == true)
              {
                $('tbody.add-tr-size').empty().append(response.page);
                $('.input-size').val('').focus();
       

              }
              else
              {
                $('.input-size').after( "<span class='help-block text-red'><strong>"+response.error+"</strong></span>" );
              }
            
            }).fail(function(){
                alert('error');
            });

              return false;
          }
      });


      $(document).on('click','.btn-size-add',function(s){
      s.preventDefault();
      var  that = $( this ),
      url = that.attr('data-url'),
      size = $(".input-size").val();

      
      $(".help-block").remove();
      $.ajax({
        url: url,
        type: 'POST',
        // dataType: 'json',
        data: {size: size},
        // mimeType:"multipart/form-data",
        // contentType: false,
        // cache: false,
        // processData:false,
        // beforeSend: function()
        // {

        // },
        // complete: function()
        // {

        // },
      }).done(function(response){

        if(response.success == true)
        {
          $('tbody.add-tr-size').empty().append(response.page);
          $('.input-size').val('').focus();
 

        }
        else
        {
          $('.input-size').after( "<span class='help-block text-red'><strong>"+response.error+"</strong></span>" );
        }
      
      }).fail(function(){
          alert('error');
      });
  });
      ///////////////////////////////////////////////
      

      $(document).on('click', '.size-list-delete', function(e){
    e.preventDefault();
    var that = $(this),
        url = that.attr('data-url');
        // alert(url);
        $.ajax({
          url: url,
          type: 'POST',
          dataType: 'json',
 
        })
          .done(function(response) {

 
             $('tbody.add-tr-size').empty().append(response.page);
           

          })
          .fail(function() {
            alert("error");
        });



  });

      ///////////////////////////
      
      

 

  });