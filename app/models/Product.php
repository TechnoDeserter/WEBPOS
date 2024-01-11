<?php

/**
 * 
 */


class Product extends Model
{
	protected $table = "products";

    protected $allowed_columns = [

                'user_id',
                'barcode',
                'description',
                'qty',
                'amount',
                'date',
                'views',
                'image',
            ];
    
    public function validate($data,$id = null)
    {

        $errors = [];

            if(empty($data['description']))
            {
                $errors['description'] = "Please enter Product description";
            }else
            if(!preg_match('/[a-zA-Z0-9 _\-\&\(\)]+/', $data['description']))
            {
                $errors['description'] = "Please use letters only";
            }  

            if(empty($data['qty']))
            {
                $errors['qty'] = "Please enter Product quantity";
            }else
            if(!preg_match('/^[0-9]+$/', $data['qty']))
            {
                $errors['qty'] = "Quantity must b a number";
            } 
            if(empty($data['amount']))
            {
                $errors['amount'] = "Please enter Product Price";
            }else
            if(!preg_match('/^[0-9.]+$/', $data['amount']))
            {
                $errors['amount'] = "Price must b a number";
            }

            $max_size = 4;//mbs
            $size = $max_size * (1024 * 1024);

                if(!$id || ($id && !empty($data['image']))){

                    if(empty($data['image']))
                    {
                        $errors['image'] = "Product image is required";
                    }else
                    if(!($data['image']['type'] == "image/jpeg" || $data['image']['type'] == "image/png"))
                    {
                        $errors['image'] = "Image must be a valid JPEG or PNG";
                    }else
                    if($data['image']['error'] > 0)
                    {
                        $errors['image'] = "The image failed to upload. Error No.".$data['image']['error'];
                    }else
                    if($data['image']['size'] > $size)
                    {
                        $errors['image'] = "The image size must be lower than ".$max_size."Mb";
                    }
                }
           


           
        return $errors;
    }

    public  function generate_barcode()
    {
        
        return "01" . rand(1000, 999999999);
    }
    public  function generate_filename($ext = "jpg")
    {

       return hash("sha1",rand(1000,999999999))."_".rand(1000,9999).".".$ext;
    }

}

