<?php
class barang_model extends CI_Model {

    function data()
    {
        $this->db->order_by('id_barang','DESC');
        return $this->db->get('barang');
    }

    public function dataJoin()
    {
        $this->db->select('*');
        $this->db->from('barang as b');
        $this->db->join('jenis as j', 'j.id_jenis = b.id_jenis');
        $this->db->order_by('b.id_barang','DESC');
        return $this->db->get();
    }

    public function totalStok()
    {
        $data = $this->db
            ->select_sum('stok')
            ->from('barang')
            ->get();
        $stok = $data->row();
        return $stok->stok;
    }

    public function detail_join($where)
    {
        $this->db->select('*');
        $this->db->from('barang as b');
        $this->db->where('b.id_barang', $where);
        $this->db->join('jenis as j', 'j.id_jenis = b.id_jenis');
        $this->db->order_by('b.id_barang','DESC');
        return $this->db->get();
    }

    // Fungsi ambilFoto dihapus karena tidak ada penggunaan foto
    // public function ambilFoto($where)
    // {
    //     $this->db->order_by('id_barang','DESC');
    //     $this->db->limit(1);
    //     $query = $this->db->get_where('barang', $where);
    //     $data = $query->row();
    //     return $data->foto;
    // }

    public function ambil_stok($where)
    {
        $this->db->order_by('id_barang','DESC');
        $this->db->limit(1);
        $query = $this->db->get_where('barang', $where);
        $data = $query->row();
        return $data->stok;
    }

    public function ambilId($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
        if ($this->db->affected_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }

    public function detail_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function tambah_data($data, $table)
    {
        // Pastikan data yang dimasukkan tidak menyertakan kolom foto
        $this->db->insert($table, $data);
    }

    public function ubah_data($where, $data, $table)
    {
        // Pastikan data yang diupdate tidak menyertakan kolom foto
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function buat_kode()
    {
        $this->db->select('RIGHT(barang.id_barang,4) as kode', FALSE);
        $this->db->order_by('id_barang','DESC');
        $this->db->limit(1);
        $query = $this->db->get('barang'); // Cek apakah sudah ada kode di tabel.
        if($query->num_rows() <> 0){
            // Jika kode sudah ada.
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        }
        else {
            // Jika kode belum ada.
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = "BRG-" . $kodemax;
        return $kodejadi;
    }
}
