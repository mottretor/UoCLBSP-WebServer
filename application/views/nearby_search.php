<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Autocomplete</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
</head>
<body>
<div class="container">
    <div class="row">
        <form>
            <div class="form-group">
                <input type="text" class="form-control" id="search_place" placeholder="Search place" style="width:500px;">
            </div>
        </form>
    </div>
</div>

<script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $( "#search_place" ).autocomplete({
            source: "<?php echo site_url('Nearby_search/get_autocomplete/?');?>"
        });
    });
</script>

</body>
</html>