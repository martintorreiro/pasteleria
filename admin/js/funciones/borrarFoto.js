function borrarFoto(id_foto, id_tabla, tabla) {
  console.log(id_foto, id_tabla, tabla);
  $.post(
    `servicio/formulario/borrar-foto.php`,
    { id_foto, tabla },
    function (data) {
      if (data) {
        console.log(data);
        cargarFotosForm(id_tabla, tabla);
      }
    }
  );
}
