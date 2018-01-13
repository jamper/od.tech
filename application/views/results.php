<?if(!empty($data)):?>
<table class="data-table">
	<thead>
		<tr>
			<td>Имя</td>
			<td>Фамилия</td>
			<td>Емейл</td>
			<td>Процент</td>
			<td>Выбранные категории</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?=$data['name'];?></td>
			<td><?=$data['surname'];?></td>
			<td><?=$data['email'];?></td>
			<td><?=$data['range'];?></td>
			<td>
				<a href="#modal">Категории</a>
			</td>
		</tr>
	</tbody>
</table>
<?endif;?>
<div id="modal" class="modal">
	<div>
		<a href="#close" class="close">X</a>
		<p>
			Выбранные категории:<br />
			<?if(!empty($categories)):?>
			<?foreach($categories as $item):?>
			<?=$item->charity_text;?><br />
			<?endforeach;?>
			<?else:?>
			Ни одной категории не выбрано
			<?endif;?>
		</p>
	</div>
</div>