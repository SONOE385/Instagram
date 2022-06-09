//複数の画像投稿フォームを表示

//追加ボタンが押された時にイベントをセット//
//その時に押したボタンに発火させるイベントを$thisとし、画像プレビューを出す。
//追加ボタンを押すごとに同じjs-previewが増えていくので、プレビューが複製されてしまう。
//クリックしたもの限定という意味で$thisを使う必要がある。
//change=値が入ったら発動

$(function () {
    $(document).on('change', ".js-img", function (e) {
        let img = $(this).parent().parent().find('.js-preview');
        console.log($(this))
        var reader = new FileReader();
        reader.onload = function (e) {
            img.show();
            img.attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files[0]);               
    });


    //画像のプレビュー表示
    $(document).on('change', ':file', function () {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.parent().parent().next(':text').val(label);
    });
});

//(e)=イベントの略
//change= <input>, <select>, <textarea> 要素において、ユーザーによる要素の値の変更が確定したときに発行
//FileReader=ファイルデータを読み込む
//onload=ページや画像などのリソース類を読み込んでから処理を実行したいときに利用
const addBtn = $("#add-file");

addBtn.click(()=>{

    const ParentFileArea = $("#parent-file-area");
    //親要素のcloneの中から子要素のfile-areaを見つけてそれをクローンする＝Cloneに格納

        const Clone = $("#clone").find(".file-area").clone();
        
        const l = $(".file-area").length;
        if(l<=2){
            
            //imgタグの中身を空にする
            Clone.find("img").attr('src', null);

            //inputにファイルが入ったままコピーされるので、いったん消す
            Clone.find("input").remove();

            //新しくinput要素を作ってCloneに追加する("の前に\を配置しないといけない)
            const d =  "<input type=\"file\" name=\"image[]\" class=\"js-img\" accept=\"image/png, image/jpeg\">";
            Clone.find(".filelabel").append(d);

            //CloneをParentFileAreaの直下に作る
            ParentFileArea.append(Clone).trigger('create');

            //4個以上のとき(if(l>=3))
        }else{
                alert('投稿できる写真は3枚までです');
            }
        }
    
)



//フラッシュメッセージ
(function() {
    'use strict';

    // フラッシュメッセージのfadeout
    $(function(){
        $('.flash_message').fadeOut(3000);
    });

})();
