<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Logout
 *
 * @author Amir <amirsanni@gmail.com>
 * Date: 30th Dec, 2016
 */

class Logout extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    session_destroy();
    $this->session->set_userdata([]);

    redirect(base_url());
  }
}
