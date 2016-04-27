<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Defaultpage extends CI_Controller {
	function __CONSTRUCT(){
		parent::__CONSTRUCT();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('Admin');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = array(
			'status' => $this->admin->isAdminLogin()?'1':null
		);
		$this->load->view('welcome_message',$data);
	}
	public function loadEvent(){
		$this->load->model('ds_event');
		$temp = $this->ds_event->getAllData(date("Y-m-d"));
		if(count($temp) <= 0)
			exit("1<tr>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			</tr>");
		echo '1';
		$this->load->helper('date');
		foreach ($temp as $key => $value) {
			echo '<tr>';
			echo '<td>';
			echo nice_date($value['e_date'],"d-m-Y");
			echo '</td>';
			echo '<td>';
			echo $value['e_time'];
			echo '</td>';
			echo '<td>';
			echo $value['e_name_event'];
			echo '</td>';
			echo '<td>';
			echo $value['e_responsible_event'];
			echo '</td>';
			echo '</tr>';
		}
	}
}
