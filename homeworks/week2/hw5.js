function join(str, concatStr) {
  var ans = "";
  for (var i=0 ; i<str.length*2-1 ; i++)
  	if ( i%2 === 0){
  		ans += str[i/2];
  	}else{
  		ans += concatStr;
  	}
  return ans;
}




function repeat(str, times) {
	var ans2 ="";
	for (var i=0 ; i<times ; i++ ){
		ans2 += str;
	}
  return ans2;
}


console.log(join(["a", 1, "b", 2, "c", 3], '!'));
console.log(repeat('a', 5));
