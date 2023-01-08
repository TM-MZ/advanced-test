function toHalfWidth(elm) {
  str = elm.value;
  elm.value = str.replace(/[Ａ-Ｚａ-ｚ０-９－！”＃＄％＆’（）＝＜＞，．？＿［］｛｝＠＾～￥]/g, function (s) {
    return String.fromCharCode(s.charCodeAt(0) - 65248)
  });
  }