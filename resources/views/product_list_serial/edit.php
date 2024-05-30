<div class="pcoded-content">
  <div class="pcoded-inner-content" >
    <br>
      <!-- Main-body start -->
      <div class="main-body ">
        <div class="page-wrapper m-t-0 m-l-2  p-12">
          <!-- Page-header start -->
          <div class="page-header m-0 p-0">
            <div class="row align-items-end">
              <div class="col-lg-8">
                <div class="page-header-title">
                  <div class="d-inline ">
                    <h4>Edit Product Serial List</h4>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
              </div>
            </div>
          </div>
          <div class="page-body">
             <form    action="<?php echo route('product/list/serial/update/'.$data->id )?>" method="POST" class="signup">
                <div class="row">
                  <div class="col-sm-4" >
                    <label>Invoice ON</label>
                    <input type="text" name="invoice" value="<?php echo $data->invoice??''?>"  class="form-control" readonly>
                    <input type="hidden" name="product_serial_in_id_arr"  class="product_serial_in_id_arr" >
                    
                  </div>
                  <div class="col-sm-4" >
                    <label>Dealer</label>
                    <select name="dealer_id" id="dealer_id" class="form-control js-example-basic-single" required>
                       <option value="" >--Select--</option>
                       <?php  foreach ($dealers as $dealer) { ?>
                          <option   value="<?php echo $dealer['id'];?>" <?php echo   $data->dealer_id == $dealer['id'] ? 'selected': '';?>>
                            <?php echo $dealer['name']; ?>
                          </option>
                        <?php } ?>
                    </select>   
                  </div>
                  <div class="col-sm-4" >
                      <label>Narration</label>
                      <textarea name="narration" rows="3" cols="3" class="form-control"><?php echo $data['narration']??''?></textarea>  
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4" >
                    <div class="row">
                      <label>Date</label>
                      <input type="date"name="invoice_date"class="form-control " value="<?php echo $data['invoice_date']??''?>"  />
                    </div>
                  </div>
                  <div class="col-sm-4" >
                  </div>
                 
                </div>
                <div class="row">
                  <div class="table-responsive">
                    <table class="table " id="orders">
                      <tr>
                        <th class="col-0.5" >#</th>
                        <th class="col-3">Serial Number</th>
                        <th class="col-3">Stock Group Name</th>
                        <th class="col-4">Product Name</th>
                        <th class="col-4">Remark</th>                                                                                                       
                      </tr>
                    </table>
                  </div>
                </div>
                 <div class="row">
                    <div class="col-md-3 m-0 p-0">
                      <td ><button type="button" name="add" id="add" class="btn btn-success circle py-1 ">+</button></td>
                    </div>  
                    <div class="col-md-9">
                    </div>
                </div>
                <!-- </div> -->
                <div align="center " class="m-2" >
                  <input type="submit" name="submit" class="btn btn-info" value="Update" />
                </div>
             </form>
            <div id="styleSelector"></div>
          </div>
      </div>
  </div> 
</div> 
<script>         
$(document).ready(function(){
  let p;
    $.ajax({
            type: 'GET',
            url: "<?php echo route('product/list/serial/edit/in');?>",
            async: false,
            data: {
                tran_id:<?php echo $data->id?>
            },
            dataType: 'json',
            success:  (response)=> {
            console.log(response);
            $.each(response, function(i,v) {
              $('#orders').append(`<tr  style="margin:0px;padding:0px;" class="p-0 m-0"  id="row${i}">
                    <input class="form-control product_serial_in_id" type="hidden" id="product_serial_in_id_${i}" name="product_serial_in_id[]" value="${v.id}" for="${i}"/>
                    <input class="form-control product_id" type="hidden" id="product_id_${i}" name="product_id[]" value="${v.product_id}" for="${i}"/>
                    <input class="form-control stock_group_id " type="hidden" id="stock_group_id_${i}" name="stock_group_id[]"  value="${v.stock_group_id}" for="${i}"/>
                    <td class="m-0 p-0"><button type="button" name="remove" id="${i}" class="btn btn-danger btn_remove cicle   py-1">-</button></td>
                    <td class="m-0 p-0"><input class="form-control ProductSerial_id  autocomplete_txt"  type="text"  id="productSerial_id_${i}"  value="${v.product_serial_id}" name="productSerial_id[]" autocomplete="off" for="${i}"/></td>
                    <td class="m-0 p-0"><input class="form-control  stock_group_name" type="text"  id="stock_group_name_${i}" name="stock_group_name_[]" value="${v.stock_group_name}" for="${i}"  readonly></td>
                    <td class="m-0 p-0"><input class="form-control product_name" type="text"  id="product_name_${i}" name="product_name[]" value="${v.product_name}" for="${i}" readonly> </td>
                    <td class="m-0 p-0"><input class="form-control remark "   type="text"  id="remark_${i}" name="remark[]" value="${v.remark||''}" for="${i}"/> </td>
                </tr>`);
                    p=i;
                });
            }
    });
    var rowCount=p;

    $('#add').click(function () {
        rowCount += 5;
        addRow(rowCount);
    });
    product_serial_in_id_arr=[];
    $(document).on('click', '.btn_remove', function () {
        var buttonId = $(this).attr('id');
        $('#row' + buttonId).remove();
        product_serial_in_id_arr.push($(this).closest('tr').find('.product_serial_in_id').val());
     $('.product_serial_in_id_arr').val(product_serial_in_id_arr);
    });
    console.log(product_serial_in_id_arr);
    function getId(element) {
        var id = element.attr('id');
        var idArr = id.split("_");
        return idArr[idArr.length - 1];
    }
   

    // append table
    function addRow (rowCount){
        for(var row=1; row<6;row++) {
                rowCount++;
                $('#orders').append(`<tr  style="margin:0px;padding:0px;" class="p-0 m-0"  id="row${rowCount}">
                    <input class="form-control product_id" type="hidden" id="product_id_${rowCount}" name="product_id[]" for="${rowCount}"/>
                    <input class="form-control stock_group_id " type="hidden" id="stock_group_id_${rowCount}" name="stock_group_id[]" for="${rowCount}"/>
                    <td class="m-0 p-0"><button type="button" name="remove" id="${rowCount}" class="btn btn-danger btn_remove cicle   py-1">-</button></td>
                    <td class="m-0 p-0"><input class="form-control ProductSerial_id  autocomplete_txt"  type="text"  id="productSerial_id_${rowCount}" name="productSerial_id[]" autocomplete="off" for="${rowCount}"/></td>
                    <td class="m-0 p-0"><input class="form-control  stock_group_name" type="text"  id="stock_group_name_${rowCount}" name="stock_group_name_[]" for="${rowCount}" readonly> </td>
                    <td class="m-0 p-0"><input class="form-control product_name" type="text"  id="product_name_${rowCount}" name=" product_name[]" for="${rowCount}" readonly> </td>
                    <td class="m-0 p-0"><input class="form-control remark "   type="text"  id="remark_${rowCount}" name="remark[]" for="${rowCount}"/> </td>
                </tr>`);
        }
    }
                         
 $(document).ready(function() {
    $('#orders').on('keyup keypress blur change click keydown','.ProductSerial_id', function() {
        let serial_id =$(this).closest('tr').find('.ProductSerial_id').val().toUpperCase();
        if (serial_id.length > 10) {
            $.ajax({
                url: "<?php echo route('warrantyCard/serial'); ?>",
                type: "GET",
                data: {
                    'serial_id': serial_id
                },
                dataType: "JSON",
                success: (res)=> {
                    if (res.interger) {
                        $(this).closest('tr').find('.product_id').val(res.interger.id);
                        $(this).closest('tr').find('.product_name').val(res.interger.name);
                    }
                    if (res.stock_group) {
                        $(this).closest('tr').find('.stock_group_id').val(res.stock_group.id);
                        $(this).closest('tr').find('.stock_group_name').val(res.stock_group.name);
                    }

                }

            });
        }
    });
});
  
});
</script>
