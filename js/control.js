var myTimeOut;
function poll(){
   myTimeOut = setTimeout(function(){
        updateDevices();
   }, 5000);
}
function updateDevices() {
      $.getJSON("/includes/device_json.php", function(data) {
          $.each(data, function(i, device) {
              if(device.deviceState.on == true) {
                  var dev_val = "on";
                  var percent = Math.round(device.deviceState.bri / 2.55);
              }else{
                  var dev_val = "off";
                  var percent = '0';
              }
              //update each device
              updateProgress(percent, device.id, dev_val)
           });
           //Setup the next poll recursively
           poll();
       });
}
function updateProgress(percent, dev_id, dev_val){
    if(dev_val == "on") {
        $('#one' + dev_id).removeClass('glyphicon-dot-off').addClass('glyphicon-dot-on');
    }else{
        $('#one' + dev_id).removeClass('glyphicon-dot-on').addClass('glyphicon-dot-off');
    }
    if(percent > 100) percent = 100;
    $('#prog' + dev_id).css('width', percent+'%');
    $('#prog' + dev_id).html(percent+'%');
}
$(document).ready(function () {
  $(".sl").slider({
    formatter: function(value) {
      return 'Dim set to ' + value + '%';
    },
    tooltip_position:'bottom'
  });
  $( ".btn" ).hover(function() {
      clearTimeout(myTimeOut);
    }, function() {
      poll();
    }
  );
  if( !/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    $(".bridgeupdatestate, .state").tooltip();
  }
  $(".bridgeupdatestate, .state").click(function() {
    var buttonClass = $(this).attr("class");
    var arrayClass = buttonClass.split(' ');
    var dev_id = $(this).closest("form").attr('id');
    var dev_val = $(this).val();
    var dev_per = $('#ps' + dev_id).attr('value');
    var data = '{"on":';
    if(dev_val == "off") {
      percent = 0;
      data += 'false';
    }else{
      percent = dev_per;
      data += 'true';
      if(dev_per < 100) {
        data += ', "bri":' + Math.round(2.55 * dev_per);
      }
    }
    data += '}';
    $.ajax({
      type: 'POST',
      dataType: 'json',
      url: 'http://' + SN + ':' + port + '/api/c/lights/' + dev_id + '/' + arrayClass[0],
      headers: {"X-HTTP-Method-Override": "PUT"},
      data: data,
      success : updateProgress(percent, dev_id, dev_val)
    });
    return false;
  });
  $('.sl').on("change", function() {
      var my_id = $(this).closest("form").attr('id');
      var level = $(this).val();
      $('#ps' + my_id).val(level);
  });
  poll();
});
