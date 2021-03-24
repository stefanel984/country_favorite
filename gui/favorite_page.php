<?php

include ('../library/Country.php');
$country = new Country();
$all_fav_country = $country->takeFavCountryDetails();

?>
<table id="all_country" class="display" style="width:100%">
    <thead>
    <tr>
        <th>Country</th>
        <th>Created at</th>
        <th>Description</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($all_fav_country as $country){
                $date=date_create($country['created_at']);
                $date_create =  date_format($date,"d/m/Y H:i:s"); ?>
        <tr>
            <th><div class="pointer comment" data-comment="<?php echo $country['country']; ?>"><?php echo $country['country']; ?></div></th>
            <th><?php echo $date_create; ?></th>
            <th><?php echo $country['description']; ?></th>
            <th><i class="fa fa-star fav gold pointer" data-country="<?php echo $country['country']; ?>"></i></th>
        </tr>

    <?php }?>

    </tbody>
</table>
<div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8 add_comment hide">
        <form method='post' action='library/api/fav_country.php'>
            <span id="country_name"></span><br/><br/>
            <input type="hidden" name="method" value="add_comment"/>
            <input type="hidden" name = "country" id="country" value=""/>
            <textarea id="description" name="description" rows="4" cols="50">

             </textarea><br/><br/>
            <input type="submit" value="Додади опис"  id="add_description"/>
        </form>
    </div>
    <div class="col-sm-2">
    </div>
</div>
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
            data : { "country": country, "method":"remove_fav"},
            success: function(data){
                if(data.result == 'ok'){
                    $('[data-country="'+country+'"]').removeClass('fav gold pointer');
                    $('[data-country="'+country+'"]').addClass('grey');
                }
                else{
                    alert(data.message);
                }
            }
        });

    });
    $('.comment').click(function(){
        let country = $(this).data("comment");
        $('.add_comment').removeClass('hide');
        $('.add_comment').addClass('show');
        $('#country').val('');
        $('#country').val(country);
        $('#country_name').text('');
        $('#country_name').text(country);

    });
</script>
