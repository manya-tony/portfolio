$(function(){
    // ==================================================
    // グローバル変数
    // ==================================================

    var $body = $('body');


    // ==================================================
    // スクロールで表示
    // ==================================================
    var $section = $('.js-section'),
        showHeight = 150;

    $(window).on('load scroll resize', function(){
        $section.each(function(){
            var $this = $(this),
                areaTop = $this.offset().top;
            
            if($(window).scrollTop() > (areaTop + showHeight) - $(window).height()){
                $this.addClass('fadein');
            }
        });
    });


    // ==================================================
    // モーダル
    // ==================================================
    
    // モーダル用変数
    var $intro = $('.js-intro'),
        $introModal = $('.js-introModal'),
        $works = $('.js-works'),
        $worksImg = $('.js-works__img'),
        $worksModal = $('.js-worksModal'),
        $worksModalMainImg = $('.js-worksModal__mainImg'),
        $worksModalMainMv = $('.js-worksModal__mainMv'),
        $worksModalMv = $('.js-worksModal__mv'),
        $worksModalImg2 = $('.js-worksModal__img2'),
        $worksModalImg3 = $('.js-worksModal__img3'),
        $worksModalImg4 = $('.js-worksModal__img4'),
        $worksModalTitle = $('.js-worksModal__title'),
        $worksModalLanguage = $('.js-worksModal__language'),
        $worksModalPeriod = $('.js-worksModal__period'),
        $worksModalText1 = $('.js-worksModal__text1'),
        $worksModalText2 = $('.js-worksModal__text2'),
        $worksModalText3 = $('.js-worksModal__text3'),
        $worksModalText4 = $('.js-worksModal__text4'),
        $worksModalGithub = $('.js-worksModal__github'),
        $worksModalUrl = $('.js-worksModal__url'),
        $modalClose = $('.js-modal__closeBtn'),
        $modalBack = $('.js-modal__back');

    // モーダル開く intro
    $intro.on('click', function(){

        // モーダルを閉じる関数（intro）
        function modalClose(){
            $introModal.fadeOut(500);
            $modalBack.fadeOut(500);
            $body.css({overflow:'visible'});
        }

        $modalBack.fadeIn(500);
        $introModal.fadeIn(500);

        $body.css({overflow:'hidden'});

        // モーダル閉じる closeボタン
        $modalClose.on('click', function(){
            modalClose();
        });
        // モーダル閉じる 背景
        $modalBack.on('click', function(){
            modalClose();
        });
    });

    // モーダル開く works
    $works.on('click', function(){

        // モーダルを閉じる関数 works
        function modalClose(){
            $worksModal.fadeOut(500);
            $modalBack.fadeOut(500);
            $body.css({overflow:'visible'});
        }

        var $this = $(this),
            img1 = $this.children($worksImg).attr('movie'),
            img2 = $this.children($worksImg).attr('img2'),
            img3 = $this.children($worksImg).attr('img3'),
            img4 = $this.children($worksImg).attr('img4'),
            title = $this.children($worksImg).attr('alt'),
            language = $this.children($worksImg).attr('language'),
            period = $this.children($worksImg).attr('period'),
            text1 = $this.children($worksImg).attr('text1'),
            text2 = $this.children($worksImg).attr('text2'),
            text3 = $this.children($worksImg).attr('text3'),
            text4 = $this.children($worksImg).attr('text4'),
            github = $this.children($worksImg).attr('github'),
            url = $this.children($worksImg).attr('url');
            
        $worksModalMainMv.attr('src', img1);
        $worksModalMainImg.attr('src', img2);
        $worksModalMv.attr('src', img1);
        $worksModalImg2.attr('src', img2);
        $worksModalImg3.attr('src', img3);
        $worksModalImg4.attr('src', img4);
        $worksModalTitle.text(title);
        $worksModalLanguage.text(language);
        $worksModalPeriod.text(period);
        $worksModalText1.text(text1);
        $worksModalText2.text(text2);
        $worksModalText3.text(text3);
        $worksModalText4.text(text4);
        $worksModalGithub.attr('href', github);
        $worksModalUrl.attr('href', url);

        $modalBack.fadeIn(500);
        $worksModal.fadeIn(500);

        $body.css({overflow:'hidden'});

        // モーダル内の画像切り替え
        $worksModalMv.on('click', function(){
            $worksModalMainMv.attr('src', img1).css('opacity', 1);
            $worksModalMainImg.css('opacity', 0);
        });
        $worksModalImg2.on('click', function(){
            $worksModalMainMv.css('opacity', 0);
            $worksModalMainImg.attr('src', img2).css('opacity', 1);
        });
        $worksModalImg3.on('click', function(){
            $worksModalMainMv.css('opacity', 0);
            $worksModalMainImg.attr('src', img3).css('opacity', 1);
        });
        $worksModalImg4.on('click', function(){
            $worksModalMainMv.css('opacity', 0);
            $worksModalMainImg.attr('src', img4).css('opacity', 1);
        });

        // モーダル閉じる closeボタン
        $modalClose.on('click', function(){
            modalClose();
        });
        // モーダル閉じる 背景
        $modalBack.on('click', function(){
            modalClose();
        });
    });


    // ==================================================
    // フォームバリデーション
    // ==================================================
    // 必須項目チェック
    $('.js-required').blur(function(){
        $this = $(this);
        if($this.val() == "") {
            $this.siblings('.js-err_required').text('入力必須です。');
            $this.addClass("error");
        } else {
            $this.siblings('.js-err_required').text('');
            $this.removeClass("error");
        }
    });
    //メールアドレス入力チェック
    $('#js-email').blur(function(){
        $this = $(this);
        if(!$this.val().match(/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/)){
            $this.siblings('#js-err_email').text('正しく入力してください。');
            $this.addClass("error");
        } else {
            $this.siblings('#js-err_email').text('');
            $this.removeClass("error");
        }
    });
    //送信時の必須項目入力チェック
    $('#js-submit').on('click',function(){
        $('.js-required').each(function(){
            $this = $(this);
            if($this.val() == ""){
                $this.siblings('.js-err_required').text('入力必須です。');
                $this.addClass('error');
            }
        });
        if($('.error').length){
            return false;
        }
    });


});