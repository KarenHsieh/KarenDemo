
[jQuery Plugin]

    - jsScroller.js & jsScrollbar.js
        - http://www.n-son.com/scripts/jsScrolling/jsScrollbar.html
        - 注意事項彈出視窗custom scroll

    - jquery.blockUI.js
        - http://malsup.com/jquery/block/
        - mobile device 的彈出視窗及遮罩

    - detect_device.js
        - 偵測目前使用裝置



[HTML file]

    - index_a.html
        - 網址連結直接連接此頁面，這個檔案會透過detect_device.js判斷使用裝置跳轉對應頁面
        - 對應頁面 pc版 demo_pc_a.html
        - 對應頁面 手機版 demo_mobile_a.html
        - 若更改目錄底下 demo_pc_a.html 及 demo_mobile_a.html 檔名
          請連同修改index_a.html裡
          第11行的 demo_mobile_a.html -> XXXX.html 及
          第13行的 demo_pc_a.html -> OOOO.html

    - demo_pc_a.html
        - pc版主頁
        - 彈出的注意事項視窗為iframe，對應iframe_a.html這個檔案
        - 若更改iframe_a.html檔名，請連同此檔案第173行一併修改檔案名稱
          <iframe src="iframe_a.html" ... > to  <iframe src="XXXX.html" ... >
        - 為了防止使用者直接將網頁加入書籤後，用不同的裝置開啟造成版面讀取錯誤，所以第187行有再增加判斷裝置的程式判斷
          因此若更改 demo_mobile_a.html 檔名，請將187行 location.href = "demo_mobile_a.html"; 更改成 location.href = "XXXX.html";

    - demo_mobile_a.html
        - 手機版主頁
        - 為了防止使用者直接將網頁加入書籤後，用不同的裝置開啟造成版面讀取錯誤，所以第107行有再增加判斷裝置的程式判斷
          因此若更改 demo_pc_a.html 檔名，請將107行 location.href = "demo_pc_a.html"; 更改成 location.href = "OOOO.html";

    - iframe_a.html
        - demo_pc_a.html 注意事項彈出視窗讀取這個檔案


[備註]
    Ａ版及B版的運作方式皆為連結到 index_a.html / index_b.html 依據目前正在使用的裝置自行跳轉。
    因此若更改黨名結尾為 XXXX_b.html 的檔案時，請依照上方說明更改對應的內容，以利連結至正確的頁面。




- 2016-01-25 added by Karen

