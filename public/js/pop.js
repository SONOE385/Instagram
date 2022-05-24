//ログアウトボタンメソッド

  const target = document.getElementById("tooltipIcon");
  const popup = document.getElementById("toolTip-menu");

  // アイコンにhoverした時
  target.addEventListener('mouseover', () => {
    popup.style.display = 'block';
  }, false);

  // アイコンから離れた時
  target.addEventListener('mouseleave', () => {
    popup.style.display = 'none';
  }, false);

  //ポップアップにhoverした時
  popup.addEventListener('mouseover', () => {
      pop.style.display ='block';
  },false);



//Tippyでツールチップ表示
  tippy('.camera', {
    content: "写真を投稿する",
    placement: 'right',
    arrow: true
  });







