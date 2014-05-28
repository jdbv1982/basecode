<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');

// Validaciones para el modelo de usuarios (login, cambio clave, CRUD Usuario)
class UsuarioLib {

	function __construct() {
  $this->CI = & get_instance(); // Esto para acceder a la instancia que carga la librería

  $this->CI->load->model('Model_Usuario');
}

public function login($user, $pass) {
	$query = $this->CI->Model_Usuario->get_login($user, $pass);
	if($query->num_rows() > 0) {
		$usuario = $query->row();
		$datosSession = array('usuario' => $usuario->name,
			'usuario_id' => $usuario->id,
			'perfil_id' => $usuario->perfil_id,);
		$this->CI->session->set_userdata($datosSession);
		return TRUE;
	}
	else {
		$this->CI->session->sess_destroy();
		return FALSE;
	}
}

    public function cambiarPWD($act, $new) {
        if($this->CI->session->userdata('usuario_id') == null) {
            return FALSE;
        }

        $id = $this->CI->session->userdata('usuario_id');
        $usuario = $this->CI->Model_Usuario->find($id);

        if($usuario->password == $act) {
            $data = array('id' => $id,
                          'password' => $new);
            $this->CI->Model_Usuario->update($data);
        }
        else {
            return FALSE;
        }
    }
}
