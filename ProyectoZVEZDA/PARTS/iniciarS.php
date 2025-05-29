<div class="container p-2 my-3 border text-center mt-auto" style="width:450px">
  <img src="IMG/Ceti.webp" width="100" height="100" class="rounded-circle mt-3">
  <form action="BDD/vUser.php" class="needs-validation mt-4" method="post" novalidate>
    <div class="form-group contenido-texto">
      <label for="uname">Usuario:</label>
      <input type="text" class="form-control" id="uname" placeholder="" name="uname" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Por favor, escriba un usuario valido.</div>
    </div>
    <div class="form-group contenido-texto">
      <label for="pwd">Contraseña:</label>
      <input type="password" class="form-control" id="pwd" placeholder="" name="pwd" required>
      <div class="valid-feedback">Validado.</div>
      <div class="invalid-feedback">Por favor, escriba una contraseña valida.</div>
    </div>
    <div class="form-group contenido-texto align-items-center">
      <p>¿Aun no tienes una cuenta?
      <a class="nav-link" href="login.php?action=register">Regístrate</a>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>