(function(d){d.prettyPhoto={version:"3.1.2"};d.fn.prettyPhoto=function(f){f=jQuery.extend({animation_speed:"fast",slideshow:5000,autoplay_slideshow:false,opacity:0.8,show_title:true,allow_resize:true,default_width:500,default_height:344,counter_separator_label:"/",theme:"pp_default",horizontal_padding:20,hideflash:false,wmode:"opaque",autoplay:true,modal:false,deeplinking:true,overlay_gallery:true,keyboard_shortcuts:true,changepicturecallback:function(){},callback:function(){},ie6_fallback:true,markup:'<div class="pp_pic_holder"><div class="ppt">&nbsp;</div><div class="pp_top"><div class="pp_left"></div><div class="pp_middle"></div><div class="pp_right"></div></div><div class="pp_content_container"><div class="pp_left"><div class="pp_right"><div class="pp_content"><div class="pp_loaderIcon"></div><div class="pp_fade"><a href="#" class="pp_expand" title="Expand the image">Expand</a><div class="pp_hoverContainer"><a class="pp_next" href="#">next</a><a class="pp_previous" href="#">previous</a></div><div id="pp_full_res"></div><div class="pp_details"><div class="pp_nav"><a href="#" class="pp_arrow_previous">Previous</a><p class="currentTextHolder">0/0</p><a href="#" class="pp_arrow_next">Next</a></div><p class="pp_description"></p>{pp_social}<a class="pp_close" href="#">Close</a></div></div></div></div></div></div><div class="pp_bottom"><div class="pp_left"></div><div class="pp_middle"></div><div class="pp_right"></div></div></div><div class="pp_overlay"></div>',gallery_markup:'<div class="pp_gallery"><a href="#" class="pp_arrow_previous">Previous</a><div><ul>{gallery}</ul></div><a href="#" class="pp_arrow_next">Next</a></div>',image_markup:'<img id="fullResImage" src="{path}" />',flash_markup:'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{width}" height="{height}"><param name="wmode" value="{wmode}" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="{path}" /><embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="{width}" height="{height}" wmode="{wmode}"></embed></object>',quicktime_markup:'<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" height="{height}" width="{width}"><param name="src" value="{path}"><param name="autoplay" value="{autoplay}"><param name="type" value="video/quicktime"><embed src="{path}" height="{height}" width="{width}" autoplay="{autoplay}" type="video/quicktime" pluginspage="http://www.apple.com/quicktime/download/"></embed></object>',iframe_markup:'<iframe src ="{path}" width="{width}" height="{height}" frameborder="no"></iframe>',inline_markup:'<div class="pp_inline">{content}</div>',custom_markup:"",social_tools:'<div class="pp_social"><div class="twitter"><a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"><\/script></div><div class="facebook"><iframe src="http://www.facebook.com/plugins/like.php?locale=en_US&href='+location.href+'&amp;layout=button_count&amp;show_faces=true&amp;width=500&amp;action=like&amp;font&amp;colorscheme=light&amp;height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:500px; height:23px;" allowTransparency="true"></iframe></div></div>'},f);var m=this,l=false,s,q,r,t,w,x,h=d(window).height(),A=d(window).width(),i;doresize=true,scroll_pos=y();d(window).unbind("resize.prettyphoto").bind("resize.prettyphoto",function(){p();v()});if(f.keyboard_shortcuts){d(document).unbind("keydown.prettyphoto").bind("keydown.prettyphoto",function(B){if(typeof $pp_pic_holder!="undefined"){if($pp_pic_holder.is(":visible")){switch(B.keyCode){case 37:d.prettyPhoto.changePage("previous");B.preventDefault();break;case 39:d.prettyPhoto.changePage("next");B.preventDefault();break;case 27:if(!settings.modal){d.prettyPhoto.close()}B.preventDefault();break}}}})}d.prettyPhoto.initialize=function(){settings=f;if(settings.theme=="pp_default"){settings.horizontal_padding=16}if(settings.ie6_fallback&&d.browser.msie&&parseInt(d.browser.version)==6){settings.theme="light_square"}theRel=d(this).attr("rel");galleryRegExp=/\[(?:.*)\]/;isSet=(galleryRegExp.exec(theRel))?true:false;pp_images=(isSet)?jQuery.map(m,function(C,B){if(d(C).attr("rel").indexOf(theRel)!=-1){return d(C).attr("href")}}):d.makeArray(d(this).attr("href"));pp_titles=(isSet)?jQuery.map(m,function(C,B){if(d(C).attr("rel").indexOf(theRel)!=-1){return(d(C).find("img").attr("alt"))?d(C).find("img").attr("alt"):""}}):d.makeArray(d(this).find("img").attr("alt"));pp_descriptions=(isSet)?jQuery.map(m,function(C,B){if(d(C).attr("rel").indexOf(theRel)!=-1){return(d(C).attr("title"))?d(C).attr("title"):""}}):d.makeArray(d(this).attr("title"));set_position=jQuery.inArray(d(this).attr("href"),pp_images);rel_index=(isSet)?set_position:d("a[rel^='"+theRel+"']").index(d(this));g(this);if(settings.allow_resize){d(window).bind("scroll.prettyphoto",function(){p()})}d.prettyPhoto.open();return false};d.prettyPhoto.open=function(B){if(typeof settings=="undefined"){settings=f;if(d.browser.msie&&d.browser.version==6){settings.theme="light_square"}pp_images=d.makeArray(arguments[0]);pp_titles=(arguments[1])?d.makeArray(arguments[1]):d.makeArray("");pp_descriptions=(arguments[2])?d.makeArray(arguments[2]):d.makeArray("");isSet=(pp_images.length>1)?true:false;set_position=0;g(B.target)}if(d.browser.msie&&d.browser.version==6){d("select").css("visibility","hidden")}if(settings.hideflash){d("object,embed,iframe[src*=youtube],iframe[src*=vimeo]").css("visibility","hidden")}k(d(pp_images).size());d(".pp_loaderIcon").show();if($ppt.is(":hidden")){$ppt.css("opacity",0).show()}$pp_overlay.show().fadeTo(settings.animation_speed,settings.opacity);$pp_pic_holder.find(".currentTextHolder").text((set_position+1)+settings.counter_separator_label+d(pp_images).size());if(pp_descriptions[set_position]!=""){$pp_pic_holder.find(".pp_description").show().html(unescape(pp_descriptions[set_position]))}else{$pp_pic_holder.find(".pp_description").hide()}movie_width=(parseFloat(a("width",pp_images[set_position])))?a("width",pp_images[set_position]):settings.default_width.toString();movie_height=(parseFloat(a("height",pp_images[set_position])))?a("height",pp_images[set_position]):settings.default_height.toString();l=false;if(movie_height.indexOf("%")!=-1){movie_height=parseFloat((d(window).height()*parseFloat(movie_height)/100)-150);l=true}if(movie_width.indexOf("%")!=-1){movie_width=parseFloat((d(window).width()*parseFloat(movie_width)/100)-150);l=true}$pp_pic_holder.fadeIn(function(){(settings.show_title&&pp_titles[set_position]!=""&&typeof pp_titles[set_position]!="undefined")?$ppt.html(unescape(pp_titles[set_position])):$ppt.html("&nbsp;");imgPreloader="";skipInjection=false;switch(z(pp_images[set_position])){case"image":imgPreloader=new Image();nextImage=new Image();if(isSet&&set_position<d(pp_images).size()-1){nextImage.src=pp_images[set_position+1]}prevImage=new Image();if(isSet&&pp_images[set_position-1]){prevImage.src=pp_images[set_position-1]}$pp_pic_holder.find("#pp_full_res")[0].innerHTML=settings.image_markup.replace(/{path}/g,pp_images[set_position]);imgPreloader.onload=function(){s=o(imgPreloader.width,imgPreloader.height);j()};imgPreloader.onerror=function(){alert("Image cannot be loaded. Make sure the path is correct and image exist.");d.prettyPhoto.close()};imgPreloader.src=pp_images[set_position];break;case"youtube":s=o(movie_width,movie_height);movie="http://www.youtube.com/embed/"+a("v",pp_images[set_position]);(a("rel",pp_images[set_position]))?movie+="?rel="+a("rel",pp_images[set_position]):movie+="?rel=1";if(settings.autoplay){movie+="&autoplay=1"}toInject=settings.iframe_markup.replace(/{width}/g,s.width).replace(/{height}/g,s.height).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,movie);break;case"vimeo":s=o(movie_width,movie_height);movie_id=pp_images[set_position];var D=/http:\/\/(www\.)?vimeo.com\/(\d+)/;var C=movie_id.match(D);movie="http://player.vimeo.com/video/"+C[2]+"?title=0&amp;byline=0&amp;portrait=0";if(settings.autoplay){movie+="&autoplay=1;"}vimeo_width=s.width+"/embed/?moog_width="+s.width;toInject=settings.iframe_markup.replace(/{width}/g,vimeo_width).replace(/{height}/g,s.height).replace(/{path}/g,movie);break;case"quicktime":s=o(movie_width,movie_height);s.height+=15;s.contentHeight+=15;s.containerHeight+=15;toInject=settings.quicktime_markup.replace(/{width}/g,s.width).replace(/{height}/g,s.height).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,pp_images[set_position]).replace(/{autoplay}/g,settings.autoplay);break;case"flash":s=o(movie_width,movie_height);flash_vars=pp_images[set_position];flash_vars=flash_vars.substring(pp_images[set_position].indexOf("flashvars")+10,pp_images[set_position].length);filename=pp_images[set_position];filename=filename.substring(0,filename.indexOf("?"));toInject=settings.flash_markup.replace(/{width}/g,s.width).replace(/{height}/g,s.height).replace(/{wmode}/g,settings.wmode).replace(/{path}/g,filename+"?"+flash_vars);break;case"iframe":s=o(movie_width,movie_height);frame_url=pp_images[set_position];frame_url=frame_url.substr(0,frame_url.indexOf("iframe")-1);toInject=settings.iframe_markup.replace(/{width}/g,s.width).replace(/{height}/g,s.height).replace(/{path}/g,frame_url);break;case"ajax":doresize=false;s=o(movie_width,movie_height);doresize=true;skipInjection=true;d.get(pp_images[set_position],function(E){toInject=settings.inline_markup.replace(/{content}/g,E);$pp_pic_holder.find("#pp_full_res")[0].innerHTML=toInject;j()});break;case"custom":s=o(movie_width,movie_height);toInject=settings.custom_markup;break;case"inline":myClone=d(pp_images[set_position]).clone().append('<br clear="all" />').css({width:settings.default_width}).wrapInner('<div id="pp_full_res"><div class="pp_inline"></div></div>').appendTo(d("body")).show();doresize=false;s=o(d(myClone).width(),d(myClone).height());doresize=true;d(myClone).remove();toInject=settings.inline_markup.replace(/{content}/g,d(pp_images[set_position]).html());break}if(!imgPreloader&&!skipInjection){$pp_pic_holder.find("#pp_full_res")[0].innerHTML=toInject;j()}});return false};d.prettyPhoto.changePage=function(B){currentGalleryPage=0;if(B=="previous"){set_position--;if(set_position<0){set_position=d(pp_images).size()-1}}else{if(B=="next"){set_position++;if(set_position>d(pp_images).size()-1){set_position=0}}else{set_position=B}}rel_index=set_position;if(!doresize){doresize=true}d(".pp_contract").removeClass("pp_contract").addClass("pp_expand");n(function(){d.prettyPhoto.open()})};d.prettyPhoto.changeGalleryPage=function(B){if(B=="next"){currentGalleryPage++;if(currentGalleryPage>totalPage){currentGalleryPage=0}}else{if(B=="previous"){currentGalleryPage--;if(currentGalleryPage<0){currentGalleryPage=totalPage}}else{currentGalleryPage=B}}slide_speed=(B=="next"||B=="previous")?settings.animation_speed:0;slide_to=currentGalleryPage*(itemsPerPage*itemWidth);$pp_gallery.find("ul").animate({left:-slide_to},slide_speed)};d.prettyPhoto.startSlideshow=function(){if(typeof i=="undefined"){$pp_pic_holder.find(".pp_play").unbind("click").removeClass("pp_play").addClass("pp_pause").click(function(){d.prettyPhoto.stopSlideshow();return false});i=setInterval(d.prettyPhoto.startSlideshow,settings.slideshow)}else{d.prettyPhoto.changePage("next")}};d.prettyPhoto.stopSlideshow=function(){$pp_pic_holder.find(".pp_pause").unbind("click").removeClass("pp_pause").addClass("pp_play").click(function(){d.prettyPhoto.startSlideshow();return false});clearInterval(i);i=undefined};d.prettyPhoto.close=function(){if($pp_overlay.is(":animated")){return}d.prettyPhoto.stopSlideshow();$pp_pic_holder.stop().find("object,embed").css("visibility","hidden");d("div.pp_pic_holder,div.ppt,.pp_fade").fadeOut(settings.animation_speed,function(){d(this).remove()});$pp_overlay.fadeOut(settings.animation_speed,function(){if(d.browser.msie&&d.browser.version==6){d("select").css("visibility","visible")}if(settings.hideflash){d("object,embed,iframe[src*=youtube],iframe[src*=vimeo]").css("visibility","visible")}d(this).remove();d(window).unbind("scroll.prettyphoto");settings.callback();doresize=true;q=false;delete settings})};function j(){d(".pp_loaderIcon").hide();projectedTop=scroll_pos.scrollTop+((h/2)-(s.containerHeight/2));if(projectedTop<0){projectedTop=0}$ppt.fadeTo(settings.animation_speed,1);$pp_pic_holder.find(".pp_content").animate({height:s.contentHeight,width:s.contentWidth},settings.animation_speed);$pp_pic_holder.animate({top:projectedTop,left:(A/2)-(s.containerWidth/2),width:s.containerWidth},settings.animation_speed,function(){$pp_pic_holder.find(".pp_hoverContainer,#fullResImage").height(s.height).width(s.width);$pp_pic_holder.find(".pp_fade").fadeIn(settings.animation_speed);if(isSet&&z(pp_images[set_position])=="image"){$pp_pic_holder.find(".pp_hoverContainer").show()}else{$pp_pic_holder.find(".pp_hoverContainer").hide()}if(s.resized){d("a.pp_expand,a.pp_contract").show()}else{d("a.pp_expand").hide()}if(settings.autoplay_slideshow&&!i&&!q){d.prettyPhoto.startSlideshow()}if(settings.deeplinking){b()}settings.changepicturecallback();q=true});e()}function n(B){$pp_pic_holder.find("#pp_full_res object,#pp_full_res embed").css("visibility","hidden");$pp_pic_holder.find(".pp_fade").fadeOut(settings.animation_speed,function(){d(".pp_loaderIcon").show();B()})}function k(B){(B>1)?d(".pp_nav").show():d(".pp_nav").hide()}function o(C,B){resized=false;u(C,B);imageWidth=C,imageHeight=B;if(((x>A)||(w>h))&&doresize&&settings.allow_resize&&!l){resized=true,fitting=false;while(!fitting){if((x>A)){imageWidth=(A-200);imageHeight=(B/C)*imageWidth}else{if((w>h)){imageHeight=(h-200);imageWidth=(C/B)*imageHeight}else{fitting=true}}w=imageHeight,x=imageWidth}u(imageWidth,imageHeight);if((x>A)||(w>h)){o(x,w)}}return{width:Math.floor(imageWidth),height:Math.floor(imageHeight),containerHeight:Math.floor(w),containerWidth:Math.floor(x)+(settings.horizontal_padding*2),contentHeight:Math.floor(r),contentWidth:Math.floor(t),resized:resized}}function u(C,B){C=parseFloat(C);B=parseFloat(B);$pp_details=$pp_pic_holder.find(".pp_details");$pp_details.width(C);detailsHeight=parseFloat($pp_details.css("marginTop"))+parseFloat($pp_details.css("marginBottom"));$pp_details=$pp_details.clone().addClass(settings.theme).width(C).appendTo(d("body")).css({position:"absolute",top:-10000});detailsHeight+=$pp_details.height();detailsHeight=(detailsHeight<=34)?36:detailsHeight;if(d.browser.msie&&d.browser.version==7){detailsHeight+=8}$pp_details.remove();$pp_title=$pp_pic_holder.find(".ppt");$pp_title.width(C);titleHeight=parseFloat($pp_title.css("marginTop"))+parseFloat($pp_title.css("marginBottom"));$pp_title=$pp_title.clone().appendTo(d("body")).css({position:"absolute",top:-10000});titleHeight+=$pp_title.height();$pp_title.remove();r=B+detailsHeight;t=C;w=r+titleHeight+$pp_pic_holder.find(".pp_top").height()+$pp_pic_holder.find(".pp_bottom").height();x=C}function z(B){if(B.match(/youtube\.com\/watch/i)){return"youtube"}else{if(B.match(/vimeo\.com/i)){return"vimeo"}else{if(B.match(/\b.mov\b/i)){return"quicktime"}else{if(B.match(/\b.swf\b/i)){return"flash"}else{if(B.match(/\biframe=true\b/i)){return"iframe"}else{if(B.match(/\bajax=true\b/i)){return"ajax"}else{if(B.match(/\bcustom=true\b/i)){return"custom"}else{if(B.substr(0,1)=="#"){return"inline"}else{return"image"}}}}}}}}}function p(){if(doresize&&typeof $pp_pic_holder!="undefined"){scroll_pos=y();contentHeight=$pp_pic_holder.height(),contentwidth=$pp_pic_holder.width();projectedTop=(h/2)+scroll_pos.scrollTop-(contentHeight/2);if(projectedTop<0){projectedTop=0}if(contentHeight>h){return}$pp_pic_holder.css({top:projectedTop,left:(A/2)+scroll_pos.scrollLeft-(contentwidth/2)})}}function y(){if(self.pageYOffset){return{scrollTop:self.pageYOffset,scrollLeft:self.pageXOffset}}else{if(document.documentElement&&document.documentElement.scrollTop){return{scrollTop:document.documentElement.scrollTop,scrollLeft:document.documentElement.scrollLeft}}else{if(document.body){return{scrollTop:document.body.scrollTop,scrollLeft:document.body.scrollLeft}}}}}function v(){h=d(window).height(),A=d(window).width();if(typeof $pp_overlay!="undefined"){$pp_overlay.height(d(document).height()).width(A)}}function e(){if(isSet&&settings.overlay_gallery&&z(pp_images[set_position])=="image"&&(settings.ie6_fallback&&!(d.browser.msie&&parseInt(d.browser.version)==6))){itemWidth=52+5;navWidth=(settings.theme=="facebook"||settings.theme=="pp_default")?50:30;itemsPerPage=Math.floor((s.containerWidth-100-navWidth)/itemWidth);itemsPerPage=(itemsPerPage<pp_images.length)?itemsPerPage:pp_images.length;totalPage=Math.ceil(pp_images.length/itemsPerPage)-1;if(totalPage==0){navWidth=0;$pp_gallery.find(".pp_arrow_next,.pp_arrow_previous").hide()}else{$pp_gallery.find(".pp_arrow_next,.pp_arrow_previous").show()}galleryWidth=itemsPerPage*itemWidth;fullGalleryWidth=pp_images.length*itemWidth;$pp_gallery.css("margin-left",-((galleryWidth/2)+(navWidth/2))).find("div:first").width(galleryWidth+5).find("ul").width(fullGalleryWidth).find("li.selected").removeClass("selected");goToPage=(Math.floor(set_position/itemsPerPage)<totalPage)?Math.floor(set_position/itemsPerPage):totalPage;d.prettyPhoto.changeGalleryPage(goToPage);$pp_gallery_li.filter(":eq("+set_position+")").addClass("selected")}else{$pp_pic_holder.find(".pp_content").unbind("mouseenter mouseleave")}}function g(B){settings.markup=settings.markup.replace("{pp_social}",(settings.social_tools)?settings.social_tools:"");d("body").append(settings.markup);$pp_pic_holder=d(".pp_pic_holder"),$ppt=d(".ppt"),$pp_overlay=d("div.pp_overlay");if(isSet&&settings.overlay_gallery){currentGalleryPage=0;toInject="";for(var C=0;C<pp_images.length;C++){if(!pp_images[C].match(/\b(jpg|jpeg|png|gif)\b/gi)){classname="default";img_src=""}else{classname="";img_src=pp_images[C]}toInject+="<li class='"+classname+"'><a href='#'><img src='"+img_src+"' width='50' alt='' /></a></li>"}toInject=settings.gallery_markup.replace(/{gallery}/g,toInject);$pp_pic_holder.find("#pp_full_res").after(toInject);$pp_gallery=d(".pp_pic_holder .pp_gallery"),$pp_gallery_li=$pp_gallery.find("li");$pp_gallery.find(".pp_arrow_next").click(function(){d.prettyPhoto.changeGalleryPage("next");d.prettyPhoto.stopSlideshow();return false});$pp_gallery.find(".pp_arrow_previous").click(function(){d.prettyPhoto.changeGalleryPage("previous");d.prettyPhoto.stopSlideshow();return false});$pp_pic_holder.find(".pp_content").hover(function(){$pp_pic_holder.find(".pp_gallery:not(.disabled)").fadeIn()},function(){$pp_pic_holder.find(".pp_gallery:not(.disabled)").fadeOut()});itemWidth=52+5;$pp_gallery_li.each(function(D){d(this).find("a").click(function(){d.prettyPhoto.changePage(D);d.prettyPhoto.stopSlideshow();return false})})}if(settings.slideshow){$pp_pic_holder.find(".pp_nav").prepend('<a href="#" class="pp_play">Play</a>');$pp_pic_holder.find(".pp_nav .pp_play").click(function(){d.prettyPhoto.startSlideshow();return false})}$pp_pic_holder.attr("class","pp_pic_holder "+settings.theme);$pp_overlay.css({opacity:0,height:d(document).height(),width:d(window).width()}).bind("click",function(){if(!settings.modal){d.prettyPhoto.close()}});d("a.pp_close").bind("click",function(){d.prettyPhoto.close();return false});d("a.pp_expand").bind("click",function(D){if(d(this).hasClass("pp_expand")){d(this).removeClass("pp_expand").addClass("pp_contract");doresize=false}else{d(this).removeClass("pp_contract").addClass("pp_expand");doresize=true}n(function(){d.prettyPhoto.open()});return false});$pp_pic_holder.find(".pp_previous, .pp_nav .pp_arrow_previous").bind("click",function(){d.prettyPhoto.changePage("previous");d.prettyPhoto.stopSlideshow();return false});$pp_pic_holder.find(".pp_next, .pp_nav .pp_arrow_next").bind("click",function(){d.prettyPhoto.changePage("next");d.prettyPhoto.stopSlideshow();return false});p()}if(!pp_alreadyInitialized&&c()){pp_alreadyInitialized=true;hashIndex=c();hashRel=hashIndex;hashIndex=hashIndex.substring(hashIndex.indexOf("/")+1,hashIndex.length-1);hashRel=hashRel.substring(0,hashRel.indexOf("/"));setTimeout(function(){d("a[rel^='"+hashRel+"']:eq("+hashIndex+")").trigger("click")},50)}return this.unbind("click.prettyphoto").bind("click.prettyphoto",d.prettyPhoto.initialize)};function c(){url=location.href;hashtag=(url.indexOf("#!")!=-1)?decodeURI(url.substring(url.indexOf("#!")+2,url.length)):false;return hashtag}function b(){if(typeof theRel=="undefined"){return}location.hash="!"+theRel+"/"+rel_index+"/"}function a(g,f){g=g.replace(/[\[]/,"\\[").replace(/[\]]/,"\\]");var e="[\\?&]"+g+"=([^&#]*)";var i=new RegExp(e);var h=i.exec(f);return(h==null)?"":h[1]}})(jQuery);var pp_alreadyInitialized=false;