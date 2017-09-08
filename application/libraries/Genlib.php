<?php
defined('BASEPATH') OR exit('Access Denied');
require_once './application/controllers/functions.php';

/**
 * Description of Genlib
 * Class deals with functions needed in multiple controllers to avoid repetition in each of the controllers
 *
 * @author Amir <amirsanni@gmail.com>
 */
class Genlib {
    protected $CI;
    
    public function __construct() {
        $this->CI = &get_instance();
    }

    

    /**
     * 
     * @param type $sname
     * @param type $semail
     * @param type $rname
     * @param type $remail
     * @param type $subject
     * @param type $message
     * @param type $replyToEmail
     * @param type $files
     * @return type
     */
    public function send_email($sname, $semail, $rname, $remail, $subject, $message, $replyToEmail="", $files=""){
        $this->CI->email->from($semail, $sname);
        $this->CI->email->to($remail, $rname);
        $replyToEmail ? $this->CI->email->reply_to($replyToEmail, $sname) : "";
        $this->CI->email->subject($subject);
        $this->CI->email->message($message);
        
        //include attachment if $files is set
        if($files){
            foreach($files as $fileLink){
                $this->CI->email->attach($fileLink, 'inline');
            }
        }

        $send_email = $this->CI->email->send();
        
        
        return $send_email ? TRUE : FALSE;
    }
    
    
    
    
    /**
     * 
     */
    public function superOnly() {
        //prevent access if user is not logged in or role is not "Super"
        if (empty($_SESSION['admin_id']) || (isset($_SESSION['admin_role']) && $_SESSION['admin_role'] !== "Super")) {
            redirect(base_url());
        }
    }

    
    /**
     * 
     * @return string
     */
    public function checkLogin() {
        if (empty($_SESSION['admin_id'])) {
            //redirect to log in page            
            redirect(base_url() . '?red_uri=' . uri_string()); //redirects to login page
        } 
        
        else {
            return "";
        }
    }
    
    
    

    /**
     * Ensure request is an AJAX request
     * @return string
     */
    public function ajaxOnly(){
        //display uri error if request is not from AJAX
        if(!$this->CI->input->is_ajax_request()){
            redirect(base_url());
        }
        
        else{
            return "";
        }
    } 
    
    
    
    
    /**
     * Set and return pagination configuration
     * @param type $totalRows
     * @param type $urlToCall
     * @param type $limit
     * @param type $attributes
     * @return boolean
     */
    public function setPaginationConfig($totalRows, $urlToCall, $limit, $attributes){
        $config = ['total_rows'=>$totalRows, 'base_url'=>base_url().$urlToCall, 'per_page'=>$limit, 'uri_segment'=>3,
            'num_links'=>5, 'use_page_numbers'=>TRUE, 'first_link'=>FALSE, 'last_link'=>FALSE,
            'prev_link'=>'&lt;&lt;', 'next_link'=>'&gt;&gt;', 'full_tag_open'=>"<ul class='pagination'>", 'full_tag_close'=>'</ul>', 
            'num_tag_open'=>'<li>', 'num_tag_close'=>'</li>', 'next_tag_open'=>'<li>', 'next_tag_close'=>'</li>',
            'prev_tag_open'=>'<li>', 'prev_tag_close'=>'</li>', 'cur_tag_open'=>'<li><a><b style="color:black">', 
            'cur_tag_close'=>'</b></a></li>', 'attributes'=>$attributes];
        
        
        return $config;
    }
}
