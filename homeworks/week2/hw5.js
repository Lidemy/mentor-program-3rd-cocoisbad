function join(str, concatStr) {
  let ans = '';
  for (let i = 0; i < str.length * 2 - 1; i += 1) {
    if (i % 2 === 0) {
      ans += str[i / 2];
    } else {
      ans += concatStr;
    }
  }
  return ans;
}


function repeat(str, times) {
  let ans2 = '';
  for (let i = 0; i < times; i += 1) {
    ans2 += str;
  }
  return ans2;
}


console.log(join(['a', 1, 'b', 2, 'c', 3], '!'));
console.log(repeat('a', 5));
