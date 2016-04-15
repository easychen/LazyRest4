<div class="project-box">
	<div class="row text-center">
		<div class="col-md-6 top200 text-center">
			<form action="/project/file/uploaded" method="post" id="project_upload_form" enctype="multipart/form-data">
			<div class="project-upload" >
				<input type="file" class="upload" name="lazyfile_upload" id="lazyfile_upload"/>
				<span class="lricon-cloud_upload flag"></span>
			</div>
			<div class="exp top20 font18">
	
			<a href="javascript:void(0);">上传项目文件</a></div>
			</form>
		</div>
		<div class="col-md-6 top200 text-center">
			<div class="new-project" onclick="create_new_project();void(0);">
				<span class="lricon-add flag"></span>
			</div>
			<div class="exp top20 font18"><a href="javascript:create_new_project();void(0);">创建新项目</a></div>
		</div>
	</div>

</div>
<script>
	$(document).on( 'change' , '#lazyfile_upload' , function()
	{
		upload_lazy_file();
	});
	
</script>