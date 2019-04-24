function isPalindromes(str) {
  let ans = '';
  for (let i = str.length - 1; i >= 0; i -= 1) {
    ans += str[i];
  }
  if (str === ans) {
    return true;
  }
  return false;
}

console.log(isPalindromes('abcba'));
console.log(isPalindromes('apple'));

module.exports = isPalindromes;
