<?php


class ProductModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    function get_category_count($name) {
		$sql = "Select * from products where name = '".$name."' and status = 0";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	function add($name, $desc) {
        $sql = 'Insert into products (name, description, reg_date) values ("'.addslashes($name).'", "'
            .addslashes($desc).'", "'.date("Y-m-d h:i:s").'")';
        $this->db->query($sql);
    }

    function delete($id) {
        $sql = "update products set status = 1 where id= $id";
        $result = $this->db->query($sql);
        return $result;
    }

    function get_all_product() {
        $sql = "Select * from products where status = 0";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function get_with_id($id) {
        $sql = "Select * from products where id = $id";
        $result = $this->db->query($sql);
        return $result->result_array()[0];
    }

    function get_product($page) {
        $sql = "Select * from products where status = 0 limit ".(($page - 1)*8).", ".($page * 8);
        $result = $this->db->query($sql);
        return $result->result_array();

    }

    function insert($categoryId, $name, $description, $oldPrice, $newPrice, $amount, $logo) {
        $sql = 'Insert into products (category_id, name, description, old_price, new_price, amount,image, reg_date) values ("'.addslashes($categoryId).'", "'
            .addslashes($name).'", "'.addslashes($description).'", "'.addslashes($oldPrice).'", "'.addslashes($newPrice).'", "'
            .addslashes($amount).'", "'.addslashes($logo).'", "'.date("Y-m-d h:i:s").'")';
        $this->db->query($sql);

    }

    function update($id, $categoryId, $name, $description, $oldPrice, $newPrice, $amount, $logo) {
        $sql = 'update products set name = "'. addslashes($name).'", description = "' .addslashes($description).'", category_id = "' .addslashes($categoryId).
            '", old_price = "' .addslashes($oldPrice).'", new_price = "' .addslashes($newPrice).'", amount = "' .addslashes($amount).'", image = "' .addslashes($logo).'" where id= '.$id;
        $result = $this->db->query($sql);
    }



}
