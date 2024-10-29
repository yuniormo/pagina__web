<!-- resources/views/reservas.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Canchas</title>
    <link rel="stylesheet" href="http://localhost/example-app/resources/css/app.css">
</head>
<body>
    <header>
        <h1>Reserva tu Cancha de Microfútbol</h1>
        <p>Elige entre nuestras canchas y asegura tu espacio de juego.</p>
    </header>

    <section class="reservas">
        <!-- Listado de canchas con selección de hora y verificación de disponibilidad -->
        <div class="cancha" data-cancha="1">
            <h2>Cancha Sintética 1</h2>
            <label for="hora-1">Hora de reserva:</label>
            <input type="time" id="hora-1" min="08:00" max="22:00" required>
            <button class="btn-verificar" onclick="verificarDisponibilidad(1)">Verificar Disponibilidad</button>
            <button class="btn-reservar" onclick="reservarCancha(1)">Reservar</button>
            <button class="btn-cancelar" onclick="cancelarReserva(1)">Cancelar Reserva</button>
        </div>

        <div class="cancha" data-cancha="2">
            <h2>Cancha Sintética 2</h2>
            <label for="hora-2">Hora de reserva:</label>
            <input type="time" id="hora-2" min="08:00" max="22:00" required>
            <button class="btn-verificar" onclick="verificarDisponibilidad(2)">Verificar Disponibilidad</button>
            <button class="btn-reservar" onclick="reservarCancha(2)">Reservar</button>
            <button class="btn-cancelar" onclick="cancelarReserva(2)">Cancelar Reserva</button>
        </div>

        <div class="cancha" data-cancha="3">
            <h2>Cancha de Microfútbol</h2>
            <label for="hora-3">Hora de reserva:</label>
            <input type="time" id="hora-3" min="08:00" max="22:00" required>
            <button class="btn-verificar" onclick="verificarDisponibilidad(3)">Verificar Disponibilidad</button>
            <button class="btn-reservar" onclick="reservarCancha(3)">Reservar</button>
            <button class="btn-cancelar" onclick="cancelarReserva(3)">Cancelar Reserva</button>
        </div>
    </section>

    <script>
        // Lista de reservas de ejemplo para verificar disponibilidad
        const reservas = {
            1: ['09:00', '14:00', '18:00'], // Horas reservadas para la Cancha 1
            2: ['10:00', '15:00', '20:00'], // Horas reservadas para la Cancha 2
            3: ['08:00', '12:00', '19:00']  // Horas reservadas para la Cancha 3
        };

        function verificarDisponibilidad(id) {
            const horaInput = document.getElementById(`hora-${id}`);
            const horaSeleccionada = horaInput.value;

            if (!horaSeleccionada) {
                alert("Por favor, ingresa una hora válida.");
                return;
            }

            if (reservas[id].includes(horaSeleccionada)) {
                alert(`La hora ${horaSeleccionada} ya está reservada para la Cancha ${id}.`);
            } else {
                alert(`La hora ${horaSeleccionada} está disponible para la Cancha ${id}.`);
            }
        }

        function reservarCancha(id) {
            const horaInput = document.getElementById(`hora-${id}`);
            const horaSeleccionada = horaInput.value;

            if (!horaSeleccionada) {
                alert("Por favor, ingresa una hora válida para reservar.");
                return;
            }

            if (reservas[id].includes(horaSeleccionada)) {
                alert(`No se puede reservar. La hora ${horaSeleccionada} ya está ocupada para la Cancha ${id}.`);
            } else {
                reservas[id].push(horaSeleccionada); // Añadir la hora a las reservas de la cancha
                alert(`Reserva exitosa para la Cancha ${id} a las ${horaSeleccionada}.`);
            }
        }

        function cancelarReserva(id) {
            const horaInput = document.getElementById(`hora-${id}`);
            const horaSeleccionada = horaInput.value;

            if (!horaSeleccionada) {
                alert("Por favor, ingresa la hora de tu reserva para cancelarla.");
                return;
            }

            const index = reservas[id].indexOf(horaSeleccionada);
            if (index !== -1) {
                reservas[id].splice(index, 1); // Elimina la hora de las reservas de la cancha
                alert(`Reserva de la Cancha ${id} a las ${horaSeleccionada} ha sido cancelada.`);
            } else {
                alert(`No hay ninguna reserva para la Cancha ${id} a las ${horaSeleccionada}.`);
            }
        }
    </script>
</body>
</html>
