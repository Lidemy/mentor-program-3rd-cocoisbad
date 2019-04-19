function printStars(n) {
	if( n >= 1 && n <= 30 ){
		for(var i=0 ; i<n ; i++){
			console.log("*");
		}
	}else{
		console.log("請輸入1~30之間的數字");
	}
}

printStars(5);
