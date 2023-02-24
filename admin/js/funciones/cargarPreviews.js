const cargarPreview = (input) => {
    $("#contenedor-preview").empty();
    if (input.files && input.files[0]) {
      for (let i = 0; i < input.files.length; i++) {
        const reader = new FileReader();
        reader.onload = function (e) {
          $("#contenedor-preview").append(
            `<img src='${e.target.result}' alt='preview'>`
          );
        };
  
        reader.readAsDataURL(input.files[i]);
      }
    }
  };