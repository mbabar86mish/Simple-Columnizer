=== Simple Columnizer ===

Contributors: Muhammad Babar
Tags: simple columnizer, column, section, responsive column, Box
Requires at least: WP 3.5.1 & Bootstrap libraries
Tested up to: 4.1.1
Stable tag: 4.1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Responsive section generator create "Widget Area" in admin section with  "Drag & Drop" widget. You can generate number of sections. Place short code where you want. Short code available to you after save the widget.


== Installation ==

1. Upload `simple-columnizer` to the `/wp-content/plugins/` directory
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
				'icon_wrapper_start' => '<span %s%>',
				'icon_wrapper_end' => '</span>',
				'title_wrapper_start' => '<h3 %s%>',
				'title_wrapper_end' => '</h3>',
				'content_wrapper_start' => '<p %s%>',
				'content_wrapper_end' => '</p>'
			)
		);
		
	apply_filters('responsive_style_filter', $style2);
	
add in functions.php or in plugin file

Q. How add new style

Ans
	$column_classes = array(
            "Custom Classes" => array(
                'col-lg-1',
                'col-lg-2'
				)
			
			);
apply_filters('columnizer_column_classes_filter', $column_classes);

	add in functions.php or in plugin file
