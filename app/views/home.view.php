<?php require viewpath('partials/head');?>
  <style>
        
        .hide{
            display: none;
        }

        @keyframes appear{

            0%{opacity: 0;transform: translateY(-100px);}
            100%{opacity: 1;transform: translateY(0px);}


        }
        .input-group {
    max-width: 120px;
  }
  
  .input-group .btn {
    padding: 0.2rem 0.3rem;
    font-size: 0.9rem;
  }
  
  .input-group input {
    padding: 0.3rem;
    font-size: 0.9rem;
  }
  .emboss-button {
    background-color: red;
    border: 2px solid black;
  }
  
  .emboss-button i {
    color: black;
  }

    </style>

      <div class="d-flex rounded" style="background-color: rgba(255, 224, 224, 1);" >
       <div style="height: 700px;" class="shadow-sm col-9 p-3">
  <div class="mb-3">
    <h2 class="text-center bg-white rounded-pill"><i class="bi bi-cart"></i> ITEMS</h2>
    <div class="d-flex justify-content-end m-2">
      <form class="d-flex" role="search">
        <input onkeyup="check_for_enter_key(event)" oninput="search_item(event)" type="text" class="form-control js-search" placeholder="Search Product..." aria-label="Search Product..." aria-describedby="basic-addon1" style="border-color: red;">
        <button class="btn emboss-button"><i class="fa fa-search"></i></button>
      </form>
    </div>
  </div>
  <div onclick="add_item(event)" class="js-products d-flex" style="flex-wrap: wrap; height: 85%; overflow-y: auto; scrollbar-width: thin; scrollbar-color: transparent transparent;">
    <!-- Add product items dynamically -->
  </div>
</div>


        <div class="col-3 bg-light p-4 pt-2">
  <h2 class="text-center"><i class="bi bi-cart-plus"></i> Cart <div class="js-item-count badge bg-secondary rounded-circle text-white">0</div></h2>
  <div class="table-responsive" style="height: 500px;">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Image</th>
          <th>Description</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody class="js-items">
        <!-- Add table rows dynamically -->
      </tbody>
    </table>
  </div>
  <div class="border col p-3" style="border-radius: 10px; background-color: #ffe0e0; font-weight:bold">
    <div class="js-gtotal" style="font-size: 20px;">Total: ₱ 0.00</div>
  </div>
  <div class="d-flex">
    <button onclick="clear_all()" class="col ms-2 me-2 mt-2 py-2 btn btn-danger btn-lg" style="border-radius: 20px; background-color: #FF5252; color: #FFFFFF; font-weight: bold; border: none; outline: none; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.25);">Cancel</button>
<button onclick="show_modal('amount-paid')" class="col ms-2 me-2 mt-2 py-2 btn btn-primary btn-lg" style="border-radius: 20px; background-color: #536DFE; color: #FFFFFF; font-weight: bold; border: none; outline: none; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.25);">Check Out</button>
  </div>
</div>

    </div>






<!--modals-->

<!--amount modals-->
     <div role="close-button" onclick="hide_modal(event, 'amount-paid')" class="js-amount-paid-modal hide" style="animation: appear .3s ease;background-color: #00000044; width: 100%; height: 100%; position: fixed;left:0px;top:0px;z-index: 4;">
            
           <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSheet">
               <div class="modal-dialog" role="document">
               <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom-0">
                    <h4 class="modal-title fs-4"><i class="fa fa-cart-shopping"></i>Check Out</h4>
                    <button role="close-button" onclick="hide_modal(event,'amount-paid')" type="button" class="btn-close float-end" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body py-0">
                    <div class="js-gtotal-modal alert alert-danger mt-4 " role="alert" style="font-size:20px"></div>
                    <div for="amountpaid" class="form-label" style="font-size:20px;">Amount Paid:</div>
                    <input onkeyup="if(event.keyCode == 13)validate_amount_paid(event)" type="text" class="js-amount-paid-input form-control" placeholder="Enter Amount Paid">
                </div>
                <br>
                    
                    <button onclick="validate_amount_paid(event)" class="btn btn-primary btn-lg my-3 mx-3">Pay</button>
                    <button role="close-button" onclick="hide_modal(event,'amount-paid')" class="btn btn-danger btn-lg mx-3">Cancel</button>
                <br>
              
            </div>
            </div>
        </div>
    </div>
   </div> 
</div>        
         

<!--end amoount modals-->
<!--change modals-->

    <div role="close-button" onclick="hide_modal(event, 'change')" class="js-change-modal hide" style="animation: appear .4s ease;background-color: #00000044; width: 100%; height: 100%; position: fixed;left:0px;top:0px;z-index: 4;">
       
            <d iv class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSheet">
                <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow">
               <div class="modal-header border-bottom-0">
                <h4 class="modal-title fs-4">Receipt:</h4>
                <button role="close-button" onclick="hide_modal(event,'change')" type="button" class="btn-close float-end" aria-label="Close" data-bs-dismiss="modal"></button>
            </div>
                <div class="modal-body py-0">
                <div class="js-gtotal-change ms-4 mt-4" role="alert" style="font-size: 25px"></div>
                <div class="js-amount-paid-input ms-4 mt-4" role="alert"style="font-size: 25px;"></div>
                <div class="js-change-input ms-4 mt-4" role="alert"style="font-size: 25px;"></div>
                <br>
                <div class="modal-footer flex-column align-items-stretch w-100 gap-2 pb-3 border-top-0">
                <button role="close-button" onclick="hide_modal(event,'change')" class="js-btn-close-change btn-primary btn-lg">Continue</button>
            </div>
        </div>
        </div>
        </div>
    </div>
    </div>

<!--end change modals-->


<!--end modals-->

  
<script>

    var PRODUCTS = [];
    var ITEMS    = [];
    var BARCODE  = false;
    var GTOTAL   = 0;
    var CHANGE   = 0;
    var AMOUNT   = 0;
    var receipt_window = null;

    var main_input = document.querySelector(".js-search");

    function search_item(e){

        
        var text = e.target.value.trim();

        var data = {};
        data.data_type = "search";
        data.text = text;

        send_data(data);
    }

    
    function send_data(data)
    {

        var ajax = new XMLHttpRequest();

       
        ajax.addEventListener('readystatechange',function(e){

            if(ajax.readyState == 4){

               if(ajax.status == 200)
                {
                    if(ajax.responseText.trim() != ""){
                        handle_result(ajax.responseText);
                    }else{
                        if(BARCODE){
                            alert("that item was not found");
                        }
                    }
                }else{

                    console.log("An error occured. Err Code:"+ajax.status+" Err message:"+ajax.statusText);
                    console.log(ajax);
                }
                if(BARCODE){
                    main_input.value = "";
                    main_input.focus();
                }

                BARCODE = false;
            }
            
        });

        ajax.open('post','index.php?page=ajax',true);
        ajax.send(JSON.stringify(data));
    }

    function handle_result(result){

        console.log(result);
        var obj = JSON.parse(result);
        if(typeof obj != "undefined"){

            if(obj.data_type == "search")
            {
                var mydiv = document.querySelector(".js-products");
                mydiv.innerHTML = "";
                PRODUCTS = [];

                var mydiv = document.querySelector(".js-products");
                if(obj.data != "")
            {
                PRODUCTS = obj.data;
                for (var i = 0; i < obj.data.length; i++) {
                
                    mydiv.innerHTML += product_html(obj.data[i],i);
                }
                if(BARCODE && PRODUCTS.length == 1){
                        add_item_from_index(0);
                    }
            } 
        }
    }    

}

    function product_html(data,index)
    {

        return `
                    <!--card-->
<div class="card m-2 border border-dark rounded" style="min-width: 150px; max-width: 150px;">
    <a href="#">
        <img index="${index}" src="${data.image}" class="w-100 rounded">
    </a>
    <div class="p-2">
        <div class="" style="color: black; font-weight: 500">${data.description}</div>
        <div class="" style="font-size: 20px;"><b>₱${data.amount}</b></div>
    </div>
</div>
<!--end card-->
            `;  

                
    }
    function item_html(data,index)
    {

        return `
       <!--item-->
<tr style="border: 1px solid black; border-radius: 10px;">
  <td style="width: 110px;">
    <img src="${data.image}" class="rounded-border" style="width: 65px; height: 65px;">
  </td> 
  <td class="text-dark">
    <div style="font-size: 18px; font-weight: 500">${data.description}</div>
    <div class="input-group my-3">
      <button index="${index}" onclick="change_qty('down',event)" class="btn btn-outline-primary" type="submit"><i class="fa fa-minus"></i></button>
      <input index="${index}" onblur="change_qty('input',event)" type="text" class="border-primary form-control" placeholder="1" value="${data.qty}" oninput="validateInput(this)">
      <button index="${index}" onclick="change_qty('up',event)" class="btn btn-outline-primary" type="submit"><i class="fa fa-plus"></i></button>
    </div>
  </td>
  <td style="font-size: 20px; position: relative;">
    <b style="display: inline-block; margin-top: 20px; font-size: 22px">₱${data.amount}</b>
    <div style="position: absolute; top: -9px; right: -1px;">
      <button onclick="clear_item(${index})" class="btn btn-danger btn-sm" style="padding: 0; width: 20px; height: 20px;"><i class="fa fa-times" style="font-size: 14px;"></i></button>
    </div>
  </td>
</tr>
<!--end item-->
            `;

                
    }

       function validateInput(input) {
    // Remove any non-digit characters from the input value
    input.value = input.value.replace(/\D/g, '');
    
    // Limit the input value to a maximum of 999
    if (input.value > 999) {
      input.value = 999;
    }
  }


   function add_item_from_index(index)
    {

            //check if items exists
            for (var i = ITEMS.length - 1; i >= 0; i--) {
                
                if(ITEMS[i].id == PRODUCTS[index].id)
                {
                    ITEMS[i].qty += 1;
                    refresh_items_display();
                    return;
                }
            }

            var temp = PRODUCTS[index];
            temp.qty = 1;

            ITEMS.push(temp);
            refresh_items_display();

    }

    function add_item(e)
    {

        if(e.target.tagName == "IMG"){
            var index = e.target.getAttribute("index");

            add_item_from_index(index);
        }
    }

    function refresh_items_display()
    {

        var item_count = document.querySelector(".js-item-count");
        item_count.innerHTML = ITEMS.length;

        var items_div = document.querySelector(".js-items");
        items_div.innerHTML = "";
        var grand_total = 0;

        for (var i = ITEMS.length - 1; i >= 0; i--) {

            items_div.innerHTML += item_html(ITEMS[i],i);
            grand_total += (ITEMS[i].qty * ITEMS[i].amount);
        }
         
        var gtotal_div = document.querySelector(".js-gtotal");
        gtotal_div.innerHTML = "Total: ₱" + grand_total.toFixed(2);
        var gtotal_div = document.querySelector(".js-gtotal-modal");
        gtotal_div.innerHTML = "Total: ₱" + grand_total.toFixed(2);
        GTOTAL = grand_total;
    } 

    function clear_all()
    {

        if(!confirm("Do you want to cancel order?"))
            return;

        ITEMS = [];
        refresh_items_display();

    }

    function clear_item(index)
    {

        if(!confirm("Remove this item?"))
            return;

        ITEMS.splice(index,1);
        refresh_items_display();

    }

    function change_qty(direction,e)
    {

        var index = e.currentTarget.getAttribute("index");
        if(direction == "up")
        {
            ITEMS[index].qty += 1;
        }else
        if(direction == "down")
        {
            ITEMS[index].qty -= 1;
        }else{

            ITEMS[index].qty = parseInt(e.currentTarget.value);
        }

        
        if(ITEMS[index].qty < 1)
        {
            ITEMS[index].qty = 1;
        }

        refresh_items_display();
    }

    function check_for_enter_key(e)
    {

        if(e.keyCode == 13)
        {
            BARCODE = true;
            search_item(e);
        }
    }

    function show_modal(modal)
    {

        if(modal == "amount-paid") {

            if (ITEMS.length == 0) {
                alert("Please add at least one item on the cart!");
                return;
            }

            var mydiv = document.querySelector(".js-amount-paid-modal");
            mydiv.classList.remove("hide");

            mydiv.querySelector(".js-amount-paid-input").value == "";
            mydiv.querySelector(".js-amount-paid-input").focus();
        }
        else
        
        if(modal == "change") {

            var mydiv = document.querySelector(".js-change-modal");
            mydiv.classList.remove("hide");

            mydiv.querySelector(".js-change-input").innerHTML = change1;
            mydiv.querySelector(".js-amount-paid-input").innerHTML = AMOUNT;
            mydiv.querySelector(".js-gtotal-change").innerHTML = gtotal_div;
            mydiv.querySelector(".js-btn-close-change");
        } 
       
        
    }    

    function hide_modal(e,modal)
    {
        if(e == true || e.target.getAttribute("role") == "close-button") 
        {
            if(modal == "amount-paid") 
            {
                var mydiv = document.querySelector(".js-amount-paid-modal");
                mydiv.classList.add("hide");
            }else 
            if(modal == "change") 
            {
                var mydiv = document.querySelector(".js-change-modal");
                mydiv.classList.add("hide");
            }
        }
    }

    function validate_amount_paid(e)
    {

        var amount = e.currentTarget.parentNode.querySelector(".js-amount-paid-input").value.trim();
        
        if(amount == "")
        {   
            alert("Please enter a valid amount!");
            document.querySelector(".js-amount-paid-input").focus();
            return;
        }
        amount = parseFloat(amount);
        AMOUNT = amount;
        AMOUNT = "Cash: ₱ " + AMOUNT.toFixed(2);


        if(amount < GTOTAL)
        {

            alert("Amount must be higher or equal to the total!");
            return;
        }
        change1 = 0
        change1 = amount - GTOTAL
        CHANGE = change1;
        change1 = "Change: ₱ " + CHANGE.toFixed(2);
        gtotal_div = "Total: ₱ " + GTOTAL.toFixed(2);

        hide_modal(true,'amount-paid');
        show_modal('change');

        //renove info
        var ITEMS_NEW = [];
        for (var i = 0; i < ITEMS.length; i++) {
            
            var tmp ={};
            tmp.id = ITEMS[i]['id'];
            tmp.qty = ITEMS[i]['qty'];
            tmp.description = ITEMS[i]['description'];

            ITEMS_NEW.push(tmp);
           
        }
        //receipt
        //send cart through ajax
        send_data({

            data_type:"checkout",
            text:ITEMS_NEW
        });
        //receipt

        print_receipt({

            company:'RMMS IHAW-IHAW',
            amount:amount,
            change:CHANGE,
            gtotal:GTOTAL,
            data:ITEMS
        });


        //clear items
        ITEMS = [];
        refresh_items_display();

        //reload products
        send_data({

            data_type:"search",
            text:""
        });

        const input = event.target;
  const value = input.value;

  // Remove non-numeric characters
  const numericValue = value.replace(/[^0-9]/g, '');

  // Update the input value with the numeric value
  input.value = numericValue;
    }

    function print_receipt(obj)
    {   
        var vars = JSON.stringify(obj);

        var receipt_window = window.open('index.php?page=print&vars='+vars,'printpage',"width=500px;");
        
        setTimeout(function(){
            
            receipt_window.close();

        },10000);
       


    }

    send_data({

        data_type:"search",
        text:""
    });

    
 

</script>

<?php require viewpath('partials/foot');?>
