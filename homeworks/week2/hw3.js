ans=[];
function reverse(str) {
	for(var i= str.length -1 ; i>=0 ; i--){
		ans.push(str.charAt(i));
	}
	console.log(ans.join(""));
}

reverse('1,2,3,2,1');
