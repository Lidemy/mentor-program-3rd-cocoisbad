## 請說明 SQL Injection 的攻擊原理以及防範方法
我們通常都是用 SQL 來得到資料
只要沒有設定好防護措施
他人就可以透過輸入欄位修改 SQL 語句達成攻擊
獲得資料庫系統的使用權
可以使用 Prepared Statement 執行 SQL 指令
就能預防被直接串改 SQL 指令

## 請說明 XSS 的攻擊原理以及防範方法
利用網站的漏洞注入程式碼
像是在沒防範語法的留言版裡注入 javascript 等等
因注入的程式碼是在是在受害者瀏覽器上執行
所以可以很輕鬆的竊取受害者的 Cookie 資訊

PHP 中可以用 htmlspecialchars() 函數把變數裝在裡面
這樣就能把內容轉為僅顯示的狀態
而不會是語法或程式

## 請說明 CSRF 的攻擊原理以及防範方法
CSRF 跨站請求偽造
攻擊者欺騙用戶去存取自己設定的位址
像是一些惡意連結
利用使用者網頁已經是登入狀態執行非本意的操作行為

防範方法
1.檢查 Referer 欄位
header 裡有個欄位叫 referer
判斷是否來自合法的 domain

2.加上 token
要求用戶瀏覽器提供一個不儲存在 cookie 裡的資料做為驗證
攻擊者就無法執行攻擊
通常為一個儲存在表單中的亂數
當客戶端提出請求時會一起送上去驗證