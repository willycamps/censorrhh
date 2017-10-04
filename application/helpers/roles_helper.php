<?php

	function validarRol($rolesAdmitidosArry, $rolActual) {
		if (!in_array($rolActual, $rolesAdmitidosArry)) {
			redirect('forbidden',$rolActual);
		}
	}

	function validarRolUrl($rolesAdmitidosArry, $rolActual, $redirectToUrl) {
		if(!in_array($rolActual, $rolesAdmitidosArry)) {
			redirect($redirectToUrl);
		}
	}

?>