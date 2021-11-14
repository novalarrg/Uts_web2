<?php
class Uts extends CI_Controller
{
    public function index()
    {
        $data['pegawai'] = $this->M_uts->tampilUts()->result();
        $this->load->view('v_uts', $data);
    }

    public function cetak()
    {

        $this->form_validation->set_rules(
            'nip',
            'Nip',
            'trim|required|min_length[3]',
            array(
                'required' => '%s Wajib diisi.',
                'min_lenght' => '%s terlalu pendek'
            )
        );

        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required',
            array(
                'required' => '%s Wajib diisi.'
            )
        );

        $this->form_validation->set_rules(
            'status',
            'Status',
            'required',
            array(
                'required' => '%s Wajib diisi.'
            )
        );

        $this->form_validation->set_rules(
            'jabatan',
            'Jabatan',
            'required',
            array(
                'required' => '%s Wajib diisi.'
            )
        );

        $this->form_validation->set_rules(
            'gaji',
            'Gaji',
            'required',
            array(
                'required' => '%s Wajib diisi.'
            )
        );

        if ($this->form_validation->run() == false) {
            $data['pegawai'] = $this->M_uts->tampilUts()->result();
            $this->load->view('v_uts', $data);
        } else {

            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'png|jpg|gif';
            $config['max_size'] = '321024';
            $config['max_width'] = '313000';
            $new_name = time() . $_FILES['foto']['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
                $data = array('upload_data' => $this->upload->data());
                $datafoto = $this->upload->data();

                $data = array(
                    'nip' => $this->input->post('nip'),
                    'nama' => $this->input->post('nama'),
                    'status' => $this->input->post('status'),
                    'jabatan' => $this->input->post('jabatan'),
                    'gaji' => $this->input->post('gaji'),
                    'tunjangan' => $this->input->post('tunjangan'),
                    'foto' => $datafoto['file_name']
                );
            }

            $proses = $this->M_uts->simpanUts($data);
            redirect('Uts/index/');
        }
    }

    public function hapus()
    {
        $where = ['nip' => $this->uri->segment(3)];
        $this->M_uts->hapusUts($where);
        redirect('Uts/index/');
    }

    public function edit()
    {
        $pegawai = $this->M_uts->pegawaiWhere(['nip' => $this->uri->segment(3)])->result_array();
        $data = array(
            "nip" => $pegawai[0]['nip'],
            "nama" => $pegawai[0]['nama'],
            "status" => $pegawai[0]['status'],
            "jabatan" => $pegawai[0]['jabatan'],
            "gaji" => $pegawai[0]['gaji'],
            "tunjangan" => $pegawai[0]['tunjangan'],
            "foto" => $pegawai[0]['foto'],
        );
        $this->load->view('v_uts_edit', $data);
    }

    public function update()
    {
        $this->form_validation->set_rules(
            'nip',
            'Nip',
            'trim|required|min_length[3]',
            array(
                'required' => '%s Wajib diisi.',
                'min_lenght' => '%s terlalu pendek'
            )
        );

        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required',
            array(
                'required' => '%s Wajib diisi.'
            )
        );

        $this->form_validation->set_rules(
            'status',
            'Status',
            'required',
            array(
                'required' => '%s Wajib diisi.'
            )
        );

        $this->form_validation->set_rules(
            'jabatan',
            'Jabatan',
            'required',
            array(
                'required' => '%s Wajib diisi.'
            )
        );

        $this->form_validation->set_rules(
            'gaji',
            'Gaji',
            'required',
            array(
                'required' => '%s Wajib diisi.'
            )
        );

        if ($this->form_validation->run() == false) {
            $data['pegawai'] = $this->M_uts->tampilUts()->result();
            $this->load->view('v_uts', $data);
        } else {

            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'png|jpg|gif';
            $config['max_size'] = '321024';
            $config['max_width'] = '313000';
            $new_name = time() . $_FILES['foto']['name'];
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {

                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {

                $data = array('upload_data' => $this->upload->data());
                $datafoto = $this->upload->data();

                $data = array(
                    'nip' => $this->input->post('nip'),
                    'nama' => $this->input->post('nama'),
                    'status' => $this->input->post('status'),
                    'jabatan' => $this->input->post('jabatan'),
                    'gaji' => $this->input->post('gaji'),
                    'tunjangan' => $this->input->post('tunjangan'),
                    'foto' => $datafoto['file_name']
                );
                $where = array('nip' => $this->input->post('nip'));
            }

            $proses = $this->M_uts->updateUts($data, $where);
            redirect('Uts/index/');
        }
    }
}
