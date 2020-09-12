<?php
session_start();
if(!$_POST) {
    header('Location:contact.php');
}

require('function.php');

//トークンチェック・POSTからSESSIONへ受け渡し
if($_SESSION['input_token'] === $_POST['input_token']) {
    $_SESSION = $_POST;
    $tokenValidateError = false;
} else {
    $tokenValidateError = true;
}
?>

<!-- head -->
<?php 
$title = 'お問い合わせ内容確認';
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
            <p class="c-title--sub">CONTACT</p>
        </div>
        <!-- 入力フォーム -->
        <form method="POST" action="contact_done.php" class="c-form u-mb__100">
            <p class="c-form__checkText u-mb__20">
                おなまえ
                <span class="u-mb__10"><?php echo sanitize($_POST['name']); ?></span>
            </p>
            <p class="c-form__checkText u-mb__20">
                メールアドレス
                <span class="u-mb__10"><?php echo sanitize($_POST['email']); ?></span>
            </p>
            
            <p class="c-form__checkText u-mb__20">
                件名
                <span class="u-mb__10"><?php echo sanitize($_POST['subject']); ?></span>
            </p>
            
            <p class="c-form__checkText u-mb__50">
                お問い合わせ内容
                <span class="c-form__check--text u-mb__10"><?php echo sanitize($_POST['text']); ?></span>
            </p>

            <p class="u-fs__s u-ta__c u-mb__50">
                こちらの内容でよろしければ、送信ボタンを押してください。
            </p>
            <!-- ボタン -->
            <div class="c-buttonWrap -side">
                <button type="button" class="c-button -sideN -border u-mr__10"><a href="contact">もどる</a></button>
                <?php if(!$tokenValidateError): ?>
                    <input type="submit" value="送信" class="c-button  -sideY">
                <?php endif; ?>
            </div>
        </form>
    </div>
</main>


<!-- footer -->
<?php require('footer.php'); ?>