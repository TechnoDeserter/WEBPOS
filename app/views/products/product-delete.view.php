<?php require viewpath('partials/head');?>


    <div class="coantainer-fluid border rounded p-4 m-5 col-lg-4 mx-auto">

        <?php if(!empty($row)):?>

        <form method="post" enctype="multipart/form-data">

            
         <h5 class="text-dark"><i class="fa-solid fa-pen-to-square me-1"></i> Delete Product</h5>
         <div class="alert alert-danger">Do you want to delete this product!</div>

            <div class="form-floating mt-4 mb-3">
                <input disabled readonly value="<?=set_value('description',$row['description'])?>" name="description" type="text" class="form-control" id="productfloatingInput" placeholder="Product Name">
                <label for="productfloatingInput" class="form-label">Product Name</label>
                
            </div>
            <div class="form-floating mt-2 mb-3">
                <input disabled readonly value="<?=set_value('barcode',$row['barcode'])?>" name="barcode" type="text" class="form-control" id="barcodefloatingInput" placeholder="Product Barcode">
                <label for="barcodedfloatingInput" class="form-label">Product Barcode<small class="text-muted"></small></label>
               
            </div>
                
            <br>   
            <button class="btn btn-danger float-end"><i class="fa-solid fa-trash"></i> Delete</button>
            <a href="index.php?page=admin&tab=products">
            <button type="button"class="btn btn-primary"><i class="fa-solid fa-xmark"></i> Cancel</button>
            </a>
        </form> 

        <?php endif;?>
        

</div>
    
<?php require viewpath('partials/foot');?>
