<?php
if ( ! function_exists('get_datetime'))
{
    /**
     * 現在時刻(Asia/Tokyo)を取得する
     *
     * @return date Y/m/d H:i:s
     */
    function get_datetime()
    {
        $date = new DateTime(NULL, new DateTimeZone('Asia/Tokyo'));
        return  $date->format('Y/m/d H:i:s');
    }
}
