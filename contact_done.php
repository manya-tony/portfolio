<?php
session_start();
if(!$_SESSION) {
    header('Location:index.php');
}

require('function.php');

//任意入力項目の配列が空の場合のエラーメッセージ制御
error_reporting(E_ALL ^ E_NOTICE);
//メール送信元
$emailAdmin = "From:".mb_encode_mimeheader("なすまなみ")."<chikichiki.tony20190222@gmail.com>";
// 変数へ格納
$name = sanitize($_SESSION['name']);
$emailUser = sanitize($_SESSION['email']);
$subject = sanitize($_SESSION['subject']);
$text = sanitize($_SESSION['text']);

//自動返信メール本文（ヒアドキュメント）
$messageToUser = <<< EOD
こんにちは、なすまなみです。
お問い合わせどうもありがとうございます！
下記の内容で承りました。

----------------------------------------------------

【おなまえ】{$name}
【メールアドレス】{$emailUser}
【件名】{$subject}
【お問い合わせ内容】
{$text}

----------------------------------------------------

内容を確認次第、返答いたします。
しばらくお待ちくださいませ。


なすまなみ
【HP】https://chikichiki-tony.sakura.ne.jp/portfolio
【Twitter】https://twitter.com/ChikiChiki_Tony
EOD;

//管理者確認用メール本文
$messageToAdmin = <<< EOD
ポートフォリオサイトより下記の内容でお問い合わせがありました。

----------------------------------------------------

【おなまえ】{$name}
【メールアドレス】{$emailUser}
【件名】{$subject}
【お問い合わせ内容】
{$text}

----------------------------------------------------
EOD;

//メール共通送信設定
mb_language("ja");
mb_internal_encoding("UTF-8");

if(!empty($emailUser)) {
    // 自動送信メール
    mb_send_mail($emailUser, 'お問い合わせありがとうございます！', $messageToUser, $emailAdmin);
    // 管理者確認メール
    mb_send_mail($emailAdmin, $subject, $messageToAdmin, $emailAdmin);

    $isSend = true;
} else {
    $isSend = false;
}

session_destroy();
?>

<!-- head -->
<?php 
$title = '送信しました';
require ('head.php');
?>

<!-- header -->
<?php
$intro = 'index.php#';
$pickup = 'index.php#pickup';
$works = 'index.php#works';
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
        
        <?php if($isSend): ?>
            <p class="u-mb__50">
                メールを送信しました。<br />
                お問い合わせ内容を確認の上、折り返しご連絡いたします。<br />
                しばらくお待ちください。
            </p>
            <!-- ボタン -->
            <div class="c-buttonWrap">
                <button type="button" class="c-button -border">
                    <a href="index.php">もどる</a>
                </button>
            </div>
        <?php else: ?>
            <p class="u-mb__50">
                送信に失敗しました。<br />
                お手数ですが、再度お試しください。
            </p>
            <!-- ボタン -->
            <div class="c-buttonWrap">
                <button type="button" class="c-button -border">
                    <a href="index.php">もどる</a>
                </button>
            </div>
        <?php endif;?>
        
    </div>
</main>


<!-- footer -->
<?php require('footer.php'); ?>