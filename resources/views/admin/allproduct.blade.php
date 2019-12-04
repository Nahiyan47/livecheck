<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
<style>
.tool-tip {
  display: inline-block;
}
.tool-tip [disabled] {
  pointer-events: none;
}
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
<script type="text/javascript">
  $(document).ready(function(){

        $('#category').on('change',function(){
          var category  = $(this).val();
          var _token = $('input[name="_token"]').val();
          if(category !=''){
          $.ajax({
            type:"post",
            url:"{{ route('productcontroller.fetchproduct') }}",
            data:{category:category,_token:_token},
            
            success:function(data){
              $("#product").empty();
              $("#product").append(data);

                //////// end /////////
            }
          });
        }
        });

$('#code').keypress(function (e) {
      var regex = new RegExp("^[a-zA-Z]+$");
      var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
      if (regex.test(str)) {
      $(".alphabet_error").hide();
      $("#code").css({"border-color":"#ccc"});
        return true;
      }
      else
      {
      e.preventDefault();
      $("#code").val('');
      $(".alphabet_error").show();
      $("#code").css({"border-color":"red"});
      return false;
      }
    });
  $("#code").keyup(function(){

    var code=$.trim($("#code").val());
    var count =code.length;
    var _token = $('input[name="_token"]').val();
    $.ajax({
    url:"{{ route('productcontroller.checkduplicate') }}",
    jsonp: "jsoncallback",
    crossDomain:true,
    data:{ code:code,_token:_token},
    type:"POST",
    success:function(data){
      //data=JSON.parse(data);
      // $("#project_amount").val(data.paid);
       $('#availibility').html(data);
       if(data!=""){
        $("#code").val('');
       }
      // payment_mode(total);
  
     

    },
    error:function(){
      alert("some thing went wrong");
    }
  });//ajax ends here
    if(count<7){
      document.getElementById("submit").disabled = true;
    }if(count==7){
      document.getElementById("submit").disabled = false;
    }
    if(count>7){
      $("#code").val('');
      $(".amount_error").show();
      $("#code").css({"border-color":"red"});
      
    }else{
      $(".amount_error").hide();
      $("#code").css({"border-color":"#ccc"});
    }
    });


    });
</script>
</head>
<body>

<div class="sidebar">
  <a class="active" href="/">Home</a>
  <a href="/check">Customer</a>
  <a href="/admin">Admin</a>
  <a href="/products">Products</a>
</div>

<div class="content">
      @if ($message = Session::get('success'))
        <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
        @endif
<table id="usetTable" class="display">
    <thead>
        <th>Code</th>
        <th>Warrenty Starts</th>
        <th>Warrenty Ends</th>
    </thead>
    <tbody>
            @foreach ($data as $key)
                <tr>
                    <td><?php echo $key->code; ?></td>
                    <td>{{ $key->warrenty_started}}</td>
                    <td>{{$key->warrenty_ends}}</td>
                </tr>
            @endforeach
        
    </tbody>
</table>
</div>
    <script>
        $(document).ready(function() {
            $('#usetTable').DataTable();
        } );
    </script>

</body>
</html>
