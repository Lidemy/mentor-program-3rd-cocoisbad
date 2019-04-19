function capitalize(str) {
	if( str.charCodeAt(0) >= 97 && str.charCodeAt(0) <= 122){
		var ans = str.replace(str.charAt(0),String.fromCharCode(str.charCodeAt(0) - 32))
	}else{
		return str;
	}
	return ans ;
}

console.log(capitalize('hello'));

