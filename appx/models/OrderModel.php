<?php


class OrderModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    function get_all_orders() {
		$sql = "Select * from orders  as o join products as p on p.id = o.product_id where o.status != 2";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
}
