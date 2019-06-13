資料庫名稱：comments


| 欄位名稱 | 欄位型態 | 說明 |
|----------|----------|------|
|  id  |    integer      | 留言 id     |
|  content  |    text      | 留言內容     |
|  user_id  |    integer      |   留言使用者 id    |
|  created_at  |    DATETIME      | 留言時間     |


資料庫名稱：users

| 欄位名稱 | 欄位型態 | 說明 |
|----------|----------|------|
|  id  |    integer      | 留言使用者 id     |
|  nickname  |    VARCHAR      | 留言 暱稱     |

index.php
handle_add.php
$sql = 'SELECT * from comments ORDER BY created_at  DESC LIMIT 50';