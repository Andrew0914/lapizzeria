<!-- FORMULARIO DE CONTACTO -->
<form class="reserva-contacto" method="post">
    <h2>Realiza una reservacion</h2>
    <div class="campo">
        <input type="text"  name="nombre" placeholder="Nombre">
    </div>
    <div class="campo">
        <input type="date"  name="fecha" placeholder="Fecha">
    </div>
    <div class="campo">
        <input type="email"  name="email" placeholder="Email">
    </div>
    <div class="campo">
        <input type="tel"  name="telefono" placeholder="Telefono">
    </div>
    <div class="campo">
        <textarea name="mensaje" placeholder="Mensaje"></textarea>
    </div>
    <input type="submit" class="boton" name="enviar" value="Enviar"/>
    <input type="hidden" name="oculto" value="1"/>
</form>