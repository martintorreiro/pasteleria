const cargarTabla = (rutaCarga) => {
  $.post(`servicio/${rutaCarga}`, function (data) {
    $("#body-tabla").html(data);
  });
};
