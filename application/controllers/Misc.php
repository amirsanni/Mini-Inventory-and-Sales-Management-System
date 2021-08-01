<?php
defined('BASEPATH') OR exit('');

/**
 * Description of Misc
 * Do not check login status in the constructor of this class and some functions are to be accessed even without logging in
 *
 * @author Amir <amirsanni@gmail.com>
 * date 17th Feb. 2016
 */
class Misc extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    
    public function totalEarnedToday(){
        $this->genlib->checkLogin();
        
        $this->genlib->ajaxOnly();
        
        $this->load->model('transaction');
        
        $total_earned_today = $this->transaction->totalEarnedToday();
        
        $json['totalEarnedToday'] = $total_earned_today ? number_format($total_earned_today, 2) : "0.00";
        
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }
	
	
	
    /**
     * check if admin's session is still on
     */
    public function check_session_status(){
        if(isset($_SESSION['admin_id']) && ($_SESSION['admin_id'] !== false) && ($_SESSION['admin_id'] !== "")){
            $json['status'] = 1;
            
            //update user's last seen time
            //update_last_seen_time($id, $table_name)
            $this->genmod->update_last_seen_time($_SESSION['admin_id'], 'admin');
        }
        
        else{
            $json['status'] = 0;
        }
        
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }
    
    
    
    public function dbmanagement(){
        $this->genlib->checkLogin();
        
        $this->genlib->superOnly();
        
        $data['pageContent'] = $this->load->view('dbbackup', '', TRUE);
        $data['pageTitle'] = "Database";
        
        $this->load->view('main', $data);
    }
    
    
    public function dldb(){
        $this->genlib->checkLogin();
        
        $this->genlib->superOnly();
        
        $file_path = BASEPATH . "sqlite/1410inventory.sqlite";//link to db file
        
        $this->output->set_content_type('')->set_output(file_get_contents($file_path));
    }
    
    
    
    
    /**
     * 
     */
    public function importdb(){
        $this->genlib->checkLogin();
        
        $this->genlib->superOnly();
        
        //create a copy of the db file currently in the sqlite dir for keep in case something go wrong
        if(file_exists(BASEPATH."sqlite/1410inventory.sqlite")){
            copy(BASEPATH."sqlite/1410inventory.sqlite", BASEPATH."sqlite/backups/".time().".sqlite");
        }
        
        $config['upload_path'] = BASEPATH . "sqlite/";//db files are stored in the basepath
        $config['allowed_types'] = 'sqlite';
        $config['file_ext_tolower'] = TRUE;
        $config['file_name'] = "1410inventory.sqlite";
        $config['max_size'] = 2000;//in kb
        $config['overwrite'] = TRUE;//overwrite the previous file

        $this->load->library('upload', $config);//load CI's 'upload' library

        $this->upload->initialize($config, TRUE);

        if($this->upload->do_upload('dbfile') == FALSE){
            $json['msg'] = $this->upload->display_errors();
            $json['status'] = 0;
        }

        else{
            $json['status'] = 1;
        }
        
        //set final output
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }
}
