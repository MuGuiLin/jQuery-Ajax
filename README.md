# jQuery-Ajax
jQuery-Ajax 文件上传，带进度条

<form action="" method="" enctype="multipart/form-data">
			<a class="opts_btn" href="javascript:void(0)"><label id="opst_txt">选择上传文件</label><input type="file" id="oFile" class="oFile" name="myFiles" onchange="FileChangeFn(event)" /></a>
			<label id="file_size"></label><br /><br />
			<!--
			html5 file 在选择上传文件的时候，根据需要可限制指定的文件类型(默认任意类型 )。在 input type="file" 加上 accept="指定要上传的文件类型"即可
				例如：
				<input type="file" id="oFile" name="myFiles" accept=".doc, .docx, .xls, .txt" onchange="FileChangeFn(event)" />
					accept=".doc, .docx, .xls, .txt" 只能上传word, exls, .txt文件
					accept=".rar, .zip" 只能上传压缩文件
					accept=".mp3" 只能上传mp3文件
					accept=".mp4, .avi, .swf, .mpeg" 只能上传视频文件
					accept=".jpg, .jpeg .png, .gif, .bmp" 只能上传指定的这些图片文件
					accept="image/*" image表示图片，*表示所有支持的格式， video/* video表示视频，*表示所有支持的格式
				注： 如果不加accept属性，则上传任意类型的文件(默认)
				
			html5 file 在选择上传文件的时候，根据需要可限制选择 1个 或 多个 文件。在 input type="file" 加上 multiple 属性 即可
				例如：
				<input type="file" id="oFile" name="myFiles" multiple onchange="FileChangeFn(event)" />
					加上 multiple 属性 就可以多选啦：可按住鼠标左键拖动进行多选，或按下键盘上的Ctrl键，或 Shitf键 再鼠标左键点选，或 Ctrl + A 全选
				注： 默认情况下一般都没加multiple 属性，所以只能选择1件文件
				
			最后：如果以上两种情况都要用到时，就同时加上 multiple属性 和 accept="指定要上传的文件类型"属性即可！
				例如：
				<input type="file" id="oFile" name="myFiles" multiple accept=".jpg, .jpeg .png, .gif, .bmp" onchange="FileChangeFn(event)" />
			-->
			<div id="file_box"></div>
			<div class="speed_box"><div id="speed">0%</div></div>
			<label id="file_type"></label>
			<button type="button" class="send_btn" onclick="UploadFileFn()">开始上传文件</button>
			<div class="clear"></div>
		</form>
