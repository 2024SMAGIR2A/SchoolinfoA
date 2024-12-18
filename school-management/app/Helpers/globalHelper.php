<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use App\Models\{ Collaborator };
// Pour gestion du menu aside
if (!function_exists('menuOpen')) {
    function menuOpen(...$routes)
    {
        foreach ($routes as $route) {
            if(Route::currentRouteName() === $route) return 'menu-open';
        }
    }
}

// Pour la gestion des routes actives du menu aside
if (!function_exists('currentRouteActive')) {
    function currentRouteActive(...$routes)
    {
        foreach ($routes as $route) {
            if(Route::currentRouteName() === $route) return 'active';
        }
    }
}
if (!function_exists("getUserDetail")) {
	// On crée l'helper de récupération d'un User à partir d'une adresse email
	function getUserDetail ($id) {

        
            return Collaborator::find($id)?Collaborator::find($id):'some things don\'t work';
        // }
        // catch(){
        //     return 'some things don\'t work';
        // }
	}
};

if(!function_exists("getChartRepresentation")) {
	// On crée l'helper de récupération d'un User à partir d'une adresse email
	function getChartRepresentation($myArray,$month) {
                //array that store collection
                $itemList=array();
                // array that store all occurrences of each values in $itemList
                $itemList1=array();
                //format date in this m/Y
                if(!function_exists("myFormatDate")){
                    function myFormatDate($date)
                    {
                        return Carbon::createFromFormat('Y-m-d H:i:s',Carbon::parse($date))->format('m/Y');
                    }

                }
                //it is used when month'nomber is less than $month
                if(!function_exists("completeTab")){
                    

                    function completeTab($date,$nbr,$array)
                    {
                        
                        //now i create array which has string's item 
                        $tabString=explode('/',$date);
                        // create date
                        // $start=Carbon::create($tabString[1],$tabString[0],1,0);
                        // $start=$date;
                        for($i=1;$i<$nbr+1;$i++){
                            // initialize for each iteration
                            $start=Carbon::create($tabString[1],$tabString[0],1,0);
                            /* add month with value equal to 0 
                            'date'=> month,
                            'nbr'=>0
                            */
                           
                            // print($i.' '.$start.' / {  } --- *');

                            array_push($array,array('date'=>Carbon::createFromFormat('Y-m-d H:i:s',$start->addMonths($i))->format('m/Y'),'nbr'=>0));

                            // print($i." ".$start." --- *");

                        }
                        // return a new array
                    return $array;
                    }
                }
                //it is used when month'nomber is more than $month
                if(!function_exists("getMyCurrentArray")){
                    
                        function getMyCurrentArray($array,$month)
                        {
                            
                            $tab=array();
                            if($month==0){
                                return $tab;
                            }

                            for($i=1;$i<$month+1;$i++){
                            array_push($tab,$array[count($array)-$i]);
                            }

                            return $tab;
                        }
                }
                //get all item and format created_at to like 'MM/YY'
                foreach($myArray as $item)
                {
                // $currentModel= new order();
                $created_at=myFormatDate($item->created_at);
                    array_push($itemList,$created_at);
                } 
                $array = array_count_values($itemList); 
                //get all occurrences of each values
                arsort($array);

                foreach($array as $key=>$value)
                {
                    $arrayName = array(
                        'date'=>$key,
                        'nbr'=>$value
                    );
                    array_push($itemList1,$arrayName);
                }
                //Simple function to sort an array by a specific key. Maintains index association.
                if(!function_exists("array_sort")){
                    function array_sort($array, $on, $order=SORT_ASC)
                        {
                            $new_array = array();
                            $sortable_array = array();

                            if (count($array) > 0) {
                                foreach ($array as $k => $v) {
                                    if (is_array($v)) {
                                        foreach ($v as $k2 => $v2) {
                                            if ($k2 == $on) {
                                                $sortable_array[$k] = $v2;
                                            }
                                        }
                                    } else {
                                        $sortable_array[$k] = $v;
                                    }
                                }

                                switch ($order) {
                                    case SORT_ASC:
                                        asort($sortable_array);
                                    break;
                                    case SORT_DESC:
                                        arsort($sortable_array);
                                    break;
                                }
                                $i=0;
                                foreach ($sortable_array as $k => $v) {
                                    $new_array[$i] = $array[$k];
                                    $i++;
                                }
                               
                            }

                            return $new_array;
                        }
                }

             
                //my current array
                 $currentArray=array_sort($itemList1, 'date', $order=SORT_ASC);
                //  return [$month,count($currentArray)];
                if(count($currentArray)>$month){
                    //get a new array`
                    // return [$month,count($currentArray)];
                    $currentArray= array_sort(getMyCurrentArray($currentArray,$month), 'date', $order=SORT_ASC);
                }
                else {
                    //get a new array
                    // return [$currentArray[count($currentArray)- 1],$currentArray];
                    $currentArray= completeTab($currentArray[count($currentArray)- 1]['date'],$month - count($currentArray),$currentArray);
                    
                }

                $trueArray=array();
                foreach($currentArray as $item){
                    $mySplit=explode('/',$item['date']);
                    array_push($trueArray,array('month'=>$mySplit[0],'year'=>$mySplit[1],'value'=>$item['nbr']));
                }
                return $trueArray;
        
        
           
        // }
        // catch(){
        //     return 'some things don\'t work';
        // }
	}
};
/*this return the lasters days 
    'day'=>12,
    'month'=>01,
    'year'=>2023,
    'value'=>15
*/
if(!function_exists("getChartRepresentationByDay")) {
	/*
    we need an array which is aready ranged
    and the number of item you want to display
    the result is an array
    */
	function getChartRepresentationByDay($myArray,$month) {
                //array that store collection
                $itemList=array();
                // array that store all occurrences of each values in $itemList
                $itemList1=array();
                $interArray=array();
                $trueArray=array();
                //format date in this d/m/Y
                if(!function_exists("myFormatDate")){
                    function myFormatDate($date,$format)
                    {
                        return Carbon::createFromFormat('Y-m-d H:i:s',Carbon::parse($date))->format($format);
                    }

                }
                //
                //it is used when month'nomber is less than $month
                if(!function_exists("getAllDay")){
                    

                    function getAllDay($nbr)
                    {
                        
                        //now i create array which has string's item 
                        // $myArray=array()
                        // $start=Carbon::now();

                        // $tabString=explode('/',$date);
                        $arrayRecup=array();
                        for($i=1;$i<$nbr+1;$i++){
                            // initialize for each iteration
                            // $start=Carbon::create($date['year'],$date['month'],$date['day'],0);
                            $start=Carbon::tomorrow();
                            /* add day with value equal to 0 
                            'day'=>$mySplit[0],
                            'month'=>$mySplit[1],
                            'year'=>$mySplit[2],
                            'nbr'=>0
                            */
                           
                            $end=Carbon::createFromFormat('Y-m-d H:i:s',$start->subDays($i))->format('d/m/Y');
                            // $mySplit=explode('/',$end);
                            array_push($arrayRecup,$end);


                        }
                        // for ($i=0; $i <count($array) ; $i++) { 
                        //     array_push($arrayRecup,$array[$i]);
                        //     # code...
                        // }
                        // return a new array
                    return $arrayRecup;
                    }
                }
                //it is used when month'nomber is less than $month
                if(!function_exists("completeTab")){
                    

                    function completeTab($date,$nbr,$array)
                    {
                        
                        //now i create array which has string's item 
                        // $tabString=explode('/',$date);
                        $arrayRecup=array();
                        for($i=1;$i<$nbr+1;$i++){
                            // initialize for each iteration
                            $start=Carbon::create($date['year'],$date['month'],$date['day'],0);
                            /* add day with value equal to 0 
                            'day'=>$mySplit[0],
                            'month'=>$mySplit[1],
                            'year'=>$mySplit[2],
                            'nbr'=>0
                            */
                           
                            $end=Carbon::createFromFormat('Y-m-d H:i:s',$start->addDays($i))->format('d/m/Y');
                            $mySplit=explode('/',$end);
                            array_push($arrayRecup,array('day'=>$mySplit[0],
                                                    'month'=>$mySplit[1],
                                                    'year'=>$mySplit[2],
                                                    'value'=>0));


                        }
                        for ($i=0; $i <count($array) ; $i++) { 
                            array_push($arrayRecup,$array[$i]);
                            # code...
                        }
                        // return a new array
                    return $arrayRecup;
                    }
                }

                //it is used when month'nomber is more than $month
                if(!function_exists("getMyCurrentArray")){
                    
                        function getMyCurrentArray($array,$month)
                        {
                            
                            $tab=array();
                            if($month==0){
                                return $tab;
                            }

                            for($i=0;$i<$month;$i++){
                            array_push($tab,$array[$i]);
                            }

                            return $tab;
                        }
                }
                //get all item and format created_at to like 'DD/MM/YY'
                foreach($myArray as $item)
                {
                // $currentModel= new order();
                $created_at=myFormatDate($item->created_at,'d/m/Y');
                    array_push($itemList,$created_at);
                } 
                $array = array_count_values($itemList); 
                 $interArray= getAllDay($month);
                // return $array;
                
                for($i=0;$i<count($interArray);$i++){
                    $mySplit1=explode('/',$interArray[$i]); 
                    // $isFound=false;
                    $arrayName=array();
                     foreach($array as $key=>$value)
                        { 
                            $mySplit=explode('/',$key); 

                            if($key==$interArray[$i]){
                                
                                $arrayName = array(
                                    'day'=>$mySplit[0],
                                    'month'=>$mySplit[1],
                                    'year'=>$mySplit[2],
                                    'value'=>$value
                                );
                                // print_r($arrayName);
                                
                            }
                           
                            
                        }
                        // return [$arrayName,count($arrayName)];
                    if(count($arrayName)==4){
                        
                    array_push($itemList1,$arrayName);
                    // return [$arrayName,count($arrayName)];
                    }
                    else {
                       $arrayName = array(
                                'day'=>$mySplit1[0],
                                'month'=>$mySplit1[1],
                                'year'=>$mySplit1[2],
                                'value'=> 0
                                );
                    array_push($itemList1,$arrayName);
                    }
                    
                       
                }
               
            
                if(count($itemList1)>$month){
                    //get a new array`
                    $itemList1=getMyCurrentArray($itemList1,$month);
                }
                else {
                    //get a new array
                    $itemList1= completeTab($itemList1[0],$month - count($itemList1),$itemList1);
                    
                }
                // rsort($itemList1);
                // $trueArray=array_reverse($itemList1,true);
               
                return array_reverse($itemList1);
        
        
           
        // }
        // catch(){
        //     return 'some things don\'t work';
        // }
	}
};
//this is used to return month's days from some month
if(!function_exists("getChartRepresentationByDayOfMonth")) {
	/*
    we need an array which is aready ranged
    and the number of item you want to display
    the result is an array
    */
	function getChartRepresentationByDayOfMonth($myArray,$month) {
                //array that store collection
                $itemList=array();
                // array that store all occurrences of each values in $itemList
                $itemList1=array();
                $itemMonnthList=array();
                $interMonnthArray=array();
                $interArray=array();
                $startDay=Carbon::createFromFormat('Y-m-d H:i:s',Carbon::now())->format('d/m/Y');
                $trueArray=array();
                if($month!=1 && $month!=0){
                  $start1=Carbon::now();
                  $startDay=Carbon::createFromFormat('Y-m-d H:i:s',$start1->subMonth($month-1))->format('d/m/Y');
                }
                //format date in this d/m/Y
                if(!function_exists("myFormatDate")){
                    function myFormatDate($date,$format)
                    {
                        return Carbon::createFromFormat('Y-m-d H:i:s',Carbon::parse($date))->format($format);
                    }

                }
               
                //
                //it is used when month'nomber is less than $month
                if(!function_exists("getAllDay")){
                    

                    function getAllDay($startDay)
                    {
                        
                        //now i create array which has string's item 
                        $myArray=array();
                        $date=explode('/',$startDay);
                        // return [$date,$startDay];
                        $start=Carbon::create($date[2],$date[1],$date[0],0);
                        // $dayOfmonthnNbr=$start->daysInMonth;
                        $end=Carbon::now();
                        if($end->month==$start->month && $end->year==$start->year){
                            for($i=1;$i<$end->day+1;$i++){
                                array_push($myArray,Carbon::createFromFormat('Y-m-d H:i:s',Carbon::create($date[2],$date[1],$i,0))->format('d/m/Y'));
                            }
                        }
                        else {
                            for($i=1;$i<$start->daysInMonth+1;$i++){
                                array_push($myArray,Carbon::createFromFormat('Y-m-d H:i:s',Carbon::create($date[2],$date[1],$i,0))->format('d/m/Y'));
                            }
                        }
                       return $myArray;
                    }
                      
                }
             
                //get all item and format created_at to like 'DD/MM/YY'
                foreach($myArray as $item)
                {
                // $currentModel= new order();
                $created_at=myFormatDate($item->created_at,'d/m/Y');
                    array_push($itemList,$created_at);
                    // array_push($itemMonnthList,myFormatDate($item->created_at,'m/Y'));
                } 

                $array = array_count_values($itemList); 
                // $interArray=array_count_values($itemMonnthList);
                $interArray = getAllDay($startDay);
                // return $array;
                // return $interArray;
               

               
                for($i=0;$i<count($interArray);$i++){
                    $mySplit1=explode('/',$interArray[$i]); 
                    // $isFound=false;
                    $arrayName=array();
                     foreach($array as $key=>$value)
                        { 
                            $mySplit=explode('/',$key); 

                            if($key==$interArray[$i]){
                                
                                $arrayName = array(
                                    'day'=>$mySplit[0],
                                    'month'=>$mySplit[1],
                                    'year'=>$mySplit[2],
                                    'value'=>$value
                                );
                                // print_r($arrayName);
                                
                            }
                           
                            
                        }
                        // return [$arrayName,count($arrayName)];
                    if(count($arrayName)==4){
                        
                    array_push($itemList1,$arrayName);
                    // return [$arrayName,count($arrayName)];
                    }
                    else {
                       $arrayName = array(
                                'day'=>$mySplit1[0],
                                'month'=>$mySplit1[1],
                                'year'=>$mySplit1[2],
                                'value'=> 0
                                );
                    array_push($itemList1,$arrayName);
                    }
                    
                       
                }
               
            
                // rsort($itemList1);
                // $trueArray=array_reverse($itemList1,true);
               
                return $itemList1;
        
        
           
        // }
        // catch(){
        //     return 'some things don\'t work';
        // }
	}
};

//this is used to return month's or year name from some number
if (!function_exists('getChartLastMonthOrYearName')) {
    function getChartLastMonthOrYearName($number,$monthOrYear) {
        $startDay = Carbon::createFromFormat('Y-m-d H:i:s',Carbon::now())->format('Y');
                // $trueArray=array();
        switch ($monthOrYear) {
            case 'month':
                $startDay = Carbon::createFromFormat('Y-m-d H:i:s',Carbon::now())->format('m');
                if ($number !=1 && $number!=0) {
                    $start1 = Carbon::now();
                    $startDay = Carbon::createFromFormat('Y-m-d H:i:s',$start1->subMonth($number-1))->format('m');
                }
                            
                switch($startDay) {
                    case "01":
                        return 'Janvier';
                        break;
                    case "02":
                        return 'Fevrier';
                        break;
                    case "03":
                        return 'Mars';
                        break;
                    case "04":
                        return 'Avril';
                        break;
                    case "05":
                        return 'Mai';
                        break;
                    case "06":
                        return 'Juin';
                        break;
                    case "07":
                        return 'Juillet';
                        break;
                    case "08":
                        return 'Août';
                        break;
                    case "09":
                        return 'Septembre';
                        break;
                    case "10":
                        return 'Octobre';
                        break;
                    case "11":
                        return 'Novembre';
                        break;
                    case "12":
                        return 'Decembre';
                        break;
                    default:
                        return 'Decembre';
                        break;

                }

                break;

            case 'year':
                if($number!=1 && $number!=0) {
                    $start1 = Carbon::now();
                    return Carbon::createFromFormat('Y-m-d H:i:s',$start1->subYear($number-1))->format('Y');
                }

            default:
                break;
        }
            
        return  $startDay;
                
    }
}

//this is used to list the years which have in some collection like that [2023,2022,...]
if(!function_exists('getChartLastYearList')){
    function getChartLastYearList($myArray) {
                //array that store collection
                $itemList=array();
                // array that store all occurrences of each values in $itemList
                $itemList1=array();
                //format date in this m/Y
                if(!function_exists("myFormatDate")){
                    function myFormatDate($date,$format)
                    {
                        return Carbon::createFromFormat('Y-m-d H:i:s',Carbon::parse($date))->format($format);
                    }

                }
              
                //get all item and format created_at to like 'MM/YY'
                foreach($myArray as $item)
                {
                // $currentModel= new order();
                $created_at=myFormatDate($item->created_at,'Y');
                    array_push($itemList,$created_at);
                } 
                $array = array_count_values($itemList); 
                //get all occurrences of each values
                arsort($array);

                foreach($array as $key=>$value)
                {
                   
                    array_push($itemList1,$key);
                }
               
                if(count($itemList1)>1){
                        for($i=0;$i<count($itemList1);$i++){
                        for($y=0;$y<count($itemList1);$y++){
                            if($itemList1[$i]<$itemList1[$y]){
                                $inter=$itemList1[$i];
                                $itemList1[$i]=$itemList1[$y];
                                $itemList1[$y]=$inter;
                            }
                        }
                    }
                }
                
                return $itemList1;
        
        
           
        // }
        // catch(){
        //     return 'some things don\'t work';
        // }
	}
}
//this is used to return year's days from some year
if(!function_exists("getChartRepresentationByDayOfYear")) {
	/*
    we need an array which is aready ranged
    and the number of item you want to display
    the result is an array
    */
	function getChartRepresentationByDayOfYear($myArray,$year) {
                //array that store collection
                $itemList=array();
                // array that store all occurrences of each values in $itemList
                $itemList1=array();
                $interArray=array();
                $trueArray=array();
                $startDay=Carbon::create($year,1,1,0);
                //format date in this d/m/Y
                if(!function_exists("myFormatDate")){
                    function myFormatDate($date,$format)
                    {
                        return Carbon::createFromFormat('Y-m-d H:i:s',Carbon::parse($date))->format($format);
                    }

                }
                // return $startDay->diffInDays(Carbon::now());
                //
                //it is used when month'nomber is less than $month
                if(!function_exists("getAllDay")){
                    

                    function getAllDay($start)
                    {
                        
                        //now i create array which has string's item 
                        $myArray=array();
                      
                        $end=Carbon::now();
                       
                        if($end->year==$start->year){
                            
                            //number of year's days 
                            $nbr=$start->diffInDays($end)+1+1;
                            for($i=1;$i<$nbr;$i++){
                                array_push($myArray,Carbon::createFromFormat('Y-m-d H:i:s',$start)->format('d/m/Y'));
                                $start=$start->addDay();
                            }
                           
                        }
                        else {
                            //number of year's days 
                            $nbr=$start->dayOfYear+1;
                            for($i=1;$i<$start->dayOfYear+1;$i++){
                                array_push($myArray,Carbon::createFromFormat('Y-m-d H:i:s',$start)->format('d/m/Y'));
                                $start=$start->addDay();
                            }
                        }
                       return $myArray;
                    }
                      
                }
             
                //get all item and format created_at to like 'DD/MM/YY'
                foreach($myArray as $item)
                {
                // $currentModel= new order();
                $created_at=myFormatDate($item->created_at,'d/m/Y');
                    array_push($itemList,$created_at);
                } 
                $array = array_count_values($itemList); 
                $interArray= getAllDay($startDay);
                // return $array;
                
                for($i=0;$i<count($interArray);$i++){
                    $mySplit1=explode('/',$interArray[$i]); 
                    // $isFound=false;
                    $arrayName=array();
                     foreach($array as $key=>$value)
                        { 
                            $mySplit=explode('/',$key); 

                            if($key==$interArray[$i]){
                                
                                $arrayName = array(
                                    'day'=>$mySplit[0],
                                    'month'=>$mySplit[1],
                                    'year'=>$mySplit[2],
                                    'value'=>$value
                                );
                                // print_r($arrayName);
                                
                            }
                           
                            
                        }
                        // return [$arrayName,count($arrayName)];
                    if(count($arrayName)==4){
                        
                    array_push($itemList1,$arrayName);
                    // return [$arrayName,count($arrayName)];
                    }
                    else {
                       $arrayName = array(
                                'day'=>$mySplit1[0],
                                'month'=>$mySplit1[1],
                                'year'=>$mySplit1[2],
                                'value'=> 0
                                );
                    array_push($itemList1,$arrayName);
                    }
                    
                       
                }
               
            
                return $itemList1;
        
        
           
        // }
        // catch(){
        //     return 'some things don\'t work';
        // }
	}
};
//this is used to return days from some start_day and end_day
if(!function_exists("getChartRepresentationByDayOfCustomization")) {
	/*
    we need an array which is aready ranged
    and the number of item you want to display
    the result is an array
    */
	function getChartRepresentationByDayOfCustomization($myArray,$startDay1,$endDay1) {
                //array that store collection
                $itemList=array();
                // array that store all occurrences of each values in $itemList
                $itemList1=array();
                $interArray=array();
                $trueArray=array();
                // return $startDay;
                $startDay=myCreateDate($startDay1);
                $endDay=myCreateDate($endDay1);
                $nbr=$startDay->diffInDays($endDay)+1+1;
                
                //format date in this d/m/Y
                if(!function_exists("myFormatDate")){
                    function myFormatDate($date,$format)
                    {
                        return Carbon::createFromFormat('Y-m-d H:i:s',Carbon::parse($date))->format($format);
                    }

                }
                // return $startDay->diffInDays(Carbon::now());
                //
                // return $endDay;
                //it is used when month'nomber is less than $month
                if(!function_exists("getAllDay")){
                    

                    function getAllDay($start,$end,$nbr)
                    {
                        
                        //now i create array which has string's item 
                        $myArray=array();
                    
                        
                        for($i=1;$i<$nbr;$i++){
                            array_push($myArray,Carbon::createFromFormat('Y-m-d H:i:s',$start)->format('d/m/Y'));
                            $start=$start->addDay();
                        }
                        
                       return $myArray;
                    }
                      
                }
              
                //get all item and format created_at to like 'DD/MM/YY'
                foreach($myArray as $item)
                {
                // $currentModel= new order();
                $created_at=myFormatDate($item->created_at,'d/m/Y');
                    array_push($itemList,$created_at);
                } 
                $array = array_count_values($itemList); 
                $interArray= getAllDay($startDay,$endDay,$nbr);
                // return $array;
                // return [$startDay,$endDay,$startDay->diffInDays($endDay)+1+1];
                
                for($i=0;$i<count($interArray);$i++){
                    $mySplit1=explode('/',$interArray[$i]); 
                    // $isFound=false;
                    $arrayName=array();
                     foreach($array as $key=>$value)
                        { 
                            $mySplit=explode('/',$key); 

                            if($key==$interArray[$i]){
                                
                                $arrayName = array(
                                    'day'=>$mySplit[0],
                                    'month'=>$mySplit[1],
                                    'year'=>$mySplit[2],
                                    'value'=>$value
                                );
                                // print_r($arrayName);
                                
                            }
                           
                            
                        }
                        // return [$arrayName,count($arrayName)];
                    if(count($arrayName)==4){
                        
                    array_push($itemList1,$arrayName);
                    // return [$arrayName,count($arrayName)];
                    }
                    else {
                       $arrayName = array(
                                'day'=>$mySplit1[0],
                                'month'=>$mySplit1[1],
                                'year'=>$mySplit1[2],
                                'value'=> 0
                                );
                    array_push($itemList1,$arrayName);
                    }
                    
                       
                }
               
            
              
                return $itemList1;
        
        
           
        // }
        // catch(){
        //     return 'some things don\'t work';
        // }
	}
};

//get string d/m/Y and create date inn date format
if(!function_exists("myCreateDate")) {
    function myCreateDate($data) {
        $splitString=explode('/',$data);
        return Carbon::create(intVal($splitString[2]),intVal($splitString[0]),intVal($splitString[1]),0);
    }
};

//wheter value is null,it returns second value
if(!function_exists('checkWheterNull')) {
    function checkWheterNull($part1,$part2){
        return $part1==null? $part2 : $part1;
    }
} 


if(!function_exists('toastMessage')){
    function toastMessage($label){

        switch($label){
            case 'Create':
                return 'La création a été faite avec succès.';
                break;
            case 'Update':
                return 'La modification a été faite avec succès.';
                break;
            case 'Delete':
                return 'La suppression a été faite avec succès.';
                break;
            case 'Active':
                return 'L\'activation a été faite avec succès.';
                    break;
            case 'Inactive':
                return 'La desactivation a été faite avec succès.';
                    break;
            case 'Publish':
                return 'La publication a été faite avec succès.';
                    break;
            case 'Unpublish':
                return 'La dépublication a été faite avec succès.';
                    break;
            case 'NotFound':
                return 'Aucun élement de ce type trouvé.';
                    break;
            case 'Restore':
                return 'La restauration a été faite avec succès.';
                    break;
            case 'Upload':
                return 'Le téléversement a été faite avec succès.';
                    break;
            case 'Add':
                return 'L\' ajout a été fait avec succès.';
                    break;
            case 'Remove':
                return 'Le retrait a été fait avec succès.';
                    break;
            case 'Sent':
                return 'L\'envoi a été fait avec succès.';
                    break;
            case 'NotSent':
                return 'L\'envoi a échoué.';
                    break;
            case 'Lock':
                return 'Le verrouillage a été fait avec succès.';
                    break;
            case 'Unlock':
                return 'Le déverrouillage a été fait avec succès.';
                    break;
            default:
                return 'Quelques choses n \'a pas bien fonctionné.';
                    break;

        }

    }
}
