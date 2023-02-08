<?
namespace App\Classes;
class ajax
{
public function getcity($countery){


    $city['data'] = city::orderby("name","asc")
    ->get()->where('countery_id',$countery)
       ;

    return response()->json($empData);

}
}

?>