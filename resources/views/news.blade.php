<h1>news</h1>
<?php
    echo date('Y-m-d H:i:s');
    if(env('APP_ENV') === 'local'){
        echo '<br/>local';
    }else{
        echo '<br/>else';
    }
    echo '<br/>'.env('AWS_ACCESS_KEY_ID');
?>
