<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>

body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 250px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #4CAF50;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 250px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>

</head>
<body>

<div class="sidebar">
  <a class="active" href="/">Home</a>
  <a href="/check">Customer</a>
  <a href="/admin">Admin</a>
  <a href="/products">Products</a>
</div>

<div class="content">
  <h1><span class="label label-default" style="text-align: center; display: block;">Enter Product Code</span></h1><br>
  <div class="row">
    <form class="form-horizontal" method="POST" action="/check">
      {{ csrf_field() }}
    <div class="col-lg-4 col-lg-offset-4">
        <div class="input-group">
            <input type="text"  style="  width: 100%;
  padding: 45px 80px;
  margin: 8px 0;
  box-sizing: border-box;
  font-size: 250%" class="form-control" name="code" required autofocus>
  {!! $errors->first('code', '<p class="help-block" style="color: red;">:message</p>') !!}

        </div>
          <div class="text-center">
             
 <button type="submit" id="submit" class="btn btn-warning btn-lg btn-block">SEARCH</button>
        </div><!-- /input-group -->
      </form>
    </div><!-- /.col-lg-4 -->
</div><!-- /.row -->


<?php if(isset($check)){ ?>
<div class="box box-primary">
            <!-- /.box-header -->
    <div class="box-body">
   <?php if($check!==null){  ?>
    <div class="alert alert-success alert-dismissable" style="text-align:center">

    
    <p style="font-size:20px;font-weight:bold" >
      Product Name: <?php echo $check->product_name; ?>
    </p>
    <p style="font-size:18px">
        Product Category : <?php echo $check->category_name; ?>
    </p>
    <p style="font-size:18px" >
      Warrenty Started: <?php echo $check->warrenty_started; ?>
    </p>
    <p style="font-size:18px" >
      Warrenty Ends: <?php echo $check->warrenty_ends; ?>
    </p>
    <strong style="font-size:25px"> Thank You for being With Us !</strong>
  </div>
  <?php }else if(isset($hit)){ ?>
  <div class="alert alert-danger alert-dismissable" style="text-align:center">
    <strong style="font-size:25px">No product found</strong> 
  </div>
  <?php } ?>

  </div>
            <!-- /.box-body -->
</div>
  <?php } ?>
  <?php if(isset($hit)){ ?>
<div class="box box-primary">
            <!-- /.box-header -->
    <div class="box-body">

  <div class="alert alert-danger alert-dismissable" style="text-align:center">
    <strong style="font-size:25px">No product found</strong> 
  </div>


  </div>
            <!-- /.box-body -->
</div>
  <?php } ?>



</div>

</body>
</html>
