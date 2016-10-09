$('[data-toggle="tooltip"]').tooltip();
$(".act").click(function() {
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
    url: 'http://' + SN + ':' + port + '/api/c/lights/' + dev_id + '/state',
    headers: {"X-HTTP-Method-Override": "PUT"},
    data: data,
    success : updateProgress(percent, dev_id)
  });
  return false;
});
$(".upd").click(function() {
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
    url: 'http://' + SN + ':' + port + '/api/c/lights/' + dev_id + '/bridgeupdatestate',
    headers: {"X-HTTP-Method-Override": "PUT"},
    data: data,
    success : updateProgress(percent, dev_id)
  });
  return false;
});
$('.sl').on("change", function() {
    var my_id = $(this).closest("form").attr('id');
    var level = $(this).val();
    $('#ps' + my_id).val(level);
    $('#l' + my_id).html(level + '%').fadeIn( 400 ).delay( 800 ).fadeOut( 400 ); 
});
function updateProgress(percent, dev_id){
    if(percent > 100) percent = 100;
    $('#prog' + dev_id).css('width', percent+'%');
    $('#prog' + dev_id).html(percent+'%');
    if(percent == 0) {
        $('#sl' + dev_id).prop("value", "100");
        $('#ps' + dev_id).val('100');
    }
}