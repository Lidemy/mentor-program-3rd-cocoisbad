```javascript
console.log(1)
setTimeout(() => {
  console.log(2)
}, 0)
console.log(3)
setTimeout(() => {
  console.log(4)
}, 0)
console.log(5)

````
輸出為
1
3
5
2
4

解釋說明
console.log(1)
進入 Stack 後直接執行
browser 輸出 1

setTimeout(() => {
  console.log(2)
}, 0)
進入 Call Stack 發現是 setTimeout
丟進 Web APIs
時間到就加到 Callback Queue

console.log(3)
進入 Stack 後直接執行
browser 輸出 3

setTimeout(() => {
  console.log(4)
}, 0)
進入 Call Stack 發現是 setTimeout
丟進 Web APIs
時間到就加到 Callback Queue

console.log(5)
進入 Stack 後直接執行
browser 輸出 5

確認 Call Stack 沒有東西了

在 Callback Queue 的第一個 function 進到 Call Stack
Call Stack 裡面有 function 
function 裡面有 console.log(2)
consolse.log(2) 堆疊在 function 上面
browser 輸出 2 結束
function 結束

確認 Call Stack 沒有東西了

在 Callback Queue 的第二個 function 進到 Call Stack
Call Stack 裡面有 function 
function 裡面有 console.log(4)
consolse.log(4) 堆疊在 function 上面
browser 輸出 4 結束
function 結束

確認 Call Stack 沒有東西了