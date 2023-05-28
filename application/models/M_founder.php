<?php


/**
 *
 * class for manage product model
 *
 */
class M_founder extends CI_Model
{
    // table are used in this model
    private $table = 'founder';

    public function get()
    {
        return $this->db->get($this->table)->result();
    }
    public function is_admin($id_user)
    {
        return $this->db->where(['id_user' => $id_user])->get($this->table)->row() ? true : false;
    }
    public function update($where, $data)
    {
        $this->db->where($where)->update($this->table, $data);
    }

    public function count()
    {
        return $this->db->get($this->table)->num_rows();
    }
}
