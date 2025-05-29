<script src="JS/icono.js"></script>
  <script>
    function guardarPreferencias() {
        sessionStorage.setItem('mouse', mouse);
        sessionStorage.setItem('dislexia', dislexia);
        sessionStorage.setItem('numero', numero);
    }

    function cargarPreferencias() {
        mouse = parseInt(sessionStorage.getItem('mouse')) || 1;
        dislexia = parseInt(sessionStorage.getItem('dislexia')) || 3;
        numero = parseInt(sessionStorage.getItem('numero')) || 2;
    }    

    function aplicarCambiosEstilo(cambio) {
        actualizarEstilo(cambio);
        guardarPreferencias();
    }

    window.addEventListener('load', function () {
        cargarPreferencias();
        VistaAnterior();
    });
</script>