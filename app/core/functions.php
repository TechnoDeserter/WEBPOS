<?php

function show($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function viewpath($view)
{
    if(file_exists("../app/views/$view.view.php")){
        return "../app/views/$view.view.php";
    }else{
        echo "view '$view' not found";
    }
}

function esc($str)
{
    return htmlspecialchars($str);
}

function set_value($key,$default = "")
{

    if(!empty($_POST[$key]))
    {
        return $_POST[$key];
    }
    return $default;

}

function redirect($page)
{

    header("Location: index.php?page=" .$page);
    die;
}


function authenticate($row)
{

    $_SESSION['USER'] = $row;

}

function auth($column)
{
    if(!empty($_SESSION['USER'][$column])){
        return $_SESSION['USER'][$column];
    }

    return "Unknown";
}
    
function crop($filename,$size = 400,$type = 'product')
{

    $ext = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    $cropped_file = preg_replace("/\.$ext$/", "_cropped.".$ext, $filename);

    //
    if(file_exists($cropped_file))
    {
        return $cropped_file;
    }

    //
    if(!file_exists($filename))
    {   
        if($type == "male"){
            return 'assets/img/male-icon.jpg';
        }else
        if($type == "female"){
            return 'assets/img/female-user-icon.png';
        }else{
            return 'assets/img/no_image.jpg';
        }
    }




    //create image resource
    switch ($ext) {
        case 'jpg':
        case 'jpeg':
            $src_image = imagecreatefromjpeg($filename);
            break;
        
        case 'gif':
            $src_image = imagecreatefromgif($filename);
            break;
        
        case 'png':
            $src_image = imagecreatefrompng($filename);
            break;
        
        default:
            return $filename;
            break;
    }

    //set cropping params

    //assign values
    $dst_x = 0;
    $dst_y = 0;
    $dst_w = (int)$size;
    $dst_h = (int)$size;

    $original_width = imagesx($src_image);
    $original_height = imagesy($src_image);

    if($original_width < $original_height)
    {
        $src_x = 0;
        $src_y = ($original_height - $original_width) / 2;
        $src_w = $original_width;
        $src_h = $original_width;

    }else{

        $src_y = 0;
        $src_x = ($original_width - $original_height) / 2;
        $src_w = $original_height;
        $src_h = $original_height;
    }
 
    $dst_image = imagecreatetruecolor((int)$size, (int)$size);
    imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);

    //save final image
    switch ($ext) {
        case 'jpg':
        case 'jpeg':
            imagejpeg($dst_image,$cropped_file,90);
            break;
        
        case 'gif':
            imagegif($dst_image,$cropped_file);
            break;
        
        case 'png':
            imagepng($dst_image,$cropped_file);
            break;
        
        default:
            return $filename;
            break;
    }

    imagedestroy($dst_image);
    imagedestroy($src_image);

    return $cropped_file;
}




function get_receipt_no()
{

    $num = 1;

    $db = new Database();;
    $rows = $db->query("select receipt_no from sales order by id desc limit 1");

    if(is_array($rows))
    {

        $num = (int)$rows[0]['receipt_no'] + 1;

    }

    return $num;

}

function get_date($date)
{
    
    return date("jS M, Y",strtotime($date));

}

function get_user_id($id)
{

    $user = new User();
    return $user->first(['id'=>$id]);
    
}

function daily_sales_data($records)
{   
    $arr = [];

    for ($i=0; $i < 24; $i++) { 

        if(!isset($arr[$i])){
           
            $arr[$i] = 0;
        }

        foreach ($records as $row) {

            $hour = date('H',strtotime($row['date']));
            if($hour == $i){

                
                    $arr[$i] += $row['total'];    
            }

        }

    }

   return $arr;
}

function weekly_sales_data($records)
{

 
   
}

function monthly_sales_data($records)
{
    $arr = [];
    $tdays = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));

    for ($i=1; $i <= $tdays; $i++) { 
        
        if(!isset($arr[$i])){
        
            $arr[$i] = 0;
        }

        foreach ($records as $row) {
            
            $day = date('d',strtotime($row['date']));
            if($day == $i){

                $arr[$i] += $row['total'];
            }
        }
    }

    return $arr;

    
}

function yearly_sales_data($records)
{
    $arr = [];
    $months = ['0','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

    for ($i=1; $i <= 12; $i++) { 
        
        if(!isset($arr[$months[$i]])){
        
            $arr[$months[$i]] = 0;
        }

        foreach ($records as $row) {
            
            $month = date('m',strtotime($row['date']));
            if($month == $i){

                $arr[$months[$i]] += $row['total'];
            }
        }
    }

    return $arr;

    
}