<?php

class LangkahM extends CI_Model
{

    public function getLangkah($id = null)
    {
        if ($id === null) {
            return $this->db->get('langkah');
        } else {
            return $this->db->get_where('langkah', ['id' => $id]);
        }
    }


    public function tambahLangkah($data)
    {
        $this->db->insert('langkah', $data);
        return $this->db->affected_rows();
    }


    public function updateLangkah($where, $data)
    {
        $this->db->where($where);
        $this->db->update('langkah', $data);
        return $this->db->affected_rows();
    }


    public function deleteLangkah($where)
    {
        $this->db->delete('langkah', $where);
        return $this->db->affected_rows();
    }
}
