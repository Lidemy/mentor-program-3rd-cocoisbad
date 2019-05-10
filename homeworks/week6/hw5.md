## 請找出三個課程裡面沒提到的 HTML 標籤並一一說明作用。

1.<textarea></textarea> 文字區域

範例
<textarea name="text" cols="30" rows="5"></textarea>
cols：行數
rows：列數

可以做出一個供輸入文字的區塊


2.<select></select> 選單

範例
<select name="data" size="2" multiple>
<option value="1">文字1</option>
<option value="2">文字2</option>
<option value="3">文字3</option>
</select>

搭配 <option></option> 使用
可以做出選擇清單



3.<bgsound /> 可以插入音樂

範例
<bgsound src="img/music.mp3" loop="5" />
src：音樂檔路徑
loop：重播次數
若要一直重複播放，可使用infinite




## 請問什麼是盒模型（box modal）
在 HTML 裡面的每個元素都像是一個一個盒子
盒子的大小是由他的寬高組合
但還要加上 Padding、Border、Margin 而成最後的盒子大小


## 請問 display: inline, block 跟 inline-block 的差別是什麼？
inline 元素會在同一行，並排在一起，像是 <span> <a>
block 區塊元素，會直接占滿一整行
inline-block 為一個可以調整寬高的區塊，但可以並排在一起


## 請問 position: static, relative, absolute 跟 fixed 的差別是什麼？

stctic 預設的定位方式

relative 相對定位
被選到的元素可以自由移動
移動的基準為原本的相對位置

absolute 絕對定位
會針對某個參考點去做定位
參考點:往上找不是 static 的元素

fixed 固定定位
把元素固定在畫面某處
像是 hw2 拍手那種東西