@extends('layouts.template')
<?php
use Carbon\Carbon;
use App\Item;
use App\ItemPrice;
use App\ItemSize;
?>

@section('title')
    Commandes
    @endsection
@section('content')
    <iframe id="xIfrWidget0" scrolling="no" style="width:100%;min-height:8000px;border:none;display:none" src="http://guijethostingtools.com/test2"></iframe>
    <iframe id="xIfrWidget1" scrolling="no" style="width:100%;min-height:8000px;border:none;display:none" src="http://guijethostingtools.com/test2"></iframe>

    <script>
        let ifrNo = 0;
        let ifrHidden;
        let ifr;

        function swap() {

            ifr = document.getElementById('xIfrWidget' + ifrNo);
            ifrNo = 1 - ifrNo;
            ifrHidden = document.getElementById('xIfrWidget' + ifrNo);

            ifr.onload = null;
            ifrHidden.onload = function() {

                ifr.style.display = 'none';
                ifrHidden.style.display = 'block';

            }
            ifrHidden.src = "http://guijethostingtools.com/test2";

        }

        setInterval(function () {
            swap();
        }, 2000)
    </script>

    <style>
        #test{
            height:100% !important;
        }
    </style>
@endsection
