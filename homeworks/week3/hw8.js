
// 大數減法
function de(a, b) {
  const bigans = [];
  for (let i = 0; i < a.length; i += 1) {
    bigans.push(a[i] - b[i]);
  }
  for (let i = a.length - 1; i > 0; i -= 1) {
    if (bigans[i] < 0) {
      bigans[i] += 10;
      bigans[i - 1] -= 1;
    }
  }

  return bigans;
}
// 判斷大小
function whoBig(a, b) {
  for (let i = 0; i < a.length; i += 1) {
    if (a.length < b.length) {
      return false;
    } if (a.length > b.length) {
      return true;
    } if (a[i] > b[i] || a.join('') === b.join('')) {
      return true;
    } if (a[i] < b[i]) {
      return false;
    }
  }
  return false;
}

function pa(a, b) {
  const wei = 1100;// 控制要取多少位數
  let num1 = a.split('');
  let num2 = b.split('');
  let numCut = [];
  const ans = [];
  let add = 0;
  let point = 0;
  num1 = num1.map(x => Number(x));
  num2 = num2.map(x => Number(x));

  const pointUse = whoBig(num1, num2);


  if (whoBig(num1, num2) && a.length !== b.length) {
    point = Math.abs(num1.length - num2.length);
  } else {
    point = 1;
  }
  if (num1.length === num2.length && whoBig(num1, num2)) {
    numCut = num1;
    numCut.splice(0, 0, 0);
    num2.splice(0, 0, 0);
  } else if (num1.length > num2.length) {
    num2.splice(0, 0, 0);
    numCut = num1.slice(0, num2.length);
  } else {
    for (let i = 0; i < (num2.length - num1.length); i += 1) {
      add += 1;
    }
    if (whoBig(num1, num2.slice(0, num1.length))) {
      for (let i = 0; i < add + 1; i += 1) {
        num1.push(0);
      }
      for (let i = 0; i < add; i += 1) {
        ans.push(0);
      }
    } else {
      for (let i = 0; i < add + 1; i += 1) {
        num1.push(0);
        ans.push(0);
      }
    }
    numCut = num1;
    num2.splice(0, 0, 0);
    add = 0;
  }

  for (let i2 = 0; i2 < num1.length - num2.length + 1; i2 += 1) { // 除的次數
    if (num1.length > wei) { // 控制要取到幾位
      break;
    }
    for (let i3 = 0; i3 < 100; i3 += 1) {
      if (whoBig(numCut, num2)) {
        numCut = de(numCut, num2);
        add += 1;
      }
    }
    ans.push(add);
    add = 0;
    numCut = numCut.slice(1, numCut.length);

    if (i2 === num1.length - num2.length) {
      for (let i4 = 0; i4 < numCut.length; i4 += 1) {
        if (numCut[i4] !== 0) {
          num1.push(0);
          break;
        }
      }
    }
    numCut.push(num1[numCut.length + i2 + 1]);
  }
  if (pointUse === false) {
    ans.splice(point, 0, '.');
    if (ans[ans.length - 1] === 0) { // 處理小數尾數是否為0
      ans.splice(ans.length - 1, 1);
    } else if (ans[ans.length - 1] === 10) {
      ans[ans.length - 1] /= 10;
    }
  } else if (ans.join('').length !== a.length - b.length + 1) {
    ans.splice(point, 0, '.');
  }

  return ans.join('');// 答案
}

console.log(pa('333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333', '543'));
console.log(pa('543', '333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333'));

// console.log(pa('65', '543'));
// console.log(pa('10', '1000'));
// console.log(pa('1', '1'));
// console.log(pa('999999999', '999995425'));
// console.log(pa('999999999', '329995425'));
// console.log(pa('1000', '10'));
