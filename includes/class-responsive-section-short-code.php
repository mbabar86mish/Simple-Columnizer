<?php

class Responsive_Section_Short_Code {

    public function __construct() {

        add_shortcode('responsive_section', array($this, 'shortcode'));
    }

    public function shortcode($atts) {
        $output = '';
        $widget_details = shortcode_atts(array(
            'id' => false,
                ), $atts);
        //Get All widgets from our widget area.
        $sections = get_option('widget_responsive_widget');
        if (!$sections) {
            return "No Responsive section found!";
        }



        $widget_id = intval($widget_details['id']); //Get Widget ID from shortcode
        if ($widget_id == false || !array_key_exists($widget_id, $sections)) {
            return "Given section id not found";
        }

        $section_value = $sections[$widget_id];

        if (is_array($section_value) && array_key_exists('style', $section_value)) {
            //Generate HTML for sections

            $section_icon = apply_filters('responsive_remove_slashes_to_data_filter', $section_value['section_icon']);
            $section_title = apply_filters('responsive_remove_slashes_to_data_filter', $section_value['section_title']);
            $section_description = apply_filters('responsive_remove_slashes_to_data_filter', $section_value['section_description']);

            $section_custom_classes = apply_filters('responsive_remove_slashes_to_data_filter', $section_value['section_custom_classes']);

            $section_icon_attributes = apply_filters('responsive_remove_slashes_to_data_filter', $section_value['section_icon_attribuites']);
            $section_title_attributes = apply_filters('responsive_remove_slashes_to_data_filter', $section_value['section_title_attributes']);
            $section_description_attributes = apply_filters('responsive_remove_slashes_to_data_filter', $section_value['section_description_attributes']);



            $output .= $this->generate_section_html($section_icon, $section_icon_attributes, $section_title, $section_title_attributes, $section_description, $section_description_attributes, $section_value['style'], $section_value['section'], $section_custom_classes);
        }
        return $output;
    }

    public function generate_section_html($section_icon, $section_icon_attributes, $section_title, $section_title_attributes, $section_description, $section_description_attributes, $selected_style, $selected_section, $section_custom_classes) {
        $html = '';
        //Get available styles //Default, Style
        $available_styles = apply_filters('responsive_style_filter', false);
        //Get Total section // 12
        $total_sections = apply_filters('responsive_total_sections_filter', false);
        //Generate Responsive Class Eg: col-sm-6
        $responsive_class = intval($total_sections / $selected_section);

        if (is_array($available_styles)) {
            if (array_key_exists($selected_style, $available_styles)) {

                $html .= (isset($available_styles[$selected_style]['container_wrapper_start']) && $available_styles[$selected_style]['container_wrapper_start'] != "") ? $available_styles[$selected_style]['container_wrapper_start'] : '';
                for ($i = 0; $i < count($section_icon); $i++) {
                    $responsive_class = ($section_custom_classes[$i] != "") ? $section_custom_classes[$i] : 'col-sm-' . $responsive_class;
                    $html .='<div class="' . $responsive_class . '">';

                    //For Icon
                    $html .= (isset($available_styles[$selected_style]['icon_wrapper_start']) && $available_styles[$selected_style]['icon_wrapper_start'] != "") ? str_replace("%s%", trim($section_icon_attributes[$i]), $available_styles[$selected_style]['icon_wrapper_start']) : '';
                    $html .= '<i class="' . trim($section_icon[$i]) . '"></i>';
                    $html .= (isset($available_styles[$selected_style]['icon_wrapper_end']) && $available_styles[$selected_style]['icon_wrapper_end'] != "") ? $available_styles[$selected_style]['icon_wrapper_end'] : '';

                    //For Title
                    $html .= (isset($available_styles[$selected_style]['title_wrapper_start']) && $available_styles[$selected_style]['title_wrapper_start'] != "") ? str_replace("%s%", trim($section_title_attributes[$i]), $available_styles[$selected_style]['title_wrapper_start']) : '';
                    $html .= trim($section_title[$i]);
                    $html .= (isset($available_styles[$selected_style]['title_wrapper_end']) && $available_styles[$selected_style]['title_wrapper_end'] != "") ? $available_styles[$selected_style]['title_wrapper_end'] : '';

                    //For description
                    $html .= (isset($available_styles[$selected_style]['content_wrapper_start']) && $available_styles[$selected_style]['content_wrapper_start'] != "") ? str_replace("%s%", trim($section_description_attributes[$i]), $available_styles[$selected_style]['content_wrapper_start']) : '';
                    $html .= trim($section_description[$i]);
                    $html .= (isset($available_styles[$selected_style]['content_wrapper_end']) && $available_styles[$selected_style]['content_wrapper_end'] != "") ? $available_styles[$selected_style]['content_wrapper_end'] : '';

                    $html .='</div>';
                }
                $html .= (isset($available_styles[$selected_style]['container_wrapper_end']) && $available_styles[$selected_style]['container_wrapper_end'] != "") ? $available_styles[$selected_style]['container_wrapper_end'] : '';
            }
        }
        return $html;
    }

}
