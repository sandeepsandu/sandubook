<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add New Stock Transfer</h3>
                </div>
                <a class="btn btn-info btn-flat" href="<?php echo base_url();?>admin/stocktransfer/stocktransfer_list">View Stock Transfer</a>

                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body my-form-body">
                    <?php if(isset($msg) || validation_errors() !== ''): ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                            <?= validation_errors();?>
                            <?= isset($msg)? $msg: ''; ?>
                        </div>
                    <?php endif; ?>

                    <?php echo form_open(base_url('admin/stocktransfer/add'), 'class="form-horizontal"');  ?>

                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">Transfer From</label>

                        <div class="col-sm-4">
                            <select name="transfer_from" id="transfer_from" class="form-control">
                                <?php
                                foreach($godownlist as $each)
                                { ?><option value="<?php echo $each['godown_id']; ?>"><?php echo $each['godown_name']; ?></option>';
                                <?php }
                                ?>
                            </select>
                        </div>

                        <label for="firstname" class="col-sm-1 control-label">Total Qty</label>

                        <div class="col-sm-4">
                            <input type="text" name="fromtotalqty" class="form-control" id="fromtotalqty" placeholder="">
                        </div>


                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">Transfer To</label>

                        <div class="col-sm-4">
                            <select name="transfer_to" id="transfer_to" class="form-control">
                                <?php
                                foreach($godownlist as $each)
                                { ?><option value="<?php echo $each['godown_id']; ?>"><?php echo $each['godown_name']; ?></option>';
                                <?php }
                                ?>
                            </select>
                        </div>

                        <label for="firstname" class="col-sm-1 control-label">Total Qty</label>

                        <div class="col-sm-4">
                            <input type="text" name="tototalqty" class="form-control" id="tototalqty" placeholder="">
                        </div>


                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Date</label>

                        <div class="col-sm-5">
                            <input type="text" name="datepicker" class="form-control" id="datepicker" placeholder="">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Description</label>

                        <div class="col-sm-9">
                            <textarea class="form-control" name="description" id="description" placeholder=""></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mobile_no" class="col-sm-2 control-label">Qty</label>

                        <div class="col-sm-2">
                            <input type="number" step=".01" name="qty" class="form-control" id="qty" placeholder="">
                        </div>
                    </div>

                        <div class="col-md-11">
                            <input type="submit" name="submit" value="Add Stock Transfer" class="btn btn-info pull-right">
                        </div>
                    </div>
                    <?php echo form_close( ); ?>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

</section>

<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>

<script>
    $('#datepicker').datepicker({
        autoclose: true,
        format:"dd-mm-yyyy"
    });
    $("#transaction").addClass('active');
    $("#datepicker").datepicker("setDate", new Date());
    function godownchange()
    {

        var gfrom = $('#transfer_from option:selected').val();
       // alert(gfrom);
            var urlget = '<?php echo base_url('admin/stocktransfer/gettotalstock'); ?>';

        var post_data = {
            'g_id': gfrom,
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: 'POST',
            url: urlget,
            data: post_data,
            dataType: 'json',
            success:  function(response){

                var len = response.length;

                if(len > 0) {
                    // Read values
                    var tqty = response[0].totalqty;
               //     alert(uname);
                    $('#fromtotalqty').val(tqty);
                }

               // $('[name="product_code"]').val("");
             // alert(data);



            },
            error: function(data){

                // $('[name="product_code"]').val("");
                alert("failed");

            },
        });
    }
    function godownchangeto()
    {

        var gto = $('#transfer_to option:selected').val();
        // alert(gfrom);
        var urlget = '<?php echo base_url('admin/stocktransfer/gettotalstock'); ?>';

        var post_data = {
            'g_id': gto,
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        };

        $.ajax({
            type: 'POST',
            url: urlget,
            data: post_data,
            dataType: 'json',
            success:  function(response){

                var len = response.length;

                if(len > 0) {
                    // Read values
                    var tqty = response[0].totalqty;
                    //     alert(uname);
                    $('#tototalqty').val(tqty);
                }

                // $('[name="product_code"]').val("");
                // alert(data);



            },
            error: function(data){

                // $('[name="product_code"]').val("");
                alert("failed");

            },
        });
    }
    $(function () {
        godownchange(); //this calls it on load
        godownchangeto();
        $("#transfer_from").change(godownchange);
        $("#transfer_to").change(godownchangeto);
    });
</script>