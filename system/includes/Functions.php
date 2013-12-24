<?php
/**
	 * Función para modificar los permalinks
	 * @author rever
	 */
	function replace_permalink($param){
		$param = preg_replace('/-/','',$param);
		$param = preg_replace('/\s/','-',$param);
		$param = preg_replace('/á|Á/','a',$param);
		$param = preg_replace('/é|É/','e',$param);
		$param = preg_replace('/í|Í/','i',$param);
		$param = preg_replace('/ó|Ó/','o',$param);
		$param = preg_replace('/ú|Ó/','u',$param);
		$param = preg_replace('/ñ|Ñ/','n',$param);
		$param = preg_replace('/®/','',$param);
		return strtolower($param);
	}
	
	function makeUrl(QuarkUrl $QuarlUrl, $id_recipe=""){
		
		$lang = ($QuarlUrl->getPathInfo()->lang == "es" ? "en" : "es");
		$action = $QuarlUrl->getPathInfo()->action == 'index' ? '' : $QuarlUrl->getPathInfo()->action;

		$controller = $action != '' ? $QuarlUrl->getPathInfo()->controller : ($QuarlUrl->getPathInfo()->controller == 'home' ? '' : $QuarlUrl->getPathInfo()->controller);
        
		 $url = $lang."/".$controller."/" . ($action == '' ? '' : "$action/").implode('/',$QuarlUrl->getPathInfo()->arguments)."/";
		
		/*
		if($controller=="amigas-blogueras" && $action == "posts"){
        	$url = $lang."/".$controller."/" . ($action == '' ? '' : "$action/").$QuarlUrl->getPathInfo()->arguments[0]."/";
        } else if($controller=="amigas-blogueras" && $action == "detalle"){
        	 	$has_page = isset($QuarlUrl->getPathInfo()->arguments[1]);
        		$url = $lang."/".$controller."/" . ($action == '' ? '' : "$action/".$QuarlUrl->getPathInfo()->arguments[0].($has_page ? "/".$QuarlUrl->getPathInfo()->arguments[1]."/" : ""));
        } else if($action=="productos"){
        	$has_page = isset($QuarlUrl->getPathInfo()->arguments[1]);
        	$url = $lang."/".$controller."/" . ($action == '' ? '' : "$action/".$QuarlUrl->getPathInfo()->arguments[0].($has_page ? "/pagina-".$QuarlUrl->getPathInfo()->arguments[1]."/" : ""));
        } else if(($action=="detalle" || $action=="detalle-video" || $action=="detalle-paso") && ($controller=="recetas" || $controller=="club")){
        	$has_page = isset($QuarlUrl->getPathInfo()->arguments[1]);
        	$url = $lang."/".$controller."/" . ($action == '' ? '' : "$action/".$QuarlUrl->getPathInfo()->arguments[0]."/".($has_page ? $QuarlUrl->getPathInfo()->arguments[1]."/" : ""));
        }else if(($action=="cat" || $action=="momento" || $action=="search" || $action=="producto") && $controller=="recetas"){
        	$has_page = isset($QuarlUrl->getPathInfo()->arguments[1]);
        	$url = $lang."/".$controller."/" . ($action == '' ? '' : "$action/".$QuarlUrl->getPathInfo()->arguments[0]."/".($has_page ? $QuarlUrl->getPathInfo()->arguments[1]."/" : ""));
        }else if($controller=="club" && ($action == "registro" || $action=="detalle-diez-minutos" || $action == "detalle-ipad")){
        	$has_page = isset($QuarlUrl->getPathInfo()->arguments[0]);
        	$url = $lang."/".$controller."/" . ($action == '' ? '' : "$action/".($has_page ? $QuarlUrl->getPathInfo()->arguments[0]."/" : ""));
        }else if($action=="d" || $action=="tips"){
        	$has_page = isset($QuarlUrl->getPathInfo()->arguments[1]);
        	$url = $lang."/".$controller."/" . ($action == '' ? '' : "$action/".$QuarlUrl->getPathInfo()->arguments[0].($has_page ? "/".$QuarlUrl->getPathInfo()->arguments[1]."/" : ""));
        }else if($action=="registro-ipad"){        	
        	$param0 = isset($QuarlUrl->getPathInfo()->arguments[0]);
        	$has_page = isset($QuarlUrl->getPathInfo()->arguments[1]);
        	$url = $lang."/".$controller."/" . ($action == '' ? '' : "$action/".($param0 ? "/".$QuarlUrl->getPathInfo()->arguments[1]."/" : "").($has_page ? "/".$QuarlUrl->getPathInfo()->arguments[1]."/" : ""));
       }else{
        	$url = $lang."/".$controller."/" . ($action == '' ? '' : "$action/");
        }*/
		return $url;
	}