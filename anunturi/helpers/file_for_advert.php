<?php

function isFileForThisAdvert($file)
{
    $advertGuid = $this->session->userdata('advert_guid');
    $userId = $this->session->userdata('user_id');
    $cmp = explode(SEP, $file);
    return $cmp[1] == $userId && $cmp[2] == $advertGuid;
}
?>