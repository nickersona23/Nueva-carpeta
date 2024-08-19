<p class='success-message' id='success-message'>Cerrar sesión exitoso. Redirigiendo al inicio...</p>
<script>
    document.getElementById('success-message').style.display = 'block';
    setTimeout(function(){
        window.location.href = 'index.php';
    }, 3000); // 3 segundos de espera
</script>
