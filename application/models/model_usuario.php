<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Usuario extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function all() {
        $query = $this->db->get('usuario');
        return $query->result();
    }

    function find($id) {
        $this->db->where('id', $id);
        return $this->db->get('usuario')->row();
    }

    function insert($registro) {
        $this->db->set($registro);
        $this->db->insert('usuario');
    }

    function update($registro) {
        $this->db->set($registro);
        $this->db->where('id', $registro['id']);
        $this->db->update('usuario');
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('usuario');
    }

    function get_login($user, $pass) {
        $this->db->where('login', $user);
        $this->db->where('password', $pass);
        return $this->db->get('usuario');
    }

}
