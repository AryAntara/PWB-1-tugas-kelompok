<?php

/**
 *
 * class for manage product model
 *
 */
class M_kategori extends CI_Model
{
    // table are used in this model
    private $table = 'kategori';

    public function get()
    {
        return $this->db->get($this->table)->result();
    }

    public function count()
    {
        return $this->db->get($this->table)->num_rows();
    }
}
