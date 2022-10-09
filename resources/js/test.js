const ref = document.referrer;

if(ref.indexOf('/login') !== -1) {
    //遷移元がGoogleの時だけ実行したい処理
} else if(ref.indexOf('/logout') !== -1) {
    //遷移元がYahooの時だけ実行したい処理
} else {
    //それ以外
}

//alert('ログインしました！');
//alert('ログアウトしました！');