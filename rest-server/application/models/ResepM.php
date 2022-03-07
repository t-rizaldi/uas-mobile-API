<?php

class ResepM extends CI_Model
{

    public function getResep($id = null)
    {
        if ($id === null) {
            $this->db->select('resep.*, bahan.bahan, bahan.satuan as bahan_satuan, bahan.jumlah as bahan_jumlah, bumbu.bumbu, bumbu.jumlah as bumbu_jumlah, langkah.langkah');
            $this->db->from('resep');
            $this->db->join('bahan', 'resep.id = bahan.id_resep', 'left');
            $this->db->join('bumbu', 'resep.id = bumbu.id_resep', 'left');
            $this->db->join('langkah', 'resep.id = langkah.id_resep', 'left');
            return $this->db->get();
        } else {
            $this->db->select('resep.*, bahan.bahan, bahan.satuan as bahan_satuan, bahan.jumlah as bahan_jumlah, bumbu.bumbu, bumbu.jumlah as bumbu_jumlah, langkah.langkah');
            $this->db->from('resep');
            $this->db->where(['resep.id' => $id]);
            $this->db->join('bahan', 'resep.id = bahan.id_resep', 'left');
            $this->db->join('bumbu', 'resep.id = bumbu.id_resep', 'left');
            $this->db->join('langkah', 'resep.id = langkah.id_resep', 'left');
            return $this->db->get();
        }
    }


    public function tambahResep($data)
    {
        $this->db->insert('resep', $data);
        return $this->db->affected_rows();
    }


    public function updateResep($where, $data)
    {
        $this->db->where($where);
        $this->db->update('resep', $data);
        return $this->db->affected_rows();
    }


    public function deleteResep($where)
    {
        $this->db->delete('resep', $where);
        return $this->db->affected_rows();
    }
}
