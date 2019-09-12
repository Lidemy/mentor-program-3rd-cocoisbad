## CSS 預處理器是什麼？我們可以不用它嗎？
像是 LESS, SASS, Stylus 等等
讓我們可以用有結構的方式去寫 CSS
甚至是 function
可以不用它
但就寫起來、修改起來會比較麻煩
基本上用預設處裡器是有益無害的

## 請舉出任何一個跟 HTTP Cache 有關的 Header 並說明其作用。
Cache-Control  max-age
Cache-Control 後面接 max-age
可以告訴瀏覽器這個 Cache 多少秒後過期
如果超過秒數就會重新發送一個 Response
解決了使用 Expires 每台電腦時間可能不一樣的問題


## Stack 跟 Queue 的差別是什麼？
Stack 是 last in first out 後進先出
就像把東西堆疊起來
拿的時候重最上面開始拿

Queue 是 first in first out 先進先出
像是一條隧道(禁止超車)
先進去的就會先出來

## 請去查詢資料並解釋 CSS Selector 的權重是如何計算的（不要複製貼上，請自己思考過一遍再自己寫出來）
基本權重大小是這樣
inline > style > ID > Class > Element > *

1.0.0.0.0 -> inline 
0.1.0.0.0 -> style 
0.0.1.0.0 -> ID
0.0.0.1.0 -> Class
0.0.0.0.1 -> Element
0.0.0.0.0 -> *


1.權重可以疊加，像是用了一個 Class 跟兩個 Element 就是 0.0.0.2.1
2.權重高的會蓋過低的
3.相同權重會以後者蓋過前者