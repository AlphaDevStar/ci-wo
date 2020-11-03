<?php


class CategoryModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    function get_category_count($name) {
		$sql = "Select * from categories where name = '".$name."' and status = 0";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	function add($name, $desc) {
        $sql = 'Insert into categories (name, description, reg_date) values ("'.addslashes($name).'", "'
            .addslashes($desc).'", "'.date("Y-m-d h:i:s").'")';
        $this->db->query($sql);
    }

    function update($id, $name, $desc) {
        $sql = 'update categories set name = "'. addslashes($name).'", description = "' .addslashes($desc).'" where id= '.$id;
        $result = $this->db->query($sql);
    }

    function delete($id) {
        $sql = "update categories set status = 1 where id= $id";
        $result = $this->db->query($sql);
        return $result;
    }

    function get_all_category() {
        $sql = "Select * from categories where status = 0";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function get_with_id($id) {
        $sql = "Select * from categories where id = $id";
        $result = $this->db->query($sql);
        return $result->result_array()[0];
    }



}
