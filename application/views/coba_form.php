<script type="text/javascript">
        $('#kode_koleksi').keyup(function(e){
            e.preventDefault();
            e.stopPropagation();
            var now = new Date();
            var random = parseInt(Math.random()*10000);
            if(uniq==0){
               uniq=now.getDate()+""+now.getMonth()+""+now.getYear()+""+now.getHours()+""+now.getMinutes()+""+now.getSeconds()+"_"+random;
                user_id = <?=$this->ion_auth->user()->row()->id?>;
                $.post('<?=site_url('Kasir/transaksi_penjualan_add')?>',{'uniq':uniq,'user_id':user_id});
            }

            var kode_koleksi = $('#kode_koleksi').val();
            var url = '<?=site_url('Kasir/koleksi_get_detail')?>';
            $.post(url, {'kode_koleksi':kode_koleksi}, function(response){
                if(response){
                    $('#koleksi_name').html(response['name']);
                    $('#harga_jual').html(response['harga_jual']);

                    var data = {
                        'koleksi_id':response['id'],
                        'uniq':uniq,
                        'koleksi_name':response['name'],
                        'harga_beli':response['harga_beli'],
                        'harga_jual':response['harga_jual'],
                    }
                    $.post('<?=site_url('Kasir/koleksi_transaksi_add')?>',data, function(response){
                        koleksi_transaksi_as_table(response);
                    });
                }
                $('#kode_koleksi').val('');
            });
            
        });	
</script>