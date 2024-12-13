<?php
namespace App\Services;

class MenuService {

    public function __construct() {
    }

    public function html($items = array(), $parent_id = 0): string {

        $html_tree = '<ul rel="1">';
        for($i=0, $ni=count($items); $i < $ni; $i++){
            if($items[$i]['parent_id'] == $parent_id){

                $icon = '';
                if ($parent_id == 0) {
                    $icon = '<i class="fa-solid fa-caret-down"></i>';
                }

                $html_tree .= '<li rel="2">';
                $html_tree .= '<a onclick="menu('.$items[$i]['id'].');" href="#" aria-haspopup="true">'.$items[$i]['name'].'&nbsp;'.$icon.'</a>';
                $html_tree .= $this->html($items, $items[$i]['id']);
                $html_tree .= '</li>';
            }
        }
        $html_tree .= '</ul rel="4">';

        return $html_tree;
    }
}