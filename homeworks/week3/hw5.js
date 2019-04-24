function add(a, b) {
  const num1 = [];
  const num2 = [];
  const ans = [];
  let numAdd = 0;

  for (let i = 0; i < a.length; i += 1) {
    num1.push(Number(a[i]));
  }

  for (let i = 0; i < b.length; i += 1) {
    num2.push(Number(b[i]));
  }

  if (b.length > a.length) {
    for (let i = 0; i < b.length - a.length; i += 1) {
      num1.splice(0, 0, 0);
    }
  } else {
    for (let i = 0; i < a.length - b.length; i += 1) {
      num2.splice(0, 0, 0);
    }
  }
  num1.splice(0, 0, 0);
  num2.splice(0, 0, 0);


  for (let i = num1.length - 1; i >= 0; i -= 1) {
    numAdd = num1[i] + num2[i];
    if (numAdd > 9) {
      ans[i] = numAdd - 10;
      num1[i - 1] += 1;
    } else {
      ans[i] = numAdd;
    }
  }
  if (ans[0] === 0) {
    return ans.slice(1).join('');
  }
  return ans.join('');
}

console.log(add('111111111111111111111111111111', '222222222222222222222222222222'));

module.exports = add;
