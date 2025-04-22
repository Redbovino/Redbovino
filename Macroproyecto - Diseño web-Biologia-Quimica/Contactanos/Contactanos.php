<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = htmlspecialchars($_POST["nombre"]);
    $email = htmlspecialchars($_POST["email"]);
    $asunto = htmlspecialchars($_POST["asunto"]);
    $mensaje = htmlspecialchars($_POST["mensaje"]);

    // Correo de destino (cámbialo por tu correo)
    $destinatario = "redbovino@gmail.com";

    // Asunto del correo
    $asunto_correo = "Nuevo mensaje de contacto: $asunto";

    // Cuerpo del mensaje
    $cuerpo = "
        <h2>Nuevo mensaje de contacto</h2>
        <p><strong>Nombre:</strong> $nombre</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Asunto:</strong> $asunto</p>
        <p><strong>Mensaje:</strong></p>
        <p>$mensaje</p>
    ";

    // Cabeceras para el correo HTML
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "From: $nombre <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Enviar el correo
    $envio = mail($destinatario, $asunto_correo, $cuerpo, $headers);

    if ($envio) {
        echo "<script>alert('¡Mensaje enviado con éxito!'); window.location.href = 'index.html';</script>";
    } else {
        echo "<script>alert('Error al enviar el mensaje. Por favor, inténtalo de nuevo.'); window.location.href = 'index.html';</script>";
    }
} else {
    header("Location: index.html");
}
?>