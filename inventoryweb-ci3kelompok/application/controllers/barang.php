<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('download');
        $this->load->library('pagination');
        $this->load->helper('cookie');
        $this->load->model('barang_model');
        $this->load->model('jenis_model');
    }
    
    public function index()
    {
        $data['title']  = 'Barang';
        $data['barang'] = $this->barang_model->dataJoin()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('barang/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Barang';
        // Data untuk select jenis
        $data['jenis'] = $this->jenis_model->data()->result();
        
        $this->load->view('templates/header', $data);
        $this->load->view('barang/form_tambah');
        $this->load->view('templates/footer');
    }
    
    public function ubah($id)
    {
        $data['title'] = 'Barang';
        // Menampilkan data berdasarkan id
        $where         = array('id_barang' => $id);
        $data['data']  = $this->barang_model->detail_data($where, 'barang')->result();
        
        // Data untuk select jenis
        $data['jenis'] = $this->jenis_model->data()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('barang/form_ubah');
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Barang';
        // Menampilkan data berdasarkan id
        $data['data']  = $this->barang_model->detail_join($id)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('barang/detail');
        $this->load->view('templates/footer');
    }

    public function proses_tambah()
    {
        $kode   = $this->barang_model->buat_kode();
        $barang = $this->input->post('barang');
        $stok   = $this->input->post('stok');
        $jenis  = $this->input->post('jenis');
        
        // Karena tidak ada kolom foto, jangan sertakan key 'foto'
        $data = array(
            'id_barang'   => $kode,
            'nama_barang' => $barang,
            'stok'        => $stok,
            'id_jenis'    => $jenis
        );

        $this->barang_model->tambah_data($data, 'barang');
        $this->session->set_flashdata('Pesan','<script>
            $(document).ready(function() {
                swal.fire({
                    title: "Berhasil ditambahkan!",
                    icon: "success",
                    confirmButtonColor: "#4e73df"
                });
            });
            </script>');
        redirect('barang');
    }

    public function proses_ubah()
    {
        $kode   = $this->input->post('idbarang');
        $barang = $this->input->post('barang');
        $stok   = $this->input->post('stok');
        $jenis  = $this->input->post('jenis');
        
        // Karena tidak ada kolom foto, kita hanya update data barang tanpa foto
        $data = array(
            'nama_barang' => $barang,
            'stok'        => $stok,
            'id_jenis'    => $jenis
        );

        $where = array(
            'id_barang' => $kode
        );

        $this->barang_model->ubah_data($where, $data, 'barang');
        $this->session->set_flashdata('Pesan','<script>
            $(document).ready(function() {
                swal.fire({
                    title: "Berhasil diubah!",
                    icon: "success",
                    confirmButtonColor: "#4e73df"
                });
            });
            </script>');
        redirect('barang');
    }

    public function proses_hapus($id)
    {
        $where = array('id_barang' => $id);
        // Karena tidak ada kolom foto, tidak perlu menghapus file foto
        $this->barang_model->hapus_data($where, 'barang');

        $this->session->set_flashdata('Pesan','<script>
            $(document).ready(function() {
                swal.fire({
                    title: "Berhasil dihapus!",
                    icon: "success",
                    confirmButtonColor: "#4e73df"
                });
            });
            </script>');
        redirect('barang');
    }

    public function getData()
    {
        $id    = $this->input->post('id');
        $where = array('id_barang' => $id);
        $data  = $this->barang_model->detail_data($where, 'barang')->result();
        echo json_encode($data);
    }
}
