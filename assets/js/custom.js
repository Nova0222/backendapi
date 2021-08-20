$(document).ready(function() {
	
	// enable fileuploader plugin
	$('input[name="files"]').fileuploader({
        addMore: true
    });
	
});

$(document).ready(function() {
  $.uploadPreview({
    input_field: "#image-upload",   // Default: .image-upload
    preview_box: "#image-preview",  // Default: .image-preview
    label_field: "#image-label",    // Default: .image-label
    label_default: "Choose File",   // Default: Choose File
    label_selected: "Change File",  // Default: Change File
    no_label: false                 // Default: false
  });
});

$(document).ready(function()
{
 $(".city").change(function()
 {
  var city_id=$(this).val();
  var dataString = 'city_id='+ city_id;
 
  $.ajax
  ({
   type: "POST",
   url: "get_zones.php",
   data: dataString,
   cache: false,
   success: function(html)
   {
      $(".zone").html(html);
   } 
   });
  });
 
});

  function checkAgentEmailAvailability() {
jQuery.ajax({
url: "../controller/check_agent_email.php",
data:'agent_email='+$("#agent_email").val(),
type: "POST",
success:function(data){
$("#email-availability-status").html(data);
},
error:function (){}
});
}

  function checkStatusSlugAvailability() {
jQuery.ajax({
url: "../controller/check_status_slug.php",
data:'tr_slug='+$("#tr_slug").val(),
type: "POST",
success:function(data){
$("#slug-availability-status").html(data);
},
error:function (){}
});
}

  function checkTypeSlugAvailability() {
jQuery.ajax({
url: "../controller/check_type_slug.php",
data:'tr_slug='+$("#tr_slug").val(),
type: "POST",
success:function(data){
$("#slug-availability-status").html(data);
},
error:function (){}
});
}

  $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

  function checkUsernameAvailability() {
jQuery.ajax({
url: "../controller/check_username.php",
data:'manager_username='+$("#manager_username").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
},
error:function (){}
});
}

  function checkEmailAvailability() {
jQuery.ajax({
url: "../controller/check_email.php",
data:'manager_email='+$("#manager_email").val(),
type: "POST",
success:function(data){
$("#email-availability-status").html(data);
},
error:function (){}
});
}

        $(document).ready(function(){
            $(".m_switch_check:checkbox").mSwitch({
                onRender:function(elem){
                    var entity = elem.attr("entity");
                    var label = elem.parent().parent().prev(".m_settings_label");
                    if (elem.val() == 0){
                        $.mSwitch.turnOff(elem);
                        label.html(entity + " <span class=\"m_red\">(Disable)</font>");
                    }else{
                        label.html(entity + " <span class=\"m_green\">(Enable)</font>");
                        $.mSwitch.turnOn(elem);
                    }
                },
                onRendered:function(elem){
                    /*console.log(elem);*/
                },
                onTurnOn:function(elem){
                    var entity = elem.attr("entity");
                    var label = elem.parent().parent().prev(".m_settings_label");
                    if (elem.val() == "0"){
                        elem.val("1");
                        label.html(entity + " <span class=\"m_green\">(Enable)</font>");
                    }else{
                        label.html(entity + " <span class=\"m_red\">(Error)</font>");
                    }
                },
                onTurnOff:function(elem){
                    var entity = elem.attr("entity");
                    var label = elem.parent().parent().prev(".m_settings_label");
                    if (elem.val() == 1){
                        elem.val("0");
                        label.html(entity + " <span class=\"m_red\">(Disable)</font>");
                    }else{
                        label.html(entity + " <span class=\"m_red\">(Error)</font>");
                    }
                }
            });
        });