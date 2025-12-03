# Aplicación web para gestionar pacientes y sus citas médicas

---

### Historias de Usuario

- Yo como trabajadora quiero registrar, editar, eliminar (desactivar) o modificar  pacientes en el sistema para agendar citas.
- Yo como trabajadora quiero marca una cita como cancelada, programada o  atendida para ofrecer un buen servicio.
- Yo como trabajadora quiero exportar la agenda de citas a excel para insumo de reportes.

---

### Módulos del sistema

- **Módulo de Pacientes:** Sirve para llevar un registro único de cada paciente de documento de identidad, nombre, teléfono, EPS y si está activo o no. Donde el usuario podrá crear, editar y eliminar (desactivar) a un paciente.
- **Módulo Citas:** Sirve para **r**egistrar y controlar las citas que tiene cada paciente en donde podrá ver una tabla de citas con los datos de paciente, fecha, hora, motivo, Estado: *programada*, *atendida*, *cancelada.* El usuario podrá crear una cita con fecha, hora, motivo y paciente de una lista.
    
    Cambiar el estado:
    
    - Cuando la cita se atiende se la marca como “atendida”.
    - Si el paciente no llega o llama a cancelar se marca como “cancelada”.
- **Módulo de exportación a CSV:** Sirve para observar el historial de citas.
- Módulo de autenticación (opcional): Sirve para el control interno del personal con funcionen de login / logout. y Middleware `auth` para proteger rutas `/pacientes`, `/citas`.

---

### Flujo de uso del sistema

1. Recepcionista entra a `vitalia-mini` → se loguea. (opcional)
2. Llega un paciente nuevo:
    - Entra al módulo pacientes y crea uno nuevo.
    - Llena formulario con documento de identidad, nombre, teléfono, EPS, lo activa por defecto.
3. El paciente pide cita:
    - Módulo **Citas → Nueva**.
    - Selecciona el paciente.
    - Pone fecha, hora, motivo.
4. Más tarde:
    - En **Citas → Listado** ve todas las citas del día.
    - Cuando el paciente llega y lo atienden → cambia estado a “atendida”.
    - Si otro cancela o no llega → cambia a “cancelada”.
5. Fin de día:
    - Mira el historial de citas que hubo.
    - Si tienes datos que exportar → Mira el historial de citas que hubo en CSV

---

### Stack tecnológico

- **DB** en MySQL que guarda pacientes y citas
- **Backend** en PHP + Laravel con toda la lógica del registro de pacientes/citas, manejo de DB, rutas.
- **Frontend** con HTML + CSS + Blade para vistas (formularios, tablas).
    - JS + jQuery + DataTables → que las tablas sean bonitas, filtrables y paginadas.