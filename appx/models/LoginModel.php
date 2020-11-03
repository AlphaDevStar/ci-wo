<?php

class LoginModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    function getMember($account, $password = null)
    {
        $sql = "select a.* from users as a";

        $sql .= " where a.email = '$account' ";
        if ($password != null)
            $sql .= " and a.password = '$password'";

        $result = $this->db->query($sql);
        return $result->row();
    }

}
