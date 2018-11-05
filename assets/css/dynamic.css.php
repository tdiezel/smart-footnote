<?php header("Content-type: text/css; charset: UTF-8"); ?>
.footnote-container {
    display: inline;
}
.js-article-aside-trigger {
    cursor: pointer;
}
.footnote-ref {
    display: inline-block;
    width: 17px;
    height: 17px;
    position: relative;
    margin-left: 4px;
    margin-right: 4px;
    font: 700 9px Arial,Helvetica,Verdana,sans-serif;
    color: #fff;
    text-align: center;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    -o-user-select: none;
    user-select: none;
}
.footnote-ref:before {
    background-color: #5489d3;
    content: "\0020";
    display: block;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    border: 1px solid #5489d3;
    border-radius: 50%;
    z-index: 0;
}
.footnote-ref {
    line-height: 185%;
}

.ref-txt, .close-txt {
    -webkit-transition: opacity .2s ease-in;
    -moz-transition: opacity .2s ease-in;
    -o-transition: opacity .2s ease-in;
    transition: opacity .2s ease-in;
    position: relative;
    z-index: 10;
}

.close-txt {
    font-size: 16px;
    font-weight: 300;
    color: #666;
    position: absolute;
    left: 4px;
    top: 1px;
    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
    opacity: 0;
}

.footnote-num {
    color: #3668af;
    font-weight: bold;
    padding-right: 3px;
}

.footnote {
    -webkit-transition: opacity .2s ease-in;
    -moz-transition: opacity .2s ease-in;
    -o-transition: opacity .2s ease-in;
    transition: opacity .2s ease-in;
    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=1);
    opacity: .01;
}

.article-aside {
    display: block;
    margin: 20px 0;
    text-align: left;
}
.article-aside:before {
    content: "\0020";
    display: block;
    width: 30px;
    height: 1px;
    background-color: #ccc;
    margin-bottom: 15px;
}
.article-aside-txt {
    font-size: 12px;
    text-align: left;
    color: #999;
    font-family: Arial,Helvetica,Verdana,sans-serif;
    line-height: 1.3 !important;
}
.article-txt .article-aside-txt .small-caps, .article-txt .article-aside-txt .smallcaps {
    font-size: 150%;
    text-transform: none;
    font-variant: small-caps;
}
.article-aside-txt {
    line-height: 1;
    text-align: left;
    color: #999;
}
.article-aside--more-link {
    cursor: pointer;
    box-shadow: none !important;
    background: none;
    border: none;
    display: none;
    padding: 0;
    outline: none;
    color: #1d78af;
    font: normal 11px Arial,Helvetica,Verdana,sans-serif;
    margin-top: 5px;
    text-decoration: none;
    text-transform: capitalize;
    z-index: 100;
    position: relative;
}
.article-aside--more-link:hover, .article-aside--more-link:focus {
    color: #1d78af;
    background: none;
    text-decoration: underline;
}
.article-aside--more-link:focus {
    text-decoration: none;
    outline: none;
}
.footnote .article-aside-txt {
    display: block;
}

@media only screen and (max-width: <?php echo $_GET['media']; ?>px) {
    .footnote-ref.aside-active:before {
        background-color: #999;
        border-color: #999;
    }
    .footnote.aside-active, .aside-active .footnote {
        display: block;
        -webkit-animation: fadein .3s;
        -moz-animation: fadein .3s;
        animation: fadein .3s;
        -webkit-animation-fill-mode: forwards;
        -moz-animation-fill-mode: forwards;
        animation-fill-mode: forwards;
        line-height: 1;
    }
    .footnote {
        display: none;
        position: relative;
    }
}

@media only screen and (min-width: <?php echo (intval($_GET['media']) + 1); ?>px) {
    .footnote {
        filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
        opacity: 1;
    }
    .article-aside {
        position: absolute;
        width: 140px;
        left: 30px;
        line-height: 1;
        display: inline-block;
        filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=1);
        opacity: .01;
        -webkit-transition: opacity .2s ease-in;
        -moz-transition: opacity .2s ease-in;
        -o-transition: opacity .2s ease-in;
        transition: opacity .2s ease-in;
    }
    .article-aside.show {
        filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
        opacity: 1;
    }
    .article-aside--abridged {
        z-index: 10;
    }
    .article-aside.right {
        right: -170px;
        left: auto;
    }
    .article-aside--abridged .article-aside-txt {
        position: relative;
        height: 180px;
        overflow: hidden;
    }

    .article-aside--abridged .article-aside-txt:after {
        pointer-events: none;
        content: "\0020";
        display: block;
        position: absolute;
        right: 0;
        bottom: 0;
        left: 0;
        height: 24px;
        background-image: -webkit-gradient(linear,50% 0%,50% 100%,color-stop(0%,rgba(245,248,243,0)),color-stop(100%,#fdfaf3));
        background-image: -webkit-linear-gradient(top,rgba(245,248,243,0),#fdfaf3);
        background-image: -moz-linear-gradient(top,rgba(245,248,243,0),#fdfaf3);
        background-image: -o-linear-gradient(top,rgba(245,248,243,0),#fdfaf3);
        background-image: linear-gradient(top,rgba(245,248,243,0),#fdfaf3);
    }
    .article-aside--abridged.short-crop .article-aside-txt {
        height: 32px;
    }
    .article-aside--abridged.short-crop .article-aside--more-link {
        top: -8px;
    }
    .article-aside--more-link {
        display: inline-block;
    }
}


@-webkit-keyframes fadein {
    0% {
        opacity: .01;
        -webkit-transform: translate3d(0,-15px,0);
        -moz-transform: translate3d(0,-15px,0);
        -ms-transform: translate3d(0,-15px,0);
        -o-transform: translate3d(0,-15px,0);
        transform: translate3d(0,-15px,0);
    }

    100% {
        opacity: 1;
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        -ms-transform: translate3d(0,0,0);
        -o-transform: translate3d(0,0,0);
        transform: translate3d(0,0,0);
    }
}

@-moz-keyframes fadein {
    0% {
        opacity: .01;
        -webkit-transform: translate3d(0,-15px,0);
        -moz-transform: translate3d(0,-15px,0);
        -ms-transform: translate3d(0,-15px,0);
        -o-transform: translate3d(0,-15px,0);
        transform: translate3d(0,-15px,0);
    }

    100% {
        opacity: 1;
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        -ms-transform: translate3d(0,0,0);
        -o-transform: translate3d(0,0,0);
        transform: translate3d(0,0,0);
    }
}

@keyframes fadein {
    0% {
        opacity: .01;
        -webkit-transform: translate3d(0,-15px,0);
        -moz-transform: translate3d(0,-15px,0);
        -ms-transform: translate3d(0,-15px,0);
        -o-transform: translate3d(0,-15px,0);
        transform: translate3d(0,-15px,0);
    }

    100% {
        opacity: 1;
        -webkit-transform: translate3d(0,0,0);
        -moz-transform: translate3d(0,0,0);
        -ms-transform: translate3d(0,0,0);
        -o-transform: translate3d(0,0,0);
        transform: translate3d(0,0,0);
    }
}