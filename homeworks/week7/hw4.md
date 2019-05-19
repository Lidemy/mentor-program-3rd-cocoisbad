## 什麼是 DOM？
把 Document 轉換成 Object
JS 就像使用物件一樣抓取資料
DOM 就是 JS 跟瀏覽器之間溝通的橋樑

## 事件傳遞機制的順序是什麼；什麼是冒泡，什麼又是捕獲？
先捕獲，再冒泡
當傳到 target 本身時，就沒有分捕獲跟冒泡

捕獲:
從最外層到你點選的 target 路上
都會被觸發

冒泡:
從你點選的 target 往外層一路觸發出去


## 什麼是 event delegation，為什麼我們需要它？
利用冒泡機制讓多個事件統一得到監聽效果 (不用浪費那麼多資源去監聽每一個事件)
1.他比較有效率 (好管理)
2.可以動態新增


## event.preventDefault() 跟 event.stopPropagation() 差在哪裡，可以舉個範例嗎？


event.preventDefault()
阻止預設的行為
像是瀏覽器在 submit 預設行為是送出表單
這樣就不會送出了
如果原本 click 連結會執行則就會不會執行
```javascript
	<a href='*'>link</a>

<script>
    const element = document.querySelector('a')
    element.addEventListener('click', function(e) {
        e.preventDefault()
    })
</script>
````

event.stopPropagation()
停止捕獲與冒泡
但還是會執行同層的監聽效果
```javascript
document.querySelector('.btn')
    .addEventListener('click', function(e) {
        e.stopPropagation()
    })
```
