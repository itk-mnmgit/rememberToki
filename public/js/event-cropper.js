// 画像加工の幅・高さの定数
const CROP_WIDTH = 270;
const CROP_HEIGHT = 270;

// 切り取った画像を保持する変数
let rawImg;

// 切り抜き画面の作成
$uploadCrop = $('.js-croppie').croppie({
	viewport: {
		width: CROP_WIDTH,
		height: CROP_HEIGHT,
  },
  enforceBoundary: false,
	enableExif: true
});

// <input type="file" class="input-file"> で画像が選択された時
$('.input-file').on('change', (e) => {

  // 画像の取得
  let image = e.target.files[0];

  // 画像が空の場合、処理中断
  if (isEmpty(image)) { return }

  // ブラウザがFileReader未対応の場合、処理中断
  if (!enableFileReader()) { return }

  // 画像加工用のBootstrapのモーダル表示
  $('#cropper-modal').modal('show');

  // FileReaderインスタンス作成
  const reader = new FileReader();

  reader.onload = function (e) {
    $('.js-croppie').addClass('ready');
    rawImg = e.target.result;
  }
  reader.readAsDataURL(image);
});

// モーダルが表示された時
$('#cropper-modal').on('shown.bs.modal', () => {

  // Cropperを表示
  $uploadCrop.croppie('bind', {
    url: rawImg
  }).then(function(){
    console.log('jQuery bind complete');
  });
});

$('.crop').on('click', () => {
  $uploadCrop.croppie('result', {
		type: 'base64',
		format: 'jpeg' | 'png' | 'jpg' | 'webp',
    size: {width: CROP_WIDTH, height: CROP_HEIGHT},
	}).then((resp) =>  {

    const formData = new FormData();
    formData.append('croppedImage', resp);

    $('#cropped-img').attr('src', resp);
  });
  $('#cropper-modal').modal('hide');
});


// 引数valがundefinedかチェックする関数
function isEmpty(val) {
  return typeof val === "undefined";
}

// ブラウザがFileReaderに対応しているかチェックする関数
function enableFileReader() {
  if (window.FileReader) {
    return true;
  }
  return false;
}