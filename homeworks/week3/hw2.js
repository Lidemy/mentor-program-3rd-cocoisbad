function swap(str) {
  let ans = '';
  for (let i = 0; i < str.length; i += 1) {
    if (str[i] === str[i].toUpperCase()) {
      ans += str[i].toLowerCase();
    } else {
      ans += str[i].toUpperCase();
    }
  }
  return ans;
}


console.log(swap('abDd123'));

module.exports = swap;
