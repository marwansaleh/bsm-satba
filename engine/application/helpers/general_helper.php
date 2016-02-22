<?php
if (!function_exists('breadcumb')){
    function breadcrumb($pages, $showServerTime=FALSE){
        $str = '<ol class="breadcrumb">';
        
        if (is_array($pages)){
            if ($showServerTime){
                $new_bc = array (array('title'=> date('D, dMY H:i:s')));
                array_splice($pages, 0,0, $new_bc);
            }
            foreach ($pages as $page){
                $active = (isset($page['active'])&&$page['active']==TRUE);
                $str.= '<li';
                if ($active)
                    $str.= ' class="active"';
                        
                $str.= '>';
                if (isset($page['link']))
                    $str.= '<a href="'.$page['link'].'">'. $page['title'].'</a>';
                else
                    $str.= $page['title'];
                
                
                $str.= '</li>';
            }
        }
        else
        {
            $str.= '<li>'.$page.'</li>';
        }
        $str.= '</ol>';
        return $str;
    }
}

if (!function_exists('breadcumb_add')){
    function breadcumb_add(&$breadcumb,$title,$link=NULL,$active=FALSE){
        if (is_array($breadcumb)){
            $item = array('title'=>$title, 'active'=>$active);
            if ($link){
                $item['link'] = $link;
            }
            $breadcumb [] = $item;
        }
    }
}

if (!function_exists('create_alert_box')){
    function create_alert_box($alert_text, $alert_type=NULL, $alert_title=NULL, $autohide=TRUE, $secs=6000){
        $type_labels = array(
            'default' => 'Information', 'info'=>'Information', 'success'=>'Successfull', 
            'warning'=>'Warning', 'danger'=>'Danger', 'error'=>'Error'
        );
        $type_alerts = array(
            'default'=>'alert-info', 'info'=>'alert-info', 'success'=>'alert-success', 
            'warning'=>'alert-warning', 'danger'=>'alert-danger', 'error'=>'alert-danger'
        );
        $s = '<div class="alert '.(isset($type_alerts[$alert_type])?$type_alerts[$alert_type]:$type_alerts['default']).' alert-dismissible" role="alert">';
        //button dismiss
        $s.= '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
        //Label in bold
        $s.= '<strong>'. ($alert_title?$alert_title:(isset($type_labels[$alert_type])?$type_labels[$alert_type]:$type_labels['default']).'!').'</strong> ';
        //Alert text
        $s.= $alert_text;
        $s.= '</div>';
        
        //add js to hide automatically
        if ($autohide){
            $s.= PHP_EOL . '<script>setTimeout(function(){$(".alert-dismissible").fadeOut("slow");},'.$secs.');</script>';
        }
        
        return $s;
    }
}

if (!function_exists('get_asset_url')){
    function get_asset_url($filename=NULL){
        $base_assets = config_item('assets_path');
        if (!$filename){
            return site_url($base_assets) . '/';
        }else{
            return site_url($base_assets . $filename);
        }
    }
}

if (!function_exists('get_action_url')){
    function get_action_url($filename=NULL){
        if (!$filename){
            return site_url() ;
        }else{
            return site_url($filename);
        }
    }
}

if (!function_exists('array_submits')){
    function array_submits($keys, $posts){
        $data = array();
        foreach (explode(',', $keys) as $key){
            $data[$key] = isset($posts[$key])?$posts[$key] : NULL;
        }
        
        return $data;
    }
}

if (!function_exists('variable_type_cast')){
    function variable_type_cast($value, $type='string'){
        switch ($type){
            case 'integer': return intval($value); 
            case 'numeric': return floatval($value);
            case 'boolean': return boolval($value);
            case 'list': return __make_list($value);
            default : return strval($value);
        }
    }
    
    function __make_list($value, $delim=','){
        $list = explode($delim, $value);
        
        return $list;
    }
}

if (!function_exists('draw_menus')){
    function draw_menus($mainmenus, $level=0, $module_active='dashboard'){
        if (!$mainmenus || !is_array($mainmenus)){
            return '';
        }
        $str = '';
        foreach ($mainmenus as $menu){
            $caption = $level==0 ? strtoupper($menu->caption) : ($level==1 ? ucfirst($menu->caption) : $menu->caption);
            $str.= '<li'.($level==0&&$menu->module_name==$module_active?' class="active"':'').'>';
            if ($menu->children){
                $str.= '<a href="#" class="js-sub-menu-toggle" '.($menu->title?' title="'.$menu->title.'"':'').'>';
                $str.= ($menu->icon ? '<i class="fa '.$menu->icon.' fa-fw"></i>':'').'<span class="text">'.$caption.'</span>';
                $str.= '<i class="toggle-icon fa '.($menu->module_name==$module_active?'fa-angle-down':'fa-angle-left').'"></i>';
                $str.= '</a>';
                $str.= '<ul class="sub-menu '.($menu->module_name==$module_active?'open':'').'">';
                $str.= draw_menus($menu->children, $level+1, $module_active);
                $str.= '</ul>';
            }else{
                $str.= '<a href="'.($menu->link ? get_action_url($menu->link):'#').'"'.($menu->title?' title="'.$menu->title.'"':'').'>'.($menu->icon ? '<i class="fa '.$menu->icon.' fa-fw"></i>':'').'<span class="text">'.$caption.'</span></a>';
            }
            $str.= '</li>';
        }
        
        return $str;
    }
}

if (!function_exists('module_name')){
    function module_name($module_id){
        $module_name = 'dashboard';
        
        switch ($module_id){
            case CT_MODULE_DASHBOARD: $module_name = 'dashboard'; break;
            case CT_MODULE_MARKETING: $module_name = 'marketing'; break;
            case CT_MODULE_KEUANGAN: $module_name = 'keuangan'; break;
            case CT_MODULE_MASTER: $module_name = 'master'; break;
            case CT_MODULE_SYSTEM: $module_name = 'system'; break;
            case CT_MODULE_USERMGT: $module_name = 'usermgt'; break;
            case CT_MODULE_MANUAL: $module_name = 'manual';break;
            case CT_MODULE_REPORTING: $module_name = 'report';break;
            default : $module_name = CT_MODULE_OTHER;
        }
        
        return $module_name;
    }
}
/*
 * Filename: general_helper.php
 * Location: application/helpers/general_helper.php
 */