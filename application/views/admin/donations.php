<?php if ($this->uri->segment(3) == 'detail'): ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Donatipon Detail Management')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-6">
            <h2 class="no-margin"><i class="fa fa-bars"></i> Donation <strong>Detail</strong></h2>
        </div>
        <div class="col-md-6 text-right">
            <a href="<?= site_url(ADMIN . '/donations'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
        </div>
    </div>
    <div>
        <hr>
        <div class="row col-md-12">
            <h2>User Details</h2>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Order Number</th>
                        <td><?= num_size($row->id);?></td>
                        
                        <th>Status</th>
                        <td><?= get_order_status_label($row->order_status);?></td>
                    </tr>
                    <tr>
                        <th>First Name</th>
                        <td><b><?= ($row->fname) ?></b></td>
                        <th>Last Name</th>
                        <td><?= ($row->lname);?></td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td><b><?= ($row->phone) ?></b></td>
                        <th>Email</th>
                        <td><?= ($row->email )?></td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td><b><?= ($row->country) ?></b></td>
                        <th>City</th>
                        <td><?= ($row->city )?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><?= $row->address ?></td>
                        <th>Order Date</th>
                        <td><?= format_date($row->order_date, 'M d, Y h:i:s a');?></td>
                    <tr>
                    
                </tbody>
            </table>


           
            <hr class="hr-short">
            <h2>Package Detail</h2>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>No of Views</th>
                        <td><?= $row->no_of_views;?></td>
                        
                        <th>Price</th>
                        <td><?= $row->total_price;?></td>
                    </tr>
                </tbody>
            </table>
            <hr class="hr-short">
            <h2>Channel Detail</h2>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Channel Name</th>
                        <td><?= $row->channel_name;?></td>
                        
                        <th>Channel Link</th>
                        <td><?= $row->channel_url;?></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <br>
            <form action=""  role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        
                        <label class="control-label">Old Subscribers</label>
                        <input type="text" class="form-control" name="old_subs" value="<?=$row->old_subs?>">
                        <label class="control-label">New Added Subscribers <?=($row->new_subs==null || $row->new_subs == '') ? 0 : $row->new_subs?>/<?=$row->no_of_views?></label>
                        <input type="text" class="form-control" name="new_subs" value="<?=$row->new_subs?>">

                        <label class="control-label"> Status</label>
                        <select name="order_status" id="order_status" class="form-control">
                            <?php
                                foreach (order_status() as $index => $val) :
                                    if($index == 0)
                                        continue;
                            ?>
                                <option value="<?= $index ?>" <?= $row->order_status == $index ? 'selected' : '' ?>><?= ucfirst($val) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label class="control-label">Add Note</label>
                        <textarea class="form-control" rows="4" name="order_note"><?= isset($row->order_note) ?  $row->order_note : '' ?></textarea>
                    </div>
                    
                    <div class="col-md-4"></div>
                    <!-- <div class="col-md-9">
                        <label class="control-label" for="shipping_msg"> Shipping Message</label>
                        <input type="text" name="shipping_msg" id="shipping_msg" value="<?php if (isset($row->shipping_msg)) echo $row->shipping_msg; ?>" class="form-control">
                    </div> -->
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">     
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Save Status</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php else: ?>
    <?= showMsg(); ?>
    <?= getBredcrum(ADMIN, array('#' => 'Donations Management')); ?>
    <div class="row margin-bottom-10">
        <div class="col-md-12">
            <h2 class="no-margin"><i class="entypo-list"></i> Manage Donations</h2>
        </div>
    </div>
    <table class="table table-bordered datatable" id="table-1">
        <thead>
            <tr>
                <th width="5%" class="text-center">Sr#</th>
                <th width="8%" class="text-center">Donation ID</th>
                <th width="20%">Name, Email, Phone</th>
                <th>Address</th>
                <th>Amount</th>
                <th>Transction ID</th>
                <th width="12%">Payment Status</th>
                <th width="12%">Donation Time</th>
                <!-- <th width="12%" class="text-center">Detail</th> -->
            </tr>
        </thead>
        <tbody>
            <?php if (count($rows) > 0): $count = 0; ?>
                <?php foreach ($rows as $row): ?>
                    <tr class="odd gradeX">
                        <td class="text-center"><?= ++$count; ?></td>
                        <td class="text-center"><?= num_size($row->id); ?></td>
                        <td><b><?= $row->name?></b><br/><b><?= $row->email?></b><br/><b><?= $row->phone?></b></td>
                        <td><b><?= get_country_name_by_id($row->country)?></b><br/><b><?= $row->state?></b><br/><b><?= $row->city?></b><br/><b><?= $row->zipcode?></b></td>
                        <td><b><?= $row->payment_method=='credit-card'?'Credit Card' : 'Paypal'?></b></br>$<?= $row->amount?></td>
                        <td><?= $row->trxn_id?></td>
                        <td><span class="badge green">paid</span></td>
                        <td><?= format_date($row->created_at,'M d, Y h:i:s a'); ?></td>
                        <!-- <td class="text-center">
                            <a href="<?= site_url(ADMIN.'/donations/detail/'.$row->id); ?>" class="btn btn-primary btn-sm">View</a>
                        </td> -->
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>
<script type="text/javascript">
    (function($){
        $(function(){

        })
    }(jQuery))
</script>