<?php
// Load Dom Ready Javascripts
// add_action( 'wp_head', 'gpp_base_category_slider_dom_ready_js' );
	//function gpp_base_category_slider_dom_ready_js() {
		global $storedcats;
		//print_r($catarray);
		$categories = "";
		$category = array();		
		//$categoryid = explode( ",", get_option( 'gpp_category_slider_cats' ) );
		$categoryid = $storedcats;
		foreach($catarray  as $catid ){
			$category[] = get_cat_name( $catid );			
		}	
//print_r($category);		
		$doc_ready_script = '
		<script type="text/javascript">	
			jQuery(document).ready(function(){				
				var catnames = new Array();				
			';
			$j = 0;
			foreach($category as $cat){				
				$doc_ready_script .= '
					catnames['.$j.']="'.$cat.'";
				';
				$j++;
			}	
			
				$doc_ready_script .= '
				//alert(catnames);
				i=0;
				j=0;				
				jQuery("#category_slider_postslider").cycle({
					fx:     "scrollHorz",
					speed:  500,
					timeout:0,		
					pager:  "#category_slider_nav",						
					pagerAnchorBuilder: function(idx, slide) {						
					   i=i+1;
					   return "<a class=\'"+i+"\' href=\"#\">"+catnames[(i-1)]+"</a>";
						//alert(catnames);
					},					
					after: onafter 										
				});
				totalmargin = (parseInt(jQuery("#category_slider_nav a.1").css("marginRight")))*2; //multiply by 2 for both side margins				
				totalcatwidth = 0;
				jQuery("#category_slider_nav a").each(function(){
					totalcatwidth +=(jQuery(this).width()+totalmargin);
				});
				
				jQuery("#category_slider_sliderhead").css("width",totalcatwidth); //initialize the total width of the slider div
				var firstcatwidth = (jQuery("#category_slider_nav a:nth-child(1)").width()+totalmargin);	//adding 5px*2 of the margin on both side
				jQuery("#category_slider_sliderhead #category_slider_arrowhead").css("left",((firstcatwidth/2)-6)); //decreasing half the width of arrow
				
				function onafter(){	
						if(j>i){j=1;}
						currentdot = j;
						jQuery("#category_slider_nav a.activeSlide").click();
						j++;
				}
									
				jQuery("#category_slider_nav a").first().addClass("activecat"); //to disable active cat click.
				jQuery("#category_slider_nav a:not(.activecat)").live("click",function(){
					var currentdotclass = jQuery("#category_slider_nav .activecat").attr("class");					
					currentdot = parseInt(currentdotclass.replace(/[^0-9]/g, ""));
					jQuery("#category_slider_nav a").removeClass("activecat");
					jQuery(this).addClass("activecat");
					var dotclickedclass = jQuery(this).attr("class");
					var dotclicked = parseInt(dotclickedclass.replace(/[^0-9]/g, ""));					
					var currentcatwidth = jQuery("#category_slider_nav a:nth-child("+currentdot+")").width();
					var clickedcatwidth = jQuery("#category_slider_nav a:nth-child("+dotclicked+")").width();
					
					if((currentcatwidth % 2 != 0 && clickedcatwidth % 2 != 0) || (currentcatwidth % 2 == 0 && clickedcatwidth % 2 == 0) ){}else{
						if(clickedcatwidth % 2 != 0){
							clickedcatwidth++;
						}
						if(currentcatwidth % 2 != 0){
							currentcatwidth++;
						}
					}
										
					//alert(clickedcatwidth+"="+currentcatwidth);
					var newpos = 0;					
					var addedvalue = 0;
					//alert(dotclicked+"="+currentdot);
					if(dotclicked>currentdot){
						for(x=(currentdot+1);x<dotclicked;x++){					
							addedvalue += jQuery("#category_slider_nav a:nth-child("+x+")").width()+totalmargin;
							
						}
						newpos = ((clickedcatwidth + currentcatwidth)/2)+addedvalue+totalmargin;
					} else {					
						for(y=(dotclicked+1);y<currentdot;y++){						
							addedvalue += -jQuery("#category_slider_nav a:nth-child("+y+")").width()-totalmargin;						
						}						
						newpos = (((-clickedcatwidth - currentcatwidth)/2)+addedvalue-totalmargin);
					}						
					jQuery("#category_slider_sliderhead #category_slider_arrowhead").animate({
						left: "+="+newpos
					},500);					
				});
				
				jQuery(".category_slider_eachpost").hover(function(event){							
					jQuery(this).find("img").stop().fadeTo("slow", 0.3); 
					jQuery(this).find(".postsliderdetail").stop().fadeTo("slow", 1.0);					
				},function(){
					jQuery(this).find("img").stop().fadeTo("slow", 1); 
					jQuery(this).find(".postsliderdetail").stop().fadeTo("slow", 0.0);							
				});				
			});

		</script>
		';						
		echo $doc_ready_script;		
	//}  	
?>