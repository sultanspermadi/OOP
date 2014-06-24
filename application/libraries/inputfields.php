<?php

class inputfields
{
	protected $ci;
	protected $user;
	function __construct()
	{	
		$this->ci = get_instance();
		$this->ci->load->model(array("default_model"));
		$this->user = $this->ci->session->userdata("user");
	}
	
	public function isHidden($parameters="")
	{
		return $this->defineInput($name="",$value="",$parameters,$label="","isHidden");
	}
	
	public function defineInput($name="",$value="",$parameters="",$label="",$other="")
	{
		$getType = (!empty($parameters['type']) ? $parameters['type'] : "text");
		
		if(is_array($getType))
		{
			$parameters['type'] = (!empty($parameters['type']['type']) ? $parameters['type']['type'] : (is_string($parameters) ? $parameters : "text"));
			$parameters = array_merge($parameters,$getType);
		}
		
		if(isset($parameters['privilege']))
		{
			$privilege = explode(",",$parameters['privilege']);
			foreach($privilege as $prev)
			{
				if($prev == $this->user['user_type_id'])
				{
					$hidden = 0;
					break;
				}
				
				$hidden = 1;
			}
			
			$parameters['type'] = (!empty($hidden) ? "hidden" : $parameters['type']);
		}
		
		$type = (!empty($parameters['type']) ? $parameters['type'] : "text");
		
		if(!method_exists("inputfields",$type))
		{
			$type = "text";
		}
		
		if($other == "isHidden")
		{
			return (!empty($parameters['type']) ? ($parameters['type'] == "hidden" ? 1 : "") : "");
		}
		else
		{
			return $this->$type($name,(isset($parameters['value']) ? $parameters['value'] : $value),$parameters,$label,(!empty($other) ? $other : ""));
		}
	}

	function status_lists($name="",$value="",$parameters="",$label="")
	{
		$options = array(""=>"Select Status","Active"=>"Active","Inactive"=>"Inactive","Trashed"=>"Trashed");
		$parameters = (is_array($parameters) ? $this->setStringParameter($parameters) : $parameters);
		return $this->setlist($name,$options,$value,$parameters);
	}
    
	function gender_lists($name="",$value="",$parameters="",$label="")
	{
		$options = array(""=>"Select Gender","Pria"=>"Pria","Wanita"=>"Wanita");
		$parameters = (is_array($parameters) ? $this->setStringParameter($parameters) : $parameters);
		return $this->setlist($name,$options,$value,$parameters);
	}

	function text($name="",$value="",$parameters="",$label="")
	{
		$parameters = (is_array($parameters) ? $this->setStringParameter($parameters) : $parameters);
		return form_input($name,$value,$parameters);
	}
	
	function date($name="",$value="",$parameters="",$label="")
	{
		//joining paramters
		$parameters = $this->joinParams($parameters,array("class"=>"datePicker"));
		//set parameter to string
		$parameters = (is_array($parameters) ? $this->setStringParameter($parameters) : $parameters);
		
		echo "<input type='text' name='".$name."' ".$parameters." value='".$value."' />";
	}
	
	function hidden($name="",$value="",$parameters="",$label="")
	{
		$parameters = (is_array($parameters) ? $this->setStringParameter($parameters) : $parameters);
		return form_hidden($name,$value,$parameters);
	}
	
	function password($name="",$value="",$parameters="",$label="")
	{
		$parameters = (is_array($parameters) ? $this->setStringParameter($parameters) : $parameters);
		return form_password($name,$value,$parameters);
	}
	
	function textarea($name="",$value="",$parameters="",$label="")
	{
		$parameters = (is_array($parameters) ? $this->setStringParameter($parameters) : $parameters);
		return form_textarea($name,$value,$parameters);
	}

	/* 	Setlist
		$name = string, : 
		$options = array(),
		$value = string,
		$parameters = string,
		$select array($key,$val)
	*/
	function setlist($name="",$options="",$value="",$parameters="",$select="")
	{
		if(!empty($select))
		{
			$getOptions = array();
			
			$getOptions[] = "Select ".ucfirst(str_replace("id","",str_replace("_"," ",$name)));
			foreach($options as $option)
			{
				if(is_array($option))
				{
					$getOptions[$option[$select[0]]] = $option[$select[1]];
				}
				else
				{
					$getOptions[$option->$select[0]] = $option->$select[1];
				}
			}
			
			$options = $getOptions;
		}
		return form_dropdown((!empty($name) ? $name : ""), $options, (!empty($value) ? $value : ""), (!empty($parameters) ? $parameters : ""));
	}
	
	/* 	to join param
		$params = array("class"=>"form-control","placeHolder"=>"Form"),
		$joinParams = array("class"=>"another");
	*/
	
	function joinParams($params,$joinParams)
	{
		$getParams = array();
		foreach($params as $pkey=>$pval)
		{
			foreach($joinParams as $jkey=>$jval)
			{
                $getParams[$jkey][] = $jval;
            }
            
            $getParams[$pkey][] = $pval;
		}
        
        $setParam = array();
        foreach($getParams as $key=>$val)
        {            
            $paramVal = "";
            foreach($val as $attr)
            {
                if(!is_numeric(strpos($paramVal,$attr)))
                {
                    $paramVal .= " ".$attr;
                }
            }
            
            $setParam[$key] = $paramVal;
        }
        
        return $setParam;
	}
	
	function setStringParameter($parameters)
	{
		$string = "";
		foreach($parameters as $key=>$val)
		{
			$string .= $key."='".$val."' ";
		}
		return $string;
	}
}