<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Kendaraan';

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('layout/topbar', $data);
        $this->load->view('kendaraan/index', $data);
        $this->load->view('layout/footer');
    }
    
    public function list_kendaraan()
    {
        $this->load->model('Kendaraan_model');
        $list = $this->Kendaraan_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        $urut = 1;
        foreach ($list as $Kendaraan_model) {
            $no++;
            $row = array();
            $row[] = $urut++;
            $row[] = $Kendaraan_model->nama_kendaraan;
            $row[] = $Kendaraan_model->plat;
            $row[] = $Kendaraan_model->warna;
            $row[] = $Kendaraan_model->merk;
            $row[] = $Kendaraan_model->jenis;
            $row[] = $Kendaraan_model->status;
            if($Kendaraan_model->image)
                $row[] = '<a href="'.base_url('images/kendaraan/'.$Kendaraan_model->image).'" target="_blank"><img src="'.base_url('images/'.$Kendaraan_model->image).'" class="img-responsive" width="100px"/></a>';
            else
                $row[] = '(No photo)';

            //add html for action
            $row[] = '
            <a class="btn btn-primary btn-circle btn-sm" href="javascript:void(0)" title="Lihat" onclick="lihat_kendaraan('."'".$Kendaraan_model->id_kendaraan."'".')"><i class="fas fa-eye"></i></a>
            <a class="btn btn-success btn-circle btn-sm" href="javascript:void(0)" title="Edit" onclick="edit_kendaraan('."'".$Kendaraan_model->id_kendaraan."'".')"><i class="fas fa-pen"></i></a>
            <a class="btn btn-danger btn-circle btn-sm" href="javascript:void(0)" title="Hapus" onclick="delete_kendaraan('."'".$Kendaraan_model->id_kendaraan."'".')"><i class="fas fa-trash"></i></a>';
        
            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Kendaraan_model->count_all(),
                        "recordsFiltered" => $this->Kendaraan_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }


    public function tambah_kendaraan()
    {
        $this->load->model('Kendaraan_model');
        $this->_validate_kendaraan();
        
        $data = array(
                'nama_kendaraan' => $this->input->post('namaKendaraan'),
                'plat' => $this->input->post('plat'),
                'warna' => $this->input->post('warna'),
                'merk' => $this->input->post('merk'),
                'jenis' => $this->input->post('jenis'),
            );

        if(!empty($_FILES['photo']['name']))
        {
            $upload = $this->_do_upload();
            $data['image'] = $upload;
        }

        $insert = $this->Kendaraan_model->save($data);

        echo json_encode(array("status" => TRUE));
    }

    public function delete_kendaraan($id_kendaraan)
    {
        //delete file
        $this->load->model('Kendaraan_model');
        $Kendaraan_model = $this->Kendaraan_model->get_by_id($id_kendaraan);
        
        $this->Kendaraan_model->delete_by_id($id_kendaraan);
        echo json_encode(array("status" => TRUE));
    }

    private function _do_upload()
    {
        $config['upload_path']          = 'images/kendaraan/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2024; 
        $config['max_width']            = 5000; 
        $config['max_height']           = 5000; 
        $config['file_name']            = round(microtime(true) * 1000);

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('image')) 
        {
            $data['inputerror'][] = 'image';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        return $this->upload->data('file_name');
    }

    private function _validate_kendaraan()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        if($this->input->post('namaKendaraan') == '')
        {
            $data['inputerror'][] = 'namaKendaraan';
            $data['error_string'][] = 'Nama Kendaraan is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('plat') == '')
        {
            $data['inputerror'][] = 'plat';
            $data['error_string'][] = 'Plat Kendaraan is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('warna') == '')
        {
            $data['inputerror'][] = 'warna';
            $data['error_string'][] = 'Warna Kendaraan is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('merk') == '')
        {
            $data['inputerror'][] = 'merk';
            $data['error_string'][] = 'Merk is required';
            $data['status'] = FALSE;
        }

        if($this->input->post('jenis') == '')
        {
            $data['inputerror'][] = 'jenis';
            $data['error_string'][] = 'Jenis Kendaraan is required';
            $data['status'] = FALSE;
        }

        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
}
