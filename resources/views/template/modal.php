<!-- Delete Modal -->

<div class="modal deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5 class="modal-title" id="exampleModalLabel">Do you want to delete?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closeModal" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary deleteApprove">Yes</button>
      </div>
    </div>
  </div>
</div>
<div class="modal updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5 class="modal-title" id="exampleModalLabel">Do you want to delete?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closeModal" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary deleteApprove">Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- edit modal -->
<div class="modal editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5 class="modal-title" id="exampleModalLabel">Do you want to Edit?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closeModal" data-bs-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary editApprove">Yes</button>
      </div>
    </div>
  </div>
</div>


<!-- Warranty Edit Modal -->

<!-- <div class="modal warrantyeditModal" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5 class="modal-title text-center" id="exampleModalLabel1"><b>Editting Warranty Information</b></h5>
      </div>
      <form action="<?php echo route('warrantyCard/save'); ?>" method="POST">
        <div class="row">
          <div class="col-md-12 text-right">
            <div class="form-group my-2 my-2 my-1  row ">
              <label class="col-md-3 col-form-label">Product Name</label>
              <div class="col-md-8">
                <input type="text" name="ProductName" class="form-control ProductName" id="pname" value="" placeholder="Type for Suggestion" required>
              </div>
            </div>
            <div class="form-group my-2 my-2 my-1  row">
              <label class="col-md-3 col-form-label">Product Serial</label>
              <div class="col-md-8">
                <input type="text" name="ProductSerial" class="form-control ProductSerial" value="" placeholder="" required>
              </div>
            </div>
            <div class="form-group my-2 my-2 my-1 row">
              <label class="col-md-3 col-form-label">Card No</label>
              <div class="col-md-8">
                <input type="text" name="CardNo" id="CardNo" class="form-control CardNo" value="<?php if (!empty($row['card_no'])) {
                                                                                                  echo $row['card_no'];
                                                                                                } ?>" placeholder="" required>
              </div>
            </div>
            <div class="form-group my-2 my-2 my-1 row">
              <label class="col-md-3 col-form-label">Sales Date</label>
              <div class="col-md-8">
                <input type="date" name="SalesDate" class="form-control SalesDate" value="<?php if (!empty($row['sales_date'])) {
                                                                                            echo $row['sales_date'];
                                                                                          } ?>" placeholder="" required>
              </div>
            </div>
            <div class="form-group my-2 my-2 my-1 row">
              <label class="col-md-3 col-form-label">Guarantee/Warranty End Date</label>
              <div class="col-md-8">
                <input type="date" name="CardEndDate" class="form-control CardEndDate" value="<?php if (!empty($row['card_end_date'])) {
                                                                                                echo $row['card_end_date'];
                                                                                              } ?>" placeholder="" required>
              </div>
            </div>

            <div class="form-group my-2 my-2 my-1 row">
              <label class="col-md-3 col-form-label">Dealer Name</label>
              <div class="col-md-8">
                <input type="text" name="DealerName" class="form-control DealerName" id='dealer' value="" placeholder="Type for Suggestion" required>
              </div>
            </div>
            <div class="form-group my-2 my-2 my-1 row">
              <label class="col-md-3 col-form-label">Sales Office</label>
              <div class="col-md-8">
                <input type="text" name="SalesOffice" class="form-control SalesOffice" value="<?php if (!empty($row['sales_office'])) {
                                                                                                echo $row['sales_office'];
                                                                                              } ?>" placeholder="" required>
              </div>
            </div>
            <div class="form-group my-2 my-2 my-1 row">
              <label class="col-md-3 col-form-label">Sales Person</label>
              <div class="col-md-8">
                <input type="text" name="SalesPerson" class="form-control SalesPerson" value="<?php if (!empty($row['sales_person'])) {
                                                                                                echo $row['sales_person'];
                                                                                              } ?>" placeholder="" required>
              </div>
            </div>
            <div class="form-group my-2 my-2 my-1 row">
              <label class="col-md-3 col-form-label">Customer Name</label>
              <div class="col-md-8">
                <input type="text" name="CustomerName" class="form-control CustomerName" value="<?php if (!empty($row['customer_name'])) {
                                                                                                  echo $row['customer_name'];
                                                                                                } ?>" placeholder="" required>
              </div>
            </div>
            <div class="form-group my-2 my-2 my-1 row">
              <label class="col-md-3 col-form-label">Customer Address</label>
              <div class="col-md-8">
                <input type="text" name="CustomerAddress" class="form-control CustomerAddress" value="<?php if (!empty($row['customer_address'])) {
                                                                                                        echo $row['customer_address'];
                                                                                                      } ?>" placeholder="" required>
              </div>
            </div>
            <div class="form-group my-2 my-2 my-1 row">
              <label class="col-md-3 col-form-label">Customer Phone</label>
              <div class="col-md-8">
                <input type="text" name="CustomerPhone" class="form-control CustomerPhone" value="<?php if (!empty($row['customer_phone'])) {
                                                                                                    echo $row['customer_phone'];
                                                                                                  } ?>" placeholder="" required>
              </div>
            </div>
            <div class="form-group my-2 my-2 my-1 row">
              <label class="col-md-3 col-form-label">Reference</label>
              <div class="col-md-8">
                <input type="text" name="Reference" class="form-control Reference" value="<?php if (!empty($row['reference'])) {
                                                                                            echo $row['reference'];
                                                                                          } ?>" placeholder="" required>
              </div>
            </div>
            <div class="form-group my-2 my-2 my-1 row">
              <label class="col-md-3 col-form-label">Priority</label>
              <div class="col-md-8">
                <select name="Priority" class="form-control Priority" required>
                  <option value="1">Normal</option>
                  <option value="2">High</option>
                </select>
              </div>
            </div>
            <div class="form-group mb-3 me-4 pe-5 row">
              <div class="col-md-12 text-end">
                <button type="submit" class="btn btn-primary px-5 mt-4 warrantyupdate">Update</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    dateCalculate(12);
    let productArr = [];
    let dealerArr = [];
    productData();
    dealerData();

    function productData(id = null) {
      $.ajax({
        url: "<?php echo route('product/data'); ?>",
        type: "POST",
        dataType: "JSON",
        data: {},
        success: function(response) {
          console.log(response);
          if (response.length) {
            for (i = 0; i < response.length; i++) {
              productArr[i] = response[i]['id'] + '-' + response[i]['name'];
            }
          }
        }
      })
    }
    $("#pname").autocomplete({
      source: productArr
    });

    function dealerData() {
      $.ajax({
        url: "<?php echo route('dealer/data'); ?>",
        type: "POST",
        dataType: "JSON",
        data: {},
        success: function(response) {
          if (response.length) {
            for (i = 0; i < response.length; i++) {
              dealerArr[i] = response[i]['id'] + '-' + response[i]['name'];
            }
          }
        }
      })
    }
    $("#dealer").autocomplete({
      source: dealerArr
    });

    function productDataId(id = null) {
      $.ajax({
        url: "<?php echo route('product/data'); ?>",
        type: "POST",
        dataType: "JSON",
        data: {
          'id': id
        },
        success: function(response) {
          if (response[0]['warranty']) {
            dateCalculate(response[0]['warranty']);
          } else {
            dateCalculate(12);
          }
        }
      })
    }

    $('.name').change(function() {
      let name = $('.name').val();
      if (name) {
        let id = name.split("-");
        productDataId(id[0]);
      }
    })

    $('.SalesDate').change(function() {
      let name = $('.name').val();
      dateCalculate(12);
      if (name) {
        let id = name.split("-");
        productDataId(id[0]);
      }

    })

    function dateCalculate($month) {
      let month = 0;
      let year = 0;
      let SalesDate = $('.SalesDate').val();
      let startDate = SalesDate.split('-');
      if ((parseInt(startDate[1]) + parseInt($month)) > 12) {
        month = parseInt(startDate[1]) + parseInt($month);
        year = month / 12;
        startDate[1] = (parseInt(startDate[1]) + parseInt($month)) - (parseInt(year) * 12);
        startDate[0] = parseInt(startDate[0]) + parseInt(year);
        console.log(startDate);
      } else {
        startDate[1] = (parseInt(startDate[1]) + parseInt($month));
      }
      let warrentyEndDate = startDate[0] + '-' + startDate[1] + '-' + startDate[2];
      if (parseInt(startDate[1]) < 10) {
        warrentyEndDate = startDate[0] + '-0' + startDate[1] + '-' + startDate[2];
      }
      $('.CardEndDate').val(warrentyEndDate);
    }

  })
</script> -->