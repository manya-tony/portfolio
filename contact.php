<?php
    //CSRF対策のワンタイムトークン発行
    $randomNumber = openssl_random_pseudo_bytes(16);
    $token = bin2hex($randomNumber);

    //トークンをセッションに格納
    session_start();
    $_SESSION['input_token'] = $token;
?>

<!-- head -->
<?php 
$title = 'お問い合わせ';
require ('head.php');
?>

<!-- header -->
<?php
$intro = 'index#';
$pickup = 'index#pickup';
$works = 'index#works';
require ('header.php');
?>


<!-- =================================
お問い合わせフォーム
================================= -->
<main class="l-main">
    <div class="p-container -ss">
        <!-- タイトル -->
        <div class="c-title__wrap u-mb__50">
            <h2 class="c-title u-mb__20">お問い合わせ</h2>
            <p class="c-title--sub u-mb__20">CONTACT</p>
            <p class="c-title--sub">すべて入力してください。</p>
        </div>
        <!-- 入力フォーム -->
        <form method="POST" action="contact_check.php" class="c-form u-mb__100">
            <?= '<input name="input_token" type="hidden" value="'.$token.'">'; ?>
            <!-- name -->
            <label for="name" class="u-mb__10">
                <input type="text" name="name" value="" placeholder="おなまえ" maxlength="255" class="u-mb__5 js-required">
                <p class="u-c__red u-ta__r js-err_required"></p>
            </label>
            <!-- email -->
            <label for="email" class="u-mb__10">
                <input type="text" name="email" value="" placeholder="メールアドレス" maxlength="255" class="u-mb__5 js-required" id="js-email">
                <p class="u-c__red u-ta__r js-err_required"></p>
                <p class="u-c__red u-ta__r" id="js-err_email"></p>
            </label>
            <!-- subject -->
            <label for="subject" class="u-mb__10">
                <input type="text" name="subject" value="" placeholder="件名" maxlength="255" class="u-mb__5 js-required">
                <p class="u-c__red u-ta__r js-err_required"></p>
            </label>
            <!-- text -->
            <label for="text" class="u-mb__50">
                <textarea name="text" placeholder="お問い合わせ内容" maxlength="10000" class="u-mb__5 js-required" id="text"></textarea>
                <p class="u-c__red u-ta__r js-err_required"></p>
            </label>
            <!-- ボタン -->
            <div class="c-buttonWrap -side">
                <button type="button" class="c-button -sideN -border u-mr__10"><a href="index">もどる</a></button>
                <input type="submit" value="確認" class="c-button -sideY" id="js-submit">
            </div>
        </form>
    </div>
</main>


<!-- footer -->
<?php require('footer.php'); ?>