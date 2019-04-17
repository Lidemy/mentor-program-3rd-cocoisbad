## 跟你朋友介紹 Git

git 就是一種版本控制的工具
我們可以隨時 checkout 回到過去的版本號
並且在搭配 github 後在多人開發時有更好的流程

1.首先切換到你要建立 git 的資料夾
2.初始化創建 git: git init
3.這時可以使用 git status 確認目前的狀況
4.加入想要 git 的檔案 : git add xxx
4-2.如果檔案較多也可一次把所有檔案加入： git add .
5.如果有不想加入 git 的東西，可以創建一個 .gitignore 資料夾，將其放入，放在裡面的檔案就會被忽略
6.建立一個新的版本 : git commit -am "版本敘述"
7.這時可以使用 git log 查看歷史版本
8.如果想要回去過去的版本 可以使用： git checkout xxx

9.接著如果我們要新增功能或想要保留現行版本另行開發，則可以新增 branch : git branch xxx
10.新增後我們可以用 git check out xxx 去切換 branch
11.修改完成後想要將檔案合併，可以用： git merge xxx (這裡是把 xxx 合併進來)
12.如要把檔案上傳到 github ，先到 github 右上角找到加號，選取"New repository"
13.輸入 Repository name
14.依照 github 上提示選則有無 repostary 的方法，複製貼到 cmd 上 即可建立連結
15.如要在將檔案上傳可使用： git push origin xxx(xxx 為 branch 名稱) 
16.github 上有更動過想下載，就要用 pull 把他載下來： git pull origin master