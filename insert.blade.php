<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Document</title>
    <style>
        .row{
            margin-right:5px !important; margin-left:5px !important;
        }
        .rotated {
        writing-mode: tb-rl;
        transform: rotate(-180deg);
    }

    </style>
</head>
<body>
    <div class="row d-flex">
    <div class="col-4 mt-3 text-justify-center">
        <h6 class="text-center">قوات الدفاع الجوي الملكي السعودية </h6>
        <h6 class="text-center">إدارة التدريب و قوات الدفاع الجوي </h6>
        <h6 class="text-center">قسم التأهيل العلمي</h6>
    </div>

    </div>

</div>

<div class="row justify-content-center">
    <div class="col-md-8">

       <P>{{$course->name}}</P>
        <table class="mt-3 table mr-2 table-bordered">
            <thead>
                <tr >
            <th class="text-center" rowspan="2">ت </th><th  class="text-center"rowspan="2">إسم المتغيبين</th><th  class="text-center rotated" rowspan="2">الرقم</th>

           <th class="text-center" colspan="7" class="text-center"> الحصص</th>
           <th  class="text-center"  colspan="13"> أسباب الغياب </th>
           </tr>
           <tr>
            <th class="text-center">1</th>
            <th class="text-center">2</th>
            <th class="text-center">3</th>
            <th class="text-center">4</th>
            <th class="text-center">5</th>
            <th class="text-center">6</th>
            <th class="text-center">7</th>
            <th class="rotated text-center ">متاخر</th>
            <th class="rotated text-center">غائب</th>
            <th class="rotated text-center">مستأذن</th>
            <th class="rotated text-center">استراحة</th>
            <th class="rotated text-center">مستشفى</th>
            <th class="rotated text-center">مهمة</th>
            <th class="rotated text-center">إجازة</th>
            <th class="rotated text-center">إخلال بالضبط</th>
            <th class="rotated text-center">جلسة تقصير</th>
            <th class="rotated text-center">مراجحة الجناح</th>
            <th class="rotated text-center">ترك ميدان <br>التمرين بدون عذر  <br>(10)</th>
            <th class="rotated text-center">الغياب عن الاختبار <br> النهائي  <br>(20)</th>
            <th class="rotated text-center">أخرى</th>
        </tr>

        </th>
           </thead>
            <tbody>
@php
    $i=1;
@endphp
  @foreach ($studentcourse as $student)
  <tr>
            <th scope="row">{{$i++}}</th>
            <td>{{$student->username}}</td>
            <td style="display:none" id="absent">{{$student->id}}</td>
            <td>Otto</td>
            @for ($j=1 ; $j<=7;$j++)
                 <td class="day" id="{{$j}}"><i class="fa fa-check-circle" style="font-size:20px;color:rgb(79, 156, 116)"></i></td>
            @endfor
            @for ($j=1 ; $j<=13;$j++)
                 <td class="resons" id="{{$j}}"><i class="fa fa-check-circle" style="font-size:20px;color:rgb(79, 156, 116)"></i></td>
            @endfor
        </tr>
            @endforeach





            </tbody>

        </table>
</div>
</div>

    <div class="row row-md-8 fixed-bottom">
    <div class="col-4">
        <h4 class="text-center">قائد الدورة</h4>
        <h4>الإسم</h4>
        <h4>الرتبة</h4>
<h4> التوقيع</h4>
<br>
    </div>
    <div class="col-4">
        <h4 class="text-center">مشرف الدورة</h4>
        <h4>الإسم</h4>
        <h4>الرتبة</h4>
<h4> التوقيع</h4>
<br>
    </div>
    <div class="col-4">
        <h4 class="text-center">مدير  أدارة التدريب</h4>
        <h4>الإسم</h4>
        <h4>الرتبة</h4>
<h4> التوقيع</h4>
<br>
    </div>
</div>
@php

@endphp
</body>
<script>
    $(document).ready(function(){

        var attendance=[];
        var token = $("meta[name='csrf-token']").attr("content");
        $( ".day" ).click(function() {
      var color= $(this).children("i").attr("class", "fa fa-check-circle").css("color") ;
       if(color=="rgb(210, 29, 29)"){
      $(this).children("i").attr("class", "fa fa-check-circle").css("color","rgb(79, 156, 116)") ;

       }
       else {
        $(this).children("i").attr("class", "fa fa-check-circle").css("color","rgb(210, 29, 29)") ;
         console.log( "student "+$(this).closest("tr").find("td:eq(1)").text()+" peroid "+this.id)
         student=$(this).closest("tr").find("td:eq(1)").text();
         period= this.id;
         $.ajax(
    {
        url: "attendance/store",
        type: 'POST',

        data: {
            "id": id,
            "_token": token,
        },
        success: function (data){
			// $("#products").html(data);
			console.log(true)
        }
    });

       }
    //    attendance['period'+this.id]=
  });

    $( ".resons" ).click(function() {
      var color= $(this).children("i").attr("class", "fa fa-check-circle").css("color") ;

      if(color=="rgb(210, 29, 29)"){

      $(this).children("i").attr("class", "fa fa-check-circle").css("color","rgb(79, 156, 116)") ;

       }
       else {
        $(this).children("i").attr("class", "fa fa-check-circle").css("color","rgb(210, 29, 29)") ;
        console.log($(this).closest("tr").find("td:eq(1)").text())
       }

  });


});
</script>
</html>
