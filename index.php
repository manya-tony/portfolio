<!-- head -->
<?php 
$title = 'なすまなみです。';
require ('head.php');
?>

<!-- header -->
<?php
$intro = '#';
$pickup = '#pickup';
$works = '#works';
require ('header.php');
?>


<!-- =================================
メインコンテンツ
================================= -->
<main class="l-main">

    <!-- =================================
    タイトル＆自己紹介
    ================================= -->
    <section class="p-main__intro p-main__section js-section" id="intro">
        <div class="p-container -s">
            <!-- タイトル -->
            <h3 class="p-main__intro--title -h3">
                はじめまして
            </h3>
            <h1 class="p-main__intro--title -h1">なすまなみ
                <span class="p-main__intro--title -s">です。</span>
            </h1>
            <h2 class="p-main__intro--title -h2 u-mb__50">
                プログラミングポートフォリオ
            </h2>
            <!-- 実績 -->
            <div class="p-main__intro--imgWrap u-mb__50">
                <img src="img/distImg/img_top.png" alt="なすまなみの写真" class="u-img">
            </div>
            <!-- ボタン -->
            <button class="c-button js-intro">自己紹介</button>
        </div>
    </section>


    <!-- =================================
    PICKUP WORK ピックアップ実績
    ================================= -->
    <!-- 背景装飾 上-->
    <div class="p-main__back -top"  id="pickup"></div>
    <div class="p-main__back -main">
        <section class="p-main__pickup p-main__section js-section">
            <div class="p-container -s">
                <!-- タイトル -->
                <div class="c-title__wrap u-mb__50">
                    <h2 class="c-title u-mb__20">ピックアップ作品</h2>
                    <p class="c-title--sub">PICKUP WORK</p>
                </div>
                <!-- 実績 -->
                <?php require('works/work_pick.php'); ?>
            </div>
        </section>
    </div>
    <!-- 背景装飾 下-->
    <div class="p-main__back -bottom" id="works"></div>


    <!-- =================================
    WORKS 作品集
    ================================= -->
    <section class="p-main__works p-main__section js-section">
        <div class="p-container -s">
            <!-- タイトル -->
            <div class="c-title__wrap u-mb__50">
                <h2 class="c-title u-mb__20">作品集</h2>
                <p class="c-title--sub">WORKS</p>
            </div>

            <!-- 作品集リスト -->
            <ul class="p-main__works--itemWrap u-mb__30">
                <!-- work07-->
                <?php require('works/work07.php'); ?>
                <!-- work06-->
                <?php require('works/work06.php'); ?>
                <!-- work05-->
                <?php require('works/work05.php'); ?>
                <!-- work04-->
                <?php require('works/work04.php'); ?>
                <!-- work03-->
                <?php require('works/work03.php'); ?>
                <!-- work02-->
                <?php require('works/work02.php'); ?>
                <!-- work01-->
                <?php require('works/work01.php'); ?>
                <!-- work00-->
                <?php require('works/work00.php'); ?>
            </ul>

        </div>
    </section>


    <!-- =================================
    CONTACT お問い合わせ
    ================================= -->
    <!-- 背景装飾 上-->
    <div class="p-main__back -top"></div>
    <div class="p-main__back -main">
        <!-- CONTACT お問い合わせ -->
        <section class="p-main__contact p-main__section js-section">
            <div class="p-container -s">
                <!-- タイトル -->
                <div class="c-title__wrap u-mb__50">
                    <h2 class="c-title u-mb__20">お問い合わせ</h2>
                    <p class="c-title--sub">CONTACT</p>
                </div>
                <!-- ボタン -->
                <a href="https://twitter.com/ChikiChiki_Tony" target="_blanc">
                    <button class="c-button u-mb__20">
                        twitter
                    </button>
                </a>
                <a href="contact.php">
                    <button class="c-button">
                        メールフォーム
                    </button>
                </a>
            </div>
        </section>
    </div>
    <!-- 背景装飾 下-->
    <div class="p-main__back -bottom"></div>


    <!-- =================================
    MODAL モーダル
    ================================= -->
    <!-- intro modal -->
    <?php require('modal_intro.php'); ?>
    <!-- works modal -->
    <?php require('modal_works.php'); ?>
    <!-- modal back -->
    <div class="p-modal__back js-modal__back"></div>

</main>

<!-- footer -->
<?php require('footer.php'); ?>