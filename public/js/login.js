$(document).ready(function() {
  // Configura el token CSRF para que se incluya en todas las solicitudes AJAX
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $('#submitBtn').click(function(e) {
      e.preventDefault();  // Evita el envío automático del formulario

      // Recopilar datos del formulario
      var trimestre1 = $('#trimestre1').val();
      var trimestre2 = $('#trimestre2').val();
      var materia_id = $('#materia_id').val();
      var telefono = $('#telefono').val();
      // Realizar la solicitud AJAX
      $.ajax({
          url: "guardar-notas",  // Ruta en Laravel
          method: "POST",
          data: {
              trimestre1: trimestre1,
              trimestre2: trimestre2,
              materia_id: materia_id,
              telefono: telefono
          },
          success: function(response) {
              if (response.success) {
                  alert('Datos guardados exitosamente. Enviando mensaje de WhatsApp...');
                  enviarWhatsapp(telefono);
              } else {
                  alert('Error al guardar los datos.');
              }
          },
          error: function(xhr, status, error) {
              console.error(xhr.responseText);
              alert(error);
          }
      });
  });

  // Función para enviar el mensaje de WhatsApp
  function enviarWhatsapp(telefono) {
      var mensaje = encodeURIComponent("La nota minima que tienes que tienes que optener en:");
      var url = "https://api.whatsapp.com/send?phone=" + telefono + "&text="+ response.materia + mensaje;
      window.open(url, '_blank');  // Abrir en una nueva pestaña
  }
});
