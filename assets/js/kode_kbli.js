var form_kbli = $('.select2-selection__rendered').find('.select2-search__field');
form_kbli.on('input', function () {
    var key_kode_kbli = "";
    key_kode_kbli = $(this).val();
    var kode_kbli = $('#kbli');
    if(key_kode_kbli.length > 2){
        $.ajax({
            type: "GET",
            url:"http://localhost/projects/pengadaanppks/paketPekerjaan/ajaxGetKodeKBLI/"+key_kode_kbli,
            success: function(results){
            arr_results = JSON.parse(results);
                $.each(arr_results.kbli , function (index, value){ 
                    kode_kbli.append(`
                        <option value="${ value.kode }">${ value.kode }</option>
                    `);
                });
            }
        });
    } 
});

$('#kbli').on('change', function() {
    form_kbli.on('input', function () {
        var key_kode_kbli = "";
        key_kode_kbli = $(this).val();
        var kode_kbli = $('#kbli');
        if(key_kode_kbli.length >= 2){
            $.ajax({
                type: "GET",
                url:"http://localhost/projects/pengadaanppks/paketPekerjaan/ajaxGetKodeKBLI/"+key_kode_kbli,
                success: function(results){
                arr_results = JSON.parse(results);
                    $.each(arr_results.kbli , function (index, value){ 
                        kode_kbli.append(`
                            <option value="${ value.kode }">${ value.kode }</option>
                        `);
                    });
                }
            });
        } 
    });
});