=== Responsive Section Generator ===

Contributors: Muhammad Babar
Tags: responsive section generator, sections, elements, responsive, generator
Requires at least: 3.5.1 & responsive libraries
Tested up to: 4.1.1
Stable tag: 4.1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Responsive section generator create "Widget Area" in admin section with  "Drag & Drop" widget. You can generate number of sections. Place short code where you want. Short code available to you after save the widget.


== Installation ==

1. Upload `responsive-section-generator` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress 

== Frequently asked questions ==

= A question that someone might have =

An answer to that question.

== Screenshots ==

1. screenshot-1
2. screenshot-2

Q. How add new style
Ans. 

	$style2 = array(
			'style 2' => array(
				'container_wrapper_start' => '<div class="row-example">',
				'container_wrapper_end' => '</div>',
				'icon_wrapper_start' => '<span>',
				'icon_wrapper_end' => '</span>',
				'title_wrapper_start' => '<h3>',
				'title_wrapper_end' => '</h3>',
				'content_wrapper_start' => '<p>',
				'content_wrapper_end' => '</p>'
			)
		);
		
	apply_filters('responsive_style_filter', $style2);
	
add in functions.php or in plugin file
	
