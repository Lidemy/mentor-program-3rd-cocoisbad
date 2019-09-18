```javascript
var a = 1
function fn(){
  console.log(a) //undefined
  var a = 5
  console.log(a) //5
  a++
  var a
  fn2()
  console.log(a) //20
  function fn2(){
    console.log(a) //6
    a = 20
    b = 100
  }
}
fn()
console.log(a) //1
a = 10
console.log(a) //10
console.log(b) //100
```
輸出為
undefined
5
6
20
1
10
100

解釋說明

function fn(){
  console.log(a) //undefined
  var a = 5

準備階段
fn() 的 VO 初始化 a = undefined

也可以看成
var a
console.log(a)

a = 5 // fn() 的 VO 裡 a 變成 5

console.log(a) //5

a++ //fn() 的 VO 裡 a 變成 6

 fn2()
  console.log(a) //20
  function fn2(){
    console.log(a) //6  往上一層找 a 所以會是 6
    a = 20 //因為 fn2 裡面沒有 a 所以會往上一層 fn 的 a 會變成20
    b = 100 //因為  fn2 fn 都沒有 b 所以會變成宣告一個全域變數 b = 100
 

 console.log(a) //1 全域變數的 a = 1
a = 10 會將全域變數的 a 賦值 10
console.log(a) //10  全域變數的 a = 10
console.log(b) //100 全域變數的 b = 100