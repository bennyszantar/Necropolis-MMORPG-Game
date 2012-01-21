/**
 *  jQuery Tooltip Plugin
 *  @requires jQuery v1.2.6 or greater
 *  http://hernan.amiune.com/labs
 *
 *  Copyright (c)  Hernan Amiune (hernan.amiune.com)
 *  Licensed under MIT license:
 *  http://www.opensource.org/licenses/mit-license.php
 * 
 *  Version: 1.0
 */
 
(function($){ $.fn.tooltip = function(options){

    var defaults = {
        cssClass: "",     //CSS class or classes to style the tooltip
		delay : 0,        //The number of milliseconds before displaying the tooltip
        duration : 500,   //The number of milliseconds after moving the mouse cusor before removing the tooltip.
        xOffset : 15,     //X offset will allow the tooltip to appear offset by x pixels.
        yOffset : 15,     //Y offset will allow the tooltip to appear offset by y pixels.
		opacity : 0,      //0 is completely opaque and 100 completely transparent
		fadeDuration: 400, //[toxi20090112] added fade duration in millis (default = "normal")
		eventshow : 'mouseover', //[Stijn Haulotte] added custom show event
		eventhide : 'mouseleave', //[Stijn Haulotte] added custom hide event
		ajaxSource : 'href', //[Stijn Haulotte] added custom ajax source
		closebutton : 'no', //[Stijn Haulotte] added close button
		fixed: false
	};
  
    var options = $.extend(defaults, options);
	
	
	return this.each(function(index) {
		
		var $this = $(this);
		
		//use just one div for all tooltips
		// [toxi20090112] allow the tooltip div to be already present (would break currently)
		$tooltip=$("#divTooltip");
		$tooltipC=$("#divTooltipC");
		$tooltipT=$("#divTooltipT");
		$tooltip.hide();
		if($tooltip.length == 0){
			$tooltip = $('<div id="divTooltip"><div id="divTooltipT"></div><div id="divTooltipC"></div></div>');			
			$('body').append($tooltip);
			$tooltip.hide();
		}
		//displays the tooltip
		function show (e){
			//compatibility issue
			e = e ? e : window.event;
			
			// show the close button
			if(options.closebutton == 'yes'){
				$tooltipT.html("<div id='close'>Sluiten</div>");
			}
			
			//don't hide the tooltip if the mouse is over the element again
			clearTimeout($tooltip.data("hideTimeoutId"));
			
			//set the tooltip class
			$tooltip.removeClass($tooltip.attr("class"));
			$tooltip.css("width","");
			$tooltip.css("height","");
			$tooltip.addClass(options.cssClass);
			$tooltip.css("opacity",1-options.opacity/100);
			$tooltip.css("position","absolute");			
			
			//save the title text and remove it from title to avoid showing the default tooltip
			$tooltip.data("title",$this.attr("title"));
			$this.attr("title","");
			$tooltip.data("alt",$this.attr("alt"));
			$this.attr("alt","");
			
			//set the tooltip content
			$tooltipC.html($tooltip.data("title"));
			// [toxi20090112] only use ajax if there actually is a href or rel attrib present
			var el=$this.attr(options.ajaxSource);
			if(el!=undefined && el!="" && el != "#")
			    $tooltipC.html($.ajax({url:$this.attr(options.ajaxSource),async:false}).responseText);
			
			if(options.fixed === false){
				//set the tooltip position
				winw = $(window).width();
				w = $tooltip.width();
				xOffset = options.xOffset;
				
				//right priority
				if(w+xOffset+50 < winw-e.clientX)
				  $tooltip.css("left", $(document).scrollLeft() + e.clientX+xOffset);
				else if(w+xOffset+50 < e.clientX)
				  $tooltip.css("left", $(document).scrollLeft() + e.clientX-(w+xOffset));
				else{
				  //there is more space at left, fit the tooltip there
				  if(e.clientX > winw/2){
					$tooltip.width(e.clientX-50);
					$tooltip.css("left", $(document).scrollLeft() + 25);
				  }
				  //there is more space at right, fit the tooltip there
				  else{
					$tooltip.width((winw-e.clientX)-50);
					$tooltip.css("left", $(document).scrollLeft() + e.clientX+xOffset);
				  }
				}
				
				winh = $(window).height();
				h = $tooltip.height();
				yOffset = options.yOffset;
				//top position priority
				if(h+yOffset + 50 < e.clientY)
				  $tooltip.css("top", $(document).scrollTop() + e.clientY-(h+yOffset));
				else if(h+yOffset + 50 < winh-e.clientY)
				  $tooltip.css("top", $(document).scrollTop() + e.clientY+yOffset);
				else 
				  $tooltip.css("top", $(document).scrollTop() + 10);
			}
			
			//start the timer to show the tooltip
			//[toxi20090112] modified to make use of fadeDuration option
			$tooltip.data("showTimeoutId", setTimeout("$tooltip.fadeIn("+options.fadeDuration+")",options.delay));
		}
		$this.bind(options.eventshow, function(event){
			show(event);
		});
		
		$tooltip.bind('mouseover', function(event){
			$this.stop();
			clearTimeout($tooltip.data("hideTimeoutId"));
		});
		
		$tooltip.bind('mouseleave', function(event){
			hide(event);
		});
		
		function hide(e){
			//compatibility issue
			e = e ? e : window.event;
			//restore the title
			$this.attr("title",$tooltip.data("title"));
			$this.attr("alt",$tooltip.data("alt"));
			//don't show the tooltip if the mouse left the element before the delay time
			clearTimeout($tooltip.data("showTimeoutId"));
			//start the timer to hide the tooltip
			//[toxi20090112] modified to make use of fadeDuration option
			$tooltip.data("hideTimeoutId", setTimeout("$tooltip.fadeOut("+options.fadeDuration+")",options.duration));
		}
		$this.bind(options.eventhide, function(event){
			hide(event);
		});
		
		$this.click(function(e){
		    e.preventDefault();
		});
		$tooltipT.click(function(event){
		    hide(event);
		});

	});

}})(jQuery);