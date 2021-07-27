<?php
session_start();
include('db.php');
$loadFun="";
if(isset($_SESSION['lat']) && isset($_SESSION['lon'])){
	$lat=$_SESSION['lat'];
	$lon=$_SESSION['lon'];
	
	$res=mysqli_query($con,"SELECT
    product.*,shop.shop_name, (
      3959 * acos (
      cos ( radians($lat) )
      * cos( radians( shop.latitude ) )
      * cos( radians( shop.longitude ) - radians($lon) )
      + sin ( radians($lat) )
      * sin( radians( shop.latitude ) )
    )
) AS distance
FROM product,shop
where shop.id=product.shop_id
HAVING distance < 20
ORDER BY distance");
}else{
	$res=mysqli_query($con,"select product.*,shop.shop_name from product,shop where shop.id=product.shop_id");
	$loadFun="onload='getLocation()'";
}

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>Product Shopping Grid</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	  <link href="css/style.css" rel="stylesheet">
	  <script>
	  function error(err){
		  //alert(err.message);
	  }
	  function success(pos){
		  var lat=pos.coords.latitude;
		  var lon=pos.coords.longitude;
		  jQuery.ajax({
			  url:'setLatLong.php',
			  data:'lat='+lat+'&lon='+lon,
			  type:'post',
			  success:function(result){
				  window.location.href='index.php'
			  }
			  
		  });
	  }
	  function getLocation(){
		  if(navigator.geolocation){
			  navigator.geolocation.getCurrentPosition(success,error);
		  }else{
			  
		  }
	  }
	  </script>
   </head>
   <body <?php echo $loadFun?>>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
      <div class="container">
         <h3 class="h3">Products Listing</h3>
         <div class="row">
			<?php while($row=mysqli_fetch_assoc($res)){?>
            <div class="col-md-3 col-sm-6">
               <div class="product-grid">
                  <div class="product-image">
                     <a href="#">
                     <img src="images/<?php echo $row['image']?>">
                     </a>
                  </div>
                  <div class="product-content">
                     <h3 class="title"><a href="#"><?php echo $row['product_name']?>(<?php echo $row['shop_name']?>)</a></h3>
                     <div class="price">Rs <?php echo $row['price']?></div>
                  </div>
               </div>
            </div>
			<?php } ?>
         </div>
      </div>
   </body>
</html>