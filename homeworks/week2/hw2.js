function capitalize(str) {
  const char = str[0];
  if (char >= 'a' && char <= 'z') {
    const bigchar = str.replace(char, String.fromCharCode(str.charCodeAt(0) - 32));
    return bigchar;
  }
  return str;
}

console.log(capitalize('hello'));
