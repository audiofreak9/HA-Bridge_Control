        <form class="form-inline" id="<?php echo $ha_devices[$x]["id"]; ?>">
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="panel panel-info clearfix">
                        <div class="panel-heading clearfix">
                                <div class="col-md-8 col-lg-8 pull-left"><div class="hideOverflow"><?php echo str_replace(". ", ".", ucwords(str_replace(".", ". ", $ha_devices[$x]["name"]))); ?></div></div>
                                <div class="col-md-4 col-lg-4 pull-right"><span class="badge l" id="l<?php echo $ha_devices[$x]["id"]; ?>"><?php echo $dev_level . '%'; ?></span></div>
                        </div>
                        <div class="panel-body row-fluid">
                                <div class="col-sm-12 col-md-5 col-lg-4 clearfix">
                                        <div class="btn-group-xs pull-left">
                                                <button type="submit" class="act btn btn-xs btn-success" name="action" value="on"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></button>
                                                <button type="submit" class="act btn btn-xs btn-danger" name="action" value="off"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></button>
                                        </div>
                                        <div class="btn-group-xs pull-left">
                                                <button type="submit" class="upd btn btn-xs btn-success" name="action" value="on"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></button>
                                                <button type="submit" class="upd btn btn-xs btn-danger" name="action" value="off"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></button>
                                        </div>
                                </div>
                                <div class="col-sm-12 col-md-7 col-lg-8">
                                        <div class="progress">
                                                <div class="progress-bar progress-bar-success progress-bar-striped" id="prog<?php echo $ha_devices[$x]["id"]; ?>" role="progressbar" aria-valuenow="<?php echo $dev_level; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $dev_level; ?>%">
                                                              <?php echo $dev_level . '%'; ?>
                                                </div>
                                        </div>
                                        <div class="min-height">
                                                <input class="sl" id="sl<?php echo $ha_devices[$x]["id"]; ?>" type="<?php echo ((strpos($ha_devices[$ha_val]["onUrl"],"percent") > 0)||($ha_devices[$x]["dimUrl"]))? "range" : "hidden" ; ?>" min="1" max="100" step="1" value="<?php echo (($dev_level < 100) && ($dev_level != 0)) ? $dev_level : "100"; ?>" />
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        <input type="hidden" id="ps<?php echo $ha_devices[$x]["id"]; ?>" value="<?php echo (($dev_level < 100) && ($dev_level != 0)) ? $dev_level : "100"; ?>" />
        </form>