## 什麼是 Ajax？
任何使用 javaScript 非同步產生資料的方式都可以稱為 Ajax

## 用 Ajax 與我們用表單送出資料的差別在哪？
表單如果要更新資料就要重新載入整個頁面
使用 Ajax 時就可以動態產生資料

## JSONP 是什麼？
利用 script 標籤不受同源政策規範的特性去拿取資料

## 要如何存取跨網域的 API？
要使用 CORS
在網頁回傳 response 的 header 要有 Acces-Control-Allow-Origin 
這是用於辨別你發出的 request 確認身分後
Server 端要回傳什麼資料給你

## 為什麼我們在第四週時沒碰到跨網域的問題，這週卻碰到了？
因為 Node.js 是直接與伺服器做交換
但在網頁上會先透過瀏覽器
所以會被瀏覽器所限制住 (像是同源限制等等)