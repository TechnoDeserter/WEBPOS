<?php require viewpath('partials/head');?>


    <div class="coantainer-fluid border rounded p-4 m-5 col-lg-4 mx-auto">

        <?php if(!empty($row)):?>

        <form method="post" enctype="multipart/form-data">

            
         <h5 class="text-dark"><i class="fa-solid fa-trash me-1"></i> Delete Sale</h5>
         <center><div class="alert alert-danger">Do you want to delete this sale!</div></center>

            <div class="form-floating mt-4 mb-3">
                <input disabled readonly value="<?=set_value('description',$row['description'])?>" name="description" type="text" class="form-control" id="salefloatingInput" placeholder="Sale Name">
                <label for="salefloatingInput" class="form-label">Sale Description</label>
                
            </div>
            <div class="form-floating mt-2 mb-3">
                <input disabled readonly value="<?=set_value('barcode',$row['barcode'])?>" name="barcode" type="text" class="form-control" id="barcodefloatingInput" placeholder="Sale Barcode">
                <label for="barcodedfloatingInput" class="form-label">Barcode<small class="text-muted"></small></label>   
            </div>

            <div class="form-floating mt-2 mb-3">
                <input disabled readonly value="<?=set_value('total',$row['total'])?>" name="total" type="text" class="form-control" id="barcodefloatingInput" placeholder="Sale Total">
                <label for="barcodedfloatingInput" class="form-label">Total<small class="text-muted"></small></label>   
            </div>   

            <div class="form-floating mt-2 mb-3">
                <input disabled readonly value="<?=set_value('date',$row['date'])?>" name="date" type="text" class="form-control" id="barcodefloatingInput" placeholder="Sale Date">
                <label for="barcodedfloatingInput" class="form-label">Date<small class="text-muted"></small></label>   
            </div>
                
            <br>   
            <button class="btn btn-danger float-end"><i class="fa-solid fa-trash"></i> Delete</button>
            <a href="index.php?page=admin&tab=sales">
            <button type="button"class="btn btn-primary"><i class="fa-solid fa-xmark"></i> Cancel</button>
            </a>
        </form> 

        <?php endif;?>
        

</div>
    
<?php require viewpath('partials/foot');?>
