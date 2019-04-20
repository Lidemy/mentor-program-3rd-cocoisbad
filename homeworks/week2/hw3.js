const ans = [];
function reverse(str) {
  for (let i = str.length - 1; i >= 0; i -= 1) {
    ans.push(str[i]);
  }
  console.log(ans.join(''));
}


reverse('1,2,3,2,1');
