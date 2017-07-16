<?php
function deviceLoop($ha_devices) {
        for($x = 0; $x <= count($ha_devices) - 1; $x++) {
        $dev_level = (is_numeric($ha_devices[$x]["deviceState"]["bri"])) ? round(($ha_devices[$x]["deviceState"]["bri"] / 255)*100) : 0;
        $bar_level = ($ha_devices[$x]["deviceState"]["on"] == 1) ? round(($ha_devices[$x]["deviceState"]["bri"] / 255)*100) : 0 ;
        $output .= "\t<form class=\"form-inline\" id=\"" . $ha_devices[$x]["id"] . "\">\n";
        $output .= "\t\t<div class=\"col-xs-12 col-sm-6 col-md-4 col-lg-4\">\n";
                $output .= "\t\t\t<div class=\"panel panel-default clearfix\">\n";
                    $output .= "\t\t\t\t<div class=\"panel-heading clearfix\">\n";
                        $output .= "\t\t\t\t\t<div class=\"col-md-12 col-lg-12\">\n";
                                $output .= "\t\t\t\t\t\t<div class=\"hideOverflow\">";
                                $output .= ($ha_devices[$x]["deviceState"]["on"] == 1) ?  "<span class=\"glyphicon glyphicon-dot-on\" id=\"one" . $ha_devices[$x]["id"] . "\"></span>" : "<span class=\"glyphicon glyphicon-dot-off\" id=\"one" . $ha_devices[$x]["id"] . "\"></span>";
                                $output .= "&nbsp;" . str_replace(". ", ".", ucwords(str_replace(".", ". ", $ha_devices[$x]["name"]))) . "</div>\n";
                        $output .= "\t\t\t\t\t</div>\n";
                    $output .= "\t\t\t\t</div>\n";
                    $output .= "\t\t\t\t<div class=\"panel-body row-fluid\">\n";
                        $output .= "\t\t\t\t\t<div class=\"col-sm-12 col-md-5 col-lg-4 clearfix\">\n";
                                $output .= "\t\t\t\t\t\t<div class=\"btn-group-xs pull-left\">\n";
                                        $output .= "\t\t\t\t\t\t\t<button type=\"submit\" class=\"state btn btn-xs btn-success\" name=\"action\" value=\"on\" title=\"Turn ON\"><span class=\"glyphicon glyphicon-off\" aria-hidden=\"true\"></span></button>\n";
                                        $output .= "\t\t\t\t\t\t\t<button type=\"submit\" class=\"state btn btn-xs btn-danger\" name=\"action\" value=\"off\" title=\"Turn OFF\"><span class=\"glyphicon glyphicon-off\" aria-hidden=\"true\"></span></button>\n";
                                $output .= "\t\t\t\t\t\t</div>\n";
                                $output .= "\t\t\t\t\t\t<div class=\"btn-group-xs pull-left\">\n";
                                        $output .= "\t\t\t\t\t\t\t<button type=\"submit\" class=\"bridgeupdatestate btn btn-xs btn-success\" name=\"action\" value=\"on\" data-placement=\"bottom\" title=\"Update to ON\"><span class=\"glyphicon glyphicon-wrench\" aria-hidden=\"true\"></span></button>\n";
                                        $output .= "\t\t\t\t\t\t\t<button type=\"submit\" class=\"bridgeupdatestate btn btn-xs btn-danger\" name=\"action\" value=\"off\" data-placement=\"bottom\" title=\"Update to OFF\"><span class=\"glyphicon glyphicon-wrench\" aria-hidden=\"true\"></span></button>\n";
                                $output .= "\t\t\t\t\t\t</div>\n";
                        $output .= "\t\t\t\t\t</div>\n";
                        $output .= "\t\t\t\t\t<div class=\"col-sm-12 col-md-7 col-lg-8\">\n";
                                $output .= "\t\t\t\t\t\t<div class=\"progress\">\n";
                                        $output .= "\t\t\t\t\t\t\t<div class=\"progress-bar progress-bar-success progress-bar-striped\" id=\"prog" . $ha_devices[$x]["id"] . "\" role=\"progressbar\" aria-valuenow=\"" . $bar_level . "\" ";
                                        $output .= "aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:" . $bar_level . "%\">";
                                        $output .= $bar_level . "%</div>\n";
                                $output .= "\t\t\t\t\t\t</div>\n";
                                $output .= "\t\t\t\t\t\t<div class=\"min-height\">\n";
                                        $output .= "\t\t\t\t\t\t\t<input class=\"";
                                        $output .= ((strpos($ha_devices[$ha_val]["onUrl"],"percent") > 0)||(($ha_devices[$x]["dimUrl"])&&($ha_devices[$x]["dimUrl"] != "[]"))) ? "sl" : "slhidden";
                                        $output .= "\" id=\"sl" . $ha_devices[$x]["id"] . "\" type=\"";
                                        $output .= ((strpos($ha_devices[$ha_val]["onUrl"],"percent") > 0)||(($ha_devices[$x]["dimUrl"])&&($ha_devices[$x]["dimUrl"] != "[]"))) ? "hidden" : "hidden";
                                        $output .= "\" min=\"1\" max=\"100\" step=\"1\" data-slider-min=\"1\" data-slider-max=\"100\" data-slider-step=\"1\" data-slider-value=\"";
                                        $output .= (($dev_level < 100) && ($dev_level != 0)) ? $dev_level : "100";
                                        $output .= "\" />\n";
                                $output .= "\t\t\t\t\t\t</div>\n";
                        $output .= "\t\t\t\t\t</div>\n";
                    $output .= "\t\t\t\t</div>\n";
                $output .= "\t\t\t</div>\n";
        $output .= "\t\t</div>\n";
        $output .= "\t<input type=\"hidden\" id=\"ps" . $ha_devices[$x]["id"] . "\" value=\"";
        $output .= (($dev_level < 100) && ($dev_level != 0)) ? $dev_level : "100";
        $output .= "\" />\n";
        $output .= "\t</form>\n";
        }
        return $output;
}                                     
function controls($SN, $fields, $field, $sorts, $sort) {
        $output = "";
        $output .= "\t<form class=\"form form-inline\">\n";
            $output .= "\t\t<nav class=\"navbar fixed-top navbar-inverse bg-inverse\">\n";
                $output .= "\t\t\t<div class=\"col\">\n";
                    $output .= "\t\t\t\t<div class=\"col-xs-9 col-sm-4 col-md-4\">\n";
                        $output .= "\t\t\t\t\t<a class=\"navbar-brand\" title=\"Go to HA Bridge\" href=\"http://" . $SN . "\">HA&nbsp;Bridge&nbsp;Control</a>\n";
                    $output .= "\t\t\t\t</div>\n";
                    $output .= "\t\t\t\t<div class=\"col-xs-3 col-sm-2 col-md-2 pull-right\">\n";
                        $output .= "\t\t\t\t\t<ul class=\"nav navbar-nav navbar-right\">\n\t\t\t\t\t\t<li class=\"text-right\"><a href=\"?logout=true\" title=\"Logout of HA Bridge Control\"><span class=\"hidden-xs\">&nbsp;Logout&nbsp;</span><span class=\"glyphicon glyphicon-log-out\"></span></a></li>\n\t\t\t\t\t</ul>\n";
                    $output .= "\t\t\t\t</div>\n";
                    $output .= "\t\t\t\t<div class=\"clearfix visible-xs\"></div>\n";
                    $output .= "\t\t\t\t<div class=\"col-xs-12 col-sm-6 col-md-6\">\n";
                        $output .= "\t\t\t\t\t<select class=\"selectpicker form-control\" id=\"field\" name=\"field\">\n";
                        foreach($fields as $value) {
                                $output .= "\t\t\t\t\t\t\t\t\t<option";
                                $output .= ($field == $value) ? " selected" : "" ;
                                $output .= ">" . $value . "</option>\n";
                        }
                        $output .= "\t\t\t\t\t</select>\n";
                        $output .= "\t\t\t\t\t<select class=\"selectpicker form-control\" id=\"sort\" name=\"sort\">\n";
                        foreach($sorts as $value) {
                                $output .= "\t\t\t\t\t\t\t\t\t<option";
                                $output .= (str_replace("SORT_", "", $sort) == $value) ? " selected" : "" ;
                                $output .= ">" . $value . "</option>\n";
                        }
                        $output .= "\t\t\t\t\t</select>\n";
                        $output .= "\t\t\t\t\t<button type=\"submit\" class=\"btn btn-default navbar-btn\">Go</button>\n";
                    $output .= "\t\t\t\t</div>\n";
                $output .= "\t\t\t</div>\n";
            $output .= "\t\t</nav>\n";
        $output .= "\t</form>\n";
        return $output;
}
?>