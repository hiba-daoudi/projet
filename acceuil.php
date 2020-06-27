
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@2.0.0/dist/tf.min.js"></script>
    <link rel="stylesheet" href="mnist2.css">
    <link rel="stylesheet" href="test/css/imgareaselect.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="acceuil.css">
    <title>Document</title>
    
</head>
<body>
<!-- <video autoplay muted loop id="myVideo">
  <source src="VI.mp4" type="video/mp4">
</video> -->
    <form action="enre.php" method='post' enctype="multipart/form-data">
    <input type="file" name="image" id="image" />
    <p><img id="previewimage" style="display:none;" width="400px" /></p>   
    <!-- Modal --> 
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Traitement</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Vous voulez rogner cette image ?
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-secondary" name="non" >Non</button>
         <button type="submit" class="btn btn-primary" name="oui">Oui</button>
</form>
        </div>
      </div>
    </div>
  </div>

  <!-- Button trigger modal -->   
  <center><button style="display:none;"data-toggle="modal" id="Traitement" data-target="#exampleModal"> Traitement </button> </center>
    
</body>
<script>
    
    jQuery(function($) {
 
        var p = $("#previewimage");
        $("body").on("change", "#image", function(){
 
            var imageReader = new FileReader();
            imageReader.readAsDataURL(document.getElementById("image").files[0]);
     
            imageReader.onload = function (oFREvent) {
                p.attr('src', oFREvent.target.result).fadeIn();
            };
            document.getElementById("Traitement").style.display = "block";
        });

 });

</script>
</html>