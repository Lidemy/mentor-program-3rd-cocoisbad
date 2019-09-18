```javascript
const obj = {
  value: 1,
  hello: function() {
    console.log(this.value)
  },
  inner: {
    value: 2,
    hello: function() {
      console.log(this.value)
    }
  }
}
  
const obj2 = obj.inner
const hello = obj.inner.hello
obj.inner.hello() // 2
obj2.hello() // ??
hello() // ??
```

輸出為
2
2
undefined

解釋說明
用轉化成 function call 的方式去推算答案

obj.inner.hello() => obj.inner.hello().call(obj.inner) // 2
obj.inner 輸出是 2

obj2.hello() => obj2.hello().call(obj2) // 2
obj2 被附值為 obj.inner 所以一樣是 2

hello() => hello.call(undefined) //undefined
