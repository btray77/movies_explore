<?php
class Styles extends CI_Model {

    function __construct() {
    // Call the Model constructor
        parent::__construct();
    }
	
function get_random_first_style()
{

$query = $this->db->query('SELECT * FROM (SELECT sty.*
FROM styles
JOIN styles AS sty ON styles.style_id = sty.style_type_parent_id
ORDER BY rand( )
) AS T
GROUP BY style_type_parent_id
ORDER BY style_id');
 return $query->result_array();
}



function get_random_second_style($first_id)
{
//echo $first_id;
$query = $this->db->query("SELECT * FROM (SELECT sty.*
FROM styles
JOIN styles AS sty ON styles.style_id = sty.style_type_parent_id
order by rand()
) AS T
WHERE style_id NOT IN ($first_id)
GROUP BY style_type_parent_id
ORDER BY style_id
");

 return $query->result_array();
}


function get_first_ids($parent_id,$first_img_id)

{
//SELECT * FROM `styles` WHERE style_id NOT IN (27,23,31,35,39,46,49,56,59) and style_type_parent_id=3

$query=$this->db->query("select style_id from styles where style_type_parent_id = $parent_id");
//print_r($query);
return $query->result_array();

}



function get_final_style($second_parent_id,$second_id,$first_set_image_idss)

{

$query=$this->db->query("SELECT * FROM `styles` WHERE style_type_parent_id=$second_parent_id and style_id!=$second_id and style_id NOT IN($first_set_image_idss)");
return $query->result_array();

}


function get_third_images($final_image_sets)

{

$query=$this->db->query("SELECT * FROM `styles` WHERE style_id IN ($final_image_sets)");
return $query->result_array();

}

function get_last_parent_pass_id($last_parent_pass_id)

{

$query=$this->db->query("SELECT * FROM `styles` WHERE style_id IN ($last_parent_pass_id)");
return $query->result_array();

}

}



