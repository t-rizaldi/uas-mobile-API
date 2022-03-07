<?php

class BumbuM extends CI_Model
{

    public function getBumbu($id = null)
    {
        if ($id === null) {
            return $this->db->get('bumbu');
        } else {
            return $this->db->get_where('bumbu', ['id' => $id]);
        }
    }


    public function tambahBumbu($data)
    {
        $this->db->insert('bumbu', $data);
        return $this->db->affected_rows();
    }


    public function updateBumbu($where, $data)
    {
        $this->db->where($where);
        $this->db->update('bumbu', $data);
        return $this->db->affected_rows();
    }


    public function deleteBumbu($where)
    {
        $this->db->delete('bumbu', $where);
        return $this->db->affected_rows();
    }
}
