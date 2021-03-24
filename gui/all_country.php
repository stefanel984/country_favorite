<?php
include ('../library/Country.php');
$country = new Country();
$all_country = $country->takeAllCountryDetails();
?>
<table id="all_country" class="display" style="width:100%">
    <thead>
            <tr>
                <th>Country</th>
                <th>Region</th>
                <th>Populaion</th>
                <th></th>
            </tr>
    </thead>
    <tbody>
         <?php foreach ($all_country as $country){ ?>
             <tr>
                 <th><?php echo $country['name']; ?></th>
                 <th><?php echo $country['region']; ?></th>
                 <th><?php echo $country['population']; ?></th>
                 <th><i class="fa fa-star fav grey pointer" data-country="<?php echo $country['name']; ?>"></i></th>
             </tr>

         <?php }?>

    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#all_country').DataTable();
    } );
    $('.fav').click(function(){
        let country = $(this).data("country");
        $.ajax({
            url: "library/api/fav_country.php",
            type: "post",
            async: false,
            dataType:"json",
            data : { "country": country, "method":"add_fav"},
            success: function(data){
                  if(data.result == 'ok'){
                      $('[data-country="'+country+'"]').removeClass('fav grey pointer');
                      $('[data-country="'+country+'"]').addClass('gold');
                  }
            }
        });

    });
</script>
