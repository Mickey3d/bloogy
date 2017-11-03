<?php
namespace Core\HTML;

class BootstrapForm extends Form
{
    // this function surround a html code with bootstrap class in div or span
    protected function surround($html){
        return "<div class=\"form-group\">{$html}</div>";
    }

    public function input($name, $label, $options = [], $required = false){
        $type = isset($options['type']) ? $options['type'] : 'text';
        $tag = isset($options['tag']) ? $options['tag'] : 'div';

        $label = '<label>' . $label . '</label>';
        $requiredField = ($required) ? ' required' : "";

        if($type === 'textarea') { // case textarea
            $input = '<textarea name="' . $name . '" class="form-control">' . $this->getValue($name) . '</textarea>';
        } elseif ($type === 'tinytextarea'){ // case textarea with extension tinyMCE
            $input = '<textarea id="tinytextarea" name="' . $name . '" class="form-control">' . $this->getValue($name) . '</textarea>';
        } else{
            $input = '<input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control"' . $requiredField . '>';
        }

        return $this->surround($label . $input, $tag);
    }

    /**
     * this function create a select field with label and options with bootstrap class.
     *
     * @param string $name name of the field
     * @param string $label label of the field
     * @param Array $options options (list content) for the select
     * @return string
    */
    public function select($name, $label, $options){
        $label = '<label>' . $label . '</label>';
        $input = '<select class="form-control input-lg" name="' . $name . '">';
        foreach($options as $k => $v){
            $attributes = '';
            if($k == $this->getValue($name)){
                $attributes = ' selected';
            }
            $input .= "<option value='$k'$attributes>$v</option>";
        }
        $input .= '</select>';
        return $this->surround($label . $input);
    }
    
    // Create a submit button with bootstrap class
    public function submit(){
        return $this->surround('<button type="submit" class="btn btn-primary">Envoyer</button>');
    }

}
