Provinsi : <select name="semester" id="semester">
    <option value="">- Pilih Tempat -</option>
        <option value="1">Genap</option>
        <option value="2">Ganjil</option>
</select>
Kota : <select name="smt" id="r">
            <option value="">Ke...</option>
    <!-- hasil data dari cari_kota.php akan ditampilkan disini -->
</select>

<script>
   
    $("#semester").change(function(){
   
        // variabel dari nilai combo box provinsi
        var id_semester = $("#semester").val();
              
        // mengirim dan mengambil data
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "<?=site_url().'admin/latihan2'?>",
            data: "dil="+id_semester,
            success: function(msg){
               
                    $("#r").html(msg);                                                     
            }
        });    
    });
</script>