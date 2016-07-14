<div class="block search">
                    <form id="top-search" action="<?php echo base_url().'room/search'?>">
                        <div class="col-md-4 col-sm-12">
                            <input type="text" name="location" id="location" class="form-control" placeholder="<?php echo lang('home_reach_your_destination')?>" value="<?php echo isset($location)?$location:''?>" />
                        </div>
                        <script language="JavaScript" type="text/javascript">
                        $(document).ready(function($){
                                  $( "#location" ).autocomplete({
                                    minLength: 2,
                                    source: function( request, response ) {
                                        $.ajax({
                                            url: "<?php echo base_url().'home/process'?>",
                                            data: { query: request.term},
                                            type: "POST",
                                            success: function(data){
                                                console.log(data);
                                                response(data);
                                            },
                                            error: function(jqXHR, textStatus, errorThrown){
//                                                alert("error handler!");                        
                                            },
                                          dataType: 'json'
                                        });
                                    }
                                });
                        });

                            </script>
                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <input type="text" name="checkin" value="<?php echo isset($checkin)?$checkin:''?>" id="checkin" class="form-control input-lg form-control-icon icon-calendar hasDatepicker" placeholder="<?php echo lang('home_checkin');?>"/>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <input type="text" name="checkout" value= '<?php echo isset($checkout)?$checkout:''?>' id="checkout" class="form-control input-lg form-control-icon icon-calendar hasDatepicker" placeholder="<?php echo lang('home_checkout')?>" />
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <input type="text" name="guest" id="guest" value = "<?php echo isset($guest)?$guest:''?>" class="form-control" placeholder="<?php echo lang('home_guest')?>"/>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <!--<input type="submit" name="search" id="action-search" class="btn btn-primary" value="Tìm kiếm" />-->
                            <button data-tloc="Search" data-tkey="Search" class="btn btn-primary btn-lg btn-block tclick" id="search-button"><?php echo lang('home_search')?></button>
                        </div>
                        <div class="clear"></div>
                    </form>
                    
                </div>
<script language="JavaScript" type="text/javascript">
$(document).ready(function($){
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    var checkin = $('#checkin');
    var checkout = $('#checkout');
    checkin.datepicker({
        onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        },
            format: 'dd/mm/yyyy',
            startDate:now
      }).on('changeDate', function(ev) {
        var newDate;
        if (ev.date.valueOf() > checkout.val()) {
            newDate  = new Date(ev.date)
            newDate.setDate(newDate.getDate() );
        }
        checkout.datepicker('setStartDate',newDate);
        checkin.datepicker('hide');
        $('#checkout')[0].focus();
    }).data('datepicker');
    checkout.datepicker({
    onRender: function(date) {
        return date.valueOf() <= checkin.val() ? 'disabled' : '';
    },
    format: 'dd/mm/yyyy',
    startDate:now
    }).on('changeDate', function(ev) {
        checkout.datepicker('hide');
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() );
    }).data('datepicker');
})
 </script>