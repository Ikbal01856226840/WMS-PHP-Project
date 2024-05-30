<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- Main-body start -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- Page-header start -->
                        <div class="page-header mt-4">
                            <div class="row align-items-end">
                                <div class="page-header-title">
                                    <div class="d-inline">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <!-- Page-body start -->
                        <div class="page-body">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-sm-10">
                                    <!-- Zero config.table start -->
                                    <div class="card">
                                        <div class="card-header">


                                        </div>
                                        <div class="card-block">
                                            <div class="dt-responsive table-responsive">
                                                <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>SL</th>
                                                            <th>Name</th>
                                                            <th>Alias</th>
                                                            <th>Under</th>
                                                            <th>QtyAdd</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="stockGroupData">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                        <!-- Page-body end -->
                    </div>
                    <!-- Main-body end -->
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        stock_data();
    })

    function stock_data() {
        $.ajax({
            url: "<?php echo route('stockGroup/index_data'); ?>",
            type: 'POST',
            dataType: 'JSON',
            data: {},
            success: function(response) {
                if (response.length) {
                    let stockGroupData = '';
                    for (i = 0; i < response.length; i++) {
                        stockGroupData += "<tr><td>" + (i + 1) + "</td><td>" + response[i]['name'] + "</td><td>" + response[i]['alias'] + "</td><td>" + response[i]['under'] + "</td><td>" + (response[i]['qty_add_per'] ? 'Yes' : 'No') + "</td></tr>"
                    }
                    $('.stockGroupData').empty();
                    $('.stockGroupData').append(stockGroupData);
                }
            }
        })
    }
</script>