<?php require viewpath('partials/head');?>


    <div class="coantainer-fluid border rounded p-4 m-5 col-lg-4 mx-auto">

        <?php if(!empty($row)):?>

        <form method="post" enctype="multipart/form-data">

            
         <h5 class="text-dark"><i class="fa-solid fa-pen-to-square me-1"></i> Edit Sale</h5>

            <div class="form-floating mt-4 mb-3">
                <input value="<?=set_value('description',$row['description'])?>" name="description" type="text" class="form-control <?=!empty($errors['description']) ? 'border-danger':''?>" id="salefloatingInput" placeholder="Sale Name">
                <label for="salefloatingInput" class="form-label">Product Name</label>
                <?php if(!empty($errors['description'])):?>
                    <small class="text-danger"><?=$errors['description']?></small>
                <?php endif;?>
            </div>
          
            <div class="row g-2 mb-3">
              <div class="col-md">
                <div class="form-floating">
                <input value="<?=set_value('description',$row['qty'])?>" name="qty" type="number" class="form-control <?=!empty($errors['qty']) ? 'border-danger':''?>" id="floatingInputGrid" placeholder="Quantity" aria-label="Quantity">
                <label for="floatingInputGrid">Quantity</label>
                </div>
            </div>
            <div class="col-md">
            <div class="form-floating">
                <input value="<?=set_value('description',$row['amount'])?>" name="amount" type="number" class="form-control <?=!empty($errors['amount']) ? 'border-danger':''?>" id="floatingInputGrid" placeholder="Price" step="0.50">
                <label for="floatingInputGrid">Price (₱)</label>
                <?php if(!empty($errors['amount'])):?>
                    <small class="text-danger"><?=$errors['amount']?></small>
                <?php endif;?>
            </div>
          </div>
        </div>
                <?php if(!empty($errors['qty'])):?>
                    <small class="text-danger"><?=$errors['qty']?></small>
                <?php endif;?>
                

      
            <br>   
            <button class="btn btn-primary float-end"><i class="fa-regular fa-floppy-disk"></i> Save</button>
            <a href="index.php?page=admin&tab=sales">
            <button type="button"class="btn btn-danger"><i class="fa-solid fa-xmark"></i> Cancel</button>
            </a>
        </form> 
        <?php else:?>
            Sales record not found!
            

                    <a href="index.php?page=admin&tab=sales">
                    <button type="button"class="btn btn-danger"><i class="fa-solid fa-xmark"></i> Cancel</button>
                    </a>


        <?php endif;?>
        

</div>
    
<?php require viewpath('partials/foot');?>
