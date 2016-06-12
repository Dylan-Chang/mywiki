<?php
	//²âÊÔ
	/*
	function postMsg($url, $data) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $info = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Errno' . curl_error($ch);
    }
    curl_close($ch);
    return $info;
}

	$url = "http://localhost/mywiki/index.php?title=²âÊÔ1&action=submit";
	
	$data = array('wpTextbox1'=>'²âÊÔ');
	$rs = postMsg($url,$data);
	var_dump($rs);*/
?>

<script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
addNewSection('abc','abcd');

function addNewSection( summary, content, editToken ) {
    $.ajax({
        url: mw.util.wikiScript( 'api' ),
        data: {
            format: 'json',
            action: 'edit',
            title: mw.config.get( 'wgPageName' ),
            section: 'new',
            summary: summary,
            text: content,
            token: editToken
        },
        dataType: 'json',
        type: 'POST',
        success: function( data ) {
            if ( data && data.edit && data.edit.result == 'Success' ) {
                window.location.reload(); // reload page if edit was successful
            } else if ( data && data.error ) {
                alert( 'Error: API returned error code "' + data.error.code + '": ' + data.error.info );
            } else {
                alert( 'Error: Unknown result from API.' );
            }
        },
        error: function( xhr ) {
            alert( 'Error: Request failed.' );
        }
    });
}
</script>