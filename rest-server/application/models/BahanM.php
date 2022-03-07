<?php

class BahanM extends CI_Model
{

    public function getBahan($id = null)
    {
        if ($id === null) {
            return $this->db->get('bahan');
        } else {
            return $this->db->get_where('bahan', ['id' => $id]);
        }
    }


    public function tambahBahan($data)
    {
        $this->db->insert('bahan', $data);
        return $this->db->affected_rows();
    }


    public function updateBahan($where, $data)
    {
        $this->db->where($where);
        $this->db->update('bahan', $data);
        return $this->db->affected_rows();
    }


    public function deleteBahan($where)
    {
        $this->db->delete('bahan', $where);
        return $this->db->affected_rows();
    }
}
