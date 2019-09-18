```javascript
for(var i=0; i<5; i++) {
  console.log('i: ' + i)
  setTimeout(() => {
    console.log(i)
  }, i * 1000)
}
```
輸出為
i:0
i:1
i:2
i:3
i:4
5
5
5
5
5

解釋說明
i = 0

console.log('i: ' + i)
進入 Stack 後直接執行
browser 輸出 i:0

setTimeout(() => {
    console.log(i)
  }, i * 1000)
進入 Call Stack 發現是 setTimeout
丟進 Web APIs
時間到就加到 Callback Queue

i = 1

console.log('i: ' + i)
進入 Stack 後直接執行
browser 輸出 i:1

setTimeout(() => {
    console.log(i)
  }, i * 1000)
進入 Call Stack 發現是 setTimeout
丟進 Web APIs
時間到就加到 Callback Queue

i = 2

console.log('i: ' + i)
進入 Stack 後直接執行
browser 輸出 i:2

setTimeout(() => {
    console.log(i)
  }, i * 1000)
進入 Call Stack 發現是 setTimeout
丟進 Web APIs
時間到就加到 Callback Queue

i = 3

console.log('i: ' + i)
進入 Stack 後直接執行
browser 輸出 i:3

setTimeout(() => {
    console.log(i)
  }, i * 1000)
進入 Call Stack 發現是 setTimeout
丟進 Web APIs
時間到就加到 Callback Queue

i = 4

console.log('i: ' + i)
進入 Stack 後直接執行
browser 輸出 i:4

setTimeout(() => {
    console.log(i)
  }, i * 1000)
進入 Call Stack 發現是 setTimeout
丟進 Web APIs
時間到就加到 Callback Queue

i = 5 跳脫迴圈

確認 Call Stack 沒有東西了

在 Callback Queue 的第一個 function 進到 Call Stack
Call Stack 裡面有 function 
function 裡面有 console.log(i)
consolse.log(i) 堆疊在 function 上面
因為 i = 5 browser 輸出 5 結束
function 結束

確認 Call Stack 沒有東西了

在 Callback Queue 的第一個 function 進到 Call Stack
Call Stack 裡面有 function 
function 裡面有 console.log(i)
consolse.log(i) 堆疊在 function 上面
因為 i = 5 browser 輸出 5 結束
function 結束

確認 Call Stack 沒有東西了

在 Callback Queue 的第一個 function 進到 Call Stack
Call Stack 裡面有 function 
function 裡面有 console.log(i)
consolse.log(i) 堆疊在 function 上面
因為 i = 5 browser 輸出 5 結束
function 結束

確認 Call Stack 沒有東西了

在 Callback Queue 的第一個 function 進到 Call Stack
Call Stack 裡面有 function 
function 裡面有 console.log(i)
consolse.log(i) 堆疊在 function 上面
因為 i = 5 browser 輸出 5 結束
function 結束

確認 Call Stack 沒有東西了

在 Callback Queue 的第一個 function 進到 Call Stack
Call Stack 裡面有 function 
function 裡面有 console.log(i)
consolse.log(i) 堆疊在 function 上面
因為 i = 5 browser 輸出 5 結束
function 結束

確認 Call Stack 沒有東西了