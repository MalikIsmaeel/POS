<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title> Valex -  Premium dashboard ui bootstrap rwd admin html5 template </title>
<!-- Favicon -->
<link rel="icon" href="{{URL::asset('assets/img/brand/favicon.png')}}" type="image/x-icon"/>
<!-- Icons css -->
<link href="{{URL::asset('assets/css/icons.css')}}" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{{URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Sidebar css -->
<link href="{{URL::asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
<!-- Sidemenu css -->
<link rel="stylesheet" href="{{URL::asset('assets/css-rtl/sidemenu.css')}}">
@yield('css')
<!--- Style css -->

<link href="{{URL::asset('assets/css-rtl/style.css')}}" rel="stylesheet">
<!--- Dark-mode css -->
<link href="{{URL::asset('assets/css-rtl/style-dark.css')}}" rel="stylesheet">
<!---Skinmodes css-->
<link href="{{URL::asset('assets/css-rtl/skin-modes.css')}}" rel="stylesheet">
<!-- ajax Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   
</head>
<body>
<div class="col-md-8">
    <div class="row">
        <form action="" method="get">
        @foreach($data['catogeries'] as $catogery)
        
        <button id='{{$catogery->id}}'  onclick="show({{$catogery->id}});">{{$catogery->catogery_name}}</button>
        
        @endforeach
        </form>
       
    </div>
    <div class="row">
        <div id="datas">
            
        </div>
    </div>
</div>
<div class="col-md-4"></div>
<script>
 function show(id){
  let  product=0;
    $.ajax({
            url: "{{ route('entity_catgery',"+id") }}",
            method: "GET",
    //         data: {
    //           id:id
    //         },
            success: function (response) {
                
            },
            error: function( req, status, err ) {
            console.log( 'something went wrong', status, err );
        }
        });
        
      
 }
</script>


</body>
</html>