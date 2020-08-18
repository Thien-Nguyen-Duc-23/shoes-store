<?php
/**
 * Use case
 *
 * - Include file
 * - $('#overlay').show() or use javascript to display block id overlay
 */
?>
<style type="text/css">
    .box-result {
        position: relative;
    }

    /*overlay*/
    #overlay {
        position: absolute; /* Sit on top of the page content */
        display: none; /* Hidden by default */
        width: 100%; /* Full width (cover the whole page) */
        height: 100%; /* Full height (cover the whole page) */
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(251, 251, 251, 0.5); /* Black background with opacity */
        z-index: 1500 !important; /* Specify a stack order in case you're using a different order for other elements */
        cursor: pointer; /* Add a pointer on hover */
    }

    /*loading*/
    .lds-css.ng-scope {
        width: 100px;
        height: 100px;
        top: 44%;
        position: fixed;
        left: 50%;
    }

    @keyframes lds-double-ring {
        0% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @-webkit-keyframes lds-double-ring {
        0% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes lds-double-ring_reverse {
        0% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }
        100% {
            -webkit-transform: rotate(-360deg);
            transform: rotate(-360deg);
        }
    }

    @-webkit-keyframes lds-double-ring_reverse {
        0% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }
        100% {
            -webkit-transform: rotate(-360deg);
            transform: rotate(-360deg);
        }
    }

    .lds-double-ring {
        position: relative;
    }

    .lds-double-ring div {
        box-sizing: border-box;
    }

    .lds-double-ring > div {
        position: absolute;
        width: 168px;
        height: 168px;
        top: 16px;
        left: 16px;
        border-radius: 50%;
        border: 8px solid #000;
        border-color: #8cd0e5 transparent #8cd0e5 transparent;
        -webkit-animation: lds-double-ring 1s linear infinite;
        animation: lds-double-ring 1s linear infinite;
    }

    .lds-double-ring > div:nth-child(2),
    .lds-double-ring > div:nth-child(4) {
        width: 148px;
        height: 148px;
        top: 26px;
        left: 26px;
        -webkit-animation: lds-double-ring_reverse 1s linear infinite;
        animation: lds-double-ring_reverse 1s linear infinite;
    }

    .lds-double-ring > div:nth-child(2) {
        border-color: transparent #376888 transparent #376888;
    }

    .lds-double-ring > div:nth-child(3) {
        border-color: transparent;
    }

    .lds-double-ring > div:nth-child(3) div {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .lds-double-ring > div:nth-child(3) div:before,
    .lds-double-ring > div:nth-child(3) div:after {
        content: "";
        display: block;
        position: absolute;
        width: 8px;
        height: 8px;
        top: -8px;
        left: 72px;
        background: #8cd0e5;
        border-radius: 50%;
        box-shadow: 0 160px 0 0 #8cd0e5;
    }

    .lds-double-ring > div:nth-child(3) div:after {
        left: -8px;
        top: 72px;
        box-shadow: 160px 0 0 0 #8cd0e5;
    }

    .lds-double-ring > div:nth-child(4) {
        border-color: transparent;
    }

    .lds-double-ring > div:nth-child(4) div {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .lds-double-ring > div:nth-child(4) div:before,
    .lds-double-ring > div:nth-child(4) div:after {
        content: "";
        display: block;
        position: absolute;
        width: 8px;
        height: 8px;
        top: -8px;
        left: 62px;
        background: #376888;
        border-radius: 50%;
        box-shadow: 0 140px 0 0 #376888;
    }

    .lds-double-ring > div:nth-child(4) div:after {
        left: -8px;
        top: 62px;
        box-shadow: 140px 0 0 0 #376888;
    }

    .lds-double-ring {
        width: 50px !important;
        height: 50px !important;
        -webkit-transform: translate(-25px, -25px) scale(0.25) translate(25px, 25px);
        transform: translate(-25px, -25px) scale(0.25) translate(25px, 25px);
    }
</style>
<div id="overlay">
    <div class="lds-css ng-scope">
        <div style="width:100%;height:100%" class="lds-double-ring">
            <div></div>
            <div></div>
            <div>
                <div></div>
            </div>
            <div>
                <div></div>
            </div>
        </div>
    </div>
</div>