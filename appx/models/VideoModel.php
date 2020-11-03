<?php


class VideoModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    function get_video_count($name) {
		$sql = "Select * from videos where name = '".$name."' and status = 0";
		$result = $this->db->query($sql);
		return $result->num_rows();
	}

	function add($productId, $name, $desc, $video) {
        $sql = 'Insert into videos (category_id, title, description,video, reg_date) values ("'.addslashes($productId).'", "'
            .addslashes($name).'", "'.addslashes($desc).'", "'.addslashes($video).'", "'.date("Y-m-d h:i:s").'")';
        $this->db->query($sql);
    }

    function update($id, $name, $desc) {
        $sql = 'update videos set name = "'. addslashes($name).'", description = "' .addslashes($desc).'" where id= '.$id;
        $result = $this->db->query($sql);
    }

    function delete($id) {
        $sql = "update videos set status = 1 where id= $id";
        $result = $this->db->query($sql);
        return $result;
    }

    function get_all_video() {
        $sql = "Select * from videos where status = 0";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    function get_with_id($id) {
        $sql = "Select v.description as v_description, v.*, p.* from videos as v 
                    join products as p on v.category_id = p.id where v.id = $id";
        $result = $this->db->query($sql);
        return $result->result_array()[0];
    }



}
