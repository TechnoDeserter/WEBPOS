<?php

/**
 * 
 */
class Sale extends Model
{
	protected $table = "sales";

    protected $allowed_columns = [

                'barcode',
                'receipt_no',
                'user_id',
                'description',
                'qty',
                'amount',
                'total',
                'customer_name',
                'customer_contact',
                'date',
            ];
    
    public function validate($data,$id = null)
    {

        $errors = [];
        
            if(empty($data['description']))
            {
                $errors['description'] = "Please enter Sale description";
            }else
            if(!preg_match('/[a-zA-Z0-9 _\-\&\(\)]+/', $data['description']))
            {
                $errors['description'] = "Please use letters only";
            }  

            if(empty($data['qty']))
            {
                $errors['qty'] = "Please enter Sale quantity";
            }else
            if(!preg_match('/^[0-9]+$/', $data['qty']))
            {
                $errors['qty'] = "Quantity must b a number";
            } 
            if(empty($data['amount']))
            {
                $errors['amount'] = "Please enter Sale Price";
            }else
            if(!preg_match('/^[0-9.]+$/', $data['amount']))
            {
                $errors['amount'] = "Price must b a number";
            }

     
           


           
        return $errors;
    }

   

}

