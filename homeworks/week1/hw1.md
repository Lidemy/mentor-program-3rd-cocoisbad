## 交作業流程
1.先創建一個新的 branch: git branch hw1
2.切換到新的 branch: git checkout hw1
3.將檔案加入 commit: git commit -am "homework1"
4.將檔案 push 到 github 上面: git push origin homework1
5.切換到 github 頁面上
6.按下 Compare & pull request
7.可以隨意下標題，下方 Write 可輸入一些心得問題之類的
8.按下 Create pull request送出
9.切換到第三期交作業的地方 homeworks-3rd
10.到 Issues > New issue
11.標題有規範 像是第一周作業就是 [Week1] ，並在下方 Write 貼入網址跟心得問題
12.按 Submit new issue 送出
13.如作業沒問題老師就會 merge 且把 branch 刪掉且 close issues
14.如老師要我們再次修改作業，會先幫我們 merge
15.切到 master 在到 cmd 上把 github 上的檔案 pull 下來: git checkout master, git pull origin master
16.刪除不要的 branch :git branch -d week1