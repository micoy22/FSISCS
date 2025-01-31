(function($){$.fn.html5form=function(options){$(this).each(function(){var defaults={async:true,method:$(this).attr('method'),responseDiv:null,labels:'show',colorOn:'#000000',colorOff:'#a1a1a1',action:$(this).attr('action'),messages:false,emptyMessage:false,emailMessage:false,allBrowsers:false};var opts=$.extend({},defaults,options);if(!opts.allBrowsers){if($.browser.webkit&&parseInt($.browser.version)>=533){return false;}
if($.browser.mozilla&&parseInt($.browser.version)>=2){return false;}}
var form=$(this);var required=new Array();var email=new Array();function fillInput(input){if(input.attr('placeholder')&&input.attr('type')!='password'){input.val(input.attr('placeholder'));input.css('color',opts.colorOff);if($.browser.mozilla){input.css('-moz-box-shadow','none');}}else{if(!input.data('value')){if(input.val()!=''){input.data('value',input.val());}}else{input.val(input.data('value'));}
input.css('color',opts.colorOn);}}
if(opts.labels=='hide'){$(this).find('label').hide();}
$.each($('select',this),function(){$(this).css('color',opts.colorOff);$(this).change(function(){$(this).css('color',opts.colorOn);});});$.each($(':input:visible:not(:button, :submit, :radio, :checkbox, select)',form),function(i){fillInput($(this));if(this.getAttribute('required')!=null){required[i]=$(this);}
if(this.getAttribute('type')=='email'){email[i]=$(this);}
$(this).bind('focus',function(ev){ev.preventDefault();if(this.value==$(this).attr('placeholder')){if(this.getAttribute('type')!='url'){$(this).attr('value','');}}
$(this).css('color',opts.colorOn);});$(this).bind('blur',function(ev){ev.preventDefault();if(this.value==''){fillInput($(this));}
else{if((this.getAttribute('type')=='url')&&($(this).val()==$(this).attr('placeholder'))){fillInput($(this));}}});$('textarea').filter(this).each(function(){if($(this).attr('maxlength')>0){$(this).keypress(function(ev){var cc=ev.charCode||ev.keyCode;if(cc==37||cc==39){return true;}
if(cc==8||cc==46){return true;}
if(this.value.length>=$(this).attr('maxlength')){return false;}
else{return true;}});}});});$.each($(':submit',this),function(){$(this).bind('click',function(ev){var emptyInput=null;var emailError=null;var input=$(':input:visible:not(:button, :submit, :radio, :checkbox, select)',form);$(required).each(function(key,value){if(value==undefined){return true;}
if(($(this).val()==$(this).attr('placeholder'))||($(this).val()=='')){emptyInput=$(this);if(opts.emptyMessage){$(opts.responseDiv).html('<p>'+opts.emptyMessage+'</p>');}
else if(opts.messages=='es'){$(opts.responseDiv).html('<p>El campo '+$(this).attr('title')+' es requerido.</p>');}
else if(opts.messages=='en'){$(opts.responseDiv).html('<p>The '+$(this).attr('title')+' field is required.</p>');}
else if(opts.messages=='it'){$(opts.responseDiv).html('<p>Il campo '+$(this).attr('title')+' é richiesto.</p>');}
else if(opts.messages=='de'){$(opts.responseDiv).html('<p>'+$(this).attr('title')+' ist ein Pflichtfeld.</p>');}
else if(opts.messages=='fr'){$(opts.responseDiv).html('<p>Le champ '+$(this).attr('title')+' est requis.</p>');}
else if(opts.messages=='nl'||opts.messages=='be'){$(opts.responseDiv).html('<p>'+$(this).attr('title')+' is een verplicht veld.</p>');}
return false;}
return emptyInput;});$(email).each(function(key,value){if(value==undefined){return true;}
if($(this).val().search(/[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/i)){emailError=$(this);return false;}
return emailError;});if(!emptyInput&&!emailError){$(input).each(function(){if($(this).val()==$(this).attr('placeholder')){$(this).val('');}});if(opts.async){var formData=$(form).serialize();$.ajax({url:opts.action,type:opts.method,data:formData,success:function(data){if(opts.responseDiv){$(opts.responseDiv).html(data);}
$(input).val('');$.each(form[0],function(){fillInput($(this).not(':hidden, :button, :submit, :radio, :checkbox, select'));$('select',form).each(function(){$(this).css('color',opts.colorOff);$(this).children('option:eq(0)').attr('selected','selected');});$(':radio, :checkbox',form).removeAttr('checked');});}});}
else{$(form).submit();}}else{if(emptyInput){$(emptyInput).focus().select();}
else if(emailError){if(opts.emailMessage){$(opts.responseDiv).html('<p>'+opts.emailMessage+'</p>');}
else if(opts.messages=='es'){$(opts.responseDiv).html('<p>Ingrese una dirección de correo válida por favor.</p>');}
else if(opts.messages=='en'){$(opts.responseDiv).html('<p>Please type a valid email address.</p>');}
else if(opts.messages=='it'){$(opts.responseDiv).html("<p>L'indirizzo e-mail non é valido.</p>");}
else if(opts.messages=='de'){$(opts.responseDiv).html("<p>Bitte eine gültige E-Mail-Adresse eintragen.</p>");}
else if(opts.messages=='fr'){$(opts.responseDiv).html("<p>Entrez une adresse email valide s’il vous plait.</p>");}
else if(opts.messages=='nl'||opts.messages=='be'){$(opts.responseDiv).html('<p>Voert u alstublieft een geldig email adres in.</p>');}
$(emailError).select();}else{alert('Unknown Error');}}
return false;});});});}})(jQuery);