<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        check_dokter();
        $this->load->model(['ChatModel', 'OuthModel', 'UserModel']);
        $this->load->helper('string');
    }

    public function index()
    {
        $ambil = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Eldora Vet Clinic - Dokter';
        $data['dokter'] = $ambil;

        $this->load->view('dokter/templates/header', $data);
        $this->load->view('dokter/templates/sidebar', $data);
        $this->load->view('dokter/templates/topbar', $data);
        $this->load->view('dokter/index', $data);
        $this->load->view('dokter/templates/footer');
    }

    public function jadwal()
    {
        $ambil = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Eldora Vet Clinic - Dokter';
        $data['dokter'] = $ambil;

        $this->load->view('dokter/templates/header', $data);
        $this->load->view('dokter/templates/sidebar', $data);
        $this->load->view('dokter/templates/topbar', $data);
        $this->load->view('dokter/jadwal', $data);
        $this->load->view('dokter/templates/footer');
    }

    public function konsultasi_online()
    {
        $ambil = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Eldora Vet Clinic - Dokter';
        $data['dokter'] = $ambil;

        $data['strTitle'] = '';
        $data['strsubTitle'] = '';
        $list = [];
        if ($this->session->userdata['role_id'] == 2) {
            $list = $this->UserModel->VendorsList();
            $data['strTitle'] = 'List Dokter';
            $data['strsubTitle'] = 'Dokter';
            $data['chatTitle'] = 'Pilih Dokter untuk Chat';
        }
        if ($this->session->userdata['role_id'] == 3) {
            $list = $this->UserModel->ClientsListCs();
            $data['strTitle'] = 'List Member';
            $data['strsubTitle'] = 'Member';
            $data['chatTitle'] = 'Pilih Member untuk Chat';
        }
        $vendorslist = [];
        foreach ($list as $u) {
            $vendorslist[] = [
                'id' => $this->OuthModel->Encryptor('encrypt', $u['id']),
                'nama' => $u['nama'],
                'gambar' => $this->UserModel->PictureUrlById($u['id']),
            ];
        }
        $data['vendorslist'] = $vendorslist;

        $this->load->view('dokter/templates/header', $data);
        $this->load->view('dokter/templates/sidebar', $data);
        $this->load->view('dokter/templates/topbar', $data);
        $this->parser->parse('dokter/konsultasi-online', $data);
        $this->load->view('dokter/templates/footer');
    }

    public function send_text_message()
    {
        $post = $this->input->post();
        $messageTxt = $this->input->post('message', true);
        $attachment_name = '';
        $file_ext = '';
        $mime_type = '';

        if (isset($post['type']) == 'Attachment') {
            $AttachmentData = $this->ChatAttachmentUpload();
            //print_r($AttachmentData);
            $attachment_name = $AttachmentData['file_name'];
            $file_ext = $AttachmentData['file_ext'];
            $mime_type = $AttachmentData['file_type'];
        } else {
            $messageTxt = reduce_multiples($post['messageTxt'], ' ');
        }

        $data = [
            'sender_id' => $this->session->userdata['id'],
            'receiver_id' => $this->OuthModel->Encryptor('decrypt', $post['receiver_id']),
            'message' =>   $messageTxt,
            'attachment_name' => $attachment_name,
            'file_ext' => $file_ext,
            'mime_type' => $mime_type,
            'message_date_time' => date('Y-m-d H:i:s'), //23 Jan 2:05 pm
            'ip_address' => $this->input->ip_address(),
        ];

        $this->db->insert('chat', $data);

        $query = $this->ChatModel->SendTxtMessage($this->OuthModel->xss_clean($data));
        $response = '';
        if ($query == true) {
            $response = ['status' => 1, 'message' => ''];
        } else {
            $response = ['status' => 0, 'message' => 'sorry we re having some technical problems. please try again !'];
        }

        echo json_encode($response);
    }

    public function ChatAttachmentUpload()
    {
        $file_data = '';
        if (isset($_FILES['attachmentfile']['name']) && !empty($_FILES['attachmentfile']['name'])) {
            $config['upload_path']          = './uploads/attachment';
            $config['allowed_types']        = 'jpeg|jpg|png|txt|pdf|docx|xlsx|pptx|rtf';
            //$config['max_size']             = 500;
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('attachmentfile')) {
                echo json_encode([
                    'status' => 0,
                    'message' => '<span style="color:#900;">' . $this->upload->display_errors() . '<span>'
                ]);
                die;
            } else {
                $file_data = $this->upload->data();
                //$filePath = $file_data['file_name'];
                return $file_data;
            }
        }
    }

    public function get_chat_history_by_vendor()
    {
        $receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id'));

        $Logged_sender_id = $this->session->userdata['id'];

        $history = $this->ChatModel->GetReciverChatHistory($receiver_id);
        //print_r($history);
        foreach ($history as $chat) :

            $message_id = $this->OuthModel->Encryptor('encrypt', $chat['id']);
            $sender_id = $chat['sender_id'];
            $userName = $this->UserModel->GetName($chat['sender_id']);
            $userPic = $this->UserModel->PictureUrlById($chat['sender_id']);

            $message = $chat['message'];
            $messagedatetime = date('d M H:i A', strtotime($chat['message_date_time']));

?>
            <?php
            $messageBody = '';
            if ($message == 'NULL') { //fetach media objects like images,pdf,documents etc
                $classBtn = 'right';
                if ($Logged_sender_id == $sender_id) {
                    $classBtn = 'left';
                }

                $attachment_name = $chat['attachment_name'];
                $file_ext = $chat['file_ext'];
                $mime_type = explode('/', $chat['mime_type']);

                $document_url = base_url('uploads/attachment/' . $attachment_name);

                if ($mime_type[0] == 'image') {
                    $messageBody .= '<img src="' . $document_url . '" onClick="ViewAttachmentImage(' . "'" . $document_url . "'" . ',' . "'" . $attachment_name . "'" . ');" class="attachmentImgCls">';
                } else {
                    $messageBody = '';
                    $messageBody .= '<div class="attachment">';
                    $messageBody .= '<h4>Attachments:</h4>';
                    $messageBody .= '<p class="filename">';
                    $messageBody .= $attachment_name;
                    $messageBody .= '</p>';

                    $messageBody .= '<div class="pull-' . $classBtn . '">';
                    $messageBody .= '<a download href="' . $document_url . '"><button type="button" id="' . $message_id . '" class="btn btn-primary btn-sm btn-flat btnFileOpen">Open</button></a>';
                    $messageBody .= '</div>';
                    $messageBody .= '</div>';
                }
            } else {
                $messageBody = $message;
            }
            ?>

            <?php if ($Logged_sender_id != $sender_id) { ?>
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"><?= $userName; ?></span>
                        <span class="direct-chat-timestamp pull-right"><?= $messagedatetime; ?></span>
                    </div>
                    <!-- /.direct-chat-info -->
                    <img class="direct-chat-img" src="<?= $userPic; ?>" alt="<?= $userName; ?>">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        <?= $messageBody; ?>
                    </div>
                    <!-- /.direct-chat-text -->

                </div>
                <!-- /.direct-chat-msg -->
            <?php } else { ?>
                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                    <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right"><?= $userName; ?></span>
                        <span class="direct-chat-timestamp pull-left"><?= $messagedatetime; ?></span>
                    </div>
                    <!-- /.direct-chat-info -->
                    <img class="direct-chat-img" src="<?= $userPic; ?>" alt="<?= $userName; ?>">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                        <?= $messageBody; ?>
                    </div>
                    <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->
            <?php } ?>

<?php
        endforeach;
    }

    public function chat_clear_client_cs()
    {
        $receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id'));
        $messagelist = $this->ChatModel->GetReciverMessageList($receiver_id);

        foreach ($messagelist as $row) {
            if ($row['message'] == 'NULL') {
                $attachment_name = unlink('uploads/attachment/' . $row['attachment_name']);
            }
        }

        $this->ChatModel->TrashById($receiver_id);
    }

    public function medical_record()
    {
        $ambil = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Eldora Vet Clinic - Dokter';
        $data['dokter'] = $ambil;

        $this->load->view('dokter/templates/header', $data);
        $this->load->view('dokter/templates/sidebar', $data);
        $this->load->view('dokter/templates/topbar', $data);
        $this->load->view('dokter/medical-record', $data);
        $this->load->view('dokter/templates/footer');
    }

    public function edit_profile()
    {
        $ambil = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Eldora Vet Clinic - Edit Profil';
        $data['dokter'] = $ambil;

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'trim|required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('kota', 'kota', 'trim|required');


        if ($this->form_validation->run() == false) {
            $this->load->view('dokter/templates/header', $data);
            $this->load->view('dokter/templates/sidebar', $data);
            $this->load->view('dokter/templates/topbar', $data);
            $this->load->view('dokter/edit-dokter', $data);
            $this->load->view('dokter/templates/footer');
        } else {
            $this->authen->editMember();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Informasi akun kamu telah diubah. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('dokter');
        }
    }
}
