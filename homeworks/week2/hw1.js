function printStars(n) {
  let i;
  if (n >= 1 && n <= 30) {
    for (i = 0; i < n; i += 1) {
      console.log('*');
    }
  } else {
    console.log('請輸入1~30之間的數字');
  }
}
printStars(5);
