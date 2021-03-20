
  <script type="text/javascript">
    $(document).ready(function () {
      $("a.activity, .activity").click(function(event) {
        event.preventDefault();
        $("#invalid_alert_msg").text("You need to login first.");
        $('#invalid_alert').modal('toggle');
      });
    });

    function myFunction() {
      var dots = document.getElementById("dots");
      var moreText = document.getElementById("more");
      var btnText = document.getElementById("myBtn");
    
      if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = "Read more"; 
        moreText.style.display = "none";
      } else {
        dots.style.display = "none";
        btnText.innerHTML = "Minimize"; 
        moreText.style.display = "inline";
      }
    }

    function expandFunction() {
        var dots = document.getElementById("dot");
        var moreText = document.getElementById("more_data");
        var btnText = document.getElementById("expBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "More Details"; 
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Minimize"; 
            moreText.style.display = "inline";
        }
    }

    function expandFunction2(){
        var dots = document.getElementById("dot2");
        var moreText = document.getElementById("more_data2");
        var btnText = document.getElementById("expBtn2");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "More Details"; 
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Minimize"; 
            moreText.style.display = "inline";
        }
    }

  </script>

  <div class="modal fade" id="invalid_alert">
    <div class="modal-dialog" style="top: 30%">
      <div class="modal-content">
        <div class="modal-body">
          <i class="fas fa-exclamation-triangle fa-2x"></i>
          <p id="invalid_alert_msg" align="center"></p>
          <br />
        </div>
      </div>
    </div>
  </div>
