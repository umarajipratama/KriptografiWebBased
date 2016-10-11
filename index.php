<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Double Caesar Cipher</title>

    <!-- Bootstrap -->
    <link href="asset/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="asset/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="asset/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="asset/css/custom.css">

  </head>
  <body>
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <nav class="navbar navbar-default">
           <div class="container-fluid">
             <!-- Brand and toggle get grouped for better mobile display -->
             <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                 <span class="sr-only">Toggle navigation</span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand animated fadeInLeft" href="#"><i class="fa fa-star-half-empty">&nbsp;</i>Double Caesar Cipher&nbsp;<i class="fa fa-star-half-empty"></i></a>
             </div>

             <!-- Collect the nav links, forms, and other content for toggling -->
          
           </div><!-- /.container-fluid -->
         </nav>
       </div>
     </div><!-- row -->
     <div class="row">
       <div class="col-md-12">
        <div class="title animated fadeInRight">
          <h3>Input for Encryption/Decryption</h3>
        </div>
       </div> <!-- col 6 -->
     </div> <!-- row -->

     <div class="row">
       <div class="col-md-6 col-md-offset-3">
       <form method="POST" action="">
         <div class="area animated zoomInDown">
           <textarea class="form-control" rows="8" name="plaintext" placeholder="Masukan text anda disini" required></textarea>
         </div>
       </div> <!-- col 6 -->
     </div> <!-- row area -->

     <div class="row">
       <div class="col-md-3 col-md-offset-3 animated zoomInLeft">
         <input type="number" name="n1" max="8" min="0" class="form-control" placeholder="Jumlah Angka Pertama">
       </div>

       <div class="col-md-3 animated zoomInRight">
         <input type="number" name="n2" max="8" min="0" class="form-control" placeholder="Jumlah Angka Kedua">

       </div>
     </div><!-- row -->

     <div>&nbsp;</div>
     <div class="row">
       <div class="col-md-offset-7">
         <button class="btn btn-success" name="btn_encrypt"><i class="fa fa-rocket">&nbsp;</i>encryption</button>
         <button class="btn btn-warning" name="btn_decrypt"><i class="fa fa-plane">&nbsp;</i>decryption</button>
       </div>
     </div>
     </form>

     <div class="col-md-12">
     <div class="title2 animated flipInX">
       <h3>Encryption/Decryption Result</h3>
       </div>
     </div>
   </div><!-- container -->

 
<?php
if(!empty($_POST)){ //if do action
  $plus = $_POST['n1']+1+$_POST['n2'];
  $string = $_POST['plaintext'];
  $newstring = $_POST['plaintext'];
  if(isset($_POST['btn_encrypt'])) {//jika melakukan encrypt
    for ($i=0;$i<strlen($string);$i++) {
      $ascii = ord($string[$i]);
      $ascii = $ascii + ($plus);
      if($ascii == 90) { //uppercase bound 90 'Z'
          $ascii = 65; //reset back to 'A' 65
      } 
      else if($ascii == 122) { //lowercase bound 122 'z'
          $ascii = 97; //reset back to 'a' 97
      } 
      else {
        $ascii++;
      }
      $newstring[$i] = chr($ascii);
    } 
  }else 
  if(isset($_POST['btn_decrypt'])) { //jika melakukan decrypt

    for ($i=0;$i<strlen($string);$i++) {
      $ascii = ord($string[$i]);
      $ascii = $ascii - ($plus+2);
      if($ascii == 90) { //uppercase bound 90 'Z'
          $ascii = 65; //reset back to 'A' 65
      } 
      else if($ascii == 122) { //lowercase bound 122 'z'
          $ascii = 97; //reset back to 'a' 97
      } 
      else {
        $ascii++;
      }
      $newstring[$i] = chr($ascii);
    } 
  } 
/*echo '<div style="border:3px solid #0090d2">';
echo '<p><strong><center>Plaintext : </strong>'.$_POST['plaintext'].'</p>';
echo '<p><strong>angka pertama : </strong>'.$_POST['n1'].'</p>';
echo '<p><strong>angka kedua : </strong>'.$_POST['n2'].'</p>';
echo '</div><br/>';*/

?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="hasil animated flipInY">
        <?php echo '<h3><center>Plaintext : '.$_POST['plaintext'].'</h3>';
              echo '<h3><center>Angka Pertama : '.$_POST['n1'].'</h3>';
              echo '<h3><center>Angka Kedua : '.$_POST['n2'].'</h3>';;
        ?>
      </div>
    </div>
  </div> <!-- row -->
  <div class="row">
    <div class="col-md-6 col-md-offset-5">
     <p class="hasil-en animated tada"><?php echo '<i class="fa fa-hand-o-right">&nbsp;</i>'.$newstring;?></p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
    <div class="copy">
      <h4>Copyright &copy; 2015 Kelas Kriptografi 2</h4>
    </div>    
    </div>
  </div><!-- row -->
</div> <!-- container -->

<?php
}
?>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="asset/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="asset/js/bootstrap.min.js"></script>
  </body>
</html>