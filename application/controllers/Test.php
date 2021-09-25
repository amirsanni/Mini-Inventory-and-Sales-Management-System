<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Test
 *
 * @author Amir <amirsanni@gmail.com>
 * Date: Dec 31st, 2015
 */

class Test extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }


  public function index()
  {
    echo password_hash("123456", PASSWORD_BCRYPT);
  }

  public function newhex()
  {
    echo md5(time());
  }


  public function a()
  {
    $this->load->view('test');
  }
}
