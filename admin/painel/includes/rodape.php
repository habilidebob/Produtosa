<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        // Toggle Animation by Class
        $(window).scroll(function(){
        if($(document).scrollTop() > 100){
            $('nav').addClass('animate');
        }else{
            $('nav').removeClass('animate');
        }
        })
    </script>
  </body>
</html>