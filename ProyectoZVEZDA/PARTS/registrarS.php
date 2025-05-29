<div class="container p-2 my-3 border text-center mt-auto" style="width:450px">
  <img src="IMG/Ceti.webp" width="100" height="100" class="rounded-circle mt-3">
  <form action="BDD/nUser.php" class="needs-validation mt-4" method="post" novalidate>
  <div class="form-group contenido-texto">
      <label for="uname">Usuario:</label>
      <input type="text" class="form-control" id="uname" placeholder="" name="uname" required>
      <div class="valid-feedback">Validado.</div>
      <div class="invalid-feedback">Ingrese un nombre de 8 a 30 caracteres.</div>
    </div>
    <div class="form-group contenido-texto">
      <label for="correo">Email:</label>
      <input type="email" class="form-control" id="correo" placeholder="" name="correo" required>
      <div class="valid-feedback">Validado.</div>
      <div class="invalid-feedback">Por favor, escriba un correo valido.</div>
    </div>
    <div class="form-group contenido-texto">
      <label for="pwd">Contraseña:</label>
      <input type="password" class="form-control" id="pwd" placeholder="" name="pwd" required>
      <div class="valid-feedback">Validado.</div>
      <div class="invalid-feedback">Por favor, escriba una contraseña valida.</div>
    </div>
    <div class="form-group form-check contenido-texto">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember" required>Acepto los <button type="button" class="btn btn-link p-0" data-toggle="modal" data-target="#Terminos">Términos y condiciones</button>
        <div class="valid-feedback">Validado.</div>
        <div class="invalid-feedback">Marque esta casilla para continuar.</div>
      </label>
    </div>
    <div class="form-group contenido-texto align-items-center">
      <p>¿Ya tienes una cuenta?
      <a class="nav-link" href="login.php?action=login">Inicia sesión</a>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<div class="modal" id="Terminos">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
      
        <div class="modal-header">
          <h4 class="modal-title">Términos y condiciones:</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <p>Al utilizar esta página web para la elección de carreras, aceptas los siguientes términos y condiciones:</p>
            <ol>
               <li>La información proporcionada en la plataforma es solo para fines informativos y no garantiza la exactitud o integridad.</li>
               <li>El acceso y uso de la plataforma son gratuitos, pero la universidad se reserva el derecho de realizar cambios en cualquier momento.</li>
               <li>La universidad no se hace responsable de las decisiones tomadas con base en la información proporcionada en la plataforma.</li>
               <li>El usuario acepta respetar la propiedad intelectual de la universidad en relación con el contenido proporcionado.</li>
               <li>La universidad puede recopilar datos para mejorar la experiencia del usuario, conforme a su política de privacidad.</li>
            </ol>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
        </div>
    </div>
</div>

<script>
(function() {
  'use strict';

  function validateForm(form) {validarPass
    form.addEventListener('submit', function(event) {
      if (form.checkValidity() === false || !validarCorreo(form) || !validarNombre(form)) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  }

  function validarCorreo(form) {
    // Validar el campo de correo electrónico con una expresión regular
    var correoInput = form.querySelector('[name="correo"]');
    var correoValue = correoInput.value.trim();
    var correoPattern = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9])+\.([a-zA-Z0-9])+$/;

    if (!correoPattern.test(correoValue)) {
      // Mostrar mensaje de error
      correoInput.setCustomValidity('Por favor, ingrese un correo electrónico válido.');
      return false;
    } else {
      correoInput.setCustomValidity('');
      return true;
    }
  }

  function validarNombre(form) {
    var correoInput = form.querySelector('[name="uname"]');
    var correoValue = correoInput.value.trim();
    var correoPattern = /^.{8,30}$/;

    if (!correoPattern.test(correoValue)) {
      correoInput.setCustomValidity('Ingrese un nombre de 8 a 30 caracteres.');
      return false;
    } else {
      correoInput.setCustomValidity('');
      return true;
    }
  }

  // Añadir eventos de validación para cada formulario
  var forms = document.querySelectorAll('.needs-validation');
  forms.forEach(function(form) {
    validateForm(form);
  });

  // Añadir cualquier otra lógica necesaria después de cargar la página
  window.addEventListener('load', function() {
    // Otro código si es necesario
  }, false);
})();
</script>