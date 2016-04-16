<div class="container lrpage">
	<?php if( $data['interfaces'] ): ?>
		<div class="row titlebar">
			<div class="col-md-6"><h4>接口设置</h4></div>
			<div class="col-md-6 text-right"><a href="/interface/create" class="btn btn-default"> <span class="lricon-add_circle_outline"></span> 创建新接口</a></div>
		</div>
		<ul class="info-list-tile">
		<?php foreach( $data['interfaces'] as $item ): ?>
		<?php $item = json_decode($item , 1); ?>
		<?php 
		if( $item['ipublic'] != 1 ) 
			$rowclass = ' gray ';
		else
			$rowclass = '';
		?>
		<li class="row<?=$rowclass?>">
			<div class="col-md-8">
				<span class="title"><?=$item['iname']?></span><br/>
				<span class="uri"><a href="<?=$item['iuri']?>" target="_blank"><?=$item['iuri']?></a></span>
			</div>
			<div class="col-md-4 text-right">
				<button class="btn btn-primary btn-lg right5" onclick="interface_modify('<?=$item['iname']?>');">编辑</button>&nbsp;
				<!-- <button class="btn btn-default btn-lg right5">访问</button>&nbsp; -->
				<button class="btn btn-error btn-lg right5" onclick="interface_delete('<?=$item['id']?>');">删除</button>
				
			</div>
			

		</li>
		<?php endforeach;?>	
		</ul>
	<?php else: ?>
		<div class="infotile">
			<h4>还没有接口呢，<a href="/interface/create">点这里创建一个</a></h1>
		</div>
		
	<?php endif; ?>	

</div>
