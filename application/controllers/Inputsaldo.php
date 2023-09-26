<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inputsaldo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        // if (!is_admin()) {
        //     redirect('dashboard');
        // }

       
        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $role = $this->session->userdata('login_session')['role'];
        
     
        $data['title'] = "Input Saldo";
        $data['coa'] = $this->admin->getcoa();
        if (is_admin() == true) {
            $data['input_saldo'] = $this->admin->get("input_saldo_keuangan");
        }else{
        $data['input_saldo'] = $this->admin->get("input_saldo_".$role);
        }
        $this->template->load('templates/dashboard', 'inputsaldo/data', $data);


        $INDUK_COA = $this->input->post('INDUK_COA');
        $JUMLAH_TAMBAH = $this->input->post('JUMLAH_TAMBAH');
        $TOTAL_SALDO = 10;
        $TGL_INPUT = $this->input->post('TGL_INPUT');

        $keyword = $this->input->post('BAGIAN');
        // var_dump($keyword);die();

        

        // $penjumlahan = $JUMLAH_TAMBAH + $TOTAL_SALDO;
        // var_dump($penjumlahan);die();


        
        // $query = $this->db->query("UPDATE input_saldo_.$role set TOTAL_SALDO = $saldotambah where INDUK_COA = $INDUK_COA");

        // print_r($INDUK_COA);
        // print_r($JUMLAH_TAMBAH);
        // print_r($TGL_INPUT);
        // die();       
        

    }

    public function search()
	{
		$keyword = $this->input->post('BAGIAN');
        // var_dump($keyword);die();
		
		$data['input_saldo']=$this->admin->get_keyword($keyword);
				
        $this->template->load('templates/dashboard', 'inputsaldo/data', $data);
	
	}

    


    private function _validasi($mode)
    {   
        $role = $this->session->userdata('login_session')['role'];
        
        $this->form_validation->set_rules('SALDO_AWAL', 'Saldo Awal', 'required|trim');

        if ($mode == 'add') {
        
            $this->form_validation->set_rules('SALDO_AWAL', 'Saldo Awal', 'required|trim');
        } else {
            
            $db = $this->admin->get("input_saldo_".$role, ['INDUK_COA' => $this->input->post('INDUK_COA', true)]);
            $INDUK_COA = $this->input->post('INDUK_COA', true);

            $uniq_INDUK_COA = $db['INDUK_COA'] == $INDUK_COA ? '' : '|is_unique[input_saldo_$role.INDUK_COA]';

            $this->form_validation->set_rules('INDUK_COA', 'INDUK_COA', 'required|trim|alpha_numeric' . $uniq_INDUK_COA);
        }
    }

    public function add()
    {
        $this->_validasi('add');
        $role = $this->session->userdata('login_session')['role'];


        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Master Saldo";
            $data['coa'] = $this->admin->getcoa();
            $data['subcoa1'] = $this->admin->getsubcoa1();
            $data['subcoa2'] = $this->admin->getsubcoa2();
            $this->template->load('templates/dashboard', 'inputsaldo/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'INDUK_COA'          => $input['INDUK_COA'],
                'NAMA_PERKIRAAN'          => $input['NAMA_PERKIRAAN'],
                'BAGIAN'          => $input['BAGIAN'],
                'SALDO_AWAL'      => $input['SALDO_AWAL'],
                'TOTAL_SALDO'       => $input['SALDO_AWAL'],
                'TGL_INPUT'       => $input['TGL_INPUT']
            ];

            if ($this->admin->insert("input_saldo_".$role , $input_data)) {
                set_pesan('data berhasil disimpan.');
                redirect('inputsaldo');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('inputsaldo/add');
            }
        }
    }
    

    public function edit($getId)
    {
        $role = $this->session->userdata('login_session')['role'];

        $id = encode_php_tags($getId);
        $this->_validasi('edit');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit  Master Saldo";
            $data['inputsaldo'] = $this->admin->get('input_saldo_' , ['id' => $id]);
            $this->template->load('templates/dashboard', 'inputsaldo/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'INDUK_COA'          => $input['INDUK_COA'],
                'NAMA_PERKIRAAN'          => $input['NAMA_PERKIRAAN'],
                'BAGIAN'          => $input['BAGIAN'],
                'SALDO_AWAL'      => $input['SALDO_AWAL'],
                'TOTAL_SALDO'       => $input['SALDO_AWAL'],
                'TGL_INPUT'       => $input['TGL_INPUT']
 
            ];

            if ($this->admin->update("input_saldo_".$role , 'id', $id, $input_data)) {
                set_pesan('data berhasil diubah.');
                redirect('inputsaldo');
            } else {
                set_pesan('data gagal diubah.', false);
                redirect('inputsaldo/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $role = $this->session->userdata('login_session')['role'];

        $id = encode_php_tags($getId);
        if ($this->admin->delete("input_saldo_".$role , 'id', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('inputsaldo');
    }

    // public function toggle($getId)
    // {
    //     $id = encode_php_tags($getId);
    //     $status = $this->admin->get('user', ['id_user' => $id])['is_active'];
    //     $toggle = $status ? 0 : 1; //Jika user aktif maka nonaktifkan, begitu pula sebaliknya
    //     $pesan = $toggle ? 'user diaktifkan.' : 'user dinonaktifkan.';

    //     if ($this->admin->update('user', 'id_user', $id, ['is_active' => $toggle])) {
    //         set_pesan($pesan);
    //     }
    //     redirect('user');
    // }
}
