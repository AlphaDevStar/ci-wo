<?php


class DashboardModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    function get_users() {
		$sql = "Select * from users where role = 0 and status = 0";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

    function get_products() {
        $sql = "Select * from products where status = 0";
        $result = $this->db->query($sql);
        return $result->num_rows();
    }

    function get_videos() {
        $sql = "Select * from videos where status = 0";
        $result = $this->db->query($sql);
        return $result->num_rows();
    }
    function get_orders() {
        $sql = "Select * from orders";
        $result = $this->db->query($sql);
        return $result->num_rows();
    }

    function get_categories() {
        $sql = "Select * from categories";
        $result = $this->db->query($sql);
        return $result->num_rows();

    }

}
