<?php

class tablefields
{
	function master_admin($post="")
	{
		$fields['fields'] = array("id","first_name","last_name","contact_person","email","username","password","session_id","ip_address","user_agent","type_admin_id","status");
		$fields['primary'] ="id";
		return $this->returnFields($fields,$post);
	}

	function returnFields($fields="",$post="")
	{
		$data = array();
		foreach($post as $key=>$val)
		{
			foreach($fields['fields'] as $field)
			{
				if(strtolower($key) == strtolower($field))
				{
					$data['data'][$key] = $val;
				}
			}
		}
		
		if(!empty($post[$fields['primary']]))
		{
			$data[$fields['primary']] = $post[$fields['primary']];
			$data['primary'] = $fields['primary'];
			unset($data['data'][$fields['primary']]);
		}
		
		return $data;
	}
}
