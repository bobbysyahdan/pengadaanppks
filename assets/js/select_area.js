var provinsi = $("#id_provinsi").val();
var kota = $("#id_kota").val();
  
$(document).on("change", "#id_provinsi", function(e){
    $("#cek_kurir").addClass("hidden");
    $("#trigger_shipping_price").addClass("hidden");
    $.ajax({
        type: "POST",
        url:"/projects/pengadaanppks/area/getCities",
        data : {
            "id_provinsi": $("#id_provinsi").val(),
        },
        success: function(result){
            $('#id_kota').html(result);
              $.ajax({
                type: "POST",
                url:"/projects/pengadaanppks/area/getSubdistrict",
                data : {
                    "id_kota": $("#id_kota").val(),
                },
                success: function(result){
                    $('#id_kecamatan').html(result);
                },
                error: function(){
                  console.log("Ambil data gagal");
                  $('#id_kecamatan').html("");
                }
              });
        },
        error: function(){
          console.log("Ambil data gagal");
          $('#id_kota').html("");
          $('#id_kecamatan').html("");
        }
      });
});

$(document).on("change", "#id_kota", function(e){
  $.ajax({
      type: "POST",
      url:"/projects/pengadaanppks/area/getSubdistrict",
      data : {
          "id_kota": $("#id_kota").val(),
      },
      success: function(result){
          $('#id_kecamatan').html(result);
      },
      error: function(){
        console.log("Ambil data gagal");
        $('#id_kecamatan').html("");
      }
    });
});